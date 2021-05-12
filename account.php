<?php
require_once('./includes/include.php');
require_once('./includes/conn.php');
$taikhoan = $_SESSION['taikhoan'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $TENND = ($_POST["tennd"]);
  $GIOITINH = ($_POST['gioiTinh']);
  $EMAIL = $_POST['email'];
  $SDT = $_POST['sdt'];
  $DIACHI = $_POST['diaChi'];
  // echo $GIOITINH."".$EMAIL."".$SDT;
  $conn = Connect();
  $sql1 = "UPDATE nguoidung SET TENND='$TENND',GIOITINH='$GIOITINH', EMAIL='$EMAIL',SDT='$SDT',DIACHI='$DIACHI' WHERE TAIKHOAN='$taikhoan'";
  if ($conn->query($sql1)) {
  } else {
    echo "error: " . $sql1 . "<br>" . $conn->error;
  }
  $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include('./includes/head.php') ?>


<body>
  <!-- header -->
  <?php include('./includes/header.php') ?>
  <!-- account info -->
  <section id="account">
    <div class="container">
      <h4>Tài khoản</h4>
      <div class="row">
        <div id="account__left">
          <ul id="setting__menu">
            <li>
              <a href="#" id="TTTK" onclick="activeTTTK()" style="background-color: #ffa600;">Thông tin tài khoản</a>
            </li>
            <li>
              <a href="#" id="TTDH" onclick="activeTTDH()">Trạng thái đơn hàng</a>
            </li>
            <li>
              <a href="#" id="LSMH" onclick="activeLSMH()">Lịch sử mua hàng</a>
            </li>
            <li>
              <a href="#" id="DMK" onclick="activeDMK()">Đổi mật khẩu</a>
            </li>
            <li><a href="./logout.php" id="DX">Đăng xuất</a></li>
          </ul>
        </div>
        <div id="account__right">
          <div id="myAccount">
            <div id="thongTinTaiKhoan" align="center">
              <?php
              $sql_account = "SELECT * FROM nguoidung where taikhoan = '$taikhoan'";
              $res_account = Check_db($sql_account);
              $temp = 0;
              if (mysqli_num_rows($res_account)) {
                while ($row = mysqli_fetch_assoc($res_account)) {
                  $tennd = $row['TENND'];
                  $gioitinh = $row['GIOITINH'];
                  $sdt = $row['SDT'];
                  $email = $row['EMAIL'];
                  $diachi = $row['DIACHI'];

              ?>
                  <form action="" method="POST">
                    <table >
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
                          <label for="lastName">Giới tính:</label>
                        </th>
                        <td>
                          <input type="radio" name="gioiTinh" id='nam' value="Nam" checked>
                          <label for="gioiTinh">Nam</label>
                          <input type="radio" name="gioiTinh" id="nu" value="Nữ">
                          <label for="gioiTinh">Nữ</label>
                          <!-- <?php if ($gioitinh == 'Nữ') { ?>
                            <script>
                              document.getElementById('nu').checked = true;
                            </script>
                          <?php }
                          if ($gioitinh == 'Nam') { ?>
                            <script>
                              document.getElementById('nam').checked = true;
                            </script>
                          <?php } ?> -->
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
                      <tr>
                        <td></td>
                        <td>
                          <button type="submit" name="capnhat_tt">Cập nhật</button>
                        </td>
                      </tr>
                    </table>
                  </form>
              <?php }
              } ?>
            </div>
            <div id="trangThaiDonHang">
              <table id="trangThaiDonHang_tblItem" class="table">
                <thead id="trangThaiDonHang_tblHead">
                  <tr>
                    <th>Hình Ảnh Sản Phẩm</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Số lượng</th>
                    <th>Số Tiền</th>
                    <th>Trạng thái</th>
                  </tr>
                </thead>
                <tbody id="trangThaiDonHang_tblBody">
                  <tr>
                    <td>
                      <a href="#" class="trangThaiDonHang_product">
                        <img src="./FE/image/laptop.jpg" alt="" />
                      </a>
                    </td>
                    <td>
                      <div class="trangThaiDonHang_product--intro">
                        <h4>Title</h4>
                        <p>Lorem ipsum dolor sit amet.</p>
                      </div>
                    </td>
                    <td>
                      <span>1</span>
                    </td>
                    <td>5.000.000VND</td>
                    <td>Đang giao...</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div id="lichSuMuaHang">
              <div class="lichSuMuaHang">
                <table id="tblItem" class="table">
                  <thead id="tblHead">
                    <tr>
                      <th>Hình Ảnh Sản Phẩm</th>
                      <th>Tên Sản Phẩm</th>
                      <th>Số lượng</th>
                      <th>Số Tiền</th>
                      <th>Trạng thái</th>
                    </tr>
                  </thead>
                  <tbody id="tblBody">
                    <tr>
                      <td>
                        <a href="#" class="cartItem__product">
                          <img src="./FE/image/laptop.jpg" alt="" />
                        </a>
                      </td>
                      <td>
                        <div class="cartItem__product--intro">
                          <h4>Title</h4>
                          <p>Lorem ipsum dolor sit amet.</p>
                        </div>
                      </td>
                      <td>
                        <span>1</span>
                      </td>
                      <td>5.000.000VND</td>
                      <td>
                        <span>Đã nhận</span>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div id="doiMatKhau">
              <form action="" id="formDoiMatKhau">
                <table id="tblDoiMatKhau">
                  <tr>
                    <th>
                      <label for="matKhauCu">Mật khẩu cũ:</label>
                    </th>
                    <td style="width: 10px"></td>
                    <td>
                      <input type="password" name="" id="" />
                    </td>
                  </tr>
                  <tr style="height: 10px">
                    <th></th>
                    <td style="width: 10px"></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>
                      <label for="matKhauMoi">Mật khẩu mới:</label>
                    </th>
                    <td style="width: 10px"></td>
                    <td>
                      <input type="password" name="" id="" />
                    </td>
                  </tr>
                  <tr style="height: 10px">
                    <th></th>
                    <td style="width: 10px"></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>
                      <label for="confirmMatKhauMoi">Nhập lại mật khẩu mới:</label>
                    </th>
                    <td style="width: 10px"></td>
                    <td>
                      <input type="password" name="" id="" />
                    </td>
                  </tr>
                  <tr style="height: 10px">
                    <th></th>
                    <td style="width: 10px"></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td style="width: 10px"></td>
                    <td>
                      <input type="submit" value="Đổi mật khẩu" />
                    </td>
                  </tr>
                </table>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- footer -->
  <?php include('./includes/footer.php') ?>
  <!-- script -->
  <?php include('./includes/script.php') ?>
  <!-- active -->
  <script>
    function activeTTTK() {
      document.getElementById("TTTK").style.backgroundColor = "#ffa600";
      document.getElementById("TTDH").style.backgroundColor = "transparent";
      document.getElementById("LSMH").style.backgroundColor = "transparent";
      document.getElementById("DMK").style.backgroundColor = "transparent";
      document.getElementById("thongTinTaiKhoan").style.display = "block";
      document.getElementById("trangThaiDonHang").style.display = "none";
      document.getElementById("lichSuMuaHang").style.display = "none";
      document.getElementById("doiMatKhau").style.display = "none";
    }

    function activeTTDH() {
      document.getElementById("TTTK").style.backgroundColor = "transparent";
      document.getElementById("TTDH").style.backgroundColor = "#ffa600";
      document.getElementById("LSMH").style.backgroundColor = "transparent";
      document.getElementById("DMK").style.backgroundColor = "transparent";
      document.getElementById("thongTinTaiKhoan").style.display = "none";
      document.getElementById("trangThaiDonHang").style.display = "block";
      document.getElementById("lichSuMuaHang").style.display = "none";
      document.getElementById("doiMatKhau").style.display = "none";
    }

    function activeLSMH() {
      document.getElementById("TTTK").style.backgroundColor = "transparent";
      document.getElementById("TTDH").style.backgroundColor = "transparent";
      document.getElementById("LSMH").style.backgroundColor = "#ffa600";
      document.getElementById("DMK").style.backgroundColor = "transparent";
      document.getElementById("thongTinTaiKhoan").style.display = "none";
      document.getElementById("trangThaiDonHang").style.display = "none";
      document.getElementById("lichSuMuaHang").style.display = "block";
      document.getElementById("doiMatKhau").style.display = "none";
    }

    function activeDMK() {
      document.getElementById("TTTK").style.backgroundColor = "transparent";
      document.getElementById("TTDH").style.backgroundColor = "transparent";
      document.getElementById("LSMH").style.backgroundColor = "transparent";
      document.getElementById("DMK").style.backgroundColor = "#ffa600";
      document.getElementById("thongTinTaiKhoan").style.display = "none";
      document.getElementById("trangThaiDonHang").style.display = "none";
      document.getElementById("lichSuMuaHang").style.display = "none";
      document.getElementById("doiMatKhau").style.display = "block";
    }
  </script>
  <!-- MAIN JS -->
  <!-- <script src="./js/main.js"></script> -->

</body>

</html>