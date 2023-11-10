<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $checkQuery = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        $response = [
            "status" => "error",
            "message" => "Username already exists"
        ];
        http_response_code(400);
    } else {
        $insertQuery = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        $conn->query($insertQuery);

        $response = [
            "status" => "success",
            "message" => "User registered successfully"
        ];
        http_response_code(200);
    }

    echo json_encode($response);
}

$conn->close();
?>
