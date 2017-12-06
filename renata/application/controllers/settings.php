<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $data['name']=$this->session->userdata('name');
        $data['login_id']=$this->session->userdata('login_id');
        $data['tincentives']=$this->home_model->total_incentives();
        $data['texam']=$this->home_model->total_exam();
        $user_type=$this->session->userdata('user_type');
        $employee_id=$this->session->userdata('employee_id');
        $data['tpso']=$this->home_model->total_pso($user_type,$employee_id);
        $data['tdrug']=$this->home_model->total_drug();


        if($data['login_id']!=null)
        {
            $this->load->view('view_dashboard',$data);
        }
        else
        {
            redirect(base_url().'login');
        }
        
    }

    public function index()
    {
        $this->load->view('view_dashboard');
    }
    public function change_password()
    {
        $this->load->view('view_change_password');
    }

    public function check_pass()
    {
        $id=$this->input->post('id');
        $pass=$this->input->post('pass');
        $result=$this->settings_model->pcheck($id,$pass);
        if($result)
        {
            echo $result['0']['login_id'];
        }
        else
        {
            echo '';
        }
    }

    public function password_change()
    {
        $repeat_p=$this->input->post('repeat_p');
        $login_id=$this->input->post('login_id2');
        $result=$this->settings_model->change_password($repeat_p,$login_id);
        if($this->session->userdata('change_pass_status')=='0')
        {
            $this->session->set_userdata('change_pass_status', '1');
            $this->session->set_userdata('change_password', 'Password Changed');
            redirect(base_url() . 'home','refresh');
        }
        else
        {
            $this->session->set_userdata('change_pass_status', '1');
            $this->session->set_userdata('change_password', 'Password Changed');
            redirect(base_url() . 'settings/change_password','refresh');
        }

    }

}