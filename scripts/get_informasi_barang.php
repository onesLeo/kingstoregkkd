<?php 
include_once('../config/config.php');

if(isset($_GET["id_barang"])){
	$userID = intval($_GET["id_barang"]);
	$sql_query = "select qty_barang, harga_perqty from informasi_barang where id_informasi_barang=".$userID;
	$result = mysqli_query($db,$sql_query);
	while($rows = mysqli_fetch_assoc($result)){
		$data = $rows;
	}
	echo json_encode($data);
}
?>