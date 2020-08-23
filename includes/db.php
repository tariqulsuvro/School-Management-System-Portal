<?php
      $db = mysqli_connect("localhost","root","","ss-platform");

      if (!$db){
      	die("database connection failed" . mysqli_error($db));
      }
      else{
      	echo "database connection established";
      }
?>