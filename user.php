<?php


if ($_GET['dl']=="ok")
{
$_SESSION['px'] = 'id';
$_SESSION['ts'] = $_POST['ts'];
$_SESSION['host'] = $_POST['host'];
$_SESSION['user'] = $_POST['user'];
$_SESSION['password'] = $_POST['password'];
Header("Location:index.php");////返回来路的地址
}

if ($_SESSION['host']=="")
{
mysql_close($con);
?>
<form action="index.php?dl=ok " method="post">
　服务器: <input name="host" value=localhost />
用户名: <input name="user"  />
密　码: <input type="password" name="password"  />
每页显示条数: <select name="ts" ><option value=8 selected="selected">8</option><option value=15>15</option><option value=30>30</option><option value=20>20</option><option value=18>18</option><option value=16>16</option><option value=12>12</option><option value=10>10</option>
</select>
<input type="submit"  value="登陆数据库" />
</form>
<?php
}
else
{
$con = mysql_connect($_SESSION['host'],$_SESSION['user'],$_SESSION['password']);//本机，帐号，密码
mysql_query("SET NAMES 'utf8'",$con); 

if (!$con)
  {
  echo "<br>[<a href='exit.php' >清空信息 重新登陆</a>]";
  die('Could not connect: ' . mysql_error());
  }
  else
  {
echo "使用[";
echo $_SESSION['user'];
echo "]帐号，登陆[";
echo $_SESSION['host'];
$_SESSION['admin']="yes";
echo "]";
echo "[<a href='exit.php' >退出</a>]";

  }
date_default_timezone_set('PRC');//时间段为北京时间
}
?>


