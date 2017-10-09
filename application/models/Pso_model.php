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
    public function get_region()
    {
        $sql="SELECT * FROM tbl_user_rsm ORDER by region";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function get_region_psos($region)
    {
        $sql="SELECT p.pso_id,p.pso_name FROM tbl_user_rsm r,tbl_user_pso p, tbl_user_dsm d WHERE p.tbl_user_dsm_dsm_code=d.dsm_code AND d.tbl_user_rsm_rsm_code=r.rsm_code AND r.rsm_code IN ($region) ORDER BY p.pso_id";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function get_pso_by_types($pso_type)
    {
        $sql="SELECT p.pso_id,p.pso_name FROM tbl_user_pso p,tbl_pso_user_type t WHERE p.tbl_pso_user_type_pso_user_type_id=t.pso_user_type_id AND t.pso_user_type_id IN ($pso_type) ORDER BY p.pso_id";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function get_pso_by_types_region($region,$pso_type)
    {

        $sql="SELECT p.pso_id,p.pso_name FROM tbl_user_pso p,tbl_pso_user_type t,tbl_user_rsm r,tbl_user_dsm d  WHERE p.tbl_pso_user_type_pso_user_type_id=t.pso_user_type_id AND  p.tbl_user_dsm_dsm_code=d.dsm_code AND d.tbl_user_rsm_rsm_code=r.rsm_code AND r.rsm_code IN ($region) AND t.pso_user_type_id IN ($pso_type) ORDER BY p.pso_id";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }



    public function get_pso_type()
    {
        $sql="SELECT * FROM tbl_pso_user_type";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }

    public function get_depot1()
    {
        $sql="SELECT * FROM tbl_depot";
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


    public function insert_pso($pso_code,$pso_renata_id, $pso_name, $pso_phone,$pso_des, $pso_password, $depot_code,$dsm_code,$business_code,$pso_type)
    {
        $sql="INSERT INTO tbl_user_pso (renata_id,pso_id,pso_name,pso_phone,pso_designation,pso_password,status,tbl_depot_depot_code,tbl_user_dsm_dsm_code,tbl_business_business_code,tbl_pso_user_type_pso_user_type_id) VALUES(N'$pso_code',N'$pso_renata_id',N'$pso_name',N'$pso_phone',N'$pso_des',md5('$pso_password'),'1',N'$depot_code',N'$dsm_code',N'$business_code',N'$pso_type')";
        $this->db->query($sql);
        return 1;
    }

    public function select_all_pso()
    {
        $sql="SELECT p.renata_id AS renata_id,p.pso_id AS pso_id,p.pso_name AS pso_name,p.pso_phone AS pso_phone,d.depot_name AS depot_name,ur.region AS region FROM tbl_user_pso p,tbl_depot d,tbl_user_dsm ud,tbl_user_rsm ur WHERE ud.tbl_user_rsm_rsm_code=ur.rsm_code AND p.tbl_user_dsm_dsm_code=ud.dsm_code  AND p.tbl_depot_depot_code=d.depot_code ORDER BY p.pso_id";
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
        $sql="SELECT * FROM tbl_user_pso p,tbl_depot d,tbl_business b,tbl_pso_user_type t WHERE t.pso_user_type_id=p.tbl_pso_user_type_pso_user_type_id AND p.tbl_depot_depot_code=d.depot_code AND p.tbl_business_business_code=b.business_code AND p.pso_id='$pso_id'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function update_pso($pso_code,$pso_renata_id, $pso_name,$pso_phone,$pso_type,$pso_des, $depot_code,$dsm_code,$business_code)
    {
        $sql="UPDATE tbl_user_pso SET pso_id=N'$pso_code', renata_id=N'$pso_renata_id',pso_name=N'$pso_name',tbl_pso_user_type_pso_user_type_id=N'$pso_type',pso_phone=N'$pso_phone',pso_designation=N'$pso_des',tbl_business_business_code=N'$business_code',tbl_depot_depot_code=N'$depot_code',tbl_user_dsm_dsm_code=N'$dsm_code' WHERE pso_id=N'$pso_code'";
       $this->db->query($sql);
    }

    
}