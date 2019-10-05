<?php
$maxline = 'SELECT MAX(line_number) as max_line from visits WHERE visit_date="'.date("Y-m-d").'"';
$maxbox = 'SELECT MAX(commodities_box_num) as max_box from visits WHERE visit_date="'.date("Y-m-d").'"';
$maxboxline = 'SELECT MAX(commodities_line_num) as max_boxline from visits WHERE visit_date="'.date("Y-m-d").'"';

if ($res = mysqli_query($link, $maxline)) { 
    if (mysqli_num_rows($res) > 0) { 
		while ($row = mysqli_fetch_array($res)) { 
			$mline=$row['max_line'];
		}
	}
}
if ($res = mysqli_query($link, $maxbox)) { 
    if (mysqli_num_rows($res) > 0) { 
		while ($row = mysqli_fetch_array($res)) { 
			$mbox=$row['max_box'];
		}
	}
}
if ($res = mysqli_query($link, $maxboxline)) { 
    if (mysqli_num_rows($res) > 0) { 
		while ($row = mysqli_fetch_array($res)) { 
			$mboxline=$row['max_boxline'];
		}
	}
}
#add one to max line for next input
$mline++;
$mbox++;
$mboxline++;

echo "<table><tr><td>";

$sql = "SELECT * FROM members ORDER BY LAST_NAME ASC"; 

if ($res = mysqli_query($link, $sql)) { 
    if (mysqli_num_rows($res) > 0) { 
        echo "<table bgcolor=grey valign=top>"; 
        while ($row = mysqli_fetch_array($res)) { 
		
				
#		$last_comm='
#			SELECT 
#				MAX(m.visit_date) AS last_commodities
#			FROM visits m 
#			WHERE m.member_id="'.$row['member_id'].'" 
#			 AND m.commodities_box=1';
		
#		echo $last_comm;
		
#		if ($ras = mysqli_query($link, $last_comm)) { 
#			if (mysqli_num_rows($ras) > 0) {
#				while ($raw = mysqli_fetch_array($res)) { 
#					if($raw['last_commodities'] < strtotime('-30 days')) {
#						#echo 'The date was more than 30 days ago.';
#						$comm_eli=1;
#					} else {
#						$comm_eli=0;
#						$lastc=$raw['last_commodities'];
#					}
#				}
#			} else {
#				$comm_eli=1;
#			}
#		}
		
			echo "<form action=checkit_in.php method=POST>";
            echo "<tr><td><button name=checkin value=checkin>CHECK IN</button>"; 	
			if($comm_eli="1") {echo "commodties box eligible <input type=checkbox name=commodities> "; 
			}else{
			echo "last commodties box ".$lastc." ";
			}
			echo $row['last_name'].",".$row['first_name']." ".$row['family_size'];
			echo "</td></tr>"; 
?><input type="hidden" id="member_id" name="member_id" value="<?php echo $row['member_id']; ?>"> <?php
?><input type="hidden" id="line_number" name="line_number" value="<?php echo $mline; ?>"> <?php
?><input type="hidden" id="commodities_box_num" name="commodities_box_num" value="<?php echo $mbox; ?>"> <?php
?><input type="hidden" id="commodities_line_num" name="commodities_line_num" value="<?php echo $mboxline; ?>"> <?php
			echo "</form>";
        } 
        echo "</table>"; 
    } 
    else { 
        echo "No matching records are found."; 
    } 
} 
else { 
    echo "ERROR: Could not able to execute $sql. "
                                .mysqli_error($link); 
} 

?>