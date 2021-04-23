<div class="form_box">
    <h2>Thêm tài khoản nhân viên</h2>
    <div class="border_bottom"></div>
    <!--/.border_bottom -->
    <form action="" method="post" enctype="multipart/form-data">

        <table align="center" width="100%">
            <tr>
                <td><b>Tài khoản:</b></td>
                <td><input type="text" name="taikhoan" size="60" required /></td>
            </tr>

            <tr>
                <td><b>Mật khẩu: </b></td>
                <td><input type="passowrd" name="matkhau" required /></td>
            </tr>


            <tr>
                <td><b>Chức vụ:</b></td>
                <td><input type="text" name="tennd" required /></td>
            </tr>

            <tr>
                <td><b>Địa chỉ: </b></td>
                <td><input type="text" name="diachi" require /></td>
            </tr>

            <tr>
                <td valign="top"><b>Số điện thoại:</b></td>
                <td><input type="text" name="sdt" /></td>
            </tr>

            <tr>
                <td valign="top"><b>UsernameNV:</b></td>
                <td><input type="email" name="email" /></td>
            </tr>
            <tr>
                <td valign="top"><b>Mật khẩu:</b></td>
                <td><input type="date" name="ngaysinh"></td>
            </tr>
            <tr>
                <td valign="top"><b>Mật khẩu:</b></td>
                <td><input type="text" name="gioitinh"></td>
            </tr>
            <tr>

                <td colspan="7" class="text-center"> <input type="submit" class="btn-submit" name="insert_post"
                        value="Thêm tài khoản">
                </td>

            </tr>
        </table>

    </form>

</div><!-- /.form_box -->

<?php

require_once('./includes/include.php');
require_once('./includes/conn.php');

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
    $taikhoan = Get_value($_POST['taikhoan']);
    $matkhau = Get_value(md5($_POST['matkhau']));
    $tennd = Get_value($_POST['tennd']);
    $gioitinh = $_POST['gioitinh'];
    $sdt = $_POST['sdt'];
    $diachi = Get_value($_POST['diachi']);
    $email = Get_value($_POST['email']);
    $ngaysinh = $_POST['ngaysinh'];
    if(!Check_Staff($taikhoan)){
        $conn = Connect();
        $matkhau = md5($matkhau);
        $sql = "INSERT INTO `nguoidung` (`TAIKHOAN`, `MAQUYEN`, `MATKHAU`, `TENND`) VALUES ('$taikhoan', 'NV', '$matkhau', '$tennd');";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        echo "dang ky tai khoan thanh cong";
    }
    else{
        echo "tai khoan da ton tai";
    }
}
?>