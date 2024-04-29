<?php
$dbhost = 'localhost'; // Host name
$dbuser = 'root';      // Username
$dbpass = '';          // Password
$dbname = 'users'; // Database name

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die('Could not connect: ' . mysqli_connect_error());
}
?>
