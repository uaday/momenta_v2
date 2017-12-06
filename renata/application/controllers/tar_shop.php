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
        $this->load->view('view_create_target',$data);
    }
    public function track_incentive()
    {
        $user_type=$this->session->userdata('user_type');
        $employee_id=$this->session->userdata('employee_id');
        $data['booked']=$this->tar_shop_model->show_all_booked_incentive($user_type,$employee_id);
        $data['history']=$this->tar_shop_model->show_all_incentive_history($user_type,$employee_id);
        $this->load->view('view_track_incentive',$data);
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
            $id=$this->tar_shop_model->insert_incentive($in_title,$in_description,$in_validation,$in_point,$in_quantity,$pp);
        } else {
            $id=$this->tar_shop_model->insert_incentive($in_title,$in_description,$in_validation,$in_point,$in_quantity,'');
        }
        if($global=='global')
        {
            $this->tar_shop_model->set_global($id);
        }
        else
        {
            $test=$this->input->post('depots');
            $test2=$this->input->post('pso');
            if($test)
            {
                foreach ($test as $row)
                {
                    $this->tar_shop_model->set_depot($id,$row);
                }
            }
            else if($test2)
            {
                foreach ($test2 as $row)
                {
                    $this->tar_shop_model->set_psos($id,$row);
                }
            }
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
        $data['incentives']=$this->tar_shop_model->all_incentives();
        $this->load->view('view_manage_incentives',$data);
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
        $this->load->view('view_edit_incentives',$data);
    }

    public function update_incentive()
    {
        $in_title=$this->input->post('title');
        $in_description=$this->input->post('description');
        $in_validation=$this->input->post('validation');
        $in_point=$this->input->post('point');
        $in_quantity=$this->input->post('quantity');
        $in_id=$this->input->post('incentives_id');
        $result=$this->tar_shop_model->edit_incentives_by_incentives_id($in_id,$in_title,$in_description,$in_validation,$in_point,$in_quantity);
        $this->session->set_userdata('update_incentives','Incentive Updated');
        redirect(base_url() . 'tar_shop/manage_incentives', 'refresh');
    }

}