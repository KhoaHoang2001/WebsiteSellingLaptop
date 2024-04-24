<?php 
    require_once('./includes/include.php');
    require_once('./includes/conn.php');
?>

<div class="view_product_box">
    <h2>Danh sách phiếu nhập</h2>
    <div class="border_bottom"></div>
    <form action="" method="post" enctype="multipart/form-data">
        <table width="100%">
            <thead>
                <tr>
                    <th class="text-center">Mã phiếu</th>
                    <th>Ngày lập</th>
                    <th>Nhà cung cấp</th>
                    <th>Địa chỉ kho</th>
                    <th class="text-center">Nhập hàng</th>
                    <th class="text-center">Xem</th>
                </tr>
            </thead>
            <?php
            $sql_all_nhap = "SELECT * FROM PHIEUNHAP";
            $res_all_nhap = Check_db($sql_all_nhap);

            while ($row = mysqli_fetch_assoc($res_all_nhap)) {
                $maphieu = $row['MAPHIEU'];
                $ngaylap = $row['NGAYLAP'];
                $nhacc = $row['NCC'];
                $diachi = $row['DIACHI'];
                
            ?>
            <tbody>
                <tr>
                    <td class="text-center"><?php echo $maphieu; ?></td>
                    <td><?php echo $ngaylap; ?></td>
                    <td><?php echo $nhacc; ?></td>
                    <td><?php echo $diachi; ?></td>
                    <form method="post">
                        <td class="text-center"><a class="btn btn-primary btn-submit btn-sm"
                                href="index.php?action=create_ctnhap&maphieu=<?php echo $maphieu; ?>">Nhập thêm hàng</a>
                        </td>
                        <td class="text-center"><a class="btn btn-primary btn-submit btn-sm"
                                href="index.php?action=xem_ctnhap&maphieu=<?php echo $maphieu; ?>">Chi tiết</a>
                        </td>
                    </form>
                </tr>
            </tbody>
            <?php
            } // End while loop 
            ?>
        </table>

    </form>

</div>
