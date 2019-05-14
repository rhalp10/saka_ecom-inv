<?php


function get_total_all_records()
{
	include('db.php');
	$statement = $conn->prepare("SELECT * FROM `products`");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

function get_available_stocks($prod_ID){
    
   include('db.php');
    $statement = $conn->prepare("SELECT sum(harvest_Weight) as harvest_Weight  FROM `harvest` WHERE prod_ID = $prod_ID");
    $statement->execute();
   
        $harvest = $statement->fetchAll();
          foreach ($harvest as $row) {
            $harvest_Weight = $row["harvest_Weight"];
        }
    $statement = $conn->prepare("SELECT sum(ord_Weight) as or_Weight FROM `order_item` WHERE prod_ID =  $prod_ID");
    $statement->execute();

    $order = $statement->fetchAll();
        foreach ($order as $row) {
            $or_Weight = $row["or_Weight"];
    }
    if (empty($harvest_Weight)) {
        $harvest_Weight = "0.00";
    }
    if (empty($or_Weight)) {
        $or_Weight = "0.00";
    }
      
   
   $available_stocks = $harvest_Weight - $or_Weight;
   $available_stocks  = number_format($available_stocks ,2);
   $statement = $conn->prepare("UPDATE `products` SET `prod_Weight` = '$available_stocks' WHERE `products`.`prod_ID` = $prod_ID");
   $statement->execute();


    return $available_stocks;
}
function get_stocks_status($item_count){
    if ($item_count > 0 ) {
        $var =  '<button type="button" class="btn btn-success btn-sm">
          Available
        </button>';
    }
    else{
         $var =  '<button type="button" class="btn btn-danger btn-sm">
          Out of Stocks
        </button>';
    }
      return $var;
}
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


?>