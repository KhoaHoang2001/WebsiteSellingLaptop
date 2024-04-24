<?php
    require_once('./includes/include.php');
    require_once('./includes/conn.php');
    if(isset($_POST['insert_post'])){
        Check_f5($_POST['insert_post']);
    }
?>
<div class="form_box">

    <h2>Làm đơn xin nghỉ phép</h2>
    <div class="border_bottom"></div>
    <!--/.border_bottom -->
    <form onsubmit="return" method="post" enctype="multipart/form-data">
    
        <table align="center" width="100%">
            <tr>
                <td valign="top"><b>Bắt đầu nghỉ từ ngày:</b></td>
                <td><input type="date" name="ngaybd" id="ngaybd" required /></td>
            </tr>
            <tr>
                <td valign="top"><b>Đến ngày:</b></td>
                <td><input type="date" name="ngaykt" id="ngaykt" required /></td>
            </tr>
            <tr>
                <td valign="top"><b>Lý do:</b></td>
                <td><input type="text" name="lydo" id="lydo" size=60 required/></td>
            </tr>
            <tr>
                <td colspan="9" class="text-center"> 
                    <input type="submit" class="btn-submit" name="insert_post" value="Tạo đơn">
                </td>
            </tr>
        </table>
    </form>

</div><!-- /.form_box -->

<?php

function tao_id(){
    $ktra = "SELECT MADON FROM DONNGHI";
    $res = Check_db($ktra);
    if(mysqli_num_rows($res)>0){
        $sql = "SELECT MAX(MADON) FROM DONNGHI";
        $res = Check_db($sql);
        $row = mysqli_fetch_array($res);
        $sosp =(intval($row['MAX(MADON)'])+1);
        $madon = strval($sosp);
    }else{
    $madon = "1";
    }
    return $madon;
}

    function get_manv() {
        $taikhoan = $_SESSION['taikhoan'];
        $sql = "SELECT MANV FROM NHANVIEN WHERE NHANVIEN.TAIKHOAN = '$taikhoan'";
        $res = Check_db($sql);
        $manv = mysqli_fetch_array($res)['MANV'];
        return $manv;
    }

    if (isset($_POST['insert_post'])) {
        $madon = tao_id();
        $manv = get_manv();
        $ngaybd = $_POST['ngaybd'];
        $ngaykt = $_POST['ngaykt'];
        $lydo = Get_value($_POST['lydo']);
        if(true){
            $sql = "INSERT INTO `donnghi` (`MADON`, `MANV`, `NGAYBD`, `NGAYKT`, `LYDO`, `TRANGTHAI`) 
                    VALUES ('$madon','$manv', '$ngaybd', '$ngaykt', '$lydo', 'Chưa xử lý');";
            $res = Check_db($sql);
            if($res){
                echo "<script>alert(\"Tạo đơn nghỉ thành công\");</script>";
            }
            else{
                echo "<script>alert(\"Tạo đơn nghỉ thất bại\");</script>";
            }
            
        }
    }

?>