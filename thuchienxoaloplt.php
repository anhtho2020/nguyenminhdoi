<?php

include 'dbcon.php';
    $link=  clsConnet::DBConnect();

    $idloplt=$_GET["idloplt"];
    $query="delete from loplt where ID_LOPLT='".$idloplt."'";
    $result_phong=mysql_query($query, $link);

    header("Location: ktx_nhap_loplt.php");
?>
