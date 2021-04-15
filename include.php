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
        $conn = Connect();
        $res = $conn->query($sql);
        return $res;
    }
?>