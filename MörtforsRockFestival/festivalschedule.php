<?php
include_once 'includes/dbc.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mörtfors Rock Festival - Schedule</title>

    <link rel="stylesheet" type="text/css" href="css/festivalschedule.css">
</head>

<body>
    <div class="header">
        <h1>Festival Schedule</h1>
    </div>

    <div class="main-content">
        <?php
        // Select data from table band, schedule and scenes.
        $query = "SELECT band.band_id, band.name, scenes.scene_name, schedule.timeStart, schedule.timeEnd 
                    FROM band
                    LEFT JOIN schedule ON (band.band_id = schedule.band_id)
                    LEFT JOIN scenes ON (scenes.scene_id = schedule.scene_id);";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            ?>
            <table>
                <tr>
                    <th>Band</th>
                    <th>Scene</th>
                    <th>Start time</th>
                    <th>End time</th>
                </tr>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                    echo '<td><a href="bandinfo.php?bandid='.$row['band_id'].'">'.$row['name'].'</a></td>';
                    echo '<td>'.$row['scene_name'].'</td>';
                    echo '<td>'.$row['timeStart'].'</td>';
                    echo '<td>'.$row['timeEnd'].'</td>';
                echo '</tr>';
            }
            echo '</table>';
        }
        ?>
</body>

</html>