<?php 
    include_once('./includes/inclue.php');

    function Log_Out(){
        if(isset($_SESSION('taikhoan'))){
            session_destroy();
            header('location: ./login.php');
        }
    }
?> 