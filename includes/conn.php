<?php
    session_start();
    
    function Connect(){
        $con = mysqli_connect(
            "localhost",
            "root",
            "",
            "weblaptop"
        );
        mysqli_set_charset($con, "utf8");
        return $con;
    }
    
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