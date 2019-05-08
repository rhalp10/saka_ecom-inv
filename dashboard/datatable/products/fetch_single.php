<?php
include('db.php');
include('function.php');

if (isset($_POST['view'])) {
	$prod_ID = $_POST['prod_ID'];
	$output = array();
	$statement = $conn->prepare(
		"SELECT * FROM `products` WHERE prod_ID = $prod_ID"
	);

	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{			
	
		$output["prod_Name"] = $row["prod_Name"];
		if (!empty($row['prod_Img'])) {
		 $output["prod_Img"] = 'data:image/jpeg;base64,'.base64_encode($row['prod_Img']);
		}
		else{
		  $output["prod_Img"] = "";
		}

		$output["prod_Name"] = $row["prod_Name"];
		$output["prod_Description"] = $row["prod_Description"];
		$output["prod_ScientificName"] = $row["prod_ScientificName"];
		$output["prod_EnglishName"] = $row["prod_EnglishName"];
		$output["prod_Price"] = $row["prod_Price"];
		$output["prod_Qnty"] = $row["prod_Weight"];
		$output["prod_Season"] = $row["prod_Season"];
	
	}
	echo json_encode($output);
	
}
?>