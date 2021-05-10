<?php
    require_once('conn.php');
    
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
        $res = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $res;
    }

    function Get_value($str){
        $conn = Connect();
        if($str != ""){
            return mysqli_real_escape_string($conn, $str);
        }
    }

    //kiem tra quyen hien tai voi trang co trung khop voi quyen ko
    function Check_role_in_site($role){ 
        if($_SESSION['maquyen'] != $role){
            header('location: ./index.php');
        }
    }
<<<<<<< HEAD
=======

    //kiem tra quyen va vao trang quyen can vao
    function Check_role($role){ 
        switch ($role) {
            case "NV":
                header('location: ./staff/index.php');    
                break;
            case "KH":
                echo "<script>window.open('index.php','_self')</script>";
                break;
            case "AD":
                header('location: ./admin/index.php');
                break;
        }
}
>>>>>>> d151f129063484f2ac9d03f414e60f61cc38024e
?>