<?php
    require('includes/include.php');

    function View_Product_Category(){
        $sql = "SELECT * FROM sanpham where Masp = (select max(soluongdat) FROM monhang);";
        $res = check_db($sql);
        if(mysqli_num_rows($res) > 0){
            while ($row = mysqli_fetch_assoc($result)) {
                $row['tesp'] = $tensp;
                $row['gia'] = $gia;
                $row['kichthuocmh'] = $kichthuocmh;
                $row['vixuly'] = $vixuly;
                $row['ram'] = $ram;
            }
        }
    }

    function View_Full_Product(){
        $sql = "SELECT * FROM sanpham";
        $res = check_db($sql);
        if(mysqli_num_rows($res) > 0){
            while ($row = mysqli_fetch_assoc($result)) {
                $row['tesp'] = $tensp;
                $row['gia'] = $gia;
                $row['kichthuocmh'] = $kichthuocmh;
                $row['vixuly'] = $vixuly;
                $row['ram'] = $ram;
                echo "
                    <div class="">$tensp</div>
                "
            }
        }
    }
?>