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

$sql = "
SELECT m.*, 
(
    SELECT COALESCE(MAX(v.visit_date), 0)
    FROM visits v 
    WHERE m.member_id=v.member_id AND v.visit_date > DATE_SUB(UTC_DATE(), INTERVAL 30 DAY) AND commodities_box_pack > 0
) last_commodities
FROM members m
WHERE 1=1
"; 

 if (isset($_GET['search'])) {
	$text = $_GET['search'];
	$sql = $sql . " AND (m.first_name LIKE '%" . $text . "%' OR m.last_name LIKE '%" . $text . "%')";
 }
 
$sql = $sql . "
ORDER BY LAST_NAME ASC
";

if ($res = mysqli_query($link, $sql)) { 
    if (mysqli_num_rows($res) > 0) { 
        echo "<table bgcolor=grey valign=top>"; 
        echo "<tr><th align=left>Name</th><th align=right>Commodities Box</th><th></th></tr>";
        while ($row = mysqli_fetch_array($res)) { 
		
			echo "<form action=checkit_in.php method=POST>";
            echo "<tr><td>";
			echo $row['last_name'].",".$row['first_name']." ".$row['family_size'];
			echo "</td><td align=right>";
			if($row['last_commodities'] == 0) {echo "eligible <input type=checkbox name=commodities> "; 
			}else{
				echo $row['last_commodities'];
			}
			echo "</td><td><button name=checkin value=checkin>CHECK IN</button></td></tr>"; 
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
