<?php
  include 'connect.php';
 
    session_start();
    $city = $_SESSION['city'];

    $query= "SELECT * FROM maps WHERE city='$city' LIMIT 1 ";
    $output=mysqli_query($con,$query);
        if(!$output)
        {
         die("Sorry, no city found!");
        }
        $count= mysqli_num_rows($output);

        if($count>0) {
          $n=1;
          $total=0;
          $flag=0;
          $check=0;
          $mess="";
          $row= mysqli_fetch_assoc($output);
          $santaMessage= $row["city"] + $row["ID"];
          $apikey = "AIzaSyAeZ8t82WAtGygbtLtcZgoME5BhJShmho8";
          $id = $row["ID"];
          $lat = 0;
          $long = 0;
          $zoom = 8;

          $findmap = "SELECT centerLat, centerLong, zoom, city FROM maps WHERE ID = '".$id."'; ";

          if(!$result = $con->query($findmap)){
             die('There was an error running the query [' . $con->error . ']');
          } else {
            $row = $result->fetch_assoc();
            $lat = $row['centerLat'];
            $long = $row['centerLong'];
            $zoom = $row['zoom'];
            $city = $row['city'];
          }   
 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport"
        content="initial-scale=1.0, user-scalable=no" />
    <meta charset="utf-8">
    <meta name="description" content="">
    <title>Digital Food Map</title>
    <link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
      
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map-canvas { height: 90% }
    </style>
      
    <script type="text/javascript">
      function initMap() {
        var mapOptions = {
          center: new google.maps.LatLng(<?php echo $lat.', '.$long; ?>),
          zoom: <?php echo $zoom; ?>
        };
        var map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);
        <?php
          $getpoints = "SELECT pointLat, pointLong, pointText 
              FROM mappoints WHERE mapID = $id";

          if(!$result = $con->query($getpoints)){
            die("There was an error running the query
            [' . $con->error . ']");
            }

            else {
            while ($row = $result->fetch_assoc()) {
            echo "var myLatlng1 = new google.maps.LatLng($row[pointLat], $row[pointLong]);
            var marker1 = new google.maps.Marker({
            position: myLatlng1,
            map: map,
            title: '$row[pointText]'
            });";
            }
            }

        ?>
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
      <script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo $apikey; ?>&callback=initMap"
  type="text/javascript"></script>  
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
    
    <div id="map-canvas"/>
  </body>
</html>

    <?php       
        mysqli_free_result($output);
        //close connection//
        mysqli_close($con);

        }
     require('partial/footer.php');

?>