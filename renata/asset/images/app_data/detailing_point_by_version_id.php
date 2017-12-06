<?php
require 'db_connect.php';

$detail_version_id=$_GET['detail_version_id'];

$sql="SELECT * FROM tbl_drug_detail_version dd,tbl_drug d  WHERE d.drug_id=dd.tbl_drug_drug_id AND detail_version_id='$detail_version_id'";
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