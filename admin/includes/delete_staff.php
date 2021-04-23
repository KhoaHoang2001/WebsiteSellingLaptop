<?php 
    function Delete_Staff($dstaikhoan){
        $conn = Connect();
        foreach ($dstaikhoan as $key=>$value) {
            if(Check_Product($value)){
                $sql = "DELETE FROM NGUOIDUNG WHERE taikhoan = '$value'";
                mysqli_query($conn, $sql);
            }
        }
        mysqli_close($conn);
    }
?>