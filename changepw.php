
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-primary">Đổi mật khẩu</h3>
            <form method="POST" onsubmit="return false;" id="formChangePass">
                <div class="form-group">
                    <label for="user_signin">Mật khẩu cũ</label>
                    <input type="password" class="form-control" id="old_pass">
                </div>
                <div class="form-group">
                    <label for="user_signin">Mật khẩu mới</label>
                    <input type="password" class="form-control" id="new_pass">
                </div>
                <div class="form-group">
                    <label for="user_signin">Nhập lại mật khẩu mới</label>
                    <input type="password" class="form-control" id="re_new_pass">
                </div>
                <a href="index.php" class="btn btn-default">
                    <span class="glyphicon glyphicon-arrow-left"></span> Trở về
                </a>
                <button class="btn btn-primary" id="submit_change_pass">
                    <span class="glyphicon glyphicon-ok"></span> Thay đổi
                </button>
                <br><br>
                <div class="alert alert-danger hidden"></div>
            </form>
        </div>
    </div>
</div>

<?php
    require_once('./includes/include.php');
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