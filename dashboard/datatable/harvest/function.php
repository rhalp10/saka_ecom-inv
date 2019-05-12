<?php


function get_total_all_records()
{
	include('db.php');
	$statement = $conn->prepare("SELECT * FROM `harvest`");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}



?>