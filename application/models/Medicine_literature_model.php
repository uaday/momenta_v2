<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Medicine_literature_model extends CI_Model {

    // Medicine library for business code
    public function getAllbusiness()
    {
        $sql="SELECT * FROM tbl_business";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function getAllGen()
    {
        $sql="SELECT * FROM tbl_drug_generic_name g, tbl_business b WHERE  b.business_code=g.tbl_business_business_code ORDER BY g.gen_name ";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function getAllDoc()
    {
        $sql="SELECT * FROM tbl_doctor_type";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function getAll(){
        $sql="SELECT * FROM tbl_drug";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function get_gen_by_business_code($business_code)
    {
        $sql="SELECT * FROM tbl_drug_generic_name g,tbl_business b  WHERE b.business_code=g.tbl_business_business_code AND  b.business_code='$business_code' ORDER BY g.gen_name";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function get_doctor_type_by_business_code($business_code)
    {
        $sql="SELECT * FROM tbl_doctor_type d,tbl_business b  WHERE b.business_code=d.tbl_business_business_code AND  b.business_code='$business_code' ORDER BY d.doc_type_id";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function get_drug_by_gen_id($gen_id)
    {
        $sql="SELECT * FROM tbl_drug WHERE tbl_drug_generic_name_gen_id='$gen_id' ORDER BY drug_name";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function get_version_by_doc_type($doc_type,$drug_id)
    {
        $sql="SELECT * FROM tbl_drug_detail_version WHERE   tbl_doctor_type_doc_type_id='$doc_type' AND tbl_drug_drug_id='$drug_id'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function get_version_data($version_id)
    {
        $sql="SELECT * FROM tbl_drug_detail_version dd,tbl_drug_des d WHERE d.tbl_drug_drug_id=dd.tbl_drug_drug_id AND  detail_version_id='$version_id'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function get_file_by_type($type,$drug_id)
    {
        if($type==1)
        {
            $sql="SELECT drug_full_book FROM tbl_drug_des WHERE tbl_drug_drug_id='$drug_id'";
        }
        else if($type==2)
        {
            $sql="SELECT benefits_feature FROM tbl_drug_des WHERE tbl_drug_drug_id='$drug_id'";
        }
        else
        {
            $sql="SELECT drug_image FROM tbl_drug_des WHERE tbl_drug_drug_id='$drug_id'";
        }
        $this->db->query("set character_set_results='utf8'");
        $query=$this->db->query($sql);
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            $sql="INSERT INTO tbl_drug_des(tbl_drug_drug_id,create_drug_date,create_drug_time) VALUES(N'$drug_id',CURRENT_DATE,CURRENT_TIME )";
            $this->db->query($sql);
        }
    }

    public function insert($data,$type,$drug_id){
        if($type==1)
        {
            $sql1="SELECT drug_full_book FROM tbl_drug_des WHERE  tbl_drug_drug_id=N'$drug_id'";
            $result=$this->db->query($sql1);
            $row=$result->result();
            $full_book=$row['0']->drug_full_book;
            $full_book=str_replace(base_url(),"",$full_book);
            unlink($full_book);
            $sql="UPDATE tbl_drug_des SET drug_full_book=N'$data' WHERE tbl_drug_drug_id=N'$drug_id'";
        }
        else if($type==2)
        {
            $sql1="SELECT benefits_feature FROM tbl_drug_des WHERE  tbl_drug_drug_id=N'$drug_id'";
            $result=$this->db->query($sql1);
            $row=$result->result();
            $benefits_feature=$row['0']->benefits_feature;
            $benefits_feature=str_replace(base_url(),"",$benefits_feature);
            unlink($benefits_feature);
            $sql="UPDATE tbl_drug_des SET benefits_feature=N'$data' WHERE tbl_drug_drug_id=N'$drug_id'";
        }
        else
        {
            $sql1="SELECT drug_image FROM tbl_drug_des WHERE  tbl_drug_drug_id=N'$drug_id'";
            $result=$this->db->query($sql1);
            $row=$result->result();
            $drug_image=$row['0']->drug_image;
            $drug_image=str_replace(base_url(),"",$drug_image);
            unlink($drug_image);
            $sql="UPDATE tbl_drug_des SET drug_image=N'$data' WHERE tbl_drug_drug_id=N'$drug_id'";
        }
        $result=$this->db->query($sql);
        return $result;
    }

    public function get_new_version_id($doc_type,$drug_id)
    {
        $sql="SELECT version_id from tbl_drug_detail_version WHERE  tbl_doctor_type_doc_type_id=N'$doc_type' AND tbl_drug_drug_id=N'$drug_id' ORDER BY version_id DESC limit 1";
        $query=$this->db->query($sql);
        if ($query->num_rows() > 0)
        {
            $res=$query->result();
            $row=$res[0];
            $id=$row->version_id;
            $id=$id+1;
            $sql2="INSERT INTO tbl_drug_detail_version(version_id,tbl_doctor_type_doc_type_id,tbl_drug_drug_id,create_date) VALUES (N'$id',N'$doc_type',N'$drug_id',CURRENT_DATE )";
        }
        else
        {
            $sql2="INSERT INTO tbl_drug_detail_version(version_id,tbl_doctor_type_doc_type_id,tbl_drug_drug_id,create_date) VALUES (N'1',N'$doc_type',N'$drug_id',CURRENT_DATE )";
        }
        $this->db->query($sql2);
        $sql3="SELECT dd.detail_version_id AS detail_version_id,d.drug_name_audio AS drug_name_audio from tbl_drug_detail_version dd,tbl_drug_des d WHERE d.tbl_drug_drug_id=dd.tbl_drug_drug_id AND  dd.tbl_doctor_type_doc_type_id='$doc_type' AND dd.tbl_drug_drug_id='$drug_id' ORDER BY version_id DESC limit 1";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql3);
        return $result->result_array();
    }

    public function insert_version_data($version_id,$point1,$point2,$point3,$image_test,$drug_id)
    {
        $point1=$this->db->escape_str($point1);
        $point2=$this->db->escape_str($point2);
        $point3=$this->db->escape_str($point3);

        $sql="UPDATE tbl_drug_detail_version SET drug_detail_image=N'$image_test',point1=N'$point1',point2=N'$point2',point3=N'$point3' WHERE detail_version_id='$version_id'";
        $result=$this->db->query($sql);


        $sql1="SELECT * FROM tbl_drug_des WHERE tbl_drug_drug_id='$drug_id'";
        $query=$this->db->query($sql1);
        if ($query->num_rows() > 0)
        {

        }
        else
        {
            $sql2="INSERT INTO tbl_drug_des(tbl_drug_drug_id,create_drug_date,create_drug_time) VALUES(N'$drug_id',CURRENT_DATE,CURRENT_TIME )";
            $this->db->query($sql2);
        }

        return $result;
    }

    public function getAllMed()
    {
        $sql='SELECT * FROM tbl_drug d,tbl_drug_des dd WHERE d.drug_id=dd.tbl_drug_drug_id';
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function getFourMed()
    {
        $sql='SELECT * FROM tbl_drug d,tbl_drug_des dd WHERE d.drug_id=dd.tbl_drug_drug_id ORDER BY dd.drug_des_id DESC LIMIT 4';
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }

    public function delete_drug($drug_des_id,$type)
    {
        if($type==1)
        {
            $sql="UPDATE tbl_drug_des SET drug_full_book='' WHERE drug_des_id=N'$drug_des_id'";
        }
        else
        {
            $sql="UPDATE tbl_drug_des SET benefits_feature='' WHERE drug_des_id=N'$drug_des_id'";
        }
        $result=$this->db->query($sql);
        return $result;
    }

    public function delete_version($version_id)
    {
        $sql="DELETE FROM tbl_drug_detail_version WHERE detail_version_id='$version_id'";
        $result=$this->db->query($sql);
        $employee_id=$this->session->userdata('employee_id');
        $sql1="INSERT INTO tbl_drug_detail_version_log(purpose,tbl_login_login_id,tbl_drug_detail_version_detail_version_id,date) VALUES(N'DELETE DOC TYPE',N'$employee_id',N'$version_id',CURRENT_DATE ) ";
        $this->db->query($sql1);
        return $result;
    }

}