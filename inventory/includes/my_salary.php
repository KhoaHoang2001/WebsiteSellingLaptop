<?php 
    require_once('./includes/include.php');
    require_once('./includes/conn.php');
    $taikhoan = $_SESSION['taikhoan'];
?>
<div class="view_product_box">
    <h2>Danh sách lương cá nhân</h2>
    <div class="border_bottom"></div>
    <form action="" method="post" enctype="multipart/form-data">
        <table width="100%">
            <thead>
                <tr>
                    <th>Tháng tính lương</th>
                    <th>Số ngày làm</th>
                    <th>Số ngày nghỉ</th>
                    <th>Lương cơ bản</th>
                    <th>Lương thưởng</th>
                    <th>Lương tổng</th>
                </tr>
            </thead>
            <?php
            $sql_all_staff = "SELECT * FROM NGUOIDUNG,NHANVIEN,CHUCVU,LUONGTHANG WHERE NGUOIDUNG.TAIKHOAN = NHANVIEN.TAIKHOAN AND NHANVIEN.MANV = LUONGTHANG.MANV AND NGUOIDUNG.CHUCVU = CHUCVU.MACV AND NGUOIDUNG.TAIKHOAN = '$taikhoan'";
            $res_all_staff = Check_db($sql_all_staff);
            while ($row = mysqli_fetch_array($res_all_staff)) {
                $manv = $row['MANV'];
                $hoten = $row['TENND'];
                $chucvu = $row['TENCV'];
                $thang = $row['THANG'];
                $nam = $row['NAM'];
                $snl = $row['SONGAYLAM'];
                $snn = $row['SONGAYNGHI'];
                $coban = $row['LUONG'];
                $thuong = $row['THUONG'];
                $tong = $coban / 20 * ($snl + $snn * 0.5) + $thuong;
            ?>
            <tbody>
                <tr>
                    <td><?php echo $thang."/".$nam; ?></td>
                    <td><?php echo $snl ?></td>
                    <td><?php echo $snn ?></td>
                    <td><?php echo $coban ?></td>
                    <td><?php echo $thuong ?></td>
                    <td><?php echo $tong ?></td>
                </tr>
            </tbody>
            <?php
            } // End while loop 
            ?>
        </table>
    </form>
</div>
