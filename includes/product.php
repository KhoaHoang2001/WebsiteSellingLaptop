<?php 
    require_once('include.php');
    require_once('conn.php');

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

    function View_Product_Sellest(){
        $sql = "SELECT * FROM sanpham where Masp = (select max(soluongdat) FROM monhang);";
        $res = Check_db($sql);
        if(mysqli_num_rows($res) > 0){
            while ($row = mysqli_fetch_assoc($res)) {
                $masp = $row['MASP'];
                $tensp = $row['TENSP'];
                $gia = $row['GIA'];
                $phantram = View_Discount_Of_Product($masp);
                $kichthuocmh = $row['KICHTHUOCMH'];
                $vixuly = $row['VIXULY'];
                $ram = $row['RAM'];
                $motasp = $row['MOTASP'];
                $ngaysx = $row['NGAYSX'];
            }
        }
        else{
            echo "khong tin duoc san pham ban chay nhat";
        }
    }

    function View_Full_Product(){
        $sql = "SELECT * FROM sanpham";
        $res = Check_db($sql);
        if(mysqli_num_rows($res) > 0){
            while ($row = mysqli_fetch_assoc($res)) {
                $masp = $row['MASP'];
                $tensp = $row['TENSP'];
                $gia = $row['GIA'];
                $phantram = View_Discount_Of_Product($masp);
                $phantram = $row['PHANTRAM'];
                $kichthuocmh = $row['KICHTHUOCMH'];
                $vixuly = $row['VIXULY'];
                $ram = $row['RAM'];
            }
        }
        else{
            echo "khong tim duoc san pham nao";
        }
    }

?>