<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller
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
        $this->session->set_userdata('i','3');

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




    }

    public function index()
    {
        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        }
        else
        {
            $user_type=$this->session->userdata('user_type');
            $employee_id=$this->session->userdata('employee_id');
            $data['psos'] = $this->tar_shop_model->get_pso($user_type,$employee_id);
            $data['depots']=$this->pso_model->get_depot($user_type,$employee_id);
            $this->load->view('view_create_test', $data);
        }
    }

    public function create_test()
    {
        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        }
        else
        {
            $user_type=$this->session->userdata('user_type');
            $employee_id=$this->session->userdata('employee_id');
            $data['psos'] = $this->tar_shop_model->get_pso($user_type,$employee_id);
            $data['depots']=$this->pso_model->get_depot($user_type,$employee_id);
            $this->load->view('view_create_test', $data);
        }
    }

    public function upload_ques()
    {
        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        }
        else
        {
            $ques = $this->input->post('ques');
            $test_name = $this->input->post('test_name');
            $op1 = $this->input->post('op1');
            $op2 = $this->input->post('op2');
            $op3 = $this->input->post('op3');
            $op4 = $this->input->post('op4');
            $ans = $this->input->post('ans');
            $test_id = $this->input->post('test_id');
            $result = $this->test_model->upload_ques($test_name, $ques, $op1, $op2, $op3, $op4, $ans, $test_id);
        }

    }

    public function make_test()
    {
        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        }
        else
        {
            $test_name = $this->input->post('test_name');
            $test_suggestion = $this->input->post('test_suggestion');
            $test_type = $this->input->post('test_type');
            $test_time = $this->input->post('test_time');
            $test_marks = $this->input->post('test_marks');
            $pass_marks = $this->input->post('pass_marks');
            $ques=$this->input->post('ques');
            $op1=$this->input->post('op1');
            $op2=$this->input->post('op2');
            $op3=$this->input->post('op3');
            $op4=$this->input->post('op4');
            $ans=$this->input->post('ans');
            $result = $this->test_model->create_test($test_name, $test_suggestion, $test_type, $test_time, $test_marks,$pass_marks,$ques,$op1,$op2,$op3,$op4,$ans);
            if ($result) {
                echo $result['0']['exam_id'];
            }
        }
    }

    public function assign_test()
    {
        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        }
        else
        {
            $global = $this->input->post('global');
            $id = $this->input->post('test_id');
            if ($global == 'global') {
                $this->test_model->set_global($id);
            } else {
                $test = $this->input->post('depots');
                $test2 = $this->input->post('pso');
                if ($test) {
                    foreach ($test as $row) {
                        $this->test_model->set_depots($id, $row);
                    }
                } else if ($test2) {
                    foreach ($test2 as $row) {
                        $this->test_model->set_psos($id, $row);
                    }
                }
            }

            $this->session->set_userdata('create_test', 'Create Test Successful!');
            redirect(base_url() . 'test/create_test', 'refresh');
        }


    }

    public function result()
    {
        $user_type=$this->session->userdata('user_type');
        $employee_id=$this->session->userdata('employee_id');
        $data['sexams']=$this->test_model->all_exam_sort_list();
        $data['pexams'] = $this->test_model->pso_exam_list($user_type,$employee_id);
        $data['tattend'] = $this->test_model->pso_exam_attend_status($user_type,$employee_id);
        $data['tnotattend'] = $this->test_model->pso_exam_not_attend_status($user_type,$employee_id);
        $data['tpass'] = $this->test_model->pso_total_pass($user_type,$employee_id);
        $data['tfail'] = $this->test_model->pso_total_fail($user_type,$employee_id);

        $this->load->view('view_result', $data);
    }

    public function test_page()
    {
        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        }
        else
        {
            $user_type=$this->session->userdata('user_type');
            $employee_id=$this->session->userdata('employee_id');
            $data['depots']=$this->pso_model->get_depot($user_type,$employee_id);
            $data['psos'] = $this->tar_shop_model->get_pso($user_type,$employee_id);
            $data['tests'] = $this->test_model->all_exam();
            $this->load->view('view_test_page', $data);
        }
    }

    public function view_exam_ques()
    {
        $this->load->view('view_exam_ques');
    }

    public function view_result_info()
    {
        $this->load->view('view_result_info');
    }

    public function view_edit_exam_ques($exam_idd = 0)
    {
        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        }
        else
        {
            if ($exam_idd == 0)
                $exam_id = $this->input->get('test_id');
            else
                $exam_id = $exam_idd;
            $data['exam'] = $this->test_model->edit_test_info_by_exam_id($exam_id);
            $data['questions'] = $this->test_model->edit_test_question_by_exam_id($exam_id);
            $this->load->view('view_edit_exam_ques', $data);
        }
    }

    public function view_pso_result()
    {
        $user_type=$this->session->userdata('user_type');
        $employee_id=$this->session->userdata('employee_id');
        $pso_id = $this->input->get('pso_id');
        $data['pso_exams'] = $this->test_model->pso_exam_list_by_pso_id($pso_id);
        $data['pso_exam_detail'] = $this->test_model->pso_exam_by_pso_id($pso_id);
        $data['pexams'] = $this->test_model->pso_exam_list($user_type,$employee_id);
        $this->load->view('view_pso_result', $data);
    }

    public function show_pso_result()
    {
        $pso_id = $this->input->get('pso_id');
        $assign_id = $this->input->get('assign_id');
        $data['pso_exam_details'] = $this->test_model->pso_exam_details($pso_id, $assign_id);
        $data['pso_exam_questions'] = $this->test_model->pso_exam_ques_ans($assign_id);
        $this->load->view('view_result_info', $data);
    }

    public function delete_pso_tests()
    {
        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        }
        else
        {
            $pso_id = $this->input->get('pso_id');
            $result = $this->test_model->delete_pso_tests($pso_id);
            $this->session->set_userdata('delete_pso_exams', 'Pso Test Delete Successful');
            redirect(base_url() . 'test/result', 'refresh');
        }
    }

    public function delete_test()
    {
        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        }
        else
        {
            $exam_id = $this->input->get('test_id');
            $result = $this->test_model->delete_tests($exam_id);
            $this->session->set_userdata('delete_exams', 'Test Delete Successful');
            redirect(base_url() . 'test/test_page', 'refresh');
        }
    }

    public function update_test_info()
    {
        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        }
        else
        {
            $exam_id = $this->input->post('exam_id');
            $exam_name = $this->input->post('exam_name');
            $exam_time = $this->input->post('exam_time');
            $exam_marks = $this->input->post('exam_marks');
            $exam_type=$this->input->post('exam_type');
            $pass_marks=$this->input->post('pass_marks');
            $result = $this->test_model->update_exam($exam_id, $exam_name, $exam_marks, $exam_time,$exam_type,$pass_marks);
            $this->session->set_userdata('update_exam', 'Exam info update successful');
            redirect(base_url() . 'test/view_edit_exam_ques/' . $exam_id, 'refresh');
        }
    }

    public function publish_exam_ans()
    {
        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        }
        else
        {
            $exam_id = $this->input->get('exam_id');
            $result = $this->test_model->publish_exam_ans($exam_id);
            $this->session->set_userdata('publish_exam', 'Exam Publish successful');
            redirect(base_url() . 'test/view_edit_exam_ques/' . $exam_id, 'refresh');
        }
    }

    public function unpublish_exam_ans()
    {
        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        }
        else
        {
            $exam_id = $this->input->get('exam_id');
            $result = $this->test_model->unpublish_exam_ans($exam_id);
            $this->session->set_userdata('unpublish_exam', 'Exam Unpublished successful');
            redirect(base_url() . 'test/view_edit_exam_ques/' . $exam_id, 'refresh');
        }
    }

    public function update_question()
    {
        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        }
        else
        {
            $exam_id = $this->input->post('exam_id');
            $question_id = $this->input->post('question_id');
            $question = $this->input->post('question');
            $option1 = $this->input->post('option1');
            $option2 = $this->input->post('option2');
            $option3 = $this->input->post('option3');
            $option4 = $this->input->post('option4');
            $answer = $this->input->post('answer');
            $result = $this->test_model->update_question($question_id, $question, $option1, $option2, $option3, $option4, $answer);
            $this->session->set_userdata('update_question', 'Exam Question Update Successful');
            redirect(base_url() . 'test/view_edit_exam_ques/' . $exam_id, 'refresh');
        }
    }

    public function assign_test_to_depot()
    {
        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        }
        else
        {
            $exam_id = $this->input->post('exam_id');
            $test = $this->input->post('depots');
            foreach ($test as $row) {
                $this->test_model->set_depots($exam_id, $row);
            }
            $this->session->set_userdata('assign', 'Test Assign Successful');
            redirect(base_url() . 'test/test_page', 'refresh');
        }
    }
    public function assign_test_to_pso()
    {
        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        }
        else
        {
            $exam_id = $this->input->post('exam_id');
            $test = $this->input->post('pso');
            foreach ($test as $row) {
                $this->test_model->set_psos($exam_id, $row);
            }
            $this->session->set_userdata('assign', 'Test Assign Successful');
            redirect(base_url() . 'test/test_page', 'refresh');
        }
    }
    public function delete_question()
    {
        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        }
        else
        {
            $exam_id=$this->input->get('exam_id');
            $question_id=$this->input->get('question_id');
            $result=$this->test_model->delete_question($question_id);
            if($result)
            {
                $this->session->set_userdata('delete_question', 'Question has been deleted Successful');
                redirect(base_url() . 'test/view_edit_exam_ques/' . $exam_id, 'refresh');
            }
        }
    }

}