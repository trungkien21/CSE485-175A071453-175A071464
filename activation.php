<?php
if (session_id() == '') {
    session_start();
}
require_once('database/dbhandle.php');
if (isset($_GET['active'])) {
    $active = $_GET['active'];
    $result = checkActive($active);
    if ($result) {
        $_SESSION['dangky_message'] = 'Bạn đã kích hoạt tài khoản thành công! Vui lòng đăng nhập';
        header("Location:dangnhap.php");
    }
}
