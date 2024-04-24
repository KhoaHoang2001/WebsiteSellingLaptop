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
                <input type="submit" style="padding: 5px 10px" value="Đăng nhập" name="submit_login">
              </td>
              <td></td>
              <td>
                <a href="./signup.php" style="text-decoration: none; color: black; display: block;">
                <input type="button" style="padding: 5px 10px" value="Đăng ký">
                </a>
              </td>
            </tr>
          </table>
        </form>

        <!-- footer -->
        <?php include('./includes/footer.php') ?>
        <script src="./FE/js/validation.js"></script>
        <script src="./FE/js/main.js"></script>
</body>


</html>


<?php
if (isset($_POST['submit_login'])) {
  $taikhoan = Get_value($_POST["taikhoan"]);
  $matkhau = Get_value($_POST["matkhau"]);
  $matkhau = md5($matkhau);
  $sql = "SELECT * FROM NGUOIDUNG WHERE taikhoan = '$taikhoan' AND matkhau = '$matkhau'";
  //echo $sql;
  $res = Check_db($sql);
  if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $_SESSION['taikhoan'] = $row['TAIKHOAN'];
    $_SESSION['chucvu'] = $row['CHUCVU'];
    if($row['KICHHOAT']) {
      switch ($_SESSION['chucvu']) {
        case "KHONG":
          echo "<script>window.open('./index.php','_self')</script>";
          break;
        case "QLBH":
          echo "<script>window.open('./staff/index.php','_self')</script>";
          break;
        case "QTHT":
          echo "<script>window.open('./admin/index.php','_self')</script>";
          break;
        case "QLNS":
          echo "<script>window.open('./manager/index.php','_self')</script>";
          break;
        case "QLTK":
          echo "<script>window.open('./inventory/index.php','_self')</script>";
          break;
        case "QLKD":
          echo "<script>window.open('./sales/index.php','_self')</script>";
          break;
      }
    }
    else {
      echo "<script>alert('Tài khoản đã bị vô hiệu hóa!')</script>";
    }
  }
  else{
    echo "<script>alert('Tài khoản mật khẩu không trùng khớp')</script>";

  }
}
?>