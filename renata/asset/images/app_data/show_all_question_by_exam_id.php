<?php
require 'db_connect.php';

$exam_id=$_GET['exam_id'];
$sql="SELECT  *  FROM tbl_question q,tbl_exam e  WHERE q.tbl_exam_exam_id='$exam_id' AND q.tbl_exam_exam_id=e.exam_id ORDER BY q.question_id";
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