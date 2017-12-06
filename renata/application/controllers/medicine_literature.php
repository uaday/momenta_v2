<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Medicine_literature extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $data['name'] = $this->session->userdata('name');
        $data['login_id'] = $this->session->userdata('login_id');
        $data['tincentives'] = $this->home_model->total_incentives();
        $data['texam'] = $this->home_model->total_exam();
        $user_type=$this->session->userdata('user_type');
        $employee_id=$this->session->userdata('employee_id');
        $data['tpso']=$this->home_model->total_pso($user_type,$employee_id);
        $data['tdrug'] = $this->home_model->total_drug();
        $this->session->set_userdata('i', '2');

        if($this->session->userdata('change_pass_status')=='0')
        {
            redirect(base_url().'settings/change_password');
        }

        if ($data['login_id'] != null) {
            $this->load->view('view_dashboard', $data);
        } else {
            redirect(base_url() . 'login');
        }

        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        }
    }

    public function index()
    {
        $data['meds'] = $this->medicine_literature_model->getFourMed();
        $data['gens'] = $this->medicine_literature_model->getAllGen();
        $data['docs'] = $this->medicine_literature_model->getAllDoc();
        $this->load->view('view_medicine_literature', $data);
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
            $config['max_size'] = '2048';
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
                    redirect(base_url() . 'medicine_literature/index', 'refresh');
                }
            } else {
                echo $this->upload->display_errors();
                $this->session->set_userdata('message', $this->upload->display_errors());
                redirect(base_url() . 'medicine_literature/index', 'refresh');
            }
        }
    }

    public function drug_dse_version_upload()
    {
        $drug_id=$this->input->post('drug_id');
        $version_id = $this->input->post('version_id');
        $point1 = $this->input->post('point1');
        $point2 = $this->input->post('point2');
        $point3 = $this->input->post('point3');
        $audio1_test=$this->input->post('audio1_test');
        $audio2_test=$this->input->post('audio2_test');
        $audio3_test=$this->input->post('audio3_test');
        $drug_audio_test=$this->input->post('drug_audio_test');
        $image_test=$this->input->post('image_test');

        $uploadPath = 'upload/drug_des_files';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG|mp3|3gp|wav';
        $config['max_size'] = '2048';
        $this->load->library('upload', $config);

        $file_type1 = pathinfo($_FILES['drug_des_image']['name'], PATHINFO_EXTENSION);
        $file_type2 = pathinfo($_FILES['drug_audio']['name'], PATHINFO_EXTENSION);
        $file_type3 = pathinfo($_FILES['audio1']['name'], PATHINFO_EXTENSION);
        $file_type4 = pathinfo($_FILES['audio2']['name'], PATHINFO_EXTENSION);
        $file_type5 = pathinfo($_FILES['audio3']['name'], PATHINFO_EXTENSION);

        if ($_FILES['drug_des_image']['name'])
        {

            if ($file_type1 != 'jpg' && $file_type1 != 'png' && $file_type1 != 'jpeg' && $file_type1 != 'JPG' && $file_type1 != 'PNG' && $file_type1 != 'JPEG') {
                $this->session->set_userdata('message', 'Please Select Image File For Image');
                redirect(base_url() . 'medicine_literature/index', 'refresh');

            } else {
                if ($this->upload->do_upload('drug_des_image')) {
                    $image_test=str_replace(base_url(),"./",$image_test);
                    unlink($image_test);
                    $fileData = $this->upload->data();
                    $uploadData['file_name'] = $fileData['file_name'];
                    $lnk = base_url() . 'upload/drug_des_files/' . $fileData['file_name'];
                    $image_test = $lnk;
                }
            }
        }
        if ($_FILES['drug_audio']['name'])
        {
            if ($file_type2 != 'mp3' && $file_type2 != '3gp' && $file_type2 != 'wav') {
                $this->session->set_userdata('message', 'Please Select audio File For Drug Name Audio');
                redirect(base_url() . 'medicine_literature/index', 'refresh');
            } else {
                if ($this->upload->do_upload('drug_audio')) {
                    $drug_audio_test=str_replace(base_url(),"./",$drug_audio_test);
                    unlink($drug_audio_test);
                    $fileData = $this->upload->data();
                    $uploadData['file_name'] = $fileData['file_name'];
                    $lnk = base_url() . 'upload/drug_des_files/' . $fileData['file_name'];
                    $drug_audio_test = $lnk;
                }
            }
        }
        if ($_FILES['audio1']['name'])
        {
            if ($file_type3 != 'mp3' && $file_type3 != '3gp' && $file_type3 != 'wav') {
                $this->session->set_userdata('message', 'Please Select audio File For  Point 1 Audio');
                redirect(base_url() . 'medicine_literature/index', 'refresh');
            } else {
                if ($this->upload->do_upload('audio1')) {
                    $audio1_test=str_replace(base_url(),"./",$audio1_test);
                    unlink($audio1_test);
                    $fileData = $this->upload->data();
                    $uploadData['file_name'] = $fileData['file_name'];
                    $lnk = base_url() . 'upload/drug_des_files/' . $fileData['file_name'];
                    $audio1_test = $lnk;
                }
            }
        }
        if ($_FILES['audio2']['name'])
        {
            if ($file_type4 != 'mp3' && $file_type4 != '3gp' && $file_type4 != 'wav') {
                $this->session->set_userdata('message', 'Please Select audio File For  Point 2 Audio');
                redirect(base_url() . 'medicine_literature/index', 'refresh');
            } else {
                if ($this->upload->do_upload('audio2')) {
                    $audio2_test=str_replace(base_url(),"./",$audio2_test);
                    unlink($audio2_test);
                    $fileData = $this->upload->data();
                    $uploadData['file_name'] = $fileData['file_name'];
                    $lnk = base_url() . 'upload/drug_des_files/' . $fileData['file_name'];
                    $audio2_test = $lnk;
                }
            }
        }
        if ($_FILES['audio3']['name'])
        {
            if ($file_type5 != 'mp3' && $file_type5 != '3gp' && $file_type5 != 'wav') {
                $this->session->set_userdata('message', 'Please Select audio File For  Point 3 Audio');
                redirect(base_url() . 'medicine_literature/index', 'refresh');
            } else {
                if ($this->upload->do_upload('audio3')) {
                    $audio3_test=str_replace(base_url(),"./",$audio3_test);
                    unlink($audio3_test);
                    $fileData = $this->upload->data();
                    $uploadData['file_name'] = $fileData['file_name'];
                    $lnk = base_url() . 'upload/drug_des_files/' . $fileData['file_name'];
                    $audio3_test = $lnk;
                }
            }

        }
        if ($this->medicine_literature_model->insert_version_data($version_id, $point1, $point2, $point3, $audio1_test, $audio2_test, $audio3_test, $drug_audio_test, $image_test,$drug_id))
        {
            $this->session->set_userdata('message', 'Upload Successful');
            redirect(base_url() . 'medicine_literature/index', 'refresh');
        }

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
            redirect(base_url() . 'medicine_literature/index', 'refresh');
        }
    }

    public function show_all_med()
    {
        $data['meds'] = $this->medicine_literature_model->getAllMed();
        $this->load->view('view_show_all_drug', $data);
    }
    public function delete_version()
    {
        $version_id=$this->input->get('version_id');
        $result = $this->medicine_literature_model->delete_version($version_id);
        if($result)
        {
            $this->session->set_userdata('message', 'Version Deleted');
            redirect(base_url() . 'medicine_literature/index', 'refresh');
        }
    }

}