<?php 
    require_once('./includes/include.php');
    require_once('./includes/conn.php');
    $tongtien = $_POST['tongtien_offline'];
    $madon = uniqid();
    $taikhoan = $_SESSION['taikhoan'];
    $diachi = $_POST['diachi_offline'];
    $ngaydat = date("Y-m-d");
    $trangthai = 'Chưa xác nhận';
    echo $diachi . $_POST['diachi_offline'];
    
    function Del_Cart($taikhoan){
        $sql = "DELETE FROM SANPHAMGIOHANG WHERE taikhoan = '$taikhoan'";
        $res = Check_db($sql);
    }
    
    function Add_Product($madh, $taikhoan){
      $sql = "SELECT * FROM SANPHAMGIOHANG WHERE taikhoan = '$taikhoan'";
      $res = Check_db($sql);
      while ($row = mysqli_fetch_assoc($res)) {
          $masp = $row['MASP'];
          $soluong = $row['SOLUONGGIO'];
          $sql_add = "INSERT INTO `monhang` (`MADH`, `MASP`, `SOLUONGDAT`) VALUES ('$madh', '$masp', '$soluong');";
          $res_add = Check_db($sql_add);
      }
    }
    
    function Dec_Product($madon) {
      $sql = "SELECT * FROM MONHANG WHERE MADH = '$madon'";
      $res = Check_db($sql);
      while ($row = mysqli_fetch_assoc($res)) {
          $masp = $row['MASP'];
          $soluong = $row['SOLUONGDAT'];
          $sql_dec = "UPDATE SANPHAM SET SOLUONGCON = (SOLUONGCON - $soluong) WHERE MASP = '$masp';";
          $res_dec = Check_db($sql_dec);
      }
    }

    if(isset($_POST['COD'])){
      $htthanhtoan = 'Offline';
      $sql_create_order = "INSERT INTO DONHANG (`MADH`, `TAIKHOAN`, `TRANGTHAI`, `NGAYDAT`, `HTTHANHTOAN`, `DIACHINHAN`, `TONGTIEN`) 
                          VALUES ('$madon', '$taikhoan', '$trangthai', '$ngaydat', '$htthanhtoan', '$diachi', '$tongtien');";
      $res_create_order = Check_db($sql_create_order);
      if($res_create_order){
          Add_Product($madon, $taikhoan);
          Del_Cart($taikhoan);
          Dec_Product($madon);
          echo "<script>alert('Thanh toán offline thành công')</script>";
          echo "<script>window.open('account.php','_self')</script>";
      }
    }
    
?>