
<script>
    function doSign(sid) {
        var r = confirm('Are you sure');
        if (r == true) {

            location.href = "<?php echo BASE_URL; ?>admin/xoa_sinh_vien/" + sid;
        }
    }

</script>

<div class="content">
    <div class="wrapper">
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
                    <th>Chỉnh sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
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
                    echo "<td><a href='" . BASE_URL . "admin/manage/cap-nhat-thong-tin-sinh-vien?sid={$student['student_id']}'>Chỉnh sửa</a></td>";
                    echo "<td><input type='button' value='Xóa' onclick='" . "doSign({$student['student_id']})" . "'/></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

    </div>
</div>
