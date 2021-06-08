<?php
header('Content-Type: application/json');
if (isset($_GET['id'])){
$id = $_GET['id'];
	$sqlconnect = mysqli_connect("localhost", "root", "", "bussiness");
if(!$sqlconnect){
    echo json_encode(['code'=> '400', 'message'=>mysqli_connect_errror(), "data"=> ""], JSON_UNESCAPED_UNICODE);
}

$sql = "SELECT * FROM user where id=$id";
$result = mysqli_query($sqlconnect, $sql);
$post = mysqli_fetch_assoc($result);
echo json_encode(["data"=>$post, "message"=>"", "code"=>200], JSON_UNESCAPED_UNICODE);
}
?>