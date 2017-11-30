<?php
require 'db_connect.php';
$db_connect=new Db_connect();
$conn=$db_connect->conn;

$incentives_id=$_GET['incentives_id'];
$sql="SELECT quantity FROM tbl_incentives WHERE incentives_id='$incentives_id'";
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