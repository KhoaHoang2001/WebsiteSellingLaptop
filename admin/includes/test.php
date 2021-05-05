
<div class="form_box">
    <script>
        const check_password = function () {
            let password = document.getElementById('matkhau').value;
            let confirm_password = document.getElementById('xacnhanmk').value;
            if (password == confirm_password) {
                document.getElementById('kiemtramk').style.color = 'green';
                document.getElementById('kiemtramk').innerHTML = 'Trùng khớp';
            } else {
                document.getElementById('kiemtramk').style.color = 'red';
                document.getElementById('kiemtramk').innerHTML = 'Không trùng khớp';
            }
        }

        const check_number_phone = function () {
            let phone = document.getElementById('sdt').value;
            if(!isNaN(phone)){
                document.getElementById('kiemtrasdt').innerHTML = '';
            } else {
                document.getElementById('kiemtrasdt').style.color = 'red';
                document.getElementById('kiemtrasdt').innerHTML = 'Phải là số';
            }
        }

        const Check_all = function () {
            let password = document.getElementById('matkhau').value;
            let confirm_password = document.getElementById('xacnhanmk').value;
            let phone = document.getElementById('sdt').value;
            if(password != confirm_password){
                alert("Mật khẩu và xác nhận mật khẩu bắt buộc phải giống nhau!");
                return false;
            }
            else if(isNaN(phone)){
                alert("Số điện thoại bắt buộc phải là số!");
                return false;
            }
        }
    </script>
    <h2>Thêm hinh</h2>
    <div class="border_bottom"></div>
    <!--/.border_bottom -->
    <form onsubmit="return Check_all()" method="post" enctype="multipart/form-data">
    
        <table align="center" width="100%">
        <tr>
                <td valign="top"><b>Mã sản phẩm:</b></td>
                <td><input type="text" name="masp" id="masp"  required /></td>
            </tr>

            <tr>
                <td><b>Hình ảnh: </b></td>
                <form action="" method="post" enctype="multipart/form-data">
                <input type="file" name="files[]" multiple >
                <input type="submit" name="submit" value="UPLOAD">
</form>
            </tr>
                            
            <tr>

                <td colspan="1" class="text-center"> 
                    <input type="submit" class="btn-submit" name="themsanpham" value="Thêm Sản Phẩm">
                </td>
            </tr>
            
        </table>
    </form>
</div>
<?php
    if (isset($_POST['themsanpham'])) {
        $uploads_dir = '/uploads';
        foreach ($_FILES["files"]["error"] as $key => $error) {
            if ($error == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES["files"]["tmp_name"][$key];
            $name = basename($_FILES["files"]["name"][$key]);
            move_uploaded_file($tmp_name, "product_images/$name");
    }
    echo "<script>alert(\"<?php echo $name ?>\");</script>";      
    // $sql_hinh = "INSERT INTO HINHANH (masp, link) VALUES ('MT100', '$name');";
    // $conn = Connect();
    // mysqli_query($conn, $sql_hinh);
    // mysqli_close($conn);
    // if($sql_hinh){
    //     echo "<script>alert(\"Thêm sản phẩm thành công\");</script>"; 
    // }else{
    //     "<script>alert(\"buồn\");</script>";
    // }
}

       }?>