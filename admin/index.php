<?php

<?php include 'include.php';
  ?>
<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <div class="navigation-bar">
        <div class="logo">
            <a href="/quanlybanhang/index.php"><img src="/quanlybanhang/images/logos/logo.jpg" alt="Cake"></a>
        </div>

        <div class="name-cakes">
            <h3>Tiệm bánh hoàng tử lớn</h3>
        </div>


    </div>

    <div class="sidenav">
        <div class="dropdown-btn">
            <p>Nhân viên: <?php echo "$usernanme"; ?></p>
        </div>
        <button class="dropdown-btn">Sản phẩm <i class="fa fa-caret-down"></i></button>
        <div class="dropdown-container">
            <a href="index.php?action=add_pro">Thêm sản phẩm</a>
            <a href="index.php?action=view_pro">Xem sản phẩm</a>
        </div>
        <button class="dropdown-btn">Nhóm sản phẩm<i class="fa fa-caret-down"></i></button>
        <div class="dropdown-container">
            <a href="index.php?action=add_cat">Thêm nhóm</a>
            <a href="index.php?action=view_cat">Xem nhóm</a>
        </div>
        <button class="dropdown-btn">Tài khoản<i class="fa fa-caret-down"></i></button>
        <div class="dropdown-container">
            <a href="index.php?action=add_nhanvien">Thêm nhân viên</a>
            <a href="index.php?action=view_nhanvien">Danh sách nhân viên</a>
            <a href="index.php?action=view_users">Danh sách người dùng</a>
        </div>
        <button class="dropdown-btn">Đơn hàng<i class="fa fa-caret-down"></i></button>
        <div class="dropdown-container">
            <a href="index.php?action=check_cart">Duyệt đơn hàng</a>
        </div>
        <button class="dropdown-btn "><a href="logout.php">Đăng xuất</a></button>
    </div> <!-- /.End sidenav -->


    <div class="main">
        <div class="page-wrapper">
            <div class="">

            </div>

            <!-- -->
            <!--Profile Card-->
        //     <?php
        // if (isset($_GET['action'])) {
        //   $action = $_GET['action'];
        // } else {
        //   $action = '';
        // }

        // switch ($action) {
        //   case 'add_pro';
        //     include 'includes/insert_product.php';
        //     break;

        //   case 'view_pro';
        //     include 'includes/view_products.php';
        //     break;

        //   case 'edit_pro';
        //     include 'includes/edit_product.php';
        //     break;

        //   case 'add_cat';
        //     include 'includes/insert_category.php';
        //     break;

        //   case 'view_cat';
        //     include 'includes/view_categories.php';
        //     break;

        //   case 'edit_cat';
        //     include 'includes/edit_category.php';
        //     break;

        //   case 'view_users';
        //     include 'includes/view_users.php';
        //     break;
        //   case 'view_nhanvien';
        //     include 'includes/view_nhanvien.php';
        //     break;
        //   case 'add_nhanvien';
        //     include 'includes/insert_nhanvien.php';
        //     break;
        //   case 'check_cart';
        //     include 'includes/check_cart.php';
        //     break;
        // }

        // ?>
        </div>
    </div>

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

<?php } // End else 
?>