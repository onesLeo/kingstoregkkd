<?php
include_once('../config/connection.php');
$columns = array('nama_barang', 'qty_barang','harga_perqty');
$query = "SELECT * FROM informasi_barang ";

if(isset($_POST["search"]["value"]) && !empty($_POST["search"]["value"]))
{
 $query .= '
 WHERE nama_barang LIKE "%'.$_POST["search"]["value"].'%"
 ';

// echo 'Search Active '.$query;
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY id_informasi_barang DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$checkResult = mysqli_query($db, $query);

$number_filter_row = mysqli_num_rows($checkResult);

$result = mysqli_query($db, $query);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id_informasi_barang"].'" data-column="nama_barang">' . $row["nama_barang"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id_informasi_barang"].'" data-column="qty_barang">' . $row["qty_barang"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id_informasi_barang"].'" data-column="harga_perqty">' . $row["harga_perqty"] . '</div>';
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["id_informasi_barang"].'">Delete</button>';
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM informasi_barang";
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