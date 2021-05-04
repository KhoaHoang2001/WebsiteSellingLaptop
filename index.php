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
                <ul id="filter-search">
                    <li>
                        <select name="RAM" id="RAM">
                            <option value="RAM">RAM</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </li>
                    <li>
                        <select name="CPU" id="CPU">
                            <option value="CPU">CPU</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </li>
                    <li>
                        <select name="MH" id="MH">
                            <option value="MH">MH</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </li>
                    <li>
                        <select name="Price" id="Price">
                            <option value="Price">Gia</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </li>
                </ul>
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
                <div class="col-12" style="padding: 0">
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
                                    <a href='./view_product.php'>
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
    <!-- bestseller  -->
    <section id="sales" class="sales">
        <div class="container">
            <div class="row sales-title item-title">
                <h2>Sản phẩm giảm giá</h2>
            </div>
            <div class="row sales-content item-content">
                <div class="col-12" style="padding: 0px;">
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