
<?php
    require_once('./includes/include.php');

    function themsp(){
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
            //Code xử lý, insert dữ liệu vào table
            $conn = Connect();
            $sql = "INSERT INTO `sanpham` (`MASP`, `MALOAISP`, `MAGIAMGIA`, `MANSX`, `TENSP`, `MOTASP`, `RAM`, `VIXULY`, `KICHTHUOCMH`, `GIA`, `SOLUONGCON`, `NGAYSX`) VALUES ('$masp', '$maloaisp', null,'$mansx', '$tensp', '$motasp', '$ram', '$vixuly', '$kichthuocmh', '$gia', '$soluongcon', '$ngaysx');";       
            mysqli_query($conn, $sql);

            mysqli_close($conn);
            echo "dang ky tai khoan thanh cong";
        } else {
            echo ("ketnoithatbai");
        }
    }
//themsp
    function Check_Product(){
        if(isset($_POST['checksp'])){
            
        }

    }



?>
    
<form action="" method="post">
    <table>
        <tr>
            <th>ma san pham</th>
            <td><input type="text" name="masp" value=""></td>
        </tr>

        <tr>
            <th>ma loai sp:</th>
            <td><input type="text" name="maloaisp" value=""></td>
        </tr>

        <tr>
            <th>mansx:</th>
            <td><input type="text" name="mansx" value=""></td>
        </tr>

        <tr>
            <th>tensp:</th>
            <td><input type="text" name="tensp" value=""></td>
        </tr>

        <tr>
            <th>motasp:</th>
            <td><input type="text" name="motasp" value=""></td>
        </tr>

        <tr>
            <th>ram:</th>
            <td><input type="text" name="ram" value=""></td>
        </tr>
        
        <tr>
            <th>vixuly:</th>
            <td><input type="text" name="vixuly" value=""></td>
        </tr>
        
        <tr>
            <th>kichthuocmh:</th>
            <td><input type="text" name="kichthuocmh" value=""></td>
        </tr>
        
        <tr>
            <th>gia:</th>
            <td><input type="text" name="gia" value=""></td>
        </tr>
        
        <tr>
            <th>soluongcon:</th>
            <td><input type="text" name="soluongcon" value=""></td>
        </tr>
        
        <tr>
            <th>ngaysx:</th>
            <td><input type="date" name="ngaysx" value=""></td>
        </tr>
        
    </table>
    <button type="submit" name= "submit">Gửi</button>
    <button type="submit" name= "sua">Sửa</button>
    <button type="submit" name= "xoa">xóa</button>
</form>