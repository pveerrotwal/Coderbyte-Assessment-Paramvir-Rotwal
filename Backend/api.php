<?php

include("db.php");



// API for signup

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {

    $username = $_POST["username"];

    $password = $_POST["password"];



    // Check if the username already exists

    $checkQuery = "SELECT * FROM users WHERE username = '$username'";

    $result = $conn->query($checkQuery);



    if ($result->num_rows > 0) {

        // Username already exists, return an error

        http_response_code(400);

        echo json_encode(["error" => "Username already exists"]);

    } else {

        // Insert user into the database

        $insertQuery = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

        $conn->query($insertQuery);

        echo json_encode(["message" => "Signup successful"]);

    }

}



// API for login

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {

    $username = $_POST["username"];

    $password = $_POST["password"];



    // Check if the provided credentials are valid

    $loginQuery = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

    $result = $conn->query($loginQuery);



    if ($result->num_rows > 0) {

        // Valid login, create a session (you might use sessions or JWT tokens)

        echo json_encode(["message" => "Login successful"]);

    } else {

        // Invalid login, return an error

        http_response_code(401);

        echo json_encode(["error" => "Invalid credentials"]);

    }

}



// API for terminating session

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["logout"])) {

    // Implement session termination logic here

    echo json_encode(["message" => "Logout successful"]);

}



// API for generating a random ID

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["generateID"])) {

    // Implement random ID generation logic here

    echo json_encode(["randomID" => generateRandomID()]);

}



// API for fetching data for the table

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["getData"])) {

    // Implement logic to fetch data for the table here

    $data = fetchDataForTable();

    echo json_encode($data);

}



$conn->close();



// Helper function to generate a random ID

function generateRandomID() {

    // Implement your random ID generation logic here

    return bin2hex(random_bytes(16));

}



// Helper function to fetch data for the table

function fetchDataForTable() {

    // Implement your logic to fetch data for the table here

    // You might want to fetch the data from the database

    return [];

}

?>