<?php 
    require_once('includes/include.php');

    function Img_product($masp){
        $sql_img = "SELECT * FROM HINHANH WHERE MASP = '$masp';";
        $res_img = Check_db($sql_img);
        return $res_img;
    }

    function Product_search(){
        if(isset($_GET['submit'])){
            $tensp = $_GET['tensp'];
            $sql = "SELECT * FROM SANPHAM WHERE TENSP LIKE '%$tensp%'";
            $res = Check_db($sql);
            if(mysqli_num_rows($res) > 0){
                while ($row = mysqli_fetch_assoc($res)) {
                    $masp = $row['MASP'];
                    $tensp = $row['TENSP'];
                    $gia = $row['GIA'];
                    $kichthuocmh = $row['KICHTHUOCMH'];
                    $vixuly = $row['VIXULY'];
                    $ram = $row['RAM'];
                    $res_img = Img_product($tensp);
                    if(mysqli_num_rows($res_img) > 0){
                        while ($row_img = mysqli_fetch_assoc($res_img)) {
                            $hinhanh = $row_img['link'];
                        }
                    }
                    //show san pham ra manh hinh.
                }
            }
            
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product_view</title>
</head>
<body>
    <form method="get">
        Tên sản phẩm: <input type="text" name="tensp" id="tesp">
        <button type="submit" name="submit" value="search">Tìm kiếm</button>
    </form>
    <?php Product_search();?>
</body>
</html>