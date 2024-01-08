<?php

// Allow requests from specific origins
header('Access-Control-Allow-Origin: *');

// Handle preflight requests for CORS
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Authorization');
    exit(0);
}

// Array of orders
// $orders = [
//     ['id' => 1, 'fullName' => 'Product 1', 'email' => 'order@email.com', 'description' => 'Description 1'],
//     ['id' => 2, 'fullName' => 'Product 2', 'email' => 'order@email.com', 'description' => 'Description 2'],
// ];

// File to store orders
$file = 'orders.json';
// Read existing orders from file
$orders = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

header('Content-Type:application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode($orders);
} elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
    $json_str = file_get_contents('php://input');
    $json_obj = json_decode($json_str);

    // Basic validation
    if (!isset($json_obj->fullName) || !isset($json_obj->email) || !isset($json_obj->description)) {
        http_response_code(400);
        echo json_encode(["message" => "Invalid input, missing parameters"]);
        exit;
    }

    // Add the new order
    $newOrder = [
        'id' => count($orders) + 1,
        'fullName' => htmlspecialchars($json_obj->fullName),
        'email' => htmlspecialchars($json_obj->email),
        'description' => htmlspecialchars($json_obj->description)
    ];
    $orders[] = $newOrder;

    // Save updated orders to file
    file_put_contents($file, json_encode($orders));

    echo json_encode(["message" => "Order added successfully", "order" => $newOrder]);
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $json_str = file_get_contents('php://input');
    $json_obj = json_decode($json_str);
    $id = $json_obj->id;

    $found = false;
    foreach ($orders as &$order) {
        if ($order['id'] == $id) {
            $order['fullName'] = htmlspecialchars($json_obj->fullName);
            $order['email'] = htmlspecialchars($json_obj->email);
            $order['description'] = htmlspecialchars($json_obj->description);
            $found = true;
            break;
        }
    }
    if (!$found) {
        http_response_code(404);
        echo json_encode(["message" => "Order not found"]);
    } else {
        file_put_contents($file, json_encode($orders));
        echo json_encode(["message" => "Order updated successfully"]);
    }
}
// Handle DELETE request
elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $del_vars);
    $id = $del_vars['id'];

    $orders = array_filter($orders, function($order) use ($id) {
        return $order['id'] != $id;
    });

    file_put_contents($file, json_encode(array_values($orders)));
    echo json_encode(["message" => "Order deleted successfully"]);
}else {
    echo 'Request method is not supported!';
}


?>