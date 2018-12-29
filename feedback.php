<?php

$con = mysqli_connect("ftp09.host.me0.cn","web2746","Jph8RCAK","web2746");
$time=getdate();


if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
$sql="INSERT INTO feedback (errcode, type, description,time) VALUES('".$_GET['errcode']."','".$_GET['fbType']."','".$_GET['description']."',now())";
  
  
if ($con->query($sql) === TRUE) {
    echo "新记录插入成功";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
?>