<?php
include_once 'dbc.inc.php';

// Get information from HTML form
$band_id = $_POST['band_id'];
$scene_id = $_POST['scene_id'];
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];

$sql = "INSERT INTO schedule (band_id, scene_id, timeStart, timeEnd)
        VALUES ($band_id, $scene_id, '$start_time', '$end_time');";

if(mysqli_query($conn, $sql)) {
    header("Location: ../admin.php?scheduling=succeed");
} else {
    header("Location: ../admin.php?scheduling=failed");
}

mysqli_close($conn);
?>