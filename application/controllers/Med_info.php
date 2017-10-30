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
        $this->session->set_userdata('main_menu','medicine_info');

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
        $data['gens']=$this->medicine_literature_model->getAllGen();
        $data['hero_header'] = TRUE;
        $data['footer'] = $this->load->view('view_footer', '', TRUE);
        $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
        $data['main_content'] =$this->parser->parse('view_medicine_info/view_generic_name',$data,TRUE);
        $this->load->view('view_master',$data);
    }
    public function generic_name()
    {
        $this->session->set_userdata('sub_menu','generic_name');
        $data['business'] = $this->medicine_literature_model->getAllbusiness();
        $data['gens']=$this->medicine_literature_model->getAllGen();
        $data['hero_header'] = TRUE;
        $data['footer'] = $this->load->view('view_footer', '', TRUE);
        $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
        $data['main_content'] =$this->parser->parse('view_medicine_info/view_generic_name',$data,TRUE);
        $this->load->view('view_master',$data);
    }
    public function drug_name()
    {
        $this->session->set_userdata('sub_menu','drug_name');
        $data['business'] = $this->medicine_literature_model->getAllbusiness();
        $data['drugs']=$this->med_info_model->getAllDrugs();
        $data['gens']=$this->medicine_literature_model->getAllGen();
        $data['hero_header'] = TRUE;
        $data['footer'] = $this->load->view('view_footer', '', TRUE);
        $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
        $data['main_content'] =$this->parser->parse('view_medicine_info/view_drug_name',$data,TRUE);
        $this->load->view('view_master',$data);
    }
    public function doc_type()
    {
        $this->session->set_userdata('sub_menu','doc_type');
        $data['business'] = $this->medicine_literature_model->getAllbusiness();
        $data['docs']=$this->medicine_literature_model->getAllDoc();
        $data['hero_header'] = TRUE;
        $data['footer'] = $this->load->view('view_footer', '', TRUE);
        $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
        $data['main_content'] =$this->parser->parse('view_medicine_info/view_doc_type',$data,TRUE);
        $this->load->view('view_master',$data);
    }
    public function add_gen_name()
    {
        $gen_name=$this->input->post('gen_name');
        $bcode=$this->input->post('bcode');
        if ($this->form_validation->run('add_gen_name'))
        {
            $this->med_info_model->add_gen_name($bcode,$gen_name);
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
        $data['drug_name']=$this->input->post('drug_name');
        $data['tbl_drug_generic_name_gen_id']=$this->input->post('gen_id');
        $data['pm_name']=$this->input->post('pm_name');
        $phone= '0'.preg_replace('/[^\p{L}\p{N}\s]/u','',$this->input->post('pm_phone'));
        $data['pm_phone']= preg_replace('/\s+/','', $phone);
        $data['tbl_business_business_code']=$this->input->post('business');
        if ($this->form_validation->run('add_drug_name'))
        {
            $result=$this->med_info_model->add_drug_name($data);
            if($result=='1')
            {
                $this->session->set_userdata('add_drug','Drug Name Successfully Added');
                redirect(base_url() . 'med_info/drug_name', 'refresh');
            }
        }
        else
        {
            $this->session->set_userdata('gen_error',validation_errors());
            redirect(base_url() . 'med_info/drug_name', 'refresh');
        }

    }

    public function edit_gen_name()
    {
        $bcode=$this->input->post('bcode');
        $gen_id=$this->input->post('gen_id');
        $gen_name=$this->input->post('gen_name');
        $result=$this->med_info_model->edit_gen_name($bcode,$gen_id,$gen_name);
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

        $data['tbl_business_business_code']=$this->input->post('business');
        $data['tbl_drug_generic_name_gen_id']=$this->input->post('gen_id');
        $data['drug_name']=$this->input->post('drug_name');
        $phone= '0'.preg_replace('/[^\p{L}\p{N}\s]/u','',$this->input->post('pm_phone'));
        $data['pm_phone']= preg_replace('/\s+/','', $phone);
        $data['pm_name']=$this->input->post('pm_name');
        $drug_id=$this->input->post('drug_id');
        $result=$this->med_info_model->edit_drug_name($drug_id,$data);
        if($result==0)
        {
            $this->session->set_userdata('gen_error','This Drug Name is Already Available');
            redirect(base_url() . 'med_info/drug_name', 'refresh');
        }
        else
        {
            $this->session->set_userdata('add_drug','Drug Name Successfully Updated');
            redirect(base_url() . 'med_info/drug_name', 'refresh');
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
            redirect(base_url() . 'med_info/drug_name', 'refresh');
        }
        else if($result=='0')
        {
            $this->session->set_userdata('pass_issue','User Password Does not Match');
            redirect(base_url() . 'med_info/drug_name', 'refresh');
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