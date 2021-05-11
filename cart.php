
<?php 
    require_once('./includes/include.php');
    require_once('./includes/conn.php');
if(isset($_SESSION['taikhoan'])){
    
   $taikhoan=$_SESSION['taikhoan'];
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
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include('./includes/head.php') ?>

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
                    if (mysqli_num_rows($res_cart)) {
                        $tongtien = 0 ;
                        while ($row = mysqli_fetch_assoc($res_cart)) { 
                            
                            $masp = $row['MASP'];
                            $tensp = $row['TENSP'];
                            $gia = $row['GIA'];
                            $phantram = View_Discount_Of_Product($masp);
                            if ($gia - $gia * $phantram / 100 < $gia) {
                                $gia = $gia - $gia * $phantram / 100;
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
                                        <input type="number" class="" name="soluonggio" value='<?php echo $soluonggio ?>' min="1">
                                    </td>
                                    <td class="tongTienSP">
                                        <?php echo $gia * $soluonggio;
                                            $tongtien += $gia * $soluonggio;
                                        ?>
                                    </td>
                                    <td>
                                        <a href="xoa.php?masp=<?php echo $masp ?>" style="padding: 10px;"><i class="fa fa-trash-alt"></i></a>
                                        <input type="submit" name="<?php echo $masp ?>" value="Lưu">
                                    </td>
                                </tr>
                            </form>

                    <?php
                        }
                        if (isset($_POST[$masp])) {
                            $soluonggio = $_POST['soluonggio'];
                            $sql = "UPDATE sanphamgiohang SET SOLUONGGIO='$soluonggio' WHERE TAIKHOAN='$taikhoan' AND MASP='$masp'";
                            if ($res = Check_db($sql)) {
                                echo "<script>alert('Cập nhật thành công!') </script>";
                                echo "<script>window.open('cart.php','_self')</script>";
                            } else {
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
                        <td id="tongTien" name="TongTien">
                            <?php echo $tongtien;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5"></td>
                        <td>
                            <button><a href="./payment.php">MUA NGAY</a></button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
    <!-- footer -->
    <?php include('./includes/footer.php') ?>
    <!-- script -->
    <?php include('./includes/script.php') ?>
</body>