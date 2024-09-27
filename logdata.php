<?php

include "db.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE uname='$username' AND upword='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User found, set session variables and redirect to home page
    $_SESSION['uname'] = $username;
    header("Location: dashboard.php");
    exit();
} else {
    echo "Invalid username or password.";
}

$conn->close();
?>