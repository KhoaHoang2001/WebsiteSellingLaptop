<?php
    session_start();

    function Connect(){///okoko
        $conn = mysqli_connect(
            "localhost",
            "root",
            "",
            "weblaptop"
        );
        mysqli_set_charset($conn, "utf8");
        return $conn;
    }
    
    if(mysqli_connect_errno()){
        echo "ket noi bi loi";
    }
?>
