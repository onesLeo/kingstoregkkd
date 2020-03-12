<?php
include_once('../../config/connection.php');
if(isset($_POST["id"]))
{
    $query = "DELETE FROM informasi_data_gkkd WHERE id_informasi_data_gkkd = '".$_POST["id"]."'";
    if(mysqli_query($db, $query))
    {
        echo 'Data Terhapus';
    }
}
?>