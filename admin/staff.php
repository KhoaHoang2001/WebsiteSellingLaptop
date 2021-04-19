<?php 
    require_once('../includes/include.php');
    require_once('../includes/conn.php');
    //Check_role_in_site($_SESSION['maquyen']);

    function Check_Staff($taikhoan){
        if(isset($_POST['submit'])){
            $sql = "SELECT * FROM NGUOIDUNG WHERE taikhoan = '$taikhoan';";
            $res = Check_db($sql);
            if(mysqli_num_rows($res) > 0){
                return true;
            }
            else{
                return false;
            }
        }
    }

    function Add_Staff($taikhoan, $matkhau, $tennd){
        //if(isset($_POST['submit'])){
            if(!Check_Staff($taikhoan)){
                $conn = Connect();
                $matkhau = md5($matkhau);
                $sql = "INSERT INTO `nguoidung` (`TAIKHOAN`, `MAQUYEN`, `MATKHAU`, `TENND`) VALUES ('$taikhoan', 'NV', '$matkhau', '$tennd');";
                mysqli_query($conn, $sql);
                mysqli_close($conn);
                echo "dang ky tai khoan thanh cong";
            }
            else{
                echo "tai khoan da ton tai";
            }
        //}
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        Tài khoản: <input type="text" name="taikhoan" id="taikhoan"><br>
        Mật khẩu: <input type="password" name="matkhau" id="matkhau"><br>
        Họ tên: <input type="text" name="tennd" id="tennd"><br>
        <button type="submit" name="submit" id="submit" value="add_staff">Thêm nhân viên</button>
    </form>
    <?php 
        if(isset($_POST['submit'])){
            Add_Staff($_POST['taikhoan'], $_POST['matkhau'], $_POST['tennd']);  
        }
    ?>
</body>
</html>