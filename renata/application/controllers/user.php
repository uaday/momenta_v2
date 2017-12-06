<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
include("asset/src/NexmoMessage.php");
class User extends CI_Controller
{

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
        $this->session->set_userdata('i','6');

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

        if($this->session->userdata('user_type')!='1'&&$this->session->userdata('user_type')!='2')
        {
            redirect(base_url().'access_denied');
        }
    }
    public function index()
    {
        $data['depots']=$this->pso_model->get_depot();
        $data['business']=$this->pso_model->get_business();
        $this->load->view('view_create_user',$data);
    }
    public function create_user()
    {
        $user_type=$this->session->userdata('user_type');
        $employee_id=$this->session->userdata('employee_id');
        $data['depots']=$this->pso_model->get_depot($user_type,$employee_id);
        $data['business']=$this->pso_model->get_business();
        $this->load->view('view_create_user',$data);
    }
    public function add_user()
    {
        $user_name=$this->input->post('user_name');
        $renata_id=$this->input->post('renata_id');
        $user_type=$this->input->post('user_type');
        $sm_code=$this->input->post('sm_code');
        $rsm_code=$this->input->post('rsm_code');
        $dsm_code=$this->input->post('dsm_code');
        $designation=$this->input->post('designation');
        $depot_code=$this->input->post('depot_code');
        $business_code=$this->input->post('business_code');

        if($user_type=='4')
        {
            if ($this->form_validation->run('adduser2'))
            {
                $this->user_model->insert_user4($user_name,$renata_id,$user_type,$designation,$depot_code,$business_code,$sm_code);
                $this->session->set_userdata('add_user','User Added');
                redirect(base_url().'user/create_user');
            }
            else
            {
                $data['user_add']=validation_errors();
                $data['depots']=$this->pso_model->get_depot();
                $data['business']=$this->pso_model->get_business();
                $this->load->view('view_create_user',$data);
            }
        }
        else if($user_type=='5')
        {
            if ($this->form_validation->run('adduser3'))
            {
                $this->user_model->insert_user5($user_name,$renata_id,$user_type,$designation,$depot_code,$business_code,$rsm_code,$sm_code);
                $this->session->set_userdata('add_user','User Added');
                redirect(base_url().'user/create_user');
            }
            else
            {
                $data['user_add']=validation_errors();
                $data['depots']=$this->pso_model->get_depot();
                $data['business']=$this->pso_model->get_business();
                $this->load->view('view_create_user',$data);
            }
        }
        else if($user_type=='6')
        {
            if ($this->form_validation->run('adduser4'))
            {
                $this->user_model->insert_user6($user_name,$renata_id,$user_type,$designation,$depot_code,$business_code,$dsm_code,$rsm_code);
                $this->session->set_userdata('add_user','User Added');
                redirect(base_url().'user/create_user');
            }
            else
            {
                $data['user_add']=validation_errors();
                $data['depots']=$this->pso_model->get_depot();
                $data['business']=$this->pso_model->get_business();
                $this->load->view('view_create_user',$data);
            }
        }
        else
        {
            if ($this->form_validation->run('adduser1'))
            {
                $this->user_model->insert_user($user_name,$renata_id,$user_type,$designation);
                $this->session->set_userdata('add_user','User Added');
                redirect(base_url().'user/create_user');
            }
            else
            {
                $data['user_add']=validation_errors();
                $data['depots']=$this->pso_model->get_depot();
                $data['business']=$this->pso_model->get_business();
                $this->load->view('view_create_user',$data);
            }
        }

    }
    public function manage_user()
    {
        $data['admins']=$this->user_model->all_admin();
        $data['its']=$this->user_model->all_it();
        $data['gms']=$this->user_model->all_gm();
        $data['sales']=$this->user_model->all_sm();
        $data['rsms']=$this->user_model->all_rsm();
        $data['dsms']=$this->user_model->all_dsm();
        $this->load->view('view_manage_user',$data);
    }
    public function block_user()
    {
        $renata_id=$this->input->get('renata_id');
        $user_type=$this->input->get('user_type');
        if($user_type=='2')
        {
            if($this->session->userdata('user_type')=='1')
            {
                $this->user_model->block_user($renata_id);
                redirect(base_url().'user/manage_user');
            }
            else
            {
                redirect(base_url().'access_denied');
            }
        }
        else if($user_type=='3')
        {
            if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2')
            {
                $this->user_model->block_user($renata_id);
                redirect(base_url().'user/manage_user');
            }
            else
            {
                redirect(base_url().'access_denied');
            }
        }
        else
        {
            if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2')
            {
                $this->user_model->block_user($renata_id);
                redirect(base_url().'user/manage_user');
            }
            else
            {
                redirect(base_url().'access_denied');
            }
        }
    }
    public function active_user()
    {
        $renata_id=$this->input->get('renata_id');
        $user_type=$this->input->get('user_type');
        if($user_type=='2')
        {
            if($this->session->userdata('user_type')=='1')
            {
                $this->user_model->active_user($renata_id);
                redirect(base_url().'user/manage_user');
            }
            else
            {
                redirect(base_url().'access_denied');
            }
        }
        else if($user_type=='3')
        {
            if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2')
            {
                $this->user_model->active_user($renata_id);
                redirect(base_url().'user/manage_user');
            }
            else
            {
                redirect(base_url().'access_denied');
            }
        }
        else
        {
            if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2')
            {
                $this->user_model->active_user($renata_id);
                redirect(base_url().'user/manage_user');
            }
            else
            {
                redirect(base_url().'access_denied');
            }
        }
    }
    public function delete_user()
    {
        $renata_id=$this->input->get('renata_id');
        $user_type=$this->input->get('user_type');
        if($user_type=='2')
        {
            if($this->session->userdata('user_type')=='1')
            {
                $this->user_model->delete_user($renata_id);
                redirect(base_url().'user/manage_user');
            }
            else
            {
                redirect(base_url().'access_denied');
            }
        }
        else if($user_type=='3')
        {
            if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2')
            {
                $this->user_model->delete_user($renata_id);
                redirect(base_url().'user/manage_user');
            }
            else
            {
                redirect(base_url().'access_denied');
            }
        }
        else
        {
            if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2')
            {
                $this->user_model->delete_user($renata_id);
                if($user_type=='4')
                {
                    $this->user_model->delete_sm($renata_id);
                }
                else if($user_type=='5')
                {
                    $this->user_model->delete_rsm($renata_id);
                }
                else if($user_type=='6')
                {
                    $this->user_model->delete_dm($renata_id);
                }
                redirect(base_url().'user/manage_user');
            }
            else
            {
                redirect(base_url().'access_denied');
            }
        }
    }
    public function edit_user()
    {
        $renata_id=$this->input->get('renata_id');
        $user_type=$this->input->get('user_type');
        if($user_type=='2'||$user_type=='3'||$user_type=='7')
        {
            $data['admins']=$this->user_model->find_admins_user_data($renata_id);
            $this->load->view('view_edit_admin_user',$data);
        }
        else if($user_type=='4')
        {
            $data['depots']=$this->pso_model->get_depot();
            $data['business']=$this->pso_model->get_business();
            $data['sm']=$this->user_model->find_sm_user_data($renata_id);
            $this->load->view('view_edit_sm_user',$data);
        }
        else if($user_type=='5')
        {
            $data['depots']=$this->pso_model->get_depot();
            $data['business']=$this->pso_model->get_business();
            $data['rsm']=$this->user_model->find_rsm_user_data($renata_id);
            $this->load->view('view_edit_rsm_user',$data);
        }
        else if($user_type=='6')
        {
            $data['depots']=$this->pso_model->get_depot();
            $data['business']=$this->pso_model->get_business();
            $data['dsm']=$this->user_model->find_dsm_user_data($renata_id);
            $this->load->view('view_edit_dsm_user',$data);
        }
    }
    public function edit_admin_user()
    {
        $user_name=$this->input->post('user_name');
        $renata_id=$this->input->post('renata_id');
        $user_type=$this->input->post('user_type');
        $designation=$this->input->post('designation');
        $this->user_model->edit_admin_user($user_name,$renata_id,$user_type,$designation);
        $this->session->set_userdata('edit_user',"User Edited");
        redirect(base_url().'user/manage_user');
    }
    public function edit_sm_user()
    {
        $user_name=$this->input->post('user_name');
        $renata_id=$this->input->post('renata_id');
        $user_type=$this->input->post('user_type');
        $designation=$this->input->post('designation');
        $depot_code=$this->input->post('depot_code');
        $business_code=$this->input->post('business_code');
        $sm_code=$this->input->post('sm_code');
        $this->user_model->edit_sm_user($user_name,$renata_id,$user_type,$designation,$sm_code,$depot_code,$business_code);
        $this->session->set_userdata('edit_user',"User Edited");
        redirect(base_url().'user/manage_user');
    }
    public function edit_rsm_user()
    {
        $user_name=$this->input->post('user_name');
        $renata_id=$this->input->post('renata_id');
        $user_type=$this->input->post('user_type');
        $designation=$this->input->post('designation');
        $depot_code=$this->input->post('depot_code');
        $business_code=$this->input->post('business_code');
        $rsm_code=$this->input->post('rsm_code');
        $sm_code=$this->input->post('sm_code');
        $this->user_model->edit_rsm_user($user_name,$renata_id,$user_type,$designation,$rsm_code,$sm_code,$depot_code,$business_code);
        $this->session->set_userdata('edit_user',"User Edited");
        redirect(base_url().'user/manage_user');
    }
    public function edit_dsm_user()
    {
        $user_name=$this->input->post('user_name');
        $renata_id=$this->input->post('renata_id');
        $user_type=$this->input->post('user_type');
        $designation=$this->input->post('designation');
        $depot_code=$this->input->post('depot_code');
        $business_code=$this->input->post('business_code');
        $dsm_code=$this->input->post('dsm_code');
        $rsm_code=$this->input->post('rsm_code');
        $this->user_model->edit_dsm_user($user_name,$renata_id,$user_type,$designation,$rsm_code,$dsm_code,$depot_code,$business_code);
        $this->session->set_userdata('edit_user',"User Edited");
        redirect(base_url().'user/manage_user');
    }

    public function reset_password()
    {
        $renata_id=$this->input->get('renata_id');
        $user_type=$this->input->get('user_type');
        $this->user_model->reset_password($renata_id);
        $this->session->set_userdata('reset_password',"User Password reset Successful");
        redirect(base_url().'user/manage_user');
    }
}