<?php
include_once 'includes/dbc.inc.php';

$band_id = $_GET['bandid'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="css/bandinfo.css">
</head>

<body>
    <?php
    $query = "SELECT * FROM band WHERE band_id = $band_id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
    ?>

    <div class="header">
        <?php
        echo '<h1>' . $row['name'] . '</h1>';
        ?>
    </div>

    <div class="main-content">
        <?php echo '<p>Country: ' . $row['country'] . '</p>' ?>
        <?php echo '<p id="info">' . $row['info'] . '</p>' ?>

        <h2>Band members</h3>

            <?php
            $query = "SELECT member.name, member.info 
                FROM member 
                LEFT JOIN bandMember ON (member.member_id = bandMember.member_id) 
                LEFT JOIN band ON (bandMember.band_id = band.band_id)
                WHERE band.band_id = $band_id;";

            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                ?>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Information</th>
                    </tr>
                <?php
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['info'] . '</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                }
                ?>
    </div>
</body>

</html>