<?php
require 'db_connect.php';
$db_connect=new Db_connect();
$conn=$db_connect->conn;
$rsm_code=$_GET['rsm_code'];
$sql1="SELECT * FROM tbl_user_pso p,tbl_user_dsm d,tbl_user_rsm r WHERE p.tbl_user_dsm_dsm_code=d.dsm_code AND d.tbl_user_rsm_rsm_code=r.rsm_code AND r.rsm_code='$rsm_code'";
if(mysqli_query($conn,$sql1))
{
	$result=mysqli_query($conn,$sql1);
	while($row=mysqli_fetch_assoc($result))
	{
		$pso_id=$row['pso_id'];
		$pso_renata_id=$row['renata_id'];
		$pso_phone=$row['pso_phone'];
		$number=mt_rand(100,999);
		$pso_password = mt_rand(100000, 999999);
		$sql2="UPDATE tbl_user_pso SET pso_password=md5('$pso_password') WHERE pso_id='$pso_id'";
		if(mysqli_query($conn,$sql2))
		{
			$curl = curl_init();
			curl_setopt_array($curl, array( CURLOPT_RETURNTRANSFER => 1, CURLOPT_URL => 'http://sms.sslwireless.com/pushapi/dynamic/server.php?user=RenataPharmaceuticals&pass=92o<8H52&sid=Momenta&sms='.urlencode("Your Renata App Id: $pso_id\nRenata Password: $pso_password\nMomenta App Download Link: https://goo.gl/pKK3A1").'&msisdn=88'.$pso_phone.'&csmsid='.$number.'App'.$pso_renata_id.'',CURLOPT_USERAGENT => 'Sample cURL Request' ));
            $resp = curl_exec($curl);
            if($resp)
            {
            	echo "ok";
            	echo "\n";
            }
            else
            {
            	echo "not ok";
            	echo "\n";
            }
            curl_close($curl);
            
		}
		else
		{
  			echo "Query Problem";
		}
	}
}

