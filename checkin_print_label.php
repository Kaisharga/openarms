<?php
date_default_timezone_set('America/Denver');
$link = mysqli_connect("localhost", "openarms", "4rms0p3n!", "openarms");
if ($link == false) { 
    echo "ERROR: Could not connect. "
                .mysqli_connect_error(); 
} 

$sql = '
SELECT 
	m.*
	,v.*
FROM 
	members m
	INNER JOIN visits v ON m.member_id=v.member_id
WHERE  v.visit_date="'.date("Y-m-d").'"
AND m.member_id="'.$_GET['member_id'].'"
ORDER BY v.line_number ASC
';

if ($res = mysqli_query($link, $sql)) {
	if (mysqli_num_rows($res) > 0) {
		while ($row = mysqli_fetch_array($res)) {
			echo "<table border=1 width=500><tr><td>";
				echo "<table width=100%>";

					echo "<tr><td colspan=2 align=center><font size=-2>";
					echo "<a href=daily_checkin.php>OPEN ARMS</a></font></td></tr>";				
					echo "<tr><td colspan=2 align=center>";
					echo "<table border=1><tr><td><table><tr><td><font size=-1>COMMODITIES BOX</font></td></tr>";
					echo "<tr><td align=center><font size=+9>" . $row['commodities_box_num'] . "</font></td></tr></table>";
					echo "</tr></td></table></td></tr>";
					echo "<tr><td align=center><font size=+4>" . $row['first_name'] . " " . $row['last_name'] . "";
					echo " (" . $row['family_size'] . ")</font></td></tr>";
					echo "<tr><td colspan=2 align=right><font size=+1>" . date("l, F d, Y") . "</font></td></tr>";
					
				echo "</table>";
			echo "</td></tr></table>";
		}
    }else{    
		echo "No matching records are found."; 
	}
} else { 
    echo "ERROR: Could not able to execute $line_sql. "
                                .mysqli_error($link); 
} 



?>
