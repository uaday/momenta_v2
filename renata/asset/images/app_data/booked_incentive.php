<?php
require 'db_connect.php';
$pso_id=$_GET['pso_id'];
$id=$_GET['id'];
$mark=$_GET['mark'];
$sql1="UPDATE tbl_incentives_transection SET booked_incentive='1',redeem_date=NOW() WHERE transection_id='$id'";
$sql2="UPDATE tbl_user_pso SET pso_point='$mark' WHERE pso_id='$pso_id'";
if(mysql_query($sql1)&&mysql_query($sql2))
{
    $output="{'response'".':'."'ok'}";
    print($output);
}
else
{
    echo "Query Problem";
}