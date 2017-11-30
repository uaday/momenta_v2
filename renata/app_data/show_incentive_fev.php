<?php
require 'db_connect.php';
$db_connect=new Db_connect();
$conn=$db_connect->conn;

$pso_id=$_GET['pso_id'];
$sql="SELECT * FROM tbl_incentive_fev WHERE tbl_pso_pso_id='$pso_id'";
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
    echo "Query Problem";
}