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
            exit();
        }
    }

    //kiem tra quyen va vao trang quyen can vao
    function Check_role($role){ 
        switch ($role) {
            case "NV":
                header('location: ./staff/index.php');    
                break;
            case "KH":
                header('location: ./index.php');
                break;
            case "AD":
                header('location: ./admin/index.php');
                break;
        }
}
?>