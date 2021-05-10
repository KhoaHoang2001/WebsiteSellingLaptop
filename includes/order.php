<?php 
    require_once('./include.php');
    require_once('./conn.php');

    function Get_Info_Account($taikhoan){
        $sql = "SELECT * FROM NGUOIDUNG WHERE taikhoan = '$taikhoan'";
        $res = Check_db($sql);
        $row = mysqli_fetch_assoc($res);
        $tennd = $row['TENND'];
        $sdt = $row['SDT'];
        $diachi = $row['DIACHI'];
        $email = $row['EMAIL'];
        $ngaysinh = $row['NGAYSINH'];
        $thongtin = array('tennd'=>$tennd, 'sdt'=>$sdt, 'diachi'=>$diachi, 'email'=>$email, 'ngaysinh'=>$ngaysinh);
        return $thongtin;
    }

    function Create_Order(){
        if(isset($_POST['dathang'])){
            $thongtin = Get_Info_Account($_SESSION['taikhoan']);
            $madh = uniqid();
            $diachi = $thongtin['diachi'];
            $taikhoan = $_SESSION['taikhoan'];
            $trangthai = 'Chưa xác nhận';
            
            $sql_create_order = 'INSERT INTO DONHANG ';
        }
    }

    function Add_Product(){
        
    }

    function Del_Cart($madh){
        $sql = "DELETE FROM MONHANG WHERE madh = '$madh'";
        $res = Check_db($sql);
    }
?>