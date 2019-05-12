<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{

	if($_POST["operation"] == "submit_product")
	{	
		error_reporting(0);
	
		$prod_img = NULL;
		if (isset($_FILES['prod_img']['tmp_name'])) {
			$prod_img = file_get_contents($_FILES['prod_img']['tmp_name']);
			
		}
		
		$prod_name = $_POST["prod_name"];
		$prod_category = $_POST["prod_category"];
		$prod_descr = $_POST["prod_descr"];
		$prod_sciname = $_POST["prod_sciname"];
		$prod_engname = $_POST["prod_engname"];
		$prod_price = $_POST["prod_price"];
		$prod_season_start = $_POST["prod_season_start"];
		$prod_season_end = $_POST["prod_season_end"];
		
		
	

		$sql = "SELECT * FROM `products` WHERE `prod_Name`= :prod_name;";
		$statement = $conn->prepare($sql);
		$statement->bindParam(':prod_name', $prod_name, PDO::PARAM_STR);
		$result = $statement->execute();
		$resultrows = $statement->rowCount();

		if (empty($resultrows)) { 
		   // if product is available

			 $sql = "INSERT INTO `products` (`prod_ID`, `ctgy_ID`, `prod_Img`, `prod_Name`, `prod_Description`, `prod_ScientificName`, `prod_EnglishName`, `prod_Price`, `prod_Weight`, `prod_SeasonStart`, `prod_SeasonEnd`, `prod_Date`) VALUES (NULL, :prod_category, :prod_img, :prod_name, :prod_descr, :prod_sciname, :prod_engname, :prod_price, '0.00', :prod_SeasonStart, :prod_SeasonEnd, CURRENT_TIMESTAMP);";
			$statement = $conn->prepare($sql);
			
			$result = $statement->execute(
				array(

					':prod_category'		=>	$prod_category,
					':prod_img'			=>	$prod_img,
					':prod_name'			=>	$prod_name,
					':prod_descr' 			=>	$prod_descr,
					':prod_sciname'	  		=>	$prod_sciname,
					':prod_engname'	 		=>	$prod_engname,
					':prod_price'	 		=>	$prod_price,
					':prod_SeasonStart'	 		=>	$prod_season_start,
					':prod_SeasonEnd'	 		=>	$prod_season_end
					
					
				)
			);

			if(!empty($result))
			{
				echo 'Successfully Added';
			}

		} else {
		   // if product is not available
			echo 'This Product Already Added';

		}
	}

	if($_POST["operation"] == "product_edit")
	{
		error_reporting(0);
		
		$prod_img = NULL;
		if (isset($_FILES['prod_img']['tmp_name'])) {
			$prod_img = file_get_contents($_FILES['prod_img']['tmp_name']);
			
		}

		
		
		$product_ID = $_POST["product_ID"];
		$prod_name = $_POST["prod_name"];
		$prod_category = $_POST["prod_category"];
		$prod_descr = $_POST["prod_descr"];
		$prod_sciname = $_POST["prod_sciname"];
		$prod_engname = $_POST["prod_engname"];
		$prod_price = $_POST["prod_price"];
		$prod_season_start = $_POST["prod_season_start"];
		$prod_season_end = $_POST["prod_season_end"];

		if (empty($prod_img)) {
			$sql = "UPDATE `products` SET `ctgy_ID`  = :prod_category, `prod_Name` = :prod_name, `prod_Description` = :prod_descr, `prod_ScientificName` = :prod_sciname, `prod_EnglishName` = :prod_engname, `prod_Price` = :prod_price, `prod_SeasonStart` = :prod_SeasonStart, `prod_SeasonEnd` = :prod_SeasonEnd WHERE `products`.`prod_ID` = :product_ID";
			$statement = $conn->prepare($sql);
			
			$result = $statement->execute(
				array(

					':product_ID'		=>	$product_ID,
					':prod_category'		=>	$prod_category,
					':prod_name'			=>	$prod_name,
					':prod_descr' 			=>	$prod_descr,
					':prod_sciname'	  		=>	$prod_sciname,
					':prod_engname'	 		=>	$prod_engname,
					':prod_price'	 		=>	$prod_price,
					':prod_SeasonStart'	 		=>	$prod_season_start,
					':prod_SeasonEnd'	 		=>	$prod_season_end
					
					
				)
			);
		}
		else{
			$sql = "UPDATE `products` SET `ctgy_ID`  = :prod_category, `prod_Img`  = :prod_img, `prod_Name` = :prod_name, `prod_Description` = :prod_descr, `prod_ScientificName` = :prod_sciname, `prod_EnglishName` = :prod_engname, `prod_Price` = :prod_price, `prod_SeasonStart` = :prod_SeasonStart, `prod_SeasonEnd` = :prod_SeasonEnd WHERE `products`.`prod_ID` = :product_ID";
			$statement = $conn->prepare($sql);
			
			$result = $statement->execute(
				array(

					':product_ID'		=>	$product_ID,
					':prod_img'			=>	$prod_img,
					':prod_category'		=>	$prod_category,
					':prod_name'			=>	$prod_name,
					':prod_descr' 			=>	$prod_descr,
					':prod_sciname'	  		=>	$prod_sciname,
					':prod_engname'	 		=>	$prod_engname,
					':prod_price'	 		=>	$prod_price,
					':prod_SeasonStart'	 		=>	$prod_season_start,
					':prod_SeasonEnd'	 		=>	$prod_season_end
					
					
				)
			);
		}	

		if(!empty($result))
		{
			echo 'Successfully Updated';
		}
	
	}

	if($_POST["operation"] == "delete_product")
	{
		


		$statement = $conn->prepare(
			"DELETE FROM `products` WHERE `products`.`prod_ID` = :product_ID"
		);
		$result = $statement->execute(
			array(
				':product_ID'	=>	$_POST["product_ID"]
			)
		);
		
		if(!empty($result))
		{
			echo 'Data Deleted';
		}
		
	
	}
}
?>
