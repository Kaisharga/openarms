<?php

INCLUDE("header.php");

echo "<h2 valign=top>REPORT SELECTION</h2>";

?> 
<form action="reports_result.php" method="post">

  <h4>Choose the Report</h4>
  <input type="radio" name="rpt_choice" value="people_rpt" checked autofocus> Number of Adults, Childen, and Seniors<br>
  <input type="radio" name="rpt_choice" value="TEFAP_rpt"> Number of People and TEFAP by Family and Individuals<br>
  <input type="radio" name="rpt_choice" value="count_rpt"> Number of Requests and Commodities<br>
  <br>

  <h4>Choose the Date Range of the Report</h4>
  <input type="radio" name="date_choice" value="curr_yr" checked> Current Year<br>
  <input type="radio" name="date_choice" value="curr_mo"> Current Month<br>
  <input type="radio" name="date_choice" value="last_mo"> Last Month<br>
  <input type="radio" name="date_choice" value="last_yr"> Last Year<br>
  <br>

  <h4>Choose the Grouping of Report</h4>
  <input type="radio" name="group_choice" value="group_week" checked> Group by Week<br>
  <input type="radio" name="group_choice" value="group_ethn"> Group by Ethnicity<br>
  <input type="radio" name="group_choice" value="group_both"> Group by Week and Ethnicity<br>
  <br>

<input type="submit">
</form>

<?php
  INCLUDE("footer.php");
?> 