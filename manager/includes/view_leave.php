<?php 
    require_once('./includes/include.php');
    require_once('./includes/conn.php');
?>
<div class="view_product_box">
    <h2>Danh sách nghỉ phép</h2>
    <div class="border_bottom"></div>
    <form action="" method="post" enctype="multipart/form-data">
        <table width="100%">
            <thead>
                <tr>
                    <th class="text-center">Mã đơn</th>
                    <th>Ngày bắt đầu</th>
                    <th>Ngày kết thúc</th>
                    <th>Lý do</th>
                    <th class="text-center">Trạng thái</th>
                </tr>
            </thead>
            <?php
            $taikhoan = $_SESSION['taikhoan'];
            $sql_all_leave = "SELECT * FROM DONNGHI,NGUOIDUNG,NHANVIEN WHERE DONNGHI.MANV = NHANVIEN.MANV AND NGUOIDUNG.TAIKHOAN = NHANVIEN.TAIKHOAN AND NHANVIEN.TAIKHOAN = '$taikhoan'";
            $res_all_leave = Check_db($sql_all_leave);
            while ($row = mysqli_fetch_array($res_all_leave)) {
                $madon = $row['MADON'];
                $ngaybd = $row['NGAYBD'];
                $ngaykt = $row['NGAYKT'];
                $lydo = $row['LYDO'];
                $trangthai = $row['TRANGTHAI'];
            ?>
            <tbody>
                <tr>
                    <td class="text-center"><?php echo $madon; ?></td>
                    <td><?php echo $ngaybd; ?></td>
                    <td><?php echo $ngaykt ?></td>
                    <td><?php echo $lydo ?></td>
                    <td class="text-center"><?php echo $trangthai ?></td>
                </tr>
            </tbody>
            <?php
            } // End while loop 
            ?>
        </table>
    </form>
</div>

<?php

    function Check_Staff($taikhoan){
        if(isset($_POST['submit'])){
            $sql = "SELECT * FROM NGUOIDUNG WHERE taikhoan = '$taikhoan';";
            $res = Check_db($sql);
            if(mysqli_num_rows($res) > 0){
                return true;
            }
            else{
                return false;
            }
        }
    }

    if(isset($_POST['delete_staff'])){
        $taikhoan = $_POST['taikhoan'];
        $sql_update_leave = "DELETE FROM NGUOIDUNG WHERE taikhoan = '$taikhoan';";
        echo $sql_update_leave;
        $res_update_leave = Check_db($sql_update_leave);
        if($res_update_leave){
            echo "<script>alert('Tài khoản được xóa thành công!')</script>";
            echo "<script>window.open('index.php?action=view_staff','_self')</script>";
        }
        else {
            echo "<script>alert('xóa tài khoản không thành công!')</script>";
        }
        
    } 
?>