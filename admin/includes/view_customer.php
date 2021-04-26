<div class="view_product_box">
    <h2>Danh sách nhân viên</h2>
    <div class="border_bottom"></div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="search_bar">
            <input type="text" id="search" placeholder="Type to search..." />
        </div>
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
            $sql_all_cus = "SELECT * FROM NGUOIDUNG WHERE MAQUYEN = 'KH'";
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
                    <td class="text-center"><a class="btn btn-danger btn-submit btn-sm"
                            href="index.php?action=view_customer&delete_customer=<?php echo $taikhoan; ?>">Xóa</a></td>
                </tr>
            </tbody>
            <?php
            } // End while loop 
            ?>
        </table>

    </form>

</div>

<?php 
    
    require_once('./includes/include.php');
    require_once('./includes/conn.php');

    if(isset($_GET['delete_customer'])){
        $taikhoan = $_GET['delete_customer'];
        $sql_del_cus = "DELETE FROM NGUOIDUNG WHERE taikhoan = '$taikhoan';";
        echo $sql_del_cus;
        $res_del_cus = Check_db($sql_del_cus);
        if($res_del_cus){
            echo "<script>alert('Tài khoản được xóa thành công!')</script>";
            // echo "<script>window.open('index.php?action=view_users','_self')</script>";
        }
        else {
            echo "<script>alert('xóa tài khoản không thành công!')</script>";
        }
        
    }
?>