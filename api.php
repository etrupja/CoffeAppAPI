<?php

// Database configuration
$host = 'localhost';
$db   = 'orders_db';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

// PDO (PHP Data Objects) connection
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Allow requests from specific origins
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Handle preflight requests for CORS
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Authorization');
    exit(0);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $pdo->query('SELECT * FROM orders');
    echo json_encode($stmt->fetchAll());
} elseif($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json_str = file_get_contents('php://input');
    $json_obj = json_decode($json_str);

    // Basic validation
    if (!isset($json_obj->fullName) || !isset($json_obj->email) || !isset($json_obj->description)) {
        http_response_code(400);
        echo json_encode(["message" => "Invalid input, missing parameters"]);
        exit;
    }

    // Add the new order
    $stmt = $pdo->prepare('INSERT INTO orders (fullName, email, description) VALUES (?, ?, ?)');
    $stmt->execute([
        htmlspecialchars($json_obj->fullName),
        htmlspecialchars($json_obj->email),
        htmlspecialchars($json_obj->description)
    ]);
    $newOrderId = $pdo->lastInsertId();
    
    echo json_encode(["message" => "Order added successfully", "order" => ["id" => $newOrderId, "fullName" => $json_obj->fullName, "email" => $json_obj->email, "description" => $json_obj->description]]);
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // ... [PUT method implementation]
}
// ... [DELETE method implementation]

else {
    echo 'Request method is not supported!';
}

?>
