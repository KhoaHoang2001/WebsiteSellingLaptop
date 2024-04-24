<?php 
require_once('./include.php');
require_once('./conn.php');
    $madon=$_GET['madh'];
    $sql="UPDATE donhang SET TRANGTHAI='Đã hủy' WHERE MADH='$madon'";
    $res=Check_db($sql);
    if($res){
        echo "<script>alert('Hủy đơn hàng thành công!')</script>";
        echo "<script>window.open('../account.php','_self')</script>";
    }
?>