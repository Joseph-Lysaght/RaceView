<?php

include('db_connect.php');
$query = '';
$status = '';
$output = array();
$query .= "DELETE FROM tbl_task";

//SQL Statement 
$statement = $conn->prepare($query);
$statement->execute();

echo "Database cleared";
?>