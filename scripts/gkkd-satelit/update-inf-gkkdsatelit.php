<?php
include_once('../../config/connection.php');
if(isset($_POST["id"]))
{
    $value = mysqli_real_escape_string($db, $_POST["value"]);
    $query = "UPDATE gkkd_satelit_jakarta SET ".$_POST["column_name"]."='".$value."' WHERE id_gkkd_satelit_jakarta = '".$_POST["id"]."'";
    if(mysqli_query($db, $query))
    {
        echo 'Data Sudah Diupdate';
    }
}
?>