<?php
    require_once('includes/include.php');
    require_once('admin/product.php');
    require_once('admin/discount.php');
    Check_role_in_site($_SESSION['maquyen']);

    function View_Product_Sellest(){
        $sql = "SELECT * FROM sanpham where Masp = (select max(soluongdat) FROM monhang);";
        $res = Check_db($sql);
        if(mysqli_num_rows($res) > 0){
            while ($row = mysqli_fetch_assoc($res)) {
                $masp = $row['MASP'];
                $tensp = $row['TENSP'];
                $gia = $row['GIA'];
                $phantram = View_Discount($masp);
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
                $phantram = View_Discount($masp);
                $phantram = $row['PHANTRAM'];
                $kichthuocmh = $row['KICHTHUOCMH'];
                $vixuly = $row['VIXULY'];
                $ram = $row['RAM'];
                //
            }
        }
        else{
            echo "khong tim duoc san pham nao";
        }
    }
?>