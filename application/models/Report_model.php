<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_model extends CI_Model {

    public function find_exam_report_by_exam($exam_id)
    {
        $sql="SELECT r.region,COUNT(CASE WHEN e.exam_status = '1' THEN 1 END) AS attend, COUNT(CASE WHEN e.exam_status = '0' THEN 1 END) AS nattend,
              COUNT(CASE WHEN ex.pass_marks<=(e.marks*100)/ex.exam_marks THEN 1 END) AS tpass,COUNT(CASE WHEN ex.pass_marks>(e.marks*100)/ex.exam_marks
               THEN 1 END) AS tfail FROM tbl_user_pso p,tbl_exam ex,tbl_exam_assign e,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d  WHERE
                ex.exam_id=e.tbl_exam_exam_id AND s.sm_code=r.tbl_user_sm_sm_code AND  r.rsm_code=d.tbl_user_rsm_rsm_code AND 
                d.dsm_code=p.tbl_user_dsm_dsm_code AND p.pso_id=e.tbl_pso_pso_id AND ex.exam_id='$exam_id' GROUP BY r.region ";
//        $sql="SELECT r.region,COUNT(CASE WHEN e.exam_status = '1' THEN 1 END) AS attend, COUNT(CASE WHEN e.exam_status = '0' THEN 1 END) AS nattend,(SELECT count(i.assign_id) FROM tbl_exam_assign i,tbl_exam e,tbl_user_pso p,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d where p.pso_id=i.tbl_pso_pso_id  AND s.sm_code=r.tbl_user_sm_sm_code AND  r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code AND i.tbl_exam_exam_id=e.exam_id AND i.exam_status=1 AND e.pass_marks<=(i.marks*100)/e.exam_marks AND e.exam_id='$exam_id' ORDER BY r.region) AS tpass,(SELECT count(i.assign_id) FROM tbl_exam_assign i,tbl_exam e,tbl_user_pso p,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d where p.pso_id=i.tbl_pso_pso_id  AND s.sm_code=r.tbl_user_sm_sm_code AND  r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code AND i.tbl_exam_exam_id=e.exam_id AND i.exam_status=1 AND e.pass_marks>(i.marks*100)/e.exam_marks AND e.exam_id='$exam_id' ORDER BY r.region) AS tfail FROM tbl_user_pso p,tbl_exam ex,tbl_exam_assign e,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d  WHERE ex.exam_id=e.tbl_exam_exam_id AND s.sm_code=r.tbl_user_sm_sm_code AND  r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code AND  p.pso_id=e.tbl_pso_pso_id AND ex.exam_id='$exam_id' GROUP BY r.region ";
//        $sql = "SELECT p.renata_id as renata_id, p.pso_id AS pso_id, p.pso_name AS pso_name, count(e.assign_id) AS total_test, COUNT(CASE WHEN e.exam_status = '1' THEN 1 END) AS attend, sum(e.marks) as pso_total_marks,sum(CASE WHEN e.exam_status = '1' THEN ex.exam_marks ELSE 0  END) as total_marks ,s.sm_code as sm_code,r.rsm_code as rsm_code,d.dsm_code as dsm_code,round(((sum(e.marks)/sum(ex.exam_marks))*100)) as per,b.business_name,b.business_code  FROM tbl_user_pso p,tbl_exam ex,tbl_exam_assign e,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d ,tbl_business b WHERE b.business_code=p.tbl_business_business_code AND  ex.exam_id=e.tbl_exam_exam_id AND s.sm_code=r.tbl_user_sm_sm_code AND  r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code AND  p.pso_id=e.tbl_pso_pso_id GROUP BY p.pso_id ORDER BY p.pso_id";
        $this->db->query("set character_set_results='utf8'");
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    public function find_pso_test_report($exam_id)
    {
        $sql="SELECT s.sm_code,r.rsm_code,r.region,d.dsm_code,p.renata_id,p.pso_id,p.pso_name,(CASE WHEN e.exam_status= 1 THEN 'Yes' ELSE 'No' END) AS attended,
              e.marks,ex.exam_marks,ROUND(((e.marks/ex.exam_marks)*100)) AS accuracy FROM tbl_user_pso p,tbl_exam ex,tbl_exam_assign e,tbl_user_sm s,
              tbl_user_rsm r,tbl_user_dsm d  WHERE ex.exam_id=e.tbl_exam_exam_id AND s.sm_code=r.tbl_user_sm_sm_code AND  
              r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code AND p.pso_id=e.tbl_pso_pso_id AND ex.exam_id='$exam_id' ";
        $this->db->query("set character_set_results='utf8'");
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    public function find_pso_test_report_dump()
    {
        $sql="SELECT s.sm_code,r.rsm_code,r.region,d.dsm_code,p.renata_id,p.pso_id,p.pso_name,COUNT(e.assign_id) as total_assign,COUNT(CASE WHEN e.exam_status='1' THEN 1 END) AS total_appeared_test,SUM(CASE WHEN e.exam_status='1' THEN e.marks END) AS total_obtained_point,SUM(CASE WHEN e.exam_status='1' THEN ex.exam_marks END) AS total_exam_point FROM tbl_user_pso p,tbl_exam ex,tbl_exam_assign e,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d  WHERE
              ex.exam_id=e.tbl_exam_exam_id AND s.sm_code=r.tbl_user_sm_sm_code AND  r.rsm_code=d.tbl_user_rsm_rsm_code AND 
              d.dsm_code=p.tbl_user_dsm_dsm_code AND p.pso_id=e.tbl_pso_pso_id GROUP BY p.pso_id";
        $this->db->query("set character_set_results='utf8'");
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function find_test_bulk()
    {
        $sql="SELECT ex.exam_name,r.region,ex.duration,ex.exam_marks,ex.pass_marks,ex.exp_date,e.date FROM tbl_user_pso p,tbl_exam ex,tbl_exam_assign e,tbl_user_rsm r,tbl_user_dsm d  WHERE
              ex.exam_id=e.tbl_exam_exam_id  AND  r.rsm_code=d.tbl_user_rsm_rsm_code AND 
              d.dsm_code=p.tbl_user_dsm_dsm_code AND p.pso_id=e.tbl_pso_pso_id  GROUP BY ex.exam_name,r.region,e.date ORDER BY ex.exam_name";
        $this->db->query("set character_set_results='utf8'");
        $result = $this->db->query($sql);
        return $result->result_array();
    }



}