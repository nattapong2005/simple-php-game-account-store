<?php

$user = $_SESSION['user'];
$userID = $user['id'];
$sql =  "SELECT * FROM user WHERE id = $userID";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);

?>

<div class="container">
    <div class="row d-flex justify-content-center mt-4">
        <div class="col-md-5">
            <h1 class="text-dark text-center p-3 shadow bg-white">แก้ไขข้อมูลส่วนตัว</h1>
        </div>
    </div>
    <div class="row d-flex  justify-content-center">
        <div class="col-md-8 p-3" style="width: 35rem;">
            <div class="card bg-white shadow">
                <div class="card-body">
                    <form action="" method="POST" class="py-4 g-3">
                        <div class="mb-3">
                            <label class="form-label fs-3"><i class="fa-solid fa-user"></i> ชื่อผู้ใช้งาน</label>
                            <input type="text" value="<?php echo $row['username'] ?>" class="form-control" disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fs-3"><i class="fa-solid fa-coins"></i> พ้อยคงเหลือ</label>
                            <input type="text" value="<?php echo $row['points'] ?>" class="form-control" disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fs-3"><i class="fa-solid fa-lock"></i> รหัสผ่านใหม่</label>
                            <input type="password" class="form-control" placeholder="New password" name="npassword" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fs-3"><i class="fa-solid fa-lock"></i> ยืนยันรหัสผ่านใหม่</label>
                            <input type="password" class="form-control" placeholder="Repeat passsword" name="rpassword" required>
                        </div>

                        <center><button class="btn btn-dark mb-3" type="submit" name="edit" style="width: 50%;"><i class="fa-solid fa-pen-to-square"></i> แก้ไขข้อมูล</button></center>
                        <center><a class="text-secondary text-center" href="?menu=home">กลับหน้าหลัก</a></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    h1 {
        border-radius: 30px;
    }
    .card {
        border: 0;
        border-radius: 30px;
    }

    .form-control {
        border: 0;
        border-bottom: 2px solid silver;
    }

    .form-control:focus {
        border-color: #3b3c3d;
        box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px;
    }
</style>

<?php

if (isset($_POST['edit'])) {

    $npassword =  $_POST['npassword'];
    $rpassword = $_POST['rpassword'];

    if ($npassword == $rpassword) {

        $rpassword = md5($rpassword);
        $sql = "UPDATE user SET password = '$rpassword' WHERE id = $userID ";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            showSuccess('logout.php', 'แก้ไขข้อมูลเรียบร้อย');
        } else {
            showFail('#', 'เกิดข้อผิดพลาด');
        }
    } else {
        showFail('#', 'รหัสผ่านไม่ตรงกัน');
    }
}


?>