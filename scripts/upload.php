<?php

include_once('../config/connection.php');

$statusMsg = '';

// File upload path
$targetDir = "../uploads/";
$fileName = basename($_FILES["uploadreceipt"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$filesToUpload = $_FILES["uploadreceipt"]["name"];
$submitCheck = $_POST["submit"];

if(isset($_POST["submit"]) && !empty($_FILES["uploadreceipt"]["name"])){
	$idbarangterbeli= $_POST["idbarangterbeli"];

    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["uploadreceipt"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $db->query("INSERT into upload_receipt (nama_file, fk_barang_terbeli, waktu_upload) VALUES ('".$fileName."', '".$idbarangterbeli."', NOW())");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            }
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }

	header('location: ../uploaded-successfully');

}else{
    $idbarangterbeli= $_POST["idbarangterbeli"];
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg." - Files To Upload > ".$filesToUpload;
echo "<br/> submit > ".$submitCheck;
echo "<br/> id barang terbeli > ".$idbarangterbeli;
echo "<br/> File Type > ".$fileType;
?>