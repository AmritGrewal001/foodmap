<?php
 require('partial/header.php');
 require('connect.php');

// If form submitted, insert values into the database.
if (isset($_REQUEST['pointText'])){
    // removes backslashes
	$pointText = stripslashes($_REQUEST['pointText']);
        //escapes special characters in a string
	$pointText = mysqli_real_escape_string($con,$pointText);
    $resourceDetails = stripslashes($_REQUEST['resourceDetails']);
	$resourceDetails = mysqli_real_escape_string($con,$resourceDetails);

        $query = "INSERT into mappoints (pointText, resourceDetails) VALUES ('$pointText', '$resourceDetails')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form' style='padding-top:10%; padding-bottom:10%; margin:5%; text-align: center;'>
<h3>New food resource is added successfully.</h3>
<br/>Return to <a href='index.php'>Home Page</a></div>";
        }
    }else{
?>



<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3 bg-light">
    <div class="col-md-4 p-lg-4 my-4 "></div>
    
    <div class="col-md-4 p-lg-4 my-4 bg-light">
        <form class="form-signin" name="addEvent" action="" method="post">
          <h1 class="h3 mb-3 font-weight-normal text-center">Add a new Food Resource Here!</h1>
          <label for="inputName" class="sr-only">Resource Name</label>
            <input type="text" id="inputName" name="pointText" class="form-control" placeholder="Resource Name" required autofocus>    
          <label for="inputEmail" class="sr-only">Resource Details</label>
            <input type="text" id="inputEmail" name="resourceDetails" class="form-control" placeholder="Resource Details" required>
          
          <button class="btn btn-lg btn-primary btn-block" type="submit">Add Food Resource</button>
        </form><br>
        <p>Return to <a href='index.php'>Home Page</a></p>
    </div>
        <div class="col-md-4 p-lg-4 my-4 "></div>
</div>

<?php
        } 
 require('partial/footer.php');
    
?>
