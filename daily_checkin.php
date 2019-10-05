<?php

INCLUDE("header.php");

echo "<h2 valign=top>DAILY CHECK-IN</h2>"; 
echo "<table><tr><td valign=top>";
INCLUDE("today_visit_line.php");
echo "</td><td>";
INCLUDE("checkin_list.php");
echo "</td></tr></table>";



INCLUDE("footer.php");


?> 