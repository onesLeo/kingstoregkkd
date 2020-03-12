<?php
include_once('../../config/connection.php');
$columns = array('nama_satelit', 'alamat_satelit','no_telp','alamat_email');
$query = "SELECT * FROM gkkd_satelit_jakarta ";

if(isset($_POST["search"]["value"]) && !empty($_POST["search"]["value"]))
{
 $query .= '
 WHERE nama_satelit LIKE "%'.$_POST["search"]["value"].'%"
 ';

}

$checkResult = mysqli_query($db, $query);

$number_filter_row = mysqli_num_rows($checkResult);

$result = mysqli_query($db, $query);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id_gkkd_satelit_jakarta"].'" data-column="nama_satelit">' . $row["nama_satelit"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id_gkkd_satelit_jakarta"].'" data-column="alamat_satelit">' . $row["alamat_satelit"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id_gkkd_satelit_jakarta"].'" data-column="no_telp">' . $row["no_telp"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id_gkkd_satelit_jakarta"].'" data-column="alamat_email">' . $row["alamat_email"] . '</div>';
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["id_gkkd_satelit_jakarta"].'">Delete</button>';
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM gkkd_satelit_jakarta";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($db),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>