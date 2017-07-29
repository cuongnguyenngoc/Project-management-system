<?php

class Admin extends Controller {

    private $adminModel;

    function __construct() {
        parent::__construct();
        $this->adminModel = $this->model('adminModel');
    }

    function manage($task) {

        //Kiem tra admin dang nhap hay chua
        if (isset($_SESSION['uid']) && $_SESSION['level'] == 1) {
            switch ($task) {
                case "them-giang-vien":
                    $this->addTeacher();
                    break;
                case "thong-tin-giang-vien":
                    $this->viewTeacher();
                    break;
                case "cap-nhat-thong-tin-giang-vien":
                    $this->updateTeacher($_GET['tid']);
                    break;

                case "them-sinh-vien":
                    $this->addStudent();
                    break;
                case "thong-tin-sinh-vien":
                    $this->viewStudent();
                    break;
                case "cap-nhat-thong-tin-sinh-vien":
                    $this->updateStudent($_GET['sid']);
                    break;
            }
        } else {
            //Chua dang nhap chuyen huong den trang chu
            $this->redirect_to();
        }
    }

    //Phần quản lý giảng viên
    private function addTeacher() {

        if (isset($_SESSION['uid']) && $_SESSION['level'] == 1) {
            $data['department'] = $this->teacherModel->getDeptData();
            $data['degree'] = $this->teacherModel->getDegreeData();
            // admin dang nhap roi
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $teacher_name = $this->input->post('name');
                $dept_id = $this->input->post('dept_id');
                $degree_id = $this->input->post('degree_id');
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $address = $this->input->post('address');
                $phone = $this->input->post('phone');
                $research =  $this->input->post('research');
                //Vì đã kiểm tra đầy đủ ở client bằng javascript rồi nên ta truy vấn cơ sở dữ liệu
                $data['notice'] = $this->teacherModel->insertTeacherData($dept_id, $degree_id, $teacher_name, $password, $address, $email, $phone, $research);
            }
            $this->view('includes/header', $data);
            $this->view('admin/addTeacher', $data);
            $this->view('includes/footer', $data);
            $this->view('notice/notice_admin/notice_addTeacher', $data);
        } else {
            $this->redirect_to();
        }
    }


    function viewTeacher() {

        //Kiem tra xem nguoi dung da dang nhap hay chua
        //Dang nhap roi
        if (isset($_SESSION['uid']) && $_SESSION['level'] == 1) {

            $data['teachers'] = $this->teacherModel->getTeacherData();
            if (isset($_SESSION['notice'])) {

                $data['notice'] = $_SESSION['notice'];
                $_SESSION['notice'] = null; //Huy session notice
            }
            $this->view('includes/header', $data);
            $this->view('admin/viewTeacher', $data);
            $this->view('includes/footer', $data);
            $this->view('notice/notice_admin/notice_viewTeacher', $data);
        } else { //Chua dang nhap, chuyen huong nguoi dung den trang chu
            $this->redirect_to();
        }
    }

    function xoa_giang_vien($tid) {

        if (isset($_SESSION['uid']) && $_SESSION['level'] == 1) {

            $notice = $this->teacherModel->deleteTeacherById($tid);
            $_SESSION['notice'] = $notice; // Tao mot session thong bao
            $this->redirect_to('admin/manage/thong-tin-giang-vien');
        } else {
            $this->redirect_to();
        }
    }

    function updateTeacher($tid) {

        if (isset($_SESSION['uid']) && $_SESSION['level'] == 1) {
            $data['teacher'] = $this->teacherModel->getTeacherDataById($tid);
            $data['department'] = $this->teacherModel->getDeptData();
            $data['degree'] = $this->teacherModel->getDegreeData();

            if (isset($tid)) {

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $teacher_name = $this->input->post('name');
                    $dept_id = $this->input->post('dept_id');
                    $degree_id = $this->input->post('degree_id');
                    $email = $this->input->post('email');
                    $password = $this->input->post('password');
                    $address = $this->input->post('address');
                    $phone = $this->input->post('phone');
                    $research =  $this->input->post('research');
                    
                    $notice = $this->teacherModel->updateTeacher($tid, $dept_id, $degree_id, $teacher_name, $password, $address, $email, $phone, $research);
                    $_SESSION['notice'] = $notice; // Tao mot session thong bao
                    $this->redirect_to('admin/manage/thong-tin-giang-vien');
                } else {
                    $this->view('includes/header', $data);
                    $this->view('admin/updateTeacher', $data);
                    $this->view('includes/footer', $data);
                    $this->view('notice/notice_admin/notice_updateTeacher', $data);
                }
            }
        } else {
            $this->redirect_to();
        }
    }

//Kết thúc phần quản lý giảng viên
    //Phan quan lý sinh viên
    private function addStudent() {

        if (isset($_SESSION['uid']) && $_SESSION['level'] == 1) {

            $data['class'] = $this->studentModel->getClassData();
            $data['course'] = $this->studentModel->getCourseData();
            // admin dang nhap roi
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $student_name = $this->input->post('name');
                $class_id = $this->input->post('class_id');
                $course_id = $this->input->post('course_id');
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $address = $this->input->post('address');
                $birth = $this->input->formatDateInput('birth');

                // chen du lieu vao co so du lieu
                $data['notice'] = $this->studentModel->insertStudentData($class_id, $course_id, $student_name, $email, $password, $birth, $address);
            }
            $this->view('includes/header', $data);
            $this->view('admin/addStudent', $data);
            $this->view('includes/footer', $data);
            $this->view('notice/notice_admin/notice_addStudent', $data);
        } else {
            $this->redirect_to();
        }
    }

    function viewStudent() {

        //Kiem tra xem nguoi dung da dang nhap hay chua
        //Dang nhap roi
        if (isset($_SESSION['uid']) && $_SESSION['level'] == 1) {
            $data['students'] = $this->studentModel->getStudentData();
            if (isset($_SESSION['notice'])) {

                $data['notice'] = $_SESSION['notice'];
                $_SESSION['notice'] = null; //Huy session notice
            }
            $this->view('includes/header', $data);
            $this->view('admin/viewStudent', $data);
            $this->view('includes/footer', $data);
            $this->view('notice/notice_admin/notice_viewStudent', $data);
        } else { //Chua dang nhap, chuyen huong nguoi dung den trang chu
            $this->redirect_to();
        }
    }

    function xoa_sinh_vien($sid) {

        if (isset($_SESSION['uid']) && $_SESSION['level'] == 1) {

            $notice = $this->studentModel->deleteStudentById($sid);
            $_SESSION['notice'] = $notice; // Tao mot session thong bao
            $this->redirect_to('admin/manage/thong-tin-sinh-vien');
        } else {
            $this->redirect_to();
        }
    }

    function updateStudent($sid) {

        if (isset($_SESSION['uid']) && $_SESSION['level'] == 1) {

            $data['student'] = $this->studentModel->getStudentDataById($sid);
            $data['class'] = $this->studentModel->getClassData();
            $data['course'] = $this->studentModel->getCourseData();

            if (isset($sid)) {

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $student_name = $this->input->post('name');
                    $class_id = $this->input->post('class_id');
                    $course_id = $this->input->post('course_id');
                    $email = $this->input->post('email');
                    $password = $this->input->post('password');
                    $address = $this->input->post('address');

                    $notice = $this->studentModel->updateStudent($sid, $class_id, $course_id, $student_name, $password, $address, $email);

                    $_SESSION['notice'] = $notice; // Tao mot session thong bao
                    $this->redirect_to('admin/manage/thong-tin-sinh-vien');
                } else {

                    $this->view('includes/header', $data);
                    $this->view('admin/updateStudent', $data);
                    $this->view('includes/footer', $data);
                    $this->view('notice/notice_admin/notice_updateStudent', $data);
                }
            }
        } else {
            $this->redirect_to();
        }
    }

    function thoi_han_dang_ky() {

        if (isset($_SESSION['uid']) && $_SESSION['level'] == 1) {
            $timeModel = $this->model('timeModel');

            $data['month'] = array(1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May',
                6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December');

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $date_start = $this->input->post('date_start');
                $month_start = $this->input->post('month_start');
                $year_start = $this->input->post('year_start');
                $date_end = $this->input->post('date_end');
                $month_end = $this->input->post('month_end');
                $year_end = $this->input->post('year_end');

                $start = $date_start . " " . $month_start . " " . $year_start;
                $end = $date_end . " " . $month_end . " " . $year_end;

                $timeModel = $this->model('timeModel');

                if ($timeModel->insertTime($start, $end) == 1) {
                    $data['notice'] = "Đặt Thời Hạn Thành công";
                } else {
                    $data['notice'] = "Đặt Thời Hạn Không Thành Công. Hãy Thử Lại Sau";
                }
            }
            $this->view('includes/header');
            $this->view('admin/setTime', $data);
            $this->view('includes/footer');
        } else {
            $this->redirect_to();
        }
    }

    function phan_cong() {

        if (isset($_SESSION['uid']) && $_SESSION['level'] == 1) {

            $data['results'] = $this->adminModel->getResultFromAssignTable();

            $timeModel = $this->model('timeModel');
            $time = $timeModel->getTime(1);

            if ($this->input->isTimeAssign($time['end'])) {

                $data['status'] = TRUE;

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $this->adminModel->deleteStudentNotRegister();
                    $student = $this->studentModel->getStudentNotRegistered();
                    if (count($student) > 0) {

                        $teachernum = $this->teacherModel->getStudentRegisteredNum();
                        $teacherTotal = $this->teacherModel->getStudentRegisterTotal();
                        $teacherRegisteredAvai = array(); // thong tin so luong sinh vien con co the dang ki cua tung giang vien
                        $teacher_ids = array(); // ma tung giang vien
                        $result = array(); // bang ket qua sau cung sinh vien nao se dang ki giang vien nao
                        foreach ($teacherTotal as $arr) {
                            $teacher_ids[] = $arr['teacher_id'];
                            $teacherRegisteredAvai[$arr['teacher_id']] = $arr['num'];
                        }
                        if (isset($teachernum)) {
                            foreach ($teachernum as $arr) {
                                $teacherRegisteredAvai[$arr['teacher_id']] -= $arr['num'];
                            }
                        }

                        if (isset($student)) {
                            foreach ($student as $arr) {
                                //sinh random
                                while (true) {
                                    $ran = rand(0, count($teacher_ids) - 1);
                                    if ($teacherRegisteredAvai[$teacher_ids[$ran]] > 0) {
                                        //$result[] = array($arr['student_id'], $teacher_ids[$ran]);
                                        $this->adminModel->insertResultToAssignTable($arr['student_id'], $teacher_ids[$ran]);
                                        $teacherRegisteredAvai[$teacher_ids[$ran]] -= 1;
                                        break;
                                    }
                                }
                            }
                        }
                        $data['notice'] = 1; // Thông báo phân công thành công
                        $data['results'] = $this->adminModel->getResultFromAssignTable();
                    } else {
                        $data['notice'] = 0;
                    }
                }
            } else {
                $data['status'] = FALSE;
            }
            $this->view('includes/header');
            $this->view('admin/phan_cong', $data);
            $this->view('includes/footer');
            $this->view('notice/notice_admin/notice_assign', $data);
        } else {
            $this->redirect_to();
        }
    }

//Kết thúc phần quản lý sinh viên
}
