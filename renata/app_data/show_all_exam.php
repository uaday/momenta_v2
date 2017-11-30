<?php
require 'db_connect.php';
$db_connect=new Db_connect();
$conn=$db_connect->conn;

$pso_id=$_GET['pso_id'];
$sql="SELECT  *  from tbl_exam_assign a,tbl_exam e WHERE a.tbl_exam_exam_id=e.exam_id AND e.publish_status=0 AND a.exam_status=0 AND a.tbl_pso_pso_id='$pso_id' ORDER BY e.exam_name";
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