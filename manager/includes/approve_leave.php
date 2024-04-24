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
                    <th>Họ tên</th>
                    <th>Ngày bắt đầu</th>
                    <th>Ngày kết thúc</th>
                    <th>Lý do</th>
                    <th>Trạng thái</th>
                    <th class="text-center">Duyệt đơn</th>
                </tr>
            </thead>
            <?php
            $taikhoan = $_SESSION['taikhoan'];
            $sql_all_leave = "SELECT * FROM DONNGHI,NGUOIDUNG,NHANVIEN WHERE DONNGHI.MANV = NHANVIEN.MANV AND NHANVIEN.TAIKHOAN = NGUOIDUNG.TAIKHOAN";
            $res_all_leave = Check_db($sql_all_leave);
            while ($row = mysqli_fetch_array($res_all_leave)) {
                $madon = $row['MADON'];
                $hoten = $row['TENND'];
                $ngaybd = $row['NGAYBD'];
                $ngaykt = $row['NGAYKT'];
                $lydo = $row['LYDO'];
                $trangthai = $row['TRANGTHAI'];
            ?>
            <tbody>
                <tr>
                    <td class="text-center"><?php echo $madon; ?></td>
                    <td><?php echo $hoten; ?></td>
                    <td><?php echo $ngaybd; ?></td>
                    <td><?php echo $ngaykt ?></td>
                    <td><?php echo $lydo ?></td>
                    <td><?php echo $trangthai ?></td>
                    <td class="text-center">
                        <form method="post">
                            <input class="btn btn-danger btn-sm" style="padding: 4px 15px 4px 15px;"
                                type="submit" name="approve_leave" id="approve_leave" value="Chấp thuận">
                            <input class="btn btn-danger btn-sm" style="padding: 4px 15px 4px 15px;"
                                type="submit" name="deny_leave" id="deny_leave" value="Từ chối">
                            <input style="display: none" type="text" name="taikhoan" id="taikhoan" value="<?php echo $taikhoan; ?>">          
                        </form>
                    </td>
                </tr>
            </tbody>
            <?php
            } // End while loop 
            ?>
        </table>
    </form>
</div>

<?php

    if(isset($_POST['approve_leave'])){
        $taikhoan = $_POST['taikhoan'];
        $sql_update_leave = "UPDATE DONNGHI SET TRANGTHAI='Chấp thuận' WHERE MADON = '$madon';";
        echo $sql_update_leave;
        $res_update_leave = Check_db($sql_update_leave);
        if($res_update_leave){
            echo "<script>alert('Đơn nghỉ việc được chấp thuận!')</script>";
            echo "<script>window.open('index.php?action=approve_leave','_self')</script>";
        }
        else {
            echo "<script>alert('Đã xảy ra lỗi!')</script>";
        }
    }
    if(isset($_POST['deny_leave'])){
        $taikhoan = $_POST['taikhoan'];
        $sql_update_leave = "UPDATE DONNGHI SET TRANGTHAI='Từ chối' WHERE MADON = '$madon';";
        echo $sql_update_leave;
        $res_update_leave = Check_db($sql_update_leave);
        if($res_update_leave){
            echo "<script>alert('Đơn nghỉ việc bị từ chối!')</script>";
            echo "<script>window.open('index.php?action=approve_leave','_self')</script>";
        }
        else {
            echo "<script>alert('Đã xảy ra lỗi!')</script>";
        }
    }

?>