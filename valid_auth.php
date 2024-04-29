<?php
session_start();
include 'db.php'; // Make sure this path is correct.

$username = $_POST['username'];
$password = $_POST['password'];

// Sanitize input
$username = mysqli_real_escape_string($conn, $username);

$query = "SELECT * FROM users WHERE email='$username'";
$result = mysqli_query($conn, $query);

if ($user = mysqli_fetch_assoc($result)) {
    // Here, $user['password'] should contain the hashed password
    if (password_verify($password, $user['password'])) {
        $_SESSION['login_user'] = $username; // Set session variable
        header("Location: home.html"); // Redirect to home page on success
    } else {
        header("Location: invalid_auth.php"); // If password doesn't match
    }
} else {
    header("Location: invalid_auth.php"); // If user does not exist
}
?>
