<!--Thong bao ket qua cho nguoi dung-->
<?php
if (isset($data['notice'])) {
    switch ($data['notice']) {
        case 0:
            ?> 
            <script>alert('Bạn xác nhận lỗi')</script>
            <?php
            break;
        case 1:
            ?>
            <script>alert('Thực hiện thành công')</script>                        
            <?php
            break;
        case 2
            ?>
            <script>alert('Số sinh viên được xác nhận đã đạt mức cho phép, không được xác nhận nữa')</script>                        
            <?php
            break;
    }
}
?>
<!--Ket Thuc Thong Bao-->
