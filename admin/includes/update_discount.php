<?php 
    function Update_Discount($magiamgia, $tengiamgia, $phantram){
        if(Check_Discount($magiamgia)){
            $conn = Connect();
            $sql = "UPDATE GIAMGIA SET TENGIAMGIA = '$tengiamgia', PHANTRAM = '$phantram' WHERE `nguoidung`.`MAGIAMGIA` = '$magiamgia';";
            mysqli_query($conn, $sql);
            mysqli_close($conn);
            echo "cap nhat ma giam gia thanh cong";
        }
        else{
            echo "ma giam gia khong ton tai";
        }
    }

?>