<!DOCTYPE html>
<?php
$_SESSION['TAIKHOAN'] = 'bichngan';
$MASP = $_GET['masp'];
require_once('./includes/include.php');
require_once('./includes/conn.php');
require_once('./includes/product.php');
// require_once('.cart/tsx_SP_gio.php');

$sql = "SELECT * FROM sanpham where MASP='$MASP'";
$res = Check_db($sql);
$row = mysqli_fetch_assoc($res);
$mansx = $row['MANSX'];
$masp = $row['MASP'];
$tensp = $row['TENSP'];
$gia = $row['GIA'];
$phantram = View_Discount_Of_Product($masp);
$kichthuocmh = $row['KICHTHUOCMH'];
$vixuly = $row['VIXULY'];
$ram = $row['RAM'];
$motasp = $row['MOTASP'];
$ngaysx = $row['NGAYSX'];
if ($gia - $gia * $phantram / 100 != $gia) {
    $giamoi = $gia - $gia * $phantram / 100;
} else {
    $giamoi = "";
}
?>
<html lang="en">

<<<<<<< HEAD
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CT250</title>


    <!-- BS4 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- FONT AWESOME  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <!-- FONT GOOGLE -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="./css/main.css">

</head>

<body>
    <!-- header -->
    <header>
        <div class="container">
            <div class="row header-banner">
                <img src="./image/banner_TOP.png" alt="">
            </div>
            <div class="row header-navbar">
                <nav class="navbar navbar-expand-lg navbar-light bg-light col-12">
                    <div class="container nav-left-right">
                        <div class="left-nav d-flex">
                            <a class="navbar-brand" href="./index.html">
                                <img src="./image/logo-fix.png" alt="">
                            </a>
                            <form class="">
                                <div class="input-group navbar-search">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary" type="button">Button</button>
                                    </div>
                                    <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                                </div>
                            </form>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse header-navbar--content" id="navbarSupportedContent">
                            <div class="navbar-select">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="#laptop">Laptop</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#sales">Sales</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#bestseller">Bestseller</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="./cart.html">Cart</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="./login.html">Login</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
=======
<?php include('./includes/head.php') ?>

<body>
    <!-- header -->
    <?php include('./includes/header.php') ?>
>>>>>>> 2aa4f9bd15deb8a9710ecd98103ef2ddf9765288
    <!-- url link -->
    <section class="url">
        <div class="container">
            <div class="row">
                <a href="./index.html">Trang chủ ></a>

                <a href="#" name="TenNSX">&nbsp;<?php echo $mansx ?>></a>

                <a href="#" name="TenLoaiSP">&nbsp;<?php echo $tensp ?></a>
            </div>
        </div>
    </section>
    <!-- about item -->

    <section class="about_item">
        <div class="container">
            <div class="row about_item-title">
                <?php echo " <h2>" . $tensp . "</h2>" ?>
            </div>
            <div class="row about_item-intro">
                <div class="col-md-4">
                    <section class="carousel">
                        <div class="container">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
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
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                    </section>
                </div>
                <div class="col-md-4">
                    Giá <?php
                        if ($phantram != 0) {
                            echo "
                        <p class='card-text'>" . $gia . " " . $giamoi . " -" . $phantram . "%</p>";
                        }
                        ?>
                </div>
                <div class="col-md-4">
                    <form action="">
<<<<<<< HEAD
                        <?php echo "<a href='cart.php?masp=" . $MASP . "'>Thêm vào giỏ hàng</a>
                        <a href='cart.php?masp=$MASP'>Mua hàng</a>" ?>
=======
                        <?php echo"<a href='cart.php?masp=".$MASP."'>Thêm vào giỏ hàng</a>
                        <a href='cart.php?masp=$MASP'>Mua hàng</a>"?>
                        <button style="padding: 0;"><a href="http://localhost/weblaptop/cart/view.php?tenbien=SP02" style="display: block; padding: 10px;">Thêm vào giỏ hàng</a></button>
                        <button>Mua hàng</button>
>>>>>>> 2aa4f9bd15deb8a9710ecd98103ef2ddf9765288
                    </form>
                </div>
            </div>
            <div class="row about_item-info">
                <div class="col-md-8">
                    <p><?php echo $motasp ?></p>
                </div>
                <div class="col-md-4">
                    <h2>Thông số kỹ thuật</h2>
                    <ul>
                        <hr>
                        <li><?php echo $ram ?> GB</li>
                        <hr>
                        <li><?php echo $vixuly ?></li>
                        <hr>
                        <li><?php echo $kichthuocmh ?></li>
                        <hr>
                        <li>nsx <?php echo $ngaysx ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <?php include('./includes/item.php') ?>

    <!-- footer -->
    <?php include('./includes/footer.php') ?>
    <!-- script -->
<<<<<<< HEAD
    <!-- jquery  -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <!-- popper -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <!-- BS4 -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- MAIN JS -->
    <script src="./js/main.js"></script>
=======
    <?php include('./includes/script.php') ?>
>>>>>>> 2aa4f9bd15deb8a9710ecd98103ef2ddf9765288
</body>