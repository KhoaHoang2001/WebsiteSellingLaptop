<?php
/*
    $str = ["EMP001","EMP003","EMP021"];
    function gen_id($str) {
        $id = (int) substr(max($str), 3);
        $id++;
        echo "EMP".$id>100?"":($id>10?"0":"00").$id;
    }
    gen_id($str);
*/
    $id = 9999;
    echo "EMP".($id>100?"":($id>10?"0":"00")).$id;
?>