<?php

print <<<HEADER
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title>Log In</title>
    
	<!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="css/all.min.css" rel="stylesheet">
    <link href="css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/landing-page.min.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-light bg-light static-top">
      <div class="container">
        <a class="navbar-brand" href="home.php">Home</a>
        <a class="navbar-brand" href="about.php">About</a>
        <a class="navbar-brand" href="contact.php">Contact</a>
        <a class="btn btn-secondary" href="register.php">Register</a>
        <a class="btn btn-primary" href="">Sign In</a>
      </div>
    </nav>
HEADER;

print <<<FORM
	<section class="call-to-action text-center text-white bg-light">
		  <div class="overlay"></div>
		  <div class="container">
			<div class="row no-gutters">
			  <div class="col-lg-12 my-auto showcase-text">
				<h2>Sign in to your Account</h2>
				<br>
				<form method="post" action="login.php">
				  <div class="form-row" style="justify-content: center;">
					<div class="col-12 col-md-9 mb-2 mb-md-0">
					  <input type="text" name="user" class="form-control form-control-lg" placeholder="Username">
					</div>
				  </div>
				  <br>
				  <div class="form-row" style="justify-content: center;">
					<div class="col-12 col-md-9 mb-2 mb-md-0">
					  <input type="password" name="pass" class="form-control form-control-lg" placeholder="Password">
					</div>
				  </div>
				  <br>
				  <div class="form-row" style="justify-content: center;">
					<div class="col-12 col-md-9 mb-2 mb-md-0">
					  <button type="submit" id="submit" name="submit" class="btn btn-block btn-lg btn-primary">Login</button>
					</div>
				  </div>
				</form>
			  </div>
			</div>
		  </div>
		</section>
		
		<!-- Call to Action -->
		<section class="call-to-action2 text-white text-center" style="height: 20px;">
		  <div class="overlay"></div>
		</section>

		<!-- Footer -->
		<footer class="footer bg-light">
		  <div class="container">
			<div class="row">
			  <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
				<ul class="list-inline mb-2">
				  <li class="list-inline-item">
					<a href="about.html">About</a>
				  </li>
				  <li class="list-inline-item">&sdot;</li>
				  <li class="list-inline-item">
					<a href="contact.html">Contact</a>
				  </li>
				  <li class="list-inline-item">&sdot;</li>
				  <li class="list-inline-item">
					<a href="#">Terms of Use</a>
				  </li>
				  <li class="list-inline-item">&sdot;</li>
				  <li class="list-inline-item">
					<a href="#">Privacy Policy</a>
				  </li>
				</ul>
				<br>
				<p class="text-muted small mb-4 mb-lg-0">&copy; TCP 2018. All Rights Reserved.</p>
			  </div>
			</div>
		  </div>
		</footer>
FORM;
	
if (isset($_POST['submit'])) {
	
	
	if (isset($_POST["user"]) && isset($_POST["pass"])) {	


		// Get values submitted from the login form
		$username = $_POST["user"];
		$password = $_POST["pass"];
		
		// Load list of registered usernames and passwords
		$list = loadUsers();
		
		// Verify that username and password are valid
		$found = FALSE;
		foreach ($list as $regUser => $regPass) {
		
			// Verify that username exists
			if ($username == $regUser) {
				$found = TRUE;
				
				// Verify that password is correct
				// If password is correct, start session and redirect to home page
				if ($password == $regPass) {
					echo "<script>alert('Thank you! Login successful.')</script>";
					session_start();
					$_SESSION['user'] = $username;
					header("Location: home.php");
					die;
				}
				
				// If password is incorrect, display error message
				// Prompts login form again
				else {
					echo "<script>alert('Incorrect password. Please try again.')</script>";
				}
			}
		}
		
		// If username does not exist, display error message
		// Prompts login form again
		if (!$found) {
			echo "<script>alert('Username does not exist. Please try again.')</script>";
		}

	}
}

print <<<FOOTER
</body>
</html>
FOOTER;


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