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
	
	
}
?>