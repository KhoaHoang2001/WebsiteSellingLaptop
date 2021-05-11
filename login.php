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
<<<<<<< HEAD
                <input type="submit" style="padding: 5px 10px" value="Đăng nhập" name="submit_login">
=======
                <input type="submit" style="padding: 5px 10px" name="login" value="Đăng nhập">
                </input>
>>>>>>> 3cc529505b2088aebb25d9b2671216278fb6eba1
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
if (isset($_POST['submit_login'])) {
  $taikhoan = Get_value($_POST["taikhoan"]);
  $matkhau = Get_value($_POST["matkhau"]);
=======
<<<<<<< HEAD

=======
>>>>>>> e394964c80a33e0789b0dfcfe46e26409cc48d73
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $taikhoan = ($_POST["taikhoan"]);
  $matkhau =($_POST["matkhau"]);
>>>>>>> 3cc529505b2088aebb25d9b2671216278fb6eba1
  $matkhau = md5($matkhau);
  $sql = "SELECT * FROM NGUOIDUNG WHERE taikhoan = '$taikhoan' AND matkhau = '$matkhau'";
<<<<<<< HEAD
=======
  //echo $sql;
>>>>>>> 988c39291fa539bbdf4e0b69b87b3dd865ba9231
  $res = Check_db($sql);
  if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $_SESSION['taikhoan'] = $row['TAIKHOAN'];
    $_SESSION['maquyen'] = $row['MAQUYEN'];
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 3cc529505b2088aebb25d9b2671216278fb6eba1
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
<<<<<<< HEAD
=======
=======
    echo "<script>window.open('account.php','_self')</script>";
>>>>>>> e394964c80a33e0789b0dfcfe46e26409cc48d73
>>>>>>> 3cc529505b2088aebb25d9b2671216278fb6eba1
  }
}
?>