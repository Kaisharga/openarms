<?php

INCLUDE("header.php");
?>

<div>
<table>
<tr><td>
<h2 valign=top>MEMBERS</h2>
</td><td>
	<form action=index.php method=GET style='display:inline-block'>
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
INCLUDE("member_list.php");
echo "</td><td valign=top>";
if (isset($_GET['member_id'])) {
	INCLUDE("member_view.php");
		echo "</td><td valign=top>";
	INCLUDE("member_stats.php");	
}ELSE{
	INCLUDE("new_member.php");	
}
echo "</td></tr></table>";


INCLUDE("footer.php");


?> 