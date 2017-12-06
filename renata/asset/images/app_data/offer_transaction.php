<?php
require 'db_connect.php';

$pso_id=$_GET['pso_id'];
$sql="SELECT t.redeem_date,i.incentives_name,i.incentives_point,t.approve FROM tbl_incentives_transection t,tbl_incentives i WHERE t.tbl_pso_pso_id='$pso_id' AND t.tbl_incentives_incentives_id=i.incentives_id AND t.booked_incentive='1'";
if(mysql_query($sql))
{
    $result=mysql_query($sql);
    $output=array();
    while($row=mysql_fetch_assoc($result))
	{
		$output[]=$row;
	}
    print(json_encode($output));
}
else
{
    mysql_error();
}