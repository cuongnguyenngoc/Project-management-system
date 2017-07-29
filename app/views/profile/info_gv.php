
<script src="<?php echo BASE_URL ?>public/js/lib/jquery.js"></script>
<script src="<?php echo BASE_URL ?>public/js/dist/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL ?>public/js/functions/validateForm.js" type="text/javascript"></script>
<script>
    validate("#infoTeacher");
    //validateSelect("#formStudent");
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
            <form  action="<?php echo BASE_URL; ?>profile/changeTeacher" method="post" id="infoTeacher">
                <ul id="info">
                    <li><h3>Thông tin </h3> </li>
                    <li><label>Tên :</label> <?php echo $data['teacher']['teacher_name'] ?> </li>
                    <li><label>Bộ Môn:</label> <?php echo $data['teacher']['dept_name'] ?> </li>
                    <li><label>Email:</label>   <?php echo $data['teacher']['email'] ?> </li>
                    <li>Số Điện Thoại:  <input type="text" class="phone" name="phone" value="<?php echo $data['teacher']['phone'] ?>"/></li>
                    <li>Chỗ ở hiện tại: <input type="text" class="address" name="address" value="<?php echo $data['teacher']['address'] ?>"/></li>
                    <li>Hướng nghiên cứu: <textarea type="text" id="description" name="research" required rows="10" cols="70"><?php echo $data['teacher']['trend_research']?></textarea></li>
                    <li><input class="button" type="submit" value="Cập nhật thông tin"/></li>
                </ul>
            </form>
        </div>
    </div>
</div>