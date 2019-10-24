<?php
function connect() // tạo kết nối với csdl
{
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'ntt';
    // $host = 'localhost';
    // $user = 'id11346510_ntt';
    // $password = '12345678';
    // $dbname = 'id11346510_localhost';
    $conn = mysqli_connect($host, $user, $password, $dbname);
    mysqli_set_charset($conn, 'utf8'); // xét kiểu tiếng việt cho kết nối
    if ($conn) {
        return $conn;
    } else {
        return false;
    }
}
function query($sql)  //query('SELECT * FROM user')
{
    $conn = connect();
    if ($conn) {
        $result = mysqli_query($conn, $sql);
        return $result;
    } else {
        die('Không thực hiện được câu lệnh sql!');
    }
}
function checkActive($active)
{
    $sql = "SELECT * FROM user WHERE verify_code = '{$active}'";
    $result = query($sql);
    $user = mysqli_fetch_assoc($result);
    if ($user) {
        $status = $user['active'];
        if ($status == 0) {
            $sql = "UPDATE user SET active = 1 WHERE id ={$user['id']}";
            $updated = query($sql);
            if ($updated) {
                return true;
            }
        } else {
            header("location:index.php");
        }
    } else {
        die('Mã active không tồn tại trên hệ thông, vui lòng kiểm tra lại!');
    }
}
function getuserByEmail($email)
{
    $sql = "SELECT * FROM user WHERE email = '{$email}'";
    $result = query($sql);
    $user = mysqli_fetch_assoc($result);
    return $user;
}
function addpost($img_title, $title, $content)
{
    $sql = "INSERT INTO post(user_id, img_title, title, content) VALUES ('{$_SESSION['user_id']}', '{$img_title}', '{$title}', '{$content}')";
    $added = query($sql);
    if ($added) {
        return true;
    } else {
        die('Không thêm được bài viết, vui lòng kiểm tra lại !');
    }
}
function get3post()
{
    $sql = "SELECT * FROM post ORDER BY created_at DESC LIMIT 0,3 ";
    $result = query($sql);
    if ($result) {
        $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $posts;
    } else {
        die('Không lấy được bài viết !');
    }
}
function getpost()
{
    $sql = "SELECT * FROM post ORDER BY created_at DESC";
    $result = query($sql);
    if ($result) {
        $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $posts;
    } else {
        die('Không lấy được bài viết !');
    }
}
function getpostbyid($id)
{
    $sql = "SELECT * FROM post WHERE id = $id ";
    $result = query($sql);
    if ($result) {
        $post = mysqli_fetch_assoc($result);
        return $post;
    } else {
        die('Không lấy được bài viết !');
    }
}
function deletepost($id)
{
    $sql = "DELETE  FROM post WHERE id = $id ";
    $deleted = query($sql);
    if ($deleted) {
        return true;
    } else {
        die('Không xóa được bài viết !');
    }
}
