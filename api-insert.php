<?php
include "db.php";
header('Content-Type:application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') :
    http_response_code(405);
    echo json_encode(['status' => 0,'message' => 'Bad Request!.Only POST method is allowed']);
    exit;
endif;

$data=json_decode(file_get_contents("php://input"),true);

$first_name=$data['first_name'];
$last_name=$data['last_name'];
$phone=$data['phone'];

$sql="INSERT INTO customers (first_name,last_name,phone) VALUES('{$first_name}','{$last_name}','{$phone}')";

if($conn->query($sql)){	
	echo json_encode(array('status'=>1,'message'=>'Added successfully!'));
}
else{
	echo json_encode(array('status'=>0,'message'=>'Record not added'));
}

?>
