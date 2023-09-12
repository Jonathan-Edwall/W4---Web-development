<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "movie_database";

// Create connection
$link = mysqli_connect($servername, $username, $password, $dbname);

// Check if connection is established
if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from POST request
$id = $_POST['id'];
$mname = $_POST['mname'];
$myear = $_POST['myear'];
$mgenreid = $_POST['mgenreid'];
$mrating = $_POST['mrating'];

if ($mrating  <=5 and $mrating  >=1 ) {
    //continue
} else {
    die("Error: " . $mrating . " not in range 1-5. Try again." ); // bad way of solving?
} 

$sql_duplicate_check = "SELECT movies.mname FROM movies";

$namelist = $link->query($sql_duplicate_check);



// Check for duplicate entries
$isDuplicate = false;
while ($row = $namelist->fetch_assoc()) {
    if ($row['mname'] === $mname) {
        $isDuplicate = true;
        break;
    }
}

if ($isDuplicate) {
    die("Error: " . $mname . " already in database!");
}









// movies
$sql = "INSERT INTO movies(mname, myear, mrating, mgenreid) VALUES (?, ?, ?, ?)"; 
$stmt = $link->prepare($sql); // Prepare: prepare user input in a way that u cannot delete for instance the database --- ITS A SECURITY MEASURE
// s for string
$stmt->bind_param("ssii", $mname,$myear,$mrating,$mgenreid); // all s?
$result = $stmt->execute();


if ($result) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the database connection
$link->close();
?>


