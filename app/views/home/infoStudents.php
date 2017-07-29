<div class="content">
    <div class="wrapper">
        <div class="mainHeader">
            <form action="" method="POST">
                <label for="name">Tên sinh viên: </label>
                <input type="text" value="<?php echo (isset($_POST['name'])) ? $_POST['name'] : '' ?>" name="name">
                <label for="Lớp">Lớp: </label>
                <select name="class">
                    <option value="">Chọn lớp</option>
                    <?php foreach ($data['class'] as $class) { ?>
                        <option value="<?php echo $class['class_id'] ?>" 
                                <?php if (isset($_POST['class']) && $_POST['class'] == $class['class_id']) echo "selected = 'selected'"; ?>><?= $class['class_name'] ?></option>
                            <?php } ?>
                </select>
                <label for="khoa">Khóa: </label>
                <select name="course">
                    <option value="">Chọn khóa</option>
                    <?php foreach ($data['courses'] as $course) { ?>
                        <option value="<?php echo $course['course_id'] ?>"
                                <?php if (isset($_POST['course']) && $_POST['course'] == $course['course_id']) echo " selected = 'selected'"; ?>><?= $course['course_name'] ?></option>
                            <?php } ?>
                </select>
                <input type="submit" value="Tìm Kiếm"/>
            </form>
        </div>
        <table>
            <thead>
                <tr>
                    <th><a href="#">Số Thứ Tự</a></th>
                    <th><a href="#">Tên Sinh Viên</a></th>
                    <th><a href="#">Lớp</a></th>
                    <th><a href="#">Khóa</a></th>
                    <th><a href="#">Email</a></th>
                    <th><a href="#">Địa Chỉ</a></th>
                    <th><a href="#">Ngày Sinh</a></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($data['students'])) {
                    $position = 1;
                    foreach ($data['students'] as $student) {
                        echo "<tr>";
                        echo "<td>" . $position++ . "</td>";
                        echo "<td><a href='" . BASE_URL . "home/thong_tin_sinh_vien/{$student['student_id']}'>" . $student['student_name'] . "</a></td>";
                        echo "<td>" . $student['class_name'] . "</td>";
                        echo "<td>" . $student['course_name'] . "</td>";
                        echo "<td>" . $student['email'] . "</td>";
                        echo "<td>" . $student['address'] . "</td>";
                        echo "<td>" . $student['birth'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'><p text-align='center'>Không có dữ liệu</p></td></tr>";
                }
                ?>
            </tbody>
        </table>

    </div>
</div>

