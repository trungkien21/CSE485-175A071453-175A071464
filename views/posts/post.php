    <?php
    if (session_id() == '') {
        session_start();
    }
    require_once('database/dbhandle.php');
    if (isset($_SESSION['user_id'])) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Xử lý người dùng đăng ảnh
            $img_title = $_FILES['img_title'];
            $img_title_name = $img_title['name'];
            $img_title_tmp_name = $img_title['tmp_name'];
            $destination = 'public/uploads/posts/' . $img_title_name;
            $uploaded = move_uploaded_file($img_title_tmp_name, $destination);
            if ($uploaded) {
                $title = $_POST['title'];
                $content = $_POST['content'];
                $added = addpost($destination, $title, $content);
                if ($added) {
                    die("<div class=' mt-4 mx-auto col-5 alert alert-success'>Thêm bài thành công !</div>");
                } else {
                    die("<div class=' mt-4 mx-auto col-5 alert alert-danger'>Thêm bài thất bại !</div>");
                }
            }
        }
    } else {
        die("<div class=' mt-4 mx-auto col-5 alert alert-danger'>Vui lòng đăng nhập !</div>");
    }
    ?>
    <div class="container">
        <div class="col-sm-10 col-lg-8 mx-auto bg-light py-5 my-5">
            <form action="dangbai.php" method="post" enctype="multipart/form-data">
                <p class="display-4">Đăng Bài Viết</p>
                <label>Ảnh tiêu đề</label>
                <div class="custom-file">
                    <input type="file" name="img_title" class="custom-file-input" required>
                    <label class="custom-file-label">Chọn file...</label>
                </div>
                <div class="form-group">
                    <label class="mt-3">Tiêu đề bài viết</label>
                    <input type="text" name="title" required class="form-control" placeholder="Tiêu đề bài viết">
                </div>
                <div class="form-group">
                    <label>Nội dung bài viết</label>
                    <textarea class="form-control" id="validationTextarea" name="content" placeholder="Nội dung bài viết" rows="6" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Đăng Bài</button>
            </form>
        </div>
    </div>