<?php
require 'db_connect.php';
$db_connect=new Db_connect();
$conn=$db_connect->conn;
$drug_id=$_GET['drug_id'];
$sql="SELECT d.drug_name,d.pm_name,d.pm_phone,dd.point1,dd.point2,dd.point3,dd.drug_detail_image AS drug_detail_image,ds.drug_image as drug_image,ds.drug_name_audio,dd.audio1,dd.audio2,dd.audio3,dt.doc_type_id,dt.type_name,dd.detail_version_id,dd.create_date FROM tbl_drug d,tbl_drug_detail_version dd,tbl_drug_des ds,tbl_doctor_type dt WHERE dd.tbl_doctor_type_doc_type_id=dt.doc_type_id AND ds.tbl_drug_drug_id=d.drug_id AND d.drug_id='$drug_id' AND d.drug_id=dd.tbl_drug_drug_id ORDER by version_id DESC LIMIT 1";
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