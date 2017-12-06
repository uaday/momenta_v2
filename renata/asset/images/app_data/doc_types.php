<?php
require 'db_connect.php';
$sql="SELECT  *  FROM tbl_doctor_type";
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