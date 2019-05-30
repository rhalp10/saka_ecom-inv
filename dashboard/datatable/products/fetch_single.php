<?php
include('db.php');
include('function.php');

if (isset($_POST['action'])) {
	if ($_POST['action'] == 'product_view') {
		$prod_ID = $_POST['product_ID'];
		$output = array();
		$statement = $conn->prepare(
			"SELECT * FROM `products` WHERE prod_ID = $prod_ID LIMIT 1"
		);

		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{			
		
			
			if (!empty($row['prod_Img'])) {
				
			 $output["prod_Img"] = 'data:image/jpeg;base64,'.base64_encode($row['prod_Img']);
			}
			else{
			  $output["prod_Img"] = "../assets/img/uploads/blank.png";
			}

			$output["prod_Name"] = $row["prod_Name"];
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