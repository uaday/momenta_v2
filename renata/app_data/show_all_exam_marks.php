<?php
require 'db_connect.php';
$db_connect=new Db_connect();
$conn=$db_connect->conn;

$pso_id=$_GET['pso_id'];
$sql="SELECT a.assign_id AS assign_id ,count(q.question_id) AS qus_count, a.marks AS marks, a.date AS assign_date,a.exam_status AS status,e.exam_id AS exam_id,e.exam_marks AS tmarks ,e.exam_name AS exam_name,e.publish_status AS publish_status,e.pass_marks as pass_ratio from tbl_exam_assign a,tbl_exam e,tbl_question q WHERE  a.tbl_exam_exam_id=e.exam_id AND q.tbl_exam_exam_id=e.exam_id AND a.tbl_pso_pso_id='$pso_id' GROUP BY a.assign_id ORDER BY a.date_time desc ";
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