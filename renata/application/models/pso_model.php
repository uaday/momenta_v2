<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pso_model extends CI_Model {

    public function lcheck($name,$pass)
    {
        $sql="SELECT * FROM users WHERE username='$name' and password='$pass'";
        $this->load->database();
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function get_district($div_id)
    {
        $sql="SELECT * FROM tbl_district WHERE tbl_division_division_id=N'$div_id'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function get_region($dis_id)
    {
        $sql="SELECT * FROM tbl_region WHERE tbl_district_district_id=N'$dis_id'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function get_depot($user_type,$employee_id)
    {
        if($user_type=='4')
        {
            $sql="SELECT * FROM tbl_depot d,tbl_user_sm s WHERE s.tbl_depot_depot_code=d.depot_code AND s.renata_id='$employee_id'";
        }
        else if($user_type=='5')
        {
            $sql="SELECT * FROM tbl_depot d,tbl_user_rsm r WHERE r.tbl_depot_depot_code=d.depot_code AND r.renata_id='$employee_id'";
        }
        else if($user_type=='6')
        {
            $sql="SELECT * FROM tbl_depot d,tbl_user_rsm dd WHERE dd.tbl_depot_depot_code=d.depot_code AND dd.renata_id='$employee_id'";
        }
        else
        {
            $sql="SELECT * FROM tbl_depot";
        }
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function get_business()
    {
        $sql="SELECT * FROM tbl_business";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function insert_pso($pso_code,$pso_renata_id, $pso_name, $pso_gender, $pso_dob, $pso_email, $pso_phone,$pso_des, $pso_password, $pso_image,$status, $depot_code,$dsm_code,$business_code)
    {
        $sql="INSERT INTO tbl_user_pso (renata_id,pso_id,pso_name,pso_gender,pso_dob,pso_email,pso_phone,pso_designation,pso_password,pso_image,status,tbl_depot_depot_code,tbl_user_dsm_dsm_code,tbl_business_business_code) VALUES(N'$pso_code',N'$pso_renata_id',N'$pso_name',N'$pso_gender',N'$pso_dob',N'$pso_email',N'$pso_phone',N'$pso_des',md5('$pso_password'),'$pso_image',N'$status',N'$depot_code',N'$dsm_code',N'$business_code')";
        $this->db->query($sql);
    }

    public function select_all_pso()
    {
        $sql="SELECT * FROM tbl_user_pso p,tbl_depot d WHERE p.tbl_depot_depot_code=d.depot_code ORDER BY p.pso_id";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function update_password($pso_id,$pso_password)
    {
        $sql="UPDATE tbl_user_pso SET pso_password=md5('$pso_password') WHERE pso_id='$pso_id'";
        $this->db->query($sql);
    }
    public function delete_account($pso_id)
    {
        $sql="DELETE FROM tbl_user_pso WHERE pso_id='$pso_id'";
        $this->db->query($sql);
    }
    public function select_pso_by_pso_id($pso_id)
    {
        $sql="SELECT * FROM tbl_user_pso p,tbl_depot d,tbl_business b WHERE p.tbl_depot_depot_code=d.depot_code AND p.tbl_business_business_code=b.business_code AND pso_id='$pso_id'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function update_pso($pso_code,$pso_renata_id, $pso_name, $pso_gender, $pso_dob, $pso_email, $pso_phone,$pso_des, $pp, $status, $depot_code,$dsm_code,$business_code)
    {
        if($pp=='')
        $sql="UPDATE tbl_user_pso SET pso_id=N'$pso_code', renata_id=N'$pso_renata_id',pso_name=N'$pso_name',pso_gender=N'$pso_gender',pso_dob=N'$pso_dob',pso_email=N'$pso_email',pso_phone=N'$pso_phone',pso_designation=N'$pso_des',tbl_business_business_code=N'$business_code',tbl_depot_depot_code=N'$depot_code',tbl_user_dsm_dsm_code=N'$dsm_code' WHERE pso_id=N'$pso_code'";
        else
            $sql="UPDATE tbl_user_pso SET pso_id=N'$pso_code', renata_id=N'$pso_renata_id',pso_name=N'$pso_name',pso_gender=N'$pso_gender',pso_dob=N'$pso_dob',pso_email=N'$pso_email',pso_phone=N'$pso_phone',pso_image=N'$pp',pso_designation=N'$pso_des',tbl_business_business_code=N'$business_code',tbl_depot_depot_code=N'$depot_code',tbl_user_dsm_dsm_code=N'$dsm_code' WHERE pso_id=N'$pso_code'";
        $this->db->query($sql);
    }

    
}