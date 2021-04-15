<?php
    //require('conn.php');
    require('includes/include.php');
    $msg = "";

    function check_user($row){ //kiểm tra quyền tài
        $maquyen = $row['maquyen'];
        $_SESSION('user') = $row['taikhoan'];
        if($maquyen == 'NV'){
            header('location: /weblaptop/admin/index.php'); //sai dia chi thu muc
        }
        else if($maquyen == 'KH'){
            header('location: /weblaptop/index.php');
        }
        else if($maquyen == 'admin'){
            header('location: /weblaptop/admin/index.php');
        }
    }

    if(isset($_POST['submit'])){
        $taikhoan = $_POST['taikhoan'];
        $matkhau = md5($_POST['matkhau']);
        $sql = "SELECT * FROM nguoidung WHERE taikhoan = '$taikhoan' AND WHERE = '$matkhau'";
        $res = check_db($sql);
        if(mysqli_num_rows($res) > 0){
            $row = mysqil_fetch_assoc($res);
            check_user($row);
        }
        else{
            echo "sai tai khoan hoac mat khau";
        }
    }
?>

<html>
    <head></head>
    <body>
        <form method="post">
            <div class="">taikhoan: <input type="text" name="taikhoan"></div>
            <div class="">matkhau: <input type="password" name="matkhau"></div>
            <div class=""><button type="submit" name="submit">login</button></div>
        </form>
        <p name="loginfaile" style="display: none;">Sai tai khoan hoac mat khau</p>
    </body>
</html>