<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bulk_data extends CI_Controller {


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
        $this->session->set_userdata('i','7');

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
    public function pso_bulk()
    {
        $this->load->view('view_pso_bulk');
    }
    public function user_bulk()
    {
        $this->load->view('view_user_bulk');
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