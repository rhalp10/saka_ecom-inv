<?php
include('db.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT *";
$query .= "FROM `user_accounts` ua
INNER JOIN `user_level` `ul` ON `ua`.`level_ID` = `ul`.`level_ID`";
if(isset($_POST["search"]["value"]))
{
 $query .= 'WHERE user_ID LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR user_Name LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR level_Name LIKE "%'.$_POST["search"]["value"].'%" ';
}


if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY user_ID DESC ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $conn->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	

	$sub_array = array();
	$sub_array[] = $row["user_ID"];
	$sub_array[] = check_user_level($row["level_ID"]);
	$sub_array[] = $row["user_Name"];
	$sub_array[] = check_status_level($row["user_status"]);
	$sub_array[] = $row["user_Registered"];
	$sub_array[] = '<div class="dropdown"><button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action<span class="caret"></span></button><ul class="dropdown-menu"><li><a href="#" id="'.$row["user_ID"].'" class="view">View Info</a></li><li><a href="#" id="'.$row["user_ID"].'" class="update">Update</a></li><li><a href="#" id="'.$row["user_ID"].'" class="delete">Delete</a></li></ul></div>';
	// $sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-xs delete">Delete</button>';
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);

?>



        
