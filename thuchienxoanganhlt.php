<?php

include 'dbcon.php';
    $link=  clsConnet::DBConnect();

    $idnganhlt=$_GET["idnganhlt"];
    $query="delete from nganhlt where ID_NGANH='".$idnganhlt."'";
    $result=mysql_query($query, $link);

    header("Location: ktx_nhap_nganhlt.php");
?>
