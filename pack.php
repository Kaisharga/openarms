<?php
INCLUDE "dbcon.php";

if(isset($_GET['caction'])){
	$sql='
		UPDATE visits
		SET commodities_box_pack = "1"
		WHERE member_id="'.$_GET['member_id'].'"
		 AND visit_id="'.$_GET['visit_id'].'"
		 AND visit_date="'.$_GET['visit_date'].'"
		 AND commodities_box_num="'.$_GET['commodities_box_num'].'"';
	echo $sql;

	if($link->query($sql) === TRUE)
	{
		echo "<br> box packed successfully";
	} else {
		echo "<br> Error: ".$sql."<br>".$link->error;
	}
}

header('Location: daily_commodities.php'); 
?>