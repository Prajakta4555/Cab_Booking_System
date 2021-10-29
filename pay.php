<?php

$conn = mysqli_connect("localhost","root","","Cab_System");
if(isset($_POST['pay']))
{
    if(mysqli_connect_errno($conn))
    {
        echo  "<script>alert('Database Connection Failed');</script>";
        
    }
    else{
        $amount = (int)$_POST['amount'];
        $name = $_POST['name'];
        $card_no = (int)$_POST['card_no'];
        $expire = $_POST['expire'];
        $code = (int)$_POST['code'];
        $bill_date = date("Y-m-d");

        $sql1 = "INSERT INTO bill_details(bill_date, bill_amt, card_name, card_no, card_exp_date, security_code) VALUES ('$bill_date' , '$amount', '$name', '$card_no', '$expire', '$code')";
        if(!mysqli_query($conn,$sql1))
        {
        echo  "<script>alert('Failed to enter data');</script>";
        }
        else 
        {
        header("Location: ./index.html");
        error_reporting(0);
        }
    }
}		
?>