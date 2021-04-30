<?php 
    require_once('./includes/include.php');
    require_once('./includes/conn.php');
?>

<div class="form_box">
    <script>
        const check_password = function () {
            let password = document.getElementById('matkhau').value;
            let confirm_password = document.getElementById('xacnhanmk').value;
            if (password == confirm_password) {
                document.getElementById('kiemtramk').style.color = 'green';
                document.getElementById('kiemtramk').innerHTML = 'Trùng khớp';
            } else {
                document.getElementById('kiemtramk').style.color = 'red';
                document.getElementById('kiemtramk').innerHTML = 'Không trùng khớp';
            }
        }

        const Check_all = function () {
            let password = document.getElementById('matkhau').value;
            let confirm_password = document.getElementById('xacnhanmk').value;
            if(password != confirm_password){
                alert("Mật khẩu và xác nhận mật khẩu bắt buộc phải giống nhau!");
                return false;
            }
        }
    </script>
    <h2>Đổi mật khẩu</h2>
    <div class="border_bottom"></div>
    <!--/.border_bottom -->
    <form method="post" onsubmit="return Check_all()" enctype="multipart/form-data">
        <table align="center" width="100%">
            <tr>
                <td><b>Mật khẩu cũ:</b></td>
                <td><input type="password" name="matkhaucu" disabled/></td>
            </tr>
            <tr>
                <td><b>Mật khẩu mới:</b></td>
                <td>
                    <input type="password" name="matkhau" required />
                </td>
            </tr>
            <tr>
                <td valign="top"><b>Nhập lại mật khẩu: </b></td>
                <td>
                    <input type="password" name="xacnhanmk" id="xacnhanmk" onkeyup="check_password()" required/>
                    <span id="kiemtramk"></span>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="text-center"><input class="btn btn-primary btn-submit" type="submit"
                        name="change_pass" value="Lưu" /></td>
            </tr>
        </table>
    </form>
</div>

<?php 
    if (isset($_POST['change_pass'])) {
        $matkhau = Get_value($_POST['matkhau']);
        $matkhau = md5($matkhau);
        $taikhoan = $_SESSION['taikhoan'];
        $sql_change_pass = 'UPDATE NGUOIDUNG SET MATKHAU = '$matkhau' WHERE `nguoidung`.`TAIKHOAN` = '$taikhoan';';
        $res_change_pass = Check_db($sql_change_pass);
        if($res_change_pass){
            echo "<script>alert('Đổi mật khẩu thành công!')</script>";
            echo "<script>window.open(window.location.href,'_self')</script>";
        }
        else {
            echo "<script>alert('Đổi mật khẩu thất bại!')</script>";
        }
    }

?>