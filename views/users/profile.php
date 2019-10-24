<?php
if (session_id() == '') session_start();
require_once('database/dbhandle.php'); // gọi các hàm kết nối csdl đã viết trước đó
$posts = getpost();
?>
<div class="container py-4">
    <a href="dangbai.php" class="btn btn-primary">Đăng Bài Viết</a>
    <?php if (isset($_SESSION['permission']) && $_SESSION['permission'] == 1) : ?>
        <h1 class="display-4 my-3">Tất cả bài viết</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Ảnh Tiêu đề</th>
                    <th>Tiêu đề</th>
                    <th>Nội dung tóm tắt</th>
                    <th>Xử lý</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post) : ?>
                    <div class="container">
                        <div class="row">
                            <tr>
                                <td class="col-1"> <img src="<?php echo $post['img_title'] ?>" class="img-fluid" style="width:60%"></td>
                                <td class="col-4"><?php echo $post['title'] ?></td>
                                <td class="col-5"><?php echo substr($post['content'], 0, 60) . '...' ?></td>
                                <td class="col-2"><a href="deletepost.php?id=<?php echo $post['id'] ?>">Xóa</a></td>
                            </tr>
                        </div>
                    </div>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <h1>Ban khong phai admin</h1>
    <?php endif; ?>
</div>