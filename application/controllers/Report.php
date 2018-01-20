<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $data['login_id']=$this->session->userdata('login_id');
        $this->session->set_userdata('main_menu','report');

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
    public function regional_report()
    {

        $data['tests'] = $this->test_model->all_test_report();
        $data['hero_header'] = TRUE;
        $data['footer'] = $this->load->view('view_footer', '', TRUE);
        $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
        $data['main_content'] =$this->parser->parse('view_report/view_regional_report',$data,TRUE);
        $this->load->view('view_master',$data);
    }
    public function regional_test_report($exam_id=0)
    {
        $this->session->set_userdata('sub_menu','regional_test_report');
        $data['reports'] = $this->report_model->find_exam_report_by_exam($exam_id);
//        echo json_encode($data['report']);
//        exit();
        $data['hero_header'] = TRUE;
        $data['footer'] = $this->load->view('view_footer', '', TRUE);
        $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
        $data['main_content'] =$this->parser->parse('view_report/view_regional_report_download',$data,TRUE);
        $this->load->view('view_master',$data);
    }
    public function pso_test_report($exam_id=0)
    {
        $this->session->set_userdata('sub_menu','pso_test_report');
        $data['report'] = $this->report_model->find_pso_test_report($exam_id);
        echo json_encode($data['report']);
        exit();
        $data['hero_header'] = TRUE;
        $data['footer'] = $this->load->view('view_footer', '', TRUE);
        $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
        $data['main_content'] =$this->parser->parse('view_access_denied',$data,TRUE);
        $this->load->view('view_master',$data);
    }
    public function pso_test_report_dump()
    {
        $this->session->set_userdata('sub_menu','pso_test_report_dump');
        $data['report'] = $this->report_model->find_pso_test_report_dump();
        echo json_encode($data['report']);
        exit();
        $data['hero_header'] = TRUE;
        $data['footer'] = $this->load->view('view_footer', '', TRUE);
        $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
        $data['main_content'] =$this->parser->parse('view_access_denied',$data,TRUE);
        $this->load->view('view_master',$data);
    }
    public function all_test_report_dump()
    {
        $this->session->set_userdata('sub_menu','all_test_report_dump');
        $data['report'] = $this->report_model->find_test_bulk();
        echo json_encode($data['report']);
        exit();
        $data['hero_header'] = TRUE;
        $data['footer'] = $this->load->view('view_footer', '', TRUE);
        $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
        $data['main_content'] =$this->parser->parse('view_access_denied',$data,TRUE);
        $this->load->view('view_master',$data);
    }

}