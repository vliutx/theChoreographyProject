<?php

if (!isset($_GET['set'])){
    echo "404: Page not found.";
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Results</title>

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
<?php

$side = "left"; /*alternates between sides*/

/*construct SQL call*/
$string = "SELECT * FROM TCP WHERE";
$search = array();
$vals = array();
if (isset($_GET['title'])){
  $search[] = ' Title LIKE ';
  $vals[] = $_GET['title'];
}
if (isset($_GET['genre'])){
  $search[] = ' Genre=';
  $vals[] = $_GET['genre'];
}
if (isset($_GET['style'])){
  $search[] = ' Style=';
  $vals[] = $_GET['style'];
}
if (isset($_GET['author'])){
  $search[] = ' Author=';
  $vals[] = $_GET['author'];
}
for ($i=0; $i < count($vals); $i++){ 
  if ($search[$i] != ' Title LIKE '){
    $string .= $search[$i]."'$vals[$i]'";
  }
  else{
    $string .= $search[$i]."'%$vals[$i]%'";
  }
  if ($i != (count($vals)-1)){
    $string .= " AND";
  }
}
$string .= " ORDER BY Time DESC";

$con = mysqli_connect("fall-2018.cs.utexas.edu","cs329e_mitra_vl5649","target4mercy-Know","cs329e_mitra_vl5649");
$query = mysqli_query($con, $string);
while ($deets = $query->fetch_row()){
    if ($side == "left"){
        print "<a href='item.php?id=$deets[0]'><div class='row no-gutters'><div class='col-lg-6 order-lg-2 text-white showcase-img' style='background-image: url(\"https://i.ytimg.com/vi/$deets[0]/maxresdefault.jpg\");'></div>";
        print "<div class='col-lg-6 order-lg-1 my-auto showcase-text'><h2>$deets[3]</h2>";
        print "<p class='lead mb-0'>Genre: $deets[4]<br>Style: $deets[5]</p></div></div></a>";
        $side = "right";
    }
    else{
        print "<a href='item.php?id=$deets[0]'><div class='row no-gutters'><div class='col-lg-6 text-white showcase-img' style='background-image: url(\"https://i.ytimg.com/vi/$deets[0]/maxresdefault.jpg\");'></div>";
        print "<div class='col-lg-6 my-auto showcase-text'><h2>$deets[3]</h2>";
        print "<p class='lead mb-0'>Genre: $deets[4]<br>Style: $deets[5]</p></div></div></a>";
        $side = "left";
    }
}
mysqli_close($con);

?>
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
