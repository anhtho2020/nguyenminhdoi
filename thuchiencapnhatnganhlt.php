<?php

include 'dbcon.php';
    $link=  clsConnet::DBConnect();

    $idnganhlt=$_POST["idnganhlt"];
    $manganh=$_POST["manganh"];
    $tennganh=$_POST["tennganh"];
    
    
    
    $query="Update nganhlt set MANGANH='$manganh',TENNGANH='$tennganh' where ID_NGANH=$idnganhlt";// echo $query;
    mysql_query($query, $link);
    header("Location: ktx_nhap_nganhlt.php");
