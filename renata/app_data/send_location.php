<?php
require 'db_connect.php';
$db_connect = new Db_connect();
$conn = $db_connect->conn;
$lat = $_GET['lat'];
$lon = $_GET['lon'];
$pso_id = $_GET['pso_id'];
$sql1 = "SELECT pso_location_id FROM tbl_pso_location WHERE tbl_pso_pso_id='$pso_id'";
$result = mysqli_query($conn, $sql1);
$rowCount=mysqli_num_rows($result);
$date=date("Y-m-d H:i:s");


$sql3="INSERT INTO tbl_pso_all_location(lat,lng,tbl_pso_pso_id,date_time,status) VALUES('$lat','$lon','$pso_id','$date','1')";
mysqli_query($conn,"set character_set_results='utf8'");
if(mysqli_query($conn,$sql3))
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



if ($rowCount > 0) {
    $sql="UPDATE tbl_pso_location SET lat='$lat', lng='$lon',date_time='$date' WHERE tbl_pso_pso_id='$pso_id'";
    mysqli_query($conn,"set character_set_results='utf8'");
    if(mysqli_query($conn,$sql))
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
} else {
    $sql2="INSERT INTO tbl_pso_location(lat,lng,tbl_pso_pso_id,date_time,status) VALUES('$lat','$lon','$pso_id','$date','1')";
    mysqli_query($conn,"set character_set_results='utf8'");
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
}
