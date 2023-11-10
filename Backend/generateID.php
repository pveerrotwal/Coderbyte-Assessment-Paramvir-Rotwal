<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION["username"])) {
        echo "Unauthorized access";
        http_response_code(401);
        exit();
    }

    $randomID = bin2hex(random_bytes(16));
    $dateTime = date('Y-m-d H:i:s');

    $response = [
        "RandomID" => $randomID,
        "GeneratedDateTime" => $dateTime
    ];

    echo json_encode($response);
    http_response_code(200);
}
?>
