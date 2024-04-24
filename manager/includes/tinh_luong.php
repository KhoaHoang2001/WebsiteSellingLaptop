<?php 
    require_once('./includes/include.php');
    require_once('./includes/conn.php');
?>

<div class="form_box">
    <h2>Tính lương nhân viên</h2>
    <div class="border_bottom"></div>
    <!--/.border_bottom -->
    <form method="post" enctype="multipart/form-data">
    
        <table align="center" width="100%">
            <tr>
                <td valign="top"><b>Mã nhân viên:</b></td>
                <td><input type="text" name="manv" id="manv" required /></td>
            </tr>
            <tr>
                <td valign="top"><b>Tháng:</b></td>
                <td><input type="text" name="thang" id="thang" required></td>
            </tr>
            <tr>
                <td valign="top"><b>Năm:</b></td>
                <td><input type="text" name="nam" id="nam" required></td>
            </tr>
            <tr>
                <td valign="top"><b>Số ngày làm:</b></td>
                <td><input type="number" name="snl" id="snl" required></td>
            </tr>
            <tr>
                <td valign="top"><b>Số ngày nghỉ:</b></td>
                <td><input type="number" name="snn" id="snn" required></td>
            </tr>
            <tr>
                <td valign="top"><b>Lương thưởng:</b></td>
                <td><input type="text" name="thuong" id="thuong" required></td>
            </tr>
            <tr>
                <td colspan="9" class="text-center"> 
                    <input type="submit" class="btn-submit" name="insert_post" value="Tính lương">
                </td>
            </tr>
        </table>
    </form>

</div><!-- /.form_box -->


<?php

    function Check_Staff($taikhoan){
        $sql = "SELECT * FROM NGUOIDUNG WHERE taikhoan = '$taikhoan';";
        $res = Check_db($sql);
        if(mysqli_num_rows($res) > 0){
            return true;
        }
        else{
            return false;
        }
    }

if (isset($_POST['insert_post'])) {

    $manv = $_POST['manv'];
    $thang = $_POST['thang'];
    $nam = $_POST['nam'];
    $snl = $_POST['snl'];
    $snn = $_POST['snn'];
    $thuong = $_POST['thuong'];
    if(!Check_Staff($taikhoan)){
        $sql = "INSERT INTO LUONGTHANG (MANV, THANG, NAM, SONGAYLAM, SONGAYNGHI, THUONG) 
                VALUES ('$manv', $thang, '$nam', '$snl', $snn, '$thuong');";
        $res = Check_db($sql);
        if($res){
            echo "<script>alert(\"Thành công\");</script>";
        }
        else{
            echo "<script>alert(\"Thất bại\");</script>";
        }
        
    }
    else{
        echo "<script>alert(\"Tài khoản đã tồn tại\");</script>";
    }
}

?>