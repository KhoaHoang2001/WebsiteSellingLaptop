
<div class="form_box">
    <script>
        
        }
    </script>
    <h2>Thêm Sản phẩm</h2>
    <div class="border_bottom"></div>
    <!--/.border_bottom -->
    <form onsubmit="return Check_all()" method="post" enctype="multipart/form-data">
    
        <table align="center" width="100%">
            <tr>
                <td valign="top"><b>Mã sản phẩm:</b></td>
                <td><input type="text" name="masp" id="masp"  required /></td>
            </tr>
            <tr>
                <td valign="top"><b>Mã loại sản phẩm:</b></td>
               <td> <select id="maloaisp" name="maloaisp"></select></td>
            </tr>

            <tr>
                <td valign="top"><b>Mã giảm giá: </b></td>
                <td><input type="text" name="magiamgia" id="magiamgia" required/></td>
            </tr>
            <tr>
                <td valign="top"><b>Mã nhà sản xuất: </b></td>
                <td>
                    <select id="mansx" name="mansx"></select> 
                </td>
            </tr>
            <tr>
                <td valign="top"><b>Tên sản phẩm:</b></td>
                <td><input type="text" name="tensp" id="tensx" size = 60 required/>
                </td>
            </tr>
            <tr>
                <td valign="top"><b>Mô tả sản phẩm: </b></td>
                <td><input type="text" name="motasp" id="motasp" size = 60 required/></td>
            </tr>

            <tr>
                <td valign="top"><b>Ram:</b></td>
                <td>
                    <input type="text" name="ram" id="ram" required/>
                </td>
            </tr>

            <tr>
                <td valign="top"><b>Vi xử lý:</b></td>
                <td><input type="text" name="vixuly" id="vixuly" required/></td>
            </tr>
            <tr>
                <td valign="top"><b>Kích thước màn hình:</b></td>
                <td><input type="text" name="kichthuocmh" id="kichthuocmh"></td>
            </tr>

            <tr>
                <td valign="top"><b>Giá:</b></td>
                <td><input type="text" name="gia" id="gia"></td>
            </tr>
            <tr>
                <td valign="top"><b>Số lượng còn:</b></td>
                <td><input type="text" name="soluongcon" id="soluongcon"></td>
            </tr>
            <tr>
                <td valign="top"><b>Ngày sản xuất:</b></td>
                <td><input type="date" name="ngaysx" id="ngaysx"></td>
            </tr>
            <tr>

                <td colspan="12" class="text-center"> 
                    <input type="submit" class="btn-submit" name="insert_post" value="Thêm Sản Phẩm">
                </td>
            </tr>
        </table>
    </form>

</div>