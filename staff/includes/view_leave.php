<?php 
    require_once('./includes/include.php');
    require_once('./includes/conn.php');    
    $taikhoan = $_SESSION['taikhoan'];
    $sql = "SELECT MANV FROM NHANVIEN WHERE NHANVIEN.TAIKHOAN = '$taikhoan'";
    $res = Check_db($sql);
    $manv = mysqli_fetch_array($res)['MANV'];
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
            $sql_all_leave = "SELECT * FROM DONNGHI WHERE MANV = '$manv'";
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