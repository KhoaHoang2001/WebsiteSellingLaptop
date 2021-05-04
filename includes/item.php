<section class="item">
        <div class="container">
            <div class="row item-title">
                <h2>Sản phẩm mới</h2>
            </div>
            <div class="row item-content">
                <div class="row">

                        <?php 
                            $sql_all_product = "SELECT * ,LINK FROM sanpham,hinhanh where sanpham.MASP=hinhanh.MASP";
                            $res_all_product = Check_db($sql_all_product);
                            while ($row = mysqli_fetch_assoc($res_all_product)) {
                                $masp = $row['MASP'];
                                $tensp = $row['TENSP'];
                                $gia = $row['GIA'];
                                $hinh=$row['LINK'];
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
                         <div class="card-group col-md-3 col-sm-6">
                            <div class='card'>
                                <a href='./view_product.php?masp=<?php echo $masp ?>'>
                                    <div class='card-header'>
                                        <img src='./admin/product_images/<?php echo $hinh ?>' class='card-img-top' alt=''>
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
                            } //end loop
                        ?>

                    
                </div>
            </div>
        </div>
</section>