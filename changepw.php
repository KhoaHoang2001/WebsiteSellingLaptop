
              <form action="" id="formDoiMatKhau">
                <table id="tblDoiMatKhau">
                  <tr>
                    <th>
                      <label for="matKhauCu">Mật khẩu cũ:</label>
                    </th>
                    <td style="width: 10px"></td>
                    <td>
                      <input type="password" name="" id="" />
                    </td>
                  </tr>
                  <tr style="height: 10px">
                    <th></th>
                    <td style="width: 10px"></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>
                      <label for="matKhauMoi">Mật khẩu mới:</label>
                    </th>
                    <td style="width: 10px"></td>
                    <td>
                      <input type="password" name="" id="" />
                    </td>
                  </tr>
                  <tr style="height: 10px">
                    <th></th>
                    <td style="width: 10px"></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>
                      <label for="confirmMatKhauMoi"
                        >Nhập lại mật khẩu mới:</label
                      >
                    </th>
                    <td style="width: 10px"></td>
                    <td>
                      <input type="password" name="" id="" />
                    </td>
                  </tr>
                  <tr style="height: 10px">
                    <th></th>
                    <td style="width: 10px"></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td style="width: 10px"></td>
                    <td>
                      <input type="submit" name="doimatkhau" value="Đổi mật khẩu"  />
                    </td>
                  </tr>
                </table>
              </form>
            </div>
          </div>
        </div>
      </div>

<?php
    require_once('./includes/include.php');
     function Change_Pw($taikhoan){
        if (isset(($_POST['doimatkhau']))){
            $matkhaucu = Get_value($_POST['matkhaucu']);
            $matkhaumoi = Get_value($_POST['matkhaumoi']);
            $rematkhaumoi = Get_value($_POST['rematkhaumoi']);
            $matkhaucu = md5($matkhaucu);
            $matkhaumoi = md5($matkhaumoi);
            $rematkhaumoi = md5($rematkhaumoi);
            $sql = "SELECT * FROM NGUOIDUNG WHERE taikhoan = '$taikhoan' AND matkhau = '$matkhaucu'";
            $res = Check_db($sql);
            if(mysqli_num_rows($res) > 0){
            $sqlupdate =  "UPDATE table NGUOIDUNG SET taikhoan = '$taikhoan' AND matkhau = '$matkhaumoi' ";
            $res = Check_db($sqlupdate);
            echo "cập nhật mật khẩu ok";

        }else{
            echo "sai rồi";
        }
    }
}
?>