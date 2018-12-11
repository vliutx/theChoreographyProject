<?php

session_start();

if (!isset($_SESSION['user'])){
  header('Location: login.php');
  die();

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	  <title>New Listing</title>
    
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
    <!-- Custom JS -->
    <script type="text/javascript" src="js/list.js"></script>
    <script type="text/javascript" src="js/logout.js"></script>
  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-light bg-light static-top">
      <div class="container">
        <a class="navbar-brand" href="home.php">Home</a>
        <form class="form-inline" method="GET" action="result.php" style="width: 33.5% !important;">
          <input type="hidden" name="set" value="true" />
          <input type="text" class="form-control form-control-sm" name="title" style="width: 93%;" required>
          <i class="fa fa-search" style="position: relative; left: -22px;"></i>
        </form>
        <a class="navbar-brand" href="new.php">New Listing</a>
        <a class="btn btn-primary" onclick="return log();" href="php/logout.php">Logout</a>
      </div>
    </nav>

    <!-- Call to Action -->
    <section class="call-to-action text-center text-white bg-light">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters">
          <div class="col-lg-12 my-auto showcase-text">
            <h2>New Listing</h2>
            <br>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="ifexists(event);">
              <div class="form-row" style="justify-content: center;">
                <div class="col-12 col-md-9 mb-2 mb-md-0">
                  <input type="text" id="id" class="form-control form-control-lg" placeholder="Youtube ID" data-toggle="tooltip" data-placement="right" title="The Youtube ID follows after 'watch?v=' in the video's URL." required>
                </div>
              </div>
              <br>
              <div class="form-row" style="justify-content: center;">
                <div class="col-12 col-md-9 mb-2 mb-md-0">
                  <input type="text" id="title" class="form-control form-control-lg" placeholder="Title" data-toggle="tooltip" data-placement="right" title="Feel free to copy the video's original title, or re-title the video yourself." required>
                </div>
              </div>
              <br>
              <div class="form-row" style="justify-content: center;">
                <div class="col-12 col-md-9 mb-2 mb-md-0">
                  <select class="form-control form-control-lg" id="genre" data-toggle="tooltip" data-placement="right" title="Choose the music genre that most closely matches that of the video you're sharing." required>
                      <option value="" disabled selected hidden>Genre</option>
                      <option value="Classical">Classical</option>
                      <option value="Country">Country</option>
                      <option value="Electronic">Electronic</option>
                      <option value="Ethnic">Ethnic</option>
                      <option value="Hip-hop">Hip-hop</option>
                      <option value="K-pop">K-pop</option>
                      <option value="Pop">Pop</option>
                      <option value="Rock">Rock</option>
                      <option value="R&amp;B">R&amp;B</option>
                      <option value="Other">Other</option>
                  </select>
                </div>
              </div>
              <br>
              <div class="form-row" style="justify-content: center;">
                <div class="col-12 col-md-9 mb-2 mb-md-0">
                  <select class="form-control form-control-lg" id="style" data-toggle="tooltip" data-placement="right" title="Choose the dance style that most closely matches that of the video you're sharing." required>
                      <option value="" disabled selected hidden>Style</option>
                      <option value="Ballet">Ballet</option>
                      <option value="Ballroom">Ballroom</option>
                      <option value="Contemporary">Contemporary</option>
                      <option value="Ethnic">Ethnic</option>
                      <option value="K-pop">K-pop</option>
                      <option value="Mixed">Mixed</option>
                      <option value="Urban">Urban</option>
                      <option value="Other">Other</option>
                  </select>
                </div>
              </div>
              <br>
              <div class="form-row" style="justify-content: center;">
                <div class="col-12 col-md-9 mb-2 mb-md-0">
                  <textarea class="form-control form-control-lg" rows="3" placeholder="Brief Description" id="descrip" data-toggle="tooltip" data-placement="right" title="(Optional) Describe the video you're sharing in a as many words as you'd like."></textarea>
                </div>
              </div>
              <br>
              <div class="form-row" style="justify-content: center;">
                <div class="col-12 col-md-9 mb-2 mb-md-0">
                  <button type="submit" class="btn btn-block btn-lg btn-primary">List</button>
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
	
	<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
	</script>
	
  </body>
</html>

<?php

?>