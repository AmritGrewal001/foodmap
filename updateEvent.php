<?php
 require('partial/header.php');
 require('connect.php');
if(isset($_GET['id'])) 
    {
     $id = $_GET['id'];
// If form submitted, insert values into the database.
    if (isset($_REQUEST['eventName'])){
    // removes backslashes
	$eventName = stripslashes($_REQUEST['eventName']);
        //escapes special characters in a string
	$eventName = mysqli_real_escape_string($con,$eventName);
    $eventDate = stripslashes($_REQUEST['eventDate']);
	$eventDate = mysqli_real_escape_string($con,$eventDate);
    $eventDetails = stripslashes($_REQUEST['eventDetails']);
	$eventDetails = mysqli_real_escape_string($con,$eventDetails);

        $query = "UPDATE events SET eventName = '$eventName', eventDate = '$eventDate', eventDetails = '$eventDetails' WHERE id = $id";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form' style='padding-top:10%; padding-bottom:10%; margin:5%; text-align: center;'>
<h3>Event is Updated successfully.</h3>
<br/>Return to <a href='admin-dashboard.php'>Dashboard</a></div>";
         }
       }
}else{
          echo "error";
        } 
 require('partial/footer.php');
    
?>
