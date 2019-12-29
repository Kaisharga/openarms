<?php
INCLUDE "dbcon.php";

if(isset($_POST['member_id'])){

	if(isset($_POST['commodities'])){

	}
	date_default_timezone_set('America/Denver');
	echo date("Y-m-d");
		
	$sql='
	DELETE
	FROM visits
	WHERE MEMBER_ID="'.$_POST['member_id'].'"
	AND VISIT_DATE="'.date("Y-m-d").'"
	';

	echo $sql;

	if($link->query($sql) === TRUE)
	{
		echo "<br> Member Deleted from todays line";
	} else {
		echo "<br> Error: ".$sql."<br>".$link->error;
	}

}

header('Location: daily_checkin.php'); 
?>