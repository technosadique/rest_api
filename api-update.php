<?php
include "db.php";
header('Content-Type:application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:PUT');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

if ($_SERVER['REQUEST_METHOD'] !== 'PUT') :
    http_response_code(405);
    echo json_encode(['status' => 0,'message' => 'Bad Request!.Only PUT method is allowed']);
    exit;
endif;

$data=json_decode(file_get_contents("php://input"),true);

$first_name=$data['first_name'];
$last_name=$data['last_name'];
$phone=$data['phone'];
$id=$data['id'];

$sql="UPDATE customers SET first_name='{$first_name}',last_name='{$last_name}',phone='{$phone}' WHERE id='{$id}'";

if($conn->query($sql)){	
	echo json_encode(array('status'=>true,'message'=>'Customer Record Updated'));
}
else{
	echo json_encode(array('status'=>false,'message'=>'Customer Record not Updated'));
}

?>
