<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Pso extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $data['login_id']=$this->session->userdata('login_id');
        $this->session->set_userdata('main_menu','pso');
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
        redirect(base_url().'pso/add_pso');
    }

    public function add_pso()
    {

        $this->session->set_userdata('sub_menu','add_pso');
        $user_type=$this->session->userdata('user_type');
        $employee_id=$this->session->userdata('employee_id');
        $data['depots']=$this->pso_model->get_depot($user_type,$employee_id);
        $data['business'] = $this->medicine_literature_model->getAllbusiness();
        $data['pso_types']=$this->pso_model->get_pso_type();
        $data['hero_header'] = TRUE;
        $data['footer'] = $this->load->view('view_footer', '', TRUE);
        $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
        $data['main_content'] =$this->parser->parse('view_pso/view_add_pso',$data,TRUE);
        $this->load->view('view_master',$data);


    }

    public function manage_pso()
    {
        $this->session->set_userdata('sub_menu','manage_pso');
        $data['psos'] = $this->pso_model->select_all_pso();
        $data['miss_dsms'] = $this->pso_model->dsm_code_missing();
        $data['hero_header'] = TRUE;
        $data['footer'] = $this->load->view('view_footer', '', TRUE);
        $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
        $data['main_content'] =$this->parser->parse('view_pso/view_manage_pso',$data,TRUE);
        $this->load->view('view_master',$data);
    }

    public function view_pso()
    {
        $user_type=$this->session->userdata('user_type');
        $employee_id=$this->session->userdata('employee_id');
        $data['depots']=$this->pso_model->get_depot($user_type,$employee_id);
        $data['business'] = $this->medicine_literature_model->getAllbusiness();
        $data['pso_types']=$this->pso_model->get_pso_type();
        $data['pso'] = $this->pso_model->select_pso_by_pso_id($this->input->get('pso_id'));
        $data['hero_header'] = TRUE;
        $data['footer'] = $this->load->view('view_footer', '', TRUE);
        $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
        $data['main_content'] =$this->parser->parse('view_pso/view_pso_info',$data,TRUE);
        $this->load->view('view_master',$data);
    }

    public function insert_pso()
    {

        $data['pso_name']=$this->input->post('pso_name');
        $data['pso_id']=$this->input->post('pso_renata_id');
        $data['renata_id']=$this->input->post('pso_code');
        $data['tbl_user_dsm_dsm_code']=$this->input->post('dsm_code');
        $data['pso_phone']=$this->input->post('pso_phone');
        $phone= '0'.preg_replace('/[^\p{L}\p{N}\s]/u','',$this->input->post('pso_phone'));
        $data['pso_phone']= preg_replace('/\s+/','', $phone);
        $data['pso_designation']=$this->input->post('pso_designation');
        $data['tbl_business_business_code']=$this->input->post('business_code');
        $data['tbl_depot_depot_code']=$this->input->post('depot_code');
        $data['tbl_pso_user_type_pso_user_type_id']=$this->input->post('pso_type');
        $pso_password1=mt_rand(100000, 999999);
        $data['pso_password']=md5($pso_password1);
        if ($this->form_validation->run('addpso'))
        {
            $number=mt_rand(100,999);
            $result=$this->pso_model->insert_pso($data);
            if($result=='1')
            {
                $curl = curl_init();
                curl_setopt_array($curl, array( CURLOPT_RETURNTRANSFER => 1, CURLOPT_URL => 'http://sms.sslwireless.com/pushapi/dynamic/server.php?user=RenataPharmaceuticals&pass=92o<8H52&sid=Momenta&sms='.urlencode("Your Renata App Id: $data[pso_id]\nRenata Password: $pso_password1\nMomenta App Download Link: https://goo.gl/DMyhq1").'&msisdn=88'.$data['pso_phone'].'&csmsid='.$number.'App'.$data['renata_id'].'',CURLOPT_USERAGENT => 'Sample cURL Request' ));
                $resp = curl_exec($curl);
                curl_close($curl);
            }
            $this->session->set_userdata('confirm_add_pso','Pso Insert Successful');
            redirect(base_url() .'pso/manage_pso', 'refresh');
        }
        else
        {
            $user_type=$this->session->userdata('user_type');
            $employee_id=$this->session->userdata('employee_id');
            $data['depots']=$this->pso_model->get_depot($user_type,$employee_id);
            $data['business'] = $this->medicine_literature_model->getAllbusiness();
            $data['pso_types']=$this->pso_model->get_pso_type();
            $data['pso_add']=validation_errors();
            $data['hero_header'] = TRUE;
            $data['footer'] = $this->load->view('view_footer', '', TRUE);
            $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
            $data['main_content'] =$this->parser->parse('view_pso/view_add_pso',$data,TRUE);
            $this->load->view('view_master',$data);

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
        curl_setopt_array($curl, array( CURLOPT_RETURNTRANSFER => 1, CURLOPT_URL => 'http://sms.sslwireless.com/pushapi/dynamic/server.php?user=RenataPharmaceuticals&pass=92o<8H52&sid=Momenta&sms='.urlencode("Your Renata App Id: $pso_id\nRenata Password: $pso_password\nMomenta App Download Link: https://goo.gl/DMyhq1").'&msisdn=88'.$pso_phone.'&csmsid='.$number.'App'.$pso_renata_id.'',CURLOPT_USERAGENT => 'Sample cURL Request' ));
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

        $data['pso_name']=$this->input->post('pso_name');
        $data['renata_id']=$this->input->post('pso_code');
        $data['tbl_user_dsm_dsm_code']=$this->input->post('dsm_code');
        $data['pso_phone']=$this->input->post('pso_phone');
        $phone= '0'.preg_replace('/[^\p{L}\p{N}\s]/u','',$this->input->post('pso_phone'));
        $data['pso_phone']= preg_replace('/\s+/','', $phone);
        $data['pso_designation']=$this->input->post('pso_designation');
        $data['tbl_business_business_code']=$this->input->post('business_code');
        $data['tbl_depot_depot_code']=$this->input->post('depot_code');
        $data['tbl_pso_user_type_pso_user_type_id']=$this->input->post('pso_type');

        $pso_renata_id=$this->input->post('pso_renata_id');

        if ($this->form_validation->run('updatepso'))
        {
            $this->pso_model->update_pso($data,$pso_renata_id);
            $this->session->set_userdata('confirm_update_pso','PSO Account information has been successfully updated');
            redirect(base_url() . 'pso/manage_pso', 'refresh');
        }
        else
        {
            $data['pso'] = $this->pso_model->select_pso_by_pso_id( $pso_renata_id);
            $data['pso_add']=validation_errors();
            $this->load->view('view_pso/view_pso_info',$data);
        }
    }


}