<?php
    require_once('./includes/include.php');
    require_once('./includes/conn.php');
    if(isset($_POST['xem_ctnhap'])){
        Check_f5($_POST['xem_ctnhap']);
    }
    $maphieu = $_GET['maphieu'];
    $view_phieu = Check_db("SELECT * FROM PHIEUNHAP WHERE MAPHIEU='$maphieu'");
    $fetch_view = mysqli_fetch_array($update_product);
    $ngaylap = $fetch_view['NGAYLAP'];
    $ncc = $fetch_view['NCC'];
    $diachi = $fetch_view['DIACHI'];
?>
<div class="form_box">
    <h2>Phiếu nhập <?php echo $maphieu; ?></h2>
    <div class="border_bottom"></div>
    <!--/.border_bottom -->
    <form method="post" enctype="multipart/form-data">
        <table align="center" width="100%">
            <tr>
                <td><b>Ngày lập:</b></td>
                <td><input type="date" value="<?php echo $ngaylap;?>" disabled/></td>
            </tr>
            <tr>
                <td><b>Nhà cung cấp:</b></td>
                <td><input type="text" value="<?php echo $diachi;?>" disabled/></td>
            </tr>
            <tr>
                <td><b>Địa chỉ kho:</b></td>
                <td><input type="text" value="<?php echo $ncc;?>" disabled/></td>
            </tr>
        </table>
    </form>
</div>
<?php
   // function Update_Product($masp, $maloaisp, $magiamgia, $mansx, $tensp, $motasp, $ram, $vixuly, $kichthuocmh, $gia, $soluongcon, $ngaysx){
    if(isset($_POST['update_product'])){
            $maloaisp_update = Get_value($_POST["maloaisp"]);
            $magiamgia_update = Get_value($_POST["magiamgia"]);
            $mansx_update = Get_value($_POST["mansx"]);
            $tensp_update = Get_value($_POST["tensp"]);
            $motasp_update = Get_value($_POST["motasp"]);
            $ram_update = Get_value($_POST["ram"]);
            $vixuly_update = Get_value($_POST["vixuly"]);
            $kichthuocmh_update = Get_value($_POST["kichthuocmh"]);
            $gia_update = Get_value($_POST["gia"]);
            $soluongcon_update = Get_value($_POST["soluongcon"]);
            $ngaysx_update = Get_value($_POST["ngaysx"]);
            // $Hinh_update  = $_FILES['Hinh']['name'];
            // $conn = Connect();
            // $sql_hinh= "UPDATE HINHANH SET LINK = '$Hinh_update' where masp = '$masp'";
            // echo $sql;
            // mysqli_query($conn, $sql_hinh);
            // mysqli_close($conn);
            
            $sql_deletehinh = "DELETE FROM HINHANH WHERE masp = '$masp';";
            $conn = Connect();
            $deletehinh= mysqli_query($conn, $sql_deletehinh);
            mysqli_close($conn);
            $temp =0;
            foreach($_FILES['files']['type'] as $key => $value){
                $value = substr($value, 0, 5);
                if($value!= "image"){
                    $temp++;
                }
            } 
            if($temp==0){
            $uploads_dir = '/uploads';
            foreach($_FILES["files"]["error"] as $key => $error) {
                if($error == UPLOAD_ERR_OK) {
                        $tmp_name = $_FILES["files"]["tmp_name"][$key];
                        $name = basename($_FILES["files"]["name"][$key]);
                        move_uploaded_file($tmp_name, "product_images/$name");
                        $sql_hinh = "INSERT INTO HINHANH (masp, link) VALUES ('$masp', '$name');";
                        $conn = Connect();
                        $themhinh= mysqli_query($conn, $sql_hinh);
                        mysqli_close($conn);
                }
            }
            if($themhinh){
                if($magiamgia_update==''){
                    $sql = " UPDATE SANPHAM SET  MALOAISP = '$maloaisp_update',MAGIAMGIA =NULL, MANSX = '$mansx_update', TENSP = '$tensp_update', MOTASP = '$motasp_update', RAM ='$ram_update', VIXULY = '$vixuly_update', KICHTHUOCMH = '$kichthuocmh_update', GIA= '$gia_update', SOLUONGCON ='$soluongcon_update', NGAYSX = '$ngaysx_update'WHERE MASP = '$masp'";
                    echo $sql;
                    $conn = Connect();
                    $ngon= mysqli_query($conn, $sql);
                    mysqli_close($conn);
                }else{
                $conn = Connect();
                $sql = " UPDATE SANPHAM SET  MALOAISP = '$maloaisp_update', MAGIAMGIA = '$magiamgia_update', MANSX = '$mansx_update', TENSP = '$tensp_update', MOTASP = '$motasp_update', RAM ='$ram_update', VIXULY = '$vixuly_update', KICHTHUOCMH = '$kichthuocmh_update', GIA= '$gia_update', SOLUONGCON ='$soluongcon_update', NGAYSX = '$ngaysx_update'WHERE MASP = '$masp'";
                $ngon= mysqli_query($conn, $sql);
                mysqli_close($conn);
            
            }
            echo "<script>alert('Sửa sản phẩm thành công');</script>";       
            }
        }else{
            echo "<script>alert('Định dạng hình không đúng');</script>";
    }
        

    
    }

?>