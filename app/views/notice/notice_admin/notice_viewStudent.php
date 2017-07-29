<!--Thong bao ket qua cho nguoi dung-->
<?php
if (isset($data['notice'])) {
    switch ($data['notice']) {
        case 0:
            ?> 
            <script>alert('Lỗi hệ thống, yêu cầu của bạn không được thực hiện')</script>
            <?php
            break;
        case 1:
            ?>
            <script>alert('Chúc mừng bạn đã thực hiện thành công')</script>                        
            <?php
            break;
        case 4:
            ?> 
            <script>alert('Bạn đã xóa thành công')</script>
            <?php
            break;
        case 5:
            ?> 
            <script>alert('Không thể xóa được do lỗi hệ thống')</script>       
            break;
        <?php
    }
}
?>