<?php

include('./db.php');

?>

<!-- Head Content -->
<!-- <div class="container mt-4" data-aos="fade-down" data-aos-duration="1500" >
    <h1 class="huakuy-text  text-center fw-bold" style="color: #7895B2;">Huakuy Store เว็บเปิดใหม่ ขายและสุ่มรหัสเกม</h1>
    <hr class="text-black">
</div> -->

<!-- Announcement Zone -->
<div class="container">
    <div class="row d-flex justify-content-center p-3">
        <div class="col-md-12">
            <marquee data-aos="fade-right" data-aos-easing="linear" data-aos-duration="1500" class="fs-3 text-dark p-2 shadow bg-white">“กำลังสร้าง มองหน้าได้ไหม”</marquee>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div data-aos="zoom-in" data-aos-duration="1000" class="row py-5 text-white d-flex justify-content-center align-items-center shadow" style="background-color: #BEADFA;border-radius: 30px;">
            <div class="col-md-6 px-5 mb-5  huakuy-store">
                <h1 class="fw-bold">HUAKUY STORE เว็บเปิดใหม่</h1>
                <!-- <hr class="text-secondary"> -->
                <h5 class="fw-bold">จำหน่ายรหัส Valorant <span>เริ่มต้น 10 บาท</span></h5>
                <a class="btn btn-light select-btn" href="#" style="width: 12rem;">เลือกสินค้า</a>
            </div>

            <div class="col-md-6">
                <img src="https://preview.redd.it/r42ud5afhy881.png?width=806&format=png&auto=webp&s=e5b19c4ab56e37867e55f9d15c0bda1b11c2e4f8" class="img-fluid">
            </div>
        </div>
    </div>

    <!-- Cards -->
    <div class="container mt-3">
        <div class="row" data-aos="fade-up" data-aos-duration="1500">
            <div class="col-md-3 mb-2">
                <a href="?menu=product_home">
                    <div class="card card-hover shadow-sm text-white" style="background-color: #7BD3EA;">
                        <div class="card-body text-center">
                            <img src="img/icon/cart.png" width="100">
                            <h1>เลือกสินค้า</h1>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mb-2">
                <a href="?menu=topup">
                    <div class="card card-hover shadow-sm text-white" style="background-color: #A1EEBD;">
                        <div class="card-body text-center">
                            <img src="img/icon/donate.png" width="100">
                            <h1>เติมเงิน</h1>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mb-2">
                <a href="?menu=redeem_code">
                    <div class="card card-hover shadow-sm text-white" style="background-color: #FF8080;">
                        <div class="card-body text-center">
                            <img src="img/icon/code.png" width="100">
                            <h1>แลกโค้ด</h1>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mb-2">
                <a href="?menu=contact">
                    <div class="card card-hover shadow-sm text-white" style="background-color: #FFCF96;">
                        <div class="card-body text-center">
                            <img src="img/icon/contact.png" width="100">
                            <h1>ติดต่อเรา</h1>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Recommend Product -->
    <div class="container mt-3 mb-3">
        <div class="row" data-aos="fade-up-right" data-aos-duration="1500">
            <div class="col-md-12 bg-white mb-3 py-2 recommend_product shadow-sm">
                <h1 class="text-dark"><img src="img/icon/box.png" width="45"> สินค้าแนะนำ</h1>
            </div>
        </div>
        <div class="row d-flex justify-content-center text-center">
            <?php
            $recommendProduct = "SELECT * FROM recommend_product";
            $query = mysqli_query($conn, $recommendProduct);
            while ($row = mysqli_fetch_array($query)) {
            ?>
                <div class="col-md-4 mb-2" data-aos="fade-up" data-aos-duration="1500">
                    <div class="card shadow bg-light">
                        <img src="<?php echo "img/recommend_product/$row[img_name]" ?>" class="card-img-top">
                        <div class="card-body">
                            <h1 class="fw-bold text-dark"><?php echo $row['name'] ?></h1>
                            <p class="lead text-center">สินค้าราคาดีเพียบ</p>
                            <a class="btn view w-100 mb-2" href="#">คลิกเพื่อดู</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>


    <style>
        a {
            text-decoration: none;
        }

        .card {
            border-radius: 30px;
            border: 0;
        }

        .card-img-top {
            height: 33vh;
            object-fit: cover;
            border-top-right-radius: 30px;
            border-top-left-radius: 30px;
        }

        .recommend_product,
        marquee {
            border-radius: 30px;
        }

        .view {
            border-radius: 30px;
            background-color: #b30415;
            color: white;
        }

        .view:hover {
            background-color: #cccccc;
            color: white;
        }

        .card-hover {
            transition: all 0.35s ease;
        }

        .card-hover:hover {
            transform: translateX(-10px);
        }
        .select-btn {
            border-radius: 30px;
        }

        u {
            color: black;
        }

        @media screen and (max-width: 500px) {

            .huakuy-store h1,
            h5 {
                font-size: 17px;
            }

        }
    </style>