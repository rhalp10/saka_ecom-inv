<?php 
include('dbconfig.php');
function month($date){
	if($date == '1' ){
		$var = "January";
	}
	if($date == '2' ){
		$var = "February";
	}
	if($date == '3' ){
		$var = "March";
	}
	if($date == '4' ){
		$var = "April";
	}
	if($date == '5' ){
		$var = "May";
	}
	if($date == '6' ){
		$var = "June";
	}
	if($date == '7' ){
		$var = "July";
	}
	if($date == '8' ){
		$var = "August";
	}
	if($date == '9' ){
		$var = "September";
	}
	if($date == '10'){
		$var = "October";
	}
	if($date == '11'){
		$var = "November";
	}
	if($date == '12'){
		$var = "December";
	}
	return $var;
}
if (isset($_POST['action'])) {

	if ($_POST['action'] == "product_view") {

		$output = array();
		$prod_ID = $_POST['data_id'];
		$sql = "SELECT * FROM `products` WHERE prod_ID = $prod_ID";
		$result = mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_array($result)) {
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
		$output["prod_Season"] =  month($row["prod_SeasonStart"]).' - '.month($row["prod_SeasonEnd"]);
		}
	
		echo json_encode($output);
		
	}
	if ($_POST['action'] == "checkout") {
		session_start();
		$output = array();
		if (isset($_SESSION['login_user'])) {

			$or_ID = $_POST["or_ID"];
			$sql = "UPDATE `order` SET `ors_ID` = '1' WHERE `order`.`or_ID` = $or_ID;";
			$result = mysqli_query($conn, $sql);
			$output['msg'] = "Success Checkout";
			$output['success'] = "Error";
		}
		else{
			$output['msg'] = "You Need to register First";
			$output['error'] = "Error";
		}
		echo json_encode($output);
	}

	if ($_POST['action'] == "addtoCart") {
		session_start();
		$output = array();
		if (isset($_SESSION['login_user'])) {
			$login_id = $_SESSION["login_id"];
			 $query = mysqli_query($conn,"SELECT * FROM `order` WHERE user_ID = $login_id  AND ors_ID = 0");
			if (mysqli_num_rows($query) > 0) 
			{
				$rows = mysqli_fetch_assoc($query);
				$or_ID = $rows["or_ID"];
			}
			else{
				$sql = "INSERT INTO `order` (`or_ID`, `user_ID`, `or_Date`, `ors_ID`) VALUES (NULL, $login_id, CURRENT_TIMESTAMP, 0);";
					$result = mysqli_query($conn, $sql);
					$or_ID = mysqli_insert_id($conn);
				}
				
				$prod_ID = $_POST["prod_ID"];
				$item_qty = $_POST["item_qty"];
				
				$sql = "SELECT prod_Price FROM `products`  WHERE prod_ID = $prod_ID ";


				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_array($result)) {
					$prod_Price = $row['prod_Price'];
				}
				$subtotal = $prod_Price * $item_qty;
				$sql = "INSERT INTO `order_item` (`ord_ID`, `or_ID`, `prod_ID`, `ord_Weight`, `ord_Price`, `ord_Date`) VALUES (NULL, $or_ID, $prod_ID, $item_qty, $subtotal, CURRENT_TIMESTAMP);";
				$result = mysqli_query($conn, $sql);

				$output['msg'] = "Success Added";
				$output['success'] = "Success";
			}
			else{
				$output['msg'] = "You Need to register First";
				$output['error'] = "Error";
			}
			echo json_encode($output);
			
		}

		if ($_POST['action'] == "removeitemtoCart") {
				$output = array();
			$ord_ID = $_POST["data_id"];
			$sql = "DELETE FROM `order_item` WHERE `order_item`.`ord_ID` = $ord_ID";
			
			if ( mysqli_query($conn, $sql)) {
					$output['msg'] = "Successfuly Remove";
			}
			else{
				$output['msg'] = "Error in Remove";
			}
			echo json_encode($output);
		}
		
			
	
	
	
}

?>