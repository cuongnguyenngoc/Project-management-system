<script>
    function doSign(tid) {
        var r = confirm('Are you sure');
        if (r == true) {

            location.href = "<?php echo BASE_URL; ?>teacher/updateProject/" + tid;
        }
    }
</script>

<div class = "content">
    <div class = "wrapper">
        <table>
            <thead>
                <tr>
                    <th> <a href="#"> Số thứ tự  </a> </th>
                    <th> <a href="#"> Tên đề tài </a> </th>
                    <th> <a href="#"> Mã đề tài  </a> </th>
                    <th> <a href="#"> Mô tả      </a> </th>
                    <th><a href="">Chỉnh sửa</a></th>
                    <th><a href="">Xóa</a></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($data['projects'])) {
                    $position = 1;
                    foreach ($data['projects'] as $project) {
                        echo "<tr>";
                        echo "<td>" . $position++ . "</td>";
                        echo "<td>" . $project['project_Name'] . "</td>";
                        echo "<td>" . $project['project_id'] . "</td>";
                        echo "<td>" . $project['description'] . "</td>";
                        echo "<td><a href='" . BASE_URL . "teacher/cap_nhat_do_an/{$project['project_id']}'>Chỉnh sửa</a></td>";
                        echo "<td><a href='".BASE_URL."teacher/deleteProject/{$project['project_id']}'>Xóa</a></td>";
                        echo "</tr>";
                    }
                }else{
                    echo "<tr><td colspan='8'><p text-align='center'>Không có dữ liệu</p></td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

