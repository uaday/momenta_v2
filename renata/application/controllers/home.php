<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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
        $this->session->set_userdata('i','1');

        if($this->session->userdata('change_pass_status')=='0')
        {
            redirect(base_url().'settings/change_password');
        }


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
        $data['drugs']=$this->home_model->getSixMed();
        $data['tests']=$this->home_model->getSixTest();
        $data['sliders']=$this->home_model->loadSlider();
        $data['incentives']=$this->home_model->getSixIncentive();
        $this->load->view('view_home',$data);
    }

    public function seemore_drug()
    {
        $data['drugs']=$this->home_model->getAllMed();
        $this->load->view('view_seemore_lit',$data);
    }
    public function seemore_test()
    {
        $data['tests']=$this->home_model->getAlltest();
        $this->load->view('view_seemore_test',$data);
    }

}