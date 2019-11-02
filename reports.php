<?php

INCLUDE("header.php");

echo "<h2 valign=top>REPORTS</h2>";

ob_start();
echo date("D F d Y g:i");
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
if (isset($_POST['save_file'])) {
    $filedate = date("mdYBs");
    if (!is_dir("C:\\reports")) {
      mkdir("C:\\reports");
    }
    $fileanme = fopen("C:\\reports\\report-${filedate}.html", "w");
    fwrite($fileanme, $report_output);
    fclose($fileanme);
}

INCLUDE("footer.php");
?> 