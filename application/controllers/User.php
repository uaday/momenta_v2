<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
//include("asset/src/NexmoMessage.php");
class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $data['login_id']=$this->session->userdata('login_id');
        $this->session->set_userdata('main_menu','user');
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

        if($this->session->userdata('user_type')!='1'&&$this->session->userdata('user_type')!='2')
        {
            redirect(base_url().'access_denied');
        }
    }
    public function index()
    {
        $this->session->set_userdata('sub_menu','create_user');
        $user_type=$this->session->userdata('user_type');
        $employee_id=$this->session->userdata('employee_id');
        $data['depots']=$this->pso_model->get_depot($user_type,$employee_id);
        $data['business'] = $this->medicine_literature_model->getAllbusiness();
        $data['pso_types']=$this->pso_model->get_pso_type();
        $data['hero_header'] = TRUE;
        $data['footer'] = $this->load->view('view_footer', '', TRUE);
        $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
        $data['main_content'] =$this->parser->parse('view_user/view_create_user',$data,TRUE);
        $this->load->view('view_master',$data);
    }
    public function create_user()
    {
        $this->session->set_userdata('sub_menu','create_user');
        $user_type=$this->session->userdata('user_type');
        $employee_id=$this->session->userdata('employee_id');
        $data['depots']=$this->pso_model->get_depot($user_type,$employee_id);
        $data['business'] = $this->medicine_literature_model->getAllbusiness();
        $data['pso_types']=$this->pso_model->get_pso_type();
        $data['hero_header'] = TRUE;
        $data['footer'] = $this->load->view('view_footer', '', TRUE);
        $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
        $data['main_content'] =$this->parser->parse('view_user/view_create_user',$data,TRUE);
        $this->load->view('view_master',$data);
    }
    public function add_new_user()
    {
        $user_name=$this->input->post('user_name');
        $renata_id=$this->input->post('renata_id');
        $user_type=$this->input->post('user_type');
        $sm_code=$this->input->post('sm_code');
        $rsm_code=$this->input->post('rsm_code');
        $dsm_code=$this->input->post('dsm_code');
        $designation=$this->input->post('designation');
        $region=$this->input->post('region');
        $depot_code=$this->input->post('depot_code');
        $business_code=$this->input->post('business_code');

        if($user_type=='4')
        {
            if ($this->form_validation->run('adduser2'))
            {
                $this->user_model->insert_user($user_name,$renata_id,$user_type,$designation,$business_code,$sm_code,$rsm_code,$dsm_code,$depot_code,$region);
                $this->session->set_userdata('add_user','User Successfully Added');
                redirect(base_url().'user/add_user');
            }
            else
            {
                $error=validation_errors();
                $this->session->set_userdata('user_add',$error);
                redirect(base_url().'user/add_user');
            }
        }
        else if($user_type=='5')
        {
            if ($this->form_validation->run('adduser3'))
            {
                $this->user_model->insert_user($user_name,$renata_id,$user_type,$designation,$business_code,$sm_code,$rsm_code,$dsm_code,$depot_code,$region);
                $this->session->set_userdata('add_user','User Successfully Added');
                redirect(base_url().'user/add_user');
            }
            else
            {
                $error=validation_errors();
                $this->session->set_userdata('user_add',$error);
                redirect(base_url().'user/add_user');
            }
        }
        else if($user_type=='6')
        {
            if ($this->form_validation->run('adduser4'))
            {
                $this->user_model->insert_user($user_name,$renata_id,$user_type,$designation,$business_code,$sm_code,$rsm_code,$dsm_code,$depot_code,$region);
                $this->session->set_userdata('add_user','User Successfully Added');
                redirect(base_url().'user/create_user');
            }
            else
            {
                $error=validation_errors();
                $this->session->set_userdata('user_add',$error);
                redirect(base_url().'user/add_user');
            }
        }
        else
        {
            if ($this->form_validation->run('adduser1'))
            {
                $this->user_model->insert_user($user_name,$renata_id,$user_type,$designation,$business_code,$sm_code,$rsm_code,$dsm_code,$depot_code,$region);
                $this->session->set_userdata('add_user','User Successfully Added');
                redirect(base_url().'user/create_user');
            }
            else
            {
                $error=validation_errors();
                $this->session->set_userdata('user_add',$error);
                redirect(base_url().'user/add_user');
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
        $this->load->view('view_user/view_manage_user',$data);
        $this->load->view('view_footer');
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
                $this->session->set_userdata('block_user',"".$renata_id."User Login Credentials Successfully Blocked");
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
                $this->session->set_userdata('block_user',"".$renata_id."User Login Credentials Successfully Blocked");
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
                $this->session->set_userdata('block_user',"".$renata_id."User Login Credentials Successfully Blocked");
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
                $this->session->set_userdata('active_user',"".$renata_id."User Login Credentials Successfully Active");
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
                $this->session->set_userdata('active_user',"".$renata_id."User Login Credentials Successfully Active");
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
                $this->session->set_userdata('active_user',"".$renata_id."User Login Credentials Successfully Active");
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
            $this->load->view('view_user/view_edit_admin_user',$data);
            $this->load->view('view_footer');
        }
        else if($user_type=='4')
        {
            $data['depots']=$this->pso_model->get_depot1();
            $data['business']=$this->pso_model->get_business();
            $data['sm']=$this->user_model->find_sm_user_data($renata_id);
            $this->load->view('view_user/view_edit_sm_user',$data);
            $this->load->view('view_footer');
        }
        else if($user_type=='5')
        {
            $data['depots']=$this->pso_model->get_depot1();
            $data['business']=$this->pso_model->get_business();
            $data['rsm']=$this->user_model->find_rsm_user_data($renata_id);
            $this->load->view('view_user/view_edit_rsm_user',$data);
            $this->load->view('view_footer');
        }
        else if($user_type=='6')
        {
            $data['depots']=$this->pso_model->get_depot1();
            $data['business']=$this->pso_model->get_business();
            $data['dsm']=$this->user_model->find_dsm_user_data($renata_id);
            $this->load->view('view_user/view_edit_dsm_user',$data);
            $this->load->view('view_footer');
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
        $region=$this->input->post('region');
        $depot_code=$this->input->post('depot_code');
        $business_code=$this->input->post('business_code');
        $rsm_code=$this->input->post('rsm_code');
        $sm_code=$this->input->post('sm_code');
        $this->user_model->edit_rsm_user($user_name,$renata_id,$user_type,$designation,$region,$rsm_code,$sm_code,$depot_code,$business_code);
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