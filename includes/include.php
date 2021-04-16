<?php
    function Pr($arr){
        echo "<pre>";
        print_r($arr);
    }

    function Prx($arr){
        echo "<pre>";
        print_r($arr);
        die();
    }

    function Check_db($conn ,$sql){
        $res = mysqli_query($conn, $sql);
        return $res;
    }

    function Get_value($conn, $str){
        if($str != ""){
            return mysqli_real_escape_string($conn, $str);
        }
    }
?>