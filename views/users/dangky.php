<?php
// Code Insert User
if (session_id() == '') {
    session_start();
}
require_once('database/dbhandle.php');
require_once('database/phpmailer/sendmail.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // die('Ban vua submit form');
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $verify_code = md5(rand(0, 1000000));
    $sql = "INSERT INTO user(username, name, email, password, verify_code) VALUES ('$username','$name', '$email', '$password_hash', '$verify_code')";

    if (query($sql)) {
        // Send mail
        // Cho nay de send mail
        $subject = 'Kich hoat tai khoan dang ky NTTU';
        $message = "
        <p>Vui long truy cap duong dan sau de kich hoat tai khoan</p>
        <a href='http://duong-kien.000webhostapp.com/activation.php?active={$verify_code}'>http://duong-kien.000webhostapp.com/activation.php?active={$verify_code}</a> 
        ";
        $sended = sendmail($email, $subject, $message);
        if ($sended) {
            $_SESSION['dangky_message'] = 'Bạn đã đăng ký tài khoản thành công!, vui lòng check mail để kích hoạt';
            header("Location:dangnhap.php");
        } else { }
    } else {
        // Khong dang ky duoc
        die('Something went wrong...');
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-10 col-lg-8 mx-auto bg-light py-5 my-5">
            <form action="dangky.php" method="post">
                <p class="display-4">Đăng Ký</p>
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" required name="username" class="form-control" placeholder="Enter Username ">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" required name="name" class="form-control" placeholder="Enter Name ">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" required name="email" class="form-control" placeholder="Enter email">

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" required name="password" class="form-control" placeholder="Enter Password">
                </div>
                <div class="form-group form-check">
                </div>
                <button type="submit" class="btn btn-primary">Đăng Ký</button>
            </form>
        </div>
    </div>
</div>