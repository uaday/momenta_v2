<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Med_info extends CI_Controller {


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
        $this->session->set_userdata('i','8');

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
        $this->load->view('view_footer');
    }
    public function generic_name()
    {
        $data['gens']=$this->medicine_literature_model->getAllGen();
        $this->load->view('view_medicine_info/view_generic_name',$data);
        $this->load->view('view_footer');
    }
    public function medicine_name()
    {
        $data['gens']=$this->medicine_literature_model->getAllGen();
        $data['drugs']=$this->med_info_model->getAllDrugs();
        $this->load->view('view_medicine_info/view_drug_name',$data);
        $this->load->view('view_footer');
    }
    public function doc_type()
    {
        $data['docs']=$this->medicine_literature_model->getAllDoc();
        $this->load->view('view_medicine_info/view_doc_type',$data);
        $this->load->view('view_footer');
    }
    public function add_gen_name()
    {
        $gen_name=$this->input->post('gen_name');
        if ($this->form_validation->run('add_gen_name'))
        {
            $this->med_info_model->add_gen_name($gen_name);
            $this->session->set_userdata('add_gen','Generic Name Successfully Added');
            redirect(base_url() . 'med_info/generic_name', 'refresh');
        }
        else
        {
            $this->session->set_userdata('gen_error',validation_errors());
            redirect(base_url() . 'med_info/generic_name', 'refresh');
        }

    }
    public function add_doc_type()
    {
        $doc_type=$this->input->post('doc_type');
        if ($this->form_validation->run('add_doc_type'))
        {
            $this->med_info_model->add_doc_type($doc_type);
            $this->session->set_userdata('add_gen','Doctor Type Successfully Added');
            redirect(base_url() . 'med_info/doc_type', 'refresh');
        }
        else
        {
            $this->session->set_userdata('gen_error',validation_errors());
            redirect(base_url() . 'med_info/doc_type', 'refresh');
        }

    }
    public function add_drug_name()
    {
        $drug_name=$this->input->post('drug_name');
        $gen_id=$this->input->post('gen_id');
        $pm_name=$this->input->post('pm_name');
        $pm_phone=$this->input->post('pm_phone');
        if ($this->form_validation->run('add_drug_name'))
        {
            $this->med_info_model->add_drug_name($drug_name,$gen_id,$pm_name,$pm_phone);
            $this->session->set_userdata('add_gen','Drug Name Successfully Added');
            redirect(base_url() . 'med_info/medicine_name', 'refresh');
        }
        else
        {
            $this->session->set_userdata('gen_error',validation_errors());
            redirect(base_url() . 'med_info/medicine_name', 'refresh');
        }

    }

    public function edit_gen_name()
    {
        $gen_id=$this->input->post('gen_id');
        $gen_name=$this->input->post('gen_name');
        $result=$this->med_info_model->edit_gen_name($gen_id,$gen_name);
        if($result==0)
        {
            $this->session->set_userdata('gen_error','This Generic Name is Already Available');
            redirect(base_url() . 'med_info/generic_name', 'refresh');
        }
        else
        {
            $this->session->set_userdata('add_gen','Generic Name Successfully Updated');
            redirect(base_url() . 'med_info/generic_name', 'refresh');
        }
    }
    public function edit_doc_type()
    {
        $doc_type=$this->input->post('doc_type');
        $doc_type_id=$this->input->post('doc_type_id');
        $result=$this->med_info_model->edit_doc_type($doc_type,$doc_type_id);
        if($result==0)
        {
            $this->session->set_userdata('gen_error','This Doctor Type is Already Available');
            redirect(base_url() . 'med_info/doc_type', 'refresh');
        }
        else
        {
            $this->session->set_userdata('add_gen','Doctor Type Successfully Updated');
            redirect(base_url() . 'med_info/doc_type', 'refresh');
        }
    }
    public function edit_drug_name()
    {
        $drug_id=$this->input->post('drug_id');
        $gen_id=$this->input->post('gen_id');
        $drug_name=$this->input->post('drug_name');
        $pm_name=$this->input->post('pm_name');
        $pm_phone=$this->input->post('pm_phone');
        $result=$this->med_info_model->edit_drug_name($drug_id,$drug_name,$gen_id,$pm_name,$pm_phone);
        if($result==0)
        {
            $this->session->set_userdata('gen_error','This Drug Name is Already Available');
            redirect(base_url() . 'med_info/medicine_name', 'refresh');
        }
        else
        {
            $this->session->set_userdata('add_gen','Drug Name Successfully Updated');
            redirect(base_url() . 'med_info/medicine_name', 'refresh');
        }
    }
    public function delete_generic_name()
    {
        $gen_id=$this->input->post('gen_id');
        $password=$this->input->post('password');
        $result=$this->med_info_model->delete_gen_name($gen_id,$password);
        if($result=='1')
        {
            $this->session->set_userdata('delete_gen','Generic Name Successfully Deleted');
            redirect(base_url() . 'med_info/generic_name', 'refresh');
        }
        else if($result=='0')
        {
            $this->session->set_userdata('pass_issue','User Password Does not Match');
            redirect(base_url() . 'med_info/generic_name', 'refresh');
        }
    }
    public function delete_drug_name()
    {
        $drug_id=$this->input->post('drug_id');
        $password=$this->input->post('password');
        $result=$this->med_info_model->delete_drug_name($drug_id,$password);
        if($result=='1')
        {
            $this->session->set_userdata('delete_drug','Drug Name Successfully Deleted');
            redirect(base_url() . 'med_info/medicine_name', 'refresh');
        }
        else if($result=='0')
        {
            $this->session->set_userdata('pass_issue','User Password Does not Match');
            redirect(base_url() . 'med_info/medicine_name', 'refresh');
        }
    }
    public function delete_doc_type()
    {
        $doc_type_id=$this->input->post('doc_type_id');
        $password=$this->input->post('password');
        $result=$this->med_info_model->delete_doc_type($doc_type_id,$password);
        if($result=='1')
        {
            $this->session->set_userdata('delete_doc_type','Doc Type Successfully Deleted');
            redirect(base_url() . 'med_info/doc_type', 'refresh');
        }
        else if($result=='0')
        {
            $this->session->set_userdata('pass_issue','User Password Does not Match');
            redirect(base_url() . 'med_info/doc_type', 'refresh');
        }
    }


}