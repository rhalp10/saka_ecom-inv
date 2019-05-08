<?php

include('db.php');
include("function.php");

if(isset($_POST["user_ID"]))
{
	
	$statement = $conn->prepare(
		"DELETE FROM `user_accounts` WHERE user_ID = :user_ID"
	);
	$result = $statement->execute(
		array(
			':user_ID'	=>	$_POST["user_ID"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>