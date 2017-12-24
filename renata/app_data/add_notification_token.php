<?php
require 'db_connect.php';
$db_connect=new Db_connect();
$conn=$db_connect->conn;
$pso_id=$_GET['pso_id'];
$token=$_GET['token'];


$sql1="SELECT notification_token_id FROM tbl_notification_token WHERE tbl_user_pso_pso_id='$pso_id'";
$result1=mysqli_query($conn,$sql1);
if($result1)
{
    $row=mysqli_num_rows($result1);
}
else{
    $row='-1';
}

if($row>0)
{
    $sql2="UPDATE tbl_notification_token SET token='$token' WHERE tbl_user_pso_pso_id='$pso_id'";
}
else
{
    $sql2="INSERT INTO tbl_notification_token(token,tbl_user_pso_pso_id) VALUES('$token','$pso_id')";
}
if(mysqli_query($conn,$sql2))
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
