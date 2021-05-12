
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
$uploads_dir = '/uploads';
$ktra = $_FILES["files"]; 
$tam = 0;
foreach($_FILES["files"]["error"] as $key => $error){
    if($ktra != "jpg" || $ktra != "png" || $ktra != "jpeg" || $ktra != "gif" ){
        $tam++;
    }
} 

if($tam=0){
    foreach($_FILES["files"]["error"] as $key => $error) {
        if($error == UPLOAD_ERR_OK) {
                $tmp_name = $_FILES["files"]["tmp_name"][$key];
                $name = basename($_FILES["files"]["name"][$key]);
                move_uploaded_file($tmp_name, "product_images/$name");
                $sql_hinh = "INSERT INTO HINHANH (masp, link) VALUES ('$masp', '$name');";
                $conn = Connect();
                $themhinh= mysqli_query($conn, $sql_hinh);
                mysqli_close($conn);
        } 
    }
    if($themhinh){
        echo "<script>alert('Thêm sản phẩm thành công');</script>";      
    } else {
        echo "<script>alert('Thêm sản phẩm thất bại');</script>"; 
    }
}



    

//}
       