<div id="navigation">
    <div class="logo">
        <a href="#"><img alt="logo" src="<?php echo BASE_URL;?>public/images/logo.png"/></a>
    </div>
    <div class="menu">
        <ul>
            <li><a href="<?php echo BASE_URL; ?>">Trang Chủ</a></li>
            <li><a href="">Thông Tin Người Sử Dụng</a>
                <ul class="sub_menu">
                    <li><a href="<?php echo BASE_URL;?>profile/cap_nhat_thong_tin">Thông tin cá nhân</a></li>
                    <li><a href="<?php echo BASE_URL;?>profile/changePassword">Đổi mật khẩu</a></li>
                </ul>
            </li>
            <li><a href="<?php echo BASE_URL; ?>student/dang_ky_giang_vien">Đăng Ký Giảng Viên</a></li>
            <li><a href="#">Tra cứu</a>
                <ul class="sub_menu">
                    <li><a href="<?php echo BASE_URL ?>home/thong_tin_giang_vien">Giảng Viên</a></li>
                    <li><a href="<?php echo BASE_URL ?>home/thong_tin_sinh_vien">Sinh Viên</a></li>
                </ul>
            </li>
            <li><a href="<?php echo BASE_URL; ?>home/tin_tuc">Tin tức</a></li>
    </div>
    <div id="search">
        <form action="" method="GET">
            <input type="text" name="s" placeholder="Search.."/>
        </form>
    </div>
    <div class="clear"></div>
</div>
<div class="clear"></div>
</div>
</div> <!--End of header-->