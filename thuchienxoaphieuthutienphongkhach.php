<?php
	include 'dbcon.php';
	$link=  clsConnet::DBConnect();
	$iddsphieuthutienphongkhach=$_GET["iddsphieuthutienphongkhach"];
	$query="delete from dsphieuthutienphongkhach where ID_DSPHIEUTHUTIENPHONGKHACH='".$iddsphieuthutienphongkhach."'";
    	$result=mysql_query($query, $link);
   	header("Location: ktx_xoaphieuthutienphongkhach.php");  
?>

