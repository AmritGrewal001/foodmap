<?php
    require('connect.php');
    session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['email'])){
            // removes backslashes
        $email = stripslashes($_REQUEST['email']);
            //escapes special characters in a string
        $email = mysqli_real_escape_string($con,$email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con,$password);
        //Checking is user existing in the database or not
            $query = "SELECT * FROM users WHERE email='$email'
    and password='$password'";
        $result = mysqli_query($con,$query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
            if($rows==1){
            $_SESSION['email'] = $email;
                // Redirect user
            header("Location:https://digitalfoodmap.ca/havefood.php");

                }
                else{
        echo "<div class='form' style='padding-top:10%;'>
    <h3>Username/password is incorrect.</h3>
    <br/>Click here to <a href='havefood-login.php'>Login</a></div>";
        }
        }else{

    ?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Digital Food Map</title>
    <link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
  </head>
    
  <body>
    <nav class="site-header sticky-top py-1">
      <div class="container d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2" href="index.php">
          <img src="img/logo.png" height="40px" width="40px"/> Digital Food Map
        </a>
        <a class="py-2 d-none d-md-inline-block" href="#">Admin Login</a>
      </div>
    </nav>




<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3 bg-light">
    <div class="col-md-4 p-lg-4 my-4 "></div>
    
    <div class="col-md-4 p-lg-4 my-4 ">
        <form class="form-signin" action="" method="post">
         <h1 class="h3 mb-3 font-weight-normal text-center">Please Login!</h1>    
          <label for="inputEmail" class="sr-only">Email address</label>
          <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox"> Remember me.
            </label>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        </form><br>
        <p>New Here? Please <a href="havefood-register.php">Register Here.</a></p>
    </div>
        <div class="col-md-4 p-lg-4 my-4 "></div>
</div>

<?php
    }
 require('partial/footer.php');
?>
