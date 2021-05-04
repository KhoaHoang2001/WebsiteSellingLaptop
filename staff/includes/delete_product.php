<?php
    function Delete_Product($masp){
        $conn = Connect();
        foreach ($masp as $key=>$value) {
            if(($value)){
                $sql = "DELETE FROM SANPHAM WHERE masp = '$value'";
                mysqli_query($conn, $sql);
            }
        }
        mysqli_close($conn);
    }
    

?>