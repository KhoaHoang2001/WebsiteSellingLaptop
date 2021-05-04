<?php
require_once('../includes/conn.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $TAIKHOAN = $_POST["TAIKHOAN"];
    $MATKHAU = $_POST["MATKHAU"];
    $TENND = ($_POST["TENND"]);
    $NHAPLAIMK = ($_POST["NHAPLAIMK"]);
    $GIOITINH=($_POST['GIOITINH']);
    $EMAIL=$_POST['EMAIL'];
    $SDT=$_POST['SDT'];
    echo $GIOITINH."".$EMAIL."".$SDT;
            $conn = Connect();
            $sql1="SELECT * FROM nguoidung WHERE TAIKHOAN='$TAIKHOAN'";
            $request=$conn->query($sql1);

            if(mysqli_num_rows($request)>0){
                header('lOCATION: signup.html');
            }else{
                $MATKHAU=md5($MATKHAU);
                $sql="INSERT INTO nguoidung(TAIKHOAN,MAQUYEN,MATKHAU,TENND,GIOITINH,SDT,EMAIL) VALUE ('$TAIKHOAN','KH','$MATKHAU','$TENND','$GIOITINH','$SDT','$EMAIL')";
                IF($conn->query($sql)==true){
                    header('Location: ./login.html');//link toi site dang nhap
                }else{
                    echo "error: ".$sql."<br>".$conn->error;
                }
            }
            $conn->close();
    }
  

?>

