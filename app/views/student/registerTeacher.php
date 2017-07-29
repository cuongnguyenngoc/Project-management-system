
<script>
    function doSign(tid) {
        var r = confirm('Khi đăng ký xong sẽ không thay đổi được, bạn có chắc đăng ký không?');
        if (r == true) {

            location.href = "<?php echo BASE_URL; ?>student/sign/" + tid;
        }
    }
    function notify() {
        alert("Hệ thống không trong thời hạn đăng ký, vì vậy bạn phải chờ hệ thống mở đăng ký")
    }
</script>

<div class="content">
    <div class="wrapper">
        <div class="mainHeader">
            <form action="" method="POST">
                <label for="name">Tên Giảng Viên: </label>
                <input type="text" value="<?php echo (isset($_POST['name'])) ? $_POST['name'] : '' ?>" name="name">
                <label for="Bộ Môn">Bộ Môn: </label>
                <select name="dept">
                    <option value="">Chọn bộ môn</option>
                    <?php foreach ($data['depts'] as $dept) { ?>
                        <option value="<?php echo $dept['dept_id'] ?>" <?php if (isset($_POST['dept']) && $_POST['dept'] == $dept['dept_id']) echo "selected = 'selected'"; ?>><?php echo $dept['dept_name'] ?></option>
                    <?php } ?>
                </select>
                <label for="Học Vị">Học Vị: </label>
                <select name="degree">
                    <option value="">Chọn học vị</option>
                    <?php foreach ($data['degrees'] as $degree) { ?>
                        <option value="<?php echo $degree['degree_id'] ?>"<?php if (isset($_POST['degree']) && $_POST['degree'] == $degree['degree_id']) echo " selected = 'selected'"; ?>><?php echo $degree['job'] ?></option>
                    <?php } ?>
                </select>
                <input type="submit" value="Tìm Kiếm"/>
            </form>
        </div>
        <table>
            <thead>
                <tr>
                    <th><a href="">Mã Giảng Viên</a></th>
                    <th><a href="">Tên Giảng Viên</a></th>
                    <th><a href="">Bô Môn</a></th>
                    <th><a href="">Email</a></th>
                    <th><a href="">Số SV đã đăng ký thành công</a></th>
                    <th><a href="">Học Vị</a></th>
                    <th><a href="">Trạng Thái</a></th>
                    <th><a href="">Đăng Ký</a></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($data['teachers'])) {
                    foreach ($data['teachers'] as $teacher) {
                        echo "<tr>";
                        echo "<td>" . $teacher['teacher_id'] . "</td>";
                        echo "<td><a href='" . BASE_URL . "home/thong_tin_giang_vien/{$teacher['teacher_id']}'>" . $teacher['teacher_name'] . "</a></td>";
                        echo "<td>" . $teacher['dept_name'] . "</td>";
                        echo "<td>" . $teacher['email'] . "</td>";
                        echo "<td>".$this->teacherModel->getCountStudentsAcceptedEachTeacher($teacher['teacher_id']) . " / " . $teacher['student_limited'] . "</td>";
                        echo "<td>" . $teacher['job'] . "</td>";
                        echo ($data['status']) ? "<td>Mở Đăng Ký</td>" : "<td>Kết Thúc Đăng Ký</td>";
                        echo "<td><input type='button' value='Ðăng Ký' onclick='";
                        echo ($data['status']) ? "doSign({$teacher['teacher_id']})" : "notify()";
                        echo "'/></td>";
                        //echo "<td><a onclick='doSign(1,{$teacher->getId()})'>Ðang Kí</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'><p text-align='center'>Không có dữ liệu</p></td></tr>";
                }
                ?>
            </tbody>
        </table>
        <label for="header"><h3>Kết quả đăng ký</h3></label>
        <table>
            <thead>
                <tr>
                    <th><a href="#">Mã Sinh Viên</a></th>
                    <th><a href="#">Tên Sinh Viên</a></th>
                    <th><a href="#">Tên Giảng Viên</a></th>
                    <th><a href="#">Thời Gian Ðăng Kí</a></th>
                    <th><a href="#">Trạng Thái Xác Nhận</a></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($data['st_tc']) && sizeof($data['st_tc']) != 1) {
                    //foreach($data2['result'] as $result){
                    echo "<tr>";
                    echo "<td>" . $_SESSION['uid'] . "</td>";
                    echo "<td>" . $data['st_tc']['student_name'] . "</td>";
                    echo "<td>" . $data['st_tc']['teacher_name'] . "</td>";
                    echo "<td>" . $data['st_tc']['time'] . "</td>";
                    echo "<td>" . $data['st_tc']['isConfirmed'] . "</td>";
                    echo "</tr>";
                    //}
                } else {
                    echo "<tr><td colspan='6'><p text-align='center'>Sinh Viên Chưa Đăng Kí Giảng Viên nào</p></td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
