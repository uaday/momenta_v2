<?php
require 'db_connect.php';

$pso_id=$_GET['pso_id'];
$sql="SELECT t.transection_id id,i.incentives_name incentives_name,i.incentives_description incentives_description,i.incentives_image incentives_image,i.incentives_point incentives_point,i.exp_date exp_date,t.fev fev FROM tbl_incentives i,tbl_incentives_transection t WHERE i.incentives_id=t.tbl_incentives_incentives_id AND i.status=1 AND t.booked_incentive=0 AND t.tbl_pso_pso_id='$pso_id' ORDER BY t.fev DESC";
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
    echo "Query Problem";
}