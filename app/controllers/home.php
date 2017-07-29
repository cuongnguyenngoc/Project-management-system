<?php

class Home extends Controller {

    private $LoginModel;
    function __construct() {

        parent::__construct(); // Cai này để gọi construct của lớp cha Controller
        $this->LoginModel = $this->model('loginModel');
    }
    
    public function index() {
        
        $this->view('includes/header');
        $this->view('home/index');
        $this->view('includes/footer');
    }
    
    function thong_tin_giang_vien($tid = '') {

        if (isset($tid) && filter_var($tid, FILTER_VALIDATE_INT)) {
            
            $data['teacher'] = $this->teacherModel->getTeacherDataById($tid);

            $this->view('includes/header', $data);
            $this->view('home/info_each_teacher', $data);
            $this->view('includes/footer', $data);
        } else {
            $name = $this->input->post('name');
            $dept = $this->input->post('dept');
            $degree = $this->input->post('degree');
            
            $data['depts'] = $this->teacherModel->getDeptData();
            $data['degrees'] = $this->teacherModel->getDegreeData();
            $data['teachers'] = $this->input->searchTeacherInputBased($name,$dept,$degree);

            $this->view('includes/header', $data);
            $this->view('home/infoTeachers', $data);
            $this->view('includes/footer', $data);
        }
    }

    function thong_tin_sinh_vien($sid = '') {

        if (isset($sid) && filter_var($sid, FILTER_VALIDATE_INT)) {

            $data['student'] = $this->studentModel->getStudentDataById($sid);
            $this->view('includes/header', $data);
            $this->view('home/info_each_student', $data);
            $this->view('includes/footer', $data);
        } else {
            
            $name = $this->input->post('name');
            $class = $this->input->post('class');
            $course = $this->input->post('course');
            
            $data['class'] = $this->studentModel->getClassData();
            $data['courses'] = $this->studentModel->getCourseData();
            $data['students'] = $this->input->searchStudentInputBased($name,$class,$course);
            $this->view('includes/header', $data);
            $this->view('home/infoStudents', $data);
            $this->view('includes/footer', $data);
        }
    }

    //Ham dang nhap vao he thong.
    public function login() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            if (isset($_POST['email'], $_POST['password'])) {
                
                $user = $_POST['email'];
                $pass = $_POST['password'];
            }

            if ($this->LoginModel->isValid($user,$pass)) {

                $_SESSION['level'] = $this->LoginModel->getLevel();
                $_SESSION['name'] = $this->LoginModel->getName();
                $_SESSION['uid'] = $this->LoginModel->getUid();
                
                header("Location: {$_SERVER['HTTP_REFERER']}"); // Chuyển hướng trang vẫn ở trang hiện tại.
            } else {
                
                $_SESSION['message'] = "fail";
                header("Location: {$_SERVER['HTTP_REFERER']}"); // Chuyển hướng trang vẫn ở trang hiện tại.
            }
        }
    }

    //Ham dang xuat
    function logout() {

        if (!isset($_SESSION['name'])) {
            
            header("Location: {$_SERVER['HTTP_REFERER']}"); // Chuyển hướng trang vẫn ở trang hiện tại.
        } else {
            $_SESSION = array();
            session_destroy();
            setcookie(session_name(), '', time() - 36000);
            
            header("Location: {$_SERVER['HTTP_REFERER']}"); // Chuyển hướng trang vẫn ở trang hiện tại.
        }
    }
    
    function about(){
        $this->view('includes/header');
        $this->view('home/about');
        $this->view('includes/footer');
    }
    
    function tin_tuc(){
        
        $this->view('includes/header');
        $this->view('home/tin_tuc');
        $this->view('includes/footer');
    }
}

?>