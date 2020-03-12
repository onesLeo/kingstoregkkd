<?php
include_once('../../config/connection.php');
$columns = array('nama_pembeli', 'no_kwitansi','nama_barang','jumlah_barang_dibeli','total_harga_pembelian','nama_satelit','alamat_satelit');
$query = "SELECT bt.id_barang_terbeli, ip.nama_pembeli, bt.no_kwitansi, ib.nama_barang, bt.jumlah_barang_dibeli, bt.total_harga_pembelian, gsj.nama_satelit, gsj.alamat_satelit 
            FROM barang_terbeli bt 
            INNER JOIN informasi_barang ib on bt.fk_informasi_barang = ib.id_informasi_barang
            INNER JOIN informasi_pembeli ip on bt.id_barang_terbeli = ip.fk_barang_dibeli
            INNER JOIN gkkd_satelit_jakarta gsj on bt.fk_informasi_alamat_kirim = gsj.id_gkkd_satelit_jakarta";

if(isset($_POST["search"]["value"]) && !empty($_POST["search"]["value"]))
{
 $query .= '
 WHERE bt.no_kwitansi LIKE "%'.$_POST["search"]["value"].'%"
 ';
}

$checkResult = mysqli_query($db, $query);

$number_filter_row = mysqli_num_rows($checkResult);

$result = mysqli_query($db, $query);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id_barang_terbeli"].'" data-column="nama_pembeli">' . $row["nama_pembeli"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id_barang_terbeli"].'" data-column="no_kwitansi">' . $row["no_kwitansi"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id_barang_terbeli"].'" data-column="nama_barang">' . $row["nama_barang"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id_barang_terbeli"].'" data-column="jumlah_barang_dibeli">' . $row["jumlah_barang_dibeli"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id_barang_terbeli"].'" data-column="total_harga_pembelian">' . $row["total_harga_pembelian"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id_barang_terbeli"].'" data-column="nama_satelit">' . $row["nama_satelit"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id_barang_terbeli"].'" data-column="alamat_satelit">' . $row["alamat_satelit"] . '</div>';
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["id_barang_terbeli"].'">Delete</button>';
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT bt.id_barang_terbeli, ip.nama_pembeli, bt.no_kwitansi, ib.nama_barang, bt.jumlah_barang_dibeli, bt.total_harga_pembelian, gsj.nama_satelit, gsj.alamat_satelit 
            FROM barang_terbeli bt 
            INNER JOIN informasi_barang ib on bt.fk_informasi_barang = ib.id_informasi_barang
            INNER JOIN informasi_pembeli ip on bt.id_barang_terbeli = ip.fk_barang_dibeli
            INNER JOIN gkkd_satelit_jakarta gsj on bt.fk_informasi_alamat_kirim = gsj.id_gkkd_satelit_jakarta";
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