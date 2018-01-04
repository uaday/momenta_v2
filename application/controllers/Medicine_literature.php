<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Medicine_literature extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        define('API_ACCESS_KEY', 'AAAApj6zYT4:APA91bG7kikxGt7fnXaZhq5t28FcYM85FbPjL8V8yXOpXy56nYP80U4jZibFkCZG6FmSsCiazdUbwwTavQ-agqT-gs_tJUPyM15nft6YqaRhgO_vrAOzxj9u2JtkIXc-W0Vi_QRGGkgA');
        $data['name'] = $this->session->userdata('name');
        $data['login_id'] = $this->session->userdata('login_id');
        $data['tincentives'] = $this->home_model->total_incentives();
        $data['texam'] = $this->home_model->total_exam();
        $user_type = $this->session->userdata('user_type');
        $employee_id = $this->session->userdata('employee_id');
        $data['tpso'] = $this->home_model->total_pso($user_type, $employee_id);
        $data['tdrug'] = $this->home_model->total_drug();
        $this->session->set_userdata('main_menu', 'medicine_literature');

        if ($this->session->userdata('change_pass_status') == '0') {
            redirect(base_url() . 'change_password');
        }

        if ($data['login_id'] != null) {
        } else {
            redirect(base_url() . 'login');
        }

        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        }
    }

    public function index()
    {
        $this->session->set_userdata('sub_menu', 'medicine_literature_update');
        $data['meds'] = $this->medicine_literature_model->getFourMed();
        $data['business'] = $this->medicine_literature_model->getAllbusiness();
        $data['docs'] = $this->medicine_literature_model->getAllDoc();
        $data['hero_header'] = TRUE;
        $data['footer'] = $this->load->view('view_footer', '', TRUE);
        $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
        $data['main_content'] = $this->parser->parse('view_medicine_literature/view_medicine_literature', $data, TRUE);
        $this->load->view('view_master', $data);
    }

    public function drug_dse_upload()
    {
        if (isset($_FILES["pdf"]["name"])) {
            if ($_POST['upload_file_type'] == '3') {
                $uploadPath = 'upload/drug_image';
            } else {
                $uploadPath = 'upload/pdf_files';
            }
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'pdf|jpg|png|jpeg|JPG|PNG|JPEG';
            $config['max_size'] = '5000';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('pdf')) {
                $fileData = $this->upload->data();
                $uploadData['file_name'] = $fileData['file_name'];
                if ($_POST['upload_file_type'] == '3') {
                    $lnk = base_url() . 'upload/drug_image/' . $fileData['file_name'];
                } else {
                    $lnk = base_url() . 'upload/pdf_files/' . $fileData['file_name'];
                }

                if ($this->medicine_literature_model->insert($lnk, $_POST['upload_file_type'], $_POST['drug_id'])) {
                    $this->session->set_userdata('message', 'Upload Successful');
                    redirect(base_url() . 'medicine_literature/update_medicine_literature', 'refresh');
                }
            } else {
                echo $this->upload->display_errors();
                $this->session->set_userdata('error', $this->upload->display_errors());
                redirect(base_url() . 'medicine_literature/update_medicine_literature', 'refresh');
            }
        }
    }

    public function drug_dse_version_upload()
    {
        $business_code = $this->input->post('business11');
        $drug_id = $this->input->post('drug_id');
        $doc_id = $this->input->post('doc_type11');
        $version_id = $this->input->post('version_id');
        $version_idd = $this->input->post('version_idd');
        $point1 = $this->input->post('point1');
        $point2 = $this->input->post('point2');
        $point3 = $this->input->post('point3');
        $image_test = $this->input->post('image_test');


        $uploadPath = 'upload/drug_des_files';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
        $config['max_size'] = '3000';
        $this->load->library('upload', $config);

        $file_type1 = pathinfo($_FILES['drug_des_image']['name'], PATHINFO_EXTENSION);

        if ($_FILES['drug_des_image']['name']) {

            if ($file_type1 != 'jpg' && $file_type1 != 'png' && $file_type1 != 'jpeg' && $file_type1 != 'JPG' && $file_type1 != 'PNG' && $file_type1 != 'JPEG') {
                $this->session->set_userdata('message', 'Please Select Image File');
                redirect(base_url() . 'medicine_literature/update_medicine_literature', 'refresh');

            } else {
                if ($this->upload->do_upload('drug_des_image')) {
                    $image_test = str_replace(base_url(), "", $image_test);
                    if ($image_test) {
                        unlink($image_test);
                    }
                    $fileData = $this->upload->data();
                    $uploadData['file_name'] = $fileData['file_name'];
                    $lnk = base_url() . 'upload/drug_des_files/' . $fileData['file_name'];
                    $image_test = $lnk;
                } else {
                    echo $this->upload->display_errors();
                    $this->session->set_userdata('error1', $this->upload->display_errors());
                    redirect(base_url() . 'medicine_literature/update_medicine_literature', 'refresh');
                }
            }
        }
        if ($this->medicine_literature_model->insert_version_data($version_id, $point1, $point2, $point3, $image_test, $drug_id)) {
            $result1 = $this->medicine_literature_model->find_drug_name_by_drug_id($drug_id);
            $result2 = $this->medicine_literature_model->find_doc_type_by_doc_type_id($doc_id);

            $data['message_title'] = $result1['0']['drug_name'] . ': Detailing Pointer Update';
            $data['message_body'] = 'A new detailing pointer of ' . $result1['0']['drug_name'] . ' drug has been added on ' . date('F j\, Y') . ' for ' . $result2['0']['type_name'] . ' doctor type.';
            $data['sent_by'] = 'Marketing Department';
            $data['reference'] = 'medicine_lit';
            $data['user_id'] = $this->session->userdata('employee_id');
            $data['date'] = date('Y-m-d');
            $data['time'] = date("h:i:s");
            $data['status'] = '1';

            $psos = $this->communication_hub_model->get_pso_token_by_business($business_code);
            $notification_id = $this->communication_hub_model->add_notification($data);
            foreach ($psos as $pso) {
                $this->communication_hub_model->assign_notification($notification_id, $pso['pso_id']);
                $abc = $this->notification_push($pso['token'], $data['message_body'], $data['message_title']);
            }
            $this->session->set_userdata('message1', 'Version Successfully Updated');
            redirect(base_url() . 'medicine_literature/update_medicine_literature', 'refresh');
        }
    }

    public function notification_push($token, $message_body, $message_title)
    {
        #API access key from Google API's Console
        $registrationIds = $token;

        #prep the bundle
        $msg = array
        (
            'body' => $message_body,
            'title' => $message_title,
            'icon' => 'myicon',/*Default Icon*/
            'sound' => 'mySound'/*Default sound*/
        );
        $fields = array
        (
            'to' => $registrationIds,
            'notification' => $msg
        );

        $headers = array
        (
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        );
        #Send Reponse To FireBase Server
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public function all_literature()
    {
        $this->session->set_userdata('sub_menu', 'view_all_medicine_literature');
        $data['meds'] = $this->medicine_literature_model->getAllMed();
        $data['hero_header'] = TRUE;
        $data['footer'] = $this->load->view('view_footer', '', TRUE);
        $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
        $data['main_content'] = $this->parser->parse('view_medicine_literature/view_all_medicine_literature', $data, TRUE);
        $this->load->view('view_master', $data);
    }

    public function delete_med()
    {
        $drug_des_id = $this->input->get('med_des_id');
        $type = $this->input->get('type');
        if ($this->input->get('full_book')) {

            $full_book = str_replace("http://localhost/renata/", "./", $this->input->get('full_book'));;
            unlink($full_book);
        }
        if ($this->input->get('benefits_feature')) {

            $benefits_feature = str_replace("http://localhost/renata/", "./", $this->input->get('benefits_feature'));;
            unlink($benefits_feature);

        }
        $result = $this->medicine_literature_model->delete_drug($drug_des_id, $type);
        if ($result) {
            redirect(base_url() . 'update_medicine_literature', 'refresh');
        }
    }

    public function show_all_med()
    {
        $data['meds'] = $this->medicine_literature_model->getAllMed();
        $this->load->view('view_medicine_literature/view_show_all_drug', $data);
        $this->load->view('view_footer');
    }

    public function delete_version()
    {
        $version_id = $this->input->get('version_id');
        $result = $this->medicine_literature_model->delete_version($version_id);
        if ($result) {
            $this->session->set_userdata('message1', 'Version Successfully Deleted');
            redirect(base_url() . 'medicine_literature/update_medicine_literature', 'refresh');
        }
    }

}