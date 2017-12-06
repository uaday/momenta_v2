<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tar_shop_model extends CI_Model {

    public function lcheck($name,$pass)
    {
        $sql="SELECT * FROM users WHERE username='$name' and password='$pass'";
        $this->load->database();
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }

    public function insert_incentive($in_title,$in_description,$in_validation,$in_point,$in_quantity,$pp)
    {
        $in_title=$this->db->escape_str($in_title);
        $in_description=$this->db->escape_str($in_description);
        $sql="INSERT INTO tbl_incentives(incentives_name,incentives_description,incentives_image,create_date,status,exp_date,incentives_point,quantity) VALUES(N'$in_title',N'$in_description','$pp',now(),'1','$in_validation','$in_point','$in_quantity')";
        $this->db->query($sql);
        return $this->db->insert_id();
    }
    public function set_global($id)
    {
        $sql1="SELECT pso_id FROM tbl_user_pso";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql1);
        $row=$result->result_array();
        $i=count($row);
        for($j=0;$j<$i;$j++)
        {
            $pso_id=$row[$j]['pso_id'];
            $sql2="INSERT INTO tbl_incentives_transection(tbl_incentives_incentives_id,tbl_pso_pso_id,date) VALUES (N'$id',N'$pso_id',now())";
            $this->db->query($sql2);

        }
    }

    public function get_region()
    {
        $sql="SELECT * FROM tbl_region";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function get_pso($user_type,$employee_id)
    {
        if($user_type=='4')
        {
            $sql="SELECT * FROM tbl_user_pso p,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d WHERE s.renata_id='$employee_id' AND s.sm_code=r.tbl_user_sm_sm_code AND r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code";
        }
        else if($user_type=='5')
        {
            $sql="SELECT * FROM tbl_user_pso p,tbl_user_rsm r,tbl_user_dsm d WHERE r.renata_id='$employee_id' AND r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code";
        }
        else if($user_type=='6')
        {
            $sql="SELECT * FROM tbl_user_pso p,tbl_user_dsm d WHERE d.renata_id='$employee_id' AND r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code";
        }
        else
        {
            $sql="SELECT *  from tbl_user_pso";
        }

        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function set_depot($id,$rid)
    {
        $sql1="SELECT pso_id FROM tbl_user_pso WHERE tbl_depot_depot_code='$rid'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql1);
        $row=$result->result_array();
        $i=count($row);
        for($j=0;$j<$i;$j++)
        {
            $pso_id=$row[$j]['pso_id'];
            $sql2="INSERT INTO tbl_incentives_transection(tbl_incentives_incentives_id,tbl_pso_pso_id,date) VALUES ('$id','$pso_id',CURRENT_DATE )";
            $this->db->query($sql2);

        }
    }
    public function set_psos($id,$rid)
    {
        $sql2="INSERT INTO tbl_incentives_transection(tbl_incentives_incentives_id,tbl_pso_pso_id,date) VALUES (N'$id',N'$rid',now())";
        $this->db->query($sql2);
    }

    public function show_all_booked_incentive($user_type,$employee_id)
    {
        if($user_type=='4')
        {
            $sql="SELECT * FROM tbl_incentives_transection t,tbl_user_pso p,tbl_incentives i,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d WHERE s.sm_code=r.tbl_user_sm_sm_code AND r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code AND s.renata_id='$employee_id' AND p.pso_id=t.tbl_pso_pso_id AND i.incentives_id=t.tbl_incentives_incentives_id AND  booked_incentive='1' AND t.approve!='1'";
        }
        else if($user_type=='5')
        {
            $sql="SELECT * FROM tbl_incentives_transection t,tbl_user_pso p,tbl_incentives i,tbl_user_rsm r,tbl_user_dsm d WHERE r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code AND r.renata_id='$employee_id' AND p.pso_id=t.tbl_pso_pso_id AND i.incentives_id=t.tbl_incentives_incentives_id AND  booked_incentive='1' AND t.approve!='1'";
        }
        else if($user_type=='6')
        {
            $sql="SELECT * FROM tbl_incentives_transection t,tbl_user_pso p,tbl_incentives i,tbl_user_dsm d WHERE d.dsm_code=p.tbl_user_dsm_dsm_code AND s.renata_id='$employee_id' AND p.pso_id=t.tbl_pso_pso_id AND i.incentives_id=t.tbl_incentives_incentives_id AND  booked_incentive='1' AND t.approve!='1'";
        }
        else
        {
            $sql="SELECT * FROM tbl_incentives_transection t,tbl_user_pso p,tbl_incentives i WHERE p.pso_id=t.tbl_pso_pso_id AND i.incentives_id=t.tbl_incentives_incentives_id AND  booked_incentive='1' AND t.approve!='1'";
        }
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function show_all_incentive_history($user_type,$employee_id)
    {
        if($user_type=='4')
        {
            $sql="SELECT * FROM tbl_incentives_transection t,tbl_user_pso p,tbl_incentives i,tbl_incentives_history h,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d WHERE s.sm_code=r.tbl_user_sm_sm_code AND r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code AND s.renata_id='$employee_id' AND h.tbl_incentives_transection_transection_id=t.transection_id AND p.pso_id=t.tbl_pso_pso_id AND i.incentives_id=t.tbl_incentives_incentives_id ";
        }
        else if($user_type=='5')
        {
            $sql="SELECT * FROM tbl_incentives_transection t,tbl_user_pso p,tbl_incentives i,tbl_incentives_history h,tbl_user_rsm r,tbl_user_dsm d WHERE  r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code AND r.renata_id='$employee_id' AND h.tbl_incentives_transection_transection_id=t.transection_id AND p.pso_id=t.tbl_pso_pso_id AND i.incentives_id=t.tbl_incentives_incentives_id ";
        }
        else if($user_type=='6')
        {
            $sql="SELECT * FROM tbl_incentives_transection t,tbl_user_pso p,tbl_incentives i,tbl_incentives_history h,tbl_user_dsm d WHERE  d.dsm_code=p.tbl_user_dsm_dsm_code AND d.renata_id='$employee_id' AND h.tbl_incentives_transection_transection_id=t.transection_id AND p.pso_id=t.tbl_pso_pso_id AND i.incentives_id=t.tbl_incentives_incentives_id ";
        }
        else
        {
            $sql="SELECT * FROM tbl_incentives_transection t,tbl_user_pso p,tbl_incentives i,tbl_incentives_history h WHERE h.tbl_incentives_transection_transection_id=t.transection_id AND p.pso_id=t.tbl_pso_pso_id AND i.incentives_id=t.tbl_incentives_incentives_id ";
        }
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function approve_transaction($id)
    {
        $sql1="UPDATE tbl_incentives_transection SET approve='1' WHERE transection_id='$id'";
        $this->db->query($sql1);
        $sql2="INSERT INTO tbl_incentives_history(approval_date,tbl_incentives_transection_transection_id) VALUES (CURRENT_DATE,'$id')";
        $this->db->query($sql2);
    }

    public function get_transaction()
    {
        $sql="SELECT p.renata_id AS PSO_ID,p.pso_name AS NAME,d.depot_name AS AREA,i.incentives_id AS INCENTIVE_ID, i.incentives_name AS INCENTIVE_NAME    FROM tbl_incentives_transection t,tbl_user_pso p,tbl_incentives i,tbl_depot d WHERE p.tbl_depot_depot_code=d.depot_code AND p.pso_id=t.tbl_pso_pso_id AND i.incentives_id=t.tbl_incentives_incentives_id AND  booked_incentive='1' AND t.approve!='1'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result;
    }

    public function all_incentives()
    {
        $sql="SELECT * FROM tbl_incentives";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }

    public function update_status($incentives_id,$status)
    {
        $sql="UPDATE tbl_incentives SET status='$status' WHERE incentives_id='$incentives_id'";
        $this->db->query($sql);
    }

    public function delete_incentives($incentives_id)
    {
        $sql="DELETE FROM tbl_incentives WHERE incentives_id='$incentives_id'";
        $this->db->query($sql);
        $sql2="DELETE FROM tbl_incentives_transection WHERE tbl_incentives_incentives_id='$incentives_id'";
        $this->db->query($sql2);
    }

    public function select_incentive_by_incentive_id($incentive_id)
    {
        $sql="SELECT * FROM tbl_incentives WHERE incentives_id='$incentive_id'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }

    public function edit_incentives_by_incentives_id($in_id,$in_title,$in_description,$in_validation,$in_point,$in_quantity)
    {
        $in_title=$this->db->escape_str($in_title);
        $in_description=$this->db->escape_str($in_description);
        $sql="UPDATE tbl_incentives SET incentives_name=N'$in_title',incentives_description=N'$in_description',exp_date=N'$in_validation',incentives_point=N'$in_point',quantity=N'$in_quantity' WHERE incentives_id='$in_id'";
        $this->db->query($sql);
    }


}