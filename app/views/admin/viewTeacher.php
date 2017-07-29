
<script>
    function doSign(tid) {
        var r = confirm('Are you sure');
        if (r == true) {

            location.href = "<?php echo BASE_URL; ?>admin/xoa_giang_vien/" + tid;
        }
    }
    
</script>

<div class="content">
    <div class="wrapper">
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
                    <th>Chỉnh sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $position  = 1;
                foreach ($data['teachers'] as $teacher) {
                    echo "<tr>";
                    echo "<td>" . $position++ . "</td>";
                    echo "<td><a href='" . BASE_URL . "home/thong_tin_giang_vien/{$teacher['teacher_id']}'>" . $teacher['teacher_name'] . "</a></td>";
                    echo "<td>" . $teacher['dept_name'] . "</td>";
                    echo "<td>" . $teacher['address'] . "</td>";
                    echo "<td>" . $teacher['email'] . "</td>";
                    echo "<td>" . $teacher['phone'] . "</td>";
                    echo "<td>" . $teacher['job'] . "</td>";
                    echo "<td><a href='".BASE_URL."admin/manage/cap-nhat-thong-tin-giang-vien?tid={$teacher['teacher_id']}'>Chỉnh sửa</a></td>";
                    echo "<td><input type='button' value='Xóa' onclick='" . "doSign({$teacher['teacher_id']})" . "'/></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

    </div>
</div>
