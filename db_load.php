<?php
    date_default_timezone_set('America/Denver');
    INCLUDE "dbcon.php";

    $filename = $_GET['filename'];
    $table_name = substr($filename,20,-4);
    $old_backup_file  = "C:/backups/$filename";
    $date_string   = date("Y-m-d-H-i-s");

    $backup_file  = "C:/backups/$date_string-$table_name.sql";
    $sql1 = "SELECT * INTO OUTFILE '$backup_file' FROM $table_name";

    $retval = mysqli_query($link,$sql1);

    if(! $retval ) {
    die('Could not take data backup of $table_name: ' . mysqli_error($link));
    }

    $sql2 = "DELETE FROM $table_name WHERE 1 = 1";
    
    $retval = mysqli_query($link,$sql2);
    
    if(! $retval ) {
       die('Could not delete rows from $table_name: ' . mysqli_error($link));
    }

    $sql3 = "LOAD DATA INFILE '$old_backup_file' INTO TABLE $table_name";

    if($link->query($sql3) === TRUE)
    {
        echo "<br> ".$table_name." successfully loaded.";
    } else {
        echo "<br> Error: ".$sql3."<br>".$link->error;
    }
?>