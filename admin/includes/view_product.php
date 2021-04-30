<?php 
    require_once('./includes/include.php');
    require_once('./includes/conn.php');
?>
<div class="view_product_box">
    <h2>Danh sách sản phẩm</h2>
    <div class="border_bottom"></div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="search_bar">
            <input type="text" id="search" placeholder="Type to search..." />
        </div>
        <table width="100%">
            <thead>
                <tr>
                    <th class="text-center">Mã sản phẩm:</th>
                    <th>Mã loại sản phẩm:</th>
                    <th>Mã giảm giá:</th>
                    <th>Mã nhà sản xuất:</th>
                    <th>Tên sản phẩm:</th>
                    <th>Mô tả sản phẩm:</th>
                    <th>Ram:</th>
                    <th>Vi xử lý:</th>
                    <th>Kích thước màn hình:</th>
                    <th>Giá:</th>
                    <th>Số lượng còn:</th>
                    <th>Ngày sản xuất:</th>
                    <th>Ảnh</th>
                    <th class="text-center">Sửa</th>
                    <th class="text-center">Xóa</th>
                </tr>
            </thead>
            <?php
            $sql_all_product = "SELECT sanpham.MASP, sanpham.MALOAISP, sanpham.MAGIAMGIA,sanpham.MANSX, sanpham.TENSP, sanpham.MOTASP, sanpham.RAM, sanpham.VIXULY, sanpham.KICHTHUOCMH, sanpham.GIA, sanpham.SOLUONGCON, sanpham.NGAYSX, hinhanh.LINK FROM hinhanh INNER JOIN sanpham ON hinhanh.MASP=sanpham.MASP";
            $res_all_product = Check_db($sql_all_product);

            while ($row = mysqli_fetch_assoc($res_all_product)) {
                $masp = $row['MASP'];
                $maloaisp = $row['MALOAISP'];
                $magiamgia = $row['MAGIAMGIA'];
                $mansx = $row['MANSX'];
                $tensp = $row['TENSP'];
                $motasp = $row['MOTASP'];
                $ram = $row['RAM'];
                $vixuly = $row['VIXULY'];
                $kichthuocmh = $row['KICHTHUOCMH'];
                $gia = $row['GIA'];
                $soluongcon = $row['SOLUONGCON'];
                $ngaysx = $row['NGAYSX'];
                $hinh = $row['LINK'];
                
            ?>
            <tbody>
                <tr>
                    <td class="text-center"><?php echo $masp; ?></td>
                    <td><?php echo $maloaisp; ?></td>
                    <td><?php echo $magiamgia; ?></td>
                    <td><?php echo $mansx; ?></td>
                    <td><?php echo $tensp; ?></td>
                    <td><?php echo $motasp; ?></td>
                    <td><?php echo $ram; ?></td>
                    <td><?php echo $vixuly; ?></td>
                    <td><?php echo $kichthuocmh; ?></td>
                    <td><?php echo $gia; ?></td>
                    <td><?php echo $soluongcon; ?></td>
                    <td><?php echo $ngaysx; ?></td>
                    <td><img src="/weblaptop/admin/product_images/<?php echo $row['LINK']; ?>" width="70"
                            height="50" />
                    <td class="text-center"><a class="btn btn-danger btn-submit btn-sm"
                            href="index.php?action=view_category&delete_category=<?php echo $tenloaisp; ?>">Sửa</a></td>
                    <td class="text-center"><a class="btn btn-danger btn-submit btn-sm"
                            href="index.php?action=view_category&delete_category=<?php echo $tenloaisp; ?>">Xóa</a></td>
                </tr>
            </tbody>
            <?php
            } // End while loop 
            ?>
        </table>

    </form>

</div>
<?php
if(isset($_GET['delete_category'])){
    $mansx = $_GET['delete_category'];
    $sql_del_category = "DELETE FROM LOAISP WHERE maloaisp = '$maloaisp';";
    $res_del_category = Check_db($sql_del_category);
    if($res_del_category){
        echo "<script>alert('xóa loại sản phẩm thành công!')</script>";
        echo "<script>window.open('index.php?action=view_category','_self')</script>";
    }
    else {
        echo "<script>alert('xóa loại sản phẩm thất bại!')</script>";
    }
    
}
?>

<?php 

    function Img_product($masp){
        $sql_img = "SELECT * FROM HINHANH WHERE MASP = '$masp';";
        $res_img = Check_db($sql_img);
        return $res_img;
    }

    function Check_Product($masp){
        if(isset($_POST['checksp'])){
            $sql = "SELECT * FROM SANPHAM WHERE MASP = '$masp';";
            $res = Check_db($sql); 
            if(mysqli_num_rows($res)>0){
                return true;
            }
            else{
                return false;
            }
        }

    }

    function View_Product_Sellest(){
        $sql = "SELECT * FROM sanpham where Masp = (select max(soluongdat) FROM monhang);";
        $res = Check_db($sql);
        if(mysqli_num_rows($res) > 0){
            while ($row = mysqli_fetch_assoc($res)) {
                $masp = $row['MASP'];
                $tensp = $row['TENSP'];
                $gia = $row['GIA'];
                $phantram = View_Discount_Of_Product($masp);
                $kichthuocmh = $row['KICHTHUOCMH'];
                $vixuly = $row['VIXULY'];
                $ram = $row['RAM'];
                $motasp = $row['MOTASP'];
                $ngaysx = $row['NGAYSX'];
            }
        }
        else{
            echo "khong tin duoc san pham ban chay nhat";
        }
    }

    function View_Full_Product(){
        $sql = "SELECT * FROM sanpham";
        $res = Check_db($sql);
        if(mysqli_num_rows($res) > 0){
            while ($row = mysqli_fetch_assoc($res)) {
                $masp = $row['MASP'];
                $tensp = $row['TENSP'];
                $gia = $row['GIA'];
                $phantram = View_Discount_Of_Product($masp);
                $phantram = $row['PHANTRAM'];
                $kichthuocmh = $row['KICHTHUOCMH'];
                $vixuly = $row['VIXULY'];
                $ram = $row['RAM'];
            }
        }
        else{
            echo "khong tim duoc san pham nao";
        }
    }
    
    function View_full_loai_Of_Product($masp){
        $sql_loai = "SELECT * FROM SANPHAM WHERE MALOAISP = (SELECT MALOAISP FROM SANPHAM WHERE MASP = '$masp')";
        $res_loai = Check_db($sql_loai);
        if(mysqli_num_rows($res_loai) > 0){
            while($row_loai = mysqli_fetch_assoc($res_loai)){
                $maloaisp = $row_loai['maloaisp'];
            }
        } else{
            echo "khong co loai nao";
        }
    }
    
    function View_full_MaNSX_Of_Product($masp){
        $sql_NSX = "SELECT * FROM SANPHAM WHERE MANSX = (SELECT MANSX FROM SANPHAM WHERE MASP = '$masp')";
        $res_NSX = Check_db($sql_NSX);
        if(mysqli_num_rows($res_NSX) > 0){
            while($row_NSX = mysqli_fetch_assoc($res_NSX)){
                $maNSX = $row_NSX['maNSX'];
            }
        } else{
            echo "khong co NSX nao";
        }
    }

?>