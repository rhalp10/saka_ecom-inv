<?php
include('db.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT *";
$query .= " FROM `harvest` `hr`
LEFT JOIN `products` `prod` ON `hr`.`prod_ID` = `prod`.`prod_ID`";
if(isset($_POST["search"]["value"]))
{
 $query .= 'WHERE harvest_ID LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR prod_Name LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR prod_Price LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR harvest_Weight LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR harvest_Date LIKE "%'.$_POST["search"]["value"].'%" ';
}


if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY harvest_ID ASC ';
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
	$sub_array[] = $row["harvest_ID"];
	$sub_array[] = $row["prod_Name"];
	$sub_array[] = $row["prod_Price"];
	$sub_array[] = $row["harvest_Weight"];
	$sub_array[] = $row["harvest_Date"];
	$sub_array[] = '
<div class="btn-group">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item view"  id="'.$row["harvest_ID"].'">View</a>
    <a class="dropdown-item edit"  id="'.$row["harvest_ID"].'">Edit</a>
     <div class="dropdown-divider"></div>
    <a class="dropdown-item delete" id="'.$row["harvest_ID"].'">Delete</a>
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



        
