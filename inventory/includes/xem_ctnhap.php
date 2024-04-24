<?php
    require_once('./includes/include.php');
    require_once('./includes/conn.php');
    if(isset($_POST['xem_ctnhap'])){
        Check_f5($_POST['xem_ctnhap']);
    }
    $maphieu = $_GET['maphieu'];
    $view_phieu = Check_db("SELECT * FROM PHIEUNHAP WHERE MAPHIEU='$maphieu'");
    $fetch_phieu = mysqli_fetch_array($view_phieu);
    $ngaylap = $fetch_phieu['NGAYLAP'];
    $ncc = $fetch_phieu['NCC'];
    $diachi = $fetch_phieu['DIACHI'];
?>
<div class="form_box">
    <h2>Phiếu nhập <?php echo $maphieu; ?></h2>
    <div class="border_bottom"></div>
    <!--/.border_bottom -->
    <form method="post" enctype="multipart/form-data">
        <table align="center" width="100%">
            <tr>
                <td><b>Ngày lập:</b></td>
                <td><input type="date" value="<?php echo $ngaylap;?>" disabled/></td>
            </tr>
            <tr>
                <td><b>Nhà cung cấp:</b></td>
                <td><input type="text" value="<?php echo $ncc;?>" disabled/></td>
            </tr>
            <tr>
                <td><b>Địa chỉ kho:</b></td>
                <td><input type="text" value="<?php echo $diachi;?>" disabled/></td>
            </tr>
            <tr>        
                <table width="100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <?php
                    $sql_all_ctnhap = "SELECT * FROM SANPHAM, CHITIETNHAP WHERE SANPHAM.MASP = CHITIETNHAP.MASP AND MAPHIEU = '$maphieu'";
                    $res_all_ctnhap = Check_db($sql_all_ctnhap);
                    while ($row = mysqli_fetch_assoc($res_all_ctnhap)) {
                        $stt = $row['STT'];
                        $masp = $row['MASP'];
                        $tensp = $row['TENSP'];
                        $sl = $row['SOLUONG'];
                        $dongia = $row['DONGIA'];
                        $tongtien = $sl * $dongia;
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $stt; ?></td>
                            <td><?php echo $masp; ?></td>
                            <td><?php echo $tensp; ?></td>
                            <td><?php echo $sl; ?></td>
                            <td><?php echo $dongia; ?></td>
                            <td>$<?php echo $tongtien; ?></td>
                        </tr>
                    </tbody>
                    <?php
                    } // End while loop 
                    ?>
                </table>
            </tr>
            <tr>

            </tr>
        </table>
    </form>
</div>