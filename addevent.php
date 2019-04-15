<?php
 require('partial/header.php');
 require('connect.php');

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

        $query = "INSERT into events (eventName, eventDate, eventDetails) VALUES ('$eventName', '$eventDate', '$eventDetails')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form' style='padding-top:10%; padding-bottom:10%; margin:5%; text-align: center;'>
<h3>New event is Added successfully.</h3>
<br/>Return to <a href='admin-dashboard.php'>Dashboard</a></div>";
        }
    }else{
?>



<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3 bg-light">
    <div class="col-md-4 p-lg-4 my-4 "></div>
    
    <div class="col-md-4 p-lg-4 my-4 bg-light">
        <form class="form-signin" name="addEvent" action="" method="post">
          <h1 class="h3 mb-3 font-weight-normal text-center">Add a new event here!</h1>
          <label for="inputName" class="sr-only">Event Name</label>
            <input type="text" id="inputName" name="eventName" class="form-control" placeholder="Event Name" required autofocus>    
          <label for="inputEmail" class="sr-only">Event Date</label>
            <input type="date" id="inputEmail" name="eventDate" class="form-control" placeholder="Event Date" required>
          <label for="inputCell" class="sr-only">Event Details</label>
            <input type="text" id="inputCell" name="eventDetails" class="form-control" placeholder="Event Details">
          <button class="btn btn-lg btn-primary btn-block" type="submit">Add Event</button>
        </form><br>
        <p>Return to <a href='admin-dashboard.php'>Dashboard</a></p>
    </div>
        <div class="col-md-4 p-lg-4 my-4 "></div>
</div>

<?php
        } 
 require('partial/footer.php');
    
?>
