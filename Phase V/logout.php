<?php

session_start();
session_destroy();

if (isset($_COOKIE['last'])){
	header('Location: ' . $_COOKIE['last']);
}
else{
	header('Location: home.php');
}
die();

?>
