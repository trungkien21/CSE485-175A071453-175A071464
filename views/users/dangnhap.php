<?php
require_once('database/dbhandle.php'); // gọi các hàm kết nối csdl đã viết trước đó
if (session_id() == '') session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {  // an nut dang nhap 
    $email = $_POST['email']; // gan bien email cho $_POST['email]
    $password = $_POST['password']; // gan bien password cho  $_POST['password'];
    $user = getuserByEmail($email); // kiem tra xem he thong co tai khoan nay chua
    if ($user) { // neu co thi vao day xu ly
        $password_hash = $user['password'];  // lay mat khau da ma hoa
        $checkPassword = password_verify($password, $password_hash); // kiem tra xem mat khau nguoi dung nhap co dung voi mat khau tren he thong hay k
        if ($checkPassword) { // neu dung thi vao day
            if ($user['active'] == 0) { // kiem tra xem nguoi dung da kich hoat tai khoan nay chua
                $_SESSION['dangky_message']  = 'Vui lòng kích hoạt tài khoản'; // thong bao cho nguoi dung checkmail kich hoat
                header('Location:dangnhap.php'); // chuyen trang sang dang nhap neu nguoi dung chua kich hoat
            } else { // kich hoat roi
                $_SESSION['name'] = $user['name']; // gan session name nguoi dung 
                $_SESSION['email'] = $user['email']; // gan session email nguoi dung
                $_SESSION['user_id'] = $user['id']; // gan session user_id nguoi dung
                $_SESSION['permission'] = $user['permission']; // gan session user_id nguoi dung
                header('Location:index.php'); // chuyen den trang chu
            }
        } else {
            die('Sai mat khau');
        }
    } else {
        die('Email đăng ký người dùng không tồn tại');
    }
}
?>
<div class="container">
    <div class="col-sm-10 col-lg-8 mx-auto bg-light py-5 my-5">
        <form action="dangnhap.php" method="post">
            <p class="display-4">Đăng Nhập</p>
            <?php
            if (isset($_SESSION['dangky_message'])) {
                echo "<div class='alert alert-success'>" . $_SESSION['dangky_message'] . "</div>";
                unset($_SESSION['dangky_message']);
            }
            ?>
            <div class="form-group">
                <label>Email address</label>
                <input type="email" name="email" required class="form-control" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required class="form-control" placeholder="Password">
            </div>

            <button type="submit" class="btn btn-primary">Đăng Nhập</button>
        </form>
    </div>
</div>