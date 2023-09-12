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

echo '<table><tr><th>Name</th><th></th><th>Year</th><th></th><th>Genre</th><th></th><th>Rating</th></tr>';

$sql = "SELECT movies.mname,movies.myear, movies.mrating, genres.mgenre
FROM movies
LEFT JOIN genres 
ON movies.mgenreid = genres.gid";

$result = $link->query($sql);


if ($result->num_rows > 0) { // more 
    while($row = $result->fetch_assoc()) {
        echo "<tr> <td>" .  $row["mname"] .  "</td><td>" . "</td><td>" . $row["myear"] . "</td><td>" . "</td><td>" . $row["mgenre"] . "</td><td>" . "</td><td>" . $row["mrating"] . "</td></tr>";
    }
} else {
    echo "0 results";
}


echo '</table>';
?>
