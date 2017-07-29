<?php


class AdminModel extends DBModel{
    
    //xoa nhung sinh vien chua dang ki trong bang dang ki
    function deleteStudentNotRegister(){
        
        $sql = "delete from assign_project where isConfirmed in (0,2);";
        $this->deleteRow($sql);
    }
    //het phan Dat them vaos
    
    function getResultFromAssignTable(){
        
        $q = "SELECT st.student_id AS student_id, tc.teacher_id AS teacher_id, st.student_name AS student_name,tc.teacher_name AS teacher_name,r.time AS time,r.isConfirmed AS isConfirmed";
        $q .= " FROM student AS st,assign_project AS r,teacher AS tc";
        $q .= " WHERE st.student_id = r.student_id AND tc.teacher_id = r.teacher_id AND isConfirmed = 1";
        
        return $this->getDataManyRows($q);
    }
    
    function insertResultToAssignTable($sid,$tid){
        
        $q = "INSERT INTO assign_project(student_id,teacher_id,isConfirmed,time) VALUES({$sid},{$tid},1,now())";
        
        return $this->insertData($q);
    }
}