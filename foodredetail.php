<?php
  require('partial/header.php');
  require('connect.php');

    if(isset($_GET['id'])) 
    {
     $id = $_GET['id'];
     $query= "SELECT * FROM foodreq WHERE id='$id'";
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
          $persondetails= $row["name"] . $row["email"] . $row["address"] . $row["details"];
        ?>
        <br><br>
        <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3 bg-light">
         <div class="col-md-1 p-lg-1 my-1 "></div>
         <div class="col-md-10 p-lg-10 my-10 ">
         <h1><?php echo $row['name']; ?> requested food!</h1>
         </div>
         <div class="col-md-1 p-lg-1 my-1 "></div>
        </div>
        <br>
        <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3 bg-light">
         <div class="col-md-1 p-lg-1 my-1 "></div>
         <div class="col-md-10 p-lg-10 my-10 ">
            <table>
                <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Details</th>
                </tr>
                <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['details']; ?></td>
                </tr>
            </table>
         </div>
         <div class="col-md-1 p-lg-1 my-1 "></div>
        </div>
      <br><br><br><br>


<?php
        } 
     mysqli_free_result($output);
     //close connection//
     mysqli_close($con);
     }
     require('partial/footer.php');        
?>