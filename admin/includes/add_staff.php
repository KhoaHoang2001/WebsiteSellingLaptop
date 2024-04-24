<?php
    require_once('./includes/include.php');
    require_once('./includes/conn.php');
    if(isset($_POST['insert_post'])){
        Check_f5($_POST['insert_post']);
    }
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

        const check_number_phone = function () {
            let phone = document.getElementById('sdt').value;
            if(!isNaN(phone)){
                document.getElementById('kiemtrasdt').innerHTML = '';
            } else {
                document.getElementById('kiemtrasdt').style.color = 'red';
                document.getElementById('kiemtrasdt').innerHTML = 'Phải là số';
            }
        }

        const Check_all = function () {
            let password = document.getElementById('matkhau').value;
            let confirm_password = document.getElementById('xacnhanmk').value;
            let phone = document.getElementById('sdt').value;
            if(password != confirm_password){
                alert("Mật khẩu và xác nhận mật khẩu bắt buộc phải giống nhau!");
                return false;
            }
            else if(isNaN(phone)){
                alert("Số điện thoại bắt buộc phải là số!");
                return false;
            }
        }
    </script>
    <h2>Thêm nhân viên</h2>
    <div class="border_bottom"></div>
    <!--/.border_bottom -->
    <form onsubmit="return Check_all()" method="post" enctype="multipart/form-data">
    
        <table align="center" width="100%">
            <tr>
                <td valign="top"><b>Họ tên nhân viên:</b></td>
                <td><input type="text" name="tennd" id="tennd" size = 60 required /></td>
            </tr>
            <tr>
                <td valign="top"><b>Ngày vào làm:</b></td>
                <td><input type="date" name="ngayvl" id="ngayvl" required></td>
            </tr>
            <tr>
                <td valign="top"><b>Chức vụ:</b></td>
                <td><select name="chucvu" id="chucvu" required>
                    <option value="QLBH">Quản Lý Bán Hàng</option>
                    <option value="QLNS">Quản Lý Nhân Sự</option>
                    <option value="QTHT">Quản Trị Hệ Thống</option>
                    <option value="QLTK">Quản Lý Tồn Kho</option>
                    <option value="QLKD">Quản Lý Kinh Doanh</option>
                </select></td>
            </tr>
            <tr>
                <td valign="top"><b>Tên tài khoản:</b></td>
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
                <td><input type="date" name="ngaysinh" id="ngaysinh" required></td>
            </tr>
            <tr>

                <td colspan="9" class="text-center"> 
                    <input type="submit" class="btn-submit" name="insert_post" value="Thêm nhân viên">
                </td>
            </tr>
        </table>
    </form>

</div><!-- /.form_box -->

<?php

    function Check_Staff($taikhoan){
        $sql = "SELECT * FROM NGUOIDUNG WHERE TAIKHOAN = '$taikhoan';";
        $res = Check_db($sql);
        if(mysqli_num_rows($res) > 0){
            return true;
        }
        else{
            return false;
        }
    }

if (isset($_POST['insert_post'])) {

    function gen_manv($chucvu){
        $ktra = "SELECT MANV FROM NHANVIEN WHERE MANV LIKE '$chucvu%'";
        $res = Check_db($ktra);
        if(mysqli_num_rows($res)>0){
            $sql = "SELECT MAX(MANV) FROM NHANVIEN' WHERE MANV LIKE '$chucvu%'";
            $res = Check_db($sql);
            $row = mysqli_fetch_array($res);
            $sonv = (int) substr($row['MAX(MANV)'], 4) + 1;
            $manv = $chucvu.($sonv>999?"":($sonv>99?"0":($sonv>9?"00":"000"))).$sonv;
        }else{
        $manv = $chucvu."0001";
        }
        return $manv;
    }

    $taikhoan = Get_value($_POST['taikhoan']);
    $matkhau = Get_value(md5($_POST['matkhau']));
    $tennd = Get_value($_POST['tennd']);
    $ngayvl = Get_value($_POST['ngayvl']);
    $chucvu = Get_value($_POST['chucvu']);
    $gioitinh = $_POST['gioitinh'];
    $sdt = $_POST['sdt'];
    $diachi = Get_value($_POST['diachi']);
    $email = Get_value($_POST['email']);
    $ngaysinh = $_POST['ngaysinh'];
    $manv = gen_manv($chucvu);

    if(!Check_Staff($taikhoan)){
        $matkhau = md5($matkhau);
        $sql = "INSERT INTO NGUOIDUNG (TAIKHOAN, CHUCVU, MATKHAU, TENND, GIOITINH, SDT, DIACHI, EMAIL, NGAYSINH) 
                VALUES ('$taikhoan', '$chucvu', '$matkhau', '$tennd', $gioitinh, '$sdt', '$diachi', '$email', '$ngaysinh');";
        $res = Check_db($sql);
        $sql = "INSERT INTO NHANVIEN (MANV, TAIKHOAN, NGAYVL) VALUES ('$manv', '$taikhoan', '$ngayvl');";
        $res = Check_db($sql);
        if($res){
            echo "<script>alert(\"Thêm nhân viên thành công\");</script>";
        }
        else{
            echo "<script>alert(\"Thêm nhân viên thất bại\");</script>";
        }
        
    }
    else{
        echo "<script>alert(\"Nhân viên đã tồn tại\");</script>";
    }
}

?>