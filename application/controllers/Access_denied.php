<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Access_denied extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $data['login_id']=$this->session->userdata('login_id');

        if($this->session->userdata('change_pass_status')=='0')
        {
            redirect(base_url().'change_password');
        }
        if($data['login_id']!=null)
        {
        }
        else
        {
            redirect(base_url().'login');
        }
    }
    public function index()
    {
        $data['hero_header'] = TRUE;
        $data['footer'] = $this->load->view('view_footer', '', TRUE);
        $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
        $data['main_content'] =$this->parser->parse('view_access_denied',$data,TRUE);
        $this->load->view('view_master',$data);
    }

}