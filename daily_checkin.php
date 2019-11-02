<?php
INCLUDE("header.php");
?>

<div>
	<h2 valign=top>DAILY CHECK-IN</h2>
</div>
<div>
	<form action=daily_checkin.php method=GET style='display:inline-block'>
		<input type=text name='search' />
		<button type="submit">Search</button>
	</form>
	<form action=daily_checkin.php method=GET style='display:inline-block'>
		<button type="submit">Clear</button>
	</form>
</div>

<?php

echo "<table><tr><td valign=top>";
INCLUDE("today_visit_line.php");
echo "</td><td>";
INCLUDE("checkin_list.php");
echo "</td></tr></table>";

INCLUDE("footer.php");

?> 
