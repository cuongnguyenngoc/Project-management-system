<!--Thong bao ket qua cho nguoi dung-->
<?php
if (isset($data['notice'])) {
    switch ($data['notice']) {
        case 0:
            ?> 
            <script>alert('Lỗi hệ thống không thể thêm được')</script>
            <?php
            break;
        case 1:
            ?>
            <script>alert('Chúc mừng bạn đã thêm sinh viên thành công')</script>                        
            <?php
            break;
            ?>
        <?php
    }
}
?>