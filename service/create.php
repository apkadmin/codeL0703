<?php 
$data = json_decode( file_get_contents('php://input') , true);

if (isset($data["name"]) && isset($data["address"])&& isset($data["description"])&& isset($data["image"])&& isset($data["thumb"])&& isset($data["logo"])&& isset($data["action"])){
    $name = $data["name"];
    $description = $data["description"];
    $image = $data["image"];
    $address = $data["address"];
    $thumb = $data["thumb"];
    $logo = $data["logo"];
    $action = $data["action"];

$sqlconnect = mysqli_connect("localhost", "root", "", "bussiness");
if(!$sqlconnect){
    echo json_encode(['code'=> '400', 'message'=>mysqli_connect_errror(), "data"=> ""], JSON_UNESCAPED_UNICODE);
}
$sql = "INSERT INTO busiess(name, address, description, logo, image, thumb, action) VALUES('$name', '$address', '$description', '$logo', '$image', '$thumb', '$action')";
if(mysqli_query($sqlconnect, $sql)){
  echo json_encode(['code'=> '200', 'message'=>"", "data"=> "tao thanh cong"], JSON_UNESCAPED_UNICODE);
} else {
 echo json_encode(['code'=> '400', 'message'=>mysqli_error($sqlconnect), "data"=> ""], JSON_UNESCAPED_UNICODE);
};

} else {
     echo json_encode(['code'=> '403', 'message'=>'cac truong du lieu can day du', "data"=> ""], JSON_UNESCAPED_UNICODE);
};




 ?>