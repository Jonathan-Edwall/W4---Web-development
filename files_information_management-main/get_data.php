<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "things";

// Create connection
$link = mysqli_connect($servername, $username, $password, $dbname); 

if (mysqli_connect_error()) { 
    die("Connection failed: " . mysqli_connect_error());  
}

echo '<table><tr><th>ID</th><th>Name</th><th>Doman</th><th>Propulsion</th></tr>';

$sql = "SELECT * FROM `animals`";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr> <td>" . $row["ID"] . "</td><td>" . $row["name"] . "</td><td>" . $row["domain"] . "</td><td>" . $row["propulsion"] . "</td></tr>";
    }
} else {
    echo "0 results";
}

echo '</table>';
?>