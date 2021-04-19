<?php
    require_once('includes/include.php');
    Check_role_in_site($_SESSION['maquyen']);

    function View_Product_Sellest(){
        $sql = "SELECT * FROM sanpham where Masp = (select max(soluongdat) FROM monhang);";
        $res = Check_db($sql);
        if(mysqli_num_rows($res) > 0){
            while ($row = mysqli_fetch_assoc($res)) {
                $tensp = $row['TENSP'];
                $gia = $row['GIA'];
                $kichthuocmh = $row['KICHTHUOCMH'];
                $vixuly = $row['VIXULY'];
                $ram = $row['RAM'];
            }
        }
        else{
            console.log("khong tin duoc san pham ban chay nhat");
        }
    }

    function View_Full_Product(){
        $sql = "SELECT * FROM sanpham LEFT JOIN giamgia on sanpham.MAGIAMGIA = giamgia.MAGIAMGIA";
        $res = Check_db($sql);
        if(mysqli_num_rows($res) > 0){
            while ($row = mysqli_fetch_assoc($res)) {
                $tensp = $row['TENSP'];
                $gia = $row['GIA'];
                $phantram = $row['PHANTRAM'];
                $kichthuocmh = $row['KICHTHUOCMH'];
                $vixuly = $row['VIXULY'];
                $ram = $row['RAM'];
                //show san pham ra manh hinh.
            }
        }
        else{
            console.log("khong tim duoc san pham nao");
        }
    }
?>