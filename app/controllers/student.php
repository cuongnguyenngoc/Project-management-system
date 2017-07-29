<?php

class Student extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function dang_ky_giang_vien() {

        //Kiem tra xem nguoi dung da dang nhap hay chua
        //Dang nhap roi
        if (isset($_SESSION['uid']) && $_SESSION['level'] == 3) {

            $timeModel = $this->model('timeModel');
            $time = $timeModel->getTime(1);

            if ($this->input->comparingCurrentTimeWithDeadline($time['start'], $time['end'])) {

                $data['status'] = TRUE; // hệ thống đang trong thời gian mở đăng kí cho sinh viên đăng ký giảng viên
            } else {
                $data['status'] = FALSE; // Hệ thống đã đóng đăng ký nên sinh viên không thể đăng ký giảng viên được nữa
            }
            
            $name = $this->input->post('name');
            $dept = $this->input->post('dept');
            $degree = $this->input->post('degree');
            $data['teachers'] = $this->input->searchTeacherInputBased($name,$dept,$degree);
            
            $data['depts'] = $this->teacherModel->getDeptData();
            $data['degrees'] = $this->teacherModel->getDegreeData();
            $data['st_tc'] = $this->studentModel->getStudentAndTeacher($_SESSION['uid']);
            
            if($data['st_tc']['isConfirmed'] == 0){
                
                $data['st_tc']['isConfirmed'] = "Chưa Đồng Ý";
            }elseif($data['st_tc']['isConfirmed'] == 1){
                
                $data['st_tc']['isConfirmed'] = "Đã Đồng Ý";
            }else{
                
                $data['st_tc']['isConfirmed'] = "Bạn Đã Bị Từ Chối, Xin Mời Đăng Ký Giảng Viên Khác";
            }

            if (isset($_SESSION['notice'])) {
                
                $data['notice'] = $_SESSION['notice']; //Gán session thông báo cho biến $data['notice'] để truyền đến view
                $_SESSION['notice'] = null; //Huy session notice
            }
            $this->view('includes/header', $data);
            $this->view('student/registerTeacher', $data);
            $this->view('includes/footer', $data);
            $this->view('notice/notice_student/notice_assign_project',$data);
        } else { //Chua dang nhap, chuyen huong nguoi dung den trang chu
            $this->redirect_to();
        }
    }

    public function sign($tid) {

        if (isset($_SESSION['uid']) && $_SESSION['level'] == 3) {

            $notice = $this->studentModel->insert_Sign_and_Checking($_SESSION['uid'], $tid);
            
            $_SESSION['notice'] = $notice; // Tao mot session thong bao
            $this->redirect_to('student/dang_ky_giang_vien');
        } else {
            $this->redirect_to();
        }
    }


}
