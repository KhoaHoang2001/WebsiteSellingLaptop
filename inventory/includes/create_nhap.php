<?php
    require_once('./includes/include.php');
    require_once('./includes/conn.php');
    if(isset($_POST['insert_post'])){
        Check_f5($_POST['insert_post']);
    }

?>
<div class="form_box">
    <h2>Lập phiếu nhập</h2>
    <div class="border_bottom"></div>
    <!--/.border_bottom -->
    <form method="post" enctype="multipart/form-data">
    
        <table align="center" width="100%">
            <tr>
                <td valign="top"><b>Nhà cung cấp:</b></td>
                <td>
                    <select name="ncc" id="ncc" required>
                    <?php
                        $sql_all_staff = "SELECT * FROM NHASANXUAT";
                        $res_all_staff = Check_db($sql_all_staff);
                        while ($row = mysqli_fetch_array($res_all_staff)) {
                            $mansx = $row['MANSX'];
                            $tennsx = $row['TENNSX'];
                            echo "<option value='$mansx'>$tennsx</option>";
                        }
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td valign="top"><b>Địa chỉ kho:</b></td>
                <td><input type="text" name="diachi" id="diachi" size=60 required /></td>
            </tr>
            <tr>
                <td valign="top"><b>Ngày lập phiếu:</b></td>
                <td><input type="date" name="ngaylap" id="ngaylap" required /></td>
            </tr>
            <tr>
                <td colspan=2 valign="top"><b>Hàng nhập: </b></td>
            </tr>
            <!--<tr>
                <td colspan=2><table width="100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                        </tr>
                    </thead>
                    <tr>           
                        <td><b>1</b></td>
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
                        <td><input type="number" name="soluong" id="soluong" min=0 required></td>
                        <td><input type="text" name="dongia" id="dongia" required></td>
                    </tr>
                    <tr>
                        <td colspan="9" class="text-center">
                            <input type="button" class="btn-submit" name="insert_post" value="Thêm hàng nhập">
                        </td>
                    </tr>
                </table></td>
            </tr>-->
            <tr>
                <td colspan="9" class="text-center"> 
                    <input type="submit" class="btn-submit" name="insert_post" value="Lập phiếu">
                </td>
            </tr>
        </table>
    </form>

</div><!-- /.form_box -->

<?php

function gen_maphieu(){
    $ktra = "SELECT MAPHIEU FROM PHIEUNHAP";
    $res = Check_db($ktra);
    if(mysqli_num_rows($res)>0){
        $sql = "SELECT MAX(MAPHIEU) FROM PHIEUNHAP";
        $res = Check_db($sql);
        $row = mysqli_fetch_array($res);
        $sosp =(intval($row['MAX(MAPHIEU)'])+1);
        $ma = strval($sosp);
    }else{
    $ma = "1";
    }
    return $ma;
}

function Check_Nhap($maphieu){
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
    $maphieu = gen_maphieu();
    $ncc = Get_value($_POST['ncc']);
    $diachi = Get_value($_POST['diachi']);
    $ngaylap = Get_value($_POST['ngaylap']);
    if(!Check_Nhap($maphieu)){
        $sql = "INSERT INTO PHIEUNHAP (MAPHIEU, NGAYLAP, NCC, DIACHI) 
                VALUES ('$maphieu', $ngaylap, '$ncc', '$diachi');";
        $res = Check_db($sql);
        if($res){
            echo "<script>alert(\"Lập phiếu thành công\");</script>";
        }
        else{
            echo "<script>alert(\"Lập phiếu thất bại\");</script>";
        }
        
    }
}

?>