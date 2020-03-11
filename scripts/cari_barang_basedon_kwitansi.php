<?php 
include_once('../config/connection.php');

if(isset($_POST["id_barang"])){
	$nokwitansi = $_POST["id_barang"];
	$sql_query = "select a.id_barang_terbeli, a.jumlah_barang_dibeli, a.total_harga_pembelian, a.no_kwitansi, b.nama_barang 
    from barang_terbeli a INNER JOIN informasi_barang b on a.fk_informasi_barang = b.id_informasi_barang WHERE a.no_kwitansi='".$nokwitansi."'";
	$result = mysqli_query($db,$sql_query);
	while($rows = mysqli_fetch_assoc($result)){
		$data = $rows;
	}
	echo json_encode($data);
}
?>