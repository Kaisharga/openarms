<?php
INCLUDE("header.php");

$sql="
ALTER TABLE `members` ADD `validated` INT(1) NOT NULL AFTER `ethnicity`;
";

echo "<table><tr><td>";


if ($res = mysqli_query($link, $sql)) { 
     echo "ALTER TABLE `members` ADD `validated` INT(1) NOT NULL AFTER `ethnicity`;"; 

} 
else { 
    echo "ERROR: Could not able to execute $sql. "
                                .mysqli_error($link); 
} 

$sql2="
ALTER TABLE `members` ADD `validated_date` DATE NOT NULL AFTER `validated`;
";

echo "<table><tr><td>";


if ($res = mysqli_query($link, $sql2)) { 
     echo "ALTER TABLE `members` ADD `validated_date` DATE NOT NULL AFTER `validated`;"; 

} 
else { 
    echo "ERROR: Could not able to execute $sql. "
                                .mysqli_error($link); 
} 








?>




