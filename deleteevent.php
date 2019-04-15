<?php
  require('partial/header.php');
  require('connect.php');

if(isset($_GET['id'])) 
    {
     $id = $_GET['id'];
     $query= "DELETE FROM events WHERE id='$id'";
     $output=mysqli_query($con,$query);   
        if(!$output)
        {
         die("database error, no record found");
        }
    echo "<br><br><h2>The event has been deleted, return to <a href=\"/map/admin-dashboard.php\">Dashboard</a></h2>";
    }
?>