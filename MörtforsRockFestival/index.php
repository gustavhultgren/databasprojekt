<?php
include_once 'includes/dbc.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mörtfors Rock Festival</title>

    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div class="header">
        <h1>Mörtfors Rock Festival</h1>
        <?php
        $query = "SELECT start_date, end_date, capacity FROM festival;";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo 'Start: ' . $row['start_date'] . '';
                echo '<br>';
                echo 'End: ' . $row['end_date'] . '';
                echo '<br>';
                echo 'Capacity: ' . $row['capacity'] . '';
            }
        }
        ?>
    </div>

    <div class="main-content">
        <p>Click below to view the whole festival scheme including what band plays at what scene at what time.</p>

        <a href="festivalschedule.php">See Lineup</a>
    </div>

    <div class="footer">
        <p>Developed by <strong>Gustav Hultgren</strong> & <strong>Viktor Werngren</strong></p>
    </div>
</body>

</html>