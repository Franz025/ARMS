<?php include('../inc/connection.php');

$output= array();
$sql = "SELECT * FROM tbl_events_logs ";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	
	0 => 'event_name',

	1 => 'start',
	2 => 'end',
	3 => 'backgroundColor',
	4 => 'borderColor',

);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];

	$sql .= " WHERE event_name like '%".$search_value."%'";

	$sql .= " OR start like '%".$search_value."%'";
	$sql .= " OR end like '%".$search_value."%'";
	$sql .= " OR backgroundColor like '%".$search_value."%'";
	$sql .= " OR borderColor like '%".$search_value."%'";

}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY id desc";
}

if($_POST['length'] != -1)
{
	$start = $_POST['start'];
	$length = $_POST['length'];
	$sql .= " LIMIT  ".$start.", ".$length;
}	

$query = mysqli_query($con,$sql);
$count_rows = mysqli_num_rows($query);
$data = array();
while($row = mysqli_fetch_assoc($query))
{
	$sub_array = array();
	$sub_array[] = $row['id'];
	$sub_array[] = $row['controlnum'];
	$sub_array[] = $row['g_lastname'];
	$sub_array[] = $row['g_firstname'];
	$sub_array[] = $row['g_age'];
	$sub_array[] = $row['b_lastname'];
	$sub_array[] = $row['b_firstname'];
	$sub_array[] = $row['b_age']; 
	$sub_array[] = $row['date_interview'];
	$sub_array[] = $row['interviewed_by'];
	$sub_array[] = '<a href="javascript:void();" data-id="'.$row['id'].'"  class="btn btn-info btn-sm editbtn" >Edit</a>  <a href="javascript:void();" data-id="'.$row['id'].'"  class="btn btn-danger btn-sm deleteBtn" >Delete</a>';
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);
