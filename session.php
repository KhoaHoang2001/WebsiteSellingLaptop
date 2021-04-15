<?php
    include '/conn.php';
    session_start();

    if(isset($_SESSION['admin'])){
        header('location: /admin/home.php');
    }
