<?php
    include("Classes/PHPExcel.php");
    include 'dbcon.php';
    ob_end_clean();
    ob_start();
    $connect=  clsConnet::DBConnect();
    //$objReader=new PHPExcel_Reader_Excel2007();
    $objReader=new PHPExcel_Reader_Excel5();
    $objPHPExcel=new PHPExcel();
    $workSheet=$objPHPExcel->getActiveSheet();
//    $connect=mysql_connect("localhost", "root", "");
//    mysql_select_db("ktxdatabase", $connect);
//    mysql_query("SET CHARACTER SET utf8",$connect);
    
    $tungay=$_POST["tungay"];
    $denngay=$_POST["denngay"];
    $hocky=$_POST["hocky"];
    $namhoc=$_POST["namhoc"];
    $tongsotien=0;

    
    $workSheet->mergeCells('E1:I1');
    $workSheet->getStyle('E1:I1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $workSheet->setCellValueByColumnAndRow(4, 1, 'CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM');
    $workSheet->mergeCells('E2:I2');
    $workSheet->getStyle('E2:I2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $workSheet->setCellValueByColumnAndRow(4, 2, 'Độc lập - Tự do - Hạnh phúc');
    
    $workSheet->mergeCells('A1:D1');
    $workSheet->getStyle('A1:D1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $workSheet->setCellValueByColumnAndRow(0, 1, 'TRƯỜNG CAO ĐẲNG KINH TẾ- KỸ THUẬT CẦN THƠ');
    $workSheet->mergeCells('A2:D2');
    $workSheet->getStyle('A2:D2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $workSheet->setCellValueByColumnAndRow(0, 2, 'PHÒNG CÔNG TÁC CT-HSSV');
    $workSheet->mergeCells('A3:D3');
    $workSheet->getStyle('A3:D3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $workSheet->setCellValueByColumnAndRow(0, 3, 'BỘ PHẬN QUẢN LÝ KÝ TÚC XÁ');
    $workSheet->mergeCells('A5:I5');
    $workSheet->getStyle('A5:I5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $workSheet->setCellValueByColumnAndRow(0, 5, 'BẢNG KÊ THU TIỀN Ở KHU KTX SSINH VIÊN HỌC KỲ '.$hocky.' NĂM HỌC '.$namhoc);
    $workSheet->getStyle('A5')->getFont()->setSize(14);
    $workSheet->getStyle('A5')->getFont()->setBold(true);
    $workSheet->mergeCells('A6:I6');
    $workSheet->getStyle('A6:I6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $workSheet->setCellValueByColumnAndRow(0, 6, 'Từ ngày '.$tungay.' đến ngày '.$denngay);
    $workSheet->getStyle('A6')->getFont()->setSize(14);
    $workSheet->getStyle('A6')->getFont()->setBold(true);
    $workSheet->getStyle('A6')->getFont()->setItalic(true);
    
    $workSheet->setCellValueByColumnAndRow(0, 7, 'STT');
    $workSheet->setCellValueByColumnAndRow(1, 7, 'SỐ PHIẾU');
    $workSheet->mergeCells('C7:D7');
    $workSheet->setCellValueByColumnAndRow(2, 7, 'HỌ VÀ TÊN');
    $workSheet->setCellValueByColumnAndRow(4, 7, 'LỚP');
    $workSheet->setCellValueByColumnAndRow(5, 7, 'PHONG');
    $workSheet->setCellValueByColumnAndRow(6, 7, 'DÃY');
    $workSheet->setCellValueByColumnAndRow(7, 7, 'SỐ TIỀN');
    
if(($tungay!='') && ($denngay!='') && ($hocky!='') && ($namhoc!=''))
{      
    
    $query ="select a.ID_THUTIENPHONGSINHVIEN, a.ID_SINHVIEN,a.DONGIA,a.HOCKY,a.NAMHOC,a.NGAYTHU,b.MASV,"
            . "b.HODEM,b.TEN,b.NGAYSINH,c.TENPHONG,LEFT(c.TENPHONG,1) as DAY,e.MALOPCHUYENNGANH "
            . "from thutienphongsinhvien a,sinhvien b, phong c, danhsachnoitru d, lopchuyennganh e "
            . "where a.ID_SINHVIEN=b.ID_SINHVIEN and d.ID_SINHVIEN=a.ID_SINHVIEN and "
            . "c.ID_PHONG=d.ID_PHONG and e.ID_LOPCHUYENNGANH=b.ID_LOPCHUYENNGANH and "
            . "(a.HOCKY='$hocky' and a.NAMHOC='$namhoc') and "
            . "(a.NGAYTHU>='$tungay' and a.NGAYTHU<='$denngay')";//echo $query;
    
    $result=mysql_query($query, $connect);
    $somautin=  mysql_num_rows($result);
    

    $tuDong=8; $tuCot=0; $stt=1;
    $workSheet->getColumnDimension('A')->setWidth(6);
    $workSheet->getColumnDimension('B')->setWidth(10);
    $workSheet->getColumnDimension('C')->setWidth(20);
    $workSheet->getColumnDimension('D')->setWidth(8);
    $workSheet->getColumnDimension('E')->setWidth(12);
    $workSheet->getColumnDimension('F')->setWidth(8);
    $workSheet->getColumnDimension('G')->setWidth(6);
    $workSheet->getColumnDimension('H')->setWidth(12);
    $workSheet->getColumnDimension('I')->setWidth(12);
//    $workSheet->getColumnDimension('I')->setAutoSize(true);
//    $workSheet->getColumnDimension('J')->setAutoSize(true);
    while($row=mysql_fetch_object($result)){
                
        $workSheet->setCellValueByColumnAndRow($tuCot, $tuDong, $stt);
        $workSheet->setCellValueByColumnAndRow($tuCot+1, $tuDong, $row->ID_THUTIENPHONGSINHVIEN);
        $workSheet->setCellValueByColumnAndRow($tuCot+2, $tuDong, $row->HODEM);
        $workSheet->setCellValueByColumnAndRow($tuCot+3, $tuDong, $row->TEN);
        $workSheet->setCellValueByColumnAndRow($tuCot+4, $tuDong, $row->MALOPCHUYENNGANH);
        $workSheet->setCellValueByColumnAndRow($tuCot+5, $tuDong, $row->TENPHONG);
        $workSheet->setCellValueByColumnAndRow($tuCot+6, $tuDong, $row->DAY);
        $workSheet->setCellValueByColumnAndRow($tuCot+7, $tuDong, $row->DONGIA);
        
        $tongsotien=$tongsotien+$row->DONGIA;
        
        $tuDong++; $stt++;
    } 
    $workSheet->mergeCells("A".(8+$somautin).":G".(8+$somautin));
    $workSheet->getStyle("A".(8+$somautin).":G".(8+$somautin))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $workSheet->setCellValueByColumnAndRow(0, $tuDong, 'TỔNG CỘNG');
    $workSheet->setCellValueByColumnAndRow(7, $tuDong, $tongsotien);
    
    //$workSheet->mergeCells("B".(11+$somautin).":C".(11+$somautin));
    $workSheet->setCellValueByColumnAndRow(1, $tuDong+2, 'Phòng công tác CT-HSSV');
    
    $now = getdate(); 
    $workSheet->mergeCells("E".(10+$somautin).":I".(10+$somautin));
    $workSheet->getStyle("E".(10+$somautin).":I".(10+$somautin))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $workSheet->setCellValueByColumnAndRow(4, $tuDong+2, 'Cần thơ, ngày '. $now["mday"] . ' tháng '. $now["mon"] . ' năm ' . $now["year"] );
    $workSheet->getStyle("E".($tuDong+2))->getFont()->setItalic(true);
    
    $workSheet->mergeCells("E".(11+$somautin).":I".(11+$somautin));
    $workSheet->getStyle("E".(11+$somautin).":I".(11+$somautin))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $workSheet->setCellValueByColumnAndRow(4, $tuDong+3, 'Người lập bảng' );
    
    //$workSheet->mergeCells("B".(10+$somautin).":K".(10+$somautin));
    $workSheet->setCellValueByColumnAndRow(1, $tuDong+1, 'Bằng chữ: '.convert_number_to_words($tongsotien));
    
    
    $khoi="A7:I".(8+$somautin);
    $dinhDang=array(
        'borders' => array(
             'allborders' => array(
             'style' => PHPExcel_Style_Border::BORDER_THIN,
            ),
        
         ),
    );
    $workSheet->getStyle($khoi)->applyFromArray($dinhDang);
    header('Content-Type: application/vnd.ms-excel');
    $name="bangkethutienphongtungaydenngaysinhvien.xls";
    //header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="'.$name.'"');
    header('Cache-Control: max-age=0');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
    $objWriter->save('php://output');
    
}
else {
    echo "<script>";
    echo "alert('Lỗi nhập các thông tin: từ ngày, đến ngày, học kỳ và năm học');";
    echo "</script>";
    echo "<a  href=\"ktx_bangkethutienphong_hockynamhoc_tungaydenngay.php\"> Tiep tuc </a>";
}    
    
    function convert_number_to_words($number) {
 
$hyphen      = ' ';
$conjunction = '  ';
$separator   = ' ';
$negative    = 'âm ';
$decimal     = ' phẩy ';
$dictionary  = array(
0                   => 'Không',
1                   => 'Một',
2                   => 'Hai',
3                   => 'Ba',
4                   => 'Bốn',
5                   => 'Năm',
6                   => 'Sáu',
7                   => 'Bảy',
8                   => 'Tám',
9                   => 'Chín',
10                  => 'Mười',
11                  => 'Mười một',
12                  => 'Mười hai',
13                  => 'Mười ba',
14                  => 'Mười bốn',
15                  => 'Mười năm',
16                  => 'Mười sáu',
17                  => 'Mười bảy',
18                  => 'Mười tám',
19                  => 'Mười chín',
20                  => 'Hai mươi',
30                  => 'Ba mươi',
40                  => 'Bốn mươi',
50                  => 'Năm mươi',
60                  => 'Sáu mươi',
70                  => 'Bảy mươi',
80                  => 'Tám mươi',
90                  => 'Chín mươi',
100                 => 'trăm',
1000                => 'ngàn',
1000000             => 'triệu',
1000000000          => 'tỷ',
1000000000000       => 'nghìn tỷ',
1000000000000000    => 'ngàn triệu triệu',
1000000000000000000 => 'tỷ tỷ'
);
 
if (!is_numeric($number)) {
return false;
}
 
if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
// overflow
trigger_error(
'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
E_USER_WARNING
);
return false;
}
 
if ($number < 0) {
return $negative . convert_number_to_words(abs($number));
}
 
$string = $fraction = null;
 
if (strpos($number, '.') !== false) {
list($number, $fraction) = explode('.', $number);
}
 
switch (true) {
case $number < 21:
$string = $dictionary[$number];
break;
case $number < 100:
$tens   = ((int) ($number / 10)) * 10;
$units  = $number % 10;
$string = $dictionary[$tens];
if ($units) {
$string .= $hyphen . $dictionary[$units];
}
break;
case $number < 1000:
$hundreds  = $number / 100;
$remainder = $number % 100;
$string = $dictionary[$hundreds] . ' ' . $dictionary[100];
if ($remainder) {
$string .= $conjunction . convert_number_to_words($remainder);
}
break;
default:
$baseUnit = pow(1000, floor(log($number, 1000)));
$numBaseUnits = (int) ($number / $baseUnit);
$remainder = $number % $baseUnit;
$string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
if ($remainder) {
$string .= $remainder < 100 ? $conjunction : $separator;
$string .= convert_number_to_words($remainder);
}
break;
}
 
if (null !== $fraction && is_numeric($fraction)) {
$string .= $decimal;
$words = array();
foreach (str_split((string) $fraction) as $number) {
$words[] = $dictionary[$number];
}
$string .= implode(' ', $words);
}
 
return $string;
}
?>