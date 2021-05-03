<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CT250</title>

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
          <img src="./image/banner_TOP.png" alt="" />
        </div>
        <div class="row header-navbar">
          <nav class="navbar navbar-expand-lg navbar-light bg-light col-12">
            <div class="container nav-left-right">
              <div class="left-nav d-flex">
                <a class="navbar-brand" href="./index.html">
                  <img src="./image/logo-fix.png" alt="" />
                </a>
                <form class="">
                  <div class="input-group navbar-search">
                    <div class="input-group-prepend">
                      <button class="btn btn-outline-secondary" type="button">
                        <i class="fa fa-search"></i>
                      </button>
                    </div>
                    <input
                      type="text"
                      class="form-control"
                      placeholder=""
                      aria-label=""
                      aria-describedby="basic-addon1"
                    />
                  </div>
                </form>
              </div>
              <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div
                class="collapse navbar-collapse header-navbar--content"
                id="navbarSupportedContent"
              >
                <div class="navbar-select">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex">
                    <li class="nav-item">
                      <a
                        class="nav-link active"
                        aria-current="page"
                        href="index.php"
                        >Laptop</a
                      >
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

    <section class="signup">
      <div class="container">
        <div class="signupCenter" style="width: 40%; margin: 0 auto">
          <h2 style="text-align: center; margin-bottom: 50px">
            Đăng ký tài khoản
          </h2>
          <form method="POST" action="" onsubmit="return DangKy()">
            <table style="padding: 10px; text-align: left">
              <tr>
                <th style="width: 40%">Họ và tên:</th>
                <td style="width: 10%"></td>
                <td style="display: inline-block; width: 40%">
                  <input type="text" name="TENND" id="HoTen" />
                </td>
                <td style="width: 20%"></td>
              </tr>
              <tr>
                <th style="height: 15px"></th>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <th style="width: 40%">Tên đăng nhập:</th>
                <td style="width: 10%"></td>
                <td style="display: inline-block; width: 40%">
                  <input type="text" name="TAIKHOAN" id="tenDangNhap"/>
                </td>
                <td style="width: 20%"></td>
              </tr>
              <tr>
                <th style="height: 15px"></th>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <th>Mật khẩu:</th>
                <td></td>
                <td>
                  <input type="password" name="MATKHAU" id="matKhau"/>
                </td>
                <td></td>
              </tr>
              <tr>
                <th style="height: 15px"></th>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <th>Gõ lại mật khẩu:</th>
                <td></td>
                <td>
                  <input
                    type="password"
                    id="nhapLaiMatKhau"
                    name="NHAPLAIMK"
                  />
                </td>
                <td></td>
              </tr>
              <tr>
                <th style="height: 15px"></th>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <th>Giới tính:</th>
                <td></td>
                <td id="gioiTinh">
                  <input
                    type="radio"
                    name="GIOITINH"
                    value="Nam"
                  />
                  <label for="nam">Nam</label>
                  <input
                    type="radio"
                    name="GIOITINH"
                    value="Nữ"
                  />
                  <label for="nu">Nữ</label>
                </td>
                <td></td>
              </tr>
              <tr>
                <th style="height: 15px"></th>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <th>Email:</th>
                <td></td>
                <td>
                  <input
                    type="email"
                    name="EMAIL"
                    id="Email"
                    placeholder="email@email.com"
                  />
                </td>
                <td></td>
              </tr>
              <tr>
                <th style="height: 15px"></th>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <th>Số điện thoại:</th>
                <td></td>
                <td>
                  <input
                    type="text"
                    name="SDT"
                    id="SDT"
                    placeholder="0123456789"
                  />
                </td>
                <td></td>
              </tr>
              <tr>
                <th style="height: 15px"></th>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <th></th>
                <td></td>
                <td>
                  <input type="submit"
                    style="
                      padding: 0 10px;
                      border-radius: 3px;
                      border: 1px solid;
                    "
                    value="Đăng ký"
                    name="btnDangKy"
                  >
                  <button type="reset"
                    style="
                      padding: 0 10px;
                      border-radius: 3px;
                      border: 1px solid;
                    "
                  >
                    Làm lại
                  </button>
                </td>
                <td></td>
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
    <!-- script -->
    <!-- jquery  -->
    <script
      src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"
    ></script>

    <!-- popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>

    <!-- BS4 -->
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"
    ></script>
    <!-- MAIN JS -->
    <script type="text/javascript" src="./js/Validation.js"></script>
    <script type="text/javascript" src="./js/main.js"></script>
    <?php
require_once('../includes/conn.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $TAIKHOAN = $_POST["TAIKHOAN"];
    $MATKHAU = $_POST["MATKHAU"];
    $TENND = ($_POST["TENND"]);
    $NHAPLAIMK = ($_POST["NHAPLAIMK"]);
    $GIOITINH=($_POST['GIOITINH']);
    $EMAIL=$_POST['EMAIL'];
    $SDT=$_POST['SDT'];
    echo $GIOITINH."".$EMAIL."".$SDT;
            $conn = Connect();
            $sql1="SELECT * FROM nguoidung WHERE TAIKHOAN='$TAIKHOAN'";
            $request=$conn->query($sql1);

            if(mysqli_num_rows($request)>0){
              echo "<script>alert('tai khoan da ton tai!')</script>";
                header('lOCATION: signup.php');
                
            }else{
                $MATKHAU=md5($MATKHAU);
                $sql="INSERT INTO nguoidung(TAIKHOAN,MAQUYEN,MATKHAU,TENND,GIOITINH,SDT,EMAIL) VALUE ('$TAIKHOAN','KH','$MATKHAU','$TENND','$GIOITINH','$SDT','$EMAIL')";
                IF($conn->query($sql)==true){
                    header('Location: ./login.html');//link toi site dang nhap
                }else{
                    echo "error: ".$sql."<br>".$conn->error;
                }
            }
            $conn->close();
    }
  

?>
  </body>
</html>
