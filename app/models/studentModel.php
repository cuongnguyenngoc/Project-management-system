<?php

class StudentModel extends DBModel {

    // Ham getData cua bang class
    function getClassData() {

        $q = "SELECT class_id,class_name FROM class";
        return $this->getDataManyRows($q);
    }

    function getCourseData() {

        $q = "SELECT course_id,course_name FROM course";
        return $this->getDataManyRows($q);
    }

    //Ham insert student vao csdl
    function insertStudentData($class_id, $course_id, $student_name, $email, $password, $birth, $address) {

        $q = "INSERT INTO student(class_id,course_id,student_name,email,password,level,birthday,address)";
        $q .= " VALUES({$class_id},{$course_id},'{$student_name}','{$email}',SHA1('{$password}'),3,'{$birth}','{$address}')";

        $notice = $this->insertData($q);
        return $notice;
    }

    ////Cac ham phan sinh vien
    //Ham chen du lieu dang ki vao bang dang ki trong csdl cho sinh vien
    function insert_Sign_and_Checking($student_id, $teacher_id) {

        // truy van xem trong bang register da co sinh vien nay dang ki chưa, 
        // neu co roi thi khong cho dang ki, con chưa có thì cu the ma dang ki thôi

        $q1 = "SELECT COUNT(assign_id) AS amount FROM assign_project "
                . "WHERE student_id = {$student_id} AND (isConfirmed = 0 OR isConfirmed = 1)";
        $q2 = "SELECT COUNT(assign_id) AS amount, teacher_id FROM assign_project "
                . "WHERE student_id = {$student_id} AND isConfirmed = 2";

        $studentNoDenied = $this->getDataOneRow($q1); // Truy vẫn xem 1 sinh viên có mấy dòng chưa bị từ chối.
        $studentDenied = $this->getDataOneRow($q2); // Truy vấn xem 1 sinh viên có mấy dòng bị từ chối.

        
        $teacherModel = new TeacherModel;
        
        $amountStudentAccepted = $teacherModel->getCountStudentsAcceptedEachTeacher($teacher_id);
        $amountStudentLimited = $teacherModel->getAmountStudentLimited($teacher_id);
        
        if ($studentNoDenied['amount'] == 0 || $studentDenied['amount'] > 0) {
            
            if ($studentDenied['teacher_id'] != $teacher_id) { // Kiểm tra xem giáo viên đăng ký tiếp theo có khác giáo viên đã từ chối không

                if ($amountStudentAccepted < $amountStudentLimited) { // Kiểm tra xem số lượng sinh viên đã đăng ký có nhỏ hơn số lượng sinh viên cho phép của mỗi giảng viên không
                    $notice = $this->insert_Sign($student_id, $teacher_id);
                } else {
                    $notice = 3; //Giảng viên full đăng ký, thông báo k cho đăng ký nữa.
                }
            } else {
                $notice = 4; // thông báo đăng ký trùng với giảng viên đã từ chối.
            }
        } else {
            $notice = 2; // Khong cho đăng ký nữa vì đã đăng ký rồi.
        }
        echo $notice;
        return $notice;
    }

    // Hàm chèn thông tin sinh viên đăng kí giảng viên vào csdl
    function insert_Sign($student_id, $teacher_id) {

        $delete = "DELETE FROM assign_project WHERE student_id = {$student_id} AND isConfirmed = 2";
        $this->deleteRow($delete);

        $q = "INSERT INTO assign_project(student_id,teacher_id,time) VALUES({$student_id},{$teacher_id},NOW())";

        $notice = $this->insertData($q);
        return $notice;
    }

    // ham get ket qua sinh vien sau khi dang ki
    function getStudentAndTeacher($sid) {

        $q = "SELECT st.student_id AS student_id,st.student_name AS student_name,tc.teacher_name AS teacher_name,r.time AS time,r.isConfirmed AS isConfirmed";
        $q .= " FROM student AS st,assign_project AS r,teacher AS tc";
        $q .= " WHERE st.student_id = r.student_id AND tc.teacher_id = r.teacher_id";
        $q .= " AND st.student_id = {$sid}";

        return $this->getDataOneRow($q);
    }

    function getStudentData() {

        $q = "SELECT s.student_id AS student_id,class.class_name as class_name, course.course_name as course_name,
                  s.student_name as student_name,s.password AS password,s.level AS level,
                  s.address AS address, s.email AS email, DATE_FORMAT(s.birthday,'%d/%m/%y') AS birth
                  FROM student AS s, class, course
                  WHERE s.class_id = class.class_id AND course.course_id = s.course_id ORDER BY s.student_id";

        return $this->getDataManyRows($q);
    }

    function getStudentDataById($sid) {

        $q = "SELECT s.student_id AS student_id,class.class_name as class_name, course.course_name as course_name,
                  s.student_name as student_name,s.password AS password,s.level AS level,
                  s.address AS address, s.email AS email, DATE_FORMAT(s.birthday,'%d/%m/%y') AS birth
                  FROM student AS s, class, course
                  WHERE s.class_id = class.class_id AND course.course_id = s.course_id
                  AND s.student_id = {$sid}";

        return $this->getDataOneRow($q);
    }
    
    function getStudentDataByNameClassAndCourse($name,$class,$course){
        $q = "SELECT s.student_id AS student_id,class.class_name as class_name, course.course_name as course_name,
                  s.student_name as student_name,s.password AS password,s.level AS level,
                  s.address AS address, s.email AS email, DATE_FORMAT(s.birthday,'%d/%m/%y') AS birth
                  FROM student AS s, class, course
                  WHERE s.class_id = class.class_id AND course.course_id = s.course_id
                  AND student_name LIKE '%{$name}%' AND class.class_id = $class AND course.course_id = $course ORDER BY s.student_id";

        return $this->getDataManyRows($q);
    }
    
    function getStudentDataByNameAndClass($name,$class){
        $q = "SELECT s.student_id AS student_id,class.class_name as class_name, course.course_name as course_name,
                  s.student_name as student_name,s.password AS password,s.level AS level,
                  s.address AS address, s.email AS email, DATE_FORMAT(s.birthday,'%d/%m/%y') AS birth
                  FROM student AS s, class, course
                  WHERE s.class_id = class.class_id AND course.course_id = s.course_id
                  AND student_name LIKE '%{$name}%' AND class.class_id = $class ORDER BY s.student_id";

        return $this->getDataManyRows($q);
    }
    
    function getStudentDataByClassAndCourse($class,$course){
        $q = "SELECT s.student_id AS student_id,class.class_name as class_name, course.course_name as course_name,
                  s.student_name as student_name,s.password AS password,s.level AS level,
                  s.address AS address, s.email AS email, DATE_FORMAT(s.birthday,'%d/%m/%y') AS birth
                  FROM student AS s, class, course
                  WHERE s.class_id = class.class_id AND course.course_id = s.course_id
                  AND course.course_id = $course AND class.class_id = $class ORDER BY s.student_id";

        return $this->getDataManyRows($q);
    }
    
    function getStudentDataByNameAndCourse($name,$course){
        $q = "SELECT s.student_id AS student_id,class.class_name as class_name, course.course_name as course_name,
                  s.student_name as student_name,s.password AS password,s.level AS level,
                  s.address AS address, s.email AS email, DATE_FORMAT(s.birthday,'%d/%m/%y') AS birth
                  FROM student AS s, class, course
                  WHERE s.class_id = class.class_id AND course.course_id = s.course_id
                  AND student_name LIKE '%{$name}%' AND course.course_id = $course ORDER BY s.student_id";

        return $this->getDataManyRows($q);
    }
    
    function getStudentDataByName($name){
        $q = "SELECT s.student_id AS student_id,class.class_name as class_name, course.course_name as course_name,
                  s.student_name as student_name,s.password AS password,s.level AS level,
                  s.address AS address, s.email AS email, DATE_FORMAT(s.birthday,'%d/%m/%y') AS birth
                  FROM student AS s, class, course
                  WHERE s.class_id = class.class_id AND course.course_id = s.course_id
                  AND student_name LIKE '%{$name}%' ORDER BY s.student_id";

        return $this->getDataManyRows($q);
    }
    
    function getStudentDataByClass($class){
        $q = "SELECT s.student_id AS student_id,class.class_name as class_name, course.course_name as course_name,
                  s.student_name as student_name,s.password AS password,s.level AS level,
                  s.address AS address, s.email AS email, DATE_FORMAT(s.birthday,'%d/%m/%y') AS birth
                  FROM student AS s, class, course
                  WHERE s.class_id = class.class_id AND course.course_id = s.course_id
                  AND class.class_id = $class ORDER BY s.student_id";

        return $this->getDataManyRows($q);
    }
    
    function getStudentDataByCourse($course){
        $q = "SELECT s.student_id AS student_id,class.class_name as class_name, course.course_name as course_name,
                  s.student_name as student_name,s.password AS password,s.level AS level,
                  s.address AS address, s.email AS email, DATE_FORMAT(s.birthday,'%d/%m/%y') AS birth
                  FROM student AS s, class, course
                  WHERE s.class_id = class.class_id AND course.course_id = s.course_id
                  AND course.course_id = $course ORDER BY s.student_id";

        return $this->getDataManyRows($q);
    }
    
    //Ham update thông tin sinh viên
    function updateStudent($student_id, $class_id, $course_id, $student_name, $password, $address, $email, $birth) {

        $q = "UPDATE student SET class_id = {$class_id}, course_id = {$course_id},student_name = '{$student_name}',"
                . "password = SHA1('{$password}'),address = '{$address}',email = '{$email}'";
        $q .= " WHERE student_id = {$student_id}";

        return $this->insertData($q);
    }

    // Ham xoa sinh vien theo id
    function deleteStudentById($sid) {

        $q = "DELETE FROM student WHERE student_id = {$sid}";
        return $this->deleteRow($q);
    }
    
    //tra lai nhu sinh vien chua dang ki hoac bi tu choi
    function  getStudentNotRegistered(){
        $q = "select student_id from student where student_id not in (select student_id from assign_project where isConfirmed = 1);";
        return $this->getDataManyRows($q);
    }

}
