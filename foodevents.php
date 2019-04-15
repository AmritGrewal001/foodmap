<?php
  require('partial/header.php');
  require('connect.php');
?>

  <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3 bg-light">
    <div class="col-md-1 p-lg-1 my-1 "></div>
    <div class="col-md-10 p-lg-10 my-10 "><h2>Upcoming Events!</h2></div>
    <div class="col-md-1 p-lg-1 my-1 "></div>   
  </div> <br>
  <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3 bg-light">
    <div class="col-md-1 p-lg-1 my-1 "></div>
    <div class="col-md-10 p-lg-10 my-10 ">
    <table>
        <tr>
            <th style="width: 150px;">Event Name</th>
            <th style="width: 150px;">Event Date</th>
            <th>Event Detail</th>
        

<?php

     $query= "SELECT * FROM events";
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
          
          while($row= mysqli_fetch_assoc($output))
              {
//            $row= mysqli_fetch_assoc($output);
//          $eventdetails= $row["id"] + $row["eventName"] + $row["eventDate"] + $row["eventDetails"];
        ?>
                </tr>
                <tr>
                <td><?php echo $row['eventName']; ?></td>
                <td><?php echo $row['eventDate']; ?></td>
                <td><?php echo $row['eventDetails']; ?></td>
                </tr>



<?php
        } 
?>
        
          </table>
         </div>
         <div class="col-md-1 p-lg-1 my-1 "></div>
        </div><br><br><br>
<?php
     mysqli_free_result($output);
     //close connection//
     mysqli_close($con);
     }
     require('partial/footer.php');        
?>