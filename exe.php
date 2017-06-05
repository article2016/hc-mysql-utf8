<?php
session_start(); 
header("Content-type: text/html; charset=utf-8"); 
date_default_timezone_set('PRC');//时间段为北京时间
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>



<?php
/////////////////////////////////////判断用户是否登陆/////////////////
if (empty($_SESSION['admin']))
	{
		echo "11111";
?><script language="javascript">setTimeout(function (){location.href='index.php';},1);</script><?
	exit;
	}

if ($_SESSION['admin']!="yes")
	{
		echo "222222";
?><script language="javascript">setTimeout(function (){location.href='index.php';},1);</script><?
	exit;
	}
/////////////////////////////////////判断用户是否登陆//////////////////

if ($_SESSION['host']=="")
{
mysql_close($con);
echo "没链上";
}
else
{
$con = mysql_connect($_SESSION['host'],$_SESSION['user'],$_SESSION['password']);//本机，帐号，密码
if (!$con)
  {
  echo "<br>[<a href='exit.php' >清空信息 重新登陆</a>]<br>";
  die('Could not connect: ' . mysql_error());
  }
  else
  {
echo "正在使用[";
echo $_SESSION['user'];
echo "]帐号，登陆[";
echo $_SESSION['host'];
echo "]<BR>";

mysql_query("SET NAMES UTF8"); 

  }
}
?>


<?php 
if ($_GET['sbsbsb']=="sb")
{
unset($_SESSION['ys']);
unset($_SESSION['b']);
unset($_SESSION['px']);
$mysqlyj = "DROP TABLE ".$_SESSION['dbname'].".".$_GET['bmbm'];
///////echo $mysqlyj;
mysql_query($mysqlyj);//////删除一张表
}
?>


<?php
if ($_GET['id']=="fhsql")
{
unset($_SESSION['dbname']);
unset($_SESSION['ys']);
unset($_SESSION['b']);
unset($_SESSION['px']);
}

if ($_GET['id']=="fhsqlb")
{
unset($_SESSION['ys']);
unset($_SESSION['b']);
unset($_SESSION['px']);
}
?>

<?php 
if ($_GET['id']=="hk")
{
unset($_SESSION['sqlcx']);
unset($_SESSION['dbname']);
unset($_SESSION['b']);
unset($_SESSION['px']);
unset($_SESSION['ys']);
echo $_GET['id'];
$_SESSION['dbname'] = $_GET['k'];
}
?>



<?php 
if ($_GET['id']=="hb")
{
unset($_SESSION['sqlcx']);
unset($_SESSION['px']);
unset($_SESSION['b']);
unset($_SESSION['ys']);

$_SESSION['b'] = $_GET['b'];
$_SESSION['ys'] = "1";
//////////////////////////////////////
$table = $_SESSION['b'];  ////查找所有字段信息 
echo $table;
$sqlColumns = mysql_query ( "SHOW FULL COLUMNS FROM ".$_SESSION['dbname'].".$table") or die ( "错误或该表不存在" );  // 统计字段总数  
$columnNum = mysql_num_rows ( $sqlColumns );  
$i = 0;  // 循环每个字段  
while ( $i < $columnNum ) {  // 获取每个字段信息信息  
$colname = mysql_fetch_array ( $sqlColumns );  // 答应详细字段信息  
$zd[$i]=$colname[0];
   if ($colname[4]=="PRI")
   {
   $_SESSION['px'] = $zd[$i]; /////////echo $_SESSION['px'];/////把主键的值给系统
   }
$i ++;
}
$i = 0;
////////////////////////////////////////////
}
?>


<?php
if ($_GET['id']=="tjtjtj")
{//////////本IF开头
$table = $_SESSION['b'];  ////查找所有字段信息  
$sqlColumns = mysql_query ( "SHOW FULL COLUMNS FROM ".$_SESSION['dbname'].".$table");//// or die ( "错误或该表不存在" );  // 统计字段总数  
$columnNum = mysql_num_rows ( $sqlColumns );  
$i = 0;  // 循环每个字段  
///////////////////////////////////////////////////////
$sqlsql = "INSERT INTO ".$_SESSION['dbname'].".".$table." (";
///////////////////////////////////////////////////////
while ( $i < $columnNum ) 
{  // 获取每个字段信息信息  
$colname = mysql_fetch_array ( $sqlColumns );  // 答应详细字段信息  
$zd[$i]=$colname[0];
   if ($colname[4]=="PRI")
       {
       }
   else
	   {
	   $sqlsql = $sqlsql.$zd[$i].", ";
	   }
$i ++;
}
$sqlsql = $sqlsql."9-0(-)";
$sqlsql = str_replace(", 9-0(-)","",$sqlsql);
$sqlsql = $sqlsql.")VALUES (";


$table = $_SESSION['b'];  ////查找所有字段信息  
$sqlColumns = mysql_query ( "SHOW FULL COLUMNS FROM ".$_SESSION['dbname'].".$table");//// or die ( "错误或该表不存在" );  // 统计字段总数  
$columnNum = mysql_num_rows ( $sqlColumns );  
$i = 0;  // 循环每个字段  
while ( $i < $columnNum ) 
{  // 获取每个字段信息信息  
$colname = mysql_fetch_array ( $sqlColumns );  // 答应详细字段信息  
$zd[$i]=$colname[0];
   if ($colname[4]=="PRI")
       {
       }
   else
	   {
	   $sqlsql = $sqlsql."'".$_POST[$zd[$i]]."', ";
	   }
$i ++;
}
$sqlsql = $sqlsql."9-0-7-7(-)";
$sqlsql = str_replace(", 9-0-7-7(-)","",$sqlsql);
$sqlsql = $sqlsql.")";

echo "<p>".$sqlsql."</p>";
mysql_query($sqlsql);
$_SESSION['sqlml'] = $sqlsql;
}//////////本IF收尾
 
?>


<?php
if ($_GET['xgxgxgxg']=="xg")
{
$zjzjzj = $_GET[zjmzjmzjmzjm];
$zjzzjzzjz = $_GET[$_GET[zjmzjmzjmzjm]];
$table = $_SESSION['b'];  ////查找所有字段信息  
$sqlColumns = mysql_query ( "SHOW FULL COLUMNS FROM ".$_SESSION['dbname'].".".$table);//// or die ( "错误或该表不存在" );  // 统计字段总数  
echo  "SHOW FULL COLUMNS FROM ".$_SESSION['dbname'].".".$table;
$columnNum = mysql_num_rows ( $sqlColumns );  
$i = 0;  // 循环每个字段  
while ( $i < $columnNum ) 
                          {  // 获取每个字段信息信息  
$colname = mysql_fetch_array ( $sqlColumns );  // 答应详细字段信息  
$zd[$i]=$colname[0];
mysql_query(" UPDATE ".$_SESSION['dbname'].".".$table." SET ".$zd[$i]." = '".$_POST[$zd[$i]]."' 
WHERE ".$zjzjzj." = '".$zjzzjzzjz."' ");

echo "<br>"." UPDATE ".$_SESSION['dbname'].".".$table." SET ".$zd[$i]." = '".$_POST[$zd[$i]]."' 
WHERE ".$zjzjzj." = '".$zjzzjzzjz."' ";
$i ++;
                          }
}
?>

<?php
if ($_GET['scscsc']=="sc")
{
$zjzjzj = $_GET[zjmzjmzjmzjm];
$zjzzjzzjz = $_GET[$_GET[zjmzjmzjmzjm]];
$table = $_SESSION['b'];  ////
mysql_query("DELETE FROM ".$_SESSION['dbname'].".".$table." WHERE ".$zjzjzj."='".$zjzzjzzjz."'");
}
?>


<?php 
if ($_GET['qkqkqk']=="qk")
{
unset($_SESSION['ys']);
unset($_SESSION['b']);
$mysqlyj = "truncate table ".$_SESSION['dbname'].".".$_GET['bmbm'];
/////echo $mysqlyj;
mysql_query($mysqlyj);//////清空一张表
$_SESSION['b']=$_GET['bmbm'];
}
?>


<?php
if ($_GET['y']=="yes")//////换页过程中
{
$_SESSION['px'] = $_GET['px'];
$_SESSION['ys'] = $_GET['ys'];
}
?>


<?php 
if ($_GET['qkqkqk']=="qk")
{
unset($_SESSION['ys']);
unset($_SESSION['b']);
$mysqlyj = "truncate table ".$_SESSION['dbname'].".".$_GET['bmbm'];
/////echo $mysqlyj;
mysql_query($mysqlyj);//////清空一张表
$_SESSION['b']=$_GET['bmbm'];
}
?>

<?php 
if ($_GET['szdszd']=="szd")
{
unset($_SESSION['ys']);
unset($_SESSION['b']);
$mysqlyj = "alter table ".$_SESSION['dbname'].".".$_GET['bmbm']." drop column ".$_GET['zdm'];
/////echo $mysqlyj;
mysql_query($mysqlyj);//////清空一张表
$_SESSION['b']=$_GET['bmbm'];
}
?>

<?php
if ($_GET['sqlsql']=="sql")
{
unset($_SESSION['ys']);
unset($_SESSION['b']);
unset($_SESSION['px']);

mysql_query($_POST['sql']);
?><script language="javascript">setTimeout(function (){location.href='index.php';},1);</script><?
}
?>


<?php 
if ($_GET['sqlml']=="yes")
{
         if($_GET['nr']=="xj")
		 {
		 $_SESSION['sqlml']="CREATE TABLE a1111143516.Persons 
(
personID int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(personID),
FirstName varchar(15),
LastName varchar(15),
Age int
)";
		 }
		 
         if($_GET['nr']=="remadname")
		 {
		 $_SESSION['sqlml']="rename table 'db'.'table1' to 'db'.'table2'";
		 }
}
?>


<?php 
if ($_GET['qkkqkkqkk']=="qkk")
{
unset($_SESSION['ys']);
unset($_SESSION['b']);
unset($_SESSION['px']);
mysql_select_db($_SESSION['dbname'],$con);/////库的名字

	$result = mysql_query("SHOW TABLES"); 
	while($row = mysql_fetch_array($result)) 
	{
	/////echo $row[0]; 
	$mysqlyj = "DROP TABLE ".$_SESSION['dbname'].".".$row[0];
	mysql_query($mysqlyj);//////删除一张表
	} 
}
?>

<?php 
if ($_GET['cxcxcx']=="cx")
{


if($_POST['ljysf']=="")
{
$_SESSION['sqlcx'] = "SELECT * FROM ".$_SESSION['b']." WHERE ".$_POST['zd'].$_POST['bjysf']."'".$_POST['zhi']."' ";
}
else
{
$_SESSION['sqlcx'] = "SELECT * FROM ".$_SESSION['b']." WHERE ".$_POST['zd'].$_POST['bjysf']."'".$_POST['zhi']."' ".$_POST['ljysf']." ".$_POST['zd2'].$_POST['bjysf2']."'".$_POST['zhi2']."'";
}


}
?>



<?php 
if ($_GET['zdycx']=="zdycx")
{
$_SESSION['sqlcx'] = $_POST['sql'];
}
?>






<?php
mysql_close($con);
?><script language="javascript">setTimeout(function (){location.href='index.php';},1);</script>