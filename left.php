


<p>>>><a href="exe.php?id=fhsql" title=返回MYsql选择数据库 >MYsql</a>>>><a href="exe.php?id=fhsqlb"  title=返回库选择数据表 >库</a>>>>表>>></p>


<hr>

<?php
if($_SESSION['dbname']!="")
{
mysql_select_db($_SESSION['dbname'],$con);/////库的名字
echo "<p><div id=dblbw>●";
echo $_SESSION['dbname'];
echo "●</div></p>";
		if($_SESSION['dbname']=="information_schema")
		{
		echo "<p>【警告：系统库】</p>"; 
		}
echo "<p>●[<a href=exe.php?sqlml=yes&nr=xj ";
echo "title=点击之后请注意SQL命令框内容，适当修改执行即可  >建表</a>]●";
echo "[<a href=exe.php?qkkqkkqkk=qkk title=清空数据库  "
?>onClick="return confirm('确定后，您当前操作的数据库将清空！！')"<?php
echo " >清库</a>]●</p>";
echo "<p onClick=change_view('a0') >●[备份]●</p>";
echo "<div id=a0 style=display:none >";
echo "<hr>";
///////////////////////////////////////////////////////恢复数据备份///////////////////////////////////////////
$mulu=dirname(__FILE__);

function ListFiles($dir) { 
    if($dh = opendir($dir)) { 
        $files = Array();
        $inner_files = Array(); 

        while($file = readdir($dh)) {
            if($file != "." && $file != ".." && $file[0] != '.') {
                if(is_dir($dir . "/" . $file)) {
                    $inner_files = ListFiles($dir . "/" . $file);
                    if(is_array($inner_files)) $files = array_merge($files, $inner_files); 
                } else {
                    array_push($files, $dir . "/" . $file);
                }
            }
        } 
        closedir($dh);
        return $files;
    }
}
$sz = ListFiles($mulu);
$sz = glob($mulu.'\*.sql'); // 其他文件做类似修改，比如 *.png, *.txt等。。有目录请添加绝对目录。比如：c:/album/*.jpg 

echo "<form action=zhy.php method=post>&nbsp;●[<a href=zbak.php ";
?>onClick="return confirm('确定后，您将备份文件，文件放在本程序根目录下您可以通过FTP软件进行管理！')"<?php
echo ">备份</a>][<SELECT title=您可以选择您想恢复的备份 name=oldname style=width:88px ><OPTION></OPTION>";
foreach($sz as $v)
{
echo "  <OPTION title=".str_replace($mulu."\\","",$v)." value=".$v." >";
echo str_replace($mulu."\\","",$v);
echo "</OPTION>";
}
echo "</SELECT>";

echo "<input type=submit value=恢复 ";
?>onClick="return confirm('恢复数据备份要小心！如果确定之后，请耐心等待提示？')"<?php
echo" />]</form>";
////echo $mulu;

//////////////////////////////////////////////////恢复数据备份////////////////////////////////////////////////




echo "</div>";
echo "<hr><p>当前库有下列数据表</p>";
}	 
else
{
	$result = mysql_query("show databases"); 
	echo "<hr>";
	if(empty($result))
	{
	echo "<p>●尚未有可用连接●</P><hr>";
	echo "PHP server ver: ".PHP_VERSION;
	}
	else
	{
	echo "<p>MySQL:". mysql_get_server_info()."</P>";
	echo "<p>●当前操作MYsql有下列库●</P><hr>";
	}
	
	while($row = mysql_fetch_array($result)) 
		{
		echo "<br><div id=dblbw>◆";
		echo "<a href=exe.php?id=hk&k=".$row[0]." title=".$row[0]." >".$row[0]."</a>";
		echo "◆</div><br>";
		} 
}
?>

<hr><br>

<?php
$result = mysql_query("SHOW TABLES"); 
while($row = mysql_fetch_array($result)) 
{
      		 if($row[0]==$_SESSION['b'])
			 {
			 echo "<hr>";
			 echo "<div id=dblbw>◆".$row[0];
			 echo "◆</div>"; 
			 echo "<p>『<a href=exe.php?sbsbsb=sb&bmbm=".$row[0]." ";
		?> onClick="return confirm('正要执行删除操作！？')"<?php
			 echo " >删表</a>』『<a href=exe.php?qkqkqk=qk&bmbm=".$row[0]." ";
		?> onClick="return confirm('正要执行清空操作！？')"<?php
			 echo " >清空</a>』";
			 echo "『<a href=exe.php?sqlml=yes&nr=remadname ";
			 echo "title=改名命令目前无法执行 >改名</a>』</p>";
			 echo "<hr>";
			 }
			 else
			 {
			 echo "<div id=dblbw>◇<a href=exe.php?id=hb&b=".$row[0]." title=".$row[0]." >".$row[0]."</a>◇</div>"; 
			 }
echo "<br>";
} 
?>

