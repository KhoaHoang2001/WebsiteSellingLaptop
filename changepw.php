<?php
    require_once('../includes/include.php');
    function Change_Pw(){
        if (isset(($_POST['doimatkhau']))){
            $taikhoan = Get_value($_POST['taikhoan']);
            $matkhaucu = Get_value($_POST['matkhaucu']);
            $matkhaumoi = Get_value($_POST['matkhaumoi']);
            $matkhaucu = md5($matkhaucu);
            $matkhaumoi = md5($matkhaumoi);
            $sql = "SELECT * FROM NGUOIDUNG WHERE taikhoan = '$taikhoan' AND matkhau = '$matkhaucu'";
            $res = Check_db($sql);
            if(mysqli_num_rows($res) > 0){
            $sqlupdate =  "UPDATE table NGUOIDUNG SET taikhoan = '$taikhoan' AND matkhau = '$matkhaumoi' ";
            $res = Check_db($sqlupdate);
            echo "cập nhật mật khẩu ok";

        }else{
            echo "sai rồi";
        }
    }
}
?>