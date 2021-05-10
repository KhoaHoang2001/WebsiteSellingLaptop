<?php 
    require_once('./includes/include.php');
    require_once('./includes/conn.php');
?>
<div class="view_category_box">
    <h2>Danh sách loại sản phẩm</h2>
    <div class="border_bottom"></div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="search_bar">
            <input type="text" id="search" placeholder="Type to search..." />
        </div>
        <table width="100%">
            <thead>
                <tr>
                    <th class="text-center">Mã loại sản phẩm:</th>
                    <th>Tên loại sản phẩm:</th>
                    <th class="text-center">Xóa</th>
                </tr>
            </thead>
            <?php
            $sql_all_cat = "SELECT * FROM  LOAISP";
            $res_all_cat = Check_db($sql_all_cat);
            while ($row = mysqli_fetch_assoc($res_all_cat)) {
                $maloaisp = $row['MALOAISP'];
                $tenloaisp = $row['TENLOAISP'];
            ?>
            <tbody>
                <tr>
                    <td class="text-center"><?php echo $maloaisp; ?></td>
                    <td><?php echo $tenloaisp; ?></td>
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