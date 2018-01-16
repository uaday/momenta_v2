<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_model extends CI_Model {

    public function find_exam_report_by_exam($exam_id)
    {
        $sql="SELECT r.region,COUNT(CASE WHEN e.exam_status = '1' THEN 1 END) AS attend, COUNT(CASE WHEN e.exam_status = '0' THEN 1 END) AS nattend,";
        $sql = "SELECT p.renata_id as renata_id, p.pso_id AS pso_id, p.pso_name AS pso_name, count(e.assign_id) AS total_test, COUNT(CASE WHEN e.exam_status = '1' THEN 1 END) AS attend, sum(e.marks) as pso_total_marks,sum(CASE WHEN e.exam_status = '1' THEN ex.exam_marks ELSE 0  END) as total_marks ,s.sm_code as sm_code,r.rsm_code as rsm_code,d.dsm_code as dsm_code,round(((sum(e.marks)/sum(ex.exam_marks))*100)) as per,b.business_name,b.business_code  FROM tbl_user_pso p,tbl_exam ex,tbl_exam_assign e,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d ,tbl_business b WHERE b.business_code=p.tbl_business_business_code AND  ex.exam_id=e.tbl_exam_exam_id AND s.sm_code=r.tbl_user_sm_sm_code AND  r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code AND  p.pso_id=e.tbl_pso_pso_id GROUP BY p.pso_id ORDER BY p.pso_id";
        $this->db->query("set character_set_results='utf8'");
        $result = $this->db->query($sql);
        return $result->result_array();
    }



}