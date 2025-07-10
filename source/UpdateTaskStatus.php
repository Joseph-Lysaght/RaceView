<?php

//ackData.php

include('db_connect.php');
$error = '';
$success = '';

if(isset($_POST["id"]))
{
	if($_POST["request"] == "Ack"){
		$status = "Acknowledged";
	} 
	else if($_POST["request"] == "Done"){
		$status = "Done";
	}	
	$data = array(
		':status'  => $status, 
		':id'   => $_POST["id"]
	);

	$query = "UPDATE tbl_task SET status = :status WHERE id = :id";
	$statement = $conn->prepare($query);
	$statement->execute($data);
	$success = 'Task Updated';
};

$output = array(
		'success'  => $success,
		'error'   => $error
	);
echo json_encode($output);

?>