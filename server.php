<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json_data = file_get_contents('php://input');
    if (!empty($json_data)) {
        file_put_contents('data.json', $json_data . "\n", FILE_APPEND);
        echo json_encode(["status" => "success"]);
    }
} else {
    // Serve index.html for GET requests
    if (file_exists('index.html')) {
        echo file_get_contents('index.html');
    }
}
?>
