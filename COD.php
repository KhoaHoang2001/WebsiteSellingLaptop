<?php 
    require_once('./includes/include.php');
    require_once('./includes/conn.php');
    require_once('./includes/order.php');

    Create_Order();
    header('location: ./account.php');
?>