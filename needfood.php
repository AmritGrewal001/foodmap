<?php
 require('partial/header.php');
   include 'connect.php';

session_start();
if (isset($_POST['city'])){
	$city = stripslashes($_REQUEST['city']);
	$city = mysqli_real_escape_string($con,$city);
    $query = "SELECT * FROM maps WHERE city='$city'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['city'] = $city;
            // Redirect user
	    header("Location: /map/map.php");

			}
			else{
	echo "<div class='form' style='padding-top:10%;'>
<h3>City not found</h3>
<br/>Please try again here <a href='needfood.php'>Need Food</a></div>";
	}
    }else{

?>

<div class="col-md-5 p-lg-5 mx-auto my-5 bg-light">
    <form class="form-signin" action="" method="post">
      <h1 class="h3 mb-3 font-weight-normal text-center">Enter the city to see available food resources.</h1>
<!--
      <label for="inputName" class="sr-only">Name</label>
      <input type="text" id="inputName" class="form-control" placeholder="Name" autofocus>    
      <label for="inputName" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address">
      <label for="inputCell" class="sr-only">Cell</label>
      <input type="text" id="inputCell" class="form-control" placeholder="Cell Number">
-->
      <label for="inputCity" class="sr-only">City</label>
      <input type="text" id="inputCity" name="city" class="form-control" placeholder="City: Eg- Barrie, Orillia">
<!--
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Accept our privacy policy, terms and conditions.
        </label>
      </div>
-->
      <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Find Food</button>
    </form>
</div>


<?php
}
 require('partial/footer.php');
?>
