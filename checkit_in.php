<?php
INCLUDE "dbcon.php";

if(isset($_POST['member_id'])){

if(isset($_POST['commodities'])){
$c_box=1;	
$c_box_num=$_POST['commodities_box_num'];
$c_boxline_num=$_POST['commodities_line_num'];

}else{
$c_box=0;	
$c_box_num=0;
$c_boxline_num=0;

}
date_default_timezone_set('America/Denver');
echo date("Y-m-d");
	
$sql='
INSERT INTO visits (
member_id
,visit_date
,line_number
,commodities_box
,commodities_box_num
,commodities_line_num
,commodities_box_pack
) VALUES (
"'.$_POST['member_id'].'"
,"'.date("Y-m-d").'"
,"'.$_POST['line_number'].'"
,"'.$c_box.'"
,"'.$c_box_num.'"
,"'.$c_boxline_num.'"
,"0")';

echo $sql;

	if($link->query($sql) === TRUE)
	{
		echo "<br> Member Added to todays line";
	} else {
		echo "<br> Error: ".$sql."<br>".$link->error;
	}



}

header('Location: daily_checkin.php'); 
?>