<?php

INCLUDE("header.php");

echo "<h2 valign=top>REPORTS</h2>";

ob_start();
INCLUDE("month_to_date.php");
INCLUDE("year_to_date.php");
INCLUDE("life_to_date.php");
$report_output = ob_get_contents();
ob_end_clean();

echo $report_output;
?>
<form method="post"> 
  <br><br> 
  <input type="submit" name="save_file" value="Save Reports">  
</form>

<?php
if (isset($_REQUEST['save_file'])) {
    $fileanme = fopen("report.html", "w");
    fwrite($fileanme, $report_output);
    fclose($fileanme);
}

INCLUDE("footer.php");
?> 