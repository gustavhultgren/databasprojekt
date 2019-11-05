<?php
include_once 'includes/dbc.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="css/admin.css">
</head>

<body>
    <h1>Admin page</h1>

    <div class="succeedOrFailedMessage">
        <?php
        if (isset($_GET['booking'])) {
            if ($_GET['booking'] == 'succeed') {
                echo '<p id="p-succeed">The booking was SUCCESSFUL.</p>';
            } else if ($_GET['booking'] == 'failed') {
                echo '<p id="p-failed">The booking was FAILED.</p>';
            }
        } else if (isset($_GET['scheduling'])) {
            if ($_GET['scheduling'] == 'succeed') {
                echo '<p id="p-succeed">The scheduling was SUCCESSFUL.</p>';
            } else if ($_GET['scheduling'] == 'failed') {
                echo '<p id="p-failed">The scheduling was FAILED.</p>';
            }
        } else if (isset($_GET['assign'])) {
            if ($_GET['assign'] == 'succeed') {
                echo '<p id="p-succeed">The assignment was SUCCESSFUL.</p>';
            } else if ($_GET['assign'] == 'failed') {
                echo '<p id="p-failed">The assignment was FAILED.</a>';
            }
        }
        ?>
    </div>


    <p>Choose to book a band, schedule a band or assign a contact person.</p>

    <button onclick="showOrHideBookingContent()">Book a band</button>

    <div id="booking-content" style="display: none;">
        <form action="includes/booking.inc.php" method="POST">
            <ul>
                <li><input type="text" name="band_name" placeholder="Band name" autocomplete="off"></li>
                <li><input type="text" name="country" placeholder="Country" autocomplete="off"></li>
                <li><input type="text" name="contact_personId" placeholder="Contact Person ID" autocomplete="off"></li>
                <li><input type="text" name="band_information" placeholder="Information" autocomplete="off"></li>
                <li><input type="submit" value="Book"></li>
            </ul>
        </form>
    </div>

    <br>

    <button onclick="showOrHideSchedulingContent()">Schedule a band</button>

    <div id="scheduling-content" style="display: none;">
        <form action="includes/scheduling.inc.php" method="POST">
            <ul>
                <li><input type="text" name="band_id" placeholder="Band ID" autocomplete="off"></li>
                <li><select name="scene_id" id="">
                        <option value="1">Large Mallorca Scene</option>
                        <option value="2">Tiny Diesel Tent</option>
                        <option value="3">Tallriken</option>
                        <option value="4">Hard Rock Hallelujah</option>
                    </select></li>
                <li><input type="text" name="start_time" placeholder="Start Time" autocomplete="off"></li>
                <li><input type="text" name="end_time" placeholder="End Time" autocomplete="off"></li>
                <li><input type="submit" value="Schedule"></li>
            </ul>
        </form>

        <?php
        $query = "SELECT band_id, name FROM band;";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Band name</th>
                </tr>
            <?php
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['band_id'] . '</td>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '</tr>';
                }

                echo '</table>';
            }
            ?>
    </div>

    <br>

    <button onclick="showOrHideAssignContent()">Assign contact person</button>

    <div id="assign-content" style="display: none;">
        <form action="includes/assigning.inc.php" method="POST">
            <ul>
                <li><input type="text" name="band_id" placeholder="Band ID" autocomplete="off"></li>
                <li><input type="text" name="worker_id" placeholder="Worker ID/Contact Person" autocomplete="off"></li>
                <li><input type="submit" value="Assign contact person"></li>
            </ul>
        </form>

        <?php
        $query = "SELECT worker_id, first_name, last_name FROM workers;";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>F. Name</th>
                    <th>L. Name</th>
                </tr>
            <?php
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['worker_id'] . '</td>';
                    echo '<td>' . $row['first_name'] . '</td>';
                    echo '<td>' . $row['last_name'] . '</td>';
                    echo '</tr>';
                }

                echo '</table>';
            }
            ?>
    </div>

    <script>
        function showOrHideBookingContent() {
            var x = document.getElementById("booking-content");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function showOrHideSchedulingContent() {
            var x = document.getElementById("scheduling-content");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function showOrHideAssignContent() {
            var x = document.getElementById("assign-content");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
</body>

</html>