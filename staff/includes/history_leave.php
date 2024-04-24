<?php 
    require_once('./includes/include.php');
    require_once('./includes/conn.php');
    if(isset($_POST['accept_leave'])){
        Check_f5($_POST['accept_leave']);
    }
    if(isset($_POST['deny_leave'])){
        Check_f5($_POST['deny_leave']);
    }
    $manv  
?>

<div class="view_product_box">
    <script>
    
    </script>
    <h2>Lịch sử đơn nghỉ phép</h2>
    <div class="border_bottom"></div>
        <table width="100%">
            <thead>
                <tr>
                    <th class="text-center">Mã đơn</th>
                    <th>Ngày bắt đầu</th>
                    <th>Ngày kết thúc</th>
                    <th>Lý do</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <?php
                $sql_all_leave = "SELECT * FROM DONNGHI,NHANVIEN,NGUOIDUNG WHERE DONNGHI.MANV = NHANVIEN.MANV AND NHANVIEN.TAIKHOAN = NGUOIDUNG.TAIKHOAN AND trangthai != 'Chưa xử lý'";
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
                    <td><?php echo $ngaykt; ?></td>
                    <td><?php echo $lydo; ?></td>
                    <td><?php echo $trangthai; ?></td>
                </tr>
            </tbody>
            <?php
            } // End while loop 
            ?>
        </table>
</div>

<?php 
    function Check_Status($madon){
        $sql_status = "SELECT * FROM DONNGHI WHERE MADON = '$madon'";
        $res_status = Check_db($sql_status);
        if(mysqli_num_rows($res_status) > 0){
            $row = mysqli_fetch_assoc($res_status);
            return $row['TRANGTHAI'];
        }
    }
?>