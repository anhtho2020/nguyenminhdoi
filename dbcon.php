<?php  
class clsConnet{
    public static function DBConnect(){
        $connect=mysqli_connect("localhost", "root", "");
        mysqli_select_db($connect,"quanlyktx");
        mysqli_query($connect,"SET NAMES 'utf8'");
        return $connect;
		//jgj
    }
	//public static function DBConnect1(){
        	//$connect=mysql_connect("localhost", "qldtuser", "ctecsystem");
        	//mysql_select_db("quanlydaotao_back", $connect1);
        	//mysql_query("SET NAMES 'utf8'",$connect1);
        	//return $connect1;
    	//}
}

//    $link = mysql_connect ("localhost", "root", "")
//        or die ("Could not connect to MySQL Database");      
//    mysql_select_db("ktxdatabase", $link);  
//    mysql_query("SET CHARACTER SET utf8",$link);
?>

