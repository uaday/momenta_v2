<?php
require 'db_connect.php';

$drug_id=$_GET['drug_id'];
$sql="SELECT d.drug_name,dd.point1,dd.point2,dd.point3,dd.drug_detail_image AS drug_detail_image,dd.drug_name_audio,dd.audio1,dd.audio2,dd.audio3 FROM tbl_drug d,tbl_drug_detail_version dd WHERE d.drug_id='$drug_id' AND d.drug_id=dd.tbl_drug_drug_id AND version_id=1 AND tbl_doctor_type_doc_type_id=1";
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