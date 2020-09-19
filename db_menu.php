<?php

INCLUDE("header.php");

echo "<h2 valign=top>DATABASE MENU</h2>";

echo "<h3 valign=top>AVAILABLE BACKUPS</h3>";
$dir = "C:/backups/";

// Open a directory, and read its contents
$a = scandir($dir);

  if (count($a) > 2) {
    echo "<table bgcolor=white valign=top border=1 padding=16>";
    $intRow = 2;
    while ($intRow < count($a)) { 
        echo "<form action=db_load.php id=fileList method=GET>";     
        if($intRow % 2 == 0) {
            echo "<tr bgcolor=gainsboro color=white><td><input type=hidden name=filename value=\"$a[$intRow]\">$a[$intRow]</td><td><input type=\"submit\" name=db_load value=\"LOAD\"></td></tr>";
        }
        else {
            echo "<tr bgcolor=white color=black><td><input type=hidden name=filename value=\"$a[$intRow]\">$a[$intRow]</td><td><input type=\"submit\" name=db_load value=\"LOAD\"></td></tr>";
        }
        $intRow += 1;
     }
  echo "</table></form>"; 
} else {
  echo "<h2>No files found</h2>";
}

?>

<form action="db_backup.php" method="POST">
  <h3>CREATE BACKUP OF CURRENT DATABASE</h3>
<input type="submit" name="submit" value="BACKUP">
</form>

<?php
INCLUDE("footer.php");
?> 