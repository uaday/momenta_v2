<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function lcheck($email,$pass)
    {
        $data=array(
            'renata_id'=>$email,
            'password'=>md5($pass)
        );
        $query = $this->db->get_where('tbl_login',$data);
        return $query->result();
    }
    public function update_login_status($renata_id)
    {
        $sql="UPDATE tbl_login set last_login_date=CURRENT_DATE ,last_login_time=CURRENT_TIME WHERE renata_id=N'$renata_id'";
        $this->db->query($sql);
    }

}