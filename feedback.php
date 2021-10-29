<?php

$conn = mysqli_connect("localhost","root","","Cab_System");
if(isset($_POST['submit']))
{
    if(mysqli_connect_errno($conn))
    {
        echo  "<script>alert('Database Connection Failed');</script>";
        
    }
    else{
        $Name = $_POST['name'];
        $Mail = $_POST['email'];
        $msg = $_POST['msg'];
     
        $sql1 = "INSERT INTO feedback (fb_id,name,fb_msg) VALUES('$Mail','$Name','$msg')";
        if(!mysqli_query($conn,$sql1))
        {
        echo  "<script>alert('Failed to enter data');</script>";
        }
        else 
        {
        // echo  "<script>alert('Data inserted Successfully');</script>";
        header("Location: ./index.html");
        error_reporting(0);
        }
    }
}		
?>