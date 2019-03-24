<?php
 require('partial/header.php');
?>

<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3 bg-light">
<!--
  <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
    <div class="my-3 py-3">
      <h2 class="display-5">Another headline</h2>
      <p class="lead">And an even wittier subheading.</p>
    </div>
  </div>
-->
<!--
  <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
    <div class="my-3 p-3">
      <h2 class="display-5">Another headline</h2>
      <p class="lead">And an even wittier subheading.</p>
    </div>
      
  </div>
-->
    <div class="col-md-2 p-lg-2 my-2 "></div>
    
    <div class="col-md-4 p-lg-4 my-4 ">
        <form class="form-signin">
         <h1 class="h3 mb-3 font-weight-normal text-center">Already a user? Please Login!</h1>    
          <label for="inputEmail" class="sr-only">Email address</label>
          <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required>
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me.
            </label>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        </form>
    </div>
    
    <div class="col-md-4 p-lg-4 my-4 bg-light">
        <form class="form-signin">
          <h1 class="h3 mb-3 font-weight-normal text-center">New here? Sign-up to start!</h1>
          <label for="inputName" class="sr-only">Name</label>
            <input type="text" id="inputName" class="form-control" placeholder="Name" required autofocus>    
          <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required>
          <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>    
          <label for="inputCell" class="sr-only">Cell</label>
            <input type="text" id="inputCell" class="form-control" placeholder="Cell Number">
          <label for="inputAddress" class="sr-only">Address</label>
            <input type="text" id="inputAddress" class="form-control" placeholder="Address">
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Accept our privacy policy, terms and conditions.
            </label>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Sign-up</button>
        </form>
    </div>
        <div class="col-md-2 p-lg-2 my-2 "></div>
</div>

<?php
 require('partial/footer.php');
?>
