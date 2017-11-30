<?php
require 'db_connect.php';
$db_connect=new Db_connect();
$conn=$db_connect->conn;

$pso_id=$_GET['pso_id'];
$incentives_id=$_GET['incentives_id'];
$mark=$_GET['mark'];
$sql11="SELECT incentives_id,quantity,incentives_point FROM tbl_incentives WHERE incentives_id='$incentives_id' LIMIT 0,1";
$result=mysqli_query($conn,$sql11);
$row=mysqli_fetch_assoc($result);
$in_id=$row['incentives_id'];
$quantity1=$row['quantity'];
$incentive_point=$row['incentives_point'];


$sql5="SELECT pso_point FROM tbl_user_pso WHERE pso_id='$pso_id' LIMIT 0,1";
$result1=mysqli_query($conn,$sql5);
$row1=mysqli_fetch_assoc($result1);
$pso_point=$row1['pso_point'];


if($pso_point>=$incentive_point)
{
    //$sql1="UPDATE tbl_incentives_transection SET booked_incentive='1',redeem_date=NOW() WHERE transection_id='$id'";
    $sql1="INSERT INTO tbl_incentives_transection(tbl_incentives_incentives_id,tbl_pso_pso_id,booked_incentive,redeem_date,redeem_time) VALUES(N'$incentives_id',N'$pso_id','1',CURRENT_DATE,CURRENT_TIME )";
    $sql2="UPDATE tbl_user_pso SET pso_point='$mark' WHERE pso_id='$pso_id'";
    $sql3="UPDATE tbl_incentives SET quantity='$quantity1'-1 WHERE incentives_id='$incentives_id'";
    mysqli_query($conn,"set character_set_results='utf8'");
    if(mysqli_query($conn,$sql1)&&mysqli_query($conn,$sql2)&&mysqli_query($conn,$sql3))
    {
        $output="{'response'".':'."'ok'}";
        print($output);
    }
    else
    {
        echo "Query Problem";
    }
}
else
{
    $output="{'response'".':'."'Not ok'}";
    print($output);
}

