<?php
require 'db_connect.php';
$db_connect=new Db_connect();
$conn=$db_connect->conn;
$pso_id=$_GET['pso_id'];
$token=$_GET['token'];


$sql_tok="SELECT notification_token_id FROM tbl_notification_token WHERE token='$token'";
$result_tok=mysqli_query($conn,$sql_tok);
if($result_tok)
{
    $row_tok=mysqli_num_rows($result_tok);
}
else{
    $row_tok='-1';
}

if($row_tok>0)
{
    $sql_del="DELETE FROM tbl_notification_token WHERE token='$token'";
    mysqli_query($conn,$sql_del);
}


$sql2="INSERT INTO tbl_notification_token(token,tbl_user_pso_pso_id) VALUES('$token','$pso_id')";
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
