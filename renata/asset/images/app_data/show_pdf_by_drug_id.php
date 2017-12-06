<?php
require 'db_connect.php';

$drug_id=$_GET['drug_id'];
$sql="SELECT d.drug_name drug_name, dd.drug_full_book AS drug_full_book,dd.benefits_feature AS benefits_feature,dd.drug_image AS drug_icon FROM tbl_drug d,tbl_drug_des dd WHERE d.drug_id='$drug_id' AND d.drug_id=dd.tbl_drug_drug_id";
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