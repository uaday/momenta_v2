<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pso_model extends CI_Model {

    public function lcheck($name,$pass)
    {
        $sql="SELECT * FROM users WHERE username='$name' and password='$pass'";
        $this->load->database();
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function get_district($div_id)
    {
        $sql="SELECT * FROM tbl_district WHERE tbl_division_division_id=N'$div_id'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function get_depot($user_type,$employee_id)
    {
        if($user_type=='4')
        {
            $sql="SELECT * FROM tbl_depot d,tbl_user_sm s WHERE s.tbl_depot_depot_code=d.depot_code AND s.renata_id='$employee_id'";
        }
        else if($user_type=='5')
        {
            $sql="SELECT * FROM tbl_depot d,tbl_user_rsm r WHERE r.tbl_depot_depot_code=d.depot_code AND r.renata_id='$employee_id'";
        }
        else if($user_type=='6')
        {
            $sql="SELECT * FROM tbl_depot d,tbl_user_rsm dd WHERE dd.tbl_depot_depot_code=d.depot_code AND dd.renata_id='$employee_id'";
        }
        else
        {
            $sql="SELECT * FROM tbl_depot";
        }
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function get_region()
    {
        $sql="SELECT * FROM tbl_user_rsm ORDER by region";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function get_region_test_assign($business_code)
    {
        $sql="SELECT * FROM tbl_user_rsm WHERE tbl_business_business_code='$business_code' ORDER by rsm_code";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function get_region_psos($region)
    {
        $sql="SELECT p.pso_id,p.pso_name FROM tbl_user_rsm r,tbl_user_pso p, tbl_user_dsm d WHERE p.tbl_user_dsm_dsm_code=d.dsm_code AND d.tbl_user_rsm_rsm_code=r.rsm_code AND r.rsm_code IN ($region) ORDER BY p.pso_id";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function get_pso_by_types($pso_type)
    {
        $sql="SELECT p.pso_id,p.pso_name FROM tbl_user_pso p,tbl_pso_user_type t WHERE p.tbl_pso_user_type_pso_user_type_id=t.pso_user_type_id AND t.pso_user_type_id IN ($pso_type) ORDER BY p.pso_id";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function get_pso_by_types_region($region,$pso_type)
    {

        $sql="SELECT p.renata_id,p.pso_id,p.pso_name FROM tbl_user_pso p,tbl_pso_user_type t,tbl_user_rsm r,tbl_user_dsm d  WHERE p.tbl_pso_user_type_pso_user_type_id=t.pso_user_type_id AND  p.tbl_user_dsm_dsm_code=d.dsm_code AND d.tbl_user_rsm_rsm_code=r.rsm_code AND r.rsm_code IN ($region) AND t.pso_user_type_id IN ($pso_type) ORDER BY p.renata_id";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }



    public function get_pso_type()
    {
        $sql="SELECT * FROM tbl_pso_user_type";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }

    public function get_region_by_pso_type($pso_type)
    {
        $sql="SELECT DISTINCT r.rsm_code,r.region FROM tbl_user_pso p,tbl_user_dsm d,tbl_user_rsm r WHERE p.tbl_user_dsm_dsm_code=d.dsm_code AND d.tbl_user_rsm_rsm_code=r.rsm_code and p.tbl_pso_user_type_pso_user_type_id IN($pso_type)";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }

    public function get_depot1()
    {
        $sql="SELECT * FROM tbl_depot";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }


    public function insert_pso($data)
    {

        $result=$this->db->insert('tbl_user_pso', $data);
        if($result)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public function select_all_pso()
    {
        $this->db->select('tbl_user_pso.renata_id as renata_id,tbl_user_pso.pso_id as pso_id,tbl_user_pso.pso_name as pso_name,tbl_user_pso.pso_phone as pso_phone,tbl_user_rsm.region as region,tbl_business.business_name,tbl_business.business_code,tbl_depot.depot_name as depot_name');
        $this->db->from('tbl_user_pso');
        $this->db->join('tbl_user_dsm', 'tbl_user_dsm.dsm_code = tbl_user_pso.tbl_user_dsm_dsm_code','left');
        $this->db->join('tbl_user_rsm', 'tbl_user_rsm.rsm_code = tbl_user_dsm.tbl_user_rsm_rsm_code','left');
        $this->db->join('tbl_business', 'tbl_business.business_code = tbl_user_pso.tbl_business_business_code','left');
        $this->db->join('tbl_depot', 'tbl_depot.depot_code = tbl_user_pso.tbl_depot_depot_code','left');
        $this->db->order_by("tbl_user_pso.renata_id",'ASC');
        return $this->db->get()->result_array();

    }
    public function update_password($pso_id,$pso_password)
    {
        $sql="UPDATE tbl_user_pso SET pso_password=md5('$pso_password') WHERE pso_id='$pso_id'";
        $this->db->query($sql);
    }
    public function delete_account($pso_id)
    {
        $sql="DELETE FROM tbl_user_pso WHERE pso_id='$pso_id'";
        $this->db->query($sql);
    }
    public function select_pso_by_pso_id($pso_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_user_pso');
        $this->db->join('tbl_business', 'tbl_business.business_code = tbl_user_pso.tbl_business_business_code','left');
        $this->db->join('tbl_pso_user_type', 'tbl_pso_user_type.pso_user_type_id = tbl_user_pso.tbl_pso_user_type_pso_user_type_id','left');
        $this->db->join('tbl_depot', 'tbl_depot.depot_code = tbl_user_pso.tbl_depot_depot_code','left');
        $this->db->where("tbl_user_pso.pso_id",$pso_id);
        return $this->db->get()->result_array();

//
//        $sql="SELECT * FROM tbl_user_pso p,tbl_depot d,tbl_business b,tbl_pso_user_type t WHERE t.pso_user_type_id=p.tbl_pso_user_type_pso_user_type_id AND p.tbl_depot_depot_code=d.depot_code AND p.tbl_business_business_code=b.business_code AND p.pso_id='$pso_id'";
//        $this->db->query("set character_set_results='utf8'");
//        $result=$this->db->query($sql);
//        return $result->result_array();
    }
    public function get_pso_by_business($business_code)
    {
        $sql="SELECT * FROM tbl_user_pso p,tbl_business b WHERE  p.tbl_business_business_code=b.business_code AND b.business_code='$business_code' ORDER BY p.renata_id ASC ";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function update_pso($data,$pso_renata_id)
    {
        $this->db->where('pso_id', $pso_renata_id);
        $this->db->update('tbl_user_pso', $data);
    }
    public function get_psos()
    {
        $query = $this->db->get('tbl_user_pso');
        return $query->result_array();
    }

    public function dsm_code_missing()
    {
        $this->db->select('tbl_user_pso.renata_id as renata_id,tbl_user_pso.pso_id as pso_id');
        $this->db->from('tbl_user_pso');
        $this->db->join('tbl_user_dsm', 'tbl_user_dsm.dsm_code = tbl_user_pso.tbl_user_dsm_dsm_code','left');
        $this->db->where('tbl_user_dsm.dsm_code is null');
        return $this->db->get()->result_array();
    }

    public function pso_code_duplicate()
    {
        $this->db->select('pso_id,renata_id,COUNT(renata_id) AS dup_id');
        $this->db->from('tbl_user_pso');
        $this->db->group_by('renata_id');
        $this->db->having('COUNT(renata_id) > 1');
        return $this->db->get()->result_array();
    }


}