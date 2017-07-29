
<div class="content">
    <div class="wrapper">
        <div class="show_list">
            <label for="info">
                <h3>Thông tin sinh viên <?= $data['student']['student_name'] ?></h3>
            </label>
        </div>
        <table>
            <tbody>
                <?php
                echo "<tr>";
                    echo "<th>Mã Sinh Viên</th>";
                    echo "<td>" . $data['student']['student_id'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<th>Tên Sinh Viên</th>";
                    echo "<td>" . $data['student']['student_name'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<th>Học Tại Lớp</th>";
                    echo "<td>" . $data['student']['class_name'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<th>Thuộc Khóa</th>";
                    echo "<td>" . $data['student']['course_name'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<th>Địa Chỉ Nơi Ở</th>";
                    echo "<td>" . $data['student']['address'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<th>Email</th>";
                    echo "<td>" . $data['student']['email'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<th>Ngày Sinh</th>";
                    echo "<td>" . $data['student']['birth'] . "</td>";
                echo "</tr>";
                ?>
            </tbody>
        </table>

    </div>
</div>



