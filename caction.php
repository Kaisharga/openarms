<?php



if(isset($_GET['label'])){
$print_output= $_GET['label'];
echo $print_output;
}
try
{
    $fp=pfsockopen("192.168.1.33", 9100);
    fputs($fp, $print_output);
    fclose($fp);

    echo 'Successfully Printed';
}
catch (Exception $e) 
{
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

?>