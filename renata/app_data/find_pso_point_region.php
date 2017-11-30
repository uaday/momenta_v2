<?php
require 'db_connect.php';
$db_connect=new Db_connect();
$conn=$db_connect->conn;

$pso_id=$_GET['pso_id'];
$sql="SELECT p.pso_point,d.depot_name,d.depot_code,p.tbl_business_business_code FROM tbl_user_pso p,tbl_depot d WHERE  p.tbl_depot_depot_code=d.depot_code AND p.pso_id='$pso_id'";
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