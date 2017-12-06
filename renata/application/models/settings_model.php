<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings_model extends CI_Model {

    public function pcheck($id,$pass)
    {
        $sql="SELECT * FROM tbl_login WHERE password=md5('$pass') and login_id='$id'";
        $this->db->query("set character_set_results='utf8'");
        $result=$this->db->query($sql);
        return $result->result_array();
    }

    public function change_password($repeat_p,$admin_id)
    {
        $sql="UPDATE tbl_login set password=md5('$repeat_p'),change_pass_status=1 WHERE login_id='$admin_id'";
        $this->db->query("set character_set_results='utf8'");
        $this->db->query($sql);
    }

}