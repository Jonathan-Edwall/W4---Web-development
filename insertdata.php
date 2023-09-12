<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "things";

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

$namelist= $link->query("SELECT movies.mname FROM movies")

//no double 
if ( in_array($mname, $namelist) ) {
    die("Error: " . $mname . " allready in database!" ); // bad way of solving?
} 


// movies
$sql = "INSERT INTO movies (mname, myear, mrating, mgenreid) VALUES (?, ?, ?, ?)"; 
$stmt = $link->prepare($sql);
// s for string
$stmt->bind_param("ssis", $mname,$myear,$mrating,$mgenreid); // all s?
$result = $stmt->execute();


if ($result) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the database connection
$link->close();
?>

// <!-- Vi ska ta unique value på mgenre från genres table -->
