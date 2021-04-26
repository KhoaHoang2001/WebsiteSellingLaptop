<?php
    function Update_Product($masp, $maloaisp, $magiamgia, $mansx, $tensp, $motasp, $ram, $vixuly, $kichthuocmh, $gia, $soluongcon, $ngaysx){
        if(Check_Product($masp)){
            $conn = Connect();
            $sql = " UPDATE SANPHAM SET MASP ='$masp', MALOAISP = '$maloaisp', MAGIAMGIA = '$magiamgia', MANSX = '$mansx, TENSP = '$tensp', MOTASP = '$motasp', RAM ='$ram', VIXULY = '$vixuly', KICHTHUOCMH = '$kichthuocmh', GIA= '$gia', SOLUONGCON ='$soluongcon', NGAYSX = '$ngaysx';";
            mysqli_query($conn, $sql);
            mysqli_close($conn);
            echo "cap nhat sp thanh cong";
        }else{
            echo "loi roi";
        }

    }
    
?>