<?php 
    function View_Discount_Of_Product($masp){
        $sql_discount = "SELECT * FROM giamgia WHERE MAGIAMGIA = (SELECT MAGIAMGIA FROM sanpham WHERE MASP = '$masp');";
        $res_discount = Check_db($sql_discount);
        if(mysqli_num_rows($res_discount) > 0){
            $row_discount = mysqli_fetch_assoc($res_discount);
            return $row_discount['PHANTRAM'];
        }
        else{
            return 100;
        }
    }

    function Check_Discount($magiamgia){
        $sql = "SELECT * FROM GIAMGIA WHERE magiamgia = '$magiamgia'";
        $res = Check_db($sql);
        if(mysqli_num_rows($res) > 0){
            return true;
        }
        else{
            echo false;
        }
    }

    function View_All_Discount(){
        $sql = "SELECT * FROM GIAMGIA";
        $res = Check_db($sql);
        if(mysqli_num_rows($res) > 0){
            while($row = mysqli_fetch_assoc($res)){
                $magiamgia = $row['MAGIAMGIA'];
                $tengiamgia = $row['TENGIAMGIA'];
                $phantram = $row['PHANTRAM'];
            };
        }
        else{
            echo "khong co giam gia nao";
        }
    }
?>