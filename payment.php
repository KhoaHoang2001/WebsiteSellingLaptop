<?php
require_once('./includes/include.php');
require_once('./includes/conn.php');
require_once('./includes/product.php');

// $taikhoan = $_SESSION['taikhoan'];
session_start();
$taikhoan = $_SESSION['taikhoan'];

$sql_account = "SELECT * FROM nguoidung where taikhoan = '$taikhoan'";
$res_account = Check_db($sql_account);
$temp = 0;
if (mysqli_num_rows($res_account)) {
  while ($row = mysqli_fetch_assoc($res_account)) {
    $tennd = $row['TENND'];
    $sdt = $row['SDT'];
    $email = $row['EMAIL'];
    $diachi = $row['DIACHI'];
  }
?>
  <!DOCTYPE html>
  <html lang="en">
  <?php include('./includes/head.php') ?>

  <body>
    <!-- header -->
    <?php include('./includes/header.php') ?>
    <!-- payment page-->
    <section id="payment" class="privacy">
      <div class="container">
        <!-- tittle heading -->
        <h2 id="payment-title" class="text-center">
          <span>P</span>ayment
        </h2>

        <section class="cartItem">
          <div class="container">
            <form action="charge.php" method="POST">
            <table id="tblItem" class="table">
              <thead id="tblHead">
                <tr>
                  <th>Hình Ảnh Sản Phẩm</th>
                  <th>Tên Sản Phẩm</th>
                  <th>Đơn Giá</th>
                  <th>Số lượng</th>
                  <th>Số Tiền</th>
                </tr>
              </thead>
              <tbody id="tblBody">
                <?php
                $sql_cart = "SELECT * FROM SANPHAMGIOHANG, SANPHAM WHERE SANPHAMGIOHANG.MASP = SANPHAM.MASP and taikhoan = '$taikhoan'";
                $res_cart = Check_db($sql_cart);
                $temp = 0;
                if (mysqli_num_rows($res_cart)) {
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
                          <span><?php echo $soluonggio ?></span>
                        </td>
                        <td>
                          <?php echo $gia * $soluonggio;
                          ?>
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
                  <td colspan="3">
                  </td>
                  <th style="text-align: center;">
                    <span>Tổng tiền:</span>
                  </th>
                  <!-- tong tien don hang-->
                  <td id="tongTien" name="TongTien"><?php $tongtien ?></td> 
                </tr>
                <tr>
                  <td colspan="2" style="padding: 0;">
                    <div id="thongTinTaiKhoan">
                      <form action="" method="">
                        <table>
                          <tr>
                            <th>
                              <label for="firstName">Họ tên:</label>
                            </th>
                            <td>
                              <input type="text" name="tennd" id="userFistName" value="<?php echo $tennd ?>" />
                            </td>
                          </tr>
                          <tr>
                            <th>
                              <label for="email">Email:</label>
                            </th>
                            <td>
                              <input type="email" name="email" id="userEmail" value="<?php echo $email ?>" />
                            </td>
                          </tr>
                          <tr>
                            <th>
                              <label for="sdt">Số điện thoại:</label>
                            </th>
                            <td>
                              <input type="tel" name="sdt" id="" value="<?php echo $sdt ?>" />
                            </td>
                          </tr>
                          <tr>
                            <th>
                              <label for="diaChi">Địa chỉ:</label>
                            </th>
                            <td>
                              <input type="text" name="diaChi" id="" value="<?php echo $diachi ?>" />
                            </td>
                          </tr>
                        </table>
                      </form>
                    <?php }
                    ?>
                    </div>
                  </td>
                  <th style="text-align: center;">
                    Hình thức thanh toán:
                  </th>
                  <td style="text-align: center;">
                    <form action="">
                      <script id="scriptStripe" src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="<?php echo $stripe['publishable_key']; ?>" data-description="Thanh toán" data-locale="auto"></script>
                    </form>
                  </td>
                  <td style="text-align: center;">
                    <button id="codPayment">
                      <a href="./payment.php">Cash on delivery</a>
                    </button>
                  </td>
                </tr>
              </tfoot>
            </table>
            </form>
          </div>
        </section>

      </div>
    </section>
    <!-- //payment page -->
    <!-- footer -->
    <?php include('./includes/footer.php') ?>
    <!-- script -->
    <?php include('./includes/script.php') ?>
    <!-- active -->
    <script type="text/javascript">

    </script>
  </body>

  </html>