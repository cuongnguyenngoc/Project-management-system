<?php

class Input {

    //Hàm kiểm tra giá trị từ input khi sử dung method POST
    function post($value) {
        
        $text = strip_tags((isset($_POST[$value])) ? $_POST[$value] : false);
        $sanitized = htmlentities($text,ENT_COMPAT,'UTF-8');
        $str = str_replace(array('select','drop','insert','union','or','where'), '', $sanitized);
        return mysql_real_escape_string($str);
    }

    //Hàm kiểm tra giá trị từ input khi sử dung method GET
    function get($value) {
        $text = strip_tags((isset($_GET[$value])) ? $_GET[$value] : false);
        $sanitized = htmlentities($text,ENT_COMPAT,'UTF-8');
        $str = str_replace(array('select','drop','insert','union','or','where'), '', $sanitized);
        return mysql_real_escape_string($str);
    }

    function formatDateInput($date) {
        $date = $this->post($date);
        return date('Y-m-d', strtotime($date));
    }

    function comparingCurrentTimeWithDeadline($start, $end) {

        return (strtotime("now") < strtotime($end) && strtotime("now") > strtotime($start));
    }

    function isTimeAssign($end) {

        return (strtotime("now") > strtotime($end));
    }

    //hàm tìm kiếm giảng viên dựa theo tiêu chí
    function searchTeacherInputBased($name, $dept, $degree) {

        $teacherModel = new TeacherModel;
        if (!empty($name) && !empty($dept) && !empty($degree)) {

            return $teacherModel->getTeacherDataByNameDeptAndDegree($name, $dept, $degree);
        } elseif (!empty($name) && !empty($dept) && empty($degree)) {

            return $teacherModel->getTeacherDataByNameAndDept($name, $dept);
        } elseif (empty($name) && !empty($dept) && !empty($degree)) {

            return $teacherModel->getTeacherDataByDeptAndDegree($dept, $degree);
        } elseif (!empty($name) && empty($dept) && !empty($degree)) {

            return $teacherModel->getTeacherDataByNameAndDegree($name, $degree);
        } elseif (!empty($name) && empty($dept) && empty($degree)) {

            return $teacherModel->getTeacherDataByName($name);
        } elseif (empty($name) && !empty($dept) && empty($degree)) {

            return $teacherModel->getTeacherDataByDept($dept);
        } elseif (empty($name) && empty($dept) && !empty($degree)) {

            return $teacherModel->getTeacherDataByDegree($degree);
        } else {

            return $teacherModel->getTeacherData();
        }
    }

    //hàm tìm kiếm giảng viên dựa theo tiêu chí
    function searchStudentInputBased($name, $class, $course) {

        $studentModel = new StudentModel;
        if (!empty($name) && !empty($class) && !empty($course)) {

            return $studentModel->getStudentDataByNameClassAndCourse($name, $class, $course);
        } elseif (!empty($name) && !empty($class) && empty($course)) {

            return $studentModel->getStudentDataByNameAndClass($name, $class);
        } elseif (empty($name) && !empty($class) && !empty($course)) {

            return $studentModel->getStudentDataByClassAndCourse($class, $course);
        } elseif (!empty($name) && empty($class) && !empty($course)) {

            return $studentModel->getStudentDataByNameAndCourse($name, $course);
        } elseif (!empty($name) && empty($class) && empty($course)) {

            return $studentModel->getStudentDataByName($name);
        } elseif (empty($name) && !empty($class) && empty($course)) {

            return $studentModel->getStudentDataByClass($class);
        } elseif (empty($name) && empty($class) && !empty($course)) {

            return $studentModel->getStudentDataByCourse($course);
        } else {

            return $studentModel->getStudentData();
        }
    }

}
