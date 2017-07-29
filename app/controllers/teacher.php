<?php

class Teacher extends Controller {
  
    private $projectModel;

    function __construct() {

        parent::__construct();
        $this->projectModel = $this->model('projectModel');
    }
    
    public function xac_nhan_sinh_vien() {

        //Kiểm tra người dùng đã đăng nhập hay chưa
        //Nếu đăng nhập rồi
        if (isset($_SESSION['uid']) && $_SESSION['level'] == 2) {

            $timeModel = $this->model('timeModel');
            $time = $timeModel->getTime(1);

            if ($this->input->comparingCurrentTimeWithDeadline($time['start'], $time['end'])) {

                $data['status'] = TRUE; // hệ thống đang trong thời gian mở đăng kí cho sinh viên đăng ký giảng viên
            } else {
                $data['status'] = FALSE; // Hệ thống đã đóng đăng ký nên sinh viên không thể đăng ký giảng viên được nữa
            }

            $data['st_tc'] = $this->teacherModel->getDataStudentSignByTeacher($_SESSION['uid']);
            $data['studentDenied'] = $this->teacherModel->getStudentDenied($_SESSION['uid']); // Tên của các sinh viên bi từ chối
            $data['studentAccepted'] = $this->teacherModel->getStudentAccepted($_SESSION['uid']); // Tên của sinh viên được xác nhận
            $data['amount'] = $this->teacherModel->getCountStudentsCanReceive($_SESSION['uid']); // Số lượng sinh viên còn có thể nhận
            
            if (isset($_SESSION['notice'])) {

                $data['notice'] = $_SESSION['notice'];
                $_SESSION['notice'] = null; //Huy session notice
            }
            $this->view('includes/header', $data);
            $this->view('teacher/confirm', $data);
            $this->view('includes/footer', $data);
            $this->view('notice/notice_teacher/notice_confirmStudent', $data);
        } else {
            $this->redirect_to();
        }
    }

    public function confirm($sid, $isConfirm) {

        if (isset($_SESSION['uid']) && $_SESSION['level'] == 2) {

            $notice = $this->teacherModel->checkingThenUpdateStatusSign($_SESSION['uid'],$sid, $isConfirm);
            $_SESSION['notice'] = $notice; // Tao mot session thong bao
            $this->redirect_to('teacher/xac_nhan_sinh_vien');
        } else {
            $this->redirect_to();
        }
    }

    public function de_xuat_do_an() {

        if (isset($_SESSION['uid']) && $_SESSION['level'] == 2) {
            
            $data['department'] = $this->teacherModel->getDeptData();
            $data['teacher_id'] = $_SESSION['uid'];
            $teacher = $this->teacherModel->getTeacherDataById($data['teacher_id']);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $dept_id = $teacher['dept_id'];
                $project_name = $this->input->post('name');
                $description = $this->input->post('description');
                $teacher_id = $_SESSION['uid'];

                $data['notice'] = $this->projectModel->insertProject($dept_id, $project_name, $description, $teacher_id);
            }

            $this->view('includes/header', $data);
            $this->view('teacher/propose', $data);
            $this->view('includes/footer', $data);
            $this->view('notice/notice_teacher/notice_propose', $data);
        } else {

            $this->redirect_to();
        }
    }

    public function thong_tin_do_an() {

        $data['projects'] = $this->projectModel->getProjectData();
        if (isset($_SESSION['notice'])) {
            $data['notice'] = $_SESSION['notice'];
            $_SESSION['notice'] = null;
        }
        $this->view('includes/header', $data);
        $this->view('teacher/viewProject', $data);
        $this->view('includes/footer', $data);
        $this->view('notice/notice_teacher/notice_viewProject', $data);
    }

    public function cap_nhat_do_an($project_id) {

        if (isset($_SESSION['uid']) && $_SESSION['level'] == 2) {

            $data['teacher'] = $this->teacherModel->getTeacherDataById($_SESSION['uid']);
            $data['department'] = $this->teacherModel->getDeptData();
            $data['degree'] = $this->teacherModel->getDegreeData();
            $data['project'] = $this->projectModel->getProjectDataById($project_id);

            if (isset($project_id)) {

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $description = $this->input->post('description');
                    $project_Name = $this->input->post('name');

                    $notice = $this->projectModel->updateProjects($project_Name, $description, $project_id);
                    $_SESSION['notice'] = $notice; // Tao mot session thong bao
                    $this->redirect_to('teacher/thong_tin_do_an');
                } else {
                    $this->view('includes/header', $data);
                    $this->view('teacher/update', $data);
                    $this->view('includes/footer', $data);
                    $this->view('notice/notice_teacher/notice_update', $data);
                }
            }
        } else {
            $this->redirect_to();
        }
    }

    public function deleteProject($project_id) {

        $data['teacher'] = $this->teacherModel->getTeacherDataById($_SESSION['uid']);
        $data['project'] = $this->projectModel->getProjectDataById($project_id);


        if (isset($_SESSION['uid'])) {

            $notice = $this->projectModel->deleteProjectById($project_id);
            $_SESSION['notice'] = $notice; // Tao mot session thong bao
            $this->redirect_to('teacher/thong_tin_do_an');
        } else {
            $this->redirect_to();
        }
    }

}
