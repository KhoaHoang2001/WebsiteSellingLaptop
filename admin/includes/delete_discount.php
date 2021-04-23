<?php 
    function Delete_Discount($dsgiamgia){
        $conn = Connect();
        foreach ($dsgiamgia as $key=>$value) {
            if(Check_Staff($value)){
                $sql = "DELETE FROM GIAMGIA WHERE magiamgia = '$value'";
                mysqli_query($conn, $sql);
            }
        }
        mysqli_close($conn);
    }
?>
