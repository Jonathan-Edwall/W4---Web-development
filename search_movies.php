<form action="search_movies.php" method="POST">
    Search:<input type="text" name="search_query">
    <input type="submit" value="Go">
</form>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "things";
$search_query = $_POST['search_query']; // get query from somewhere

// Create connection
$link = mysqli_connect($servername, $username, $password, $dbname); 

if (mysqli_connect_error()) { 
    die("Connection failed: " . mysqli_connect_error());  
}

/// 

// Fetch data from GET request, search
$mname = $_GET['mname'];



echo '<table><tr><th>Name</th><th></th><th>Year</th><th></th><th>Genre</th><th></th><th>Rating</th></tr>';

$sql = "SELECT movies.mname, movies.myear, movies.mrating, genres.mgenre
FROM movies
LEFT JOIN genres ON movies.mgenreid = genres.gid
WHERE movies.mname LIKE '%$search_query%'";


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
