<?php

session_start();
session_destroy();

if (isset($_COOKIE['last'])){
	if ($_COOKIE['last'] != "https://fall-2018.cs.utexas.edu/cs329e-mitra/vl5649/project/phase5/new.php"){
		header('Location: ' . $_COOKIE['last']);
	}
	else{
		header('Location: home.php');
	}
}
else{
	header('Location: home.php');
}
die();

?>
