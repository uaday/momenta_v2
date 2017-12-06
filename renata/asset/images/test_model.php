<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test_model extends CI_Model {

    public function create_test($test_name,$test_suggestion,$test_type,$test_time,$test_marks)
    {
        $sql="INSERT INTO tbl_exam(exam_name,duration,exam_marks,exam_type,exam_suggestion,exam_create_date,exam_create_time) VALUES ('$test_name','$test_time','$test_marks','$test_type','$test_suggestion',CURRENT_DATE,CURRENT_TIME)";
        $this->db->query($sql);
        $id=$this->db->insert_id();
        $sql2="SELECT * FROM tbl_exam WHERE exam_id='$id'";
        $result=$this->db->query($sql2);
        return $result->result_array();
    }

    public function upload_ques($test_name,$ques,$op1,$op2,$op3,$op4,$ans,$test_id)
    {
        $sql2="SELECT exam_id FROM tbl_exam WHERE exam_name='$test_name' ORDER BY exam_id DESC limit 1";
        $query=$this->db->query($sql2);
        if ($query->num_rows() > 0) {
            $res = $query->result();
            $row = $res[0];
            $exam_id = $row->exam_id;
            $sql="INSERT INTO tbl_question(question,option1,option2,option3,option4,answer,tbl_exam_exam_id) VALUES ('$ques','$op1','$op2','$op3','$op4','$ans','$exam_id')";
            $result2=$this->db->query($sql);
        }
        else
        {
            $sql3="SELECT exam_id FROM tbl_exam ORDER BY exam_id DESC limit 1";
            $query2=$this->db->query($sql3);
            if ($query2->num_rows() > 0) {
                $res1 = $query2->result();
                $row1 = $res1[0];
                $exam_id1 = $row1->exam_id;
            }
            $sql="INSERT INTO tbl_question(question,option1,option2,option3,option4,answer,tbl_exam_exam_id) VALUES ('$ques','$op1','$op2','$op3','$op4','$ans','$exam_id1')";
            $result2=$this->db->query($sql);
        }

    }
    public function set_global($id)
    {
        $sql1="SELECT pso_id FROM tbl_user_pso";
        $result=$this->db->query($sql1);
        $row=$result->result_array();
        $i=count($row);
        for($j=0;$j<$i;$j++)
        {
            $pso_id=$row[$j]['pso_id'];
            $sql2="INSERT INTO tbl_exam_assign(tbl_exam_exam_id,tbl_pso_pso_id,date,time) VALUES ('$id','$pso_id',CURRENT_DATE,CURRENT_TIME )";
            $this->db->query($sql2);

        }
    }
    public function set_region($id,$rid)
    {
        $sql1="SELECT pso_id FROM tbl_user_pso WHERE tbl_region_region_id='$rid'";
        $result=$this->db->query($sql1);
        $row=$result->result_array();
        $i=count($row);
        for($j=0;$j<$i;$j++)
        {
            $pso_id=$row[$j]['pso_id'];
            $sql2="INSERT INTO tbl_exam_assign(tbl_exam_exam_id,tbl_pso_pso_id,date,time) VALUES ('$id','$pso_id',CURRENT_DATE,CURRENT_TIME )";
            $this->db->query($sql2);

        }
    }
    public function set_psos($id,$rid)
    {
        $sql2="INSERT INTO tbl_exam_assign(tbl_exam_exam_id,tbl_pso_pso_id,date,time) VALUES ('$id','$rid',CURRENT_DATE,CURRENT_TIME )";
        $this->db->query($sql2);
    }

    public function pso_exam_list()
    {
        $sql="SELECT p.renata_id as renata_id, p.pso_id AS pso_id, p.pso_name AS pso_name, count(e.assign_id) AS total_test, sum(e.marks) as total_marks FROM tbl_user_pso p,tbl_exam_assign e WHERE p.pso_id=e.tbl_pso_pso_id GROUP BY p.pso_id ORDER BY p.pso_id";
        $result=$this->db->query($sql);
        return $result->result_array();
    }

    public function pso_exam_list_by_pso_id($pso_id)
    {
        $sql="SELECT p.pso_id as pso_id,p.pso_name as pso_name,sum(i.marks) as total_marks,e.exam_id as exam_id, e.exam_name as exam_name,e.duration as time,e.exam_marks as exam_marks,i.marks as pso_marks,i.assign_id as assign_id,i.exam_status as status from tbl_user_pso p,tbl_exam e,tbl_exam_assign i WHERE p.pso_id='$pso_id' AND p.pso_id=i.tbl_pso_pso_id AND i.tbl_exam_exam_id=e.exam_id GROUP by p.pso_id,i.assign_id,e.exam_id ORDER BY e.exam_id ";
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function pso_exam_by_pso_id($pso_id)
    {
        $sql="SELECT p.pso_id as pso_id,p.pso_name as pso_name,sum(i.marks) as total_marks,count(i.assign_id) as total_test from tbl_user_pso p,tbl_exam_assign i WHERE p.pso_id='$pso_id' AND p.pso_id=i.tbl_pso_pso_id";
        $result=$this->db->query($sql);
        return $result->result_array();
    }

    public function pso_exam_details($pso_id,$assign_id)
    {
        $sql="SELECT p.pso_id as pso_id,p.pso_name as pso_name,e.duration as time,i.marks as marks,e.exam_id as exam_id,e.exam_name as exam_name,e.exam_marks as exam_marks from tbl_user_pso p,tbl_exam e,tbl_exam_assign i WHERE p.pso_id=i.tbl_pso_pso_id AND i.tbl_exam_exam_id=e.exam_id AND p.pso_id='$pso_id' AND i.assign_id='$assign_id'";
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function pso_exam_ques_ans($assign_id)
    {
        $sql="SELECT * from tbl_exam e,tbl_exam_assign i,tbl_question q WHERE e.exam_id=i.tbl_exam_exam_id AND e.exam_id=q.tbl_exam_exam_id AND i.assign_id='$assign_id' ORDER by q.question_id";
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function delete_pso_tests($pso_id)
    {
        $sql="DELETE FROM tbl_exam_assign WHERE tbl_pso_pso_id='$pso_id'";
        $this->db->query($sql);
    }
    public function delete_tests($exam_id)
    {
        $sql="DELETE FROM tbl_exam WHERE exam_id='$exam_id'";
        $this->db->query($sql);
        $sql2="DELETE FROM tbl_exam_assign WHERE tbl_exam_exam_id='$exam_id'";
        $this->db->query($sql2);
        $sql3="DELETE FROM tbl_question WHERE tbl_exam_exam_id='$exam_id'";
        $this->db->query($sql3);
    }
    public function pso_exam_attend_status()
    {
        $sql="SELECT count(assign_id) as tattend FROM tbl_exam_assign WHERE exam_status=1";
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function pso_exam_not_attend_status()
    {
        $sql="SELECT count(assign_id) as tnattend FROM tbl_exam_assign WHERE exam_status=0";
        $result=$this->db->query($sql);
        return $result->result_array();
    }

    public function pso_total_pass()
    {
        $sql="SELECT count(i.assign_id) tpass FROM tbl_exam_assign i,tbl_exam e where i.tbl_exam_exam_id=e.exam_id AND i.exam_status=1 AND i.marks>=e.exam_marks/2";
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function pso_total_fail()
    {
        $sql="SELECT count(i.assign_id) tfail FROM tbl_exam_assign i,tbl_exam e where i.tbl_exam_exam_id=e.exam_id AND i.exam_status=1 AND i.marks<e.exam_marks/2";
        $result=$this->db->query($sql);
        return $result->result_array();
    }

    public function all_exam()
    {
        $sql="SELECT * FROM tbl_exam";
        $result=$this->db->query($sql);
        return $result->result_array();
    }

    public function edit_test_info_by_exam_id($exam_id)
    {
        $sql="SELECT * FROM tbl_exam WHERE exam_id='$exam_id'";
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function edit_test_question_by_exam_id($exam_id)
    {
        $sql="SELECT * FROM tbl_question WHERE tbl_exam_exam_id='$exam_id'";
        $result=$this->db->query($sql);
        return $result->result_array();
    }

    public function update_exam($exam_id,$exam_name,$exam_marks,$exam_time)
    {
        $sql="UPDATE tbl_exam SET exam_name='$exam_name',duration='$exam_time',exam_marks='$exam_marks' WHERE exam_id='$exam_id'";
        $this->db->query($sql);
    }

    public function publish_exam_ans($exam_id)
    {
        $sql="UPDATE tbl_exam SET publish_status='1' WHERE exam_id='$exam_id'";
        $this->db->query($sql);
    }
    public function unpublish_exam_ans($exam_id)
    {
        $sql="UPDATE tbl_exam SET publish_status='0' WHERE exam_id='$exam_id'";
        $this->db->query($sql);
    }
    public function update_question($question_id,$question,$option1,$option2,$option3,$option4,$answer)
    {
        $sql="UPDATE tbl_question SET question='$question',option1='$option1',option2='$option2',option3='$option3',option4='$option4',answer='$answer' WHERE question_id='$question_id'";
        $this->db->query($sql);
    }


}