<?php
ob_start();
session_start();
include("./connection.php");
$id_cart = $_GET['id'];
unset($_SESSION['cart'][$id_cart]);
header('location: index.php?page=cart_giohang');
?>