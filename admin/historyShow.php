<!DOCTYPE html>
<html>
<title>Admin Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">    
<head>
        <style>
            a{
                text-decoration: none;
                font-size: 18px;
            }
            .block{
                width: 100%;
                height:550px;
                left: 0;
                 margin-left: 150px;
                background:linear-gradient(
                    rgba(0,0,0,0.7),
                    rgba(0,0,0,0.7))
                ,url(hero_1.jpg) 50% 50%;
                position: absolute;
                display: flex;
                justify-content: center;
                align-items: center;
            }
         @media screen and (min-width:900px) 
         {
        .block{
                width: 100%;
                height:300px;
                left: 0;
                 margin-left: 150px;
                background:linear-gradient(
                    rgba(0,0,0,0.7),
                    rgba(0,0,0,0.7))
                ,url(hero_1.jpg) 50% 50%;
                position: absolute;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            }
        .bl{
                width:90%;
                height: 240px;
                background-color: transparent;
                color: white;
                text-align: center;
                position: relative;
            cursor: default;
            }    
        </style>
    </head>
<body>

<div class="w3-sidebar w3-bar-block w3-black w3-card" style="width:250px;">
    <br>
    <a href="main.html"><i class="fa fa-home">&nbsp;&nbsp;&nbsp;</i> Home</a>
    <br><br>
    <a href="addCar.php"><i class="fa fa-car">&nbsp;&nbsp;&nbsp;</i> Add a cab</a>
    <br><br>
    <a href="driver.html"><i class="fa fa-id-card">&nbsp;&nbsp;&nbsp;</i> Add a driver</a>
    <br><br>
    <a href="owner.html"><i class="fa fa-user-circle-o">&nbsp;&nbsp;&nbsp;</i> Add a owner</a>
    <br><br>
    <a href="bookingShow.php"><i class="fa fa-asterisk">&nbsp;&nbsp;&nbsp;</i> View bookings</a>
    <br><br>
    <a href="#"><i class="fa fa-user-circle-o">&nbsp;&nbsp;&nbsp;</i> View History</a>
    <br><br>
    <a href="cabShow.php"><i class="fa fa-taxi">&nbsp;&nbsp;&nbsp;</i>View cabs</a>
    <br><br>
    <a href="driverShow.php"><i class="fa fa-id-card">&nbsp;&nbsp;&nbsp;</i> View Drivers</a>
    <br><br>
    <a href="ownerShow.php"><i class="fa fa-user-circle-o">&nbsp;&nbsp;&nbsp;</i> View owners</a>
    <br><br>
    <a href="feedbackShow.php"><i class="fa fa-users">&nbsp;&nbsp;&nbsp;</i>Customer Service</a>
    <br><br>
    </div>

    <div style="margin-left: 300px; margin-right: 150px;" class="w3-container">
        <h2><center>History Bookings</center></h2><br>
      
        <table class="w3-table-all">
          <thead>
            <tr style="background-color: #000043;color: white;">
              <th>Sr</th>
              <th>Customer ID</th>
              <th>Customer Name</th>
              <!-- <th>Cab ID</th>
              <th>Driver ID</th> -->
              <th>Booking ID</th>
              <th>Booking Date</th>
              <th>Return Date</th>
              <th>Booking Amount</th>
              <th>Bill No</th>
            </tr>
          </thead>
          <?php
            $conn = new mysqli("localhost", "root", "", "Cab_System");
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
            $count=0;
           
          $sql3 = "SELECT * FROM customer";
            
          $result3 = $conn->query($sql3);
          if ($result3->num_rows > 0) {
            while($row3 = $result3->fetch_assoc()) {
              $count++;
              $customer_id = $row3["customer_id"];
              $customer_name = $row3["name"];
              $sql2 = "SELECT * FROM cab";
          
             $sql4 = "SELECT * FROM booking_history where customer_id = '$customer_id'";
             $result4 = $conn->query($sql4);
             if ($result4->num_rows > 0) {
              while($row4 = $result4->fetch_assoc()) {
                $booking_id = $row4["booking_id"];
                $booking_date = $row4["booking_date"];
                $return_date = $row4["return_date"];
                
                $sql5 = "SELECT * FROM bill_details where booking_id = '$booking_id'";
                $result5 = $conn->query($sql5);  
                
                if ($result5->num_rows > 0) {
                  while($row5 = $result5->fetch_assoc()) {
                    $bill_no = (int)$row5["bill_no"];
                    $bill_amt = $row5["bill_amt"];

                    echo  "<tr><td> ". $count."</td><td> ".$customer_id . "</td><td> " .$customer_name ."</td><td> ". $booking_id."</td><td> ".$booking_date . "</td><td> " .$return_date ."</td><td> " .$bill_amt ."</td><td> " .$bill_no ."</td></tr> "; 
                  }
                }
              }  
            } 
          }
        } 
         
              if($count==0)
              {
                echo "<tr><td></td><td></td><td>No Records</td><td></td><td></td></tr>";
                echo "</table>";
              }
          $conn->close(); 
          ?>
        </table>
      </div>
</body>
</html>
