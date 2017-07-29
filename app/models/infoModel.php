<?php

class InfoModel extends DBModel {

    function __construct() {
        parent::__construct();
    }

    public function getAdmin($id) {
        
        $q = "SELECT admin_name AS name,email, password, DATE_FORMAT(birthday,'%d/%m/%y') AS birth, address, Job FROM admin WHERE admin_id={$id}";
        return $this->getDataOneRow($q);
    }

    function updateStudent($sid,$address) {
        
        $q = "UPDATE student SET address = '{$address}'
             WHERE student_id = {$sid}";
        
        return $this->insertData($q);
    }

    function updateTeacher($tid,$address,$phone, $research) {
        
        $q = "UPDATE teacher SET address = '{$address}',phonenumber = '{$phone}', trend_research = '{$research}'
              WHERE teacher_id = {$tid}";
        
        return $this->insertData($q);
    }

    function updateAdmin($aid,$address,$email) {
        
        $q = "UPDATE admin SET address = '{$address}', email = '{$email}'
              WHERE admin_id = {$aid}";
        
        return $this->insertData($q);
    }
    
    function changePassAdmin($aid,$pass){
        
        $q = "UPDATE admin SET password = SHA1('{$pass}') WHERE admin_id = $aid";
        
        return $this->insertData($q);
    }
    
    function changePassTeacher($tid,$pass){
        
        $q = "UPDATE teacher SET password = SHA1('{$pass}') WHERE teacher_id = $tid";
        
        return $this->insertData($q);
    }
    
    function changePassStudent($sid,$pass){
        
        $q = "UPDATE student SET password = SHA1('{$pass}') WHERE student_id = $sid";
        
        return $this->insertData($q);
    }
}

?>