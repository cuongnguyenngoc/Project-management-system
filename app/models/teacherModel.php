<?php

class TeacherModel extends DBModel {

    public function getTeacherData() {

        $q = "SELECT tc.teacher_id AS teacher_id,dept.dept_name as dept_name, d.job as job,
                  tc.teacher_name as teacher_name,tc.password AS password,tc.level AS level,
                  tc.address AS address, tc.email AS email,tc.phonenumber AS phone, d.student_limited
                  FROM teacher AS tc, degree AS d, department as dept
                  WHERE tc.degree_id = d.degree_id AND dept.dept_id = tc.dept_id ORDER BY tc.teacher_id";

        return $this->getDataManyRows($q);
    }

    // Ham get data cua mot giang vien theo id giang vien
    function getTeacherDataById($tid) {

        $q = "SELECT tc.teacher_id AS teacher_id,dept.dept_id AS dept_id, dept.dept_name as dept_name, d.job as job,
                  tc.teacher_name as teacher_name,tc.password AS password,tc.level AS level,tc.trend_research,
                  tc.address AS address, tc.email AS email,tc.phonenumber AS phone, d.student_limited
                  FROM teacher AS tc, degree AS d, department as dept
                  WHERE tc.degree_id = d.degree_id AND dept.dept_id = tc.dept_id AND tc.teacher_id = {$tid}";

        return $this->getDataOneRow($q);
    }

    //Hàm tìm kiếm dữ liệu giảng viên theo tên
    function getTeacherDataByName($name) {

        $q = "SELECT tc.teacher_id AS teacher_id,dept.dept_name as dept_name, d.job as job,
                  tc.teacher_name as teacher_name,tc.password AS password,tc.level AS level,
                  tc.address AS address, tc.email AS email,tc.phonenumber AS phone, d.student_limited
                  FROM teacher AS tc, degree AS d, department as dept
                  WHERE tc.degree_id = d.degree_id AND dept.dept_id = tc.dept_id AND tc.teacher_name LIKE '%{$name}%'
                  ORDER BY tc.teacher_id";

        return $this->getDataManyRows($q);
    }

    //Hàm tìm kiếm dữ liệu giảng viên theo bộ môn
    function getTeacherDataByDept($dept_id) {

        $q = "SELECT tc.teacher_id AS teacher_id,dept.dept_name as dept_name, d.job as job,
                  tc.teacher_name as teacher_name,tc.password AS password,tc.level AS level,
                  tc.address AS address, tc.email AS email,tc.phonenumber AS phone, d.student_limited
                  FROM teacher AS tc, degree AS d, department as dept
                  WHERE tc.degree_id = d.degree_id AND dept.dept_id = tc.dept_id AND dept.dept_id = {$dept_id}
                  ORDER BY tc.teacher_id";

        return $this->getDataManyRows($q);
    }

    //Hàm tìm kiếm dữ liệu giảng viên theo học vị
    function getTeacherDataByDegree($degree_id) {

        $q = "SELECT tc.teacher_id AS teacher_id,dept.dept_name as dept_name, d.job as job,
                  tc.teacher_name as teacher_name,tc.password AS password,tc.level AS level,
                  tc.address AS address, tc.email AS email,tc.phonenumber AS phone, d.student_limited
                  FROM teacher AS tc, degree AS d, department as dept
                  WHERE tc.degree_id = d.degree_id AND dept.dept_id = tc.dept_id AND d.degree_id = $degree_id
                  ORDER BY tc.teacher_id";

        return $this->getDataManyRows($q);
    }

    function getTeacherDataByNameAndDept($name, $dept_id) {

        $q = "SELECT tc.teacher_id AS teacher_id,dept.dept_name as dept_name, d.job as job,
                  tc.teacher_name as teacher_name,tc.password AS password,tc.level AS level,
                  tc.address AS address, tc.email AS email,tc.phonenumber AS phone, d.student_limited
                  FROM teacher AS tc, degree AS d, department as dept
                  WHERE tc.degree_id = d.degree_id AND dept.dept_id = tc.dept_id AND dept.dept_id = {$dept_id}
                  AND tc.teacher_name LIKE '%{$name}%' ORDER BY tc.teacher_id";

        return $this->getDataManyRows($q);
    }

    function getTeacherDataByNameAndDegree($name, $degree_id) {

        $q = "SELECT tc.teacher_id AS teacher_id,dept.dept_name as dept_name, d.job as job,
                  tc.teacher_name as teacher_name,tc.password AS password,tc.level AS level,
                  tc.address AS address, tc.email AS email,tc.phonenumber AS phone, d.student_limited
                  FROM teacher AS tc, degree AS d, department as dept
                  WHERE tc.degree_id = d.degree_id AND dept.dept_id = tc.dept_id AND d.degree_id = {$degree_id}
                  AND tc.teacher_name LIKE '%{$name}%' ORDER BY tc.teacher_id";

        return $this->getDataManyRows($q);
    }

    function getTeacherDataByDeptAndDegree($dept_id, $degree_id) {

        $q = "SELECT tc.teacher_id AS teacher_id,dept.dept_name as dept_name, d.job as job,
                  tc.teacher_name as teacher_name,tc.password AS password,tc.level AS level,
                  tc.address AS address, tc.email AS email,tc.phonenumber AS phone, d.student_limited
                  FROM teacher AS tc, degree AS d, department as dept
                  WHERE tc.degree_id = d.degree_id AND dept.dept_id = tc.dept_id AND d.degree_id = {$degree_id}
                  AND dept.dept_id = {$dept_id} ORDER BY tc.teacher_id";

        return $this->getDataManyRows($q);
    }

    function getTeacherDataByNameDeptAndDegree($name, $dept_id, $degree_id) {

        $q = "SELECT tc.teacher_id AS teacher_id,dept.dept_name as dept_name, d.job as job,
                  tc.teacher_name as teacher_name,tc.password AS password,tc.level AS level,
                  tc.address AS address, tc.email AS email,tc.phonenumber AS phone, d.student_limited
                  FROM teacher AS tc, degree AS d, department as dept
                  WHERE tc.degree_id = d.degree_id AND dept.dept_id = tc.dept_id AND tc.teacher_name LIKE '%{$name}%'
                  AND dept.dept_id = {$dept_id} AND d.degree_id = {$degree_id} ORDER BY tc.teacher_id";

        return $this->getDataManyRows($q);
    }

    ////Ket thuc cac ham phan giang vien
    //Ham getData của bảng Department trong csdl
    function getDeptData() {

        $q = "select dept_id,dept_name FROM department";

        return $this->getDataManyRows($q);
    }

    function getDegreeData() {

        $q = "SELECT * FROM degree";

        return $this->getDataManyRows($q);
    }

    // Ham xoa giang vien theo id
    function deleteTeacherById($tid) {

        $q = "DELETE FROM teacher WHERE teacher_id = {$tid}";
        return $this->deleteRow($q);
    }

    //// Cac ham chuc nang cua admin
    // Ham insert teacher vao csdl
    function insertTeacherData($dept_id, $degree_id, $teacher_name, $password, $address, $email, $phone, $research) {

        $q = "INSERT INTO teacher(dept_id,degree_id,teacher_name,password,level,address,email,phonenumber, trend_research)";
        $q .= " VALUES({$dept_id},{$degree_id},'{$teacher_name}',SHA1('{$password}'),2,'{$address}','{$email}','{$phone}','{$research}')";

        return $this->insertData($q);
    }

    //Ham update thông tin giảng viên
    function updateTeacher($teacher_id, $dept_id, $degree_id, $teacher_name, $password, $address, $email, $phone, $research) {

        $q = "UPDATE teacher SET dept_id = {$dept_id}, degree_id = {$degree_id},teacher_name = '{$teacher_name}',"
                . "password = SHA1('{$password}'),address = '{$address}',email = '{$email}',phonenumber = '{$phone}', trend_research = '{$research}'";
        $q .= " WHERE teacher_id = {$teacher_id}";

        return $this->insertData($q);
    }

    //Hàm lấy dữ liệu từ bảng assign_project theo id giảng viên
    function getDataStudentSignByTeacher($tid) {

        $q = "SELECT st.student_id AS student_id,st.student_name AS student_name,tc.teacher_name AS teacher_name, class.class_name AS class_name,"
                . "course.course_name AS course_name, st.email, st.address AS address, DATE_FORMAT(st.birthday,'%d/%m/%y') AS birth,"
                . "DATE_FORMAT(r.time,'%d/%m/%y') AS time,r.isConfirmed AS isConfirmed";
        $q .= " FROM student AS st,assign_project AS r,teacher AS tc, class, course";
        $q .= " WHERE st.student_id = r.student_id AND tc.teacher_id = r.teacher_id AND st.class_id = class.class_id AND st.course_id = course.course_id";
        $q .= " AND tc.teacher_id = {$tid}";

        return $this->getDataManyRows($q);
    }

    function getStudentDenied($tid) {

        $q = "SELECT student_name FROM student AS st, assign_project AS ap
              WHERE st.student_id = ap.student_id AND isConfirmed = 2 AND teacher_id = {$tid}";

        return $this->getDataManyRows($q);
    }

    function getStudentAccepted($tid) {

        $q = "SELECT student_name FROM student AS st, assign_project AS ap
              WHERE st.student_id = ap.student_id AND isConfirmed = 1 AND teacher_id = {$tid}";

        return $this->getDataManyRows($q);
    }

    function getCountStudentsAcceptedEachTeacher($tid) {

        $q1 = "SELECT COUNT(assign_id) AS amount FROM assign_project
              WHERE isConfirmed = 1 AND teacher_id = {$tid}";

        $row = $this->getDataOneRow($q1);
        return $row['amount'];
    }

    function getAmountStudentLimited($tid) {

        $q2 = "SELECT student_limited FROM teacher AS t, degree AS d
                    WHERE d.degree_id = t.degree_id AND t.teacher_id={$tid}";

        $row = $this->getDataOneRow($q2);
        return $row['student_limited'];
    }

    function getCountStudentsCanReceive($tid) {

        $amountStudentAccepted = $this->getCountStudentsAcceptedEachTeacher($tid); // Số lượng sinh viên đã được xác nhận của giảng viên có id = $tid

        $amountStudentLimited = $this->getAmountStudentLimited($tid); // Số lượng sinh viên bị giới hạn của giảng viên

        return ($amountStudentLimited - $amountStudentAccepted); // Số lượng sinh viên còn có thể nhận của giảng viên
    }

    function checkingThenUpdateStatusSign($tid, $sid, $isConfirm) {

        $amountStudentAccepted = $this->getCountStudentsAcceptedEachTeacher($tid); // Số lượng sinh viên đã được xác nhận của giảng viên có id = $tid
        $amountStudentLimited = $this->getAmountStudentLimited($tid); // Số lượng sinh viên bị giới hạn của giảng viên

        if (($amountStudentAccepted < $amountStudentLimited)) {

            $q = "UPDATE assign_project SET isConfirmed = {$isConfirm} WHERE student_id = {$sid}";
            return $this->insertData($q);
        } elseif ($amountStudentAccepted >= $amountStudentLimited) {
            if ($isConfirm == 2) {
                $q = "UPDATE assign_project SET isConfirmed = {$isConfirm} WHERE student_id = {$sid}";
                return $this->insertData($q);
            } else {
                return 2; // thông báo số sinh viên đã được xác nhận vượt quá sinh viên giới hạn, không cho phép xác nhận nữa.
            }
        }
    }

    //tra lai so hoc hoc da dang ki cua tung giao vien
    function getStudentRegisteredNum() {
        $q = "select teacher_id, count(*) as num from assign_project where isConfirmed != 2 group by teacher_id";
        return $this->getDataManyRows($q);
    }

    //tra lai so luong hoc sinh ma tung giang vien co the nhan
    function getStudentRegisterTotal() {
        $q = "select teacher_id, student_limited as num from degree, teacher where degree.degree_id = teacher.degree_id";
        return $this->getDataManyRows($q);
    }

}
