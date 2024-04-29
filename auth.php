<?php
session_start();
include 'db.php'; // Ensure this path correctly points to your database connection script

// Determine action type: login or signup
$action = $_POST['action'] ?? '';

switch ($action) {
    case 'login':
        $username = $_POST['username'];
        $password = $_POST['password'];

        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);

        // Assuming the password in the database is hashed
        $query = "SELECT * FROM users WHERE email='$username'";
        $result = mysqli_query($conn, $query);
        if ($user = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['login_user'] = $username; // Initialize session
                header("Location: home.html"); // Redirect to home page
            } else {
                header("Location: invalid_auth.php"); // Redirect to invalid login page
            }
        } else {
            header("Location: invalid_auth.php"); // Redirect to invalid login page
        }
        break;
    
    case 'signup':
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if ($password !== $confirm_password) {
            echo "Passwords do not match.";
            exit;
        }

        $name = mysqli_real_escape_string($conn, $name);
        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, password_hash($password, PASSWORD_DEFAULT));

        // Insert into database
        $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$username', '$password')";
        if (mysqli_query($conn, $query)) {
            header("Location: login.html"); // Redirect to login page after successful registration
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        break;
    
    default:
        // Redirect to home or error page
        header("Location: error.html");
        break;
}

mysqli_close($conn);
?>
