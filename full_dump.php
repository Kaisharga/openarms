<?php
$sql="
SELECT 
	m.member_id
	,m.member_date
	,m.first_name
	,m.last_name
	,m.family_size
	,m.over64
	,m.under19
	,m.addr_line_1
	,m.addr_line_2
	,m.city
	,m.state
	,m.zipcode
	,m.jeffco_resident
	,m.data_review_date
	,m.ethnicity
	,v.visit_id
	,v.visit_date
	,v.line_number
	,v.commodities_box
	,v.commodities_box_num
	,v.commodities_line_num
	,v.commodities_box_pack
FROM 
	members m
,visits v
WHERE m.member_id=v.member_id
AND v.visit_date >= '2019-01-15'
";

echo "<table><tr><td>";


if ($res = mysqli_query($link, $sql)) { 
    if (mysqli_num_rows($res) > 0) { 
        echo "<table bgcolor=grey valign=top>"; 
			echo "<tr><th>member_id</th>";
            echo "<th>first_name</th>"; 
            echo "<th>last_name</th>"; 
            echo "<th>family_size</th>"; 
			echo "<th>over64</th>"; 
			echo "<th>under19</th>"; 
			echo "<th>addr_line_1</th>"; 
			echo "<th>addr_line_2</th>"; 
			echo "<th>city</th>"; 
			echo "<th>state</th>"; 
			echo "<th>zipcode</th>"; 
			echo "<th>jeffco_resident</th>"; 
			echo "<th>data_review_date</th>"; 
			echo "<th>ethnicity</th>"; 
			echo "<th>visit_id</th>"; 
			echo "<th>visit_date</th>"; 
			echo "<th>line_number</th>"; 
			echo "<th>commodities_box</th>"; 
			echo "<th>commodities_box_num</th>"; 
			echo "<th>commodities_line_num</th>"; 
			echo "<th>commodities_box_pack</th>"; 
            echo "</tr>"; 
        while ($row = mysqli_fetch_array($res)) { 
			echo "<tr><td>".$row['member_id']."</td>";
            echo "<td>".$row['first_name']."</td>"; 
            echo "<td>".$row['last_name']."</td>"; 
            echo "<td>".$row['family_size']."</td>"; 
			echo "<td>".$row['over64']."</td>"; 
			echo "<td>".$row['under19']."</td>"; 
			echo "<td>".$row['addr_line_1']."</td>"; 
			echo "<td>".$row['addr_line_2']."</td>"; 
			echo "<td>".$row['city']."</td>"; 
			echo "<td>".$row['state']."</td>"; 
			echo "<td>".$row['zipcode']."</td>"; 
			echo "<td>".$row['jeffco_resident']."</td>"; 
			echo "<td>".$row['data_review_date']."</td>"; 
			echo "<td>".$row['ethnicity']."</td>"; 
			echo "<td>".$row['visit_id']."</td>"; 
			echo "<td>".$row['visit_date']."</td>"; 
			echo "<td>".$row['line_number']."</td>"; 
			echo "<td>".$row['commodities_box']."</td>"; 
			echo "<td>".$row['commodities_box_num']."</td>"; 
			echo "<td>".$row['commodities_line_num']."</td>"; 
			echo "<td>".$row['commodities_box_pack']."</td>"; 
            echo "</tr>"; 
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




