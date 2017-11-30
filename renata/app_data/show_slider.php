<?php
require 'db_connect.php';
$db_connect=new Db_connect();
$conn=$db_connect->conn;

$pso_id=$_GET['pso_id'];
$sql="SELECT  i.incentives_name AS title,i.incentives_description AS details,i.incentives_image AS image_link,i.exp_date AS valid_date  FROM tbl_incentives i,tbl_incentives_transection t  WHERE t.tbl_pso_pso_id='$pso_id' AND t.tbl_incentives_incentives_id=i.incentives_id ORDER BY i.incentives_point DESC LIMIT 3";
mysqli_query($conn,"set character_set_results='utf8'");
if(mysqli_query($conn,$sql))
{
    $result=mysqli_query($conn,$sql);
    $output=array();
    while($row=mysqli_fetch_assoc($result))
	{
		$output[]=$row;
	}
    print(json_encode($output));
}
else
{
    echo 'query problem ';
}