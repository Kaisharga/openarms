<?php

$sql = "
SELECT m.* 
FROM members m
WHERE 1=1
"; 

if (isset($_GET['search']) && isset($_GET['search_name'])) {
	$text = $_GET['search'];
	$sql = $sql . " AND (m.first_name LIKE '%" . $text . "%' OR m.last_name LIKE '%" . $text . "%')";
} else if (isset($_GET['search']) && isset($_GET['search_addr'])) {
		$text = $_GET['search'];
		$sql = $sql . " AND (m.addr_line_1 LIKE '%" . $text . "%' OR m.addr_line_2 LIKE '%" . $text . "%' OR m.city LIKE '%" . $text . "%' OR m.zipcode LIKE '%" . $text . "%')";
}

$sql = $sql . "
ORDER BY LAST_NAME ASC
";


if ($res = mysqli_query($link, $sql)) { 
    if (mysqli_num_rows($res) > 0) { 
        echo "<table bgcolor=black valign=top>"; 
        while ($row = mysqli_fetch_array($res)) { 
            echo "<tr><td>";
			echo "<a href=index.php?member_id=".$row['member_id'].">";
			if($row['validated'] == 1) { echo "<font color=lightgreen>"; }else{ echo ""; }			
			echo $row['last_name'].",".$row['first_name']." (".$row['family_size'].")";
			echo "</font></a></td></tr>"; 
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