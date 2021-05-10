<?php
    $_SESSION['TAIKHOAN']="bichngan";
    $MASP=$_GET['mas'];
    include('tsx_SP_gio.php');
    xoa_SP_gio($MASP);

?>