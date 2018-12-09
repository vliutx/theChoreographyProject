<?php

$username = trim($_POST['user']);
$password = trim($_POST['pass']);
$page = $_POST['page'];

$list = loadUsers();

if ($page == "login")
	if (array_key_exists($username, $list)){
		if ($list[$username] == $password){
			session_start();
			$_SESSION['user'] = $username;
			echo "true";
		}
		else{
			echo "pass";
		}
	}
	else{
		echo "user";
	}
elseif ($page == "register"){
	if (array_key_exists($username, $list)){
		echo "user";
	}
	else{
		$con = mysqli_connect("fall-2018.cs.utexas.edu","cs329e_mitra_tls3375","walk6butter9cliff","cs329e_mitra_tls3375");
		$sql = "INSERT INTO users (username, password) VALUES ('$username','$password')";
		mysqli_query($con, $sql);
		mysqli_close($con);
		echo "true";
	}
}

function loadUsers() {
	$users = Array();
	$passes = Array();

	$con = mysqli_connect("fall-2018.cs.utexas.edu","cs329e_mitra_tls3375","walk6butter9cliff","cs329e_mitra_tls3375");
	$users_SQL = mysqli_query($con, "SELECT username FROM users");
	$passes_SQL = mysqli_query($con, "SELECT password FROM users");

	while ( $row = mysqli_fetch_assoc($users_SQL) ) {

	  $users[] = $row['username'];

	}
	while ( $row = mysqli_fetch_assoc($passes_SQL) ) {

	  $passes[] = $row['password'];

	}
		
	mysqli_close($con);
	$list = array_combine($users, $passes);
	return $list;
}

?>