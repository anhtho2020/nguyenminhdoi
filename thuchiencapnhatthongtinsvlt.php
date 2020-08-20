<?php

    include 'dbcon.php';
    $link=  clsConnet::DBConnect();

    $idlienthong=$_POST["idlienthong"];
    $maloplt=$_POST["maloplt"];
    $sohoso=$_POST["sohoso"];
    $namnhaphoc=$_POST["namnhaphoc"];
    $cmnd=$_POST["cmnd"];
    $masv=$_POST["masv"];
    $hodem=$_POST["hodem"];
    $ten=$_POST["ten"];
    $phai=$_POST["phai"];
    $ngaysinh=$_POST["ngaysinh"];
    $diachi=$_POST["diachi"];
    $dienthoai=$_POST["dienthoai"];
    $dienchinhsach=$_POST["dienchinhsach"];
    $tpgiadinh=$_POST["tpgiadinh"];
    $ghichu=$_POST["ghichu"];
    
    $totalRows_maloplt = 0;       
    $query_maloplt ="select * from loplt  where MALOPLT='$maloplt'";
    $result_maloplt = mysql_query($query_maloplt, $link);  
    $totalRows_maloplt=mysql_num_rows($result_maloplt);
//    if($totalRows_truong)
//    {
        $row_maloplt = mysql_fetch_array ($result_maloplt);
        $idloplt=$row_maloplt["ID_LOPLT"];
//    }
    

    $query="Update lienthong set ID_LOP=$idloplt,SOHOSO=$sohoso,NAMNHAPHOC='$namnhaphoc',"
            . " CMND='$cmnd',MASV='$masv',HODEM='$hodem',TEN='$ten',PHAI='$phai',NGAYSINH='$ngaysinh',"
            . " DIACHI='$diachi',DIENTHOAI='$dienthoai',DIENCHINHSACH='$dienchinhsach', "
            . " TPGIADINH='$tpgiadinh',GHICHU='$ghichu' where ID_LIENTHONG=$idlienthong"; //echo $query;
    mysql_query($query, $link);
    header("Location: ktx_danhsachsinhvienlt.php");
?>