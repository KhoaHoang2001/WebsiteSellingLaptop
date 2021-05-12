
<?php
require_once('./includes/include.php');
require_once('./includes/conn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function check_js() {
            var 
        }
    </script>
</head>
<body>
    <form action="" method="post">
        
    </form>
<<<<<<< HEAD
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



    
// if (isset($_POST['themsanpham'])){
//     //$masp = Get_value($_POST["masp"]);
//     $maloaisp = Get_value($_POST["maloaisp"]);
//     $magiamgia = Get_value($_POST["magiamgia"]);
//     $mansx = Get_value($_POST["mansx"]);
//     $tensp = Get_value($_POST["tensp"]);
//     $motasp = Get_value($_POST["motasp"]);
//     $ram = Get_value($_POST["ram"]);
//     $vixuly = Get_value($_POST["vixuly"]);
//     $kichthuocmh = Get_value($_POST["kichthuocmh"]);
//     $gia = Get_value($_POST["gia"]);
//     $soluongcon = Get_value($_POST["soluongcon"]);
//     $ngaysx = Get_value($_POST["ngaysx"]);
// if(!Check_product($masp)){
// if($magiamgia==''){
//     $sql = "INSERT INTO `sanpham` (`MASP`, `MALOAISP`, `MANSX`, `TENSP`, `MOTASP`, `RAM`, `VIXULY`, `KICHTHUOCMH`, `GIA`, `SOLUONGCON`, `NGAYSX`) 
//     VALUES ('$masp', '$maloaisp','$mansx', '$tensp', '$motasp', '$ram', '$vixuly', '$kichthuocmh', '$gia', '$soluongcon', '$ngaysx');";                     
// }else{
//     $sql = "INSERT INTO `sanpham` (`MASP`, `MALOAISP`, `MAGIAMGIA`, `MANSX`, `TENSP`, `MOTASP`, `RAM`, `VIXULY`, `KICHTHUOCMH`, `GIA`, `SOLUONGCON`, `NGAYSX`) 
//     VALUES ('$masp', '$maloaisp', '$magiamgia','$mansx', '$tensp', '$motasp', '$ram', '$vixuly', '$kichthuocmh', '$gia', '$soluongcon', '$ngaysx');";       
//     }
//     $conn = Connect();
//     $res = mysqli_query($conn, $sql);
//     mysqli_close($conn);
// }
// $uploads_dir = '/uploads';
// $ktra = $_FILES["files"]; 
// if($ktra != "jpg" || $ktra != "png" || $ktra != "jpeg" || $ktra != "gif" ) {
//     echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>"; 
//     break;
// }

// foreach ($_FILES["files"]["error"] as $key => $error) {
//     if($error == UPLOAD_ERR_OK) {
//             $tmp_name = $_FILES["files"]["tmp_name"][$key];
//             $name = basename($_FILES["files"]["name"][$key]);
//             move_uploaded_file($tmp_name, "product_images/$name");
//             $sql_hinh = "INSERT INTO HINHANH (masp, link) VALUES ('$masp', '$name');";
//             $conn = Connect();
//             $themhinh= mysqli_query($conn, $sql_hinh);
//             mysqli_close($conn);
//     }
    
// }
// if($themhinh){
//     echo "<script>alert('Thêm sản phẩm thành công');</script>";      
// } else {
//     echo "<script>alert('Thêm sản phẩm thất bại');</script>"; 
// }
// }