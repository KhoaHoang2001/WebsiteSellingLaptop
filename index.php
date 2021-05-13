<?php
require_once('./includes/include.php');
require_once('./includes/conn.php');
require_once('./includes/product.php');
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
                        <img src="./FE/image/Slide-Galaxy-Buds-Live-2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./FE/image/Slide-Mi-11-5G-1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./FE/image/Slide-oppo-reno5.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
            </div>
    </section>
    <!-- filter -->
    <section id="laptop" class="filter">
        <div class="container">
            <div class="row" style="margin-bottom: 20px;">
                <div class="card">
                    <a href="index.php?action=filter_producer&producer=macbook"><img src="./FE/image/MacBook44-b_27.png" alt=""></a>
                </div>
                <div class="card">
                    <a href="index.php?action=filter_producer&producer=acer"><img src="./FE/image/Acer44-b_25.jpg" alt=""></a>
                </div>
                <div class="card">
                    <a href="index.php?action=filter_producer&producer=asus"><img src="./FE/image/Asus44-b_1.png" alt=""></a>
                </div>
                <div class="card">
                    <a href="index.php?action=filter_producer&producer=dell"><img src="./FE/image/Dell44-b_2.jpg" alt=""></a>
                </div>
                <div class="card">
                    <a href="index.php?action=filter_producer&producer=hp"><img src="./FE/image/HP44-b_27.jpg" alt=""></a>
                </div>
                <div class="card">
                    <a href="index.php?action=filter_producer&producer=huawei"><img src="./FE/image/Huawei44-b_7.jpg" alt=""></a>
                </div>
                <div class="card">
                    <a href="index.php?action=filter_producer&producer=lenovo"><img src="./FE/image/Lenovo44-b_35.png" alt=""></a>
                </div>
                <div class="card">
                    <a href="index.php?action=filter_producer&producer=lg"><img src="./FE/image/LG44-b_32.jpg" alt=""></a>
                </div>
                <div class="card">
                    <a href="index.php?action=filter_producer&producer=msi"><img src="./FE/image/MSI44-b_17.png" alt=""></a>
                </div>
            </div>
            <?php include('includes/filter.php') ?>
        </div>
    </section>
    <!-- New Item -->
    <?php 
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            switch ($action) {
                case 'filter_ram';
                include './includes/filter_ram.php';
                break;
    
                case 'filter_producer';
                include './includes/filter_producer.php';
                break;
    
                case 'filter_screen';
                include './includes/filter_screen.php';
                break;
    
                case 'filter_cpu';
                include './includes/filter_cpu.php';
                break;
    
                case 'filter_price';
                include './includes/filter_price.php';
                break;
            }
        } else {
            include('./includes/item.php');
        }

        
     ?>
    <!-- bestseller  -->
    <section class="bestseller" id="bestseller" style="margin-top: 30px;">
        <div class="container">
            <div class="row bestseller-title">
                <h2>Sản phẩm bán chạy</h2>
            </div>
            <div class="row bestseller-content">
                <!-- <div class="row"> -->
                <div class="row" style="padding: 15px">
                    <?php
                    $sql = "SELECT * , SUM(SOLUONGDAT), LINK FROM sanpham,monhang,hinhanh where sanpham.MASP=monhang.MASP 
                        AND hinhanh.MASP=monhang.MASP GROUP BY monhang.MASP ORDER BY SUM(SOLUONGDAT) DESC LIMIT 4";
                    $res = Check_db($sql);
                    while ($row = mysqli_fetch_assoc($res)) {
                        $masp = $row['MASP'];
                        $tensp = $row['TENSP'];
                        $gia = $row['GIA'];
                        $hinh = $row['LINK'];
                        $phantram = View_Discount_Of_Product($masp);
                        if ($gia - $gia * $phantram / 100 != $gia) {
                            $giamoi = $gia - $gia * $phantram / 100;
                        } else {
                            $giamoi = "";
                        }
                        $kichthuocmh = $row['KICHTHUOCMH'];
                        $vixuly = $row['VIXULY'];
                        $ram = $row['RAM'];
                    ?>
                        <div class='card-group col-md-3 col-sm-6'>
                            <div class='card card-laptop-item'>
                                <a href='./view_product.php'>
                                    <div class='card-header'>
                                        <img src='./admin/product_images/<?php echo $hinh ?>' class='card-img-top' alt=''>
                                    </div>
                                    <div class='card-body'>
                                        <h4 class='card-title'><?php echo $tensp ?></h4>
                                    </div>
                                    <div class='card-footer'>
                                        <?php
                                        if ($giamoi == "") {
                                            echo " <span>" . $gia . "</span>";
                                        } else {
                                            echo "<s>
                                                        <span>" . $gia . "</span>
                                                    </s>
                                                    <span class='giaMoi'>" . $giamoi . "</span>";
                                        }
                                        ?>

                                    </div>
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
    <!-- sales  -->
    <section id="sales" class="sales" style="margin-top: 30px;">
        <div class="container">
            <div class="row sales-title">
                <h2>Sản phẩm giảm giá</h2>
            </div>
            <div class="row sales-content">
                <div class="row" style="padding: 15px">
                    <?php
                    $sql = "SELECT * ,LINK FROM sanpham,hinhanh where sanpham.MASP=hinhanh.MASP and MAGIAMGIA IS NOT NULL";
                    $res = Check_db($sql);
                    while ($row = mysqli_fetch_assoc($res)) {
                        $masp = $row['MASP'];
                        $tensp = $row['TENSP'];
                        $gia = $row['GIA'];
                        $hinh = $row['LINK'];
                        $phantram = View_Discount_Of_Product($masp);
                        if ($gia - $gia * $phantram / 100 != $gia) {
                            $giamoi = $gia - $gia * $phantram / 100;
                        } else {
                            $giamoi = "";
                        }
                        $kichthuocmh = $row['KICHTHUOCMH'];
                        $vixuly = $row['VIXULY'];
                        $ram = $row['RAM'];
                    ?>
                        <div class='card-group col-md-3 col-sm-6'>
                            <div class='card card-laptop-item'>
                                <a href='./view.html'>
                                    <div class='card-header'>
                                        <img src='./admin/product_images/<?php echo $hinh ?>' class='card-img-top' alt=''>
                                    </div>
                                    <div class='card-body'>
                                        <h4 class='card-title'><?php echo $tensp ?></h4>
                                    </div>
                                    <div class='card-footer'>
                                            <?php
                                            if ($giamoi == "") {
                                                echo " <span>" . $gia . "</span>";
                                            } else {
                                                echo "<s>
                                                        <span>" . $gia . "</span>
                                                    </s>
                                                    <span>" . $giamoi . "</span>";
                                            }
                                            ?>
                                        </div>
                                </a>
                            </div>
                            </a>
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
</body>

</html>
<?php
// function View_Discount_Of_Product($masp)
// {
//     $sql_discount = "SELECT * FROM giamgia WHERE MAGIAMGIA = (SELECT MAGIAMGIA FROM sanpham WHERE MASP = '$masp');";
//     $res_discount = Check_db($sql_discount);
//     if (mysqli_num_rows($res_discount) > 0) {
//         $row_discount = mysqli_fetch_assoc($res_discount);
//         return $row_discount['PHANTRAM'];
//     } else {
//         return;
//     }
// }
?>