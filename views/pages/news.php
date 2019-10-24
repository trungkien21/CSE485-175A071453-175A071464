<?php
if (session_id() == '') {
    session_start();
}
require_once('database/dbhandle.php');
$posts = get3post();
?>
<!-- newspaper -->
<div class="news">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <h2>Tin Tức</h2>
                <span class="mb-3" style="width: 40px; height: 2px; background: #aa914d;display:block;"></span>
                <div class="content-news">
                    <!-- <div class="container"> -->
                    <div class="row mb-3">
                        <!--  -->
                        <?php foreach ($posts as $post) : ?>
                            <div class="col-sm-4">
                                <div class="card">
                                    <img src="<?php echo $post['img_title'] ?>" class="img-fluid">
                                    <div class="card-body pt-0 pl-2">
                                        <h5 class="card-title" style="font-style: 16px;"></h5> <a href="postdetail.php?id=<?php echo $post['id'] ?>"><?php echo $post['title'] ?></a></h5>
                                        <p class="card-text" style="font-size: 13px;"><?php echo $post['content'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!--  -->

                    </div>
                    <div class="row">
                        <div class="col-9 more">
                            <a href="#" class="mr-0"><i class="fa fa-chevron-circle-right mr-2 c-blue-a5"></i>Xem thêm</a>
                        </div>
                    </div>

                </div>

            </div>


            <div class="col-sm-3">
                <h2>Media</h2>
                <span class="mb-3" style="width: 40px; height: 2px; background: #aa914d;display:block;"></span>
                <div class="video">
                    <div class="img-container">
                        <iframe width="270" height="140" src="https://www.youtube.com/embed/JViDyojZzhs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <br>
                    <ul class="list-news">
                        <li><a href="#"><i class="fa fa-angle-right"></i>Điểm tin tháng 8</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i>ĐH Nguyễn Tất Thành - 20 năm dấu ấn một
                                chặng đường</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i>NỎ THẦN-TẬP 8 | BẬT MÍ VỀ NỎ THẦN VÀ NHỮNG
                                CÂU CHUYỆN CÓ THẬT</a></li>
                    </ul>
                    <div class="seemore-right my-4">
                        <a href="#"><i class="fa fa-chevron-circle-right mr-2 c-blue-a5"></i>Xem thêm</a>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
</div>
</div>

<!-- end newspaper -->