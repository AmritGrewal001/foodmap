<?php
 require('partial/header.php');

require('connect.php');

// If form submitted, insert values into the database.
if (isset($_REQUEST['name'])){
    // removes backslashes
	$name = stripslashes($_REQUEST['name']);
        //escapes special characters in a string
	$name = mysqli_real_escape_string($con,$name);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
    $email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
    $cell = stripslashes($_REQUEST['cell']);
	$cell = mysqli_real_escape_string($con,$cell);

        $query = "INSERT into users (name, password, email, cell)
VALUES ('$name', '$password', '$email', '$cell')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form' style='padding-top:10%; padding-bottom:10%; margin:5%; text-align: center;'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='havefood-login.php'>Login</a></div>";
        }
    }else{
?>



<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3 bg-light">
    <div class="col-md-4 p-lg-4 my-4 "></div>
    
    <div class="col-md-4 p-lg-4 my-4 bg-light">
        <form class="form-signin" name="registration" action="" method="post">
          <h1 class="h3 mb-3 font-weight-normal text-center">New here? Sign-up to start!</h1>
          <label for="inputName" class="sr-only">Name</label>
            <input type="text" id="inputName" name="name" class="form-control" placeholder="Name" required autofocus>    
          <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required>
          <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>    
          <label for="inputCell" class="sr-only">Cell</label>
            <input type="text" id="inputCell" name="cell" class="form-control" placeholder="Cell Number">
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Accept our privacy policy, terms and conditions.
            </label>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Sign-up</button>
        </form><br>
        <p>Already registered? Please <a href="havefood-login.php">Login Here.</a></p>
    </div>
        <div class="col-md-4 p-lg-4 my-4 "></div>
</div>

<?php
        } 
 require('partial/footer.php');
    
?>
