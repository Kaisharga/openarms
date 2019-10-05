<?php
$sql='
SELECT 
count(*) as families_total 
,SUM(family_size) as people_total
,SUM(over64) AS children_total
,SUM(under19) as seniors_total
FROM(
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
	,date_format(v.visit_date,"%M") as month_of_visit
FROM 
	members m
,visits v
WHERE m.member_id=v.member_id
AND v.visit_date >= "'.date('Y-m-01').'")
nova
';

echo "<table><tr><td>";


if ($res = mysqli_query($link, $sql)) { 
    if (mysqli_num_rows($res) > 0) { 
		echo "<table border=1 width=250><tr><td>";
        echo "<table bgcolor=white width=100% valign=top align=center>"; 
			echo "<tr><th colspan=2>Month to Date</th>";
            echo "</tr>"; 
        while ($row = mysqli_fetch_array($res)) { 
			echo "<tr>";
			echo "<td>Familes</td><td>".$row['families_total']."</td>";
			echo "</tr><tr>";
			echo "<td>People</td><td>".$row['people_total']."</td>";
			echo "</tr><tr>";
			echo "<td>Children</td><td>".$row['children_total']."</td>";
			echo "</tr><tr>";
			echo "<td>Seniors</td><td>".$row['seniors_total']."</td>";
            echo "</tr>"; 
        } 
        echo "</table></td></tr></table>"; 
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


