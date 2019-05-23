<?php
require('conn.php');
$flag=$_POST["flag"];

if($flag=='up'){
	$content=$_POST['con'];
	$currentdate=$_POST['currentdate'];
	$sql ="INSERT INTO project (content,start) VALUES ('$content','$currentdate')";
	$result = $conn -> query($sql);
	if($result>0){
		echo "success";
	};
}else if($flag=='out'){
	$sql1 = "SELECT * FROM project";
	$data = "";
	$result = $conn->query($sql1);
	$count = mysqli_num_rows($result);
	while($row = $result->fetch_assoc()){
		$data = $data.'{"id":"'.$row['id'].'","content":"'.$row['content'].'","start":"'.$row['start'].'"},';
	}
	$json = '['.$data.'{}]';
	echo json_encode($json);
}else if($flag=='searchdate'){
	$search_date=$_POST['search_date'];
	$search_content=$_POST['search_content'];
	if(($search_date&&!$search_content)||($search_content&&!$search_date)){
	$sql3 = "SELECT * FROM project WHERE `start` = '$search_date' or `content` = '$search_content'";
	}else if($search_date&&$search_content){
		$sql3 = "SELECT * FROM project WHERE `start` = '$search_date' and `content` = '$search_content'";	
	}
	$data = "";
	$result = $conn->query($sql3);
	$count = mysqli_num_rows($result);
	while($row = $result->fetch_assoc()){
		$data = $data.'{"id":"'.$row['id'].'","content":"'.$row['content'].'","start":"'.$row['start'].'"},';
	}
	$json = '['.$data.'{}]';
	echo json_encode($json);
}else if($flag=='delete'){
	$id = $_POST['id'];
	$sql2 = "DELETE FROM project WHERE id='$id'";
	$result = $conn -> query($sql2);
}

?>