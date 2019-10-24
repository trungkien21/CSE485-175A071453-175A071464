<?php
if (session_id() == '') {
    session_start();
}
require_once('database/dbhandle.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $post = getpostbyid($id);
    if (!$post) {
        die("<div class=' mt-4 mx-auto col-5 alert alert-danger'>Bài viết không tồn tại !</div>");
    }
} else {
    die("<div class=' mt-4 mx-auto col-5 alert alert-danger'>Đường dẫn không hợp lê !</div>");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang bài viết chi tiết</title>
</head>

<body>
    <div class="container mx-auto py-4 col-6">
        <img src="<?php echo $post['img_title'] ?>" class="img-fluid">
        <p class="text-muted py-2">Đăng ngày <?php echo $post['created_at'] ?></p>
        <h3><?php echo $post['title'] ?></h3>
        <p><?php echo $post['content'] ?></p>
    </div>

</body>

</html>