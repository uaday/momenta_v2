<?php
require 'db_connect.php';
$db_connect=new Db_connect();
$conn=$db_connect->conn;

$drug_id=$_GET['drug_id'];
$sql="SELECT  DISTINCT t.doc_type_id,t.type_name  FROM tbl_doctor_type t,tbl_drug_detail_version dd,tbl_drug d WHERE dd.tbl_doctor_type_doc_type_id=t.doc_type_id AND d.drug_id=dd.tbl_drug_drug_id AND d.drug_id='$drug_id'";
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