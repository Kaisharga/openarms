<?php $link = mysqli_connect("localhost", "openarms", "<password>", "openarms"); 
  
if ($link == false) { 
    die("ERROR: Could not connect. "
                .mysqli_connect_error()); 
} 
?>
