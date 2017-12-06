<?php
require 'db_connect.php';

$id=$_GET['id'];
$sql="UPDATE tbl_incentives_transection SET fev='1' WHERE transection_id='$id'";
if(mysql_query($sql))
{
    $output="{'response'".':'."'ok'}";
    print($output);
}
else
{
    echo "Query Problem";
}