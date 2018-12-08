<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>The Choreography Project</title>

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
  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-light bg-light static-top">
      <div class="container">
        <a class="navbar-brand" href="home.html">Home</a>
        <a class="navbar-brand" href="#">About</a>
        <a class="navbar-brand" href="contact.html">Contact</a>
<?php

if (isset($_SESSION['user'])){
  print "<a class='navbar-brand' href='new.php'>New Listing</a><button class='btn btn-secondary'>Logout</button>";
}
else{
  print "<a class='navbar-brand' href='login.html'>Sign In</a><a class='btn btn-primary' href='register.php'>Register</a>";
}

?>
      </div>
    </nav>

    <!-- Image Showcases -->
    <section class="showcase">
      <div class="container-fluid p-0">
        <div class="row no-gutters">
          <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('https://www.youtube.com/watch?v=HVR3h12LOkA');"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <h2>Community</h2>
            <p class="lead mb-0">As a community of dancers, we are constantly growing and seeking inspiration from others. Our choreography library offers a resource that satisfies this need, as well as creates an online community through which dancers can interact with and learn with.</p>
          </div>
          
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/bg-showcase-2.jpg');"></div>
          <div class="col-lg-6 my-auto showcase-text">
            <h2>Share &amp; Search for Videos</h2>
            <p class="lead mb-0">Trying to find inspiration? Look no further! Iajsiofjaiosfjiaosfjioasjfioajsfo this is just filler text and I don't know what we're doing.</p>
          </div>
        </div>
      </div>
    </section>