
<script>
    function doConfirm(sid, isConfirm) {
        var r = confirm('Are you sure');
        if (r == true) {

            location.href = "<?php echo BASE_URL; ?>teacher/confirm/" + sid + "/" + isConfirm;
        }
    }
    function notify() {
        alert("Hệ Thống không trong thời hạn nên hệ thống đóng quyền xác nhận")
    }
</script>

<div class="content">
    <div class="wrapper">
        <table>
            <thead>
                <tr>
                    <th><a href="">Mã Sinh Viên</a></th>
                    <th><a href="">Tên Sinh Viên</a></th>
                    <th><a href="">Lớp</a></th>
                    <th><a href="">Khóa </a></th>
                    <th><a href="">Email</a></th>
                    <th><a href="">Ngày Sinh</a></th>
                    <th><a href="">Địa Chỉ</a></th>
                    <th><a href="">Thời Gian Đăng Ký</a></th>
                    <th><a href="">Trạng Thái</a></th>
                    <th><a href="">Trạng Thái Xác Nhận</a></th>                   
                    <th><a href="">Xác Nhận</a></th>
                    <th><a href="">Từ Chối</a></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($data['st_tc'])) {
                    foreach ($data['st_tc'] as $st_tc) {
                        echo "<tr>";
                        echo "<td>" . $st_tc['student_id'] . "</td>";
                        echo "<td><a href='" . BASE_URL . "home/thong_tin_sinh_vien/{$st_tc['student_id']}'>" . $st_tc['student_name'] . "</a></td>";
                        echo "<td>" . $st_tc['class_name'] . "</td>";
                        echo "<td>" . $st_tc['course_name'] . "</td>";
                        echo "<td>" . $st_tc['email'] . "</td>";
                        echo "<td>" . $st_tc['birth'] . "</td>";
                        echo "<td>" . $st_tc['address'] . "</td>";
                        echo "<td>" . $st_tc['time'] . "</td>";
                        echo ($data['status'] == 1) ? "<td>Mở Xác Nhận</td>" : "<td>Kết Thúc Xác Nhận</td>";
                        echo "<td>";
                        if ($st_tc['isConfirmed'] == 0) {
                            echo "Chưa Đồng Ý";
                            echo "</br>";
                            echo "<td><input type='button' value='Xác Nhận' onclick='";
                            echo ($data['status']) ? "doConfirm({$st_tc['student_id']},1)" : "notify()";
                            echo "'/></td>";
                            echo "<td><input type='button' value='Từ Chối' onclick='";
                            echo ($data['status']) ? "doConfirm({$st_tc['student_id']},2)" : "notify()";
                            echo "'/></td>";
                        } elseif ($st_tc['isConfirmed'] == 1) {
                            echo "Đã Đồng Ý";
                            echo "</br>";
                            echo "<td>Đã Xác Nhận</td>";
                            echo "<td>Đã Xác Nhận</td>";
                        } else {
                            echo "Bị Từ Chối";
                            echo "</br>";
                            echo "<td>Đã Từ Chối</td>";
                            echo "<td>Đã Từ Chối</td>";
                        }
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='12' text-align='center'>Giảng Viên Chưa Có Sinh viên nào Đăng Kí</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <label>
            <h3>Thông tin kết quả</h3>
        </label>
        <table>
            <tbody>
                <tr>
                    <th>Số sinh viên đã xác nhận</th>
                    <td>
                        <?php
                        if (isset($data['studentAccepted'])) {
                            foreach ($data['studentAccepted'] as $student) {
                                echo $student['student_name'] . ", ";
                            }
                        } else {
                            echo "Chưa xác nhận sinh viên nào";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Số sinh viên đã từ chối</th>
                    <td>
                        <?php
                        if (isset($data['studentDenied'])) {
                            foreach ($data['studentDenied'] as $student) {
                                echo $student['student_name'] . ", ";
                            }
                        } else {
                            echo "Chưa có sinh viên nào bị từ chối bởi bạn";
                        }
                        ?>
                    </td>
                </tr>
                <tr>";
                    <th>Số sinh viên còn có thể nhận thêm</th>
                    <td><b><?=$data['amount']?></b></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

