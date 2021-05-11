<?php
session_start();
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
        <form action="" method="POST" onsubmit="return DangNhap()">
          <table>
            <tr>
              <th>
                <label for="Login">Tên đăng nhập:</label>
              </th>
              <td style="width: 10px"></td>
              <td>
                <input type="text" name="taikhoan" id="tenDangNhap" />
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
                <input type="password" name="matkhau" id="matKhau" />
              </td>
            </tr>
            <tr style="height: 10px">
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td style="padding-left: 20px">
                <input type="submit" style="padding: 5px 10px" name="login" value="Đăng nhập">
                </input>
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
  <?php include('./includes/footer.php')?>
  <script src="./FE/js/validation.js"></script>
  <script src="./FE/js/main.js"></script>
</body>


</html>


<?php
<<<<<<< HEAD

=======
>>>>>>> e394964c80a33e0789b0dfcfe46e26409cc48d73
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $taikhoan = ($_POST["taikhoan"]);
  $matkhau =($_POST["matkhau"]);
  $matkhau = md5($matkhau);
  $sql = "SELECT * FROM NGUOIDUNG WHERE taikhoan = '$taikhoan' AND matkhau = '$matkhau'";
<<<<<<< HEAD
  //echo $sql;
=======
>>>>>>> fbfc8b26c50070f3a093a05bf06873a6fa01f747
  $res = Check_db($sql);
  if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $_SESSION['taikhoan'] = $row['TAIKHOAN'];
    $_SESSION['maquyen'] = $row['MAQUYEN'];
<<<<<<< HEAD
    switch ($_SESSION['maquyen']) {
      case "NV":
          echo "<script>window.open('./staff/index.php','_self')</script>";    
          break;
      case "KH":
          echo "<script>window.open('./index.php','_self')</script>";
          break;
      case "AD":
          echo "<script>window.open('./admin/index.php','_self')</script>";
          break;
    }
=======
    echo "<script>window.open('account.php','_self')</script>";
>>>>>>> e394964c80a33e0789b0dfcfe46e26409cc48d73
  }
}
?>