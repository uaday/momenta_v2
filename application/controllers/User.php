<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

//include("asset/src/NexmoMessage.php");
class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $data['login_id'] = $this->session->userdata('login_id');
        $this->session->set_userdata('main_menu', 'user');
        if ($this->session->userdata('change_pass_status') == '0') {
            redirect(base_url() . 'change_password');
        }
        if ($data['login_id'] != null) {
        } else {
            redirect(base_url() . 'login');
        }

        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2') {
            redirect(base_url() . 'access_denied');
        }
    }

    public function index()
    {
        $this->session->set_userdata('sub_menu', 'create_user');
        $user_type = $this->session->userdata('user_type');
        $employee_id = $this->session->userdata('employee_id');
        $data['depots'] = $this->pso_model->get_depot($user_type, $employee_id);
        $data['business'] = $this->medicine_literature_model->getAllbusiness();
        $data['pso_types'] = $this->pso_model->get_pso_type();
        $data['hero_header'] = TRUE;
        $data['footer'] = $this->load->view('view_footer', '', TRUE);
        $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
        $data['main_content'] = $this->parser->parse('view_user/view_create_user', $data, TRUE);
        $this->load->view('view_master', $data);
    }

    public function create_user()
    {
        $this->session->set_userdata('sub_menu', 'create_user');
        $user_type = $this->session->userdata('user_type');
        $employee_id = $this->session->userdata('employee_id');
        $data['depots'] = $this->pso_model->get_depot($user_type, $employee_id);
        $data['business'] = $this->medicine_literature_model->getAllbusiness();
        $data['pso_types'] = $this->pso_model->get_pso_type();
        $data['hero_header'] = TRUE;
        $data['footer'] = $this->load->view('view_footer', '', TRUE);
        $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
        $data['main_content'] = $this->parser->parse('view_user/view_create_user', $data, TRUE);
        $this->load->view('view_master', $data);
    }

    public function add_new_user()
    {
        $user_name = $this->input->post('user_name');
        $renata_id = $this->input->post('renata_id');
        $user_type = $this->input->post('user_type');
        $sm_code = $this->input->post('sm_code');
        $rsm_code = $this->input->post('rsm_code');
        $dsm_code = $this->input->post('dsm_code');
        $designation = $this->input->post('designation');
        $region = $this->input->post('region');
        $depot_code = $this->input->post('depot_code');
        $business_code = $this->input->post('business_code');

        if ($user_type == '4') {
            if ($this->form_validation->run('adduser2')) {
                $this->user_model->insert_user($user_name, $renata_id, $user_type, $designation, $business_code, $sm_code, $rsm_code, $dsm_code, $depot_code, $region);
                $this->session->set_userdata('add_user', 'User Successfully Added');
                redirect(base_url() . 'user/add_user');
            } else {
                $error = validation_errors();
                $this->session->set_userdata('user_add', $error);
                redirect(base_url() . 'user/add_user');
            }
        } else if ($user_type == '5') {
            if ($this->form_validation->run('adduser3')) {
                $this->user_model->insert_user($user_name, $renata_id, $user_type, $designation, $business_code, $sm_code, $rsm_code, $dsm_code, $depot_code, $region);
                $this->session->set_userdata('add_user', 'User Successfully Added');
                redirect(base_url() . 'user/add_user');
            } else {
                $error = validation_errors();
                $this->session->set_userdata('user_add', $error);
                redirect(base_url() . 'user/add_user');
            }
        } else if ($user_type == '6') {
            if ($this->form_validation->run('adduser4')) {
                $this->user_model->insert_user($user_name, $renata_id, $user_type, $designation, $business_code, $sm_code, $rsm_code, $dsm_code, $depot_code, $region);
                $this->session->set_userdata('add_user', 'User Successfully Added');
                redirect(base_url() . 'user/create_user');
            } else {
                $error = validation_errors();
                $this->session->set_userdata('user_add', $error);
                redirect(base_url() . 'user/add_user');
            }
        } else {
            if ($this->form_validation->run('adduser1')) {
                $this->user_model->insert_user($user_name, $renata_id, $user_type, $designation, $business_code, $sm_code, $rsm_code, $dsm_code, $depot_code, $region);
                $this->session->set_userdata('add_user', 'User Successfully Added');
                redirect(base_url() . 'user/create_user');
            } else {
                $error = validation_errors();
                $this->session->set_userdata('user_add', $error);
                redirect(base_url() . 'user/add_user');
            }
        }

    }

    public function manage_user()
    {
        $this->session->set_userdata('sub_menu', 'manage_user');
        $data['admins'] = $this->user_model->all_admin();
        $data['its'] = $this->user_model->all_it();
        $data['msds'] = $this->user_model->all_msd();
        $data['gms'] = $this->user_model->all_gm();
        $data['sales'] = $this->user_model->all_sm();
        $data['rsms'] = $this->user_model->all_rsm();
        $data['dsms'] = $this->user_model->all_dsm();
        $data['hero_header'] = TRUE;
        $data['footer'] = $this->load->view('view_footer', '', TRUE);
        $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
        $data['main_content'] = $this->parser->parse('view_user/view_manage_user', $data, TRUE);
        $this->load->view('view_master', $data);

    }

    public function block_user()
    {
        $renata_id = $this->input->get('renata_id');
        $user_type = $this->input->get('user_type');
        if ($user_type == '2') {
            if ($this->session->userdata('user_type') == '1') {
                $this->user_model->block_user($renata_id);
                $this->session->set_userdata('block_user', "" . $renata_id . " User Login Credentials Successfully Blocked");
                redirect(base_url() . 'user/manage_user');
            } else {
                redirect(base_url() . 'access_denied');
            }
        } else if ($user_type == '3') {
            if ($this->session->userdata('user_type') == '1' || $this->session->userdata('user_type') == '2') {
                $this->user_model->block_user($renata_id);
                $this->session->set_userdata('block_user', "" . $renata_id . " User Login Credentials Successfully Blocked");
                redirect(base_url() . 'user/manage_user');
            } else {
                redirect(base_url() . 'access_denied');
            }
        } else {
            if ($this->session->userdata('user_type') == '1' || $this->session->userdata('user_type') == '2') {
                $this->user_model->block_user($renata_id);
                $this->session->set_userdata('block_user', "" . $renata_id . " User Login Credentials Successfully Blocked");
                redirect(base_url() . 'user/manage_user');
            } else {
                redirect(base_url() . 'access_denied');
            }
        }
    }

    public function active_user()
    {
        $renata_id = $this->input->get('renata_id');
        $user_type = $this->input->get('user_type');
        if ($user_type == '2') {
            if ($this->session->userdata('user_type') == '1') {
                $this->user_model->active_user($renata_id);
                $this->session->set_userdata('active_user', "" . $renata_id . " User Login Credentials Successfully Active");
                redirect(base_url() . 'user/manage_user');
            } else {
                redirect(base_url() . 'access_denied');
            }
        } else if ($user_type == '3') {
            if ($this->session->userdata('user_type') == '1' || $this->session->userdata('user_type') == '2') {
                $this->user_model->active_user($renata_id);
                $this->session->set_userdata('active_user', "" . $renata_id . " User Login Credentials Successfully Active");
                redirect(base_url() . 'user/manage_user');
            } else {
                redirect(base_url() . 'access_denied');
            }
        } else {
            if ($this->session->userdata('user_type') == '1' || $this->session->userdata('user_type') == '2') {
                $this->user_model->active_user($renata_id);
                $this->session->set_userdata('active_user', "" . $renata_id . " User Login Credentials Successfully Active");
                redirect(base_url() . 'user/manage_user');
            } else {
                redirect(base_url() . 'access_denied');
            }
        }
    }

    public function delete_user()
    {
        $renata_id = $this->input->get('renata_id');
        $user_type = $this->input->get('user_type');
        if ($user_type == '2') {
            if ($this->session->userdata('user_type') == '1') {
                $this->user_model->delete_user($renata_id);
                $this->session->set_userdata('delete_user', '' . $renata_id . ' User Successfully Deleted');
                redirect(base_url() . 'user/manage_user');
            } else {
                redirect(base_url() . 'access_denied');
            }
        } else {
            if ($this->session->userdata('user_type') == '1' || $this->session->userdata('user_type') == '2') {
                $this->user_model->delete_user($renata_id);
                if ($user_type == '3') {
                    $this->user_model->delete_marketing($renata_id);
                } else if ($user_type == '4') {
                    $this->user_model->delete_sm($renata_id);
                } else if ($user_type == '5') {
                    $this->user_model->delete_rsm($renata_id);
                } else if ($user_type == '6') {
                    $this->user_model->delete_dsm($renata_id);
                } else if ($user_type == '7') {
                    $this->user_model->delete_gm($renata_id);
                } else if ($user_type == '8') {
                    $this->user_model->delete_msd($renata_id);
                }
                $this->session->set_userdata('delete_user', '' . $renata_id . ' User Successfully Deleted');
                redirect(base_url() . 'user/manage_user');
            } else {
                redirect(base_url() . 'access_denied');
            }
        }
    }

    public function edit_user()
    {
        $renata_id = $this->input->get('renata_id');
        $user_type = $this->input->get('user_type');
        $user_type_login = $this->session->userdata('user_type');
        $employee_id = $this->session->userdata('employee_id');
        if ($user_type == '2') {
            $data['user'] = $this->user_model->find_admins_user_data($renata_id);
        } else if ($user_type == '3') {
            $data['user'] = $this->user_model->find_marketing_user_data($renata_id);
        } else if ($user_type == '4') {
            $data['user'] = $this->user_model->find_sm_user_data($renata_id);
        } else if ($user_type == '5') {
            $data['user'] = $this->user_model->find_rsm_user_data($renata_id);
        } else if ($user_type == '6') {
            $data['user'] = $this->user_model->find_dsm_user_data($renata_id);
        } else if ($user_type == '7') {
            $data['user'] = $this->user_model->find_gm_user_data($renata_id);
        } else if ($user_type == '8') {
            $data['user'] = $this->user_model->find_msd_user_data($renata_id);
        }

        $data['depots'] = $this->pso_model->get_depot($user_type_login, $employee_id);
        $data['business'] = $this->medicine_literature_model->getAllbusiness();
        $data['pso_types'] = $this->pso_model->get_pso_type();
        $data['hero_header'] = TRUE;
        $data['footer'] = $this->load->view('view_footer', '', TRUE);
        $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
        $data['main_content'] = $this->parser->parse('view_user/view_edit_user', $data, TRUE);
        $this->load->view('view_master', $data);
    }

    public function update_user()
    {
        $user_name = $this->input->post('user_name');
        $renata_id = $this->input->post('renata_id');
        $user_type = $this->input->post('user_type');
        $sm_code = $this->input->post('sm_code');
        $rsm_code = $this->input->post('rsm_code');
        $dsm_code = $this->input->post('dsm_code');
        $designation = $this->input->post('designation');
        $region = $this->input->post('region');
        $depot_code = $this->input->post('depot_code');
        $business_code = $this->input->post('business_code');

        $user_type_old = $this->input->post('user_type_old');

        if ($user_type == '4') {
            if ($this->form_validation->run('adduser2_update')) {
                $this->user_model->update_user($user_name, $renata_id, $user_type, $designation, $business_code, $sm_code, $rsm_code, $dsm_code, $depot_code, $region, $user_type_old);
                $this->session->set_userdata('update_user', '' . $renata_id . ' User Successfully Updated');
                redirect(base_url() . 'user/manage_user');
            } else {
                $error = validation_errors();
                $data['user_update'] = $error;
                $this->load->view('view_user/view_edit_user', $data);
            }
        } else if ($user_type == '5') {
            if ($this->form_validation->run('adduser3_update')) {
                $this->user_model->update_user($user_name, $renata_id, $user_type, $designation, $business_code, $sm_code, $rsm_code, $dsm_code, $depot_code, $region, $user_type_old);
                $this->session->set_userdata('update_user', '' . $renata_id . ' User Successfully Updated');
                redirect(base_url() . 'user/manage_user');
            } else {
                $error = validation_errors();
                $data['user_update'] = $error;
                $this->load->view('view_user/view_edit_user', $data);
            }
        } else if ($user_type == '6') {
            if ($this->form_validation->run('adduser4_update')) {
                $this->user_model->update_user($user_name, $renata_id, $user_type, $designation, $business_code, $sm_code, $rsm_code, $dsm_code, $depot_code, $region, $user_type_old);
                $this->session->set_userdata('update_user', '' . $renata_id . ' User Successfully Updated');
                redirect(base_url() . 'user/manage_user');
            } else {
                $error = validation_errors();
                $data['user_update'] = $error;
                $this->load->view('view_user/view_edit_user', $data);
            }
        } else {
            if ($this->form_validation->run('adduser1_update')) {
                $this->user_model->update_user($user_name, $renata_id, $user_type, $designation, $business_code, $sm_code, $rsm_code, $dsm_code, $depot_code, $region, $user_type_old);
                $this->session->set_userdata('update_user', '' . $renata_id . ' User Successfully Updated');
                redirect(base_url() . 'user/manage_user');
            } else {
                $error = validation_errors();
                $data['user_update'] = $error;
                $this->load->view('view_user/view_edit_user', $data);
            }
        }
    }

    public function reset_password()
    {
        $renata_id = $this->input->get('renata_id');
        $user_type = $this->input->get('user_type');
        $this->user_model->reset_password($renata_id);
        $this->session->set_userdata('reset_password', "User Password reset Successful");
        redirect(base_url() . 'user/manage_user','refresh');
    }

    public function export_admin_status_report()
    {
        $result = $this->user_model->get_admin_status_report();
        $this->export_excel->to_excel($result, 'Admin Status Report');
        redirect(base_url() . 'user/manage_user','refresh');
    }
    public function export_gm_status_report()
    {
        $result = $this->user_model->get_gm_status_report();
        $this->export_excel->to_excel($result, 'GM Status Report');
        redirect(base_url() . 'user/manage_user','refresh');
    }
    public function export_marketing_status_report()
    {
        $result = $this->user_model->get_marketing_status_report();
        $this->export_excel->to_excel($result, 'Marketing Status Report');
        redirect(base_url() . 'user/manage_user','refresh');
    }
    public function export_msd_status_report()
    {
        $result = $this->user_model->get_msd_status_report();
        $this->export_excel->to_excel($result, 'MSD Status Report');
        redirect(base_url() . 'user/manage_user','refresh');
    }
    public function export_sm_status_report()
    {
        $result = $this->user_model->get_sm_status_report();
        $this->export_excel->to_excel($result, 'SM Status Report');
        redirect(base_url() . 'user/manage_user','refresh');
    }
    public function export_rsm_status_report()
    {
        $result = $this->user_model->get_rsm_status_report();
        $this->export_excel->to_excel($result, 'RSM Status Report');
        redirect(base_url() . 'user/manage_user','refresh');
    }
    public function export_dsm_status_report()
    {
        $result = $this->user_model->get_dsm_status_report();
        $this->export_excel->to_excel($result, 'DSM Status Report');
        redirect(base_url() . 'user/manage_user','refresh');
    }


}