<?php

$conn = mysqli_connect("localhost","root","","Cab_System");
if(isset($_POST['submit']))
{
    if(mysqli_connect_errno($conn))
    {
        echo  "<script>alert('Database Connection Failed');</script>";
        
    }
    else{
        $place = $_POST['place'];
        $b_date = $_POST['Bdate']; 
        $r_date = $_POST['Rdate'];      
        $s_time = $_POST['sTime'];
        $e_time = $_POST['eTime'];
        $customer_id = $_COOKIE["user"];
        $sql1 = "INSERT INTO booking_details(booking_date, return_date, pickup_place, start_time, end_time, customer_id) VALUES ('$b_date', '$r_date', '$place', '$s_time', '$e_time', '$customer_id')";
        if(!mysqli_query($conn,$sql1))
        {
        echo  "<script>alert('Failed to enter data');</script>";
        }
        else 
        {
        header("Location: ./cars.php");
        error_reporting(0);
        }
    }
}		
?>