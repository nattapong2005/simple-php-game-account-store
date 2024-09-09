<div class="container mt-4">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <h1 class="mt-3 bg-white p-2 shadow"><img src="img/icon/code.png" width="50"> แลกรหัสโค้ด</h1>
        </div>
    </div>

    <div class="row d-flex justify-content-center mt-2">
        <div class="col-md-6">
            <div class="card bg-white shadow">
                <div class="card-body">
                    <h2 >กรอกรหัสโค้ด</h2>
                    <form action="" method="POST" class="mt-3">
                        <input type="text" name="code" class="form-control mb-3" placeholder="กรอกรหัสโค้ดที่นี่" required>
                        <input class="btn-done btn" type="submit" name="redeem_btn" value="ยืนยัน">
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

    .btn-done {
        width: 100%;
        background-color: #FF90BC;
        color: white;
    }

    .card {
        border: 0;
        border-radius: 30px;
        padding: 25px;
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

if (isset($_POST['redeem_btn'])) {

    $code = $_POST['code'];
    $sqlCheck = "SELECT * FROM redeem_code WHERE name = '$code' ";
    $queryCheck = mysqli_query($conn, $sqlCheck);

    if (mysqli_num_rows($queryCheck) == 1) {

        $row = mysqli_fetch_array($queryCheck);
        $codeID = $row['id'];
        $points = $row['points'];
        $max_use = $row['max_use'];

        if ($max_use > 0) {
            showFail('', 'โค้ดนี้ถูกใช้งานไปแล้ว');
        } else {
            showSuccess('', 'คุณได้รับพ้อย ' . $points . ' พ้อย');
            $sql = "UPDATE redeem_code SET max_use = 1 WHERE id = $codeID;";
            $sql .= "UPDATE user SET points = points + $points";
            $query = mysqli_multi_query($conn,$sql);
            if (!$query) {
                showFail('', 'เกิดข้อผิดพลาด');
            }
        }
    } else {
        showFail('', 'ไม่พบโค้ดนี้ในระบบ');
    }
}


?>