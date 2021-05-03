<?php
    require_once('./includes/include.php');
    require_once('./includes/conn.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
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
                        <div class="left-nav">
                            <a class="navbar-brand" href="./index.html">
                                <img src="./image/logo-fix.png" alt="">
                            </a>
                            <form class="">
                                <div class="input-group navbar-search">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary" type="button"><i class="fa fa-search"></i></button>
                                    </div>
                                    <input type="text" class="form-control" placeholder="" aria-label=""
                                        aria-describedby="basic-addon1" style="border-radius: 0 5px 5px 0;">
                                </div>
                            </form>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse header-navbar--content col-md-6 col-sm-9" id="navbarSupportedContent">
                            <div class="navbar-select">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="./index.html#laptop">Laptop</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="./index.html#sales">Giảm giá</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="./index.html#bestseller">Bán chạy</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="./cart.html">Giỏ hàng</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="./login.html">Tài khoản</a>
                                        </li>
                                    </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
    </header>
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
    <section class="item">
        <div class="container">
            <div class="row item-title">
                <h2>Sản phẩm mới</h2>
            </div>
            <div class="row item-content">
                <div class="row">
                    <div class="card-group col-md-3 col-sm-6">
                        <?php 
                            $sql_all_product = "SELECT * FROM sanpham";
                            $res_all_product = Check_db($sql_all_product);
                            while ($row = mysqli_fetch_assoc($res_all_product)) {
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
                            <div class='card'>
                                <a href='./view_product.php?masp=<?php echo $masp ?>'>
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
                        <?php
                            } //end loop
                        ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- bestseller  -->
    <section id="bestseller" class="bestseller item">
        <div class="container">
            <div class="row bestseller-title item-title">
                <h2>Sản phẩm bán chạy</h2>
            </div>
            <div class="row bestseller-content item-content">
                <div class="row">
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
    <section id="sales" class="sales item">
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
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <ul>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
        <div class="bottom">
            <p>copyright</p>
        </div>
    </footer>
    <!-- script -->
    <!-- jquery  -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>

    <!-- popper -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>

    <!-- BS4 -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <!-- back to top -->
    <script>
        var mybutton = document.getElementById("myBtn");
        var headerNav = document.getElementsByTagName('header');
        console.log(headerNav);
         window.onscroll = function() {scrollFunction()};
        function scrollFunction() {
          if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            mybutton.style.display = "block";
          } else {
            mybutton.style.display = "none";
          }
        }
        function topFunction() {
          document.body.scrollTop = 0;
          document.documentElement.scrollTop = 0;
        }
</script>
    <!-- MAIN JS -->
    <script src="./js/main.js"></script>
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