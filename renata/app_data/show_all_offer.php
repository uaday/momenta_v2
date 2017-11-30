<?php
require 'db_connect.php';
$db_connect=new Db_connect();
$conn=$db_connect->conn;

$sql="SELECT * FROM tbl_incentives WHERE status=1 AND quantity>0 ORDER BY incentives_point ASC";
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
    echo "Query Problem";
}