<?php 
ob_start();
session_start();
include("./connection.php");

    // echo json_encode($_SESSION['cart']);
    $id_cart = $_GET['id_cart'];
    $quantity = $_GET['quantity'];
    $_SESSION['cart'][$id_cart]['quatity'] = $quantity;
    // $data = array();
    // $data['quantity_pro'] = $quantity;
    // $data['pro_id'] = $pro_id; 
    // echo json_encode($data);
?>