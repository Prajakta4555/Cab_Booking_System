<?php
if(isset($_POST['addBtn']))
	{
		$conn = mysqli_connect("localhost","root","","Cab_System");
		
		if(mysqli_connect_errno($conn))
		{
			echo "Connection Failed";
		}
	
		$owner_id = $_POST['owner_id'];
        $owner_name = $_POST['name'];
        $owner_mail = $_POST['mail'];
        $company = $_POST['company'];
    
		$sql = "INSERT INTO cab_owner (owner_id,owner_name,owner_mail,company) VALUES ('$owner_id','$owner_name','$owner_mail','$company')";
		
		if(!mysqli_query($conn,$sql))
		{
			echo  "<script>alert('Failed to enter data');</script>";
		}
		else
		{
			header("Location: ./owner.html");
            error_reporting(0);
		}
	}
	
?>