<?php 
    require_once('./includes/inlude.php');
    require_once('./includes/conn.php');

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

    //lay ma giam gia va kiem tra ma giam gia da nhap chua 
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

    //them ma giam gia
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
    //sua ma giam gia
    function Update_Discount(){
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

    //xoa ma giam gia
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

    function View_All_Discount(){
        $sql = "SELECT * FROM GIAMGIA";
        $res = Check_db($sql);
        if(mysqli_num_rows($res) > 0){
            while($row = mysqli_fetch_assoc()){
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