<?php
include_once 'dbc.inc.php';

// Get information from HTML form
$band_name = $_POST['band_name'];
$country = $_POST['country'];
$contact_personId = $_POST['contact_personId'];
$band_information = $_POST['band_information'];

$sql = "INSERT INTO band (name, country, contactPerson_id, info) 
        VALUES ('$band_name', '$country', $contact_personId, '$band_information');";

if(mysqli_query($conn, $sql)) {
        header("Location: ../admin.php?booking=succeed");
} else {
        header("Location: ../admin.php?booking=failed");
}



mysqli_close($conn);
