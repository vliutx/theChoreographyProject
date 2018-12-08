<?php

	$users = Array();
	$passes = Array();

	$con = mysqli_connect("fall-2018.cs.utexas.edu","cs329e_mitra_tls3375","walk6butter9cliff","cs329e_mitra_tls3375");
	$users_SQL = mysqli_query($con, "SELECT username FROM users");
	$passes_SQL = mysqli_query($con, "SELECT password FROM users");

	while ( $row = mysqli_fetch_array($users_SQL, MYSQL_ASSOC) ) {

	  $users[] = $row['username'];

	}
	while ( $row = mysqli_fetch_array($passes_SQL, MYSQL_ASSOC) ) {

	  $passes[] = $row['password'];

	}
		
	mysqli_close($con);
	$list = array_combine($users, $passes);
	
	echo "$users[0]";


?>