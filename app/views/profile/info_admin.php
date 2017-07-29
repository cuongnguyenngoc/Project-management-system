
<script src="<?php echo BASE_URL ?>public/js/lib/jquery.js"></script>
<script src="<?php echo BASE_URL ?>public/js/dist/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL ?>public/js/functions/validateForm.js" type="text/javascript"></script>
<script>
    validate("#infoAdmin");
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
            <form  action="<?php echo BASE_URL; ?>profile/changeAdmin" method="post" id="infoAdmin">
                <ul id="info">
                    <li><h3>Thông tin </h3> </li>
                    <li>Tên : <?php echo $data['admin']['name'] ?> </li>
                    <li>Ngày sinh: <?php echo $data['admin']['birth'] ?> </li>
                    <li>Chỗ ở hiện tại: <input type="text" class="add" name="address" value="<?php echo $data['admin']['address'] ?>">  </input> </li>
                    <li>Email:   <input type="text" name="email" class="email" value="<?php echo $data['admin']['email'] ?>"> </input></li>
                    <li><input class="button" type="submit" value="Cập nhật Thông Tin"></input></li>
                </ul>
            </form>
        </div>
    </div>
</div>

