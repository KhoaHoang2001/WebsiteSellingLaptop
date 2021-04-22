<?php
    function test($sql){
        include('conn.php');
        $request=$conn->query($sql);
        if(mysqli_num_rows($request)>0){
            $row=$request->fetch_assoc();
            return $row;
        }else return null;
        $conn->close();
    }

    function update($sql_update){
        include('conn.php');
        if($conn->query($sql_update)!=true){
            echo "error: ".$sql."<br>".$conn->error;
        }
        $conn->close();
    }
    function themSP_gio($MASP,$GIA){
        include('conn.php');
        $TAIKHOAN=$_SESSION['TAIKHOAN'];
        $row_DH=test("SELECT*FROM donhang WHERE TAIKHOAN='$TAIKHOAN' AND TRANGTHAI='CHUATHANHTOAN'");
        if($row_DH!=null){
            $TONGTIEN=$row_DH['TONGTIEN']+$GIA;
            $MADH=$row_DH['MADH'];
            update("UPDATE donhang SET TONGTIEN='$TONGTIEN'WHERE MADH='$MADH");
            $row_MH=test("SELECT*FROM monhang WHERE MASP='$MASP' AND MADH='$MADH'");
            if($row_MH!=null){
                $SOLUONGDAT=$row_MH['SOLUONGDAT']+1;
                update("UPDATE monhang SET SOLUONGDAT='$SOLUONGDAT' where MADH='$MADH' AND MASP='$MASP'");
            }else{
                $sql_insert_MH="INSERT INTO monhang VALUES('$MADH','$MASP','1')";
                if($conn->query($sql_insert_MH)!=true){
                    echo "error: ".$sql."<br>".$conn->error;
                }
            }
            
        }else{
            $sql_insert_DH="INSERT INTO donhang(TAIKHOAN,TRANGTHAI,TONGTIEN) VALUES('$TAIKHOAN','CHUATHANHTOAN','$GIA')";
                if($conn->query($sql_insert_DH)==true){
                    $row_DH=test("SELECT*FROM donhang WHERE TAIKHOAN='$TAIKHOAN' AND TRANGTHAI='CHUATHANHTOAN'");
                        $MADH=$row_DH['MADH'];
                        $sql_insert="INSERT INTO monhang VALUES('$MADH','$MASP','1')";
                        if($conn->query($sql_insert)!=true){
                            echo "error: ".$sql."<br>".$conn->error;
                        }
                }
        }
        $conn->close();
    }
    
?>