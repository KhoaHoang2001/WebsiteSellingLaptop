<?php
    //session_start();
    function Connect(){
        $conn = new mysqli(
            "localhost",
            "root",
            "",
            "weblaptop"
        );
        $conn->set_charset("utf8");
        return $conn;
    }
    
    function Disconnect($conn)
    {
        $conn->close();
    }
?>