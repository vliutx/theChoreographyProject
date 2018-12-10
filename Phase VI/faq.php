<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	  <title>About Us</title>

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
    <script type="text/javascript" src="js/logout.js"></script>
  </head>

  <body>
  	<!-- Navigation -->
    <nav class="navbar navbar-light bg-light static-top">
      <div class="container">
        <a class="navbar-brand" href="home.php">Home</a>
        <a class="navbar-brand" href="">About</a>
        <a class="navbar-brand" href="contact.php">Contact</a>
<?php

session_start();

if (isset($_SESSION['user'])){
  print "<a class='navbar-brand' href='new.php'>New Listing</a><a class='btn btn-primary' href='php/logout.php' onclick='return log();'>Logout</a>";
}
else{
  print "<a class='navbar-brand' href='login.php'>Sign In</a><a class='btn btn-primary' href='register.php'>Register</a>";
}

?>
      </div>
    </nav>

    <!-- Image Showcases -->
    <section class="showcase">
      <div class="container-fluid p-0">
      	<div class="row no-gutters">
          <div class="col-lg-6 my-auto bg-secondary text-white showcase-text">
            <h2>Where do y'all get all of your listings?</h2>
          </div>
          <div class="col-lg-6 my-auto showcase-text text-secondary">
            <p class="lead mb-0">Our online choreography library is entirely made up of user submissions!</p>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6 my-auto bg-secondary text-white showcase-text">
            <h2>What is a Youtube ID?</h2>
          </div>
          <div class="col-lg-6 my-auto showcase-text text-secondary">
            <p class="lead mb-0">A Youtube ID is a unique, 11 character identifier given to every video on Youtube, usually following "watch?v=" in the URL. This ID only contains alphanumeric characters and the "-" and "_" characters.</p>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6 my-auto bg-secondary text-white showcase-text">
            <h2>Why is my video unavailable when I click play?</h2>
          </div>
          <div class="col-lg-6 my-auto showcase-text text-secondary">
            <p class="lead mb-0">This could be caused by a variety of reasons. When videos are uploaded to youtube, there is an option to disable embed playback. Additionally, some content is copyrighted and can only be played back on the Youtube website.</p>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6 my-auto bg-secondary text-white showcase-text">
            <h2>I accidentally listed something wrong, what can I do?</h2>
          </div>
          <div class="col-lg-6 my-auto showcase-text text-secondary">
            <p class="lead mb-0">We currently don't have an update or delete feature on the website, but send us an e-mail through our contact page! Let us know what's up and we'll do what we can.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Call to Action -->
    <section class="call-to-action text-white text-center" style="height: 20px;">
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
                <a href="">FAQ</a>
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

?>