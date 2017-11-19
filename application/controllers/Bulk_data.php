<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bulk_data extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $data['login_id']=$this->session->userdata('login_id');
        $this->session->set_userdata('main_menu','bulk_data');
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
        $this->load->view('view_dashboard');
        $this->load->view('view_footer');
    }
    public function pso_bulk()
    {
        $this->load->view('view_bulk_data/view_pso_bulk');
        $this->load->view('view_footer');
    }
    public function user_bulk()
    {
        $this->load->view('view_bulk_data/view_user_bulk');
        $this->load->view('view_footer');
    }
    public function pso_sms_bulk()
    {
        $this->session->set_userdata('sub_menu','sms_bulk');
        $data['regions'] = $this->pso_model->get_region();
        $data['business'] = $this->medicine_literature_model->getAllbusiness();
        $data['hero_header'] = TRUE;
        $data['footer'] = $this->load->view('view_footer', '', TRUE);
        $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
        $data['main_content'] =$this->parser->parse('view_bulk_data/view_pso_sms_bulk',$data,TRUE);
        $this->load->view('view_master',$data);

    }
    public function send_pso_sms()
    {
        $business_code=$this->input->post('business_code');
        $region=$this->input->post('region');
        $result=$this->bulk_data_model->send_pso_sms($business_code,$region);
        if($result)
        {
            $this->session->set_userdata('upload_data','SMS Send Successful');
            $this->session->set_userdata('sms_sent_counter',$result);
            redirect(base_url().'bulk_data/pso_sms_bulk');
        }
    }
    public function pso_bulk_upload_file()
    {

        $result=$this->bulk_data_model->upload_pso_file();
        if($result)
        {
            $this->session->set_userdata('upload_data','Upload Data Successful');
            redirect(base_url().'bulk_data/pso_bulk');
        }

    }
    public function user_bulk_upload_file()
    {

        $result=$this->bulk_data_model->upload_user_file();
        if($result)
        {
            $this->session->set_userdata('upload_data','Upload Data Successful');
            redirect(base_url().'bulk_data/user_bulk');
        }
    }

//    public function pso_format()
//    {
//        header('Content-disposition: attachment; filename=./upload/csv/PSO_Mobile_App.csv');
//        header('Content-type: csv');
//        readfile('./upload/csv/PSO_Mobile_App.csv');
//    }



}