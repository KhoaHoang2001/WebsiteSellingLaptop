<?php
    require_once('./includes/include.php');
    require_once('./includes/conn.php');
?>
<div class="view_product_box">
    <h2>Danh sách nhà sản xuất</h2>
    <div class="border_bottom"></div>
    <form action="" method="post" enctype="multipart/form-data">
        <table width="100%">
            <thead>
                <tr>
                    <th class="text-center">Mã nhà sản xuất</th>
                    <th>Tên nhà sản xuất</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <?php
            $sql_all_nsx = "SELECT * FROM NHASANXUAT";
            $res_all_nsx = Check_db($sql_all_nsx);
            while ($row = mysqli_fetch_array($res_all_nsx)) {
                $mansx = $row['MANSX'];
                $tennsx = $row['TENNSX'];
            ?>
            <tbody>
                <tr>
                    <td class="text-center"><?php echo $mansx; ?></td>
                    <td><?php echo $tennsx; ?></td>
                    <td><a class="btn btn-danger btn-submit btn-sm" 
                            href="index.php?action=view_producer&delete_producer=<?php echo $mansx; ?>">Xóa</a></td>
                </tr>
            </tbody>
            <?php
            } // End while loop 
            ?>
        </table>
    </form>
</div>
<?php 

function check_Mansx($mansx){
    $sql = "SELECT * FROM nhasanxuat WHERE mansx ='$mansx';";
    $res = Check_db($sql);
    if(mysqli_num_rows($res) > 0){
        return true;
    }
    else{
        return false;
    }
}
if(isset($_GET['delete_producer'])){
    $mansx = $_GET['delete_producer'];
    $sql_del_producer = "DELETE FROM NHASANXUAT WHERE mansx = '$mansx';";
    $res_del_producer = Check_db($sql_del_producer);
    if($res_del_producer){
        echo "<script>alert('xóa nhà sản xuất thành công!')</script>";
        echo "<script>window.open('index.php?action=view_producer','_self')</script>";
    }
    else {
        echo "<script>alert('xóa nhà sản xuất thất bại!')</script>";
    }
    
}
?>