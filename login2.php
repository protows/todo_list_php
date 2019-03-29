<?php

if (isset($_POST['login']) && $_POST['login'] == "admin" && $_POST['password'] == "123" ){
	session_destroy();
	//session_start();
$_SESSION['user_id'] = 2;
header('Location: list.php');



} else{
	echo "login or password is invalid";
}

?>