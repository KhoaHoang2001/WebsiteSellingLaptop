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
                document.getElementById('kiemtramk').innerHTML = 'Không trùng khớp';44
            }
        }

        const check_number_phone = function () {
            let phone = document.getElementById('sdt').value;
            if(!isNaN(phone)){
                document.getElementById('kiemtrasdt').style.color = 'green';
                document.getElementById('kiemtrasdt').innerHTML = 'Chính xác';
            } else {
                document.getElementById('kiemtrasdt').style.color = 'red';
                document.getElementById('kiemtrasdt').innerHTML = 'Phải là số';
            }
        }

        const check_all = () => {
            let password = document.getElementById('matkhau').value;
            let confirm_password = document.getElementById('xacnhanmk').value;
            let phone = document.getElementById('sdt').value;
            if(password != confirm_password){
                alert("Mật khẩu và xác nhận mật khẩu không giống nhau!");
            }
            else if(isNaN(phone)){
                alert("Số điện thoại phải là số!");
            }
            else {

            }
        }
    </script>
    <h2>Thêm tài khoản nhân viên</h2>
    <div class="border_bottom"></div>
    <!--/.border_bottom -->
    <form action="" method="post" enctype="multipart/form-data">
    
        <table align="center" width="100%">
            <tr>
                <td valign="top"><b>Họ tên nhân viên:</b></td>
                <td><input type="text" name="tennd" id="tennd" size = 60 required /></td>
            </tr>
            <tr>
                <td valign="top"><b>Tài khoản:</b></td>
                <td><input type="text" name="taikhoan" id="taikhoan" required /></td>
            </tr>

            <tr>
                <td valign="top"><b>Mật khẩu: </b></td>
                <td><input type="password" name="matkhau" id="matkhau" onkeyup="check_password()" required/></td>
            </tr>
            <tr>
                <td valign="top"><b>Nhập lại mật khẩu: </b></td>
                <td>
                    <input type="password" name="xacnhanmk" id="xacnhanmk" onkeyup="check_password()" required/>
                    <span id="kiemtramk"></span>
                </td>
            </tr>
            <tr>
                <td valign="top"><b>Giới tính:</b></td>
                <td>
                    <b>Nam </b><input type="radio" name="gioitinh" id="gioitinh" value="1">
                    <b>Nữ </b><input type="radio" name="gioitinh" id="gioitinh" value="0">
                </td>
            </tr>
            <tr>
                <td valign="top"><b>Địa chỉ: </b></td>
                <td><input type="text" name="diachi" id="diachi" required/></td>
            </tr>

            <tr>
                <td valign="top"><b>Số điện thoại:</b></td>
                <td>
                    <input type="number_format" name="sdt" id="sdt" onkeyup="check_number_phone()" required/>
                    <span id="kiemtrasdt"></span>
                </td>
            </tr>

            <tr>
                <td valign="top"><b>Email:</b></td>
                <td><input type="email" name="email" id="email" required/></td>
            </tr>
            <tr>
                <td valign="top"><b>Ngày sinh:</b></td>
                <td><input type="date" name="ngaysinh" id="ngaysinh"></td>
            </tr>
            <tr>

                <td colspan="7" class="text-center"> 
                    <button class="btn-submit" name="insert_post" id="insert_post" value="Thêm tài khoản">Thêm tài khoản</button>
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
        $sql = "INSERT INTO `nguoidung` (`TAIKHOAN`, `MAQUYEN`, `MATKHAU`, `TENND`, `GIOITINH`, `SDT`, `DIACHI`, `EMAIL`, `NGAYSINH`) 
                VALUES ('$taikhoan', 'NV', '$matkhau', '$tennd', $gioitinh, $sdt, $diachi, $email, $ngaysinh);";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        echo "<script>alert(\"Đăng ký tài khoản thành công\");</script>";
    }
    else{
        echo "<script>alert(\"Tài khoản đã tồn tại\");</script>";
    }
}
?>