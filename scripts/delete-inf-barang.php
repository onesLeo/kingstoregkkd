<?php
include_once('../config/connection.php');
if(isset($_POST["id"]))
{
    $value = mysqli_real_escape_string($db, $_POST["value"]);
    $query = "DELETE informasi_barang WHERE id_informasi_barang = '".$_POST["id"]."'";
    if(mysqli_query($db, $query))
    {
        echo 'Data Terhapus';
    }
}
?>