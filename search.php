<?php
    require_once('./includes/include.php');
    require_once('./includes/product.php');
//Check_role_in_site($_SESSION['maquyen']);
    $timkiem = $_GET['timkiem'];
?>
<!DOCTYPE html>
<html lang="en">
<?php include('./includes/head.php') ?>

<body>
    <!-- header -->
    <?php include('./includes/header.php') ?>
    <!-- filter -->
    <section id="laptop" class="filter">
        <div class="container">
            <div class="row">
                <div class="card">
                    <a href="#"><img src="./FE/image/MacBook44-b_27.png" alt=""></a>
                </div>
                <div class="card">
                    <a href="#"><img src="./FE/image/Acer44-b_25.jpg" alt=""></a>
                </div>
                <div class="card">
                    <a href="#"><img src="./FE/image/Asus44-b_1.png" alt=""></a>
                </div>
                <div class="card">
                    <a href="#"><img src="./FE/image/Dell44-b_2.jpg" alt=""></a>
                </div>
                <div class="card">
                    <a href="#"><img src="./FE/image/HP44-b_27.jpg" alt=""></a>
                </div>
                <div class="card">
                    <a href="#"><img src="./FE/image/Huawei44-b_7.jpg" alt=""></a>
                </div>
                <div class="card">
                    <a href="#"><img src="./FE/image/Lenovo44-b_35.png" alt=""></a>
                </div>
                <div class="card">
                    <a href="#"><img src="./FE/image/LG44-b_32.jpg" alt=""></a>
                </div>
                <div class="card">
                    <a href="#"><img src="./FE/image/MSI44-b_17.png" alt=""></a>
                </div>
            </div>
            <?php include('includes/filter.php') ?>
        </div>
    </section>
    <!-- search item -->
    <section class="searchItem" id="searchItem">
        <div class="container">
            <div class="row searchItem-title">
                <h2>Kết quả sản phẩm tìm kiếm với từ khóa "<strong><?php echo $timkiem ?></strong>"</h2>
            </div>
            <?php 
                if (isset($_GET['timkiem'])) {
                    $sql = "SELECT * FROM SANPHAM WHERE TENSP LIKE '%$timkiem%'";
                    $res = Check_db($sql);
                    if (mysqli_num_rows($res) > 0) {
            ?>
            <div class="row searchItem-content">
                <!-- <div class="row"> -->
                <div class="row" style="padding: 15px">
                    <?php
                        while ($row = mysqli_fetch_assoc($res)) {
                            $masp = $row['MASP'];
                            $tensp = $row['TENSP'];
                            $gia = $row['GIA'];
                            $phantram = View_Discount_Of_Product($masp);
                            if ($gia - $gia * $phantram / 100 != $gia) {
                                $giamoi = $gia - $gia * $phantram / 100;
                            } else {
                                $giamoi = "";
                            }
                            $kichthuocmh = $row['KICHTHUOCMH'];
                            $vixuly = $row['VIXULY'];
                            $ram = $row['RAM'];
                            $res_img = Get_image($masp);
                            $row_img = mysqli_fetch_assoc($res_img);
                            $hinhanh = $row_img['LINK'];
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
                </div>
            </div>
                    <?php
                                }
                            }
                            else{
                    ?>      <div class="row searchItem-content justify-content-center flex-column align-items-center">
                                <!-- <div class="row"> -->
                                <div class="row" style="padding: 15px">
                                    <img src='https://fptshop.com.vn/Content/v4/images/noti-search.png'>
                                </div>
                            <div>
                            <h3>Rất tiếc không tìm thấy kết quả của "<strong><?php echo $timkiem ?></strong>"</h3>
                    <?php 
                            }
                        }
                    ?>
        </div>
    </section>
    <!-- footer -->
    <?php include('./includes/footer.php') ?>
    <!-- script -->
    <?php include('./includes/script.php') ?>
</body>

</html>