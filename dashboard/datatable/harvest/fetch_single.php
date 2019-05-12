<?php
include('db.php');
include('function.php');

if (isset($_POST['action'])) {
	if ($_POST['action'] == 'harvest_view') {
		$harvest_ID = $_POST['harvest_ID'];
		$output = array();
		$statement = $conn->prepare(
			"SELECT * FROM `harvest` `hr`
			LEFT JOIN `products` `prod` ON `hr`.`prod_ID` = `prod`.`prod_ID`
			WHERE `hr`.`harvest_ID` = $harvest_ID LIMIT 1"
		);

		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{	

			$output["prod_Name"] = $row["prod_Name"];
			$output["harvest_Weight"] = $row["harvest_Weight"];
			$output["ctgy_ID"] = $row["ctgy_ID"];
			$output["prod_Description"] = $row["prod_Description"];
			$output["prod_ScientificName"] = $row["prod_ScientificName"];
			$output["prod_EnglishName"] = $row["prod_EnglishName"];
			$output["prod_Price"] = $row["prod_Price"];
			$output["prod_Weight"] = $row["prod_Weight"];
			$output["prod_SeasonStart"] = $row["prod_SeasonStart"];
			$output["prod_SeasonEnd"] = $row["prod_SeasonEnd"];
		
		}
		echo json_encode($output);
	}
	
	
	
}
?>