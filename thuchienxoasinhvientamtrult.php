<?php

include 'dbcon.php';
    $link=  clsConnet::DBConnect();
 
    
    $iddangkytamtrult=$_GET["iddangkytamtrult"];
    
    
    
    $query="delete from dangkytamtrult where ID_DANGKYTAMTRULT='".iddangkytamtrult."'";
    $result=mysql_query($query, $link);
    

   header("Location: ktx_danhsachsinhvienltdangkytamtru.php");  