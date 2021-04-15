<?php
    //require('conn.php');
    require('include.php');
    $msg = "";

    function check_user($taikhoan){ //kiểm tra quyền tài 
        
    }
    if(isset($_POST['submit'])){
        $taikhoan = $_POST['taikhoan'];
        $matkhau = $_POST['matkhau']; //chua md5
        $conn = Connect();
        $sql = "select maquyen from nguoidung where taikhoan = '$taikhoan'";
        $res = check_db($sql);
        if($res != null){
            $row = $res->fetch_assoc();
            // echo "<p>".$row['maquyen']."</p>";
            
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