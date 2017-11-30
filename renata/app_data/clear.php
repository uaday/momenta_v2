<?php
require 'db_connect.php';
$db_connect=new Db_connect();
$conn=$db_connect->conn;

$sql = "UPDATE tbl_exam_assign SET pso_answers = '', exam_status = '0' ";
if(mysqli_query($conn,$sql))
{
echo "okk";	
}