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

    public function insert_incentive($data)
    {
        $result=$this->db->insert('tbl_incentives', $data);
        if($result)
        {
            return 1;
        }
        else
        {
            return 0;
        }
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

    public function show_all_booked_incentive()
    {
        $b_code=$this->session->userdata('business_code');
        if($b_code=='01')
        {
            $sql="SELECT p.*,t.*,i.*,r.region FROM tbl_incentives_transection t,tbl_user_pso p,tbl_incentives i,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d WHERE p.tbl_business_business_code='01' AND s.sm_code=r.tbl_user_sm_sm_code AND r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code  AND p.pso_id=t.tbl_pso_pso_id AND i.incentives_id=t.tbl_incentives_incentives_id AND  booked_incentive='1' AND t.approve!='1' ORDER BY t.redeem_date DESC,r.region ASC,p.renata_id ASC";
        }
        else if($b_code=='02')
        {
            $sql="SELECT p.*,t.*,i.*,r.region FROM tbl_incentives_transection t,tbl_user_pso p,tbl_incentives i,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d WHERE p.tbl_business_business_code='02' AND s.sm_code=r.tbl_user_sm_sm_code AND r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code  AND p.pso_id=t.tbl_pso_pso_id AND i.incentives_id=t.tbl_incentives_incentives_id AND  booked_incentive='1' AND t.approve!='1' ORDER BY t.redeem_date DESC,r.region ASC,p.renata_id ASC";
        }
        else
        {
            $sql="SELECT p.*,t.*,i.*,r.region FROM tbl_incentives_transection t,tbl_user_pso p,tbl_incentives i,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d WHERE s.sm_code=r.tbl_user_sm_sm_code AND r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code  AND p.pso_id=t.tbl_pso_pso_id AND i.incentives_id=t.tbl_incentives_incentives_id AND  booked_incentive='1' AND t.approve!='1' ORDER BY t.redeem_date DESC,r.region ASC,p.renata_id ASC";
        }
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }

    public function show_all_user_booked_incentive()
    {
        $renata_id=$this->session->userdata('employee_id');
        $user_type=$this->session->userdata('user_type');
        if($user_type=='04')
        {
            $sql="SELECT p.*,t.*,i.*,r.region FROM tbl_incentives_transection t,tbl_user_pso p,tbl_incentives i,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d WHERE  s.sm_code=r.tbl_user_sm_sm_code AND r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code  AND p.pso_id=t.tbl_pso_pso_id AND i.incentives_id=t.tbl_incentives_incentives_id AND s.renata_id='$renata_id' AND  booked_incentive='1' AND t.approve!='1' ORDER BY t.redeem_date DESC,r.region ASC,p.renata_id ASC";
        }
        else if($user_type=='05')
        {
            $sql="SELECT p.*,t.*,i.*,r.region FROM tbl_incentives_transection t,tbl_user_pso p,tbl_incentives i,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d WHERE  s.sm_code=r.tbl_user_sm_sm_code AND r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code  AND p.pso_id=t.tbl_pso_pso_id AND i.incentives_id=t.tbl_incentives_incentives_id AND r.renata_id='$renata_id' AND  booked_incentive='1' AND t.approve!='1' ORDER BY t.redeem_date DESC,r.region ASC,p.renata_id ASC";
        }
        else if($user_type=='06')
        {
            $sql="SELECT p.*,t.*,i.*,r.region FROM tbl_incentives_transection t,tbl_user_pso p,tbl_incentives i,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d WHERE  s.sm_code=r.tbl_user_sm_sm_code AND r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code  AND p.pso_id=t.tbl_pso_pso_id AND i.incentives_id=t.tbl_incentives_incentives_id AND d.renata_id='$renata_id' AND  booked_incentive='1' AND t.approve!='1' ORDER BY t.redeem_date DESC,r.region ASC,p.renata_id ASC";
        }
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }
    public function show_all_incentive_history()
    {
        $b_code=$this->session->userdata('business_code');
        $user_type=$this->session->userdata('user_type');
        $renata_id=$this->session->userdata('employee_id');
        if($user_type=='4')
        {
            $sql="SELECT p.*,t.*,i.*,h.*,r.region FROM tbl_incentives_transection t,tbl_user_pso p,tbl_incentives i,tbl_incentives_history h,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d WHERE s.sm_code=r.tbl_user_sm_sm_code AND r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code  AND h.tbl_incentives_transection_transection_id=t.transection_id AND p.pso_id=t.tbl_pso_pso_id AND i.incentives_id=t.tbl_incentives_incentives_id AND s.renata_id='$renata_id'   ORDER BY h.approval_date DESC,r.region ASC,p.renata_id ASC";
        }
        else if($user_type=='5')
        {
            $sql="SELECT p.*,t.*,i.*,h.*,r.region FROM tbl_incentives_transection t,tbl_user_pso p,tbl_incentives i,tbl_incentives_history h,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d WHERE s.sm_code=r.tbl_user_sm_sm_code AND r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code  AND h.tbl_incentives_transection_transection_id=t.transection_id AND p.pso_id=t.tbl_pso_pso_id AND i.incentives_id=t.tbl_incentives_incentives_id AND r.renata_id='$renata_id'   ORDER BY h.approval_date DESC,r.region ASC,p.renata_id ASC";
        }
        else if($user_type=='6')
        {
            $sql="SELECT p.*,t.*,i.*,h.*,r.region FROM tbl_incentives_transection t,tbl_user_pso p,tbl_incentives i,tbl_incentives_history h,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d WHERE s.sm_code=r.tbl_user_sm_sm_code AND r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code  AND h.tbl_incentives_transection_transection_id=t.transection_id AND p.pso_id=t.tbl_pso_pso_id AND i.incentives_id=t.tbl_incentives_incentives_id AND d.renata_id='$renata_id'   ORDER BY h.approval_date DESC,r.region ASC,p.renata_id ASC";
        }
        else
        {
            if($b_code=='00')
            {
                $sql="SELECT p.*,t.*,i.*,h.*,r.region FROM tbl_incentives_transection t,tbl_user_pso p,tbl_incentives i,tbl_incentives_history h,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d WHERE s.sm_code=r.tbl_user_sm_sm_code AND r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code  AND h.tbl_incentives_transection_transection_id=t.transection_id AND p.pso_id=t.tbl_pso_pso_id AND i.incentives_id=t.tbl_incentives_incentives_id ORDER BY h.approval_date DESC,r.region ASC,p.renata_id ASC";
            }
            else
            {
                $sql="SELECT p.*,t.*,i.*,h.*,r.region FROM tbl_incentives_transection t,tbl_user_pso p,tbl_incentives i,tbl_incentives_history h,tbl_user_sm s,tbl_user_rsm r,tbl_user_dsm d WHERE p.tbl_business_business_code='$b_code' AND s.sm_code=r.tbl_user_sm_sm_code AND r.rsm_code=d.tbl_user_rsm_rsm_code AND d.dsm_code=p.tbl_user_dsm_dsm_code  AND h.tbl_incentives_transection_transection_id=t.transection_id AND p.pso_id=t.tbl_pso_pso_id AND i.incentives_id=t.tbl_incentives_incentives_id ORDER BY h.approval_date DESC,r.region ASC,p.renata_id ASC";
            }
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
        $sql="SELECT p.renata_id AS PSO_CODE,p.pso_id AS EMPLOYEE_CODE,p.pso_name AS NAME,ur.region AS REGION ,d.depot_name AS DEPOT, i.incentives_name AS INCENTIVE_NAME,t.redeem_date AS REDEEM_DATE   FROM tbl_incentives_transection t,tbl_user_pso p,tbl_incentives i,tbl_depot d,tbl_user_dsm ud,tbl_user_rsm ur WHERE ur.rsm_code=ud.tbl_user_rsm_rsm_code AND ud.dsm_code=p.tbl_user_dsm_dsm_code AND  p.tbl_depot_depot_code=d.depot_code AND p.pso_id=t.tbl_pso_pso_id AND i.incentives_id=t.tbl_incentives_incentives_id AND  booked_incentive='1' AND t.approve!='1'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result;
    }
    public function get_history()
    {
        $sql="SELECT p.renata_id AS PSO_CODE,p.pso_id AS EMPLOYEE_CODE,p.pso_name AS NAME,ur.region AS REGION,d.depot_name AS DEPOT, i.incentives_name AS INCENTIVE_NAME,h.approval_date as APPROVAL_DATE    FROM tbl_incentives_history h,tbl_incentives_transection t,tbl_user_pso p,tbl_incentives i,tbl_depot d,tbl_user_dsm ud,tbl_user_rsm ur WHERE h.tbl_incentives_transection_transection_id=t.transection_id AND ur.rsm_code=ud.tbl_user_rsm_rsm_code AND ud.dsm_code=p.tbl_user_dsm_dsm_code AND  p.tbl_depot_depot_code=d.depot_code AND p.pso_id=t.tbl_pso_pso_id AND i.incentives_id=t.tbl_incentives_incentives_id AND  booked_incentive='1' AND t.approve='1'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result;
    }

    public function all_incentives()
    {
        if($this->session->userdata('business_code')=='00')
        {
            $this->db->select('*');
            $this->db->from('tbl_incentives');
            $this->db->join('tbl_business', 'tbl_business.business_code = tbl_incentives.tbl_business_business_code');
            return $this->db->get()->result_array();
        }
        else
        {
            $this->db->select('*');
            $this->db->from('tbl_incentives');
            $this->db->join('tbl_business', 'tbl_business.business_code = tbl_incentives.tbl_business_business_code');
            $this->db->where('tbl_business.business_code', $this->session->userdata('business_code'));
            return $this->db->get()->result_array();
        }

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

    public function edit_incentives_by_incentives_id($data,$in_id)
    {
        $this->db->where('incentives_id', $in_id);
        $result=$this->db->update('tbl_incentives', $data);
        if($result)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }


}