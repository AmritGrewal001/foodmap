<?php
 require('partial/header.php');

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
            header("Location: /map/havefood.php");

                }
                else{
        echo "<div class='form' style='padding-top:10%;'>
    <h3>Username/password is incorrect.</h3>
    <br/>Click here to <a href='havefood-login.php'>Login</a></div>";
        }
        }else{

    ?>





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
              <input type="checkbox" value="remember-me"> Remember me.
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
