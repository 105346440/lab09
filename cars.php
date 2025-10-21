<?php
require_once "settings.php";

$dbconn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$dbconn) {
    echo "<p>Unable to connect to the db.</p>";
    exit;
}

$query = "SELECT * FROM cars";
$results = mysqli_query($dbconn, $query);

if ($results && mysqli_num_rows($results) > 0) {
    echo "<h2>Car Listings</h2>";
    echo "<table border='1' cellpadding='8' cellspacing='0'>";
    echo "<tr><th>ID</th><th>Make</th><th>Model</th><th>Price</th><th>Year</th></tr>";

    while ($row = mysqli_fetch_assoc($results)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['car_id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['make']) . "</td>";
        echo "<td>" . htmlspecialchars($row['model']) . "</td>";
        echo "<td>" . htmlspecialchars($row['price']) . "</td>";
        echo "<td>" . htmlspecialchars($row['yom']) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>There are no cars to display.</p>";
}

mysqli_close($dbconn);
?>
