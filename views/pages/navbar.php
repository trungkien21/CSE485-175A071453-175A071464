<!-- header -->
<?php if (session_id() == '') session_start(); ?>
<div class="top-header">
    <span class="top-header__hotline">HOTLINE: 0912.289.300 - 0906.289.300</span>
    <div class="top-header__right">
        <ul class="top-header__items">
            <li class="top-header__item">Sinh Viên</li>
            <li class="top-header__item">Giảng Viên</li>
            <li class="top-header__item">Đào Tạo Quốc Tế</li>
            <?php if (isset($_SESSION['name'])) : ?>
                <li class="top-header__item"><a href="profile.php">Xin chào <?php echo $_SESSION['name'] ?></a></li>
                <li class="top-header__item"><a href="dangxuat.php">Đăng Xuất</a></li>
            <?php else : ?>
                <li class="top-header__item"><a href="dangnhap.php">Đăng Nhập</a></li>
                <li class="top-header__item"><a href="dangky.php">Đăng Ký</a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>

<div class="main-header">
    <div class="main-header__image">
        <a href="index.php"><img src=" public/img/logo_ntt.png" alt=""></a>
    </div>
    <div class="main-header__right">
        <ul class="main-header__items">
            <li class="main-header__item"><i class="fa fa-info-circle"></i> giới thiệu</li>
            <li class="main-header__item"><i class="fa fa-graduation-cap"></i> tuyển sinh</li>
            <li class="main-header__item"><i class="fa fa-book"></i> đào tạo</li>
            <li class="main-header__item"><i class="fa fa-bookmark"></i> nghiên cứu</li>
            <li class="main-header__item"><i class="fa fa-handshake-o"></i> hợp tác doanh nghiệp</li>
        </ul>
    </div>
</div>


<!-- end header -->