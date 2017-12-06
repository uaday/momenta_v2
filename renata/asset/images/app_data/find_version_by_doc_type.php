<?php
require 'db_connect.php';

$doc_type_id=$_GET['doc_type_id'];
$drug_id=$_GET['drug_id'];
$sql="SELECT dd.detail_version_id, dd.version_id FROM tbl_drug_detail_version dd,tbl_doctor_type dt WHERE dt.doc_type_id='$doc_type_id' AND tbl_drug_drug_id='$drug_id' AND dt.doc_type_id=dd.tbl_doctor_type_doc_type_id";
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