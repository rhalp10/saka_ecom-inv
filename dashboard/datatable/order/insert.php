<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{

	if($_POST["operation"] == "order_process")
	{	
		$statement = $conn->prepare(
		"UPDATE `order` SET `ors_ID` = '2' WHERE `order`.`or_ID` = '".$_POST["order_ID"]."';"
		);
		$statement->execute();
		$result = $statement->fetchAll();

		echo "Process Complete";
	}
}
?>

