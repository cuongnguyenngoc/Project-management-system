<?php

class Controller {

    public $input;
    public $teacherModel;
    public $studentModel;
    
    public function index(){
        
        $this->view('includes/header');
        $this->view('error/error');
        $this->view('includes/footer');
    }
    
    function __construct() {
        
        $this->model('dbModel');
        $this->input = $this->model('input');      
        $this->teacherModel = $this->model('teacherModel');
        $this->studentModel = $this->model('studentModel');
    }

    //Hàm khai báo model.
    public function model($model) {
        require_once 'app/models/' . $model . '.php';
        return new $model;
    }

    //Hàm gọi file view để hiển thị ra trình duyệt
    public function view($view, $data = null) {
        require_once 'app/views/' . $view . '.php';
    }

    //Hàm chuyển hướng người dùng đến một trang khác
    function redirect_to($page = '') {
        $url = BASE_URL . $page;
        header("Location: $url");
    }

}

?>