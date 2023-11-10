<?php
session_start();

function isAuthenticated() {
    return isset($_SESSION["username"]);
}

function authenticateUser($username, $password) {
    include('db.php');

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $_SESSION["username"] = $username;
        return true;
    } else {
        return false;
    }
}

function destroySession() {
    session_destroy();
}
?>
