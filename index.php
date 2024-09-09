<?php
session_start();
include('db.php');
include('alert.php');



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <title>HuaKuy | Store</title>
</head>

<body class="bg-light">

    <!-- Navbar Section -->
    <nav class="navbar navbar-expand-lg navbar-white p-4 shadow-sm bg-white"> <!--style="background-color: #3b3c3d;" -->
        <div class="container-fluid">
            <h1 class="navbar-brand fw-bold fs-4" href="#">Huakuy Store</h1>
            <button class="navbar-toggler  navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <!-- <span class="navbar-toggler-icon"></span> -->
                <span class="toggler-icon top-bar"></span>
                <span class="toggler-icon middle-bar"></span>
                <span class="toggler-icon bottom-bar"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo isset($_GET['menu']) && $_GET['menu'] == "home" ? 'active' : '' ?>" aria-current="page" href="?menu=home"><img src="img/icon/home.png" width="26"> หน้าหลัก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo isset($_GET['menu']) && $_GET['menu'] == "topup" ? 'active' : '' ?>" href="?menu=topup"><img src="img/icon/wallet.png" width="26"> เติมเงิน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo isset($_GET['menu']) && $_GET['menu'] == "product_home" ? 'active' : '' ?>" href="?menu=product_home"><img src="img/icon/cart.png" width="26"> สินค้า</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo isset($_GET['menu']) && $_GET['menu'] == "history" ? 'active' : '' ?>" href="?menu=history"><img src="img/icon/history.png" width="26"> ประวัติการซื้อ</a>
                    </li>
                </ul>
                <!-- Login and Register -->
                <?php
                if (!isset($_SESSION['user'])) {
                ?>
                    <div class="check-btn">
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-dark shadow-sm" href="login"><img src="img/icon/card.png" width="25"> เข้าสู่ระบบ</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn shadow-sm" style="background-color: #9ADCFF;" href="register"><img src="img/icon/register.png" width="25"> ลงทะเบียน</a>
                        </li>
                    </div>
                <?php
                } else {
                    $user = $_SESSION['user'];
                    $username = $user['username'];
                    $userID = $user['id'];
                    $sql = "SELECT * FROM user WHERE id = $userID";
                    $query = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($query);

                ?>
                    <div class="dropdown">
                        <button class="btn border border-0  text-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="img/icon/user.png" width="26"> ชื่อผู้ใช้งาน <?php echo $username; ?>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-coins"></i> พ้อย <?php echo $row['points'] ?></a></li>
                            <li><a class="dropdown-item" href="?menu=profile"><i class="fa-solid fa-user"></i> ตั้งค่าบัญชี</a></li>
                            <li><a href="logout" class="dropdown-item"><i class="fa-solid fa-right-from-bracket"></i> ออกจากระบบ</a></li>
                        </ul>
                    </div>
                <?php } ?>
            </div>
        </div>
    </nav>


    <!-- Main Content -->
    <?php

    if (isset($_GET['menu'])) {
        $menu = $_GET['menu'];
    } else {
        $menu = "";
    }

    switch ($menu) {
        case "home": {
                $file = "user/home.php";
                break;
            }
        case "profile": {
                $file = "profile.php";
                break;
            }
        case "topup": {
                $file = "topup.php";
                break;
            }
        case "product_home": {
                $file = "product/product_home.php";
                break;
            }
        case "redeem_code": {
                $file = "redeem_code.php";
                break;
            }
        default: {
                $file = "user/home.php";
                break;
            }
    }
    include($file);
    ?>



    <!-- Footer -->
    <div class="footer container  py-3 text-center text-dark">
        <h5>Copyright 2024 <i class="fa-regular fa-copyright"></i> Huakuy Store All Right Reserved. </h5>
        <h5 class="hide-footer">Huakuy Store</h5>
        <!-- <hr class="text-dark"> -->
    </div>


    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <script src="js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>