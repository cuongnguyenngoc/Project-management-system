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
                    <th><a href="#">Số Thứ Tự</a></th>
                    <th><a href="#">Tên Giảng Viên</a></th>
                    <th><a href="#">Bô Môn</a></th>
                    <th><a href="#">Ðịa Chỉ</a></th>
                    <th><a href="#">Email</a></th>
                    <th><a href="#">Số Điện Thoại</a></th>
                    <th><a href="#">Học Vị</a></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($data['teachers'])) {
                    $position = 1;
                    foreach ($data['teachers'] as $teacher) {
                        echo "<tr>";
                        echo "<td>" . $position++ . "</td>";
                        echo "<td><a href='" . BASE_URL . "home/thong_tin_giang_vien/{$teacher['teacher_id']}'>" . $teacher['teacher_name'] . "</a></td>";
                        echo "<td>" . $teacher['dept_name'] . "</td>";
                        echo "<td>" . $teacher['address'] . "</td>";
                        echo "<td>" . $teacher['email'] . "</td>";
                        echo "<td>" . $teacher['phone'] . "</td>";
                        echo "<td>" . $teacher['job'] . "</td>";
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
