<?php
    require('conn.php');
    require('include.php');
    $msg = "";
    echo $_POST['submit'];
    if(isset($_POST['submit'])){
        $username = get_value($conn, $_POST['username']);
        $password = get_value($conn, $_POST['password']);
        $sql = "select * from nhanvien where username = '$username' and password = '$password';";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if($count > 0){
            $_SESSION['admin_login'] = 'yes';
            $_SESSION['admin_username'] = $username;
            header('location: /nienluan/index.php');
            die();
        }
        else {
            $msg = "sai tên tài khoản hoặc mật khẩu";
        }
    }
?>

<html>
    <head></head>
    <body>
        <form method="post">
            <div class="">username: <input type="text" name="taikhoan"></div>
            <div class="">password: <input type="password" name="matkhau"></div>
            <div class=""><button type="submit" name="submit">login</button></div>
        </form>
        <p name="loginfaile" style="display: none;">Sai tai khoan hoac mat khau</p>
    </body>
</html>