<?php

print <<<HEADER
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" title="styling" type="text/css" href="./register.css" media="all">
	<script type="text/javascript" src="js/register.js" defer></script>
</head>
<body>
	<div class="nav">
		<a href="./home.html">Home</a>
		<a href="./about.html">About</a>
		<a href="./contact.html">Contact Us</a>
		<a href="./login.html">Login</a>
		<a href="">Register</a>
	</div>
	<h1>Register a New Account</h1>
HEADER;

if (isset($_POST['submit'])){
	
	<script src="js/register.js"></script>
	$invalid = $_GET["invalid"];
	
	if ($invalid == 0) {
		
		if (isset($_POST["user"]) && isset($_POST["pass"])) {
		
		// Get values submitted from the login form
		$username = $_POST["user"];
		$password = $_POST["pass"];
		
		// Load list of registered usernames and passwords
		$list = loadUsers();
		
		// Verify that username is not taken
		$found = FALSE;
		foreach ($list as $regUser => $regPass) {
			if ($username == $regUser) {
				$found = TRUE;
			}
		}
		
		// If duplicate username is found, display error message
		// Prompts registration form again
		if ($found == TRUE) {
			echo "<p>Username already registered, try again.</p>";
		}
		
		// If username is available, append to list of users/passwords
		// Redirects back to home page
		else {
			
			// add new user/pass combo to SQL database
			$con = mysqli_connect("fall-2018.cs.utexas.edu","cs329e_mitra_tls3375","walk6butter9cliff","cs329e_mitra_tls3375");
			$sql = "INSERT INTO users (username, password) VALUES ('username','$password')";
			mysqli_query($con, $sql);
			mysqli_close($con);
			echo "<script>
			alert('Thank you, 1 student record added.');
			</script>";
			
			// Set cookie and redirect to home page
			setcookie("user", $username);
			header("Location: home.html");
			die;
	}
	
}
	}
	else {
		echo "<p>Invalid input. Please check rules and try again.</p>";
	}
}

print <<<FORM
	<div class="register">
		<form id="credentials" method="POST">
			<label for="user">User Name:</label><br>
			<input type="text" name="user" id="user">
			<br><br>
			<label for="pass">Password:</label><br>
			<input type="password" name="pass" id="pass">
			<br><br>
			<label for="pass2">Repeat Password:</label><br>
			<input type="password" name="pass2" id="pass2">
			<br><br>
			<input type="submit" name="Submit">
			<input type="reset" name="Clear">
		</form>
	</div>

	<div class="rules">
		<h2>Registration Criteria:</h2>
		<ul>
			<li> The user name must be between 6 and 10 characters long</li>
			<li> The user name must contain only letters and digits</li>
			<li> The user name cannot begin with a digit</li>
			<li> The password must be between 6 and 10 characters long</li>
			<li> The password must contain only letters and digits</li>
			<li> The password must have at least one lower case letter, at least one upper case letter, and at least one digit</li>
		</ul>
	</div>
</body>
</html>
FORM;

function loadUsers() {
	$users = array();
	$passes = array();
	$i = 0;

	$con = mysqli_connect("fall-2018.cs.utexas.edu","cs329e_mitra_tls3375","walk6butter9cliff","cs329e_mitra_tls3375");
	$users_SQL = mysql_query("SELECT username FROM users");
	$passes_SQL = mysql_query("SELECT password FROM users");

	while ( $row = mysql_fetch_assoc($users_SQL) ) {

	  $users[] = $row['username'];

	}
	while ( $row = mysql_fetch_assoc($passes_SQL) ) {

	  $passes[] = $row['password'];

	}
		
	mysqli_close($con);
	$list = array_combine($users, $passes);
	return $list;
}

?>