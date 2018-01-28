<?php
require 'db_connect.php';

$db_connect = new Db_connect();
$conn = $db_connect->conn;
$sql1 = "SELECT * FROM tbl_user_pso ";
$result = mysqli_query($conn, $sql1);
if (!isset($myObj))
    $myObj = new \stdClass();
$myArray=array();
while ($row = mysqli_fetch_assoc($result)) {
    ini_set('max_execution_time', 3000);
    $pso_id = $row['pso_id'];
    $pso_renata_id = $row['renata_id'];
    $pso_phone = $row['pso_phone'];
    $number = mt_rand(100, 999);

    $curl = curl_init();
    curl_setopt_array($curl, array(CURLOPT_RETURNTRANSFER => 1, CURLOPT_URL => 'http://sms.sslwireless.com/pushapi/dynamic/server.php?user=RenataPharmaceuticals&pass=92o<8H52&sid=Momenta&sms=' . urlencode("Momenta has got a great update! Please uninstall the old Momenta app and stay tuned to receive SMS of your account credentials to download the app.") . '&msisdn=88' . $pso_phone . '&csmsid=' . $number . 'App' . $pso_renata_id . '', CURLOPT_USERAGENT => 'Sample cURL Request'));
    $resp = curl_exec($curl);

    if ($resp) {

        $myObj->pso_id = $pso_id;
        $myObj->pso_code = $pso_renata_id;
        $myObj->phone_number = $pso_phone;
        $myObj->sms_status = 'Ok';
        array_push($myArray,$myObj);


    } else {
        $myObj->pso_id = $pso_id;
        $myObj->pso_code = $pso_renata_id;
        $myObj->phone_number = $pso_phone;
        $myObj->sms_status = 'Not Ok';
        array_push($myArray,$myObj);

    }
//    curl_close($curl);
}
$output= json_encode($myArray);
echo $output;

