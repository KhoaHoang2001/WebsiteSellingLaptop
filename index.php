<?php
    require('includes/include.php');

    function View_Product_Category(){
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
    }

    function View_Full_Product(){
        // $conn = Connect();
        $sql = "SELECT * FROM sanpham LEFT JOIN giamgia on sanpham.MAGIAMGIA = giamgia.MAGIAMGIA";
        $res = Check_db($sql);
        echo mysqli_num_rows($res);
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
    }
?>