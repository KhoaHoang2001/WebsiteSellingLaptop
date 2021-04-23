<?php 
    function Add_Product(){
        if (isset($_POST['submit'])){
            $masp = Get_value($_POST["masp"]);
            $maloaisp = Get_value($_POST["maloaisp"]);
            $mansx = Get_value($_POST["mansx"]);
            $tensp = Get_value($_POST["tensp"]);
            $motasp = Get_value($_POST["motasp"]);
            $ram = Get_value($_POST["ram"]);
            $vixuly = Get_value($_POST["vixuly"]);
            $kichthuocmh = Get_value($_POST["kichthuocmh"]);
            $gia = Get_value($_POST["gia"]);
            $soluongcon = Get_value($_POST["soluongcon"]);
            $ngaysx = Get_value($_POST["ngaysx"]);
            //thieu ham check masp
            $conn = Connect();
            $sql = "INSERT INTO `sanpham` (`MASP`, `MALOAISP`, `MAGIAMGIA`, `MANSX`, `TENSP`, `MOTASP`, `RAM`, `VIXULY`, `KICHTHUOCMH`, `GIA`, `SOLUONGCON`, `NGAYSX`) VALUES ('$masp', '$maloaisp', null,'$mansx', '$tensp', '$motasp', '$ram', '$vixuly', '$kichthuocmh', '$gia', '$soluongcon', '$ngaysx');";       
            mysqli_query($conn, $sql);
            mysqli_close($conn);
            echo "dang ky tai khoan thanh cong";
        } else {
            echo ("ketnoithatbai");
        }
    }
?>