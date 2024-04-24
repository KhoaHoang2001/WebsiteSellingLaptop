<?php
include_once ('./includes/include.php');
if ($_SESSION['chucvu'] != "QLTK") {
  echo "<script>window.open('../login.php','_self')</script>";
} else {
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
      <p>Thủ Kho: <?php echo $_SESSION['taikhoan'] ?></p>
    </div>
    <button class="dropdown-btn">Tài khoản<i class="fa fa-caret-down"></i></button>
    <div class="dropdown-container">
      <a href="index.php?action=update_user">Cập nhật thông tin tài khoản</a>
      <a href="index.php?action=change_password">Đổi mật khẩu</a>
      <a href="index.php?action=my_salary">Lương cá nhân</a>
    </div>
    <button class="dropdown-btn">Sản phẩm <i class="fa fa-caret-down"></i></button>
    <div class="dropdown-container">
        <a href="index.php?action=add_product">Thêm sản phẩm</a>
        <a href="index.php?action=view_product">Xem sản phẩm</a>
    </div>
    <button class="dropdown-btn">Loại sản phẩm<i class="fa fa-caret-down"></i></button>
    <div class="dropdown-container">
        <a href="index.php?action=add_category">Thêm loại sản phẩm</a>
        <a href="index.php?action=view_category">Xem loại sản phẩm</a>
    </div>
    <button class="dropdown-btn">Nhà sản xuất <i class="fa fa-caret-down"></i></button>
    <div class="dropdown-container">
        <a href="index.php?action=add_producer">Thêm nhà sản xuất</a>
        <a href="index.php?action=view_producer">Xem nhà sản xuất</a>
    </div>
    <button class="dropdown-btn">Phiếu nhập<i class="fa fa-caret-down"></i></button>
    <div class="dropdown-container">
      <a href="index.php?action=create_nhap">Lập phiếu nhập</a>
      <a href="index.php?action=view_nhap">Danh sách phiếu nhập</a>
    </div>
    <button class="dropdown-btn">Nghỉ phép<i class="fa fa-caret-down"></i></button>
    <div class="dropdown-container">
      <a href="index.php?action=create_leave">Làm đơn nghỉ phép</a>
      <a href="index.php?action=view_leave">Xem đơn nghỉ phép</a>
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

        case 'update_user';
          include './includes/update_user.php';
          break;

        case 'change_password';
          include './includes/change_password.php';
          break;

        case 'my_salary';
          include './includes/my_salary.php';
          break;

        case 'add_product';
          include './includes/add_product.php';
          break;

        case 'view_product';
          include './includes/view_product.php';
          break;

        case 'update_product';
          include './includes/update_product.php';
          break;

        case 'add_category';
          include './includes/add_category.php';
          break;

        case 'view_category';
          include './includes/view_category.php';
          break;

        case 'view_producer';
          include './includes/view_producer.php';
          break;

        case 'add_producer';
          include './includes/add_producer.php';
          break;

        case 'create_nhap';
          include './includes/create_nhap.php';
          break;

        case 'view_nhap';
          include './includes/view_nhap.php';
          break;
        

        case 'create_ctnhap';
          include './includes/create_ctnhap.php';
          break;

          
        case 'xem_ctnhap';
          include './includes/xem_ctnhap.php';
          break;

        case 'create_leave';
          include './includes/create_leave.php';
          break;

        case 'view_leave';
          include './includes/view_leave.php';
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
      dropdown[i].addEventListener("click", function () {
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