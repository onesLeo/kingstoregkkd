<?php
include_once('../config/connection.php');
if(isset($_POST["id"]))
{
    $query = "DELETE FROM informasi_barang WHERE id_informasi_barang = '".$_POST["id"]."'";
    if(mysqli_query($db, $query))
    {
        echo 'Data Terhapus';
    }
}
?>