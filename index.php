<?php

INCLUDE("header.php");

echo "<h2 valign=top>MEMBERS</h2>"; 



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