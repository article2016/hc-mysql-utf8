<?
$llym = $_SERVER["HTTP_REFERER"];

if($_POST['oldname']=="")
{
echo "让我还原什么？？？也不写，现在大学生都这样吗？正在<a href=index.php >返回</a>!";
echo "<meta http-equiv=refresh content=2;url=".$llym.">";
exit;
}


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
set_time_limit(0); //设置超时时间为0，

$host=$_SESSION['host'];
$user=$_SESSION['user'];
$password=$_SESSION['password'];
$dbname=$_SESSION['dbname'];

$link=mysql_connect($host,$user,$password);
mysql_query("SET NAMES 'utf8'",$link);

mysql_select_db($dbname,$link);

echo "请等待！！!<br>";

//数据库恢复代码
$oldname = $_POST['oldname']; 

$sqlfile=fopen($oldname,'rb');
$str=fread($sqlfile,filesize($oldname));
$str=str_replace("\r","\n",$str);
$sqlarr=explode(";\n",trim($str));
foreach($sqlarr as $key => $values)
{
foreach(explode("\n",trim($values)) as $rows)
$queryarr[$key].= $rows[0]=='#' || $rows[0].$rows[1] == '--' ? '' : $rows;
}
foreach($queryarr as $values)
{
if(!mysql_query($values,$link))
{
echo "有问题，退出了!<br>";
   exit();
}
}
echo "<script>alert('恢复数据成功，三秒后返回');</script>";
echo "<meta http-equiv=refresh content=2;url=".$llym.">";
?>