<?php
require 'db_connect.php';

$pso_id=$_GET['pso_id'];
$sql="SELECT  i.incentives_name AS title,i.incentives_description AS details,i.incentives_image AS image_link,i.exp_date AS valid_date  FROM tbl_incentives i,tbl_incentives_transection t  WHERE t.tbl_pso_pso_id='$pso_id' AND t.tbl_incentives_incentives_id=i.incentives_id ORDER BY i.incentives_point DESC LIMIT 3";
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
    echo 'query problem ';
}