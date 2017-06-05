<?php
$lifeTime = 600;
session_set_cookie_params($lifeTime); 

session_start();
//数据备份代码
/////////////////////////////////////判断用户是否登陆/////////////////
if (empty($_SESSION['admin']))
	{
		echo "11111";
	exit;
	}

if ($_SESSION['admin']!="yes")
	{
		echo "222222";
	exit;
	}
/////////////////////////////////////判断用户是否登陆//////////////////

date_default_timezone_set('PRC');//时间段为北京时间
$llym = $_SERVER["HTTP_REFERER"];

$host=$_SESSION['host'];
$user=$_SESSION['user'];
$password=$_SESSION['password'];
$dbname=$_SESSION['dbname'];


$link=mysql_connect($host,$user,$password);
mysql_query("SET NAMES 'utf8'",$link); 

mysql_select_db($dbname,$link);

$q1=mysql_query("show tables");
while($t=mysql_fetch_array($q1))
{
     $table=$t[0];
//echo "DROP TABLE IF EXISTS ".$table."<br><br>";
$mysql.="DROP TABLE IF EXISTS `".$table."`;\r\n";
$q2=mysql_query("show create table ".$table);
     $sql=mysql_fetch_array($q2);
     $mysql.=$sql['Create Table'].";\r\n\r\n";

//echo $sql['Create Table'];
     $q3=mysql_query("select * from ".$table);
     while($data=mysql_fetch_assoc($q3))
      { 
             $keys=array_keys($data);
             $keys=array_map('addslashes',$keys);
             $keys=join('`,`',$keys);
             $keys="`".$keys."`";

             $vals=array_values($data);
             $vals=array_map('addslashes',$vals);
             $vals=join("','",$vals);
             $vals="'".$vals."'";
 
             $mysql.="insert into `$table`($keys) values($vals);\r\n";
      }
     $mysql.="\r\n";
} 
$filename=$dbname."-".date('mjHi').".sql";
$fp = fopen($filename,'w');
fputs($fp,$mysql);
$n=filesize($filename)/1024;
echo "<script>alert('".$n."');</script>";
fclose($fp);
echo "<br><center>数据备份成功,生成备份文件".$filename."三秒后将自动返回</center>";

echo "<meta http-equiv=refresh content=3;url=".$llym.">";



?>


