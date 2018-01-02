<?php
require 'db_connect.php';
$db_connect = new Db_connect();
$conn = $db_connect->conn;
$pso_id = $_GET['pso_id'];
//$json_result= new \stdClass();
$sql1 = "SELECT COUNT(notification_assign_id) as unread_notification FROM tbl_notification_assign WHERE tbl_user_pso_pso_id='$pso_id' AND status='0'";
if (mysqli_query($conn, $sql1)) {
    $result=mysqli_query($conn,$sql1);
    $output=array();
    while($row=mysqli_fetch_assoc($result))
    {
        $output[]=$row;
    }
//    $json_result->status='200';
//    $json_result->result=$output;
    print_r(json_encode($output));

} else {
    echo 'Query Problem';
}

