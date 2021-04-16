<?php
    session_start();
    
    $conn = mysqli_connect(
        "localhost",
        "root",
        "",
        "weblaptop"
    );

    mysqli_set_charset($conn, "utf8");

    if(mysqli_connect_errno()){
        echo "ket noi bi loi";
    }
?>