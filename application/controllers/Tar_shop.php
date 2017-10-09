<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tar_shop extends CI_Controller {

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
        $this->session->set_userdata('i','4');

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
        if($this->session->userdata('user_type')!='1'&&$this->session->userdata('user_type')!='2'&&$this->session->userdata('user_type')!='3'&&$this->session->userdata('user_type')!='4')
        {
            redirect(base_url().'access_denied');
        }
    }

    public function index()
    {
        redirect(base_url().'tar_shop/create_target');
    }
    public function create_target()
    {
        $user_type=$this->session->userdata('user_type');
        $employee_id=$this->session->userdata('employee_id');
        $data['depots']=$this->pso_model->get_depot($user_type,$employee_id);
        $data['psos'] = $this->tar_shop_model->get_pso($user_type,$employee_id);
        $this->load->view('view_renata_shop/view_create_target',$data);
        $this->load->view('view_footer');
    }
    public function track_incentive()
    {
        $user_type=$this->session->userdata('user_type');
        $employee_id=$this->session->userdata('employee_id');
        $data['booked']=$this->tar_shop_model->show_all_booked_incentive($user_type,$employee_id);
        $data['history']=$this->tar_shop_model->show_all_incentive_history($user_type,$employee_id);
        $this->load->view('view_renata_shop/view_track_incentive',$data);
        $this->load->view('view_footer');
    }
    public function create_incentive()
    {
        $in_title=$this->input->post('title');
        $in_description=$this->input->post('description');
        $in_validation=$this->input->post('validation');
        $in_point=$this->input->post('point');
        $in_quantity=$this->input->post('quantity');
        $global=$this->input->post('global');

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
            $this->tar_shop_model->insert_incentive($in_title,$in_description,$in_validation,$in_point,$in_quantity,$pp);
        } else {
            $this->tar_shop_model->insert_incentive($in_title,$in_description,$in_validation,$in_point,$in_quantity,'');
        }
        $this->session->set_userdata('create_shop','Create Incentive Successful!');
        redirect(base_url() . 'tar_shop/create_target', 'refresh');
    }

    public function approve_booking()
    {
        $transaction_id=$this->input->get('tar_id');
        $this->tar_shop_model->approve_transaction($transaction_id);
        redirect(base_url() . 'tar_shop/track_incentive', 'refresh');
    }

    //excel file should update

    public function export()
    {
        $result=$this->tar_shop_model->get_transaction();
        $this->export_excel->to_excel($result,'List Of Incentive');
        redirect(base_url() . 'tar_shop/track_incentive', 'refresh');
    }

    public function manage_incentives()
    {
        $user_type=$this->session->userdata('user_type');
        $employee_id=$this->session->userdata('employee_id');
        $data['depots']=$this->pso_model->get_depot($user_type,$employee_id);
        $data['psos'] = $this->tar_shop_model->get_pso($user_type,$employee_id);
        $data['incentives']=$this->tar_shop_model->all_incentives();
        $this->load->view('view_renata_shop/view_manage_incentives',$data);
        $this->load->view('view_footer');
    }

    public function change_status()
    {
        $incentives_id=$this->input->get('incentives_id');
        $status=$this->input->get('status');
        $result=$this->tar_shop_model->update_status($incentives_id,$status);
        redirect(base_url() . 'tar_shop/manage_incentives', 'refresh');
    }

    public function delete_incentives()
    {
        $incentives_id=$this->input->get('incentives_id');
        $result=$this->tar_shop_model->delete_incentives($incentives_id);
        $this->session->set_userdata('delete_incentives','Incentive Deleted');
        redirect(base_url() . 'tar_shop/manage_incentives', 'refresh');
    }

    public function edit_incentive()
    {
        $incentive_id=$this->input->get('incentives_id');
        $data['incentive']=$this->tar_shop_model->select_incentive_by_incentive_id($incentive_id);
        $this->load->view('view_renata_shop/view_edit_incentives',$data);
        $this->load->view('view_footer');
    }

    public function update_incentive()
    {
        $in_title=$this->input->post('title');
        $in_description=$this->input->post('description');
        $in_validation=$this->input->post('validation');
        $in_point=$this->input->post('point');
        $in_quantity=$this->input->post('quantity');
        $in_id=$this->input->post('incentives_id');
        $image1=$this->input->post('image1');

        $pp='';

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
            $pp1=str_replace(base_url(),"/",$image1);
            unlink($pp1);
            $pp = base_url() . 'upload/shop_image/' . $fileData['file_name'];
            $result=$this->tar_shop_model->edit_incentives_by_incentives_id($in_id,$in_title,$in_description,$in_validation,$in_point,$in_quantity,$pp);
        } else {
            $pp=$image1;
            $result=$this->tar_shop_model->edit_incentives_by_incentives_id($in_id,$in_title,$in_description,$in_validation,$in_point,$in_quantity,$pp);
        }

        if($result=='1')
        {
            $this->session->set_userdata('update_incentives','Incentive Updated');
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