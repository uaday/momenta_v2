<?php
require 'db_connect.php';
$db_connect=new Db_connect();
$conn=$db_connect->conn;

$exam_id=$_GET['exam_id'];
$sql="SELECT  *  FROM tbl_question q,tbl_exam e  WHERE q.tbl_exam_exam_id='$exam_id' AND q.tbl_exam_exam_id=e.exam_id ORDER BY q.question_id";
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