<?php 
$data = json_decode( file_get_contents('php://input') , true);


if (isset($data["size"]) && isset($data["page"])){
    $size = $data["size"];
    $page = $data['page'];
$sqlconnect = mysqli_connect("localhost", "root", "", "bussiness");
if(!$sqlconnect){
    echo json_encode(['code'=> '400', 'message'=>mysqli_connect_errror(), "data"=> ""], JSON_UNESCAPED_UNICODE);
}

$sqltoal = "SELECT COUNT(*) as Total FROM busiess";
$result = mysqli_query($sqlconnect, $sqltoal);
$total = mysqli_fetch_assoc($result);
$sql = "SELECT * from busiess LIMIT $size OFFSET ".$page*$size;
$listBusiness = mysqli_query($sqlconnect, $sql);
var_dump(mysqli_fetch_all($listBusiness));
// $pagedata = ['business' =>mysqli_fetch_all($listBusiness), 'total'=> $total['Total'], 'currentPage'=> $page, 'size'=> $listBusiness->num_rows, 'nextPate' => (Int)$page + 1];
// var_dump( $pagedata);
// echo json_encode(['data' => $pagedata, 'code'=>200, 'message' => 'success'], JSON_UNESCAPED_UNICODE);

}

 ?>