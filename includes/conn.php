<?php
    session_start();

    $conn = mysqli_connect(
        "localhost",
        "root",
        "",
        "weblaptop"
    );

    if(mysqli_connect_errno()){
        echo "Loi ket noi: " .mysqli_connect_error();
    }

?>