<?php
require 'db_connect.php';
$db_connect=new Db_connect();
$conn=$db_connect->conn;

$doc_type_id=$_GET['doc_type_id'];
$drug_id=$_GET['drug_id'];
$sql="SELECT dd.detail_version_id, dd.version_id,dd.create_date FROM tbl_drug_detail_version dd,tbl_doctor_type dt WHERE dt.doc_type_id='$doc_type_id' AND tbl_drug_drug_id='$drug_id' AND dt.doc_type_id=dd.tbl_doctor_type_doc_type_id order by dd.detail_version_id DESC";
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