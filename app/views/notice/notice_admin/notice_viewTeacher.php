<!--Thong bao ket qua cho nguoi dung-->
<?php
if (isset($data['notice'])) {
    switch ($data['notice']) {
        case 0:
            ?> 
            <script>alert('Không thể sửa được do lỗi hệ thống')</script>
            <?php
            break;
        case 1: 
            ?> 
            <script>alert('Bạn đã sua thành công')</script>
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