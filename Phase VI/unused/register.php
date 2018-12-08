<?php

session_start();

if (isset($_SESSION['user'])){
	header('Location: home.php');
	die();
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title>Registration Page</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png">
	<!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="css/all.min.css" rel="stylesheet">
    <link href="css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template -->
    <link href="css/landing-page.min.css" rel="stylesheet">
	<!-- Bootstrap core JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
	<script type="text/javascript" src="js/register.js"></script>
  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-light bg-light static-top">
      <div class="container">
        <a class="navbar-brand" href="home.php">Home</a>
        <a class="navbar-brand" href="about.php">About</a>
        <a class="navbar-brand" href="contact.php">Contact</a>
        <a class="navbar-brand" href="login.php">Sign In</a>
        <a class="btn btn-primary" href="">Register</a>
      </div>
    </nav>

    <!-- Form -->
    <section class="call-to-action text-center text-white bg-light">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters">
          <div class="col-lg-12 my-auto showcase-text">
            <h2>Register a New Account</h2>
            <br>
	        <form method="post" action="register.php" onsubmit="return validate()">
			  <div class="form-row" style="justify-content: center;">
				<div class="col-12 col-md-9 mb-2 mb-md-0">
				  <input type="text" class="form-control form-control-lg" id="user" name="user" placeholder="Username">
				</div>
			  </div>
			  <br>
			  <div class="form-row" style="justify-content: center;">
				<div class="col-12 col-md-9 mb-2 mb-md-0">
			      <input type="password" class="form-control form-control-lg" id="pass" name="pass" placeholder="Password">
				</div>
			  </div>
			  <br>
			  <div class="form-row" style="justify-content: center;">
				<div class="col-12 col-md-9 mb-2 mb-md-0">
				  <input type="password" class="form-control form-control-lg" id="pass2" name="pass2" placeholder="Re-enter Password">
				</div>
			  </div>
			  <br>
			  <div class="form-row" style="justify-content: center;">
				<div class="col-12 col-md-9 mb-2 mb-md-0">
				  <button type="submit" id="submit" name="submit" class="btn btn-block btn-lg btn-primary">Register</button>
				</div>
			  </div>
	        </form>
          </div>
        </div>
      </div>
    </section>

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
                <a href="about.php">About</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="contact.php">Contact</a>
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

  </body>
</html>

<?php
	
if (isset($_POST['submit'])) {
	
	
	if (isset($_POST["user"]) && isset($_POST["pass"]) && isset($_POST["pass2"])) {	


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
			echo "<script>alert('Username already registered. Please try again.')</script>";
		}
		
		// If username is available, append to list of users/passwords
		// Redirects back to home page
		else {
			
			// add new user/pass combo to SQL database
			$con = mysqli_connect("fall-2018.cs.utexas.edu","cs329e_mitra_tls3375","walk6butter9cliff","cs329e_mitra_tls3375");
			$sql = "INSERT INTO users (username, password) VALUES ('$username','$password')";
			mysqli_query($con, $sql);
			mysqli_close($con);
			echo "<script>alert('Thank you! Account successfully registered.')</script>";
			
			// Start session and redirect to home page
			session_start();
			$_SESSION['user'] = $username;
			header("Location: home.php");
			die;
		}
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
