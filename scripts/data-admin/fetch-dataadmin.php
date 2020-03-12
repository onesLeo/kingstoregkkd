<?php
include_once('../../config/connection.php');
$columns = array('no_telp', 'alamat','no_rekening_pembayaran');
$query = "SELECT * FROM informasi_data_gkkd ";

if(isset($_POST["search"]["value"]) && !empty($_POST["search"]["value"]))
{
 $query .= '
 WHERE no_rekening_pembayaran LIKE "%'.$_POST["search"]["value"].'%"
 ';

}

$checkResult = mysqli_query($db, $query);

$number_filter_row = mysqli_num_rows($checkResult);

$result = mysqli_query($db, $query);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id_informasi_data_gkkd"].'" data-column="no_telp">' . $row["no_telp"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id_informasi_data_gkkd"].'" data-column="no_rekening_pembayaran">' . $row["no_rekening_pembayaran"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id_informasi_data_gkkd"].'" data-column="alamat">' . $row["alamat"] . '</div>';
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["id_informasi_data_gkkd"].'">Delete</button>';
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM informasi_data_gkkd";
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