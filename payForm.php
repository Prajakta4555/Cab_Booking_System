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
            <div class="col-lg-5">
              <div class="feature-car-rent-box-1">
                <h3>Pay Invoice</h3>
                <?php 
                  echo '<h5>Booking ID : '.$_GET['id'].'</h5>';
               ?>
                <form name="payForm" method="POST" action="./pay.php" onsubmit="return validate()">
                <ul class="list-unstyled">
                  <?php
                      setcookie("bill",$_GET['bill']);
                      echo '<li>
                      <input style = "border: 1px solid rgb(128, 127, 127);" type="text" id="amount" name="amount" value="'.$_GET['bill'].'" class="form-control" disabled>
                      <span ID="amount_error"></span>
                      </li>';
                  ?>
                  <li>
                    <input style = "border: 1px solid rgb(128, 127, 127);" type="text" id="name" name="name" placeholder="Name on the card" class="form-control">
                    <span ID="name_error"></span>
                  </li>
                  <li>
                    <input style = "border: 1px solid rgb(128, 127, 127);" type="text" id="card_no" name="card_no" placeholder="Card Number" class="form-control">
                    <span ID="cardno_error"></span>
                  </li>
                  <li>
                    <input style = "border: 1px solid rgb(128, 127, 127);" type="month" id="expire" name="expire" placeholder="Expiration date" class="form-control">
                    <span ID="expiry_error"></span>
                  </li>
                  <li>
                    <input style = "border: 1px solid rgb(128, 127, 127);" type="password" id="code" name="code" placeholder="Security Code" class="form-control">
                    <span ID="code_error"></span>
                  </li>
                </ul>
                <div style="margin-left: 5px; width: 240px;" class="d-flex align-items-center bg-white p-3">
                    <button style="width: 100px;" class="ml-auto btn btn-primary" name="pay" type="submit">Pay</button>
                  </div>
                </form>
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



    <script>
        function validate(){
          var amount = document.getElementById("amount_error")
          var name = document.getElementById("name_error")
          var cardno = document.getElementById("cardno_error")
          var expiry = document.getElementById("expiry_error")
          var code = document.getElementById("code_error")
          var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
  
          if (document.getElementById("name").value == "" ) 
          {
              name.innerHTML = "<span style='color: red;'>"+"Please enter your name</span>"
              return false;
          }
          else if((format.test(document.getElementById("name").value)) || !isNaN(document.getElementById("name").value)){
            name.innerHTML = "<span style='color: red;'>"+"Please enter valid name</span>"
            return false;
          }
          else{
            name.innerHTML = ""
           
          }
  
          if (document.getElementById("amount").value == "") 
          {
              amount.innerHTML = "<span style='color: red;'>"+"Please enter amount</span>"
              return false;
          } 
          else if((format.test(document.getElementById("amount").value)) || isNaN(document.getElementById("amount").value)){
            amount.innerHTML = "<span style='color: red;'>"+"Please enter valid amount</span>"
            return false;
          }
          else{
            amount.innerHTML = ""
            
          }

          if (document.getElementById("card_no").value == "") 
          {
              cardno.innerHTML = "<span style='color: red;'>"+"Please enter card number</span>"
              return false;
          } 
          else if((format.test(document.getElementById("card_no").value)) || isNaN(document.getElementById("card_no").value) || document.getElementById("card_no").value.length != 16){
            cardno.innerHTML = "<span style='color: red;'>"+"Please enter valid card number</span>"
            return false;
          }
          else{
            cardno.innerHTML = ""
           
          }

          if (document.getElementById("expire").value == "") 
          {
              expiry.innerHTML = "<span style='color: red;'>"+"Please enter expiry date</span>"
              return false;
          } 
          else{
            expiry.innerHTML = ""
           
          }

          if (document.getElementById("code").value == "") 
          {
              code.innerHTML = "<span style='color: red;'>"+"Please enter security code</span>"
              return false;
          } 
          else if((format.test(document.getElementById("code").value)) || isNaN(document.getElementById("code").value) || document.getElementById("code").value.length != 3){
            code.innerHTML = "<span style='color: red;'>"+"Please enter valid security code</span>"
            return false;
          }
          else{
            code.innerHTML = ""
            
          }
          return true;
        }
      </script>

  </body>

</html>