<?php
if (session_id() == '') {
    session_start();
}
require_once('database/dbhandle.php');
if (isset($_SESSION['user_id'])) {
    if (isset($_GET['id'])) {
        $deleted  = deletepost($_GET['id']);
        if ($deleted) {
            echo ("<div class=' mt-4 mx-auto col-5 alert alert-success'>Xóa bài viết thành công !</div>");
        }
    } else {
        die("<div class=' mt-4 mx-auto col-5 alert alert-danger'>Đường dẫn không hợp lê !</div>");
    }
} else {
    die("<div class=' mt-4 mx-auto col-5 alert alert-danger'>Bạn không có thẩm quyền truy cập, chỉ có admin mơi có thể truy cập!</div>");
}
