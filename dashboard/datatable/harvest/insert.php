<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{

	if($_POST["operation"] == "submit_harvest")
	{	
		
		
		$product_ID = $_POST["product_ID"];
		$prod_weight = $_POST["prod_weight"];
		$sql = "INSERT INTO `harvest` (`harvest_ID`, `prod_ID`, `harvest_Weight`, `harvest_Date`) VALUES (NULL, :product_ID, :prod_weight, CURRENT_TIMESTAMP);";
		$statement = $conn->prepare($sql);
			
		$result = $statement->execute(
		array(

				':product_ID'		=>	$product_ID,
				':prod_weight'		=>	$prod_weight
			)
		);
		if(!empty($result))
		{
			echo 'Successfully Added';
		}

		
	}

	if($_POST["operation"] == "harvest_edit")
	{
		
		

		$harvest_ID = $_POST["harvest_ID"];
		$prod_weight = $_POST["prod_weight"];
		$sql = "UPDATE `harvest` SET `harvest_Weight` = :prod_weight WHERE `harvest`.`harvest_ID` = :harvest_ID;";
		$statement = $conn->prepare($sql);
			
		$result = $statement->execute(
		array(

				':harvest_ID'		=>	$harvest_ID,
				':prod_weight'		=>	$prod_weight
			)
		);
		if(!empty($result))
		{
			echo 'Successfully Updated';
		}
	
	}

	if($_POST["operation"] == "delete_harvest")
	{
		$statement = $conn->prepare(
			"DELETE FROM `harvest` WHERE `harvest`.`harvest_ID` = :harvest_ID"
		);
		$result = $statement->execute(
			array(
				':harvest_ID'	=>	$_POST["harvest_ID"]
			)
		);
		
		if(!empty($result))
		{
			echo 'Data Deleted';
		}
		
	
	}
}
?>
