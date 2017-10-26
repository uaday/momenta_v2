<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Med_info_model extends CI_Model
{
    public function add_gen_name($bcode,$gen_name)
    {
        $sql="INSERT INTO tbl_drug_generic_name(gen_name,tbl_business_business_code) VALUES (N'$gen_name',N'$bcode')";
        $this->db->query($sql);
    }
    public function add_doc_type($doc_type)
    {
        $sql="INSERT INTO tbl_doctor_type(type_name) VALUES (N'$doc_type')";
        $this->db->query($sql);
    }
    public function add_drug_name($data)
    {
        $result=$this->db->insert('tbl_drug', $data);
        if($result)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public function edit_gen_name($bcode,$gen_id,$gen_name)
    {
        $sql1="SELECT * FROM tbl_drug_generic_name WHERE gen_name='$gen_name' AND gen_id<>'$gen_id'";
        $result=$this->db->query($sql1);
        if($result->num_rows>0)
        {
            return 0;
        }
        else
        {
            $sql2="UPDATE tbl_drug_generic_name SET gen_name=N'$gen_name',tbl_business_business_code=N'$bcode' WHERE gen_id='$gen_id'";
            $this->db->query($sql2);
            return 1;
        }
    }
    public function edit_doc_type($doc_type,$doc_type_id)
    {
        $sql1="SELECT * FROM tbl_doctor_type WHERE type_name='$doc_type' AND doc_type_id<>'$doc_type_id'";
        $result=$this->db->query($sql1);
        if($result->num_rows>0)
        {
            return 0;
        }
        else
        {
            $sql2="UPDATE tbl_doctor_type SET type_name='$doc_type' WHERE doc_type_id='$doc_type_id'";
            $this->db->query($sql2);
            return 1;
        }
    }
    public function edit_drug_name($drug_id,$drug_name,$gen_id,$pm_name,$pm_phone)
    {
        $sql1="SELECT * FROM tbl_drug WHERE drug_name='$drug_name' AND drug_id<>'$drug_id'";
        $result=$this->db->query($sql1);
        if($result->num_rows>0)
        {
            return 0;
        }
        else
        {
            $sql2="UPDATE tbl_drug SET drug_name=N'$drug_name' ,tbl_drug_generic_name_gen_id='$gen_id',pm_name='$pm_name',pm_phone='$pm_phone' WHERE drug_id='$drug_id'";
            $this->db->query($sql2);
            return 1;
        }
    }

    public function getAllDrugs(){
        $sql="SELECT * FROM tbl_drug d,tbl_drug_generic_name g,tbl_business b WHERE b.business_code=g.tbl_business_business_code AND  b.business_code=d.tbl_business_business_code AND  g.gen_id=d.tbl_drug_generic_name_gen_id";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }

    public function delete_gen_name($gen_id,$password)
    {

        $query = $this->db->get_where('tbl_login', array('renata_id' => $this->session->userdata('employee_id'),'password' => md5($password)));

        if($query->num_rows()>0)
        {
            $sql="DELETE FROM tbl_drug_generic_name WHERE gen_id='$gen_id'";
            $this->db->query($sql);
            $employee_id=$this->session->userdata('employee_id');
            $sql1="INSERT INTO tbl_drug_generic_name_log (purpose,tbl_login_login_id,tbl_drug_generic_name_gen_id,date) VALUES(N'DELETE DOC TYPE',N'$employee_id',N'$gen_id',CURRENT_DATE ) ";
            $this->db->query($sql1);
            return 1;
        }
        else if($query->num_rows()==0)
        {
            return 0;
        }
    }
    public function delete_drug_name($drug_id,$password)
    {
        $query = $this->db->get_where('tbl_login', array('renata_id' => $this->session->userdata('employee_id'),'password' => md5($password)));

        if($query->num_rows()>0)
        {
            $sql="DELETE FROM tbl_drug WHERE drug_id='$drug_id'";
            $this->db->query($sql);
            $employee_id=$this->session->userdata('employee_id');
            $sql1="INSERT INTO tbl_drug_log (purpose,tbl_login_login_id,tbl_drug_drug_id,date) VALUES(N'DELETE DRUG NAME',N'$employee_id',N'$drug_id',CURRENT_DATE ) ";
            $this->db->query($sql1);
            return 1;
        }
        else if($query->num_rows()==0)
        {
            return 0;
        }
    }
    public function delete_doc_type($doc_type_id,$password)
    {
        $query = $this->db->get_where('tbl_login', array('renata_id' => $this->session->userdata('employee_id'),'password' => md5($password)));
        if($query->num_rows()>0)
        {
            $sql="DELETE FROM tbl_doctor_type WHERE doc_type_id='$doc_type_id'";
            $this->db->query($sql);
            $employee_id=$this->session->userdata('employee_id');
            $sql1="INSERT INTO tbl_docotor_type_log(purpose,tbl_login_login_id,tbl_doctor_type_doc_type_id,date) VALUES(N'DELETE DOC TYPE',N'$employee_id',N'$doc_type_id',CURRENT_DATE ) ";
            $this->db->query($sql1);
            return 1;
        }
        else if($query->num_rows()==0)
        {
            return 0;
        }
    }


}