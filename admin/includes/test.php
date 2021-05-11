
<?php
require_once('./includes/include.php');
require_once('./includes/conn.php');
?>
<div class="form_box">

    <h2></h2>
    <div class="border_bottom"></div>
    <!--/.border_bottom -->
    <form onsubmit="return Check_all()" method="post" enctype="multipart/form-data">
    
        <table align="center" width="100%">
        <tr>
                <td valign="top"><b>Mã sản phẩm:</b></td>
                <td><input type="text" name="masp" id="masp"   /></td>
            </tr>
<!-- 
            <tr>
                <td><b>Hình ảnh: </b></td>
                <form action="" method="post" enctype="multipart/form-data">
                <input type="file" name="files[]" multiple >
                <input type="submit" name="submit" value="UPLOAD"> -->
</form>
            <!-- </tr> -->
                            
            <tr>

                <td colspan="1" class="text-center"> 
                    <input type="submit" class="btn-submit" name="themsanpham" value="Thêm Sản Phẩm">
                </td>
            </tr>
            
        </table>
    </form>
</div>
<?php
  /*  if (isset($_POST['themsanpham'])) {
        $uploads_dir = '/uploads';
        foreach ($_FILES["files"]["error"] as $key => $error) {
            if ($error == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES["files"]["tmp_name"][$key];
            $name = basename($_FILES["files"]["name"][$key]);
            move_uploaded_file($tmp_name, "product_images/$name");
    }
    echo "<script>alert(\"<?php echo $name ?>\");</script>";      
    $sql_hinh = "INSERT INTO HINHANH (masp, link) VALUES ('MT100', '$name');";
    $conn = Connect();
    mysqli_query($conn, $sql_hinh);
    mysqli_close($conn);
    if($sql_hinh){
        echo "<script>alert(\"Thêm sản phẩm thành công\");</script>"; 
    }else{
        "<script>alert(\"buồn\");</script>";
    }
}*/
$ktra = "SELECT magiamgia FROM giamgia";
$res = Check_db($ktra);
if(mysqli_num_rows($res)>0){
    $sql = "SELECT MAX(magiamgia) FROM giamgia";
    $res = Check_db($sql);
    $row = mysqli_fetch_array($res);
    $sosp =(intval(substr(($row['MAX(magiamgia)']),2))+1);
    $magiamgia = 'GG'.strval($sosp);
}else{
    $magiamgia = "GG1";
}

echo $magiamgia;


    

//}
       