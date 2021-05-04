<?php
require_once('./includes/include.php');
require_once('./includes/conn.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php include('./includes/head.php') ?>
    <body>
    <!-- header -->
    <?php include('./includes/header.php') ?>
    <!-- banner -->
  <!-- login form -->
  <section class="login-form">
    <div class="container">
      <div class="login-form-center" align="center">
        <h2>Đăng nhập</h2>
        <form action="" method="POST">
          <table>
            <tr>
              <th>
                <label for="Login">Tên đăng nhập:</label>
              </th>
              <td style="width: 10px"></td>
              <td>
                <input type="text" name="tenDangNhap" id="tenDangNhap" />
              </td>
            </tr>
            <tr style="height: 10px">
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <th>
                <label for="pwd">Mật khẩu:</label>
              </th>
              <td></td>
              <td>
                <input type="password" name="matKhau" id="matKhau" />
              </td>
            </tr>
            <tr style="height: 10px">
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td style="padding-left: 20px">
                <button type="button" style="padding: 5px 10px" onclick="DangNhap()">
                  Đăng nhập
                </button>
              </td>
              <td></td>
              <td>
                <button style="padding: 5px 10px">
                  <a href="./signup.php" style="text-decoration: none; color: black">Đăng ký</a>
                </button>
              </td>
            </tr>
          </table>
        </form>

  <!-- footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <ul>
            <li><a href="#">Giới thiệu công ty</a></li>
            <li><a href="#">Hệ thống cửa hàng</a></li>
            <li><a href="#">Tuyển dụng</a></li>
            <li><a href="#">Chính sách bảo mật</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <ul>
            <li><a href="#">Chính sách bảo hành</a></li>
            <li><a href="#">Chính sách đổi trả sản phẩm</a></li>
            <li><a href="#">Hỏi Đáp Mua Hàng Online</a></li>
            <li><a href="#">Phương Thức Thanh Toán</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <ul>
            <li><a href="#">Gọi mua hàng miễn phí: 0855.100.001</a></li>
            <li><a href="#">Gọi bảo hành & khiếu nại: 1800.6502</a></li>
            <li><a href="#">Gọi hợp tác kinh doanh: 1900.6122</a></li>
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
      <hr />
    <div class="bottom">
      <p>© 2017 - Công ty Cổ Phần viễn thông Di Động Thông Minh - 119 phố Thái Thịnh, phường Thịnh Quang, quận Đống Đa, thành phố Hà Nội, Việt Nam
        MST:0105815899 (Số giấy chứng nhận đăng ký kinh doanh thương nhân) - Ngày cấp lần đầu: 12/03/2012
        Đăng ký thay đổi lần 2: 04/11/2013 - Nơi cấp: Sở kế hoạch và đầu tư thành phố Hà Nội</p>
    </div>
  </footer>
  <script src="./FE/js/validation.js"></script>
  <script src="./FE/js/main.js"></script>
</body>


</html>


<?php
echo "hjhjhj";
if (isset($_POST['submit_login'])) {
  $taikhoan = Get_value($_POST["taikhoan"]);
  $matkhau = Get_value($_POST["matkhau"]);
  $matkhau = md5($matkhau);
  $sql = "SELECT * FROM NGUOIDUNG WHERE taikhoan = '$taikhoan' AND matkhau = '$matkhau'";
  echo $sql;
  $res = Check_db($sql);
  if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $_SESSION['taikhoan'] = $row['TAIKHOAN'];
    $_SESSION['maquyen'] = $row['MAQUYEN'];
    Check_role($_SESSION['maquyen']);
  }
}
?>