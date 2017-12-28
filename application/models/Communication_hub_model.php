<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Communication_hub_model extends CI_Model
{


    public function universal_assignment()
    {
        $sql = "SELECT count(drug_des_id) total_d from tbl_drug_des";
        $this->db->query("set character_set_results='utf8'");
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function get_pso_token_by_business($business_code)
    {
        $sql="SELECT p.pso_id,t.token as token FROM tbl_user_pso p,tbl_notification_token t WHERE p.pso_id=t.tbl_user_pso_pso_id AND p.tbl_business_business_code='$business_code'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function get_pso_token_by_psos($pso_id)
    {
        $sql="SELECT t.tbl_user_pso_pso_id as pso_id,t.token as token FROM tbl_notification_token t WHERE t.tbl_user_pso_pso_id='$pso_id'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->row();
    }
    public function get_pso_token_by_pso($pso_id)
    {
        $sql="SELECT t.tbl_user_pso_pso_id as pso_id,t.token as token FROM tbl_notification_token t WHERE t.tbl_user_pso_pso_id='$pso_id'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->row();
    }
    public function get_pso_token_by_region($region)
    {
        $sql="SELECT p.pso_id,t.token as token FROM tbl_user_pso p,tbl_notification_token t,tbl_user_dsm d,tbl_user_rsm r WHERE p.tbl_user_dsm_dsm_code=d.dsm_code and d.tbl_user_rsm_rsm_code=r.rsm_code AND p.pso_id=t.tbl_user_pso_pso_id AND r.rsm_code in($region)";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function add_notification($data)
    {
        $this->db->insert('tbl_notification', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    public function assign_notification($notification_id,$pso_id)
    {
        $data=array(
            'tbl_notification_notification_id'=>$notification_id,
            'tbl_user_pso_pso_id'=>$pso_id
        );
        $this->db->insert('tbl_notification_assign', $data);
    }



}