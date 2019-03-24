<?php
 require('partial/header.php');
?>

<div class="col-md-5 p-lg-5 mx-auto my-5 bg-light">
    <form class="form-signin">
      <h1 class="h3 mb-3 font-weight-normal text-center">Just need this information to make sure you get the food.</h1>
      <label for="inputName" class="sr-only">Name</label>
      <input type="text" id="inputName" class="form-control" placeholder="Name" required autofocus>    
      <label for="inputName" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required>
      <label for="inputCell" class="sr-only">Cell</label>
      <input type="text" id="inputCell" class="form-control" placeholder="Cell Number">
      <label for="inputAddress" class="sr-only">Address</label>
      <input type="text" id="inputAddress" class="form-control" placeholder="Address">
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Accept our privacy policy, terms and conditions.
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Find Food</button>
    </form>
</div>


<?php
 require('partial/footer.php');
?>
