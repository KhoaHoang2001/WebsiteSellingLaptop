<?php 
    include_once('./includes/include.php');

    function Log_Out(){
        if(isset($_SESSION['taikhoan'])){
            session_destroy();
            header('location: ./login.php');
        }
    }
?> 