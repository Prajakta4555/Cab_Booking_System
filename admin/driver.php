<?php
if(isset($_POST['addBtn']))
	{
		$conn = mysqli_connect("localhost","root","","Cab_System");
		
		if(mysqli_connect_errno($conn))
		{
			echo "Connection Failed";
		}
	
		$name = $_POST['fname'] ." ". $_POST['lname'];
        $gender = $_POST['gender'];
        $contact = (int)$_POST['contact'];
        $status = $_POST['status'];
        $license = (int)$_POST['license'];
        $age = (int)$_POST['age'];
    
		$sql = "INSERT INTO driver (name, gender, contact_no, status, license, age) VALUES ('$name','$gender', '$contact', '$status', '$license','$age')";
		
		if(!mysqli_query($conn,$sql))
		{
			echo  "<script>alert('Failed to enter data');</script>";
		}
		else
		{
			header("Location: ./main.html");
            error_reporting(0);
		}
	}
	
?>