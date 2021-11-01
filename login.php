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
        $cab_id = "";
        if($res = mysqli_query($link, $sql)){
            $row = mysqli_fetch_row($res);
            if($row[4] == $Password){
                setcookie("user", $ID); 
                header("Location: ./index.html");
                error_reporting(0);
            }
            else{
                header("Location: login.html");
            }
        }

        $sql2 = "SELECT * FROM booking_details";
        $result = $link->query($sql2);
        if ($result->num_rows > 0) {
            while($row2 = $result->fetch_assoc()) {
                $booking_id=$row2['booking_id'];
                $booking_date=$row2['booking_date'];
                $return_date=$row2['return_date'];
                $pickup_place=$row2['pickup_place'];
                $sTime = $row2['start_time'];
                $eTime = $row2['end_time'];
                $customer_id = $row2['customer_id'];

                $r = strtotime($row2['return_date']);
                $c = strtotime(date("Y-m-d"));
                $a = $r - $c;
                $day = (round($a / 86400));
                if($day < 0){
                    
                    $sql3 = "SELECT * FROM customer WHERE customer_id = '$customer_id'";
                    if($res = mysqli_query($link, $sql3)){
                        $row1 = mysqli_fetch_row($res);
                        $cab_id = $row1[5];
                    }
                    $sql4 = "UPDATE cab SET status='Available' WHERE cab_id='$cab_id'";
                    $res1 = $link->query($sql4);

                    $sql7 = "INSERT INTO booking_history(booking_id,booking_date, return_date, pickup_place, start_time, end_time, customer_id) VALUES ('$booking_id','$booking_date','$return_date','$pickup_place','$sTime','$eTime','$customer_id')";
                    $res7 = $link->query($sql7);

                    $sql8 = "DELETE FROM booking_details WHERE booking_id = '$booking_id'";
                    $res8 = $link->query($sql8);

                }
                else if($day == 0){
                    $time_now=mktime(date('h')+5);
                    $time = date('H', $time_now);
                    $d = $eTime - $time;
                    if($d <= 0){
                        $customer_id1 = $row2['customer_id'];
                        $sql5 = "SELECT * FROM customer WHERE customer_id = '$customer_id1'";
                        if($res2 = mysqli_query($link, $sql5)){
                            $row1 = mysqli_fetch_row($res2);
                            $cab_id1 = $row1[5];
                        }
                        $sql6 = "UPDATE cab SET status='Available' WHERE cab_id='$cab_id1'";
                        $res3 = $link->query($sql6);

                        $sql9 = "INSERT INTO booking_history(booking_id,booking_date, return_date, pickup_place, start_time, end_time, customer_id) VALUES ('$booking_id','$booking_date','$return_date','$pickup_place','$sTime','$eTime','$customer_id')";
                        $res9 = $link->query($sql9);

                        $sql10 = "DELETE FROM booking_details WHERE booking_id = '$booking_id'";
                        $res10 = $link->query($sql10);
                    }
                }
            }  
         }

        mysqli_close($link);
    }
?>