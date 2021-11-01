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
                <h2><a href="login.html">Rent a Ride</a></h2>
              </div>
            </div>

            <div class="col-9  text-right">
              

              <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>

              

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li><a href="index.html" class="nav-link">Home</a></li>
                  <li><a href="services.html" class="nav-link">Services</a></li>
                  <li><a href="cars.html" class="nav-link">Cars</a></li>
                  <li><a href="feedback.html" class="nav-link">Feedback</a></li>
                  <li><a href="about.html" class="nav-link">About</a></li>
                  <li class="active"><a href="contact.html" class="nav-link">Contact</a></li>
                  <li><a href="logout.php" class="nav-link">Log Out</a></li>
                </ul>
              </nav>
            </div>

            
          </div>
        </div>
      </header>

    <div class="ftco-blocks-cover-1">
      <div class="ftco-cover-1 overlay" style="background-image: url('images/hero_1.jpg')">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-7">
              <div class="feature-car-rent-box-1">
                <h3>Payment Receipt</h3><br>

                <?php
                    $booking_id = "";
                    $customer_id = $_COOKIE['user'];
                    $customer_name = "";
                    $bill_no = "";
                    $bill_date = "";
                    $bill_amt = "";
                    $cab_id = "";
                    $driver_id="";
                    $driver_contact="";
                    $link = mysqli_connect("localhost", "root", "", "Cab_System");
                        if($link === false){
                            die("ERROR: Could not connect. ". mysqli_connect_error());
                        }
                        

                        $sql = "SELECT * FROM customer WHERE customer_id = '$customer_id'";
                        if($res = mysqli_query($link, $sql)){
                            $row = mysqli_fetch_row($res);
                            $customer_name = $row[1];
                            $cab_id = $row[5];
                        }

                        $sql = "SELECT * FROM booking_details WHERE customer_id = '$customer_id'";
                        if($res = mysqli_query($link, $sql)){
                            $row = mysqli_fetch_row($res);
                            $booking_id = $row[0];
                        }

                        $sql = "SELECT * FROM bill_details WHERE booking_id = '$booking_id'";
                        if($res = mysqli_query($link, $sql)){
                            $row = mysqli_fetch_row($res);
                            $bill_no = $row[0];
                            $bill_date = $row[1];
                            $bill_amt = $row[2];
                        }

                        $sql = "SELECT * FROM cab WHERE cab_id = '$cab_id'";
                        if($res = mysqli_query($link, $sql)){
                            $row = mysqli_fetch_row($res);
                            $driver_id = $row[9];
                        }

                        $sql = "SELECT * FROM driver WHERE driver_id = '$driver_id'";
                        if($res = mysqli_query($link, $sql)){
                            $row = mysqli_fetch_row($res);
                            $driver_contact = $row[3];
                        }

                        mysqli_close($link);

                    echo '<label style="font-size:20px;margin-left:25px;">Booking ID : '.$booking_id.'</label><br>';
                    echo '<label style="font-size:20px;margin-left:25px;">Customer ID : '.$customer_id.'</label><br>';
                    echo '<label style="font-size:20px;margin-left:25px;">Customer Name : '.$customer_name.'</label><br>';
                    echo '<label style="font-size:20px;margin-left:25px;">Bill No : '.$bill_no.'</label><br>';
                    echo '<label style="font-size:20px;margin-left:25px;">Bill Date : '.$bill_date.'</label><br>';
                    echo '<label style="font-size:20px;margin-left:25px;">Bill Amount : '.$bill_amt.'</label><br>';
                    echo '<label style="font-size:20px;margin-left:25px;">Cab ID : '.$cab_id.'</label><br>';
                    echo '<label style="font-size:20px;margin-left:25px;">Driver ID : '.$driver_id.'</label><br>';
                    echo '<label style="font-size:20px;margin-left:25px;">Driver Contact No : '.$driver_contact.'</label><br>
                          <br>';
                ?>

                <div style="margin-left: 175px; width: 240px;" class="d-flex align-items-center bg-white p-3">
                     
                 <span><button style="margin-left: 200px; width: 100px;"class="ml-auto btn btn-primary" ><a href="logout.php" style="color: white;" >Close</a></button></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    

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