<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function index()
    {
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
            $data['drugs']=$this->home_model->getSixMed();
            $data['tests']=$this->home_model->getSixTest();
            $data['sliders']=$this->home_model->loadSlider();

            $this->load->view('view_home',$data);
        }
        else
        {
            $this->load->view('view_login');
        }

    }

    public function forgot_password()
    {
        $this->load->view('view_forgot_password');
    }

    public function login_check()
    {

        if ($this->session->userdata('login_id') != null) {
            redirect(base_url().'home');
        } else {
            $renata_id = $this->input->post('renata_id');
            $password = $this->input->post('password');
            if ($this->form_validation->run('userlogin_check'))
            {
                $result = $this->login_model->lcheck($renata_id, $password);
                if ($result) {
                    if($result[0]->status==1)
                    {
                        $this->login_model-> update_login_status($renata_id);
                        $sess_data = array('login' => true, 'employee_id'=>$result[0]->renata_id,'name' => $result[0]->name, 'login_id' => $result[0]->login_id,'user_type'=>$result[0]->user_type,'change_pass_status'=>$result[0]->change_pass_status);
                        $this->session->set_userdata($sess_data);
                        if($this->session->userdata('change_pass_status')==0)
                        {
                            redirect(base_url().'settings/change_password');
                        }
                        else
                        {
                            redirect(base_url().'home');
                        }
                    }
                    else
                    {
                        $this->session->set_userdata('message','Your account is Deactivated!!!');
                        redirect(base_url().'login');
                    }
                } else {
                    $this->session->set_userdata('message','Invalid User Name/Password!!!');
                    redirect(base_url().'login');
                }
            } else {
                $this->session->set_userdata('message','Please Fill out the form');
                redirect(base_url().'login');
            }
        }

    }
    public function logout()
    {
        $data=array('login'=>'','name'=>'','login_id'=>'','user_type'=>'','employee_id'=>'','change_pass_status'=>'');
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
        redirect(base_url().'login');
    }

}