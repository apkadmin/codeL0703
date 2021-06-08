<?php

if(isset($_FILES['file'])){
	$file = $_FILES['file'];
	$isImage =getimagesize($file['tmp_name']);
	$name = uniqid();
if($isImage){
	if(move_uploaded_file($file['tmp_name'], "upload/$name")){
		echo json_encode(["code"=>200, "data"=> "http://localhost/bussiness/service/upload/$name"], JSON_UNESCAPED_UNICODE);
		return http_response_code(200);
	} else {
		echo json_encode(["code"=>403, "data"=> "", "message" => "Khong the upload file"]);
		return http_response_code(403);
	}
} else {
echo json_encode(["code"=>403, "data"=> "", "message" => "File tai len khong phai la hinh anh"]);
return http_response_code(403);

}
}
?>