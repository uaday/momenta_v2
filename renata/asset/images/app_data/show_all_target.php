<?php
require 'db_connect.php';

$pso_id=$_GET['pso_id'];
$sql="SELECT  DISTINCT t.target_id, t.target_name,t.target_description,dd.drug_image,t.target_type FROM tbl_target_transaction tt,tbl_target t,tbl_drug_sells_target st,tbl_drug d,tbl_drug_des dd  WHERE tt.tbl_pso_pso_id='$pso_id' AND tt.tbl_target_target_id=t.target_id AND t.target_id=st.tbl_target_target_id AND st.tbl_drug_drug_id=d.drug_id AND d.drug_id=dd.tbl_drug_drug_id AND t.status=1";
if(mysql_query($sql))
{
    $result=mysql_query($sql);
    $output=array();
    while($row=mysql_fetch_assoc($result))
	{
		$output[]=$row;
	}
    print(json_encode($output));
}
else
{
    echo 'query problem ';
}