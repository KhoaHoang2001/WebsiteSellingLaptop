<?php
    require_once('includes/include.php');

    if(isset($_POST['submit'])){
        $taikhoan = Get_value($_POST["taikhoan"]);
        $matkhau = Get_value($_POST["matkhau"]);
        $matkhau = md5($matkhau);
        $sql = "SELECT * FROM NGUOIDUNG WHERE taikhoan = '$taikhoan' AND matkhau = '$matkhau'";
        $res = Check_db($sql);
        if(mysqli_num_rows($res) > 0){
            $row = mysqli_fetch_assoc($res);
            $_SESSION['taikhoan'] = $row['TAIKHOAN'];
            $_SESSION['maquyen'] = $row['MAQUYEN'];
            Check_role($_SESSION['maquyen']);
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