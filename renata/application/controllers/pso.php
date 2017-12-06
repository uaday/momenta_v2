<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
include("asset/src/NexmoMessage.php");
class Pso extends CI_Controller
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
        $this->session->set_userdata('i','5');

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
        redirect(base_url().'pso/add_pso');
    }

    public function add_pso()
    {
        $user_type=$this->session->userdata('user_type');
        $employee_id=$this->session->userdata('employee_id');
        $data['depots']=$this->pso_model->get_depot($user_type,$employee_id);
        $data['business']=$this->pso_model->get_business();
        $this->load->view('view_add_pso',$data);
    }

    public function manage_pso()
    {
        $data['psos'] = $this->pso_model->select_all_pso();
        $this->load->view('view_manage_pso', $data);
    }

    public function view_pso()
    {
        $user_type=$this->session->userdata('user_type');
        $employee_id=$this->session->userdata('employee_id');
        $data['depots']=$this->pso_model->get_depot($user_type,$employee_id);
        $data['business']=$this->pso_model->get_business();
        $data['pso'] = $this->pso_model->select_pso_by_pso_id($this->input->get('pso_id'));
        $this->load->view('view_pso_info',$data);
    }

    public function insert_pso()
    {
        $pso_name = $this->input->post('pso_name');
        $pso_code = $this->input->post('pso_code');
        $pso_renata_id = $this->input->post('pso_renata_id');
        $dsm_code = $this->input->post('dsm_code');
        $pso_gender = $this->input->post('pso_gender');
        $pso_dob = $this->input->post('pso_dob');
        $pso_email = $this->input->post('pso_email');
        $pso_phone = $this->input->post('pso_phone');
        $pso_des = $this->input->post('pso_designation');
        $business_code=$this->input->post('business_code');
        $depot_code=$this->input->post('depot_code');
        $pp = '';
        $pso_password = mt_rand(100000, 999999);

        if ($this->form_validation->run('addpso'))
        {
            if (!empty($_FILES['pso_image']['name'])) {
                $uploadPath = 'upload/pso_image';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|png|jpeg|JPEG|PNG|JPG';
                $config['max_size'] = '2048';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('pso_image')) {
                    $fileData = $this->upload->data();
                    $uploadData['file_name'] = $fileData['file_name'];
                }
            }
            $number=mt_rand(100,999);
            $curl = curl_init();
            curl_setopt_array($curl, array( CURLOPT_RETURNTRANSFER => 1, CURLOPT_URL => 'http://sms.sslwireless.com/pushapi/dynamic/server.php?user=RenataPharmaceuticals&pass=92o<8H52&sid=RenataPharmaceutical&sms='.urlencode("Your Renata App Id: $pso_renata_id\nRenata Password: $pso_password\n").'&msisdn=88'.$pso_phone.'&csmsid='.$number.'App'.$pso_code.'',CURLOPT_USERAGENT => 'Sample cURL Request' ));
            $resp = curl_exec($curl);
            curl_close($curl);
            if (!empty($uploadData)) {
                $pp = base_url() . 'upload/pso_image/' . $fileData['file_name'];
                $this->pso_model->insert_pso($pso_code,$pso_renata_id, $pso_name, $pso_gender, $pso_dob, $pso_email, $pso_phone,$pso_des, $pso_password, $pp, '1', $depot_code,$dsm_code,$business_code);
            } else {
                $this->pso_model->insert_pso($pso_code,$pso_renata_id, $pso_name, $pso_gender, $pso_dob, $pso_email, $pso_phone,$pso_des, $pso_password, '', '1', $depot_code,$dsm_code,$business_code);
            }
            $this->session->set_userdata('confirm_add_pso','Pso Insert Successful');
            redirect(base_url() .'pso/add_pso', 'refresh');
        }
        else
        {
            $data['depots']=$this->pso_model->get_depot();
            $data['business']=$this->pso_model->get_business();
            $data['pso_add']=validation_errors();
            $this->load->view('view_add_pso',$data);
        }
    }

    public function update_password()
    {
        $pso_id=$this->input->get('pso_id');
        $pso_phone=$this->input->get('pso_number');
        $pso_renata_id=$this->input->get('pso_renata_id');
        $pso_password = mt_rand(100000, 999999);
        $number=mt_rand(100,999);
        $result=$this->pso_model->update_password($pso_id,$pso_password);
        $curl = curl_init();
        curl_setopt_array($curl, array( CURLOPT_RETURNTRANSFER => 1, CURLOPT_URL => 'http://sms.sslwireless.com/pushapi/dynamic/server.php?user=RenataPharmaceuticals&pass=92o<8H52&sid=RenataPharmaceutical&sms='.urlencode("Your Renata App Id: $pso_renata_id\nRenata Password: $pso_password\n").'&msisdn=88'.$pso_phone.'&csmsid='.$number.'App'.$pso_id.'',CURLOPT_USERAGENT => 'Sample cURL Request' ));
        $resp = curl_exec($curl);
        curl_close($curl);
        if($resp)
        {
            $this->session->set_userdata('update_password','Password Update Successful');
        }
        redirect(base_url() . 'pso/manage_pso', 'refresh');
    }
    public function delete_account()
    {
        $pso_id=$this->input->get('pso_id');
        $this->pso_model->delete_account($pso_id);
        $this->session->set_userdata('delete_account','PSO Account has been successfully deleted');
        redirect(base_url() . 'pso/manage_pso', 'refresh');
    }

    public function update_pso()
    {
        $pso_name = $this->input->post('pso_name');
        $pso_code = $this->input->post('pso_code');
        $pso_renata_id = $this->input->post('pso_renata_id');
        $dsm_code = $this->input->post('dsm_code');
        $pso_gender = $this->input->post('pso_gender');
        $pso_dob = $this->input->post('pso_dob');
        $pso_email = $this->input->post('pso_email');
        $pso_phone = $this->input->post('pso_phone');
        $pso_des = $this->input->post('pso_designation');
        $business_code=$this->input->post('business_code');
        $depot_code=$this->input->post('depot_code');
        $pp='';
        if ($this->form_validation->run('updatepso'))
        {
            if (!empty($_FILES['pso_image']['name'])) {
                $uploadPath = 'upload/pso_image';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|png|jpeg|JPEG|PNG|JPG';
                $config['max_size'] = '2048';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('pso_image')) {
                    $fileData = $this->upload->data();
                    $uploadData['file_name'] = $fileData['file_name'];
                }
            }
            if (!empty($uploadData)) {
                $pp = base_url() . 'upload/pso_image/' . $fileData['file_name'];
                $this->pso_model->update_pso($pso_code,$pso_renata_id, $pso_name, $pso_gender, $pso_dob, $pso_email, $pso_phone,$pso_des, $pp, '1', $depot_code,$dsm_code,$business_code);
            } else {
                $this->pso_model->update_pso($pso_code,$pso_renata_id, $pso_name, $pso_gender, $pso_dob, $pso_email, $pso_phone,$pso_des, '', '1', $depot_code,$dsm_code,$business_code);
            }
            $this->session->set_userdata('confirm_update_pso','PSO Account information has been successfully updated');
            redirect(base_url() . 'pso/manage_pso', 'refresh');
        }
        else
        {
            $data['pso'] = $this->pso_model->select_pso_by_pso_id($pso_code);
            $data['pso_add']=validation_errors();
            $this->load->view('view_pso_info',$data);
        }
    }


}