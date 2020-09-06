<?php

date_default_timezone_set('America/Denver');
$link = mysqli_connect("localhost", "openarms", "4rms0p3n!", "openarms");
if ($link == false) { 
    echo "ERROR: Could not connect. "
                .mysqli_connect_error(); 
} 

$line_sql = '
SELECT 
	m.*
	,v.*
FROM 
	members m
	INNER JOIN visits v ON m.member_id=v.member_id
WHERE  v.visit_date="'.date("Y-m-d").'"
ORDER BY v.line_number ASC
';

if ($res = mysqli_query($link, $line_sql)) { 
    if (mysqli_num_rows($res) > 0) {
			echo "<table bgcolor=black><tr><td>"; 
			echo "<table bgcolor=white border=1>";
			echo "<tr><th colspan=4>Today's Line for<br>".date("l, F jS Y")."</th></tr>";
				
		while ($row = mysqli_fetch_array($res)) { 
			echo "<tr><td>";				
				
			if($row['validated'] == 1) { 
				echo "<font size=+2 color=green>"; 
			}
			else { 
				echo "<font size=+2 color=black>"; 
			}

			echo $row['last_name'].",".$row['first_name']." (".$row['family_size'].")";
			echo "</font></td>"; 

			if($row['commodities_box']==1){ 
				echo "<td><table><tr><td align=center><font>Box # ".$row['commodities_box_num']."</font></td></tr></table></td>";
			} 
			else {
				echo "<td></td>";	
			}

			echo "<td style='padding: 5px; font-weight: bold;'>#".$row['line_number']."</td>";

	    echo "<td><form onsubmit='return confirmDelete()' action=deleteit_in.php method=POST><button name=checkin value=checkin>DELETE</button></td></tr>"; 
?><input type="hidden" id="member_id" name="member_id" value="<?php echo $row['member_id']; ?>"> <?php
?><input type="hidden" id="line_number" name="line_number" value="<?php echo $mline; ?>"> <?php
?><input type="hidden" id="commodities_box_num" name="commodities_box_num" value="<?php echo $mbox; ?>"> <?php
?><input type="hidden" id="commodities_line_num" name="commodities_line_num" value="<?php echo $mboxline; ?>"> <?php
	echo "</form>";
 
	echo "</td></tr>";
        } 
        echo "</td></tr></table>";
	echo "</table>"; 
    } else { 
        echo "No matching records are found."; 
    } 
} else { 
    echo "ERROR: Could not able to execute $line_sql. "
                                .mysqli_error($link); 
} 
?>

<script>
function confirmDelete() {
    if( confirm("Are you sure you want to delete this entry?") ) {
        return true;
    } else {
        return false;
    }
}
</script>