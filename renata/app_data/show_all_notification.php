<?php
require 'db_connect.php';
$db_connect=new Db_connect();
$conn=$db_connect->conn;
$pso_id=$_GET['pso_id'];
$limit=$_GET['limit'];

$sql1 = "UPDATE tbl_notification_assign SET status='1' WHERE tbl_user_pso_pso_id='$pso_id'";
if(mysqli_query($conn,$sql1))
{
    $sql="SELECT * FROM tbl_notification n,tbl_notification_assign na  WHERE n.notification_id=na.tbl_notification_notification_id AND na.tbl_user_pso_pso_id='$pso_id' ORDER BY na.tbl_notification_notification_id DESC LIMIT 0,$limit";
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
        echo 'Query Problem';
    }
}
else
{
    echo 'Query Problem';
}
