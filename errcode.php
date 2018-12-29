
<?php
/* 查询次数 */
$con = mysqli_connect("ftp09.host.me0.cn","web2746","Jph8RCAK","web2746");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
$sql1="select * from count order by id desc LIMIT 1";  
$result1 = mysqli_query($con,$sql1);
$row = mysqli_fetch_array($result1);
$count=$row["count"];
$count=$count + 1 ;
$reIP=$_SERVER["REMOTE_ADDR"]; //ip地址
$sql2="INSERT INTO count (count, errcode,date,ip) VALUES($count,'".$_GET['ErrCode']."',now(),'$reIP')";
mysqli_query($con,$sql2);





$sql="SELECT * FROM errcode where errcode ='".$_GET['ErrCode']."'";
  $result = mysqli_query($con,$sql);
  
  
if (mysqli_num_rows($result) < 1){

echo 'blank';

}
else{

echo "<table  class='table table-bordered table-striped'>
<thead>
<tr>
<th>模块</th>
<th>错误描述</th>
<th>建议</th>
</tr>
</thead>";
echo"<tbody>";
while($row = mysqli_fetch_array($result))
 {
 echo "<tr>";
 echo "<td>" . $row['模块名称'] . "</td>";
 echo "<td ><font color='red' id='ec'>" . $row['错误描述'] . "</font></td>";
if($row['建议']==""){echo"<td>"; echo"<a href=feedback.html?errcode=".$_GET['ErrCode'].">添加</a>";echo"</td>";}
 else{echo "<td>" . $row['建议'] . "</td>";}
 echo "</tr>";
 }
 echo"</tbody>";
echo "</table>";

mysql_close($con);
}
?>



