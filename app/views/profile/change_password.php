<script src="<?php echo BASE_URL ?>public/js/lib/jquery.js"></script>
<script src="<?php echo BASE_URL ?>public/js/dist/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL ?>public/js/functions/validateForm.js" type="text/javascript"></script>
<script>
    validate("#changePass");
    //validateSelect("#formStudent");
</script>
<div class="content">
    <div class="wrapper">
        <label>
            <h3>
            <?php
            if (isset($data['message'])&&$data['message']==1) {
                echo "Bạn đã thay đổi thành công";
            }elseif(isset($data['message'])&&$data['message']==0){
                echo "Lỗi hệ thống, thử lại sau";
            }else{
                echo "Thay đổi mật khẩu";
            }
            echo (isset($data['oldpass']))?"<p class='fail'>".$data['oldpass']."</p>":"";
            echo (isset($data['confirm']))?"<p class='fail'>".$data['confirm']."</p>":"";
            ?>
            </h3>
        </label>
        <div>
            <form  action="" method="post" id="changePass">
                <ul id="info">
                    <li><h3>Thông Tin Tài Khoản</h3> </li>
                    <li>Mật khẩu cũ: <input type="text" id="password" name="oldPass" value="" required/></li>
                    <li>Mật khẩu mới: <input type="text" id="password" name="newPass" value="" required/></li>
                    <li>Xác nhận mật khẩu: <input type="text" id="password" name="confirmPass" value="" required/></li>
                    <li><input class="button" type="submit" value="Thay Đổi"></input></li>
                </ul>
            </form>
        </div>
    </div>
</div>