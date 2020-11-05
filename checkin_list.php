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
$page = (intval(isset($_GET['page']) ? $_GET['page'] : '1') - 1) * 20;

echo "<table><tr><td>";

$sql = "
SELECT mem.*, 
(
    SELECT COALESCE(MAX(v.visit_date), 0)
    FROM visits v 
    WHERE mem.member_id=v.member_id AND MONTH(v.visit_date) = MONTH(CURDATE()) AND YEAR(v.visit_date) = YEAR(CURDATE()) AND v.commodities_box > 0
) last_commodities,
(
    SELECT COALESCE(MAX(v.visit_date), 0)
    FROM visits v 
    WHERE mem.member_id=v.member_id AND DAY(v.visit_date) = DAY(CURDATE()) AND MONTH(v.visit_date) = MONTH(CURDATE()) AND YEAR(v.visit_date) = YEAR(CURDATE())
) last_visit
,ROW_NUMBER() OVER (ORDER BY mem.last_name ASC, mem.first_name ASC) AS intRow
FROM 
(
SELECT m.*
FROM
members m
WHERE 1=1
"; 

if (isset($_GET['search'])) 
{
	$text = $_GET['search'];
	$sql = $sql . " AND (m.first_name LIKE '%" . $text . "%' OR m.last_name LIKE '%" . $text . "%'";
	$sql = $sql . " OR m.addr_line_1 LIKE '%" . $text . "%' OR m.addr_line_2 LIKE '%" . $text . "%' OR m.city LIKE '%" . $text . "%' OR m.zipcode LIKE '%" . $text . "%')";
}

$sql = $sql . "
ORDER BY m.last_name ASC, m.first_name ASC
"
. "LIMIT " . $page . ",20"
. "
) mem
";

if ($res = mysqli_query($link, $sql)) { 
    if (mysqli_num_rows($res) > 0) { 
		echo "<table bgcolor=black><tr><td>";
		echo "<table bgcolor=white valign=top border=1 padding=16>";
    echo "<tr><th align=left>Name <i>(Family size)</i></th><th align=left>Address</th><th>Commodities Box</th><th></th></tr>";
        
		while ($row = mysqli_fetch_array($res)) { 
			echo "<form action=checkit_in.php id=memberList method=POST>";
						
			if($row['intRow'] % 2 == 0) {
				echo "<tr bgcolor=2B2D2F color=white><td>";
			}
			else {
				echo "<tr bgcolor=black color=white><td>";
			}

			if($row['validated'] == 1) { 
				echo "<font size=+3 color=lightgreen>"; 
			}
			else { 
				echo "<font size=+3 color=white>"; 
			}

			echo $row['last_name'].",".$row['first_name']." (".$row['family_size'].")";
			echo "</font></td><td><p style='color:white;margin:5px;'>";
			echo $row['addr_line_1']."<br>".$row['addr_line_2']."<br>".$row['city'].", ".$row['state']." ".$row['zipcode'];
			echo "</p></td>";
			echo "<td align=center><font size=+2 color=white>";

			if($row['last_commodities'] == 0) {
				echo "eligible <input type=checkbox name=commodities> "; 
			}
			else {
				echo $row['last_commodities'];
			}

			if($row['last_visit'] == 0) {
				echo "</td><td><button name=checkin value=checkin>CHECK IN</button></td></tr>"; 
			}
			else {
				echo "</td><td><button name=checkin disabled value=checkedin>CHECKED IN</button></td></tr>";
			}

?><input type="hidden" id="member_id" name="member_id" value="<?php echo $row['member_id']; ?>"> <?php
?><input type="hidden" id="line_number" name="line_number" value="<?php echo $mline; ?>"> <?php
?><input type="hidden" id="commodities_box_num" name="commodities_box_num" value="<?php echo $mbox; ?>"> <?php
?><input type="hidden" id="commodities_line_num" name="commodities_line_num" value="<?php echo $mboxline; ?>"> <?php
			echo "</form>";
        } 
        echo "</table>";
	echo "</tr></td></table>"; 
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

