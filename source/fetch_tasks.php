
<?php

include('db_connect.php');
$query = '';
$status = '';
$output = array();
$query .= "SELECT * FROM tbl_task ";


//Filter by car
if(isset($_POST["car"])){
	if($_POST["car"] == "car03"){
		$query .= 'WHERE (car = "Both" OR car = "Car03")';
	} 
	else if($_POST["car"] == "car33"){
		$query .= 'WHERE (car = "Both" OR car = "Car33")';
	}
};

//Filter out caetgory
if(isset($_POST["category_Array"])){
	if (filter_var($_POST['category_Array'][0], FILTER_VALIDATE_BOOLEAN) === false) { // hide done
		$query .= 'AND NOT(status = "Done")';
	}
	if (filter_var($_POST['category_Array'][1], FILTER_VALIDATE_BOOLEAN) === false) { // hide sys
		$query .= 'AND NOT(category = "Systems")';
	}
	if (filter_var($_POST['category_Array'][2], FILTER_VALIDATE_BOOLEAN) === false) { // hide mech
		$query .= 'AND NOT (category = "Mechanics")';
	}
	if (filter_var($_POST['category_Array'][3], FILTER_VALIDATE_BOOLEAN) === false) { // hide perf
		$query .= 'AND NOT (category = "Performance")';
	}
};

// Order results
$query .= 'ORDER BY id DESC ';

// filter length for page
if($_POST["length"] != -1)
{
 $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
};

//SQL Statement 
$statement = $conn->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();

foreach($result as $row){
	$sub_array = array();
	$sub_array[] = $row["description"];
	$sub_array[] = $row["category"];
	$sub_array[] = $row["status"];
	$sub_array[] = '<button type="button" name="ack" id="'.$row["id"].'" class="btn btn-primary btn-sm ack">Ack</button>';
	$sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-sm update">Edit</button>';
	$sub_array[] = '<button type="button" name="done" id="'.$row["id"].'" class="btn btn-danger btn-sm done">Done</button>';
	$data[] = $sub_array;
}


function get_total_all_records($conn)
{
	$statement = $conn->prepare("SELECT * FROM tbl_task");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

$output = array(
	"recordsTotal" => $filtered_rows,
	"recordsFiltered" => get_total_all_records($conn),
	"data" => $data
);

echo json_encode($output);
?>
