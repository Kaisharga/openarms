<?php
include("header.php");

echo "<h2 valign=top>DAILY COMMODITIES</h2>";


$sql = '
	SELECT 
	m.*
	,v.*
	FROM 
	members m
	,visits v
	WHERE m.member_id=v.member_id
	AND v.commodities_box=1
	AND v.visit_date="' . date("Y-m-d") . '"
	ORDER BY commodities_box_pack ASC, commodities_box_num ASC
';

if ($res = mysqli_query($link, $sql)) {
	if (mysqli_num_rows($res) > 0) {
		echo "<table>";
		echo "<tr>";
		while ($row = mysqli_fetch_array($res)) {
			if ($row['commodities_box_pack'] == 0) {
				echo "<td align=center><form action=print_label.php method=get><table border=1 width=250><tr><td>";
				echo "<img src=img/box_open.jpeg height=50 width=50>";
				echo "<table width=100%><tr><td>Box #</td><td>" . $row['commodities_box_num'] . "</td></tr>";
				echo "<tr><td>Member:</td><td>" . $row['first_name'] . " " . $row['last_name'] . "</td></tr>";
				echo "<tr><td>Family Size:</td><td>" . $row['family_size'] . "</td></tr>";
				echo "<tr><td>" . date("D M d Y") . "</td></tr>";
				echo "<tr><td><button name=caction value=print>PRINT LABEL</button></td>";
				echo "<td><button name=caction formaction=pack.php value=pack>PACK BOX</button></td></tr></table>";
				echo "</td>";
?><input type="hidden" name="member_id" value="<?php echo $row['member_id']; ?>"> <?php
																					?><input type="hidden" name="visit_id" value="<?php echo $row['visit_id']; ?>"> <?php
																																									?><input type="hidden" name="visit_date" value="<?php echo $row['visit_date']; ?>"> <?php
																																																														?><input type="hidden" name="commodities_box_num" value="<?php echo $row['commodities_box_num']; ?>"> <?php
																																																																																								echo "</form>";
																																																																																							} else {
																																																																																								echo "<td align=center><form action=print_label.php method=get><table border=1 width=250><tr><td>";
																																																																																								echo "<img src=img/packed_box.jpg height=50 width=50>";
																																																																																								echo "<table width=100%><tr><td>Box #</td><td>" . $row['commodities_box_num'] . "</td></tr>";
																																																																																								echo "<tr><td>Member:</td><td>" . $row['first_name'] . " " . $row['last_name'] . "</td></tr>";
																																																																																								echo "<tr><td>Family Size:</td><td>" . $row['family_size'] . "</td></tr>";
																																																																																								echo "<tr><td>" . date("D M d Y") . "</td></tr>";
																																																																																								echo "<tr><td><button name=caction value=print>PRINT LABEL</button></td>";
																																																																																								echo "<td>PACKED BOX</td></tr></table>";
																																																																																								echo "</td>";
																																																																																								?><input type="hidden" name="member_id" value="<?php echo $row['member_id']; ?>"> <?php
																																																																																																													?><input type="hidden" name="visit_id" value="<?php echo $row['visit_id']; ?>"> <?php
																																																																																																												?><input type="hidden" name="visit_date" value="<?php echo $row['visit_date']; ?>"> <?php
																																																																																																													?><input type="hidden" name="commodities_box_num" value="<?php echo $row['commodities_box_num']; ?>"> <?php
																																																																																																																		echo "</form>";
																																																																																																																	}
																																																																																																																	echo "</tr></td></table>";
																																																																																																																}
																																																																																																																echo "</table>";
																																																																																																															} else {
																																																																																																																echo "No matching records are found.";
																																																																																																															}
																																																																																																														} else {
																																																																																																															echo "ERROR: Could not able to execute $sql. "
																																																																																																																. mysqli_error($link);
																																																																																																														}


																																																																																																														#echo '</div>';

																																																																																																														include("footer.php");

																																																																																																																		?>