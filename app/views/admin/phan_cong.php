<script>
    function notify() {
        alert("Hệ thống đang trong thời hạn đăng ký, vì vậy không thể tự động phân công được, phải hết hạn đăng ký đã")
    }
</script>
<div class="content">
    <div class="wrapper">
        <table>
            <thead>
                <tr>
                    <th><a href="">Số Thứ Tự</a></th>
                    <th><a href="">Mã Sinh Viên</a>
                    <th><a href="">Tên Sinh Viên</a></th>
                    <th><a href="">Tên Giảng Viên</a></th>
                    <th><a href="">Time</a></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $position = 1;
                if (isset($data['results'])) {
                    foreach ($data['results'] as $result) {
                        echo "<tr>";
                        echo "<td>" . $position++ . "</td>";
                        echo "<td>" . $result['student_id'] . "</td>";
                        echo "<td><a href='" . BASE_URL . "home/thong_tin_sinh_vien/{$result['student_id']}'>" . $result['student_name'] . "</a></td>";
                        echo "<td><a href='" . BASE_URL . "home/thong_tin_giang_vien/{$result['teacher_id']}'>" . $result['teacher_name'] . "</a></td>";
                        echo "<td>" . $result['time'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'><p text-align='center'>Chưa có sinh viên nào đăng ký</p></td></tr>";
                }
                ?>
            </tbody>
        </table>
        <form action="<?php echo BASE_URL;?>admin/phan_cong" method="POST" class="division">
            <input type="submit" value="Phân Công Tự Động" class="assign"
                   <?php if (!$data['status']) echo "onclick='notify()'"; ?>/>
        </form>
        
    </div>
</div>

