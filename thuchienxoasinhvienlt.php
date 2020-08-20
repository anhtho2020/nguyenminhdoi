<?php

    include 'dbcon.php';
    $link=  clsConnet::DBConnect();

    
    $idlienthong=$_GET["idlienthong"];
    
 
    $query="delete from lienthong where ID_LIENTHONG='".$idlienthong."'";
    $result=mysql_query($query, $link);
    

   header("Location: ktx_danhsachsinhvienlt.php");  
    ?>
    
    
