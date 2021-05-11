<?php 
    require_once('includes/include.php');
    require_once('includes/product.php');
    //Check_role_in_site($_SESSION['maquyen']);
?>



<?php 
    if(isset($_GET['search_product'])){
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
                $res_img = Get_image($masp);
                $row = mysqli_fetch_assoc($res_img);
                $hinhanh = $row['link'];
                //show san pham ra manh hinh.
            }
        }
    }
?>