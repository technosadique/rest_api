<?php
include "db.php";
header('Content-Type:application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:DELETE');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') :
    http_response_code(405);
    echo json_encode(['status' => 0,'message' => 'Bad Request!.Only DELETE method is allowed']);
    exit;
endif;

$data=json_decode(file_get_contents("php://input"),true);
$id=$data['id'];
$sql="DELETE FROM customers WHERE id={$id}";

if($conn->query($sql)){	
	echo json_encode(array('message'=>'Student record deleted successfully!','status'=>true));
}
else{
	echo json_encode(array('message'=>'Student record not deleted successfully!','status'=>false));
}

?>
