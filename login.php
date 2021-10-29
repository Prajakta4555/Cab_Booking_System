<?php
		
    $link = mysqli_connect("localhost", "root", "", "Cab_System");
    if(isset($_POST['login_btn'])){
        if($link === false){
            die("ERROR: Could not connect. "
                        . mysqli_connect_error());
        }
        $ID = $_POST['ID'];
        $Password = $_POST['Password'];
        $sql = "SELECT * FROM customer WHERE customer_id='$ID'";
        if($res = mysqli_query($link, $sql)){
            $row = mysqli_fetch_row($res);
            if($row[4] == $Password){
                header("Location: ./index.html");
                error_reporting(0);
            }
            else{
                 header("Location: ./login.html");
                echo  "<script>alert('Wrong Credentials');</script>";
            } 
        }
        mysqli_close($link);
    }
      


?>

     