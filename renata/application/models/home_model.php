<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {


    public function total_drug()
    {
        $sql="SELECT count(drug_des_id) total_d from tbl_drug_des";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function total_pso($user_type,$employee_id)
    {
        if($user_type=='4')
        {
            $sql="SELECT count(p.pso_id) total_p FROM tbl_user_pso p,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d WHERE s.renata_id='$employee_id' AND s.sm_code=r.tbl_user_sm_sm_code AND r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code";
        }
        else if($user_type=='5')
        {
            $sql="SELECT count(p.pso_id) total_p FROM tbl_user_pso p,tbl_user_rsm r,tbl_user_dsm d WHERE r.renata_id='$employee_id' AND r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code";
        }
        else if($user_type=='6')
        {
            $sql="SELECT count(p.pso_id) total_p FROM tbl_user_pso p,tbl_user_dsm d WHERE d.renata_id='$employee_id' AND  d.dsm_code=p.tbl_user_dsm_dsm_code";
        }
        else
        {
            $sql="SELECT count(pso_id) total_p from tbl_user_pso";
        }
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function total_exam()
    {
        $sql="SELECT count(exam_id) total_e from tbl_exam";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function total_incentives()
    {
        $sql="SELECT count(incentives_id) total_i from tbl_incentives WHERE status=1";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }

    public function getSixMed()
    {
        $sql='SELECT * FROM tbl_drug d,tbl_drug_des dd WHERE d.drug_id=dd.tbl_drug_drug_id ORDER BY dd.drug_des_id DESC LIMIT 5';
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function getAllMed()
    {
        $sql='SELECT * FROM tbl_drug d,tbl_drug_des dd WHERE d.drug_id=dd.tbl_drug_drug_id ORDER BY dd.drug_des_id ';
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function getSixTest()
    {
        $sql='SELECT * FROM tbl_exam  ORDER BY exam_id DESC LIMIT 5';
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function getAlltest()
    {
        $sql='SELECT * FROM tbl_exam  ORDER BY exam_id DESC ';
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function loadSlider()
    {
        $sql='SELECT * FROM tbl_incentives  ORDER By incentives_point DESC LIMIT 3';
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }

    public function getSixIncentive()
    {
        $sql="SELECT * FROM tbl_incentives ORDER BY incentives_id DESC LIMIT 6";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }

}