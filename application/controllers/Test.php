<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $data['login_id']=$this->session->userdata('login_id');
        $this->session->set_userdata('main_menu','test');
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
        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        } else {
            $this->session->set_userdata('sub_menu','create_test');
            $data['business'] = $this->medicine_literature_model->getAllbusiness();
            $data['hero_header'] = TRUE;
            $data['footer'] = $this->load->view('view_footer', '', TRUE);
            $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
            $data['main_content'] =$this->parser->parse('view_tests/view_create_test',$data,TRUE);
            $this->load->view('view_master',$data);
        }
    }

    public function create_test()
    {
        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        } else {

            $this->session->set_userdata('sub_menu','create_test');
            $data['business'] = $this->medicine_literature_model->getAllbusiness();
            $data['hero_header'] = TRUE;
            $data['footer'] = $this->load->view('view_footer', '', TRUE);
            $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
            $data['main_content'] =$this->parser->parse('view_tests/view_create_test',$data,TRUE);
            $this->load->view('view_master',$data);
        }
    }

    public function upload_ques()
    {
        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        } else {
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
        } else {
            $business_code = $this->input->post('business_code');
            $test_name = $this->input->post('test_name');
            $test_suggestion = $this->input->post('test_suggestion');

            $exp_date1=explode('/', $this->input->post('exp_date'));
            $exp_date = $exp_date1[2].'-'.$exp_date1[0].'-'.$exp_date1[1];
            $test_type = $this->input->post('test_type');
            $test_time = $this->input->post('test_time');
            $test_marks = $this->input->post('test_marks');
            $pass_marks = $this->input->post('pass_marks');
            $ques = $this->input->post('ques');
            $op1 = $this->input->post('op1');
            $op2 = $this->input->post('op2');
            $op3 = $this->input->post('op3');
            $op4 = $this->input->post('op4');
            $ans = $this->input->post('ans');
            $result = $this->test_model->create_test($business_code,$test_name, $test_suggestion,$exp_date, $test_type, $test_time, $test_marks, $pass_marks, $ques, $op1, $op2, $op3, $op4, $ans);
            if ($result) {
                echo $result['0']['exam_id'];
            }
        }
    }
    public function test_assign()
    {
        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        } else {

            $exam_id = $this->input->get('test_id');
            $business_code = $this->input->get('business_code');

            $data['exam'] = $this->test_model->edit_test_info_by_exam_id($exam_id);
            $data['assign_region'] = $this->test_model->no_of_region_assign($exam_id);
            $data['regions'] = $this->pso_model->get_region_test_assign($business_code);
            $data['hero_header'] = TRUE;
            $data['footer'] = $this->load->view('view_footer', '', TRUE);
            $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
            $data['main_content'] =$this->parser->parse('view_tests/view_assign_test',$data,TRUE);
            $this->load->view('view_master',$data);
        }

    }



    public function assign_test()
    {

        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        }
        else {
            $global = $this->input->post('global');
            $id = $this->input->post('test_id');
            $business_code = $this->input->post('business_code');
            $form_type = $this->input->post('form_type');
            if ($global == 'global') {
                $this->test_model->set_global($id,$business_code);
            } else {
                $region=$this->input->post('region');
                $pso_type=$this->input->post('pso_type');
                $psos=$this->input->post('psos');


                if($psos)
                {
                    foreach ($psos as $row) {
                        $this->test_model->set_psos($id, $row);
                    }
                }
                else if($region && $pso_type)
                {
                    $region_list=implode(',',$region);
                    $pso_type_list=implode(',',$pso_type);
                    $this->test_model->set_region_pso_type($id, $region_list,$pso_type_list);
                }
                else if($region)
                {
                    $region_list=implode(',',$region);
                    $this->test_model->set_region($id, $region_list);
                }
                else if($pso_type)
                {
                    $pso_type_list=implode(',',$pso_type);
                    $this->test_model->set_pso_type($id,$pso_type_list);
                }
            }
            if($form_type=='1')
            {
                $this->session->set_userdata('create_test', 'Create Test Successful');
            }
            else
            {
                $this->session->set_userdata('assign_test', 'Test Successfully Assign');
            }
//            redirect(base_url() . 'test/create_test', 'refresh');
            redirect(base_url() . 'test/manage_test', 'refresh');
        }

    }

    public function save_test()
    {
        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        }
        else {
            $ques=$this->input->post('ques');
            $option1=$this->input->post('option1');
            $option2=$this->input->post('option2');
            $option3=$this->input->post('option3');
            $option4=$this->input->post('option4');
            $answer=$this->input->post('answer');
            $id = $this->input->post('test_id');
            if($ques==''||$ques==null)
            {
                $this->test_model->save_test($id);
            }
            else
            {
                $this->test_model->save_test_with_ques($id,$ques,$option1,$option2,$option3,$option4,$answer);
            }

            $this->session->set_userdata('create_test', 'Create Test Successful');

//            redirect(base_url() . 'test/create_test', 'refresh');
            redirect(base_url() . 'test/manage_test', 'refresh');
        }

    }



    public function result()
    {
        $user_type = $this->session->userdata('user_type');
        $employee_id = $this->session->userdata('employee_id');
        $data['sexams'] = $this->test_model->all_exam_sort_list();
        $aa = $this->test_model->pso_exam_attend_status($user_type, $employee_id);
        $bb = $this->test_model->pso_exam_not_attend_status($user_type, $employee_id);
        $cc = $this->test_model->pso_total_pass($user_type, $employee_id);
        $dd = $this->test_model->pso_total_fail($user_type, $employee_id);

        $a=$aa['0']['tattend'];
        $b=$bb['0']['tnattend'];
        $c=$cc['0']['tpass'];
        $d=$dd['0']['tfail'];


        $ab=$a+$b;
        $cd=$c+$d;


        if($ab<1)
        {
            $data['tattend'] = 0;
            $data['tnotattend'] = 0;
        }
        else
        {
            $data['tattend'] = round(($a/($a+$b))*100);
            $data['tnotattend'] = round(($b/($a+$b))*100);
        }
        if($cd<1)
        {
            $data['tpass'] = 0;
            $data['tfail'] = 0;
        }
        else
        {
            $data['tpass'] = round(($c/($c+$d))*100);
            $data['tfail'] = round(($d/($c+$d))*100);
        }
        $data['sms'] = $this->user_model->all_sm();
        $data['rms'] = $this->user_model->all_rsm();
        if($user_type=='5')
        {
            $data['dms'] = $this->user_model->all_dsm_by_user($employee_id);
        }
        else
        {
            $data['dms'] = $this->user_model->all_dsm($user_type, $employee_id);
        }
        $this->session->set_userdata('sub_menu','result');
        $data['hero_header'] = TRUE;
        $data['footer'] = $this->load->view('view_footer', '', TRUE);
        $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
        $data['main_content'] =$this->parser->parse('view_tests/view_result',$data,TRUE);
        $this->load->view('view_master',$data);

    }

    public function test_page()
    {
        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        } else {
            $this->session->set_userdata('sub_menu','manage_test');
            $data['tests'] = $this->test_model->all_exam();
            $data['hero_header'] = TRUE;
            $data['footer'] = $this->load->view('view_footer', '', TRUE);
            $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
            $data['main_content'] =$this->parser->parse('view_tests/view_test_page',$data,TRUE);
            $this->load->view('view_master',$data);

        }
    }

    public function view_exam_ques()
    {
        $this->load->view('view_exam_ques');
        $this->load->view('view_footer');
    }

    public function view_result_info()
    {
        $this->load->view('view_tests/view_result_info');
        $this->load->view('view_footer');
    }

    public function view_edit_exam_ques($exam_idd = 0)
    {
        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        } else {
            $exam_id = $exam_idd;
            $this->session->set_userdata('sub_menu','manage_test');
            $data['business'] = $this->medicine_literature_model->getAllbusiness();
            $data['exam'] = $this->test_model->edit_test_info_by_exam_id($exam_id);
            $data['region'] = $this->test_model->no_of_region_assign($exam_id);
            $data['questions'] = $this->test_model->edit_test_question_by_exam_id($exam_id);
            $data['hero_header'] = TRUE;
            $data['footer'] = $this->load->view('view_footer', '', TRUE);
            $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
            $data['main_content'] =$this->parser->parse('view_tests/view_edit_exam_ques',$data,TRUE);
            $this->load->view('view_master',$data);
        }
    }

    public function view_pso_result()
    {

        $user_type = $this->session->userdata('user_type');
        $employee_id = $this->session->userdata('employee_id');
        $pso_id = $this->input->get('pso_id');
        $data['pso_exams'] = $this->test_model->pso_exam_list_by_pso_id($pso_id);
        $data['pso_exam_detail'] = $this->test_model->pso_exam_by_pso_id($pso_id);
        $data['pexams'] = $this->test_model->pso_exam_list($user_type, $employee_id);
        $data['hero_header'] = TRUE;
        $data['footer'] = $this->load->view('view_footer', '', TRUE);
        $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
        $data['main_content'] =$this->parser->parse('view_tests/view_pso_result',$data,TRUE);
        $this->load->view('view_master',$data);

    }

    public function show_pso_result()
    {
        $pso_id = $this->input->get('pso_id');
        $assign_id = $this->input->get('assign_id');
        $data['pso_exam_details'] = $this->test_model->pso_exam_details($pso_id, $assign_id);
        $data['pso_exam_questions'] = $this->test_model->pso_exam_ques_ans($assign_id);
        $data['hero_header'] = TRUE;
        $data['footer'] = $this->load->view('view_footer', '', TRUE);
        $data['user_profile'] = $this->load->view('view_top_user_profile', '', TRUE);
        $data['main_content'] =$this->parser->parse('view_tests/view_result_info',$data,TRUE);
        $this->load->view('view_master',$data);

    }

    public function delete_pso_tests()
    {
        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        } else {
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
        } else {
            $exam_id = $this->input->get('test_id');
            $result = $this->test_model->delete_tests($exam_id);
            $this->session->set_userdata('delete_exams', 'Test Delete Successful');
            redirect(base_url() . 'test/manage_test', 'refresh');
        }
    }

    public function update_test_info()
    {
        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        } else {
            $business = $this->input->post('business');
            $exam_id = $this->input->post('exam_id');
            $exam_name = $this->input->post('exam_name');
            $exam_suggestion = $this->input->post('exam_suggestion');
            $exp_date1=explode('/', $this->input->post('exp_date'));
            $exp_date = $exp_date1[2].'-'.$exp_date1[0].'-'.$exp_date1[1];

            $exam_time = $this->input->post('exam_time');
            $exam_marks = $this->input->post('exam_marks');
            $exam_type = $this->input->post('exam_type');
            $pass_marks = $this->input->post('pass_marks');
            $result = $this->test_model->update_exam($business,$exam_id, $exam_name,$exam_suggestion,$exp_date, $exam_marks, $exam_time, $exam_type, $pass_marks);
            $this->session->set_userdata('update_exam', 'Exam info update successful');
            redirect(base_url() . 'test/view_edit_exam_ques/' . $exam_id, 'refresh');
        }
    }

    public function publish_exam_ans()
    {
        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        } else {
            $exam_id = $this->input->get('exam_id');
            $result = $this->test_model->publish_exam_ans($exam_id);
            $this->session->set_userdata('publish_exam', 'Exam Publish successful');
            redirect(base_url() . 'test/manage_test/', 'refresh');
        }
    }

    public function unpublish_exam_ans()
    {
        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        } else {
            $exam_id = $this->input->get('exam_id');
            $result = $this->test_model->unpublish_exam_ans($exam_id);
            $this->session->set_userdata('unpublish_exam', 'Exam Unpublished successful');
            redirect(base_url() . 'test/manage_test/', 'refresh');
        }
    }

    public function update_question()
    {
        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        } else {
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

    public function assign_test_to_region()
    {
        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        } else {
            $exam_id = $this->input->post('exam_id');
            $region=$this->input->post('region');

            $region_list=implode(',',$region);
            $this->test_model->set_region($exam_id, $region_list);

            $this->session->set_userdata('assign', 'Test Assign Successful');
            redirect(base_url() . 'test/manage_test', 'refresh');
        }
    }

    public function assign_test_to_pso()
    {
        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        } else {
            $exam_id = $this->input->post('exam_id');
            $test = $this->input->post('pso');
            foreach ($test as $row) {
                $this->test_model->set_psos($exam_id, $row);
            }
            $this->session->set_userdata('assign', 'Test Assign Successful');
            redirect(base_url() . 'test/manage_test', 'refresh');
        }
    }

    public function delete_question()
    {
        if ($this->session->userdata('user_type') != '1' && $this->session->userdata('user_type') != '2' && $this->session->userdata('user_type') != '3') {
            redirect(base_url() . 'access_denied');
        } else {
            $exam_id = $this->input->get('exam_id');
            $question_id = $this->input->get('question_id');
            $result = $this->test_model->delete_question($question_id);
            if ($result) {
                $this->session->set_userdata('delete_question', 'Question has been deleted Successful');
                redirect(base_url() . 'test/view_edit_exam_ques/' . $exam_id, 'refresh');
            }
        }
    }




}