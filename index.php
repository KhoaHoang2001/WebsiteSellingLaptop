<?php
    require_once('./includes/include.php');
    require_once('./includes/conn.php');
?>

<!DOCTYPE html>
<html lang="en">
    <?php include('./includes/head.php') ?>
    <body>
    <!-- header -->
    <?php include('./includes/header.php') ?>
    <!-- banner -->
    <section class="carousel">
        <div class="container">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img src="./image/Slide-Galaxy-Buds-Live-2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./image/Slide-Mi-11-5G-1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./image/Slide-oppo-reno5.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
            </div>
    </section>
    <!-- filter -->
    <section id="laptop" class="filter">
        <div class="container">
            <div class="row">
                <div class="card">
                    <img src="./image/MacBook44-b_27.png" alt="">
                </div>
                <div class="card">
                    <img src="./image/Acer44-b_25.jpg" alt="">
                </div>
                <div class="card">
                    <img src="./image/Asus44-b_1.png" alt="">
                </div>
                <div class="card">
                    <img src="./image/Dell44-b_2.jpg" alt="">
                </div>
                <div class="card">
                    <img src="./image/HP44-b_27.jpg" alt="">
                </div>
                <div class="card">
                    <img src="./image/Huawei44-b_7.jpg" alt="">
                </div>
                <div class="card">
                    <img src="./image/Lenovo44-b_35.png" alt="">
                </div>
                <div class="card">
                    <img src="./image/LG44-b_32.jpg" alt="">
                </div>
                <div class="card">
                    <img src="./image/MSI44-b_17.png" alt="">
                </div>
            </div>
            <div class="row">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      RAM
                    </a>
                  
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="#">1GB</a>
                      <a class="dropdown-item" href="#">2GB</a>
                      <a class="dropdown-item" href="#">4GB</a>
                      <a class="dropdown-item" href="#">8GB</a>
                      <a class="dropdown-item" href="#">16GB</a>
                      <a class="dropdown-item" href="#">32GB</a>
                    </div>
                  </div>
                  <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Vi xử lý
                    </a>
                  
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="#">i3</a>
                      <a class="dropdown-item" href="#">i5</a>
                      <a class="dropdown-item" href="#">i7</a>
                      <a class="dropdown-item" href="#">i9</a>
                    </div>
                  </div>
                  <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Màn hình
                    </a>
                  
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="#"> Nhỏ hơn 13 inch</a>
                      <a class="dropdown-item" href="#">13 inch</a>
                      <a class="dropdown-item" href="#">14 inch</a>
                      <a class="dropdown-item" href="#">15 inch</a>
                      <a class="dropdown-item" href="#"> Lớn hơn 15 inch</a>
                    </div>
                  </div>
                  <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Giá
                    </a>
                  
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="#">Dưới 10 triệu</a>
                      <a class="dropdown-item" href="#">Từ 10 triệu đến 15 triệu</a>
                      <a class="dropdown-item" href="#">Từ 15 triệu đến 20 triệu</a>
                      <a class="dropdown-item" href="#">Từ 20 triệu đến 25 triệu</a>
                      <a class="dropdown-item" href="#">Hơn 20 triệu</a>
                    </div>
                  </div>
            </div>
        </div>
    </section>
    <!-- New Item -->
    <?php include('./includes/item.php') ?>
    <!-- bestseller  -->
    <section id="bestseller" class="bestseller">
        <div class="container">
            <div class="row bestseller-title item-title">
                <h2>Sản phẩm bán chạy</h2>
            </div>
            <div class="row bestseller-content item-content">
                <div class="col-12">
                    <?php 
                        $sql = "SELECT *,SUM(SOLUONGDAT)FROM sanpham,monhang where sanpham.MASP=monhang.MASP GROUP BY monhang.MASP 
                        ORDER BY SUM(SOLUONGDAT) DESC LIMIT 4";
                        $res = Check_db($sql);
                        while ($row = mysqli_fetch_assoc($res)) {
                            $masp = $row['MASP'];
                                $tensp = $row['TENSP'];
                                $gia = $row['GIA'];
                                $phantram = View_Discount_Of_Product($masp);
                                if($gia - $gia*$phantram/100 != $gia){
                                    $giamoi = $gia - $gia*$phantram/100;
                                }
                                else {
                                    $giamoi = "";
                                }
                                $kichthuocmh = $row['KICHTHUOCMH'];
                                $vixuly = $row['VIXULY'];
                                $ram = $row['RAM'];
                        ?>
                            <div class='card-group col-md-3 col-sm-6'>
                                <div class='card'>
                                    <a href='./view.html'>
                                        <div class='card-header'>
                                            <img src='./image/laptop.jpg' class='card-img-top' alt=''>
                                        </div>
                                        <div class='card-body'>
                                            <h4 class='card-title'><?php echo $tensp ?></h4>
                                            <p class='card-text'>
                                                <s>
                                                    <span><?php echo $gia?></span>
                                                </s>
                                                <span><?php echo $giamoi?></span>
                                            </p>
                                        </div>
                                        <span id='xemSP'>Xem sản phẩm</span>
                                    </a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                </div>
            </div>
        </div>
    </section>
    <!-- bestseller  -->
    <section id="sales" class="sales">
        <div class="container">
            <div class="row sales-title item-title">
                <h2>Sản phẩm giảm giá</h2>
            </div>
            <div class="row sales-content item-content">
                <div class="row">
                <?php 
                        $sql = "SELECT * FROM sanpham where MAGIAMGIA IS NOT NULL";
                        $res = Check_db($sql);
                        while ($row = mysqli_fetch_assoc($res)) {
                            $masp = $row['MASP'];
                                $tensp = $row['TENSP'];
                                $gia = $row['GIA'];
                                $phantram = View_Discount_Of_Product($masp);
                                if($gia - $gia*$phantram/100 != $gia){
                                    $giamoi = $gia - $gia*$phantram/100;
                                }
                                else {
                                    $giamoi = "";
                                }
                                $kichthuocmh = $row['KICHTHUOCMH'];
                                $vixuly = $row['VIXULY'];
                                $ram = $row['RAM'];
                        ?>
                            <div class='card-group col-md-3 col-sm-6'>
                                <div class='card'>
                                    <a href='./view.html'>
                                        <div class='card-header'>
                                            <img src='./image/laptop.jpg' class='card-img-top' alt=''>
                                        </div>
                                        <div class='card-body'>
                                            <h4 class='card-title'><?php echo $tensp ?></h4>
                                            <p class='card-text'>
                                                <span><?php echo $gia?></span>
                                                <span><?php echo $giamoi?></span>
                                            </p>
                                        </div>
                                        <span id='xemSP'>Xem sản phẩm</span>
                                    </a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                </div>
            </div>
        </div>
    </section>
    <!-- footer -->
    <?php include('./includes/footer.php') ?>
    <!-- script -->
    <?php include('./includes/script.php') ?>
    <!-- jquery  -->
    
</body>
</html>

<?php 
    function View_Discount_Of_Product($masp){
        $sql_discount = "SELECT * FROM giamgia WHERE MAGIAMGIA = (SELECT MAGIAMGIA FROM sanpham WHERE MASP = '$masp');";
        $res_discount = Check_db($sql_discount);
        if(mysqli_num_rows($res_discount) > 0){
            $row_discount = mysqli_fetch_assoc($res_discount);
            return $row_discount['PHANTRAM'];
        }
        else{
            return;
        }
}

?>