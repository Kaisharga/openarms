<?php

INCLUDE("header.php");

echo "<h2 valign=top>QUICK REPORT</h2>";

echo "<table bgcolor=black><tr><td>";
echo "<table bgcolor=white>";
echo "<tr><th colspan=4>".date("D F d Y g:i")."</th></tr>";
echo "<tr><td>";
INCLUDE("to_date.php");
echo "</td><td>";
INCLUDE("month_to_date.php");
echo "</td><td>";
INCLUDE("year_to_date.php");
echo "</td><td>";
INCLUDE("life_to_date.php");
echo "</td></tr></table>";
echo "</td></tr></table>";
INCLUDE("footer.php");
?> 