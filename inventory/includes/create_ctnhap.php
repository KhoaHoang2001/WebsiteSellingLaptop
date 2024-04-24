<?php
    require_once('./includes/include.php');
    require_once('./includes/conn.php');
    if(isset($_POST['insert_post'])){
        Check_f5($_POST['insert_post']);
    }
    $maphieu = $_GET['maphieu'];
    
?>
<div class="form_box">
    <h2>Nhập chi tiết phiếu nhập</h2>
    <div class="border_bottom"></div>
    <!--/.border_bottom -->
    <form method="post" enctype="multipart/form-data">
    
        <table align="center" width="100%">
            <tr>
                <td valign="top"><b>STT:</b></td>
                <td><input type="text" name="stt" id="stt" min=0 required></td>
            </tr>
            <tr>
                <td valign="top"><b>Sản phẩm:</b></td>
                <td>
                    <select name="sanpham" id="sanpham" width=100% required>
                    <?php
                        $sql_all_staff = "SELECT MASP,TENSP FROM SANPHAM";
                        $res_all_staff = Check_db($sql_all_staff);
                        while ($row = mysqli_fetch_array($res_all_staff)) {
                            $masp = $row['MASP'];
                            $tensp = $row['TENSP'];
                            echo "<option value='$masp'>$tensp</option>";
                        }
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td valign="top"><b>Số lượng:</b></td>
                <td><input type="number" name="soluong" id="soluong" min=0 required></td>
            </tr>
            <tr>
                <td valign="top"><b>Đơn giá:</b></td>
                <td><input type="text" name="dongia" id="dongia" required></td>
            </tr>
            <tr>
                <td colspan="9" class="text-center"> 
                    <input type="submit" class="btn-submit" name="insert_post" value="Thêm hàng nhập">
                </td>
            </tr>
        </table>
    </form>

</div><!-- /.form_box -->

<?php

function Check_Phieunhap($maphieu){
    $sql = "SELECT * FROM PHIEUNHAP WHERE MAPHIEU ='$maphieu';";
    $res = Check_db($sql);
    if(mysqli_num_rows($res) > 0){
        return true;
    }
    else{
        return false;
    }
}

if (isset($_POST['insert_post'])) {
    $stt = Get_value($_POST['stt']);
    $sanpham = Get_value($_POST['sanpham']);
    $sl = Get_value($_POST['soluong']);
    $dongia = Get_value($_POST['dongia']);
    $sql = "INSERT INTO CHITIETNHAP VALUES ('$stt', $maphieu, '$masp', '$sl', '$dongia');";
    $res = Check_db($sql);
    $sql = "UPDATE SANPHAM SET SOLUONGCON = (SOLUONGCON + $sl) WHERE MASP = '$masp';";
    $res = Check_db($sql);
    if($res){
        echo "<script>alert(\"Thêm hàng nhập thành công\");</script>";
    }
    else{
        echo "<script>alert(\"Thêm hàng nhập thất bại\");</script>";
    }
    
}

?>