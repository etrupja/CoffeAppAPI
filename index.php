<?php

//Include Models namespace
require_once 'Models/Order.php';
require_once 'Models/User.php';

use Models\Order;
use Models\User;

//Use Order to create an object
$order = new Order(1, "John From Models", "john@email.com", "This is a test");
echo $order->name . "<br>";

//User User to create an object
$user = new User(1, "Name", "name@email.com","pswd");
echo $user->name . "<br>";

// class Order {
//     public $id;
//     public $name;
//     public $email;
//     public $description;

//     public function __construct($id, $name, $email, $description){
//         $this->id = $id;
//         $this->name = $name;
//         $this->email = $email;
//         $this->description = $description;
//     }
// }

// class OrderWithoutConstructor {
//     public $id;
//     public $name;
//     public $email;
//     public $description;
// }

// //Use Order to create an object
// $order = new Order(1, "John", "john@epoka.edu.al", "This is a test order");
// echo $order->name . "<br>";

// //Use OrderWithoutConstructor to create an object
// $orderWithoutConstructor = new OrderWithoutConstructor();
// $orderWithoutConstructor->id = 1;
// $orderWithoutConstructor->name = "John";
// $orderWithoutConstructor->email = "john@epoka.edu.al";
// $orderWithoutConstructor->description = "This is a test order";

// echo $orderWithoutConstructor->name . "<br>";

?>