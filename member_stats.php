<?php

//stats boxes
#$month_sql = "SELECT count(*) as months FROM visits WHERE member_id=".$_GET['member_id']." AND visit_date >=".(new DateTime('2019-01-19'))->modify('first day of this month')->format('Y-m-d');
#$month_sql = "SELECT count(*) as mvisits FROM visits WHERE member_id=".$_GET['member_id']." AND visit_date >=".date('Y-m-01');
$month_sql = '
SELECT 
	COUNT(*) as visits
	,IFNULL(SUM(family_size),0) as people 
    ,IFNULL(SUM(under19),0) as kids 
	,IFNULL(SUM(over64),0) as seniors 
FROM 
	members m
	,visits v 
WHERE v.member_id=m.member_id
AND v.member_id= "'.$_GET['member_id'].'"
 AND visit_date >= "'.date('Y-m-01').'"';



#echo $month_sql;

if ($res = mysqli_query($link, $month_sql)) { 
    if (mysqli_num_rows($res) > 0) { 
    while ($row = mysqli_fetch_array($res)) { 
		echo "<table border=1 width=200 align=center><tr><td>";
		echo "<table align=center width=100%><tr><th colspan=2 align=center>Month to Date</th></tr>";
		echo "<tr><td>Visits</td><td>".$row['visits']."</td></tr>";
		echo "<tr><td colspan=2 align=center>People Fed</th></tr>";
		echo "<tr><td>Family members</td><td align=center>".$row['people']."</td></tr>";
		echo "<tr><td>Children</td><td align=center>".$row['kids']."</td></tr>";
		echo "<tr><td>Seniors</td><td align=center>".$row['seniors']."</td></tr>";
		echo "</table>";
		echo "</td></tr></table>";
	}
} else { 
    echo "No matching records are found."; 
    } 
} else { 
    echo "ERROR: Could not able to execute $sql. "
    .mysqli_error($link); 
} 


$life_sql = "
SELECT 
	COUNT(*) as visits
	,IFNULL(SUM(family_size),0) as people 
    ,IFNULL(SUM(under19),0) as kids 
	,IFNULL(SUM(over64),0) as seniors 
FROM 
	members m
	,visits v 
WHERE v.member_id=m.member_id
AND v.member_id=".$_GET['member_id']; 


if ($res = mysqli_query($link, $life_sql)) { 
    if (mysqli_num_rows($res) > 0) { 
    while ($row = mysqli_fetch_array($res)) { 
		echo "<table border=1 width=200 align=center><tr><td>";
		echo "<table align=center width=100%><tr><th colspan=2 align=center>Life to Date</th></tr>";
		echo "<tr><td>Visits</td><td>".$row['visits']."</td></tr>";
		echo "<tr><td colspan=2 align=center>People Fed</th></tr>";
		echo "<tr><td>Family members</td><td align=center>".$row['people']."</td></tr>";
		echo "<tr><td>Children</td><td align=center>".$row['kids']."</td></tr>";
		echo "<tr><td>Seniors</td><td align=center>".$row['seniors']."</td></tr>";
		echo "</table>";
		echo "</td></tr></table>";
	}
} else { 
    echo "No matching records are found."; 
    } 
} else { 
    echo "ERROR: Could not able to execute $sql. "
    .mysqli_error($link); 
} 



?>