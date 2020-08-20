<?php
include 'dbcon.php';
    $link=  clsConnet::DBConnect();

    
    $idthechaplt=$_GET["idthechaplt"];
    
 
    $query="delete from thechaplt where ID_THECHAPLT='".$idthechaplt."'";
    $result=mysql_query($query, $link);
    

   header("Location: ktx_danhsachthechaplt.php");  
    ?>
    