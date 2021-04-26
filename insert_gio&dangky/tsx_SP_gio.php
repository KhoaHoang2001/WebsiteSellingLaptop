<?php

    function test($sql){
        include('connectDB.php');
        $request=$conn->query($sql);
        if(mysqli_num_rows($request)>0){
            $row=$request->fetch_assoc();
            return $row;
        }else return null;
        $conn->close();
    }

    function update($sql_update){
        include('connectDB.php');
        if($conn->query($sql_update)!=true){
            echo "error: ".$sql."<br>".$conn->error;
        }
        $conn->close();
    }
    function themSP_gio($MASP){
        echo $MASP;
        $TAIKHOAN=$_SESSION['TAIKHOAN'];
        $row_SPGH=test("SELECT*FROM sanphamgiohang WHERE TAIKHOAN='$TAIKHOAN' AND MASP='$MASP'");
        if($row_SPGH!=null){
            $SOLUONGGIO=$row_SPGH['SOLUONGGIO']+1;
            update("UPDATE sanphamgiohang SET SOLUONGGIO='$SOLUONGGIO' WHERE TAIKHOAN='$TAIKHOAN' AND MASP='$MASP");
        }else{
            include('connectDB.php');
            $sql="INSERT INTO sanphamgiohang VALUES('$MASP','$TAIKHOAN','1')";
            if($conn->query($sql)!=true){
                echo "error: ".$sql."<br>".$conn->error;
            }else echo $sql;
            $conn->close();
        }
    }

    function sua_SP_gio($SOLUONGGIO){
        include('connectDB.php');
        $TAIKHOAN=$_SESSION['TAIKHOAN'];
        $row_SPGH=test("SELECT*FROM sanphamgiohang WHERE TAIKHOAN='$TAIKHOAN' AND MASP='$MASP'");
        if($row_SPGH!=null){
            update("UPDATE sanphamgiohang SET SOLUONGGIO='$SOLUONGGIO' WHERE TAIKHOAN='$TAIKHOAN' AND MASP='$MASP");
        }
        $conn->close();
    }

    function xoa_SP_gio($MASP){
        include('connectDB.php');
        $sql="DELETE FROM sanphamgiohang WHERE MASP='$MASP'";
        if($conn->query($sql)==true){
            header('Location: ');
        }else{
            echo "error: ".$sql."<br>".$conn->error;
        }
        $conn->close();
    }

    
?>