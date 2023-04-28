<?php



include "db.php";

session_start();
$param = json_decode($_REQUEST['param']);

$name = $param->name;
$phone = $param->phone;
$address = $param->address;
$details = $param->details;
$price = $param->price;

if ( isset($phone) ) {
    $sql = "INSERT INTO orders (name, phone, address, details, price) VALUES ('$name', '$phone', '$address', '$details', '$price')";
	if ($mysqli -> query($sql)) {
        unset($_SESSION['cart_list']);
        echo "success";
    } else {
        echo $mysqli -> connect_error;
    }
}