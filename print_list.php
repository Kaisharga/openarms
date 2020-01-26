<?php
date_default_timezone_set('America/Denver');
$link = mysqli_connect("localhost", "openarms", "4rms0p3n!", "openarms");
if ($link == false) { 
    echo "ERROR: Could not connect. "
                .mysqli_connect_error(); 
} 

// line_number gets corrupted if any check-in entries are deleted.
$line_sql1 = '
SET @row_number = 0;  
';
$line_sql2 = '
SELECT 
	m.*
    ,v.*
    ,(@row_number:=@row_number + 1) AS row_num
FROM 
	members m
	INNER JOIN visits v ON m.member_id=v.member_id
WHERE  v.visit_date="'.date("Y-m-d").'"
ORDER BY v.line_number ASC;
';

$res1 = mysqli_query($link, $line_sql1);
if ($res2 = mysqli_query($link, $line_sql2)) { 
    if (mysqli_num_rows($res2) > 0) {
	    echo "<table bgcolor=black><tr><td>"; 
        echo "<table bgcolor=white border=1>";
		echo "<tr><th colspan=3>Today's Line for<br>".date("l F jS Y")."</th></tr>";
        while ($row = mysqli_fetch_array($res2)) { 

			echo "<tr><td><font size=+2> ";
			echo "&nbsp;".$row['row_num']." - ";
			if($row['validated'] == 1) { echo "<font size=+2 color=green>"; } else { echo "<font size=+2 color=black>NV [ "; }
            echo $row['last_name'].",".$row['first_name']." (".$row['family_size'].")";
			if($row['validated'] == 0) { echo " ]"; }			
			echo "</font></font></td>"; 
			if($row['commodities_box']==1){ 
			    echo "<td align=center><table><tr><td align=center><font size=-1>Box # <font size=+2>".$row['commodities_box_num']."</font>";
				echo "</font></td></tr></table></td>";
			} else {
			    echo "<td></td>";	
			}
        	echo "</td></tr>";
        } 
        echo "</td></tr></table>";
	    echo "</table>"; 
    } else { 
        echo "No matching records are found."; 
    } 
} else { 
    echo "ERROR: Could not able to execute $line_sql2. "
                                .mysqli_error($link); 
} 

// if (isset($_GET['list'])) {
//     $print_output = $_GET['list'];
//     echo $print_output;
// }
// try {
//     $fp = pfsockopen("192.168.1.201", 9100);
//     fputs($fp, $print_output);
//     fclose($fp);

//     echo 'Successfully Printed';
// } catch (Exception $e) {
//     echo 'Caught exception: ',  $e->getMessage(), "\n";
// }
?>