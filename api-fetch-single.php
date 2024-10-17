<?php
include "db.php";
header('Content-Type:application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:GET');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

if ($_SERVER['REQUEST_METHOD'] !== 'GET') :
    http_response_code(405);
    echo json_encode(['status' => 0,'message' => 'Bad Request!.Only GET method is allowed']);
    exit;
endif;

$data=json_decode(file_get_contents("php://input"),true);

$id=$data['id'];
$sql="SELECT * FROM customers WHERE in_deleted=0 AND id='".$id."'";
$result=$conn->query($sql);

if($result->num_rows > 0){
	$output=$result->fetch_all(MYSQLI_ASSOC);	
	echo json_encode(array('output'=>$output,'status'=>true));
}
else{
	echo json_encode(array('message'=>'No Record Found','status'=>false));
}

?>
