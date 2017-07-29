<?php

class Profile extends Controller {

    private $InfoModel;
    private $loginModel;
    
    function __construct() {

        parent::__construct();
        $this->InfoModel = $this->model('infoModel');
        $this->loginModel = $this->model('loginModel');
    }

    public function cap_nhat_thong_tin() {

        if (isset($_SESSION['level'], $_SESSION['uid'])) {

            $this->view('includes/header');

            switch ($_SESSION['level']) {
                case 1:
                    $data['admin'] = $this->InfoModel->getAdmin($_SESSION['uid']);

                    $this->view('profile/info_admin', $data);
                    break;
                case 2:
                    $data['teacher'] = $this->teacherModel->getTeacherDataById($_SESSION['uid']);

                    $this->view('profile/info_gv', $data);
                    break;
                case 3:
                    $data['student'] = $this->studentModel->getStudentDataById($_SESSION['uid']);

                    $this->view('profile/info_st', $data);
                    break;
            }
            $this->view('includes/footer');
        } else {
            $this->redirect_to();
        }
    }

    public function changeStudent() {
        
        if (isset($_SESSION['level'], $_SESSION['uid'])) {
            
            $address = $this->input->post('address');

            if ($this->InfoModel->updateStudent($_SESSION['uid'], $address) == 1) {
                $_SESSION['notice'] = "Cập nhật thành công";
            } else {
                $_SESSION['notice'] = "Cập nhật không thành công, do thông tin chưa được thay đổi";
            }
            $this->redirect_to('profile/cap_nhat_thong_tin');
        }
    }

    public function changeTeacher() {
        
        if (isset($_SESSION['level'], $_SESSION['uid'])) {
            
            $address = $this->input->post('address');
            $phone = $this->input->post('phone');
            $research = $this->input->post('research');
            
            if ($this->InfoModel->updateTeacher($_SESSION['uid'], $address, $phone, $research) == 1) {

                $_SESSION['notice'] = "Cập nhật thành công";
            } else {
                $_SESSION['notice'] = "Cập nhật không thành công, do thông tin chưa được thay đổi";
            }
            $this->redirect_to('profile/cap_nhat_thong_tin');
        }
    }

    public function changeAdmin() {
        
        if (isset($_SESSION['level'], $_SESSION['uid'])) {
            
            $address = $this->input->post('address');
            $email = $this->input->post('email');

            if ($this->InfoModel->updateAdmin($_SESSION['uid'], $address,$email) == 1) {

                $_SESSION['notice'] = "Cập nhật thành công";
            } else {
                $_SESSION['notice'] = "Cập nhật không thành công, do thông tin chưa được thay đổi";
            }

            $this->redirect_to('profile/cap_nhat_thong_tin');
        }
    }
    
    public function changePassword(){
        
        if (isset($_SESSION['level'], $_SESSION['uid'])) {
            
            $data['info'] = "Thông Tin";
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                
                $oldPass = $this->input->post('oldPass');
                $newPass = $this->input->post('newPass');
                $confirmPass = $this->input->post('confirmPass');
                
                $errors = array();
                if($newPass != $confirmPass){
                    $data['confirm'] = "Mật khẩu xác nhận không khớp với mật khẩu mới";
                    $errors[] = "confirm";
                }
                if(!$this->loginModel->checkPass($oldPass)){                   
                    $data['oldpass'] = "Mật khẩu cũ của bạn không đúng";
                    $errors[] = "false";
                }
                if(empty($errors)){
                    switch ($_SESSION['level']){
                        case 1: 
                            $data['message'] = $this->InfoModel->changePassAdmin($_SESSION['uid'],$newPass);
                            break;
                        case 2: 
                            $data['message'] = $this->InfoModel->changePassTeacher($_SESSION['uid'],$newPass);
                            break;
                        case 3: 
                            $data['message'] = $this->InfoModel->changePassStudent($_SESSION['uid'],$newPass);
                            break;
                    }
                }
            }
            $this->view('includes/header');
            $this->view('profile/change_password',$data);
            $this->view('includes/footer');            
        }else{
            $this->redirect_to();
        }
    }
}
