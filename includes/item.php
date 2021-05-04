<section class="item">
    <div class="container">
        <div class="row item-title">
            <h2>Sản phẩm mới</h2>
        </div>
        <div class="row item-content">
            <div class="row" style="padding: 15px">
                <?php
                $sql_all_product = "SELECT * FROM sanpham";
                $res_all_product = Check_db($sql_all_product);
                while ($row = mysqli_fetch_assoc($res_all_product)) {
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
                ?>
                    <div class="card-group col-md-3 col-sm-6">
                        <a href='./view_product.php?masp=<?php echo $masp ?>'>
                            <div class='card'>

                                <div class='card-header'>
                                    <img src='./image/laptop.jpg' class='card-img-top' alt=''>
                                </div>
                                <div class='card-body'>
                                    <h4 class='card-title'><?php echo $tensp ?></h4>
                                </div>
                                <span id='xemSP'>Xem sản phẩm</span>
                                <div class='card-footer'>
                                    <div class="d-flex justify-content-around">
                                        <span><?php echo $gia ?></span>
                                        <span style="color:red;"><?php echo $giamoi ?></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php
                } //end loop
                ?>
            </div>
        </div>
    </div>
</section>