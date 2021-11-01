<?php

$conn = mysqli_connect("localhost","root","","Cab_System");
if(isset($_POST['pay']))
{
    if(mysqli_connect_errno($conn))
    {
        echo  "<script>alert('Database Connection Failed');</script>";
        
    }
    else{
        $amount = $_COOKIE['bill'];
        $name = $_POST['name'];
        $card_no = $_POST['card_no'];
        $expire = $_POST['expire'];
        $code = (int)$_POST['code'];
        $bill_date = date("Y-m-d");
        $customer = $_COOKIE["user"];
        $booking_id = 0;
        $sql = "SELECT * FROM booking_details WHERE customer_id='$customer'";
        if($res = mysqli_query($conn, $sql)){
            $row1 = mysqli_fetch_row($res);
            $booking_id = $row1[0];
        }
        $sql1 = "INSERT INTO bill_details(bill_date, bill_amt, card_name, card_no, card_exp_date, security_code, customer_id, booking_id) VALUES ('$bill_date' , '$amount', '$name', '$card_no', '$expire', '$code', '$customer', '$booking_id')";
        if(!mysqli_query($conn,$sql1))
        {
        echo  "<script>alert('Failed to enter data');</script>";
        }
        else 
        {
        header("Location: ./payReceipt.php");
        error_reporting(0);
        }
    }
}		
?>