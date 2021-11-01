<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
<head>
<style>
    
a{
        
        text-decoration: none;
        font-size: 18px;
    }
    h1{
      font-size:40px;
    margin-left:160px;
        
    }
       .back{
                width: 100%;
                height: 700px;
                margin-top: 25px;
            }
            #output{
                width: 90%;
                height: 400px;
                background-color: white;
                margin-left: 25px;
                border: 1px solid black;
            }
            .bx{
                width:70%;
                height:650px;
                background-color:white;
                margin-left: 180px;
            }
            .up{
                padding: 23px 20px 15px 20px;
                margin-left: 400px;
                font-size:28px;
                background-color: green;
                border-radius: 50%;
            }
            input{
                width: 89%;
                margin-left: 25px;
                height: 35px;
                font-size: 18px;
                padding:0 0 0 10px;
                outline: none;
                border: 1px solid black;
            }
            .bt1{
                width: 100px;
                height: 38px;
                border: none;
                outline: none;
                color: white;
                background-color:cadetblue;
                font-size: 22px;
                margin-left: 140px;
            }
            
             @media screen and (min-width:900px){
                 .back{
                width: 96%;
                height: 700px;
                margin-left:100px; 
                margin-top: 25px;
            }
                 
                .bx{
                width:75%;
                height:650px;
                margin:auto;
            }
                 #output{
                width: 60%;
                height: 400px;
                background-color: white;
                margin-left: 250px;
                     border: 1px solid black;
            }
                  .up{
                padding: 23px 20px 15px 20px;
                margin-left: 990px;
                font-size:28px;
                background-color: green;
                border-radius: 50%;
            }
                 input,select{
                width: 60%;
                margin-left:250px;
                height: 35px;
                font-size: 18px;
                padding:0 0 0 10px;
                outline: none;
                border: 1px solid black;
            }

            ::placeholder{
                color: black;
            }

                  .bt1{
                width: 100px;
                height: 38px;
                border: none;
                outline: none;
                color: white;
                background-color:cadetblue;
                font-size: 22px;
                margin-left: 550px;
            }
                 
    }
    
   </style> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
<br>    
    <h1> <center>&nbsp;Add a cab</center></h1> 
    
    <div class="back">
            <div class="bx">
        <form action="addCab_db.php" enctype="multipart/form-data"  ;accept="image/gif, image/jpeg" method="POST">
        <input  type="file"  accept="image/*" id="file" onchange="loadFile(event)" style="display: none; padding-left: auto" placeholder="Photo" autocomplete="off" name='photo' required>
        <img id="output" width="200"/>
            <label for="file" style="cursor:pointer; text-align: left;color:white" class="up"><b>&nbsp;+&nbsp;</b></label>
            <br><br>
        <input type="text" placeholder="Cab No" name="cabno" autocomplete="off" required>
            <br><br>
            <select name="owner" style="background:white;">
            <option selected disabled>Select cab owner</option>
            <?php
                $conn = new mysqli("localhost", "root", "", "Cab_System");
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT * FROM cab_owner";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                      echo  "<option> ". $row["owner_id"]."</option>";
                  }  
               } 
              $conn->close(); 
            ?>
        </select>
            <br><br>
        <input type="text" placeholder="Model of Cab" name="model" autocomplete="off" required>
            
        <br><br>
        <input type="text" placeholder="Seats of Cab" name="seat" autocomplete="off" required>
            <br><br>
        <input type="date" placeholder="Year" name="cabyear" autocomplete="off" required>
            <br><br>
        <select name="cabType" style="background:white;">
            <option selected disabled>Select cab type</option>
            <option>Regular Cab</option>
            <option>Extended Cab</option>
        </select>
        <br><br>

        <input type="text" placeholder="Rent per hour" name="rent" autocomplete="off" required>
        <br><br>

        <select name="status" style="background:white;">
            <option selected disabled>Select cab Status</option>
            <option>Available</option>
            <option>Booked</option>
        </select>
        <br><br>
        
        <button type="submit" name="addBtn" class="bt1">Save</button>
        <br><br><br>
        </form>
        </div>
        </div>
        

 <script>     
    var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>

</body>
</html>