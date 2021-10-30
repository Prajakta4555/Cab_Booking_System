<!doctype html>
<html lang="en">

  <head>
    <title>Car Rent &mdash; Free Website Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3 ">
              <div class="site-logo">
                <h2><a href="index.html">Rent a Ride</a></h2>
              </div>
            </div>

            <div class="col-9  text-right">
              

              <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>

              

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li><a href="index.html" class="nav-link">Home</a></li>
                  <li><a href="services.html" class="nav-link">Services</a></li>
                  <!-- <li class="active"><a href="cars.html" class="nav-link">Cars</a></li> -->
                  <li><a href="feedback.html" class="nav-link">Feedback</a></li>
                  <li><a href="about.html" class="nav-link">About</a></li>
                  <li><a href="contact.html" class="nav-link">Contact</a></li>
                  <li><a href="logout.php" class="nav-link">Log Out</a></li>
                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>

    <div class="ftco-blocks-cover-1">
      <div class="ftco-cover-1 overlay innerpage" style="background-image: url('images/hero_2.jpg')">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 text-center">
              <h1>Let’s hire your ride</h1>
              <p>We Welcome you, with the best Services</p></div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">

        <?php
              $conn = new mysqli("localhost", "root", "", "Cab_System");
              if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
              } 
              
              $sql = "SELECT * FROM cab WHERE status='Available'";
              $result = $conn->query($sql);
              
              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="col-lg-4 col-md-6 mb-4">';
                    echo '<div class="item-1">';
                    echo '<a href="#"><img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" alt="Image" class="img-fluid"></a>';
                    echo '<div class="item-1-contents">';
                    echo '<div class="text-center">';
                    echo '<h3><a href="#">'.$row['model'].'</a></h3>';
                    echo '<div class="rent-price"><span>'.$row['rent'].'/</span>hour</div>';
                    echo '</div>';
                    echo '<ul class="specs">';
                    echo '<li>';
                    echo '<span>Cab No</span>';
                    echo '<span class="spec">'.$row['cab_id'].'</span>';
                    echo '</li>';
                    echo '<li>
                          <span>Cab Type</span>
                          <span class="spec">'.$row['cab_type'].'</span>
                          </li>';
                    echo '<li>
                          <span>Seats</span>
                          <span class="spec">'.$row['cab_seats'].'</span>
                          </li>
                          </ul>';
                    echo '<div class="d-flex action">
                          <a href="payCalculate.php?cab_id='.$row['cab_id'].'" class="btn btn-primary">Rent Now</a>
                          </div>
                          </div>
                          </div>
                          </div>';
                  }
            }
            
             else {
                echo "0 results";
            }
            
            $conn->close();

          ?>
        

        </div>
      </div>
    </div>

    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <h2 class="footer-heading mb-4">About Us</h2>
                <p>We welcome you, with the best Services.Providing you, a ride you have dreamed with best the rate and safe ride.</p>
          </div>
          <div class="col-lg-8 ml-auto">
            <h2 class="footer-heading mb-4">Quick Links</h2>
                
            <div class="row">
              <div class="col-lg-3">
               <ul class="list-unstyled">
                  <li><a href="about.html">About Us</a></li>
                </ul>
              </div>
              <div class="col-lg-3">
                <ul class="list-unstyled">
                  <li><a href="contact.html">Contact Us</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved  by Rent a Ride <i class="icon-heart text-danger" aria-hidden="true"></i>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>

        </div>
      </div>
    </footer>

    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

  </body>

</html>

