<?php
include('db.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT *";
$query .= " FROM `products` `prod`
LEFT JOIN `category` `ctgy` ON `prod`.`ctgy_ID` = `ctgy`.`ctgy_ID`";
if(isset($_POST["search"]["value"]))
{
 $query .= 'WHERE prod_ID LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR prod_Name LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR ctgy_Name LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR prod_Season LIKE "%'.$_POST["search"]["value"].'%" ';
}


if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY prod_ID DESC ';
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
	$sub_array[] = $row["prod_ID"];
	$sub_array[] =$row["ctgy_Name"];
	$sub_array[] = $row["prod_Name"];
	$sub_array[] = $row["prod_Price"];
	$sub_array[] = $row["prod_Weight"];
	$sub_array[] = $row["prod_Season"];
	$sub_array[] = '
<div class="btn-group">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item view" href="#" id="'.$row["prod_ID"].'">View</a>
    <a class="dropdown-item edit" href="#" id="'.$row["prod_ID"].'">Edit</a>
     <div class="dropdown-divider"></div>
    <a class="dropdown-item delete" href="#" id="'.$row["prod_ID"].'">Delete</a>
  </div>
</div>';

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



        
