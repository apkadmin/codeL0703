<?php
header('Content-Type: application/json');
if (isset($_GET['id'])){
$id = $_GET['id'];
	$sqlconnect = mysqli_connect("localhost", "root", "", "bussiness");
if(!$sqlconnect){
    echo json_encode(['code'=> '400', 'message'=>mysqli_connect_errror(), "data"=> ""], JSON_UNESCAPED_UNICODE);
}

$sql = "SELECT * FROM comment where post_id=$id";

// $result = mysqli_query($sqlconnect, $queryUser);
$result = mysqli_query($sqlconnect, $sql);
 $data = [];
 
while($row = mysqli_fetch_assoc($result)){
	$queryUser = "SELECT * FROM user where id=".$row["user_id"];
	$result1 = mysqli_fetch_assoc(mysqli_query($sqlconnect, $queryUser));
	unset($result1["password"]);
	$row["user"] = $result1;
	unset($row["user_id"]);
	array_push($data, $row);
}

echo json_encode(["data"=>$data, "message"=>"", "code"=>200], JSON_UNESCAPED_UNICODE);
}
?>