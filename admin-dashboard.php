<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Digital Food Map</title>
    <link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
      
      <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }

        tr:nth-child(even) {
          background-color: #dddddd;
        }
      </style>

      
  </head>
    
  <body>
    <nav class="site-header sticky-top py-1">
      <div class="container d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2" href="index.php">
          <img src="img/logo.png" height="40px" width="40px"/> Digital Food Map
        </a>
        <a class="py-2 d-none d-md-inline-block" href="admin-logout.php">Admin Logout</a>
      </div>
    </nav>
      
<?php
  require('connect.php');
?>

  <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3 bg-light" >      
        <?php
        $query= "SELECT * FROM mappoints";
//        $id = isset($_GET['id']) ? $_GET['id'] : '';
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
        ?>
        <div class="col-md-4 p-lg-4 my-4" style="background: #e2e2e2;">
        <h3>List of all food resources on map</h3>
        <?php
              while($row= mysqli_fetch_assoc($output))
              {
                echo "<br><ul>". $row["pointText"]. " &nbsp; <a class='btn btn-danger'  href='/map/deleteresource.php?id=" . $row['ID'] . "'>DELETE</a></ul><br>";
              }
          } 
    
        ?>
        </div>
       
    <?php
      $query= "SELECT id, name, email, address, details FROM foodreq";
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
        ?>
        <div class="col-md-4 p-lg-4 my-4" style="background: #eaeaea;">
        <h3>List of all people requesting food</h3>
        <?php
              while($row= mysqli_fetch_assoc($output))
              {
                echo "<br> 
                <ul>
                    <a href='/map/foodredetail.php?id=" . $row['id'] . "'> " . $row['name'] . "</a> <br></ul>";                
              }
        }
        ?>
        </div>
        
        
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
        ?>
        <div class="col-md-4 p-lg-4 my-4" style="background: #e2e2e2;">
        <h3>List of all events</h3>
        <?php
              while($row= mysqli_fetch_assoc($output))
              {
                echo "<br> 
                <ul>
                   <a href='/map/foodeventdetail.php?id=" . $row['id'] . "'> " . $row['eventName'] . "</a> &nbsp; <a class='btn btn-dark'  href='/map/editEvent.php?id=" . $row['id'] . "'> <span >EDIT</span></a> &nbsp; <a class='btn btn-danger'  href='/map/deleteevent.php?id=" . $row['id'] . "'> <span >DELETE</span></a> <br></ul>"; 
              }
        }
        ?>
            <br>
         <a class="btn btn-primary" href="addevent.php">Add a New Food Event</a>
        </div>
  </div>


    
    <?php      
        mysqli_free_result($output);
        //close connection//
        mysqli_close($con);
        // }
        require('partial/footer.php');        
    ?>
