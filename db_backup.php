<?php
date_default_timezone_set('America/Denver');
INCLUDE "dbcon.php";

$date_string   = date("Y-m-d-H-i-s");

$table_name = "members";
$backup_file  = "C:/backups/$date_string-$table_name.sql";
$sql = "SELECT * INTO OUTFILE '$backup_file' FROM $table_name";

$retval = mysqli_query($link,$sql);

if(! $retval ) {
   die('Could not take data backup of $table_name: ' . mysqli_error($link));
}
echo "<br> ".$table_name." successfully backed up.";

$table_name = "visits";
$backup_file  = "C:/backups/$date_string-$table_name.sql";
$sql = "SELECT * INTO OUTFILE '$backup_file' FROM $table_name";

$retval = mysqli_query($link,$sql);

if(! $retval ) {
   die('Could not take data backup of $table_name: ' . mysqli_error($link));
}
echo "<br> ".$table_name." successfully backed up.";

?>
