<?php
require 'db_connect.php';
$pso_id=$_GET['pso_id'];
$assign_id=$_GET['assign_id'];
$mark=$_GET['mark'];
$answer=$_GET['answer'];
$sql1="SELECT pso_point FROM tbl_user_pso WHERE pso_id='$pso_id'";
$result=mysql_query($sql1);
$row=mysql_fetch_assoc($result);
$marks=floatval($row['pso_point'])+floatval($mark);
$sql2="UPDATE tbl_exam_assign SET marks='$mark',pso_answers='$answer',exam_status=1 WHERE assign_id='$assign_id'";
$sql3="UPDATE tbl_user_pso SET pso_point='$marks' WHERE pso_id='$pso_id'";
if(mysql_query($sql2)&&mysql_query($sql3))
{
    $output="{'response'".':'."'ok'}";
    print($output);
}
else
{
    $output=array();
    $output[]='not ok';
    print(json_encode($output));
}