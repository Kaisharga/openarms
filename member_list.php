<?php
$sql = "SELECT * FROM members ORDER BY LAST_NAME"; 




if ($res = mysqli_query($link, $sql)) { 
    if (mysqli_num_rows($res) > 0) { 
        echo "<table bgcolor=grey valign=top>"; 
        while ($row = mysqli_fetch_array($res)) { 
            echo "<tr><td><a href=index.php?member_id=".$row['member_id'].">"; 	
			echo $row['last_name'].",".$row['first_name']." ".$row['family_size']."</td></tr>"; 
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