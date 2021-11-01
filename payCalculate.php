<?php

$conn = mysqli_connect("localhost","root","","Cab_System");
if(mysqli_connect_errno($conn)){
        echo  "<script>alert('Database Connection Failed');</script>";
        
    }
else{
    $cab_id = $_GET['cab_id'];
    $customer_id = $_COOKIE['user'];
    $booking_id = 0;
    $rent = 0;
    $booking_date = "";
    $return_date = "";
    $sTime = "";
    $eTime = "";
    $day = 0;
    $a = 0;
    $hr = 0;
    $bill = 0;
    $sql3 = "UPDATE cab SET status='Booked' WHERE cab_id='$cab_id'";
		$result = $conn->query($sql3);

    $sql1 = "UPDATE customer SET cab_id = '$cab_id' WHERE customer_id = '$customer_id'";
    if(!mysqli_query($conn,$sql1)){
        echo  "<script>alert('Failed to enter data');</script>";
    }
    else {
        $sql2 = "SELECT * FROM booking_details WHERE customer_id= '$customer_id'";
        if($res = mysqli_query($conn, $sql2)){
            $row = mysqli_fetch_row($res);
            $booking_id = $row[0];
            $booking_date = $row[1];
            $return_date = $row[2];
            $sTime = $row[4];
            $eTime = $row[5];
        }
        $sql3 = "SELECT * FROM cab WHERE cab_id= '$cab_id'";
        if($res = mysqli_query($conn, $sql3)){
            $row1 = mysqli_fetch_row($res);
            $rent = $row1[8];   
        }
        if($booking_date == $return_date){
            $hr = (int)(abs($eTime - $sTime));
        }
        else{
            $r = strtotime($return_date);
            $b = strtotime($booking_date);
            $a = $r - $b;
            $day = (round($a / 86400))-1;
            $dayhr = $day * 24;
            $dayS = (int)(24 - $sTime);
            $dayE = (int)$eTime;
            $hr = $dayhr + $dayS + $dayE;
        }
    $bill = $hr * $rent;
    header("Location: ./payForm.php?id=".$booking_id."&bill=".$bill);
        error_reporting(0);
    }

}   
?>