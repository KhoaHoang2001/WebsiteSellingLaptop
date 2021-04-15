<?php
    //require('conn.php');
    require('includes/include.php');
    $msg = "";

    function check_user($row){ //kiểm tra quyền tài
        $maquyen = $row['maquyen'];
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
        $conn = Connect();
        $sql = "select maquyen from nguoidung where taikhoan = '$taikhoan'";
        $res = check_db($sql);
        if($res != null){
            $row = $res->fetch_assoc();
            // echo "<p>".$row['maquyen']."</p>";
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