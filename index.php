<?php session_start(); 
header("Content-type: text/html; charset=utf-8"); 
error_reporting(0);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MYsql操作</title>
<link  href="css.css" rel="stylesheet" type="text/css">
</head>







<div align="center">
<div id="nr">

<?php include("user.php"); ?>

</div>
</div>


<div align="center">
<div id="nr">
<?php include("logo.php"); ?>
</div>
</div>


<div align="center">
<div id="wznr">


<div id="waiwai">

<div id="lblb">
<?php include("left.php"); ?>
</div>
 
 
 
<div id="nrnr">
<?php include("right.php"); ?>
</div>

</div>



</div>
</div>



<div align="center">

<div id="nr">
<p align="center">Copyright hc139.com 2008-2016</p>
<?php
mysql_free_result($result); 
mysql_close($con);
?>
</div>

</div>



