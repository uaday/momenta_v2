<?php
require 'db_connect.php';
$db_connect=new Db_connect();
$conn=$db_connect->conn;
$pso_id=$_GET['pso_id'];
$incentives_id=$_GET['incentives_id'];
$sql="DELETE FROM tbl_incentive_fev WHERE tbl_incentives_incentives_id='$incentives_id' AND tbl_pso_pso_id='$pso_id'";
mysqli_query($conn,"set character_set_results='utf8'");
if(mysqli_query($conn,$sql))
{
    $output="{'response'".':'."'ok'}";
    print($output);
}
else
{
    echo "Query Problem";
}