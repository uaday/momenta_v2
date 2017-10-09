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
            redirect(base_url().'home');
        }
        else
        {
            $this->load->view('view_login');
        }

    }

    public function forgot_password()
    {
        $this->load->view('view_forgot_password');
        $this->load->view('view_footer');
    }

    public function login_check()
    {


        $resp = array('accessGranted' => false, 'errors' => ''); // For ajax response

        if(isset($_POST['do_login']))
        {
            $renata_id = $_POST['userid'];
            $password = $_POST['passwd'];
            $result = $this->login_model->lcheck($renata_id, $password);

            if($result)
            {
                if($result[0]->status==1)
                {
                    $this->login_model-> update_login_status($renata_id);
                    $this->session->set_userdata('login_message','1');
                    $sess_data = array('login' => true, 'employee_id'=>$result[0]->renata_id,'name' => $result[0]->name, 'login_id' => $result[0]->login_id,'user_type'=>$result[0]->user_type,'change_pass_status'=>$result[0]->change_pass_status,'business_code'=>$result[0]->tbl_business_business_code);
                    $this->session->set_userdata($sess_data);
                    if($this->session->userdata('change_pass_status')==0)
                        {
                            $resp['changePassword'] = true;
                        }
                        else
                        {
                            $resp['accessGranted'] = true;
                        }
                    $resp['accessGranted'] = true;
                }
                else
                {
                    $resp['errors'] = '<strong>Blocked</strong><br />Your user account is blocked please contact with the admin<br />';
                }
            }
            else
            {
                // Failed Attempts
                $fa = isset($_COOKIE['failed-attempts']) ? $_COOKIE['failed-attempts'] : 0;
                $fa++;

                setcookie('failed-attempts', $fa);

                // Error message
                $resp['errors'] = '<strong>Invalid login!</strong><br />Please enter valid userid and password.<br />';
            }
        }

        echo json_encode($resp);

    }
    public function logout()
    {
        $data=array('login'=>'','name'=>'','login_id'=>'','user_type'=>'','employee_id'=>'','change_pass_status'=>'','business_code'=>'');
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
        redirect(base_url().'login');
    }

}