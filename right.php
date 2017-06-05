

<?php
if($_SESSION['ys'])
{
$ys = $_SESSION['ts']*($_SESSION['ys']-1);
}	 
else
{
$ys = 0;
}
?>

<?php
/////echo $_SESSION['b'];  ////查找所有字段信息  
?>

<?php
if($_SESSION['b']=="")
{
include("hold.php"); 
}
else
{

///////////////////////////////////////////////////////////////////查看库块
echo "<div onClick=change_view('a1') style='height:22;background-color:#EAE8E5;height: 2em;line-height: 2em;' >◆表内数据◆<hr></div>";
echo "<div id=a1 style=display:";
if (empty($_SESSION['sqlcx']))
     {
     }
     else
	{
	echo "none";
	}
echo " >";
$table = $_SESSION['b'];  ////查找所有字段信息  
$sqlColumns = mysql_query ( "SHOW FULL COLUMNS FROM $table");//// or die ( "错误或该表不存在" );  // 统计字段总数  
$columnNum = mysql_num_rows ( $sqlColumns );  

mysql_query("SET NAMES UTF8"); 

$i = 0;  // 循环每个字段  
echo "<table bgcolor=#EDF1F8>";
echo "<tr>";
while ( $i < $columnNum ) {  // 获取每个字段信息信息  
$colname = mysql_fetch_array ( $sqlColumns );  // 答应详细字段信息  
echo "<td><div align=center>";
$zd[$i]=$colname[0];
echo "<a href=exe.php?y=yes&ys=".$_SESSION['ys']."&px=".$zd[$i];
echo "  title=类型[".$colname[1]."]　编码[".$colname[2]."] >".$zd[$i]."</a>"; 

   if ($colname[4]=="PRI")
       {
       $zjm = $zd[$i];
       $zj = $i;
       echo "<br>[主键]";
       }
   else
	   {
       echo "<br>[<a href=exe.php?szdszd=szd&bmbm=".$_SESSION['b']."&zdm=".$zd[$i];
	?> onClick="return confirm('重要！当前操作将删除一个字段！？')"<?php
	   echo " >删</a>][改]";
	   }
echo "</div></td>";
$i ++;
}
echo "<td>操作</td><td>--</td></tr>";
$i = 0;
                                         if($_SESSION['px']=="")
										 {
										 $pxpx = "";
										 echo "<h3>无主键数据表本系统无法操作，如为系统表，请小心！</h3>";
										 }
										 else
										 {
										 $pxpx = "ORDER  BY ".$_SESSION['px']." DESC";
										 }
   $result = mysql_query("SELECT * FROM ".$table." ".$pxpx." LIMIT ".$ys.",".$_SESSION['ts']);

   while($row = mysql_fetch_array($result))
    {
    echo "\r\n<tr ";
?> onmouseover="this.style.background='#A5D9FF'; " onmouseout ="this.style.background=''; this.style.borderColor=''" <?php 
	echo " ><form action=exe.php?xgxgxgxg=xg&zjmzjmzjmzjm=".$zjm."&".$zjm."=".$row[$zd[$zj]]." method=post>";
          while ( $i < $columnNum ) 
	      {  // 获取每个字段信息信息  
          echo "<td>";
          echo "<textarea ";
		  if($_SESSION['px']==$zd[$i])
		  {
		  echo "disabled";
		  }
		  echo " cols=8 name=".$zd[$i]." >".$row[$zd[$i]]."</textarea>";
          $i ++;
          echo "</td>\r\n";
          }
    $i = 0;
    echo "<td valign=middle ><input type=submit type=button value=修改 ";
	?> onClick="return confirm('您要修改这条数据！？')"<?php
    echo "></td></form>";
	echo "<td align=center ><a href=exe.php?scscsc=sc&zjmzjmzjmzjm=".$zjm."&".$zjm."=".$row[$zd[$zj]];
	?> onClick="return confirm('重要！当前操作将删除这条数据！？')"<?php
    echo "  >删除</a></td>";
	echo "</tr>\r\n\r\n";
    }

echo "</table>";

$result = mysql_query("SELECT * FROM ".$table);//查看总留言数并分页
$num = mysql_num_rows($result);
echo "<p>记录总数[".$num."]条！";
$ys = ceil($num/$_SESSION['ts']);
for ($i=1; $i<=$ys; $i++)
{
if ($_SESSION['ys']!=$i)
echo "〖<a href=exe.php?y=yes&ys=".$i."&px=".$_SESSION['px'].">".$i."</a>〗";
else
echo "<strong>[".$i."]</strong>";
}
echo "</p>";
echo "</div>";
//////////////////////////////////////////////////////////新增加数据块
echo "<hr>";
echo "<div onClick=change_view('a2') style='height:22;background-color:#EAE8E5;height: 2em;line-height: 2em;' >◆添加◆<hr></div>";
echo "<div id=a2 style=display:none >";
$sqlColumns = mysql_query ( "SHOW FULL COLUMNS FROM $table");//// or die ( "错误或该表不存在" );  // 统计字段总数  
$columnNum = mysql_num_rows ( $sqlColumns );  
$i = 0;  // 循环每个字段  

echo "<table >";
echo "<form action=exe.php?id=tjtjtj method=post><tr>";
while ( $i < $columnNum ) 
{  // 获取每个字段信息信息  
$colname = mysql_fetch_array ( $sqlColumns );  // 答应详细字段信息  
$zd[$i]=$colname[0];
   if ($colname[4]=="PRI")
       {
       }
   else
	   {
       echo "<td>";
	   echo $zd[$i];
	   echo "</td>";
	   echo "<td>";
	   echo "<textarea rows=1 cols=8 name=".$zd[$i]." >";
	   echo "</textarea>";
       echo "</td>";
	   }
$i ++;
}
echo "<td><input type=submit type=button value=新增 ></td></tr></form></table>";
echo "</div>";
echo "<hr>";


/////////////////////////////////////////◆查询◆//////////////////
echo "<div onClick=change_view('a3') style='height:22;background-color:#EAE8E5;height: 2em;line-height: 2em;' >◆查询◆<hr></div>";
echo "<div id=a3 style=display:";
if (empty($_SESSION['sqlcx']))
     {
	echo "none";
     }
     else
	{
	} 
echo " >";

echo "<form action=exe.php?cxcxcx=cx method=post>";

echo "方式一：<input disabled type=text value=".$table." size=8 >表中，";
$sqlColumns = mysql_query ( "SHOW FULL COLUMNS FROM $table");//// or die ( "错误或该表不存在" );  // 统计字段总数  
$columnNum = mysql_num_rows ( $sqlColumns );  
$i = 0;  // 循环每个字段  
echo "字段<select title=查询字段 name=zd style=width:78px >";
while ( $i < $columnNum ) 
{  // 获取每个字段信息信息  
$colname = mysql_fetch_array ( $sqlColumns );  // 答应详细字段信息  
$zd[$i]=$colname[0];
	   echo "<option title=".$zd[$i]." value=".$zd[$i]." >".$zd[$i]."</option>";
$i ++;
}
echo "</select>";
echo "<select title=比较运算符 name=bjysf ><option title='全等于' value='=' > = </option><option title='不等于' value='!=' > != </option><option title='<' value='<' > < </option><option title='>' value='>' > > </option><option title='<=' value='<=' > <= </option><option title='>=' value='>=' > >= </option></select>";
echo "<input name=zhi size=8 type=text  >条件2<select title=逻辑运管符 name=ljysf ><option></option><option title='and' value='and' > 和 </option><option title='or' value='or' > 或 </option></select>";

$i=0;
echo "字段<select title=查询字段 name=zd2 style=width:78px >";
while ( $i < $columnNum ) 
{  // 获取每个字段信息信息  
echo "<option title=".$zd[$i]." value=".$zd[$i]." >".$zd[$i]."</option>";
$i ++;
}
echo "</select>";
echo "<select title=比较运算符 name=bjysf2 ><option title='全等于' value='=' > = </option><option title='不等于' value='!=' > != </option><option title='<' value='<' > < </option><option title='>' value='>' > > </option><option title='<=' value='<=' > <= </option><option title='>=' value='>=' > >= </option></select>";
echo "<input name=zhi2 size=8 type=text  >的数据。";
$i=0;
echo "<input type=submit value=查询 /></form>";
echo "<hr>";

echo "<form action=exe.php?zdycx=zdycx method=post >方式二：";
echo "<input name=sql type=text value='SELECT * FROM ".$table." WHERE ' size=78 />";
echo "<input type=submit value=自定义查询 /></form><hr>";


if (empty($_SESSION['sqlcx']))
     {
	echo "<br>";
     }
     else
	{///////////////////////////判断是否开始查询块////////////////////
echo "<hr>您当前的查询语句是".$_SESSION['sqlcx'];
$i = 0;  // 循环每个字段  
echo "<table bgcolor=#EDF1F8>";
echo "<tr>";

$sqlColumns = mysql_query ( "SHOW FULL COLUMNS FROM $table");//// or die ( "错误或该表不存在" );  // 统计字段总数  
while ( $i < $columnNum ) {  // 获取每个字段信息信息 
echo "<td><div align=center>";
echo $zd[$i]; 
$colname = mysql_fetch_array ( $sqlColumns );  // 答应详细字段信息
echo "</div></td>";
$i ++;
}
echo "<td>操作</td><td>--</td> </tr>";
$result = mysql_query($_SESSION['sqlcx']);
$ia = 0;
while($row = mysql_fetch_array($result))
  {
 $ia ++;
  echo "<tr ";
?> onmouseover="this.style.background='#A5D9FF'; " onmouseout ="this.style.background=''; this.style.borderColor=''" <?php 
  echo " ><form action=exe.php?xgxgxgxg=xg&zjmzjmzjmzjm=".$zjm."&".$zjm."=".$row[$zd[$zj]]." method=post>";
         $i = 0;// 循环每个字段 
$sqlColumns = mysql_query ( "SHOW FULL COLUMNS FROM $table");//// or die ( "错误或该表不存在" );  // 统计字段总数  
         while ( $i < $columnNum ) 
         {
		 echo "<td>";
		 echo "<textarea rows=2 ";
		          $colname = mysql_fetch_array ( $sqlColumns );  // 答应详细字段信息
				  if ($colname[4]=="PRI")
                  {
                  $zjm = $zd[$i];
                  $zj = $i;
                  echo "disabled";
                  }
		 echo " cols=8 name=".$zd[$i]." >";
         echo $row[$zd[$i]]."</textarea>";
		 echo "</td>";
         $i ++;
         }
    echo "<td valign=middle ><input type=submit type=button value=修改 ";
	?> onClick="return confirm('您要修改这条数据！？')"<?php
    echo "></td>";
	echo "<td align=center valign=middle ><a href=exe.php?scscsc=sc&zjmzjmzjmzjm=".$zjm."&".$zjm."=".$row[$zd[$zj]];
	?> onClick="return confirm('重要！当前操作将删除这条数据！？')"<?php
    echo "  >删除</a></td>";
	echo "</form></tr>";
  }
echo "<tr><td colspan=".$columnNum." >该行为本表最后1行！本表总计".$ia."行</td></tr>";
echo "</table >";
//////unset($_SESSION['sqlcx']);

         }
///////////////////////////END判断是否查询块////////////////////



echo "</div><hr>";
/////////////////////////////////////end◆查询◆///////////////////////////

echo "<div onClick=change_view('a4') style='height:22;background-color:#EAE8E5;height: 2em;line-height: 2em;' >◆SQL命令编辑区◆<hr></div>";
echo "<div id=a4 style=display:none >";

include("sql.php"); 

echo "<hr></div>";

}
?>



<script language="javascript">
function change_view(obj_name)
{
var aa=document.getElementById(obj_name);
if(aa.style.display=="")
{
aa.style.display="none";
}
else
{
aa.style.display="";
}
}
</script>
