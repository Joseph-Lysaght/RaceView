
<?php

include('db_connect.php');

if(isset($_POST["car"]))
{
	$error = '';
	$success = '';
	$name = '';
	$description = '';
	$category = '';
	$status = 'New';
	$created = date("H:i:s d/m/Y");
	$car = $_POST["car"];
 
	//----- Check Inputs -------//
	if(empty($_POST["description"]))
	{
		$error .= 'Description is Required!';
	}
	else
	{
		$description = $_POST["description"];
	}
	if(empty($_POST["category"]))
	{
		$error .= 'Category is Required!';
	}
	else
	{
		$category = $_POST["category"];
	}
 
	
	// ------- Try for the SQL Sequence ----// 
	if($error == ''){
		try{
			if ($car =='Both') {
				//Car 03
				$data = array(
					':description'  => $description,
					':car'  => 'Car03',
					':category' => $category,
					':status' => $status,
					':created' => $created
				);
				$SQLQuery = "INSERT INTO tbl_task (car, description, category, status, created) VALUES (:car, :description, :category, :status, :created)";
				$statement = $conn->prepare($SQLQuery);
				$statement->execute($data);
				// Car 33
				$data = array(
					':description'  => $description,
					':car'  => 'Car33',
					':category' => $category,
					':status' => $status,
					':created' => $created
				);
				$SQLQuery = "INSERT INTO tbl_task (car, description, category, status, created) VALUES (:car, :description, :category, :status, :created)";
				$statement = $conn->prepare($SQLQuery);
				$statement->execute($data);
			}
			else{
				$data = array(
					':description'  => $description,
					':car'  => $car,
					':category' => $category,
					':status' => $status,
					':created' => $created
				);
				$SQLQuery = "INSERT INTO tbl_task (car, description, category, status, created) VALUES (:car, :description, :category, :status, :created)";
				$statement = $conn->prepare($SQLQuery);
				$statement->execute($data);
			}
		}
		catch (PDOException $e) {
			$error = "Error: " . $e->getMessage();
		}
		$success .= 'New Tasks Created';
	}
 
	$output = array(
	'success'  => $success,
	'error'   => $error
	);
	echo json_encode($output);
}
?>
