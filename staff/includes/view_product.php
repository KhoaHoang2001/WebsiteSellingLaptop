<?php 

    function Img_product($masp){
        $sql_img = "SELECT * FROM HINHANH WHERE MASP = '$masp';";
        $res_img = Check_db($sql_img);
        return $res_img;
    }

    function Check_Product($masp){
        if(isset($_POST['checksp'])){
            $sql = "SELECT * FROM SANPHAM WHERE MASP = '$masp';";
            $res = Check_db($sql); 
            if(mysqli_num_rows($res)>0){
                return true;
            }
            else{
                return false;
            }
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
    
    function View_full_loai_Of_Product($masp){
        $sql_loai = "SELECT * FROM SANPHAM WHERE MALOAISP = (SELECT MALOAISP FROM SANPHAM WHERE MASP = '$masp')";
        $res_loai = Check_db($sql_loai);
        if(mysqli_num_rows($res_loai) > 0){
            while($row_loai = mysqli_fetch_assoc($res_loai)){
                $maloaisp = $row_loai['maloaisp'];
            }
        } else{
            echo "khong co loai nao";
        }
    }
    
    function View_full_MaNSX_Of_Product($masp){
        $sql_NSX = "SELECT * FROM SANPHAM WHERE MANSX = (SELECT MANSX FROM SANPHAM WHERE MASP = '$masp')";
        $res_NSX = Check_db($sql_NSX);
        if(mysqli_num_rows($res_NSX) > 0){
            while($row_NSX = mysqli_fetch_assoc($res_NSX)){
                $maNSX = $row_NSX['maNSX'];
            }
        } else{
            echo "khong co NSX nao";
        }
    }

?>