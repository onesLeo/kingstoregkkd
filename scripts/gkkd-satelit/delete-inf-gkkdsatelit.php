<?php
include_once('../../config/connection.php');
if(isset($_POST["id"]))
{
    $query = "DELETE FROM gkkd_satelit_jakarta WHERE id_gkkd_satelit_jakarta = '".$_POST["id"]."'";
    if(mysqli_query($db, $query))
    {
        echo 'Data Terhapus';
    }
}
?>