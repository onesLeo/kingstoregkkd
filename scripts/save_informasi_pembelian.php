<?php 
	include_once('../config/connection.php');
	$n=7; 
	if(isset($_POST["submit"])){
		
		session_start();
		$idbarang = $_POST["pbarang"];
		$jumlah_beli = $_POST["jpembelian"];
		$total_harga = $_POST["tharga"];
		$idsatelit = $_POST["gkkdsatelit"];
		$qtytersedia = $_POST["qtytersedia"];
		$nama_cabang_penerima_barang = $_POST["namasatelit"];
		$nama_pembeli = $_POST["npembeli"];
		$no_ktp = $_POST["noktp"];
		$no_kwitansi = "KWI_".random_strings($n);
		
		$_SESSION['jml_beli'] = $jumlah_beli;
		$_SESSION['tot_harga'] = $total_harga;
		$_SESSION['no_kwitansi'] = $no_kwitansi;
		$_SESSION['cabang_penerima'] = $nama_cabang_penerima_barang;
		
		$current_qty = intval($qtytersedia) - intval($jumlah_beli);
		
		$query_update = "update informasi_barang set qty_barang=".$current_qty." where id_informasi_barang= ".$idbarang;
		
		if (mysqli_query($db, $query_update)) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record ";
		}

		$query_insert = "insert into barang_terbeli(jumlah_barang_dibeli, total_harga_pembelian, no_kwitansi, fk_informasi_barang, fk_informasi_alamat_kirim) values ('".$jumlah_beli."','".$total_harga."','".$no_kwitansi."','".$idbarang."','".$idsatelit."')";

        if (mysqli_query($db,$query_insert)){
            $id_of_barang_terbeli = mysqli_insert_id($db);
            $query_insert_informasi_pembeli = "insert into informasi_pembeli(nama_pembeli, no_ktp, fk_barang_dibeli) values ('".$nama_pembeli."','".$no_ktp."','".$id_of_barang_terbeli."')";
            if(mysqli_query($db,$query_insert_informasi_pembeli)){
                header('Location: ../information-afterpurchase.php');
            }
		}else{
			echo "id brg ".$idbarang."<br/>";
			echo "jmlBeli ".$jumlah_beli."<br/>";
			echo "total_harga ".$total_harga."<br/>";
			echo "satelit ".$idsatelit."<br/>";
			echo "no Kwi ".$no_kwitansi."<br/>";
			
			echo "insert failure happens!";
		}
		
		mysqli_close($db);
	
	}else{
		echo "id barang ".$_POST["idbarang"];
		echo "NAMA CABANG PENGIRMAN ".$_SESSION["cabang_pengiriman"];
		echo $cons="console.log('not set')";
	}
	
	function random_strings($length_of_string) 
	{ 
	  
		// String of all alphanumeric character 
		$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
	  
		// Shufle the $str_result and returns substring 
		// of specified length 
		return substr(str_shuffle($str_result),  
						   0, $length_of_string); 
	}

?>