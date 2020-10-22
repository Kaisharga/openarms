<?php

date_default_timezone_set('America/Denver');
$link = mysqli_connect("localhost", "openarms", "4rms0p3n!", "openarms");
if ($link == false) { 
    echo "ERROR: Could not connect. "
                .mysqli_connect_error(); 
} 

$rpt_value = $_POST['rpt_choice'];
$date_value = $_POST['date_choice'];
$group_value = $_POST['group_choice'];
if( empty($_POST["date1"]) ) { 
  $date1 = "";
 } else {
  $date1 = $_POST['date1'];
 }
 if( empty($_POST["date2"]) ) { 
  $date2 = "";
 } else {
  $date2 = $_POST['date2'];
 }

$select_fields = "";
switch ($rpt_value) {
  case "people_rpt":
    echo "<h3 valign=top align=center>Total People Served</h3>";
    $select_fields = 'SUM(family_size) as "Total People", SUM(family_size - under19 - over64) as "Adults", SUM(under19) AS "Children", SUM(over64) as "Seniors"';
    $extra_where = '';  
  break;
  case "TEFAP_rpt":
    echo "<h3 valign=top align=center>People and TEFAP</h3>";
    $select_fields = 'COUNT(family_size) as "Families", SUM(family_size) as "Total People", SUM(commodities_box_pack) as "Boxes Given", COUNT(visit_id) as "Visits Made"';
    $extra_where = ' AND commodities_box_pack = 1';
  break;
  case "count_rpt":
    echo "<h3 valign=top align=center>Total Goods Given</h3>";
    $select_fields = 'SUM(commodities_box_pack) as "Boxes Given", COUNT(visit_id) as "Visits Made"';
    $extra_where = '';  
    break;
}

# NOTE:  The end of month is set to the 28th, but will be set to the true last day of the month in the SQL
$start_date = "";
$end_date = "";
switch ($date_value) {
  case "curr_mo":
    echo "<h3 valign=top align=center>Current Month</h3>";
    $year = date("Y");
    $month = date("m");
    $start_date = $year . "-" . $month . "-01";
    $end_date = $year . "-" . $month . "-28";
    break;
  case "curr_yr":
    echo "<h3 valign=top align=center>Current Year</h3>";
    $year = date("Y");
    $start_date = $year . "-01-01";
    $end_date = $year . "-12-31";
    break;
  case "last_mo":
    echo "<h3 valign=top align=center>Last Month</h3>";
    if (date("m") == "01") {
      $year = date("Y", strtotime("-1 year"));
      $start_date = $year . "-12-01";
      $end_date = $year . "-12-31";
    } else {
      $year = date("Y");
      $month = date("m", strtotime("-1 month"));
      $start_date = $year . "-" . $month . "-01";
      $end_date = $year . "-" . $month . "-28";
    }
    break;
  case "last_yr":
    echo "<h3 valign=top align=center>Last Year</h3>";
    $year = date("Y", strtotime("-1 year"));
    $start_date = $year . "-01-01";
    $end_date = $year . "-12-31";
    break;
  case "custom":
    echo "<h3 valign=top align=center>Custom Date Range from ".$date1." to ".$date2."</h3>";
    $start_date = $date1;
    $end_date = $date2;
    break;
}

$group_fields = "";
$order_fields = "";
switch ($group_value) {
  case "group_week":
    $select_fields = 'SELECT YEAR(visit_date) as Year, MONTHNAME(visit_date) as Month, WEEK(visit_date) as "Week of the Year", ' . $select_fields;
    $group_fields = ' GROUP BY Year, Month, "Week of the Year" ';
    $order_fields = ' ORDER BY visit_date';
    break;
  case "group_ethn":
    $select_fields = 'SELECT ethnicity as Ethnicity, ' . $select_fields;
    $group_fields = ' GROUP BY Ethnicity ';
    $order_fields = ' ORDER BY Ethnicity';
    break;
  case "group_both":
    $select_fields = 'SELECT YEAR(visit_date) as Year, MONTHNAME(visit_date) as Month, WEEK(visit_date) as "Week of the Year", ethnicity as Ethnicity, ' . $select_fields;
    $group_fields = ' GROUP BY Year, Month, "Week of the Year", Ethnicity ';
    $order_fields = ' ORDER BY visit_date, Ethnicity';
    break;
}

echo "<h4 valign=top align=center> Generated on " . date("D F d Y g:i A") . "</h4>";


$sql = $select_fields . "FROM members m, visits v WHERE m.member_id=v.member_id 
AND visit_date >= \"${start_date}\"
AND visit_date <= LAST_DAY(\"{$end_date}\")" . $extra_where . $group_fields . $order_fields;
$first_line = true;

if ($res = mysqli_query($link, $sql)) {
  if (mysqli_num_rows($res) > 0) {
    echo "<pre>";
    while ($row = mysqli_fetch_array($res)) {
      foreach ($row as $key => $value) {
        if ($first_line) {
          $headers = array_keys($row);
          for ($x = 1; $x <= count($headers); $x = $x + 2) {
            printf("%-20s \t", $headers[$x]);
          }
          echo nl2br("\n");
          $first_line = false;
        } else {
          if (is_numeric($key)) {
            echo "";
          } else {
            printf("%-20s \t", $value);
          }
        }
      }
      echo nl2br("\n");
    }
    echo "</pre>";
  } else {
    echo nl2br("No matching records are found for your selection. \n");
  }
} else {
  echo nl2br("ERROR: Could not able to execute $sql. \n");
  echo mysqli_error($link);
}







include("footer.php");
