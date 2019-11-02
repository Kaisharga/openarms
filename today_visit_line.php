<?php

$line_sql = '
SELECT 
	m.*
	,v.*
FROM 
	members m
	INNER JOIN visits v ON m.member_id=v.member_id
WHERE  v.visit_date="'.date("Y-m-d").'"
 ';
 
 if (isset($_GET['search'])) {
	$text = $_GET['search'];
	$line_sql = $line_sql . " AND (m.first_name LIKE '%" . $text . "%' OR m.last_name LIKE '%" . $text . "%')";
 }
  
 $line_sql = $line_sql . "
ORDER BY v.line_number ASC
";

if ($res = mysqli_query($link, $line_sql)) { 
    if (mysqli_num_rows($res) > 0) { 
        echo "<table border=1>";
		echo "<tr><th colspan=2>Today's Line for<br>".date("l F jS Y")."</th></tr>";
        while ($row = mysqli_fetch_array($res)) { 

            echo "<tr><td><table>";
			echo "<tr><td>".$row['line_number'].":</td>";
            echo "<td>".$row['last_name'].",".$row['first_name']."</td>"; 
			if($row['commodities_box']==1){ 
			echo "<td>commodites box: ".$row['commodities_box_num']."</td>";
			} else {
			echo "<td></td>";	
			}
            echo "<td><font size=-1><i>family size ".$row['family_size']."</i></font></td>";

			echo "</tr></table>"; 
			echo "</td></tr>";
        } 
        echo "</table>"; 
    } else { 
        echo "No matching records are found."; 
    } 
} else { 
    echo "ERROR: Could not able to execute $sql. "
                                .mysqli_error($link); 
} 
?>
