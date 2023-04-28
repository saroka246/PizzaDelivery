<?php
session_start();


require_once "db.php";
require_once "functions.php";


if ( isset($_POST['delete_id']) && isset($_SESSION['cart_list']) ) {
	foreach ($_SESSION['cart_list'] as $key => $value) {
		if ( $value['id'] == $_POST['delete_id'] ) {
			unset($_SESSION['cart_list'][$key]);
		}		
	}
    
    echo count($_SESSION['cart_list']);
}