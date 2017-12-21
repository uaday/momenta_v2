<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Communication_hub extends CI_Controller {

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
        $this->session->set_userdata('main_menu','communication');

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
        $this->session->set_userdata('sub_menu','send_message');
        $data['business'] = $this->medicine_literature_model->getAllbusiness();
        $data['hero_header'] = TRUE;
        $data['footer'] = $this->load->view('view_footer', '', TRUE);
        $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
        $data['main_content'] = $this->load->view('view_communication_hub/view_send_new_message', $data, TRUE);
        $this->load->view('view_master',$data);
    }

    public function send_message()
    {
        $this->session->set_userdata('sub_menu','send_message');
        $data['business'] = $this->medicine_literature_model->getAllbusiness();
        $data['hero_header'] = TRUE;
        $data['footer'] = $this->load->view('view_footer', '', TRUE);
        $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
        $data['main_content'] = $this->load->view('view_communication_hub/view_send_new_message', $data, TRUE);
        $this->load->view('view_master',$data);
    }
    public function seemore_test()
    {
        $data['tests']=$this->home_model->getAlltest();
        $this->load->view('view_home/view_seemore_test',$data);
        $this->load->view('view_footer');
    }

}