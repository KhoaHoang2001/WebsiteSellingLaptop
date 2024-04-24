<?php 
    require_once('./includes/include.php');
    require_once('./includes/conn.php');
?>
<div class="view_product_box">
    <h2>Danh sách nhân viên</h2>
    <div class="border_bottom"></div>
    <form action="" method="post" enctype="multipart/form-data">
        <table width="100%">
            <thead>
                <tr>
                    <th>Họ và tên</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Email</th>
                    <th>Ngày sinh</th>
                    <th>Chức vụ</th>
                    <th>Lương</th>
                    <th class="text-center">Xóa</th>
                </tr>
            </thead>
            <?php
            $sql_all_staff = "SELECT * FROM NGUOIDUNG,NHANVIEN,CHUCVU WHERE NGUOIDUNG.TAIKHOAN = NHANVIEN.TAIKHOAN AND NGUOIDUNG.CHUCVU = CHUCVU.MACV AND CHUCVU != 'KHONG'";
            $res_all_staff = Check_db($sql_all_staff);
            while ($row = mysqli_fetch_array($res_all_staff)) {
                $tennd = $row['TENND'];
                $sdt = $row['SDT'];
                $diachi = $row['DIACHI'];
                $email = $row['EMAIL'];
                $ngaysinh = $row['NGAYSINH']; 
                $chucvu = $row['TENCV'];
                $luong = $row['LUONG'];
                $kichhoat = $row['KICHHOAT'];
            ?>
            <tbody>
                <tr>
                    <td><?php echo $tennd; ?></td>
                    <td><?php echo $sdt; ?></td>
                    <td><?php echo $diachi ?></td>
                    <td><?php echo $email ?></td>
                    <td><?php echo $ngaysinh ?></td>
                    <td><?php echo $chucvu ?></td>
                    <td><?php echo $luong ?></td>
                    <td class="text-center">
                        <form method="post">
                            <input class="btn btn-danger btn-sm" style="padding: 4px 15px 4px 15px;"
                                type="submit" name="delete_staff" id="delete_staff" value="Xóa">
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
        $sql_delete_staff = "UPDATE NGUOIDUNG SET KICHHOAT = 0 WHERE TAIKHOAN = '$taikhoan';";
        echo $sql_delete_staff;
        $res_delete_staff = Check_db($sql_delete_staff);
        if($res_delete_staff){
            echo "<script>alert('Tài khoản được xóa thành công!')$res_delete_staff</script>";
            echo "<script>window.open('index.php?action=view_staff','_self')</script>";
        }
        else {
            echo "<script>alert('xóa tài khoản không thành công!')</script>";
        }
        
    }
?>