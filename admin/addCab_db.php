<?php
if(isset($_POST['addBtn']))
	{
		$conn = mysqli_connect("localhost","root","","Cab_System");
		
		if(mysqli_connect_errno($conn))
		{
			echo "Connection Failed";
		}
	
		$file = addslashes(file_get_contents($_FILES['photo']['tmp_name'])); 
	    $cab_id = $_POST['cabno'];
        $model = $_POST['model'];
        $owner = $_POST['owner'];
        $cabyear = $_POST['cabyear'];
        $cab_type = $_POST['cabType'];
        $status = $_POST['status'];
        $rent = (int)$_POST['rent'];
		$seats = (int)$_POST['seat'];
		$driver_id = 0;

		$sql2 = "SELECT * FROM driver WHERE status = 'Available'";
		$result = $conn->query($sql2);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$driver_id = $row["driver_id"];
				break;
			}  
		}
		

		$sql = "INSERT INTO cab (cab_id,owner_id,image,model, cab_seats, cab_year,cab_type,status,rent,driver_id) VALUES ('$cab_id','$owner','$file', '$model', '$seats', '$cabyear', '$cab_type','$status', '$rent','$driver_id')";
		
		if(!mysqli_query($conn,$sql))
		{
			echo  "<script>alert('Failed to enter data');</script>";
		}
		else
		{
			$sql3 = "UPDATE driver SET status='Booked' WHERE driver_id='$driver_id'";
		    $result = $conn->query($sql3);
			header("Location: ./addCar.php");
            error_reporting(0);
		}
	}
	
?>