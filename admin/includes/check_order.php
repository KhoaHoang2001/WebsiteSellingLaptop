<?php 
    require_once('./includes/include.php');
    require_once('./includes/conn.php');
?>

<div class="view_product_box">
    <script>
    
    </script>
    <h2>Duyệt đơn hàng</h2>
    <div class="border_bottom"></div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="search_bar">
            <input type="text" id="search" placeholder="Type to search..." />
        </div>
        <table width="100%">
            <thead>
                <tr>
                    <th class="text-center">Mã đơn hàng</th>
                    <th>Tài khoản</th>
                    <th>Trạng thái</th>
                    <th>Ngày đặt</th>
                    <th>Hình thức thanh toán</th>
                    <th>Địa chỉ nhận</th>
                    <th>Tổng tiền</th>
                    <th>Chi tiết</th>
                    <th class="text-center">Duyệt</th>
                </tr>
            </thead>
            <?php
                $sql_all_oder = "SELECT * FROM DONHANG";
                $res_all_oder = Check_db($sql_all_oder);
                while ($row = mysqli_fetch_array($res_all_oder)) {    
                    $madh = $row['MADH'];
                    $taikhoan = $row['TAIKHOAN'];
                    $ngaydat = $row['NGAYDAT'];
                    $trangthai = $row['TRANGTHAI'];
                    $htthanhtoan = $row['HTTHANHTOAN'];
                    $diachinhan = $row['DIACHINHAN'];
                    $tongtien = $row['TONGTIEN'];
            ?>
            <tbody>
                <tr>
                    <td class="text-center"><?php echo $madh; ?></td>
                    <td><?php echo $taikhoan; ?></td>
                    <td><?php echo $trangthai; ?></td>
                    <td><?php echo $ngaydat; ?></td>
                    <td><?php echo $htthanhtoan; ?></td>
                    <td><?php echo $diachinhan; ?></td>
                    <td><?php echo $tongtien; ?></td>
                    <td><a class="btn btn-danger btn-submit btn-sm" 
                            href="index.php?action=view_order&order_detail=<?php echo $madh; ?>">Xem chi tiết</a></td>
                    <!-- KHI CLICK VAO DOI MAU BUTTON -->
                    <td class="text-center"><a class="btn btn-primary btn-submit btn-sm" id="Xacnhan"
                    onclick="Disable_button_confirm()" href="">Xác nhận</a></td>
                </tr>
            </tbody>
            <?php
            } // End while loop 
            ?>
        </table>
    </form>
</div>

<?php 
    function Check_Status($madh){
        $sql_status = "SELECT * FROM DONHANG WHERE madh = '$madh'";
        $res_status = Check_db($sql_status);
        if(mysqli_num_rows($res_status) > 0){
            $row = mysqli_fetch_assoc($res_status);
            return $row['TRANGTHAI'];
        }
    }
?>