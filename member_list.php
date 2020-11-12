<?php

$page = (intval(!empty($_GET['page']) ? $_GET['page'] : '1') - 1) * 20;

$sql = "
SELECT m.* 
FROM members m
WHERE 1=1
"; 

if (!empty($_GET['search'])) 
{
	$text = $_GET['search'];
	$sql = $sql . " AND (m.first_name LIKE '%" . $text . "%' OR m.last_name LIKE '%" . $text . "%'";
	$sql = $sql . " OR m.addr_line_1 LIKE '%" . $text . "%' OR m.addr_line_2 LIKE '%" . $text . "%' OR m.city LIKE '%" . $text . "%' OR m.zipcode LIKE '%" . $text . "%')";
}

$sql = $sql . "
ORDER BY m.last_name ASC, m.first_name ASC
"
. "LIMIT " . $page . ",20";

echo "<table><tr><td id='middle' style='vertical-align: top;'>";

if ($res = mysqli_query($link, $sql)) { 
    if (mysqli_num_rows($res) > 0) { 
        echo "<table bgcolor=black valign=top><tr><td>"; 
		echo "<table bgcolor=white valign=top border=1 padding=16>";
        echo "<tr><th align=left>Name <i>(Family size)</i></th><th align=left>Address</th></tr>";
        while ($row = mysqli_fetch_array($res)) { 
            echo "<tr bgcolor=black color=white><td>";

            echo "<a href=index.php?member_id=".$row['member_id'];
            if (!empty($_GET['search'])) 
            {
                echo "&search=";
                echo $_GET['search'];
                echo "&page=";
                echo (!empty($_GET['page'])) ? $_GET['page'] : '1';
            }
            echo ">";
			if($row['validated'] == 1) { echo "<font color=lightgreen>"; }else{ echo ""; }			
			echo $row['last_name'].",".$row['first_name']." (".$row['family_size'].")";
            echo "</font></a></td><td><p style='color:white;margin:5px;'>";
			echo $row['addr_line_1']."<br>".$row['addr_line_2']."<br>".$row['city'].", ".$row['state']." ".$row['zipcode'];
			echo "</p></td>";
            echo "</tr>";
        } 
        echo "</table>"; 
        echo "</td></tr></table>"; 
    } 
    else { 
        echo "No matching records are found."; 
    } 
} 
else { 
    echo "ERROR: Could not able to execute $sql. "
                                .mysqli_error($link); 
} 

echo "</td><td id='right' style='vertical-align: top;'>";
if (isset($_GET['member_id'])) 
{
	INCLUDE("member_view.php");
    echo "</td><td style='vertical-align: top;'>";
	INCLUDE("member_stats.php");	
}
ELSE
{
	INCLUDE("new_member.php");	
}
echo "</td></tr></table>";
?>