<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Test_model extends CI_Model
{

    public function create_test($business_code,$test_name, $test_suggestion,$exp_date, $test_type, $test_time, $test_marks, $pass_marks, $ques, $op1, $op2, $op3, $op4, $ans)
    {
        $business_code = $this->db->escape_str($business_code);
        $test_name = $this->db->escape_str($test_name);
        $test_suggestion = $this->db->escape_str($test_suggestion);
        $ques = $this->db->escape_str($ques);
        $op1 = $this->db->escape_str($op1);
        $op2 = $this->db->escape_str($op2);
        $op3 = $this->db->escape_str($op3);
        $op4 = $this->db->escape_str($op4);

        $sql = "INSERT INTO tbl_exam(tbl_business_business_code,exam_name,duration,exam_marks,pass_marks,exam_type,exam_suggestion,exp_date,exam_create_date,exam_create_time) VALUES (N'$business_code',N'$test_name',N'$test_time',N'$test_marks',N'$pass_marks',N'$test_type',N'$test_suggestion',N'$exp_date',CURRENT_DATE,CURRENT_TIME)";
        $this->db->query($sql);
        $id = $this->db->insert_id();

        $sql3 = "INSERT INTO tbl_question(question,option1,option2,option3,option4,answer,tbl_exam_exam_id) VALUES (N'$ques',N'$op1',N'$op2',N'$op3',N'$op4',N'$ans',N'$id')";
        $this->db->query($sql3);

        $sql2 = "SELECT * FROM tbl_exam WHERE exam_id='$id'";
        $this->db->query("set character_set_results='utf8'");
        $result = $this->db->query($sql2);
        return $result->result_array();
    }

    public function upload_ques($test_name, $ques, $op1, $op2, $op3, $op4, $ans, $test_id)
    {
        $test_name = $this->db->escape_str($test_name);
        $ques = $this->db->escape_str($ques);
        $op1 = $this->db->escape_str($op1);
        $op2 = $this->db->escape_str($op2);
        $op3 = $this->db->escape_str($op3);
        $op4 = $this->db->escape_str($op4);
        $sql2 = "SELECT exam_id FROM tbl_exam WHERE exam_name='$test_name' ORDER BY exam_id DESC limit 1";
        $this->db->query("set character_set_results='utf8'");
        $query = $this->db->query($sql2);
        if ($query->num_rows() > 0) {
            $res = $query->result();
            $row = $res[0];
            $exam_id = $row->exam_id;
            $sql = "INSERT INTO tbl_question(question,option1,option2,option3,option4,answer,tbl_exam_exam_id) VALUES (N'$ques',N'$op1',N'$op2',N'$op3',N'$op4',N'$ans',N'$exam_id')";
            $result2 = $this->db->query($sql);
        } else {
            $sql3 = "SELECT exam_id FROM tbl_exam WHERE exam_name='$test_name' ORDER BY exam_id DESC limit 1";
            $this->db->query("set character_set_results='utf8'");
            $query2 = $this->db->query($sql3);
            if ($query2->num_rows() > 0) {
                $res1 = $query2->result();
                $row1 = $res1[0];
                $exam_id1 = $row1->exam_id;
            }
            $sql = "INSERT INTO tbl_question(question,option1,option2,option3,option4,answer,tbl_exam_exam_id) VALUES (N'$ques',N'$op1',N'$op2',N'$op3',N'$op4',N'$ans',N'$exam_id1')";
            $result2 = $this->db->query($sql);
        }

    }

    public function set_global($id)
    {
        $sql1 = "SELECT pso_id FROM tbl_user_pso";
        $this->db->query("set character_set_results='utf8'");
        $result = $this->db->query($sql1);
        $row = $result->result_array();
        $i = count($row);
        for ($j = 0; $j < $i; $j++) {
            $pso_id = $row[$j]['pso_id'];
            $sql2 = "INSERT INTO tbl_exam_assign(tbl_exam_exam_id,tbl_pso_pso_id,date,time) VALUES (N'$id',N'$pso_id',CURRENT_DATE,CURRENT_TIME )";
            $this->db->query($sql2);

        }
    }

    public function set_depots($id, $rid)
    {
        $sql1 = "SELECT pso_id FROM tbl_user_pso WHERE tbl_depot_depot_code='$rid'";
        $this->db->query("set character_set_results='utf8'");
        $result = $this->db->query($sql1);
        $row = $result->result_array();
        $i = count($row);
        for ($j = 0; $j < $i; $j++) {
            $pso_id = $row[$j]['pso_id'];
            $sql2 = "INSERT INTO tbl_exam_assign(tbl_exam_exam_id,tbl_pso_pso_id,date,time) VALUES ('$id','$pso_id',CURRENT_DATE,CURRENT_TIME )";
            $this->db->query($sql2);

        }
    }
    public function set_region_pso_type($id, $region_list,$pso_type_list)
    {
        $sql1 = "SELECT p.pso_id FROM tbl_user_pso p,tbl_user_dsm d,tbl_user_rsm r WHERE p.tbl_user_dsm_dsm_code=d.dsm_code AND d.tbl_user_rsm_rsm_code=r.rsm_code AND r.rsm_code IN ($region_list) AND p.tbl_pso_user_type_pso_user_type_id IN($pso_type_list)";
        $this->db->query("set character_set_results='utf8'");
        $result = $this->db->query($sql1);
        $row = $result->result_array();
        $i = count($row);
        for ($j = 0; $j < $i; $j++) {
            $pso_id = $row[$j]['pso_id'];
            $sql2 = "INSERT INTO tbl_exam_assign(tbl_exam_exam_id,tbl_pso_pso_id,date,time) VALUES ('$id','$pso_id',CURRENT_DATE,CURRENT_TIME )";
            $this->db->query($sql2);

        }
    }
    public function set_pso_type($id,$pso_type_list)
    {
        $sql1 = "SELECT pso_id FROM tbl_user_pso WHERE tbl_pso_user_type_pso_user_type_id IN($pso_type_list)";
        $this->db->query("set character_set_results='utf8'");
        $result = $this->db->query($sql1);
        $row = $result->result_array();
        $i = count($row);
        for ($j = 0; $j < $i; $j++) {
            $pso_id = $row[$j]['pso_id'];
            $sql2 = "INSERT INTO tbl_exam_assign(tbl_exam_exam_id,tbl_pso_pso_id,date,time) VALUES ('$id','$pso_id',CURRENT_DATE,CURRENT_TIME )";
            $this->db->query($sql2);

        }
    }
    public function set_region($id, $region_list)
    {
        $sql1 = "SELECT p.pso_id FROM tbl_user_pso p,tbl_user_dsm d,tbl_user_rsm r WHERE p.tbl_user_dsm_dsm_code=d.dsm_code AND d.tbl_user_rsm_rsm_code=r.rsm_code AND r.rsm_code IN ($region_list)";
        $this->db->query("set character_set_results='utf8'");
        $result = $this->db->query($sql1);
        $row = $result->result_array();
        $i = count($row);
        for ($j = 0; $j < $i; $j++) {
            $pso_id = $row[$j]['pso_id'];
            $sql2 = "INSERT INTO tbl_exam_assign(tbl_exam_exam_id,tbl_pso_pso_id,date,time) VALUES ('$id','$pso_id',CURRENT_DATE,CURRENT_TIME )";
            $this->db->query($sql2);

        }
    }

    public function set_psos($id, $rid)
    {
        $sql2 = "INSERT INTO tbl_exam_assign(tbl_exam_exam_id,tbl_pso_pso_id,date,time) VALUES ('$id','$rid',CURRENT_DATE,CURRENT_TIME )";
        $this->db->query($sql2);
    }

    public function pso_exam_list($user_type, $employee_id)
    {
//        if($user_type=='4')
//        {
//            $sql = "SELECT p.renata_id as renata_id, p.pso_id AS pso_id, p.pso_name AS pso_name, count(e.assign_id) AS total_test, sum(e.marks) as total_marks FROM tbl_user_pso p,tbl_exam_assign e,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d WHERE s.sm_code=r.tbl_user_sm_sm_code AND r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code AND s.renata_id='$employee_id' AND p.pso_id=e.tbl_pso_pso_id GROUP BY p.pso_id ORDER BY p.pso_id";
//        }
        if ($user_type == '5') {
            $sql = "SELECT p.renata_id as renata_id, p.pso_id AS pso_id, p.pso_name AS pso_name, count(e.assign_id) AS total_test, sum(e.marks) as total_marks ,s.sm_code as sm_code,r.rsm_code as rsm_code,d.dsm_code as dsm_code,round(((sum(e.marks)/sum(ex.exam_marks))*100)) as per   FROM tbl_user_pso p,tbl_exam ex,tbl_exam_assign e,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d WHERE ex.exam_id=e.tbl_exam_exam_id AND s.sm_code=r.tbl_user_sm_sm_code AND  r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code AND r.renata_id='$employee_id' AND p.pso_id=e.tbl_pso_pso_id GROUP BY p.pso_id ORDER BY p.pso_id";
        } else if ($user_type == '6') {
            $sql = "SELECT p.renata_id as renata_id, p.pso_id AS pso_id, p.pso_name AS pso_name, count(e.assign_id) AS total_test, sum(e.marks) as total_marks ,s.sm_code as sm_code,r.rsm_code as rsm_code,d.dsm_code as dsm_code,round(((sum(e.marks)/sum(ex.exam_marks))*100)) as per   FROM tbl_user_pso p,tbl_exam ex,tbl_exam_assign e,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d WHERE ex.exam_id=e.tbl_exam_exam_id AND s.sm_code=r.tbl_user_sm_sm_code AND  r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code AND d.renata_id='$employee_id' AND p.pso_id=e.tbl_pso_pso_id GROUP BY p.pso_id ORDER BY p.pso_id";
        } else {
            $sql = "SELECT p.renata_id as renata_id, p.pso_id AS pso_id, p.pso_name AS pso_name, count(e.assign_id) AS total_test, sum(e.marks) as total_marks ,s.sm_code as sm_code,r.rsm_code as rsm_code,d.dsm_code as dsm_code,round(((sum(e.marks)/sum(ex.exam_marks))*100)) as per FROM tbl_user_pso p,tbl_exam ex,tbl_exam_assign e,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d WHERE  ex.exam_id=e.tbl_exam_exam_id AND s.sm_code=r.tbl_user_sm_sm_code AND  r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code AND  p.pso_id=e.tbl_pso_pso_id GROUP BY p.pso_id ORDER BY p.pso_id";
        }
        $this->db->query("set character_set_results='utf8'");
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function pso_exam_list_filtering($sm_code, $rsm_code, $dsm_code)
    {

        // $sql = "SELECT p.renata_id as renata_id, p.pso_id AS pso_id, p.pso_name AS pso_name, count(e.assign_id) AS total_test, sum(e.marks) as total_marks FROM tbl_user_pso p,tbl_exam_assign e,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d WHERE  r.rsm_code='$rsm_code' AND d.dsm_code=p.tbl_user_dsm_dsm_code AND  s.sm_code=r.tbl_user_sm_sm_code AND r.rsm_code=d.tbl_user_rsm_rsm_code AND  p.pso_id=e.tbl_pso_pso_id GROUP BY p.pso_id ORDER BY p.pso_id";
        $sql = "SELECT p.renata_id as renata_id, p.pso_id AS pso_id, p.pso_name AS pso_name, count(e.assign_id) AS total_test, sum(e.marks) as total_marks,s.sm_code as sm_code,r.rsm_code as rsm_code,d.dsm_code as dsm_code,round(((sum(e.marks)/sum(ex.exam_marks))*100)) as per  FROM tbl_user_pso p,tbl_exam ex,tbl_exam_assign e,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d WHERE (s.sm_code='$sm_code' OR r.rsm_code='$rsm_code' OR d.dsm_code='$dsm_code') AND d.dsm_code=p.tbl_user_dsm_dsm_code  and r.rsm_code=d.tbl_user_rsm_rsm_code AND s.sm_code=r.tbl_user_sm_sm_code AND ex.exam_id=e.tbl_exam_exam_id AND  p.pso_id=e.tbl_pso_pso_id GROUP BY p.pso_id ORDER BY p.pso_id";
        $this->db->query("set character_set_results='utf8'");
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function pso_exam_list_by_pso_id($pso_id)
    {
        $sql = "SELECT p.pso_id as pso_id,p.pso_name as pso_name,sum(i.marks) as total_marks,e.exam_id as exam_id, e.exam_name as exam_name,e.duration as time,e.exam_marks as exam_marks,i.marks as pso_marks,i.assign_id as assign_id,i.exam_status as status,i.start_date as start_date,i.start_time as start_time from tbl_user_pso p,tbl_exam e,tbl_exam_assign i WHERE p.pso_id='$pso_id' AND p.pso_id=i.tbl_pso_pso_id AND i.tbl_exam_exam_id=e.exam_id GROUP by p.pso_id,i.assign_id,e.exam_id ORDER BY e.exam_id ";
        $this->db->query("set character_set_results='utf8'");
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function pso_exam_by_pso_id($pso_id)
    {
        $sql = "SELECT p.renata_id as renata_id, p.pso_id as pso_id,p.pso_name as pso_name,sum(i.marks) as total_marks,count(i.assign_id) as total_test from tbl_user_pso p,tbl_exam_assign i WHERE p.pso_id='$pso_id' AND p.pso_id=i.tbl_pso_pso_id";
        $this->db->query("set character_set_results='utf8'");
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function pso_exam_details($pso_id, $assign_id)
    {
        $sql = "SELECT p.pso_id as pso_id,p.pso_name as pso_name,e.duration as time,i.marks as marks,e.exam_id as exam_id,e.exam_name as exam_name,e.exam_marks as exam_marks from tbl_user_pso p,tbl_exam e,tbl_exam_assign i WHERE p.pso_id=i.tbl_pso_pso_id AND i.tbl_exam_exam_id=e.exam_id AND p.pso_id='$pso_id' AND i.assign_id='$assign_id'";
        $this->db->query("set character_set_results='utf8'");
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function pso_exam_ques_ans($assign_id)
    {
        $sql = "SELECT * from tbl_exam e,tbl_exam_assign i,tbl_question q WHERE e.exam_id=i.tbl_exam_exam_id AND e.exam_id=q.tbl_exam_exam_id AND i.assign_id='$assign_id' ORDER by q.question_id";
        $this->db->query("set character_set_results='utf8'");
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function delete_pso_tests($pso_id)
    {
        $sql = "DELETE FROM tbl_exam_assign WHERE tbl_pso_pso_id='$pso_id'";
        $this->db->query($sql);
    }

    public function delete_tests($exam_id)
    {
        $sql = "DELETE FROM tbl_exam WHERE exam_id='$exam_id'";
        $this->db->query($sql);
        $sql2 = "DELETE FROM tbl_exam_assign WHERE tbl_exam_exam_id='$exam_id'";
        $this->db->query($sql2);
        $sql3 = "DELETE FROM tbl_question WHERE tbl_exam_exam_id='$exam_id'";
        $this->db->query($sql3);
    }

    public function pso_exam_attend_status($user_type, $employee_id)
    {
        $sql = "SELECT e.exam_id, e.exam_name FROM tbl_exam e,tbl_exam_assign a WHERE e.exam_id=a.tbl_exam_exam_id ORDER BY e.exam_name LIMIT 1";
        $this->db->query("set character_set_results='utf8'");
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $res = $query->result();
            $row = $res[0];
            $exam_id = $row->exam_id;
//            if($user_type=='4')
//            {
//                $sql = "SELECT count(a.assign_id) as tattend FROM tbl_exam_assign a,tbl_user_pso p,tbl_exam e,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d WHERE s.sm_code=r.tbl_user_sm_sm_code AND r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code AND s.renata_id='$employee_id' AND p.pso_id=a.tbl_pso_pso_id AND a.tbl_exam_exam_id=e.exam_id AND a.exam_status=1 AND e.exam_id='$exam_id'";
//            }
            if ($user_type == '5') {
                $sql1 = "SELECT count(a.assign_id) as tattend FROM tbl_exam_assign a,tbl_user_pso p,tbl_exam e,tbl_user_rsm r,tbl_user_dsm d WHERE  r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code AND r.renata_id='$employee_id' AND p.pso_id=a.tbl_pso_pso_id AND a.tbl_exam_exam_id=e.exam_id AND a.exam_status=1 AND e.exam_id='$exam_id'";
            } else if ($user_type == '6') {
                $sql1 = "SELECT count(a.assign_id) as tattend FROM tbl_exam_assign a,tbl_user_pso p,tbl_exam e,tbl_user_dsm d WHERE  d.dsm_code=p.tbl_user_dsm_dsm_code AND d.renata_id='$employee_id' AND p.pso_id=a.tbl_pso_pso_id AND a.tbl_exam_exam_id=e.exam_id AND a.exam_status=1 AND e.exam_id='$exam_id'";
            } else {
                $sql1 = "SELECT count(a.assign_id) as tattend FROM tbl_exam_assign a,tbl_user_pso p,tbl_exam e WHERE p.pso_id=a.tbl_pso_pso_id AND a.tbl_exam_exam_id=e.exam_id AND a.exam_status=1 AND e.exam_id='$exam_id'";
            }
            $this->db->query("set character_set_results='utf8'");
            $result = $this->db->query($sql1);
            return $result->result_array();
        }
    }

    public function pso_exam_attend_by_exam_id($exam_id, $user_type, $employee_id)
    {
//        if($user_type=='4')
//        {
//            $sql = "SELECT count(a.assign_id) as tattend FROM tbl_exam_assign a,tbl_user_pso p,tbl_exam e,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d WHERE s.sm_code=r.tbl_user_sm_sm_code AND r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code AND s.renata_id='$employee_id' AND p.pso_id=a.tbl_pso_pso_id AND a.tbl_exam_exam_id=e.exam_id AND a.exam_status=1 AND e.exam_id='$exam_id'";
//        }
        if ($user_type == '5') {
            $sql = "SELECT count(a.assign_id) as tattend FROM tbl_exam_assign a,tbl_user_pso p,tbl_exam e,tbl_user_rsm r,tbl_user_dsm d WHERE  r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code AND r.renata_id='$employee_id' AND p.pso_id=a.tbl_pso_pso_id AND a.tbl_exam_exam_id=e.exam_id AND a.exam_status=1 AND e.exam_id='$exam_id'";
        } else if ($user_type == '6') {
            $sql = "SELECT count(a.assign_id) as tattend FROM tbl_exam_assign a,tbl_user_pso p,tbl_exam e,tbl_user_dsm d WHERE  d.dsm_code=p.tbl_user_dsm_dsm_code AND d.renata_id='$employee_id' AND p.pso_id=a.tbl_pso_pso_id AND a.tbl_exam_exam_id=e.exam_id AND a.exam_status=1 AND e.exam_id='$exam_id'";
        } else {
            $sql = "SELECT count(a.assign_id) as tattend FROM tbl_exam_assign a,tbl_user_pso p,tbl_exam e WHERE p.pso_id=a.tbl_pso_pso_id AND a.tbl_exam_exam_id=e.exam_id AND a.exam_status=1 AND e.exam_id='$exam_id'";
        }
        $this->db->query("set character_set_results='utf8'");
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function pso_exam_not_attend_status($user_type, $employee_id)
    {

        $sql = "SELECT e.exam_id, e.exam_name FROM tbl_exam e,tbl_exam_assign a WHERE e.exam_id=a.tbl_exam_exam_id ORDER BY e.exam_name LIMIT 1";
        $this->db->query("set character_set_results='utf8'");
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $res = $query->result();
            $row = $res[0];
            $exam_id = $row->exam_id;
//            if($user_type=='4')
//            {
//                $sql = "SELECT count(a.assign_id) as tnattend FROM tbl_exam_assign a,tbl_user_pso p,tbl_exam e,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d WHERE s.sm_code=r.tbl_user_sm_sm_code AND r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code AND s.renata_id='$employee_id' AND p.pso_id=a.tbl_pso_pso_id AND a.tbl_exam_exam_id=e.exam_id AND a.exam_status=0 AND e.exam_id='$exam_id'";
//            }
            if ($user_type == '5') {
                $sql1 = "SELECT count(a.assign_id) as tnattend FROM tbl_exam_assign a,tbl_user_pso p,tbl_exam e,tbl_user_rsm r,tbl_user_dsm d WHERE  r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code AND r.renata_id='$employee_id' AND p.pso_id=a.tbl_pso_pso_id AND a.tbl_exam_exam_id=e.exam_id AND a.exam_status=0 AND e.exam_id='$exam_id'";
            } else if ($user_type == '6') {
                $sql1 = "SELECT count(a.assign_id) as tnattend FROM tbl_exam_assign a,tbl_user_pso p,tbl_exam e,tbl_user_dsm d WHERE  d.dsm_code=p.tbl_user_dsm_dsm_code AND d.renata_id='$employee_id' AND p.pso_id=a.tbl_pso_pso_id AND a.tbl_exam_exam_id=e.exam_id AND a.exam_status=0 AND e.exam_id='$exam_id'";
            } else {
                $sql1 = "SELECT count(a.assign_id) as tnattend FROM tbl_exam_assign a,tbl_user_pso p,tbl_exam e WHERE p.pso_id=a.tbl_pso_pso_id AND a.tbl_exam_exam_id=e.exam_id AND a.exam_status=0 AND e.exam_id='$exam_id'";
            }
            $this->db->query("set character_set_results='utf8'");
            $result = $this->db->query($sql1);
            return $result->result_array();
        }
    }

    public function pso_exam_not_attend_by_exam_id($exam_id, $user_type, $employee_id)
    {
//        if($user_type=='4')
//        {
//            $sql = "SELECT count(a.assign_id) as tnattend FROM tbl_exam_assign a,tbl_user_pso p,tbl_exam e,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d WHERE s.sm_code=r.tbl_user_sm_sm_code AND r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code AND s.renata_id='$employee_id' AND p.pso_id=a.tbl_pso_pso_id AND a.tbl_exam_exam_id=e.exam_id AND a.exam_status=0 AND e.exam_id='$exam_id'";
//        }
        if ($user_type == '5') {
            $sql = "SELECT count(a.assign_id) as tnattend FROM tbl_exam_assign a,tbl_user_pso p,tbl_exam e,tbl_user_rsm r,tbl_user_dsm d WHERE  r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code AND r.renata_id='$employee_id' AND p.pso_id=a.tbl_pso_pso_id AND a.tbl_exam_exam_id=e.exam_id AND a.exam_status=0 AND e.exam_id='$exam_id'";
        } else if ($user_type == '6') {
            $sql = "SELECT count(a.assign_id) as tnattend FROM tbl_exam_assign a,tbl_user_pso p,tbl_exam e,tbl_user_dsm d WHERE  d.dsm_code=p.tbl_user_dsm_dsm_code AND d.renata_id='$employee_id' AND p.pso_id=a.tbl_pso_pso_id AND a.tbl_exam_exam_id=e.exam_id AND a.exam_status=0 AND e.exam_id='$exam_id'";
        } else {
            $sql = "SELECT count(a.assign_id) as tnattend FROM tbl_exam_assign a,tbl_user_pso p,tbl_exam e WHERE p.pso_id=a.tbl_pso_pso_id AND a.tbl_exam_exam_id=e.exam_id AND a.exam_status=0 AND e.exam_id='$exam_id'";
        }
        $this->db->query("set character_set_results='utf8'");
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function pso_total_pass($user_type, $employee_id)
    {
        $sql = "SELECT e.exam_id, e.exam_name,e.exam_marks,e.pass_marks FROM tbl_exam e,tbl_exam_assign a WHERE e.exam_id=a.tbl_exam_exam_id ORDER BY e.exam_name LIMIT 1";
        $this->db->query("set character_set_results='utf8'");
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $res = $query->result();
            $row = $res[0];
            $exam_id = $row->exam_id;
            $exam_marks = $row->exam_marks;
            $pass_marks = $row->pass_marks;
//            if($user_type=='4')
//            {
//                $sql = "SELECT count(i.assign_id) tpass FROM tbl_exam_assign i,tbl_exam e,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d,tbl_user_pso p where s.sm_code=r.tbl_user_sm_sm_code AND r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code AND s.renata_id='$employee_id' AND p.pso_id=i.tbl_pso_pso_id AND i.tbl_exam_exam_id=e.exam_id AND i.exam_status=1 AND '$pass_marks'<=(i.marks*100)/$exam_marks AND e.exam_id='$exam_id'";
//            }
            if ($user_type == '5') {
                $sql1 = "SELECT count(i.assign_id) tpass FROM tbl_exam_assign i,tbl_exam e,tbl_user_rsm r,tbl_user_dsm d,tbl_user_pso p where  r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code AND r.renata_id='$employee_id' AND p.pso_id=i.tbl_pso_pso_id AND i.tbl_exam_exam_id=e.exam_id AND i.exam_status=1 AND '$pass_marks'<=(i.marks*100)/$exam_marks AND e.exam_id='$exam_id'";
            } else if ($user_type == '6') {
                $sql1 = "SELECT count(i.assign_id) tpass FROM tbl_exam_assign i,tbl_exam e,tbl_user_dsm d,tbl_user_pso p where d.dsm_code=p.tbl_user_dsm_dsm_code AND d.renata_id='$employee_id' AND p.pso_id=i.tbl_pso_pso_id AND i.tbl_exam_exam_id=e.exam_id AND i.exam_status=1 AND '$pass_marks'<=(i.marks*100)/$exam_marks AND e.exam_id='$exam_id'";
            } else {
                $sql1 = "SELECT count(i.assign_id) tpass FROM tbl_exam_assign i,tbl_exam e,tbl_user_pso p where p.pso_id=i.tbl_pso_pso_id AND i.tbl_exam_exam_id=e.exam_id AND i.exam_status=1 AND '$pass_marks'<=(i.marks*100)/$exam_marks AND e.exam_id='$exam_id'";
            }
            $this->db->query("set character_set_results='utf8'");
            $result = $this->db->query($sql1);
            return $result->result_array();
        }
    }

    public function pso_total_pass_by_exam_id($exam_id, $user_type, $employee_id)
    {
        $sql = "SELECT * FROM tbl_exam e,tbl_exam_assign a WHERE e.exam_id=a.tbl_exam_exam_id AND e.exam_id='$exam_id'";
        $this->db->query("set character_set_results='utf8'");
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $res = $query->result();
            $row = $res[0];
            $exam_marks = $row->exam_marks;
            $pass_marks = $row->pass_marks;
//            if($user_type=='4')
//            {
//                $sql = "SELECT count(i.assign_id) tpass FROM tbl_exam_assign i,tbl_exam e,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d,tbl_user_pso p where s.sm_code=r.tbl_user_sm_sm_code AND r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code AND s.renata_id='$employee_id' AND p.pso_id=i.tbl_pso_pso_id AND i.tbl_exam_exam_id=e.exam_id AND i.exam_status=1 AND '$pass_marks'<=(i.marks*100)/$exam_marks AND e.exam_id='$exam_id'";
//            }
            if ($user_type == '5') {;
                $sql1 = "SELECT count(i.assign_id) tpass FROM tbl_exam_assign i,tbl_exam e,tbl_user_rsm r,tbl_user_dsm d,tbl_user_pso p where  r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code AND r.renata_id='$employee_id' AND p.pso_id=i.tbl_pso_pso_id AND i.tbl_exam_exam_id=e.exam_id AND i.exam_status=1 AND '$pass_marks'<=(i.marks*100)/$exam_marks AND e.exam_id='$exam_id'";
            } else if ($user_type == '6') {
                $sql1 = "SELECT count(i.assign_id) tpass FROM tbl_exam_assign i,tbl_exam e,tbl_user_dsm d,tbl_user_pso p where  d.dsm_code=p.tbl_user_dsm_dsm_code AND d.renata_id='$employee_id' AND p.pso_id=i.tbl_pso_pso_id AND i.tbl_exam_exam_id=e.exam_id AND i.exam_status=1 AND '$pass_marks'<=(i.marks*100)/$exam_marks AND e.exam_id='$exam_id'";
            } else {
                $sql1 = "SELECT count(i.assign_id) tpass FROM tbl_exam_assign i,tbl_exam e,tbl_user_pso p where p.pso_id=i.tbl_pso_pso_id AND i.tbl_exam_exam_id=e.exam_id AND i.exam_status=1 AND '$pass_marks'<=(i.marks*100)/$exam_marks AND e.exam_id='$exam_id'";
            }
            $this->db->query("set character_set_results='utf8'");
            $result = $this->db->query($sql1);
            return $result->result_array();
        }
    }

    public function pso_total_fail($user_type, $employee_id)
    {
        $sql = "SELECT DISTINCT  e.exam_id, e.exam_name,e.exam_marks,e.pass_marks FROM tbl_exam e,tbl_exam_assign a WHERE e.exam_id=a.tbl_exam_exam_id ORDER BY e.exam_name LIMIT 1";
        $this->db->query("set character_set_results='utf8'");
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $res = $query->result();
            $row = $res[0];
            $exam_id = $row->exam_id;
            $exam_marks = $row->exam_marks;
            $pass_marks = $row->pass_marks;
//            if($user_type=='4')
//            {
//                $sql = "SELECT count(i.assign_id) tfail FROM tbl_exam_assign i,tbl_exam e,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d,tbl_user_pso p where s.sm_code=r.tbl_user_sm_sm_code AND r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code AND s.renata_id='$employee_id' AND p.pso_id=i.tbl_pso_pso_id AND i.tbl_exam_exam_id=e.exam_id AND i.exam_status=1 AND '$pass_marks'>(i.marks*100)/$exam_marks AND e.exam_id='$exam_id'";
//            }
            if ($user_type == '5') {
                $sql1 = "SELECT count(i.assign_id) tfail FROM tbl_exam_assign i,tbl_exam e,tbl_user_rsm r,tbl_user_dsm d,tbl_user_pso p where  r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code AND r.renata_id='$employee_id' AND p.pso_id=i.tbl_pso_pso_id AND i.tbl_exam_exam_id=e.exam_id AND i.exam_status=1 AND '$pass_marks'>(i.marks*100)/$exam_marks AND e.exam_id='$exam_id'";
            } else if ($user_type == '6') {
                $sql1 = "SELECT count(i.assign_id) tfail FROM tbl_exam_assign i,tbl_exam e,tbl_user_dsm d,tbl_user_pso p where  d.dsm_code=p.tbl_user_dsm_dsm_code AND d.renata_id='$employee_id' AND p.pso_id=i.tbl_pso_pso_id AND i.tbl_exam_exam_id=e.exam_id AND i.exam_status=1 AND '$pass_marks'>(i.marks*100)/$exam_marks AND e.exam_id='$exam_id'";
            } else {
                $sql1 = "SELECT count(i.assign_id) tfail FROM tbl_exam_assign i,tbl_exam e,tbl_user_pso p where p.pso_id=i.tbl_pso_pso_id AND i.tbl_exam_exam_id=e.exam_id AND i.exam_status=1 AND '$pass_marks'>(i.marks*100)/$exam_marks AND e.exam_id='$exam_id'";
            }
            $this->db->query("set character_set_results='utf8'");
            $result = $this->db->query($sql1);
            return $result->result_array();
        }

    }

    public function pso_total_fail_by_exam_id($exam_id, $user_type, $employee_id)
    {
        $sql = "SELECT * FROM tbl_exam e,tbl_exam_assign a WHERE e.exam_id=a.tbl_exam_exam_id AND e.exam_id='$exam_id'";
        $this->db->query("set character_set_results='utf8'");
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $res = $query->result();
            $row = $res[0];
            $exam_marks = $row->exam_marks;
            $pass_marks = $row->pass_marks;
//            if($user_type=='4')
//            {
//                $sql = "SELECT count(i.assign_id) tfail FROM tbl_exam_assign i,tbl_exam e,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d,tbl_user_pso p where s.sm_code=r.tbl_user_sm_sm_code AND r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code AND s.renata_id='$employee_id' AND p.pso_id=i.tbl_pso_pso_id AND i.tbl_exam_exam_id=e.exam_id AND i.exam_status=1 AND '$pass_marks'>(i.marks*100)/$exam_marks AND e.exam_id='$exam_id'";
//            }
            if ($user_type == '5') {
                $sql1 = "SELECT count(i.assign_id) tfail FROM tbl_exam_assign i,tbl_exam e,tbl_user_rsm r,tbl_user_dsm d,tbl_user_pso p where  r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code AND r.renata_id='$employee_id' AND p.pso_id=i.tbl_pso_pso_id AND i.tbl_exam_exam_id=e.exam_id AND i.exam_status=1 AND '$pass_marks'>(i.marks*100)/$exam_marks AND e.exam_id='$exam_id'";
            } else if ($user_type == '6') {
                $sql1 = "SELECT count(i.assign_id) tfail FROM tbl_exam_assign i,tbl_exam e,tbl_user_dsm d,tbl_user_pso p where  d.dsm_code=p.tbl_user_dsm_dsm_code AND d.renata_id='$employee_id' AND p.pso_id=i.tbl_pso_pso_id AND i.tbl_exam_exam_id=e.exam_id AND i.exam_status=1 AND '$pass_marks'>(i.marks*100)/$exam_marks AND e.exam_id='$exam_id'";
            } else {
                $sql1 = "SELECT count(i.assign_id) tfail FROM tbl_exam_assign i,tbl_exam e,tbl_user_pso p where p.pso_id=i.tbl_pso_pso_id AND i.tbl_exam_exam_id=e.exam_id AND i.exam_status=1 AND '$pass_marks'>(i.marks*100)/$exam_marks AND e.exam_id='$exam_id'";
            }
            $this->db->query("set character_set_results='utf8'");
            $result = $this->db->query($sql1);
            return $result->result_array();
        }
    }

    public function all_exam()
    {

        $this->db->select('tbl_exam.*,COUNT(DISTINCT  tbl_user_rsm.rsm_code) AS rsm_counter,tbl_business.business_name');
        $this->db->from('tbl_exam');
        $this->db->join('tbl_business', 'tbl_business.business_code = tbl_exam.tbl_business_business_code','left');
        $this->db->join('tbl_exam_assign', 'tbl_exam_assign.tbl_exam_exam_id = tbl_exam.exam_id','left');
        $this->db->join('tbl_user_pso', 'tbl_user_pso.pso_id = tbl_exam_assign.tbl_pso_pso_id','left');
        $this->db->join('tbl_user_dsm', 'tbl_user_dsm.dsm_code = tbl_user_pso.tbl_user_dsm_dsm_code','left');
        $this->db->join('tbl_user_rsm', 'tbl_user_rsm.rsm_code = tbl_user_dsm.tbl_user_rsm_rsm_code','left');
        $this->db->where('tbl_exam.status ', '1');
        $this->db->group_by("tbl_exam.exam_id");
        $this->db->order_by("tbl_exam.exam_name",'ASC');
        return $this->db->get()->result_array();


//        $sql = "SELECT DISTINCT e.*,COUNT(DISTINCT  r.rsm_code)
// AS rsm_counter FROM tbl_exam e LEFT JOIN tbl_exam_assign a ON e.exam_id=a.tbl_exam_exam_id
//  LEFT JOIN tbl_user_pso p ON a.tbl_pso_pso_id=p.pso_id
//   LEFT JOIN tbl_user_dsm d ON p.tbl_user_dsm_dsm_code=d.dsm_code
//   LEFT JOIN tbl_user_rsm r ON d.tbl_user_rsm_rsm_code=r.rsm_code GROUP BY e.exam_id";
//        $this->db->query("set character_set_results='utf8'");
//        $result = $this->db->query($sql);
//        return $result->result_array();
    }

    public function edit_test_info_by_exam_id($exam_id)
    {
        $sql = "SELECT * FROM tbl_exam WHERE exam_id='$exam_id'";
        $this->db->query("set character_set_results='utf8'");
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    public function no_of_region_assign($exam_id)
    {
        $sql = "SELECT COUNT(DISTINCT r.rsm_code) as region_counter FROM tbl_exam e,tbl_exam_assign a,tbl_user_pso p,tbl_user_dsm d,tbl_user_rsm r WHERE e.exam_id=a.tbl_exam_exam_id AND p.pso_id=a.tbl_pso_pso_id AND d.dsm_code=p.tbl_user_dsm_dsm_code AND r.rsm_code=d.tbl_user_rsm_rsm_code AND  e.exam_id='$exam_id'";
        $this->db->query("set character_set_results='utf8'");
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function edit_test_question_by_exam_id($exam_id)
    {
        $sql = "SELECT * FROM tbl_question WHERE tbl_exam_exam_id='$exam_id' ORDER BY question_id";
        $this->db->query("set character_set_results='utf8'");
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function update_exam($exam_id, $exam_name,$exam_suggestion,$exp_date, $exam_marks, $exam_time, $exam_type, $pass_marks)
    {
        $exam_name = $this->db->escape_str($exam_name);
        $exam_suggestion = $this->db->escape_str($exam_suggestion);
        $sql = "UPDATE tbl_exam SET exam_name=N'$exam_name',exam_suggestion=N'$exam_suggestion',exp_date=N'$exp_date',duration=N'$exam_time',exam_marks=N'$exam_marks',pass_marks=N'$pass_marks',exam_type=N'$exam_type' WHERE exam_id='$exam_id'";
        $this->db->query($sql);
    }

    public function publish_exam_ans($exam_id)
    {
        $sql = "UPDATE tbl_exam SET publish_status='1' WHERE exam_id='$exam_id'";
        $this->db->query($sql);
    }
    public function save_test($exam_id)
    {
        $sql = "UPDATE tbl_exam SET status='1' WHERE exam_id='$exam_id'";
        $this->db->query($sql);
    }

    public function unpublish_exam_ans($exam_id)
    {
        $sql = "UPDATE tbl_exam SET publish_status='0' WHERE exam_id='$exam_id'";
        $this->db->query($sql);
    }

    public function update_question($question_id, $question, $option1, $option2, $option3, $option4, $answer)
    {
        $question = $this->db->escape_str($question);
        $option1 = $this->db->escape_str($option1);
        $option2 = $this->db->escape_str($option2);
        $option3 = $this->db->escape_str($option3);
        $option4 = $this->db->escape_str($option4);
        $sql = "UPDATE tbl_question SET question=N'$question',option1=N'$option1',option2=N'$option2',option3=N'$option3',option4=N'$option4',answer=N'$answer' WHERE question_id='$question_id'";
        $this->db->query($sql);
    }

    public function all_exam_sort_list()
    {
        $sql = "SELECT DISTINCT e.exam_id,e.exam_name FROM tbl_exam e,tbl_exam_assign a WHERE e.exam_id=a.tbl_exam_exam_id ORDER BY exam_name  ";
        $this->db->query("set character_set_results='utf8'");
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function find_exam_data($exam_id)
    {
        $sql = "SELECT count(a.assign_id) as tattend,count(a.assign_id) as tnattend,count(i.assign_id) tpass,count(i.assign_id) tfail FROM tbl_exam_assign WHERE exam_status=1";
        $this->db->query("set character_set_results='utf8'");
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function delete_question($question_id)
    {
        $sql = "DELETE FROM tbl_question WHERE question_id='$question_id'";
        $result = $this->db->query($sql);
        return $result;
    }


}