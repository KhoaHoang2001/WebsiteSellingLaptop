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
            $sql_all_staff = "SELECT * FROM NGUOIDUNG WHERE MAQUYEN = 'NV'";
            $res_all_staff = Check_db($sql_all_staff);
            while ($row = mysqli_fetch_array($res_all_staff)) {
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
                            href="index.php?action=view_staff&delete_staff=<?php echo $taikhoan; ?>">Xóa</a></td>
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

    if(isset($_GET['delete_staff'])){
        $taikhoan = $_GET['delete_staff'];
        $sql_del_staff = "DELETE FROM NGUOIDUNG WHERE taikhoan = '$taikhoan';";
        echo $sql_del_staff;
        $res_del_staff = Check_db($sql_del_staff);
        if($res_del_staff){
            echo "<script>alert('Tài khoản được xóa thành công!')</script>";
            // echo "<script>window.open('index.php?action=view_users','_self')</script>";
        }
        else {
            echo "<script>alert('xóa tài khoản không thành công!')</script>";
        }
        
    }
?>