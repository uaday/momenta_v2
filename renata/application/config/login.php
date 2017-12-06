<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function index()
    {
        $this->load->view('view_login');
    }

    public function forgot_password()
    {
        $this->load->view('view_forgot_password');
    }

    public function login_check()
    {

        if ($this->session->userdata('admin_id') != null) {
            redirect(base_url().'home');
        } else {
            $email = $this->input->post('rid');
            $password = $this->input->post('password');
            if ($this->form_validation->run('userlogin_check')) {
                $result = $this->login_model->lcheck($email, $password);
                if ($result) {
                    if($result[0]->status==1)
                    {
                        $sess_data = array('login' => true, 'admin_name' => $result[0]->admin_name, 'admin_id' => $result[0]->admin_id,'admin_role'=>$result[0]->tbl_admin_role_role_id);
                        $this->session->set_userdata($sess_data);
                        redirect(base_url().'home');
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
        $data=array('login'=>'','admin_name'=>'','admin_id'=>'','admin_role'=>'');
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
        redirect(base_url().'login');
    }

}