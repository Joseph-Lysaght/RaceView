
<?php

include('db_connect.php');

function get_total_all_records($conn)
{
 $statement = $conn->prepare('SELECT * FROM tbl_task WHERE car = "Car33" AND status ="New" AND category = "Mechanics"');
 $statement->execute();
 $result = $statement->fetchAll();
 return $statement->rowCount();
}

$output = get_total_all_records($conn);
echo json_encode($output);
?>

