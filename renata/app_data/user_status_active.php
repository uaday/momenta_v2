<?php
require 'db_connect.php';
$db_connect=new Db_connect();
$conn=$db_connect->conn;
$sql="UPDATE tbl_user_pso SET status=1";
mysqli_query($conn,"set character_set_results='utf8'");
if(mysql_query($conn,$sql))
{
    $output="{'response'".':'."'ok'}";
    print($output);
}
else
{
    echo "Query Problem";
}