<?php
    $_SESSION['TAIKHOAN']="bichngan";
    $MASP=$_GET['mas'];
    include('tsx_SP_gio.php');
    themSP_gio($MASP);
    header('Location: view.php?tenbien='.$MASP);

?>