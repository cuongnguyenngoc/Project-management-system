
<div class="content">
    <div class="wrapper">
        <div class="show_list">
            <label for="info">
                <h3>Thông tin giảng viên <?= $data['teacher']['teacher_name'] ?></h3>
            </label>
        </div>
        <table>
            <tbody>
                <?php
                echo "<tr>";
                echo "<th>Mã Giảng Viên</th>";
                echo "<td>" . $data['teacher']['teacher_id'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Tên Giảng Viên</th>";
                echo "<td>" . $data['teacher']['teacher_name'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Tên Bộ Môn</th>";
                echo "<td>" . $data['teacher']['dept_name'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Học Vị</th>";
                echo "<td>" . $data['teacher']['job'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Địa Chỉ Làm Việc</th>";
                echo "<td>" . $data['teacher']['address'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Email</th>";
                echo "<td>" . $data['teacher']['email'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Số Điện Thoại</th>";
                echo "<td>" . $data['teacher']['phone'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Hướng nghiên cứu</th>";
                echo "<td>" . $data['teacher']['trend_research'] . "</td>";
                echo "</tr>";
                ?>
            </tbody>
        </table>

    </div>
</div>


