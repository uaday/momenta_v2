<?php
require 'db_connect.php';
$pso_id=$_GET['pso_id'];
$sql="SELECT  *  from tbl_exam_assign a,tbl_exam e WHERE a.tbl_exam_exam_id=e.exam_id AND a.tbl_pso_pso_id='$pso_id'";
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