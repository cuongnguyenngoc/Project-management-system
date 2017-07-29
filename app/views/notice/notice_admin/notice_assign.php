<!--Thong bao ket qua cho nguoi dung-->
<?php
if (isset($data['notice'])) {
    if($data['notice']==1){
        echo "<script>alert('Phân công thành công, xem kết quả trên giao diện')</script>";
    }else{
        echo "<script>alert('Đã Phân công thành công rồi')</script>";
    }
}
?>
