<?php 
    require_once('./includes/include.php');
    require_once('./includes/conn.php');
    if(isset($_POST['accept_leave'])){
        Check_f5($_POST['accept_leave']);
    }
    if(isset($_POST['deny_leave'])){
        Check_f5($_POST['deny_leave']);
    }
?>

<div class="view_product_box">
    <script>
    
    </script>
    <h2>Duyệt đơn nghỉ phép</h2>
    <div class="border_bottom"></div>
        <table width="100%">
            <thead>
                <tr>
                    <th class="text-center">Mã đơn</th>
                    <th>Họ tên</th>
                    <th>Ngày bắt đầu</th>
                    <th>Ngày kết thúc</th>
                    <th>Lý do</th>
                    <th>Trạng thái</th>
                    <th class="text-center">Duyệt</th>
                </tr>
            </thead>
            <?php
                $sql_all_leave = "SELECT * FROM DONNGHI,NHANVIEN,NGUOIDUNG WHERE DONNGHI.MANV = NHANVIEN.MANV AND NHANVIEN.TAIKHOAN = NGUOIDUNG.TAIKHOAN AND TRANGTHAI = 'Chưa xử lý'";
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
                    <td class="text-center"><?php echo $trangthai; ?></td>
                    <form method="post">
                        <!-- KHI CLICK VAO DOI MAU BUTTON -->
                        <?php  
                            if($trangthai == "Chưa xử lý"){
                        ?>
                                <td class="text-center">
                                    <input class="btn btn-sm btn-primary" style="padding: 4px 15px 8px 15px; background: #007BFF; border: #007BFF;" type="submit" name="accept_leave" value="Chấp thuận">
                                    <input style="display: none" type="text" name="madon" id="madon" value="<?php echo $madon; ?>">
                                    <input class="btn btn-sm btn-danger" style="padding: 4px 15px 8px 15px; background: #red; border: #red;" type="submit" name="deny_leave" value="Từ chối">
                                    <input  style="display: none" type="text" name="madon" id="madon" value="<?php echo $madon; ?>">
                                </td>
                        <?php 
                            }
                            else{
                        ?>
                            <td>
                                <input class="btn btn-sm btn-primary" style="padding: 4px 15px 8px 15px; background: #007BFF; border: #007BFF;" type="submit" name="accept_leave" value="Chấp thuận" disabled>
                                <input style="display: none" type="text" name="madon" id="madon" value="<?php echo $madon; ?>">
                                <input class="btn btn-sm btn-danger" style="padding: 4px 15px 8px 15px; background: #red; border: #red;" type="submit" name="deny_leave" value="Từ chối" disabled>
                                <input  style="display: none" type="text" name="madon" id="madon" value="<?php echo $madon; ?>">
                            </td>
                        <?php
                            }
                        ?>
                    </form>
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

    if(isset($_POST['accept_leave'])){
        $madon = $_POST['madon'];
        $sql = "UPDATE DONNGHI SET TRANGTHAI = 'Chấp thuận' WHERE MADON = '$madon'";
        $res = Check_db($sql);
        if($res){
            echo "<script>alert('Đơn nghỉ phép được chấp thuận!')</script>";
            echo "<script>window.open(window.location.href,'_self');</script>";
        }
    }

    if(isset($_POST['deny_leave'])){
        $madon = $_POST['madon'];
        $sql = "UPDATE DONNGHI SET TRANGTHAI = 'Từ chối' WHERE MADON = '$madon'";
        $res = Check_db($sql);
        if($res){
            echo "<script>alert('Đơn nghỉ phép bị từ chối!')</script>";
            echo "<script>window.open(window.location.href,'_self');</script>";
        }
    }
?>