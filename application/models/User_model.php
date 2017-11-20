<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {


    public function total_drug()
    {
        $sql="SELECT count(drug_des_id) total_d from tbl_drug_des";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }

    public function insert_user($user_name,$renata_id,$user_type,$designation)
    {
        $sql="INSERT INTO tbl_login(renata_id,name,password,user_type,designation,status,account_create_date) VALUES (N'$renata_id',N'$user_name',md5('welcome') ,N'$user_type',N'$designation','1',CURRENT_DATE )";
        $this->db->query($sql);
    }
    public function insert_user4($user_name,$renata_id,$user_type,$designation,$depot_code,$business_code,$sm_code)
    {
        $sql="INSERT INTO tbl_login(renata_id,name,password,user_type,designation,status,account_create_date) VALUES (N'$renata_id',N'$user_name',md5('welcome') ,N'$user_type',N'$designation','1',CURRENT_DATE )";
        $this->db->query($sql);
        $sql1="INSERT INTO tbl_user_sm(sm_code,renata_id,sm_name,sm_designation,tbl_depot_depot_code,tbl_business_business_code) VALUES (N'$sm_code',N'$renata_id',N'$user_name',N'$designation',N'$depot_code',N'$business_code')";
        $this->db->query($sql1);
    }
    public function insert_user5($user_name,$renata_id,$user_type,$region,$designation,$depot_code,$business_code,$rsm_code,$sm_code)
    {
        $sql="INSERT INTO tbl_login(renata_id,name,password,user_type,designation,status,account_create_date) VALUES (N'$renata_id',N'$user_name',md5('welcome') ,N'$user_type',N'$designation','1',CURRENT_DATE )";
        $this->db->query($sql);
        $sql1="INSERT INTO tbl_user_rsm(rsm_code,renata_id,rsm_name,rsm_designation,region,tbl_depot_depot_code,tbl_business_business_code,tbl_user_sm_sm_code) VALUES (N'$rsm_code',N'$renata_id',N'$user_name',N'$designation',N'$region',N'$depot_code',N'$business_code',N'$sm_code')";
        $this->db->query($sql1);
    }
    public function insert_user6($user_name,$renata_id,$user_type,$designation,$depot_code,$business_code,$dsm_code,$rsm_code)
    {
        $sql="INSERT INTO tbl_login(renata_id,name,password,user_type,designation,status,account_create_date) VALUES (N'$renata_id',N'$user_name',md5('welcome') ,N'$user_type',N'$designation','1',CURRENT_DATE )";
        $this->db->query($sql);
        $sql1="INSERT INTO tbl_user_dsm(dsm_code,renata_id,dsm_name,dsm_designation,tbl_depot_depot_code,tbl_business_business_code,tbl_user_rsm_rsm_code) VALUES (N'$dsm_code',N'$renata_id',N'$user_name',N'$designation',N'$depot_code',N'$business_code',N'$rsm_code')";
        $this->db->query($sql1);
    }

    public function all_admin()
    {
        $sql="SELECT * FROM tbl_login WHERE user_type='2'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function all_it()
    {
        $sql="SELECT * FROM tbl_login WHERE user_type='3'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function all_gm()
    {
        $sql="SELECT * FROM tbl_login WHERE user_type='7'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function all_sm()
    {
        $sql="SELECT * FROM tbl_login l,tbl_user_sm s WHERE l.renata_id=s.renata_id AND l.user_type='4' ORDER BY s.sm_code ASC";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function all_rsm()
    {
        $sql="SELECT * FROM tbl_login l,tbl_user_rsm r WHERE l.renata_id=r.renata_id AND l.user_type='5' ORDER BY r.rsm_code ASC ";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function all_dsm()
    {
        $sql="SELECT * FROM tbl_login l,tbl_user_dsm d WHERE l.renata_id=d.renata_id AND l.user_type='6' ORDER BY d.dsm_code ASC";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function all_dsm_by_user($user_id)
    {
        $sql="SELECT * FROM tbl_login l,tbl_user_dsm d,tbl_user_rsm r WHERE r.renata_id='$user_id' AND r.rsm_code=d.tbl_user_rsm_rsm_code AND l.renata_id=d.renata_id AND l.user_type='6' ORDER BY d.dsm_code ASC";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }

    public function block_user($renata_id)
    {
        $sql="UPDATE tbl_login SET status='0' WHERE renata_id='$renata_id'";
        $this->db->query($sql);
    }
    public function active_user($renata_id)
    {
        $sql="UPDATE tbl_login SET status='1' WHERE renata_id='$renata_id'";
        $this->db->query($sql);
    }

    public function delete_user($renata_id)
    {
        $sql="DELETE FROM tbl_login WHERE  renata_id='$renata_id'";
        $this->db->query($sql);
    }
    public function delete_sm($renata_id)
    {
        $sql="DELETE FROM tbl_user_sm WHERE  renata_id='$renata_id'";
        $this->db->query($sql);
    }
    public function delete_rsm($renata_id)
    {
        $sql="DELETE FROM tbl_user_rsm WHERE  renata_id='$renata_id'";
        $this->db->query($sql);
    }
    public function delete_dsm($renata_id)
    {
        $sql="DELETE FROM tbl_user_dsm WHERE  renata_id='$renata_id'";
        $this->db->query($sql);
    }

    public function find_admins_user_data($renata_id)
    {
        $sql="SELECT * FROM tbl_login WHERE renata_id='$renata_id'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function find_sm_user_data($renata_id)
    {
        $sql="SELECT * FROM tbl_login l,tbl_user_sm s WHERE l.renata_id='$renata_id' AND s.renata_id=l.renata_id";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function find_rsm_user_data($renata_id)
    {
        $sql="SELECT * FROM tbl_login l,tbl_user_rsm r WHERE l.renata_id='$renata_id' AND r.renata_id=l.renata_id";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function find_dsm_user_data($renata_id)
    {
        $sql="SELECT * FROM tbl_login l,tbl_user_dsm d WHERE l.renata_id='$renata_id' AND d.renata_id=l.renata_id";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }

    public function edit_admin_user($user_name,$renata_id,$user_type,$designation)
    {
        $sql="UPDATE tbl_login SET name='$user_name',user_type='$user_type',designation='$designation' WHERE renata_id='$renata_id'";
        $this->db->query($sql);
    }
    public function edit_sm_user($user_name,$renata_id,$user_type,$designation,$sm_code,$depot_code,$business_code)
    {
        $sql="UPDATE tbl_login SET name='$user_name',user_type='$user_type',designation='$designation' WHERE renata_id='$renata_id'";
        $this->db->query($sql);
        $sql1="UPDATE tbl_user_sm SET sm_name='$user_name',sm_code='$sm_code',sm_designation='$designation',tbl_depot_depot_code='$depot_code',tbl_business_business_code='$business_code' WHERE renata_id='$renata_id'";
        $this->db->query($sql1);
    }
    public function edit_rsm_user($user_name,$renata_id,$user_type,$designation,$region,$rsm_code,$sm_code,$depot_code,$business_code)
    {
        $sql="UPDATE tbl_login SET name='$user_name',user_type='$user_type',designation='$designation' WHERE renata_id='$renata_id'";
        $this->db->query($sql);
        $sql1="UPDATE tbl_user_rsm SET rsm_name='$user_name',tbl_user_sm_sm_code='$sm_code',rsm_designation='$designation',region='$region',tbl_depot_depot_code='$depot_code',tbl_business_business_code='$business_code',rsm_code='$rsm_code' WHERE renata_id='$renata_id'";
        $this->db->query($sql1);
    }
    public function edit_dsm_user($user_name,$renata_id,$user_type,$designation,$rsm_code,$dsm_code,$depot_code,$business_code)
    {
        $sql="UPDATE tbl_login SET name='$user_name',user_type='$user_type',designation='$designation' WHERE renata_id='$renata_id'";
        $this->db->query($sql);
        $sql1="UPDATE tbl_user_dsm SET dsm_name='$user_name',tbl_user_rsm_rsm_code='$rsm_code',dsm_designation='$designation',tbl_depot_depot_code='$depot_code',tbl_business_business_code='$business_code',dsm_code='$dsm_code' WHERE renata_id='$renata_id'";
        $this->db->query($sql1);
    }

    public function reset_password($renata_id)
    {
        $sql="UPDATE tbl_login SET password=md5('welcome'),change_pass_status=0 WHERE renata_id='$renata_id'";
        $this->db->query($sql);
    }
    public function find_region_by_business_code($business_code)
    {
        $sql="SELECT rsm_code,region from tbl_user_rsm where tbl_business_business_code='$business_code' ORDER BY region";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }

}