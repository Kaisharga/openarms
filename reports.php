<?php

INCLUDE("header.php");

echo "<h2 valign=top>REPORTS</h2>";

echo date("D F d Y g:i");
INCLUDE("month_to_date.php");
INCLUDE("year_to_date.php");
INCLUDE("life_to_date.php");

INCLUDE("footer.php");
?> 