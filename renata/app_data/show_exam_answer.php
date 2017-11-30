<?php
require 'db_connect.php';
$db_connect=new Db_connect();
$conn=$db_connect->conn;

$assign_id=$_GET['assign_id'];
$sql="SELECT q.question_id AS question_id,q.question AS question,q.option1 AS option1,q.option2 AS option2,q.option3 AS option3,q.option4 AS option4,q.answer AS answer,i.pso_answers as pso_answers FROM tbl_exam_assign i,tbl_question q WHERE i.assign_id='$assign_id' AND i.tbl_exam_exam_id=q.tbl_exam_exam_id ORDER BY q.question_id";
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
    die(mysql_error());
}