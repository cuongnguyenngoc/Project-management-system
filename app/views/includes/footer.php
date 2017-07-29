<div id="footer">
    <p>Copyright © 2015 Viện Công nghệ Thông tin và Truyền thông</p>
    <p>Đại học Bách Khoa Hà Nội.</p>
</div>
</div>
</body>
</html>
<!--Thong bao ket qua cho nguoi dung-->
<?php
if (isset($_SESSION['message']) && $_SESSION['message'] == "fail") {
    $_SESSION['message'] = null;
    echo "<script>alert('Email không tồn tại hoặc mật khẩu sai')</script>";
}
?>