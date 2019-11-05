<?php
include_once ("dbc.inc.php");

$band_id = $_POST['band_id'];
$worker_id = $_POST['worker_id'];

$sql = "UPDATE band SET contactPerson_id = $worker_id WHERE band_id = $band_id;";

if(mysqli_query($conn, $sql)) {
    header("Location: ../admin.php?assign=succeed");
} else {
    header("Location: ../admin.php?assign=failed");
}

mysqli_close($conn);
?>