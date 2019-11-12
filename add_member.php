<?php
INCLUDE "dbcon.php";

echo "<table>";
echo "<tr><th colspan=2>New Member</th></tr>";
echo "<tr><td>First name:</td><td>". $_GET['first_name'] ."</td></tr>";
echo "<tr><td>Last name:</td><td>". $_GET['last_name'] ."</td></tr>";
echo "<tr><td>Family size:</td><td>". $_GET['family_size'] ."</td></tr>";
echo "<tr><td>Family 65 or over:</td><td>". $_GET['over64'] ."</td></tr>";
echo "<tr><td>Family 18 or younger:</td><td>". $_GET['under19'] ."</td></tr>";
echo "<tr><td>Address Line 1:</td><td>". $_GET['addr_line_1'] ."</td></tr>";
echo "<tr><td>Address Line 2:</td><td>". $_GET['addr_line_2'] ."</td></tr>";
echo "<tr><td>City:</td><td>". $_GET['city'] ."</td></tr>";
echo "<tr><td>State:</td><td>". $_GET['state'] ."</td></tr>";
echo "<tr><td>Zip Code:</td><td>". $_GET['zipcode'] ."</td></tr>";
echo "<tr><td>Jeffco Resident:</td><td>". $_GET['jeffco_resident'] ."</td></tr>";
echo "<tr><td>Ethnicity:</td><td>". $_GET['ethnicity'] ."</td></tr>";
echo "</table><br>";

$isql ='INSERT INTO members (
member_date   
,first_name
,last_name
,family_size
,over64
,under19
,addr_line_1
,addr_line_2
,city
,state
,zipcode
,jeffco_resident
,ethnicity
,data_review_date
) VALUES ("'
.date("Ymd").'","'
. $_GET['first_name'] .'","'
. $_GET['last_name'] .'","'
. $_GET['family_size'] .'","'
. $_GET['over64'] .'","'
. $_GET['under19'] .'","'
. $_GET['addr_line_1'] .'","'
. $_GET['addr_line_2'] .'","'
. $_GET['city'] .'","'
. $_GET['state'] .'","'
. $_GET['zipcode'] .'","'
. $_GET['jeffco_resident'] .'","'
. $_GET['ethnicity'] .'","'
.date("Ymd").'")';

echo $isql;

#if($link->query($isql) === TRUE)
#{
#	echo "<br> New Record created successfully";
#} else {
#	echo "<br> Error: ".$isql."<br>".$link->error;
#}


?>
