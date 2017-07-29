<?php
//trong thu muc model // hinh nhu chua dug mo hinh lam
//require 'connector.php'; khong được khai bao cai nay nua vi trong phan phuong thuc login() của lớp Home
//đã khai báo require_once 'app/models/loginModel.php' như thế này rồi. Nếu khai báo thì sẽ gây ra lỗi khai
//khai báo lại.

class LogInModel extends DBModel{

    private $valid = false;
    private $name;
    private $uid;
    private $level = -1;

    function __construct() {
        parent::__construct();
    }
    
    //Hàm kiểm tra mật khẩu cũ có đúng với trong csdl hay không khi thực hiện thay đổi mật khẩu
    public function checkPass($pass){
        
        $query_student = "SELECT student_id FROM student WHERE password = SHA1('{$pass}')";
        $query_teacher = "SELECT teacher_id FROM teacher WHERE password = SHA1('{$pass}')";
        $query_admin = "SELECT admin_id FROM admin WHERE password = SHA1('{$pass}')";
        //truy van hoc sinh
        $res = $this->getResult($query_student);
        
        if ($res === FALSE) {
            return;  
        } else {
            
            if ((mysql_num_rows($res)) > 0) {
                return 1;
            }else{
                //truy van giao vien
                $res = $this->getResult($query_teacher);
                if ($res === FALSE) {
                    return;
                } else {              
                    if (mysql_num_rows($res) > 0) {
                        return 1;
                    }else{
                        //truy van admin
                        $res = $this->getResult($query_admin);
                        if($res ===FALSE){
                            echo "loi truy van";
                        }else{
                            if(mysql_num_rows($res)>0){
                                return TRUE;                               
                            }else{
                                return FALSE;
                            }
                        }
                    }
                }
            }
        }
        mysql_free_result($res);        
    }
    
    private function checkValidate($email,$password) {
        
        $query_student = "SELECT student_id, student_name, level FROM student WHERE email = '$email' AND password = SHA1('{$password}')";
        $query_teacher = "SELECT teacher_id, teacher_name, level FROM teacher WHERE email = '$email' AND password = SHA1('{$password}')";
        $query_admin = "SELECT admin_id, admin_name, level FROM admin WHERE email = '$email' AND password = SHA1('{$password}')";
        //truy van hoc sinh
        $res = $this->getResult($query_student);
        
        if ($res === FALSE) {
            
            echo "loi truy van ";
            
        } else {
            
            if ((mysql_num_rows($res)) > 0) {
                $this->valid = true;
                $row = mysql_fetch_array($res);
                $this->level = $row['level'];
                $this->name = $row['student_name'];
                $this->uid = $row['student_id'];
            }else{
                //truy van giao vien
                $res = $this->getResult($query_teacher);
                if ($res === FALSE) {
                    echo "loi truy van ";
                } else {
               
                    if (mysql_num_rows($res) > 0) {
                        
                        $this->valid = true;
                        $row = mysql_fetch_array($res);
                        $this->level = $row['level'];
                        $this->name = $row['teacher_name'];
                        $this->uid = $row['teacher_id'];
                    }else{
                        //truy van admin
                        $res = $this->getResult($query_admin);
                        if($res ===FALSE){
                            echo "loi truy van";
                        }else{
                            if(mysql_num_rows($res)>0){
                                $this->valid = true;
                                $row = mysql_fetch_array($res);
                                $this->level = $row['level'];
                                $this->name = $row['admin_name'];
                                $this->uid = $row['admin_id'];
                                
                            }
                        }
                    }
                }
            }
        }
        mysql_free_result($res);
        return;
        $this->valid = false;
    }

    public function isValid($email,$password) {
        
        $this->checkValidate($email,$password);
        return $this->valid;
    }

    public function getLevel() {
        return $this->level;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function getUid(){
        return $this->uid;
    }

}