<?php
$servername = "localhost";
$username ="root";
$password ="123456";
$datebase ="yifang";
//新建连接
$conn = mysqli_connect ($servername,$username,$password,$datebase);
//检测连接
if ($conn -> connect_error){
	die("连接失败: .$conn -> connect_error");
}else{
//	echo "连接成功";
}
?>