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

    <title>Huakuy | Login</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row vh-100">
            <div class="col-md-6 align-self-center m-auto login-bg" style="width: 35rem;">
                <div class="card">
                    <div class="card-body py-5">
                        <form action="" method="POST">
                            
                            <h1 class="text-center display-4">เข้าสู่ระบบ</h1>

                            <label class="form-label fs-4"><i class="fa-solid fa-user"></i> ชื่อผู้ใช้งาน</label>
                            <input type="text" class="form-control py-2" placeholder="Username" name="username" required>

                            <label class="form-label fs-4"><i class="fa-solid fa-lock"></i> รหัสผ่าน</label>
                            <input type="password" class="form-control py-2" placeholder="Password" name="password" required>

                            <center><button class="mt-4 btn btn-dark fs-5 w-50" name="login" type="submit"><i class="fa-solid fa-right-to-bracket"></i> เข้าสู่ระบบ</button></center>

                            <div class="reg text-center mt-3">
                                <a class="text-decoration-none" href="register">หากคุณยังไม่มีบัญชี คลิกที่นี่</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5 img-bg " style="background-color: #7BD3EA;"></div>
        </div>
    </div>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Prompt', sans-serif;
        }

        .card {
            border: 0;
        }

        .form-control {
            border: 0;
            border-bottom: 2px solid silver;
        }

        .form-control:focus {
            border-color: #3b3c3d;
            box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px;
        }

        @media screen and (max-width: 1120px) {
            .img-bg {
                display: none;
            }
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>


<?php

if (isset($_POST['login'])) {

    $username  = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);

    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password' ";
    $query = mysqli_query($conn, $sql);

    $sqlCheck = "SELECT  * FROM user WHERE username = '$username' ";
    $queryCheck = mysqli_query($conn, $sqlCheck);

    if (mysqli_num_rows($queryCheck) == 0) {
        showFail('login', 'ไม่พบผู้ใช้งานนี้');
        return;
    }

    if (mysqli_num_rows($query) == 1) {

        $user = mysqli_fetch_array($query);
        $usertypeID = $user['usertypeID'];

        if ($usertypeID == 1) {

            $_SESSION['user'] =  $user;
            showSuccess('admin/index.php', 'เข้าสู่ระบบเรียบร้อย');
        } else if ($usertypeID == 2) {
            $_SESSION['user'] =  $user;
            showSuccess('/', 'เข้าสู่ระบบเรียบร้อย');
        }
    } else {
        showFail('login', 'รหัสผ่านไม่ถูกต้อง');
    }
}

?>