<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tar_shop extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $data['login_id']=$this->session->userdata('login_id');
        $this->session->set_userdata('main_menu','renata_shop');
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
        redirect(base_url().'tar_shop/create_target');
    }
    public function create_incentive()
    {
        $this->session->set_userdata('sub_menu','create_incentive');
        $data['business'] = $this->medicine_literature_model->getAllbusiness();
        $data['hero_header'] = TRUE;
        $data['footer'] = $this->load->view('view_footer', '', TRUE);
        $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
        $data['main_content'] =$this->parser->parse('view_renata_shop/view_create_incentive',$data,TRUE);
        $this->load->view('view_master',$data);
    }
    public function track_incentive()
    {
        $this->session->set_userdata('sub_menu','track_incentive');
        $data['booked']=$this->tar_shop_model->show_all_booked_incentive();
        $data['history']=$this->tar_shop_model->show_all_incentive_history();

        $data['hero_header'] = TRUE;
        $data['footer'] = $this->load->view('view_footer', '', TRUE);
        $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
        $data['main_content'] =$this->parser->parse('view_renata_shop/view_track_incentive',$data,TRUE);
        $this->load->view('view_master',$data);
    }
    public function add_incentive()
    {
        $pso_token=array();
        $data['tbl_business_business_code']=$this->input->post('business');
        $data['incentives_name']=$this->input->post('title');
        $data['incentives_description']=$this->input->post('description');
        $exp_date=explode('/', $this->input->post('validation'));
        $data['exp_date'] = $exp_date[2].'-'.$exp_date[0].'-'.$exp_date[1];
        $data['incentives_point']=$this->input->post('point');
        $data['quantity']=$this->input->post('quantity');
        $data['create_date']=date('Y-m-d');
        $data['status']='1';
        if (!empty($_FILES['image']['name'])) {
            $uploadPath = 'upload/shop_image';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|png|jpeg|JPEG|PNG|JPG';
            $config['max_size'] = '2048';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('image')) {
                $fileData = $this->upload->data();
                $uploadData['file_name'] = $fileData['file_name'];
            }
        }
        if (!empty($uploadData)) {
            $pp = base_url() . 'upload/shop_image/' . $fileData['file_name'];
            $data['incentives_image']=$pp;
            $result=$this->tar_shop_model->insert_incentive($data);
        } else {
            $data['incentives_image']='';
            $result=$this->tar_shop_model->insert_incentive($data);
        }
        if($result=='1')
        {
            $data1['message_title'] = 'New Incentive: '.$data['incentives_name'];
            $data1['message_body'] = 'A new incentive, named '.$data['incentives_name'].' has been released in Renata Shop on '. date('F j\, Y') . '. Redeem it for '.$data['incentives_point'].' points. So HURRY!!!';
            $data1['sent_by'] = 'Marketing Department';
            $data1['reference'] = 'renata_shop';
            $data1['user_id'] = $this->session->userdata('employee_id');
            $data1['date'] = date('Y-m-d');
            $data1['time'] = date("h:i:s");
            $data1['status'] = '1';
            $notification_id=$this->communication_hub_model->add_notification($data1);

            $psos = $this->communication_hub_model->get_pso_token_by_business($data['tbl_business_business_code']);

            foreach ($psos as $pso)
            {
                array_push($pso_token,$pso['token']);
                $this->communication_hub_model->assign_notification($notification_id,$pso['pso_id']);
            }
            $reg_ids=array_chunk($pso_token,1000);
            foreach ($reg_ids as $reg_id)
            {
                $abc=$this->send_notification->notification_push($reg_id,$data1['message_body'],$data1['message_title']);
            }

            $this->session->set_userdata('create_incentive','Incentive created successfully');
            redirect(base_url() . 'renata_shop/create_incentive', 'refresh');
        }
        else
        {

        }
    }

    public function approve_booking()
    {
        $transaction_id=$this->input->get('tar_id');
        $this->tar_shop_model->approve_transaction($transaction_id);
        $this->session->set_userdata('approve_booking','Transaction successfully approved');
        redirect(base_url() . 'tar_shop/track_incentive', 'refresh');
    }

    public function approve_booking_chunk()
    {
        $transaction_ids=$this->input->post('id');
        foreach ($transaction_ids as $transaction_id)
        {
            $this->tar_shop_model->approve_transaction($transaction_id);
        }
        $this->session->set_userdata('approve_booking','Transaction successfully approved');
        redirect(base_url() . 'tar_shop/track_incentive', 'refresh');
    }

    //excel file should update

    public function export()
    {
        $result=$this->tar_shop_model->get_transaction();
        $this->export_excel->to_excel($result,'List Of Incentive');
        redirect(base_url() . 'tar_shop/track_incentive', 'refresh');
    }
    public function export_history()
    {
        $result=$this->tar_shop_model->get_history();
        $this->export_excel->to_excel($result,'List Of Incentive History');
        redirect(base_url() . 'tar_shop/track_incentive', 'refresh');
    }

    public function manage_incentives()
    {
        $this->session->set_userdata('sub_menu','manage_incentive');
        $data['incentives']=$this->tar_shop_model->all_incentives();
        $data['hero_header'] = TRUE;
        $data['footer'] = $this->load->view('view_footer', '', TRUE);
        $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
        $data['main_content'] =$this->parser->parse('view_renata_shop/view_manage_incentive',$data,TRUE);
        $this->load->view('view_master',$data);
    }

    public function change_status()
    {
        $incentives_id=$this->input->get('incentives_id');
        $incentives_name=$this->input->get('incentives_name');
        $status=$this->input->get('status');
        if($status=='0')
        {
            $this->session->set_userdata('inactive_incentives',$incentives_name.' Incentive successfully inactive');
        }
        else
        {
            $this->session->set_userdata('active_incentives',$incentives_name.' Incentive successfully Active');
        }
        $result=$this->tar_shop_model->update_status($incentives_id,$status);
        redirect(base_url() . 'tar_shop/manage_incentives', 'refresh');
    }

    public function delete_incentives()
    {
        $incentives_id=$this->input->get('incentives_id');
        $result=$this->tar_shop_model->delete_incentives($incentives_id);
        $this->session->set_userdata('delete_incentives','Incentive Successfully Deleted');
        redirect(base_url() . 'tar_shop/manage_incentives', 'refresh');
    }

    public function edit_incentive()
    {
        $incentive_id=$this->input->get('incentives_id');
        $data['business'] = $this->medicine_literature_model->getAllbusiness();
        $data['incentive']=$this->tar_shop_model->select_incentive_by_incentive_id($incentive_id);
        $data['hero_header'] = TRUE;
        $data['footer'] = $this->load->view('view_footer', '', TRUE);
        $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
        $data['main_content'] =$this->parser->parse('view_renata_shop/view_edit_incentive',$data,TRUE);
        $this->load->view('view_master',$data);
    }

    public function update_incentive()
    {
        $data['incentives_name']=$this->input->post('title');
        $data['incentives_description']=$this->input->post('description');
        $exp_date=explode('/', $this->input->post('validation'));
        $data['exp_date'] = $exp_date[2].'-'.$exp_date[0].'-'.$exp_date[1];
        $data['incentives_point']=$this->input->post('point');
        $data['quantity']=$this->input->post('quantity');
        $data['tbl_business_business_code']=$this->input->post('business');
        $data['incentives_image']=$this->input->post('incentive_image');
        $data['status']='1';
        $in_id=$this->input->post('incentives_id');


        if (!empty($_FILES['image']['name'])) {
            $uploadPath = 'upload/shop_image';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|png|jpeg|JPEG|PNG|JPG';
            $config['max_size'] = '2048';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('image')) {
                $fileData = $this->upload->data();
                $uploadData['file_name'] = $fileData['file_name'];
            }
        }
        if (!empty($uploadData)) {
            $pp1=str_replace(base_url(),"",$data['incentives_image']);
            unlink($pp1);
            $data['incentives_image'] = base_url() . 'upload/shop_image/' . $fileData['file_name'];
            $result=$this->tar_shop_model->edit_incentives_by_incentives_id($data,$in_id);
        } else {
            $result=$this->tar_shop_model->edit_incentives_by_incentives_id($data,$in_id);
        }

        if($result=='1')
        {
            $this->session->set_userdata('update_incentives','Incentive Successfully Updated');
            redirect(base_url() . 'tar_shop/manage_incentives', 'refresh');
        }

    }


    public function assign_incentives_to_pso()
    {
        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        }
        else
        {
            $incentives_id = $this->input->post('incentives_id');
            $test = $this->input->post('pso');
            foreach ($test as $row) {
                $this->tar_shop_model->set_psos($incentives_id, $row);
            }
            $this->session->set_userdata('assign', 'Incentives Assign Successful');
            redirect(base_url() . 'tar_shop/manage_incentives', 'refresh');
        }
    }

    public function assign_incentives_to_depot()
    {
        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        }
        else
        {
            $incentives_id = $this->input->post('incentives_id');
            $test = $this->input->post('depots');
            foreach ($test as $row) {
                $this->tar_shop_model->set_depot($incentives_id, $row);
            }
            $this->session->set_userdata('assign', 'Incentives Assign Successful');
            redirect(base_url() . 'tar_shop/manage_incentives', 'refresh');
        }
    }





}