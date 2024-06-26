<?php
    include_once('./includes/include.php');
    if($_SESSION['chucvu'] != "QLBH"){
      echo "<script>window.open('../login.php','_self')</script>";
    }
    else{
      $usernanme = $_SESSION['taikhoan'];
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/resetcss.css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://kit.fontawesome.com/f724e98ccb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="styles/style_staff.css" media="all">

</head>

<body>
    <div class="navigation-bar">
        <div class="logo">
            <!-- logo -->
        </div>

        <div class="name-cakes">
            <h3>Web bán Laptop</h3>
        </div>


    </div>

    <div class="sidenav">
        <div class="dropdown-btn">
            <p>Nhân viên: <?php echo $_SESSION['taikhoan'] ?></p>
        </div>
        <button class="dropdown-btn">Tài khoản<i class="fa fa-caret-down"></i></button>
        <div class="dropdown-container">
            <a href="index.php?action=update_user">Cập nhật thông tin tài khoản</a>
            <a href="index.php?action=change_password">Đổi mật khẩu</a>
            <a href="index.php?action=my_salary">Lương cá nhân</a>
            <a href="index.php?action=view_customer">Danh sách khách hàng</a>
        </div>
        <button class="dropdown-btn">Đơn hàng<i class="fa fa-caret-down"></i></button>
        <div class="dropdown-container">
            <a href="index.php?action=check_order">Duyệt đơn hàng</a>
            <a href="index.php?action=history_order">Xem lịch sử đơn hàng</a>
        </div>
        <button class="dropdown-btn "><a href="logout.php">Đăng xuất</a></button>
    </div> <!-- /.End sidenav -->


    <div class="main">
        <div class="page-wrapper">
            <div class="">

            </div>

            <!-- -->
            <!--Profile Card-->
            <?php
        if (isset($_GET['action'])) {
          $action = $_GET['action'];
        } else {
          $action = '';
        }

        switch ($action) {

          case 'view_product';
            include './includes/view_product.php';
            break;

          case 'view_customer';
            include './includes/view_customer.php';
            break;
        
          case 'update_user';
            include './includes/update_user.php';
            break;
      
          case 'change_password';
            include './includes/change_password.php';
            break;

          case 'my_salary';
            include './includes/my_salary.php';
            break;
          
          case 'check_order';
            include './includes/check_order.php';
            break;

          case 'view_order';
            include './includes/view_order.php';
            break;

          case 'history_order';
            include './includes/history_order.php';
            break;
        }
          ?>
        </div>
    </div> -->

    <script>
    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
    </script>

</body>

</html>
