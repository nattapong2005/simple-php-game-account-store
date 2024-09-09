<?php

$sql = "SELECT * FROM idgame_type";
$query = mysqli_query($conn,$sql);


?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12" data-aos="fade-up" data-aos-duration="1500">
            <h1 class=" mb-3 p-3 shadow-sm bg-white"><img src="img/icon/product_type.png" width="50"> เลือกหมวดหมู่สินค้า</h1>
        </div>
    </div>

    <div class="row">

    <?php 
    while($row = mysqli_fetch_array($query)) {
    ?>
        <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-duration="2000">
            <div class="card shadow-sm">
                <img src="<?php echo "img/idgame_type_img/$row[idgame_type_img]"?>" class="card-img-top">
                <div class="card-body">
                <h1 class="text-center fw-bold"><?php echo $row['name'] ?></h1>
                <p class="lead text-center"><?php echo $row['description'] ?></p>
                <a class="btn buy-btn  w-100 mb-2" href="#">เลือกซื้อเลย</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<style>
    .card {
        border: 0;
    }
    h1, .card{
        border-radius: 30px;
    }
    .card-img-top {
        border-top-right-radius: 30px;
        border-top-left-radius: 30px;
    }
    .buy-btn  {
        border-radius: 30px;
        background-color: #BEADFA;
        color: white;
    }
    .buy-btn:hover {
        background-color: #DFCCFB;
        color: white;
    }
</style>