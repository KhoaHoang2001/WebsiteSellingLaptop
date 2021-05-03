<?php
    require_once('./includes/include.php');
    require_once('./includes/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng nhập - Web bán laptop</title>

    <!-- BS4 CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />

    <!-- FONT AWESOME  -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    />

    <!-- FONT GOOGLE -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap"
      rel="stylesheet"
    />

    <!-- CSS -->
    <link rel="stylesheet" href="./css/main.css" />
  </head>

  <body>
    <!-- header -->
    <header>
      <div class="container">
          <div class="row header-banner">
              <img src="./image/banner_TOP.png" alt="">
          </div>
          <div class="row header-navbar">
              <nav class="navbar navbar-expand-lg navbar-light bg-light col-12">
                  <div class="container nav-left-right">
                      <div class="left-nav">
                          <a class="navbar-brand" href="./index.html">
                              <img src="./image/logo-fix.png" alt="">
                          </a>
                          <form class="">
                              <div class="input-group navbar-search">
                                  <div class="input-group-prepend">
                                      <button class="btn btn-outline-secondary" type="button"><i class="fa fa-search"></i></button>
                                  </div>
                                  <input type="text" class="form-control" placeholder="" aria-label=""
                                      aria-describedby="basic-addon1" style="border-radius: 0 5px 5px 0;">
                              </div>
                          </form>
                      </div>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                              <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse header-navbar--content col-md-6 col-sm-9" id="navbarSupportedContent">
                          <div class="navbar-select">
                                  <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex">
                                      <li class="nav-item">
                                          <a class="nav-link active" aria-current="page" href="#laptop">Laptop</a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link" href="#sales">Sales</a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link" href="#bestseller">Bestseller</a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link" href="./cart.html">Cart</a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link" href="./login.html">Login</a>
                                      </li>
                                  </ul>
                          </div>
                      </div>
                  </div>
              </nav>
          </div>
      </div>
  </header>
    <!-- login form -->
    <section class="login-form">
      <div class="container">
        <div class="login-form-center" align="center">
          <h2>Đăng nhập</h2>
          <form action="" method="" >
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
                  <button
                    type="button"
                    style="padding: 5px 10px"
                    onclick="DangNhap()"
                  >
                    Đăng nhập
                  </button>
                </td>
                <td></td>
                <td>
                  <button style="padding: 5px 10px">
                    <a
                      href="./signup.php"
                      style="text-decoration: none; color: black"
                      >Đăng ký</a
                    >
                  </button>
                </td>
              </tr>
            </table>
          </form>
        </div>
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
      <hr />
      <div class="bottom">
        <p>copyright</p>
      </div>
    </footer>
    <script src="./js/validation.js"></script>
    <script src="./js/main.js"></script>
  </body>
</html>


<?php 
  if(isset($_POST['submit_login'])){
    $taikhoan = Get_value($_POST["taikhoan"]);
    $matkhau = Get_value($_POST["matkhau"]);
    $matkhau = md5($matkhau);
    $sql = "SELECT * FROM NGUOIDUNG WHERE taikhoan = '$taikhoan' AND matkhau = '$matkhau'";
    $res = Check_db($sql);
    if(mysqli_num_rows($res) > 0){
        $row = mysqli_fetch_assoc($res);
        $_SESSION['taikhoan'] = $row['TAIKHOAN'];
        $_SESSION['maquyen'] = $row['MAQUYEN'];
        Check_role($_SESSION['maquyen']);
    }
}
?>