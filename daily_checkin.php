<?php
INCLUDE("header.php");
?>

<div>
<table>
<tr><td>
<h2 valign=top>DAILY CHECK-IN</h2>
</td><td>
	<form action=daily_checkin.php method=GET style='display:inline-block'>
	<font color=white>Name:</font>
	<input type=text name='search' />
	<button type="submit">Search</button>
	<button type="submit">Clear</button>
	</form>
</td></tr>
</table>	
</div>

<?php

echo "<table><tr><td valign=top>";
INCLUDE("today_visit_line.php");
echo "</td><td>";
INCLUDE("checkin_list.php");
echo "</td></tr></table>";

INCLUDE("footer.php");

?> 
