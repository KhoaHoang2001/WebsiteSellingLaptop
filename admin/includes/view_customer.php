<?php 
    require_once('./includes/include.php');
    require_once('./includes/conn.php');
?>
<div class="view_product_box">
    <h2>Danh sách khách hàng</h2>
    <div class="border_bottom"></div>
    <form action="" method="post" enctype="multipart/form-data">
        <table width="100%">
            <thead>
                <tr>
                    <th class="text-center">Tài khoản</th>
                    <th>Họ và tên</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Email</th>
                    <th>Ngày sinh</th>
                    <th class="text-center">Xóa</th>
                </tr>
            </thead>
            <?php
            $sql_all_cus = "SELECT * FROM NGUOIDUNG WHERE CHUCVU = 'KHONG'";
            $res_all_cus = Check_db($sql_all_cus);
            while ($row = mysqli_fetch_array($res_all_cus)) {
                $taikhoan = $row['TAIKHOAN'];
                $matkhau = $row['MATKHAU'];
                $gioitinh = $row['GIOITINH'];
                $tennd = $row['TENND'];
                $sdt = $row['SDT'];
                $diachi = $row['DIACHI'];
                $email = $row['EMAIL'];
                $ngaysinh = $row['NGAYSINH']; 
            ?>
            <tbody>
                <tr>
                    <td class="text-center"><?php echo $taikhoan; ?></td>
                    <td><?php echo $tennd; ?></td>
                    <td><?php echo $sdt; ?></td>
                    <td><?php echo $diachi ?></td>
                    <td><?php echo $email ?></td>
                    <td><?php echo $ngaysinh ?></td>
                    <td class="text-center">
                        <form method="post">
                            <input class="btn btn-danger btn-sm" style="padding: 4px 15px 4px 15px;"
                                type="submit" name="delete_customer" id="delete_customer" value="Xóa">
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
    if(isset($_POST['delete_customer'])){
        $taikhoan = $_POST['taikhoan'];
        $res_del_cus = Check_db("DELETE FROM SANPHAMGIOHANG WHERE taikhoan = '$taikhoan';");
        $res_del_cus = Check_db("DELETE FROM NGUOIDUNG WHERE taikhoan = '$taikhoan';");
        if($res_del_cus){
            echo "<script>alert('Tài khoản được xóa thành công!')</script>";
            echo "<script>window.open('index.php?action=view_customer','_self')</script>";
        }
        else {
            echo "<script>alert('Xóa tài khoản không thành công!')</script>";
        }    
    }
?>