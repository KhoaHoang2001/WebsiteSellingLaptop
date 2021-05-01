<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
</head>

<body>
<?php require('XLdangky.php');?>
<script>
    function testPass(){
        var x = document.getElementById("dangky");
        if(x.elements[2].value!=x.elements[3].value){
            alert("Nhập lại mật khẩu khác mật khẩu!");
        }
    }
</script>
    <h1>Đăng ký</h1>
    <form  id="dangky" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <table>
        <?php echo $tontaiTKerror?>
            <tr>
                <td>Họ tên </td>
                <td><input type="text" name="TENND" value='<?php echo $TENND;?>' required></td>
            </tr>
            <tr>
                <td>Tài khoản </td>
                <td><input type="text" name="TAIKHOAN" value='<?php echo $TAIKHOAN;?>' required> </td>
            </tr>
            <tr>
                <td>Mật khẩu </td>
                <td><input type="password" name="MATKHAU" value='<?php echo $MATKHAU;?>' required> </td>
            </tr>
            <tr>
                <td>Nhập lại mật khẩu </td>
                <td><input type="password" name="NHAPLAIMK" value='<?php echo $NHAPLAIMK;?>' required></td>
            </tr>
            <tr>
                <td></td>
                <td><button onclick="testPass()">Đăng ký</button></td>
            </tr>
        </table>
    </form>
    
</body>
</html>