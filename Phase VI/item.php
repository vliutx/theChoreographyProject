<?php 

$id = $_GET['id'];

$list = get_listed_videos();
if (!in_array($id, $list)){
  echo "404: Video could not be found.";
  die();
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>The Choreography Project</title>

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
        <a class="navbar-brand" href="about.php">About</a>
        <a class="navbar-brand" href="contact.php">Contact</a>
<?php

session_start();

if (isset($_SESSION['user'])){
  print "<a class='navbar-brand' href='new.php'>New Listing</a><a class='btn btn-primary' href='logout.php' onclick='return log();'>Logout</a>";
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
          <div class="col-lg-6 showcase-img"><iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo $id; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
          <div class="col-lg-6 my-auto showcase-text">
<?php 

$con = mysqli_connect("fall-2018.cs.utexas.edu","cs329e_mitra_vl5649","target4mercy-Know","cs329e_mitra_vl5649");
$query = mysqli_query($con, "SELECT * FROM TCP WHERE ID='$id'");
while ($deets = $query->fetch_row()){
  print "<h2>".$deets[3]."</h2>";
  print "<p class='lead mb-0'>Posted by: ".$deets[2]."<br>Genre: ".$deets[4]."<br>Style: ".$deets[5]."<br>".$deets[6]."</p>";
}
mysqli_close($con);

?>
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

<?php

function get_listed_videos(){
  $videos = array();

  $con = mysqli_connect("fall-2018.cs.utexas.edu","cs329e_mitra_vl5649","target4mercy-Know","cs329e_mitra_vl5649");
  $ids = mysqli_query($con, "SELECT ID FROM TCP");

  while ($row = mysqli_fetch_assoc($ids)){
    $videos[] = $row['ID'];
  }
  mysqli_close($con);
  return $videos;
}

?>