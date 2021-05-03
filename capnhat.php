<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="weblaptop";
$conn=new mysqli($servername,$username,$password,$dbname);
$conn->set_charset("utf8"); 
if($conn->connect_error){
    die("Connection fail: ".$conn->connect_error);
}
    $MASP = $_GET['masp'];
    $SOLUONGGIO = $_GET['soluonggio'];
        $TAIKHOAN= 'vinh';
        $row_SPGH=test("SELECT*FROM sanphamgiohang WHERE TAIKHOAN='$TAIKHOAN' AND MASP='$MASP'");
        if($row_SPGH!=null){
            update("UPDATE sanphamgiohang SET SOLUONGGIO='$SOLUONGGIO' WHERE TAIKHOAN='$TAIKHOAN' AND MASP='$MASP");
        }
        if($conn->query($sql)==true){
            header('Location: cart.php');
        }else{  
            echo "error: ".$sql."<br>".$conn->error;
        }
        $conn->close();
        function test($sql){
            $request=$conn->query($sql);
            if(mysqli_num_rows($request)>0){
                $row=$request->fetch_assoc();
                return $row;
            }else return null;
        }
?>
