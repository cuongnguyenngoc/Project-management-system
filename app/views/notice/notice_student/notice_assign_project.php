<!--Thong bao ket qua cho nguoi dung-->
<?php
if (isset($data['notice'])) {
    switch ($data['notice']) {
        case 0:
            ?> 
            <script>alert('Bạn đăng kí lỗi')</script>
            <?php
            break;
        case 1:
            ?>
            <script>alert('Chúc mừng bạn đã đăng ký thành công')</script>                        
            <?php
            break;
        case 2:
            ?> 
            <script>alert('Không được phép đăng kí vì bạn chỉ được phép đăng ký một giáo viên thôi')</script>
            <?php
            break;
        case 3:
            ?>
            <script>alert('Giáo viên này đã full đăng ký, mời bạn đăng ký giáo viên khác')</script>
            <?php
            break;
        case 4:
            ?>
            <script>alert('Giáo viên này đã từ chối bạn, mời bạn đăng ký giáo viên khác')</script>
            <?php
            break;
    }
}
?>
<!--Ket Thuc Thong Bao-->