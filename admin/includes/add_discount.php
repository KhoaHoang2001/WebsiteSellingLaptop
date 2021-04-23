<?php 
    function Add_Discount($magiamgia, $tengiamgia, $phantram){
        if(!Check_Discount($magiamgia)){
            $conn = Connect();
            $sql = "INSERT INTO GIAMGIA (MAGIAMGIA, TENGIAMGIA, PHANTRAM) value ($magiamgia, $tengiamgia, $phantram);";
            mysqli_query($conn, $sql);
            mysqli_close($conn);
            echo "nhap ma giam gia thanh cong";
        }
        else{
            echo "ma giam gia da ton tai";
        }
    }

?>