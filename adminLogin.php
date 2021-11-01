<?php
		
    $link = mysqli_connect("localhost", "root", "", "Cab_System");
    if(isset($_POST['login'])){
        if($link === false){
            die("ERROR: Could not connect. "
                        . mysqli_connect_error());
        }
        $ID = $_POST['ID'];
        $Password = $_POST['Password'];
        if($ID == 'admin' and $Password == '123'){
                header("Location: ./admin/main.html");
                error_reporting(0);
            }
            else{
                 header("Location: ./adminLogin.html");
                echo "<script>alert('Wrong Credentials');</script>";
            } 
        
        mysqli_close($link);
    }
      


?>

     