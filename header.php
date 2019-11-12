<!DOCTYPE html>
<html lang="en">
<head>
<title>OPEN ARMS</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

/* navigation links */
a {
  color: white;
  padding: 16px;
  text-decoration: none;
  display: block;
}

/* Change color on hover */
a:hover {
  background-color: #ddd;
  color: black;
}

</style>
</head>
<body>
<?php
date_default_timezone_set('America/Denver');
$link = mysqli_connect("localhost", "openarms", "4rms0p3n!", "openarms"); 
  
if ($link == false) { 
    die("ERROR: Could not connect. "
                .mysqli_connect_error()); 
} 


echo "<table bgcolor=white height=100%><tr><td valign=top>";
echo "<table align=center bgcolor=black width=240><tr><td align=center>";
echo "<a href=index.php>";
echo "<img src=img/openarms.png>";
echo "</a>";
echo "</td></tr><tr><td align=center>";
echo "<a href=daily_checkin.php>DAILY CHECK-IN</a>";
echo "</td></tr><tr><td align=center>";
echo "<a href=daily_commodities.php>DAILY COMMODITIES</a>";
echo "</td></tr><tr><td align=center>";
echo "<a href=index.php>MEMBERS</a>";
echo "</td></tr><tr><td align=center>";
echo "<a href=reports.php>REPORTS</a>";
echo "</td></tr><tr><td align=center>";
echo "<a href=reports_select.php>REPORT SELECTION</a>";
echo "</td></tr></table>";
echo "</td><td valign=top>";

?>
