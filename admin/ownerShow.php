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
    <a href="historyShow.php"><i class="fa fa-user-circle-o">&nbsp;&nbsp;&nbsp;</i> View History</a>
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
        <h2><center>Cab Owners</center></h2><br>
      
        <table class="w3-table-all">
          <thead>
            <tr style="background-color: #000043;color: white;">
              <th>Sr</th>
              <th>Owner ID</th>
              <th>Owner Name</th>
              <th>Owner Mail</th>
              <th>Company</th>
            </tr>
          </thead>
          <?php
            $conn = new mysqli("localhost", "root", "", "Cab_System");
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
            $count=0;
            $sql = "SELECT * FROM cab_owner";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $count++;
                  echo  "<tr><td> ". $count."</td><td> ". $row["owner_id"]. "</td><td> " . $row["owner_name"] ."</td><td> ".$row["owner_mail"]."</td><td> ".$row["company"]."</td></tr> ";
              }  
           } 
            if($count==0){
                echo "<tr><td></td><td></td><td>No Records</td><td></td><td></td></tr>";
                echo "</table>";
            }
          $conn->close(); 
          ?>
        </table>
      </div>
</body>
</html>