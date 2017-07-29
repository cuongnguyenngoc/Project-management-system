<script src="<?php echo BASE_URL ?>public/js/lib/jquery.js"></script>
<script src="<?php echo BASE_URL ?>public/js/dist/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL ?>public/js/functions/validateForm.js" type="text/javascript"></script>
<script>
    validate("#infoStudent");
</script>
<div class="content">
    <div class="wrapper">
        <label>
            <h3>
            <?php
            if (isset($_SESSION['notice'])) {
                echo $_SESSION['notice'];
                $_SESSION['notice'] = null; //hủy session thông báo luôn
            }else {
                echo "Cập nhật thông tin";
            }
            ?>
            </h3>
        </label>
        <div>
            <form  action="<?php echo BASE_URL; ?>profile/changeStudent" method="post" id="infoStudent">
                <ul id="info">
                    <li><h3>Thông tin </h3> </li>
                    <li>Tên : <?php echo $data['student']['student_name'] ?> </li>
                    <li>Ngày sinh: <?php echo $data['student']['birth'] ?> </li>
                    <li>Lớp: <?php echo $data['student']['class_name'] ?> </li>
                    <li>Khóa: <?php echo $data['student']['course_name'] ?> </li>
                    <li>Email:   <?php echo $data['student']['email'] ?> </li>
                    <li>Chỗ ở hiện tại: <input type="text" class="address" name="address" value="<?php echo $data['student']['address'] ?>"/></li>
                    <li><input class="button" type="submit" value="Cập nhật thông tin"></input></li>
                </ul>
            </form>
        </div>
    </div>
</div>
