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


}