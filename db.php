<link rel="stylesheet" href="css/style.css">


<?php
$host = "localhost";
$user = "root";
$pass = ""; // Your DB password
$dbname = "fabrication_db";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
