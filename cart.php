<?php 
    require_once('./includes/include.php');
    $taikhoan = 'vinh';

    function View_Discount_Of_Product($masp){
        $sql_discount = "SELECT * FROM giamgia WHERE MAGIAMGIA = (SELECT MAGIAMGIA FROM sanpham WHERE MASP = '$masp');";
        $res_discount = Check_db($sql_discount);
        if(mysqli_num_rows($res_discount) > 0){
            $row_discount = mysqli_fetch_assoc($res_discount);
            return $row_discount['PHANTRAM'];
        }
        else{
            return 0;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CT250</title>

    <!-- BS4 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- FONT AWESOME  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <!-- FONT GOOGLE -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet">

    <!-- OWL CAROUSEL -->
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="./css/main.css">

</head>

<body>
    <!-- header -->
    <?php include('./includes/header.php') ?>
    <!-- cart item -->
    <section class="cartItem">
        <div class="container">
            <table id="tblItem" class="table">
                <thead id="tblHead">
                    <tr>
                        <th>Hình Ảnh Sản Phẩm</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Đơn Giá</th>
                        <th>Số lượng</th>
                        <th>Số Tiền</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>
                <tbody id="tblBody">
                    <?php 
                        $sql_cart = "SELECT * FROM SANPHAMGIOHANG, SANPHAM WHERE SANPHAMGIOHANG.MASP = SANPHAM.MASP and taikhoan = '$taikhoan'";
                        $res_cart = Check_db($sql_cart);
                        $temp = 0;
                        if(mysqli_num_rows($res_cart)){
                            while ($row = mysqli_fetch_assoc($res_cart)) {
                                $masp = $row['MASP'];
                                $tensp = $row['TENSP'];
                                $gia = $row['GIA'];
                                $phantram = View_Discount_Of_Product($masp);
                                if($gia - $gia*$phantram/100 < $gia){
                                    $gia = $gia - $gia*$phantram/100;
                                }
                                $soluonggio = $row['SOLUONGGIO'];
                                $temp++;
                    ?>
                    <form method="POST">
                    <tr>
                        <td>
                            <a href="#" class="cartItem__product">
                                <img src="./image/laptop.jpg" alt="">
                            </a>
                        </td>
                        <td>
                            <div class="cartItem__product--intro">
                                <h4><?php echo $tensp ?></h4>
                            </div>
                        </td>
                        <td><?php echo $gia ?></td>
                        <td>
                            <input type="number" class="" name="soluonggio" aria-label="" value='<?php echo $soluonggio ?>' size="5" min="1">
                        </td>
                        <td>
                            <?php echo $gia*$soluonggio;
                            ?>
                        </td>
                        <td>
                            <a href="xoa.php?masp=<?php echo $masp ?>" style="padding: 10px;"><i class="fa fa-trash-alt"></i></a>
                            <input type="submit" name="<?php echo $masp?>" value="luu">
                        </td>
                    </tr>
                    </form>

                    <?php 
                        }
                        if(isset($_POST[$masp])){
                            $soluonggio = $_POST['soluonggio'];
                            $sql = "UPDATE sanphamgiohang SET SOLUONGGIO='$soluonggio' WHERE TAIKHOAN='$taikhoan' AND MASP='$masp'";
                            if($res = Check_db($sql)){
                                echo "<script>alert('Cập nhật thành công!') </script>";
                                echo "<script>window.open('cart.php','_self')</script>";
                    
                            }
                            else{
                                echo "<script>alert('sua gio hang that bai')</script>";
                            }
                        }
                    } //end loop
                    ?>
                </tbody>
                <tfoot id="tblFooter">
                    <tr>
                        <td colspan="4"></td>
                        <th>
                            <span class="spacer"></span>
                            <span>Tổng tiền:</span>
                        </th>
                        <td id="tongTien" name="TongTien"></td>
                    </tr>
                    <tr>
                        <td colspan="5"></td>
                        <td>
                            <button><a href="./payment.html">MUA NGAY</a></button>
                        </td>
                    </tr>
                </tfoot>
            </table>
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

    <!-- OWL JS     -->
    <script src="./js/owl.carousel.min.js"></script>
    <script>
        $('.courses__carousel').owlCarousel({
            loop: true,
            margin: 15,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        });
    </script>
    <!-- MAIN JS -->
    <!-- <script src="./js/main.js"></script> -->
</body>
