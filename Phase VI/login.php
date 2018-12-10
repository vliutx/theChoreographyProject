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
	
	<title>Log In</title>
    
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
    <!-- Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- Bootstrap core JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS-->
    <script type="text/javascript" src="js/process.js"></script>
  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-light bg-light static-top">
      <div class="container">
        <a class="navbar-brand" href="home.php">Home</a>
        <a class="navbar-brand" href="about.php">About</a>
        <a class="navbar-brand" href="contact.php">Contact</a>
        <a class="navbar-brand" href="">Sign In</a>
        <a class="btn btn-primary" href="register.php">Register</a>
      </div>
    </nav>

    <!-- Form -->
  	<section class="call-to-action text-center text-white bg-light">
  	  <div class="overlay"></div>
  	  <div class="container">
  		<div class="row no-gutters">
  		  <div class="col-lg-12 my-auto showcase-text">
  			<h2>Sign in to your Account</h2>
  			<br>
  			<form method="post" action="login.php" onsubmit="callServer1(event);">
  			  <div class="form-row" style="justify-content: center;">
  				<div class="col-12 col-md-9 mb-2 mb-md-0">
  				  <input type="text" name="user" id="user" class="form-control form-control-lg" placeholder="Username" required>
  				</div>
  			  </div>
  			  <br>
  			  <div class="form-row" style="justify-content: center;">
  				<div class="col-12 col-md-9 mb-2 mb-md-0">
  				  <input type="password" name="pass" id="pass" class="form-control form-control-lg" placeholder="Password" required>
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
          <div class="col-lg-12 h-100 text-center text-lg-center my-auto">
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
                <a href="faq.php">FAQ</a>
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
