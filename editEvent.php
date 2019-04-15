<?php
  require('partial/header.php');
  require('connect.php');

    if(isset($_GET['id'])) 
    {
     $id = $_GET['id'];
     $query= "SELECT * FROM events WHERE id='$id'";
     $output=mysqli_query($con,$query);   
        if(!$output)
        {
         die("database error, no record found");
        }
        $count= mysqli_num_rows($output);

        if($count>0)
        {
          $n=1;
          $total=0;
          $flag=0;
          $check=0;
          $mess="";
          $row= mysqli_fetch_assoc($output);
//        while($row= mysqli_fetch_assoc($output)){
            
          $eventdetails= $row["id"] + $row["eventName"] + $row["eventDate"] + $row["eventDetails"];
       ?>
        <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3 bg-light">
            <div class="col-md-4 p-lg-4 my-4 "></div>
            <div class="col-md-4 p-lg-4 my-4 bg-light">
                <form class="form-signin" name="updateEvent" action="" method="post">
                  <h1 class="h3 mb-3 font-weight-normal text-center">Edit your event here!</h1>
                  <label for="inputName" class="sr-only">Event Name</label>
                    <input type="text" id="inputName" name="eventName" class="form-control" value="<?php echo $row["eventName"]; ?>" required autofocus>    
                  <label for="inputEmail" class="sr-only">Event Date</label>
                    <input type="date" id="inputEmail" name="eventDate" class="form-control" value="<?php echo $row["eventDate"]; ?>" required>
                  <label for="inputCell" class="sr-only">Event Details</label>
                    <input type="text" id="inputCell" name="eventDetails" class="form-control" value="<?php echo $row["eventDetails"]; ?>">
                    <a href="/map/updateEvent.php?id="<?php echo $row["id"];  ?>"" class="btn btn-lg btn-primary btn-block"> UPDATE </a>
                </form><br>
                <p>Return to <a href='admin-dashboard.php'>Dashboard</a></p>
            </div>
            <div class="col-md-4 p-lg-4 my-4 "></div>
        </div>"


<?php
        } 
    }
    
 require('partial/footer.php');
    
?>