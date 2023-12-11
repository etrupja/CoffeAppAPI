<?php

require 'Models/Order.php';
require 'Models/User.php';
require 'Services/OrdersService.php';

use Models\Order;
use Models\User;
use Services\OrdersService;

$newOrder = new Order(1, "New Order", "asd", "asd");
echo $newOrder->getTitle() . "<br>";
echo $newOrder->id . "<br>";


$newUser = new User(2, "John", "Doe", "etrupja@gmail.com", "123456");
echo $newUser->firstName . "<br>";
echo $newUser->id . "<br>";


$orders = new OrdersService();
$orders->getAllOrders(); // This should trigger an error if not implemented.


// class Student{
//     public $firstName;
//     public $lastName;
//     public $studentId;

//     function __construct($firstName, $lastName, $studentId){
//         $this->firstName = $firstName;
//         $this->lastName = $lastName;
//         $this->studentId = $studentId;
//     }
// }

// class StudentWithoutContructor{
//     public $firstName;
//     public $lastName;
//     public $studentId;
// }


// $newStudent = new Student("John", "Doe", 123456);
// echo $newStudent->firstName . "<br>";

// $newStudentWithoutContructor = new StudentWithoutContructor();
// $newStudentWithoutContructor->firstName = "John";
// $newStudentWithoutContructor->lastName = "Doe";
// $newStudentWithoutContructor->studentId = 123456;
// echo $newStudentWithoutContructor->firstName . "<br>";







?>