<?php
include_once('../config/connection.php');
if(isset($_POST["id"]))
{
    $value = mysqli_real_escape_string($db, $_POST["value"]);
    $query = "UPDATE informasi_barang SET ".$_POST["column_name"]."='".$value."' WHERE id_informasi_barang = '".$_POST["id"]."'";
    if(mysqli_query($db, $query))
    {
        echo 'Data Sudah Diupdate';
    }
}
?>