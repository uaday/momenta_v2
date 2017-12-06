<?php
require 'db_connect.php';

$renata_id=$_GET['rid'];
$password=$_GET['password'];
$sql="SELECT  *  FROM tbl_user_pso WHERE renata_id='$renata_id' AND pso_password=md5('$password')";
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