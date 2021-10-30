<?php

$conn = mysqli_connect("localhost","root","","Cab_System");
if(isset($_POST['register']))
{
    if(mysqli_connect_errno($conn))
    {
        echo  "<script>alert('Database Connection Failed');</script>";
        
    }
    else{
        $Name = $_POST['fname'] ." ". $_POST['lname'];
        $Mail = $_POST['email'];
        $Contact = $_POST['contact'];
        $Gender = $_POST['gender'];
        $Password = $_POST['password'];

        $sql1 = "INSERT INTO customer (customer_id,name,contact_no,gender,password) VALUES('$Mail','$Name','$Contact','$Gender','$Password')";
        if(!mysqli_query($conn,$sql1))
        {
        echo  "<script>alert('Failed to enter data');</script>";
        }
        else 
        {
        // echo  "<script>alert('Data inserted Successfully');</script>";
        header("Location: ./login.html");
        error_reporting(0);
        }
    }
}		
?>