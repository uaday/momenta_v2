<?php
require 'db_connect.php';
$db_connect=new Db_connect();
$conn=$db_connect->conn;

$detail_version_id=$_GET['detail_version_id'];

$sql="SELECT * FROM tbl_drug_detail_version dd,tbl_drug d,tbl_drug_des ds  WHERE d.drug_id=dd.tbl_drug_drug_id AND ds.tbl_drug_drug_id=d.drug_id AND ds.tbl_drug_drug_id=dd.tbl_drug_drug_id AND detail_version_id='$detail_version_id'";
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