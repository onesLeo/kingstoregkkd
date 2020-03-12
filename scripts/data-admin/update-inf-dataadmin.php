<?php
include_once('../../config/connection.php');
if(isset($_POST["id"]))
{
    $value = mysqli_real_escape_string($db, $_POST["value"]);
    $query = "UPDATE informasi_data_gkkd SET ".$_POST["column_name"]."='".$value."' WHERE id_informasi_data_gkkd = '".$_POST["id"]."'";
    if(mysqli_query($db, $query))
    {
        echo 'Data Sudah Diupdate';
    }
}
?>