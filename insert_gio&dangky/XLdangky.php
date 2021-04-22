<?php
$TAIKHOAN = $MATKHAU = $TENND = $NHAPLAIMK = $tontaiTKerror="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $TAIKHOAN = $_POST["TAIKHOAN"];
    $MATKHAU = $_POST["MATKHAU"];
    $TENND = ($_POST["TENND"]);
    $NHAPLAIMK = ($_POST["NHAPLAIMK"]);
            if($MATKHAU==$NHAPLAIMK){
                
                    include('conn.php');
                        ///KH LÀ MÃ QUYỀN KHÁCH HÀNG
                        
                        $sql1="SELECT * FROM nguoidung WHERE TAIKHOAN='$TAIKHOAN'";
                        $request=$conn->query($sql1);
            
                        if(mysqli_num_rows($request)>0){
                            $tontaiTKerror="Tài khoản đã tồn tại!!!";
                        }else{
                            $MATKHAU=md5($MATKHAU);
                            $sql="INSERT INTO nguoidung(TAIKHOAN,MAQUYEN,MATKHAU,TENND) VALUE ('$TAIKHOAN','KH','$MATKHAU','$TENND')";
                            IF($conn->query($sql)==true){
                                header('Location: ./CT250/login.html');
                            }else{
                                echo "error: ".$sql."<br>".$conn->error;
                            }
                        }
                        
                        $conn->close();
                
            }else $NHAPLAIMK="";
    }
  

?>

