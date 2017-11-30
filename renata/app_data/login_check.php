<?php
require 'db_connect.php';
$db_connect=new Db_connect();
$conn=$db_connect->conn;

$rid=$_GET['rid'];
$password=$_GET['password'];
$sql="SELECT  p.*,ur.region,d.*  FROM tbl_user_pso p,tbl_depot d,tbl_user_dsm ud,tbl_user_rsm ur WHERE p.tbl_user_dsm_dsm_code=ud.dsm_code AND ud.tbl_user_rsm_rsm_code=ur.rsm_code AND p.pso_id='$rid' AND p.pso_password=md5('$password') AND p.tbl_depot_depot_code=d.depot_code";
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