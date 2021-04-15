<?php
    require('conn.php');

    function Pr($arr){
        echo "<pre>";
        print_r($arr);
    }

    function Prx($arr){
        echo "<pre>";
        print_r($arr);
        die();
    }

    function Check_db($sql){
        $res = mysqli_query($conn, $sql);
        return $res;
    }

    function Get_Checkbox($arr){
        
        $sql = "SELECT * FROM SANPHAM " . ;
    }

?>