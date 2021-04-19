<?php
    require_once('../includes/include.php');   

    function Img_product($masp){
        $sql_img = "SELECT * FROM HINHANH WHERE MASP = '$masp';";
        $res_img = Check_db($sql_img);
        return $res_img;
    }
?>