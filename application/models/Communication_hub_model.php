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
        $sql="SELECT p.pso_id FROM tbl_user_pso p WHERE  p.tbl_business_business_code='$business_code'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function get_pso_token_by_psos($pso_id)
    {
        $sql="SELECT t.tbl_user_pso_pso_id as pso_id,t.token as token FROM tbl_notification_token t WHERE t.tbl_user_pso_pso_id='$pso_id'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function get_pso_token_by_pso($pso_id)
    {
        $sql="SELECT t.tbl_user_pso_pso_id as pso_id,t.token as token FROM tbl_notification_token t WHERE t.tbl_user_pso_pso_id='$pso_id'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function get_pso_token_by_region($region)
    {
        $sql="SELECT p.pso_id FROM tbl_user_pso p,tbl_user_dsm d,tbl_user_rsm r WHERE p.tbl_user_dsm_dsm_code=d.dsm_code and d.tbl_user_rsm_rsm_code=r.rsm_code  AND r.rsm_code IN ($region)";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function get_pso_token_by_pso_type($pso_type_list)
    {
        $sql="SELECT p.pso_id FROM tbl_user_pso p,tbl_pso_user_type ut WHERE   p.tbl_pso_user_type_pso_user_type_id=ut.pso_user_type_id AND ut.pso_user_type_id in($pso_type_list)";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function get_pso_token_by_pso_type_region($pso_type_list,$region)
    {
        $sql="SELECT p.pso_id FROM tbl_user_pso p,tbl_pso_user_type ut,tbl_user_dsm d,tbl_user_rsm r WHERE p.tbl_user_dsm_dsm_code=d.dsm_code and d.tbl_user_rsm_rsm_code=r.rsm_code  AND p.tbl_pso_user_type_pso_user_type_id=ut.pso_user_type_id AND ut.pso_user_type_id in($pso_type_list) AND r.rsm_code in($region)";
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
    public function show_all_messages()
    {
        $this->db->select('*');
        $this->db->from('tbl_notification');
        $this->db->where('status', '1');
        return $this->db->get()->result_array();
    }
    public function show_all_user_messages($user_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_notification');
        $this->db->where('user_id', $user_id);
        $this->db->where('status', '1');
        return $this->db->get()->result_array();
    }

    public function get_assign_message($notification_id)
    {
        $this->db->select('tbl_notification.message_title,tbl_notification.sent_by,tbl_notification.date,tbl_user_pso.renata_id,tbl_user_pso.pso_id,tbl_user_pso.pso_name,tbl_user_rsm.region');
        $this->db->from('tbl_notification');
        $this->db->join('tbl_notification_assign', 'tbl_notification_assign.tbl_notification_notification_id = tbl_notification.notification_id');
        $this->db->join('tbl_user_pso', 'tbl_user_pso.pso_id = tbl_notification_assign.tbl_user_pso_pso_id');
        $this->db->join('tbl_user_dsm', 'tbl_user_dsm.dsm_code = tbl_user_pso.tbl_user_dsm_dsm_code');
        $this->db->join('tbl_user_rsm', 'tbl_user_rsm.rsm_code = tbl_user_dsm.tbl_user_rsm_rsm_code');
        $this->db->where('tbl_notification.notification_id', $notification_id);
        return $this->db->get();
    }



}