<?php
    include("../ctecsystem/Classes/PHPExcel.php");
    $objReader=new PHPExcel_Reader_Excel5();
    $objPHPExcel=new PHPExcel();
    $workSheet=$objPHPExcel->getActiveSheet();
    $connect=mysql_connect("localhost", "root", "");
    mysql_select_db("quanlydaotao", $connect);
    
    $query="select makhoa, tenkhoa from khoa ";
    $result=mysql_query($query, $connect);
    $tuDong=2; $tuCot=0; $stt=1;
    while($row=mysql_fetch_object($result)){
        $workSheet->setCellValueByColumnAndRow($tuCot, $tuDong, $stt);
        $workSheet->setCellValueByColumnAndRow($tuCot+1, $tuDong, $row->makhoa);
        $workSheet->setCellValueByColumnAndRow($tuCot+2, $tuDong, $row->tenkhoa);
        $tuDong++; $stt++;
    }    
    
    header('Content-Type: application/vnd.ms-excel');
    $name="vidu.xls";
    header('Content-Disposition: attachment;filename="'.$name.'"');
    header('Cache-Control: max-age=0');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
?>