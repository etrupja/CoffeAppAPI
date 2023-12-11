<?php

namespace Services;

interface IOrdersService {
    function getAllOrders();
    function getOrderById($id);
    function createOrder($order);
    function updateOrder($order);
    function deleteOrder($id);
}

class OrdersService implements IOrdersService {
    function getAllOrders(){
        echo "Get all orders";
    }

    function getOrderById($id){
        echo "Get order by id";
    }

    function createOrder($order){
        echo "Create order";
    }

    function updateOrder($order){
        echo "Update order";
    }

    function deleteOrder($id){
        echo "Delete order";
    }
}
?>