<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Data_table extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->view('extra_view');
    }

    public function test_assign_table()
    {
        $output = '';
        $user_type = $this->session->userdata('user_type');
        $employee_id = $this->session->userdata('employee_id');
        $pexams = $this->test_model->pso_exam_list($user_type, $employee_id);
        if ($pexams > 0) {
            $output .= "<table id=\"example\" class=\"table result\">
                        <thead class=\"big_spacer\">
                           <tr>
                            <th>SM Code</th>
                            <th>RSM Code</th>
                            <th>DSM Code</th>
                            <th>PSO Code</th>
                            <th>Employee Id</th>
                            <th>PSO's Name</th>
                            <th>Total Test</th>
                            <th>Points</th>
                            <th>Accuracy</th>
                            <th>Action</th>
                            </tr>
                        </thead>";
            foreach ($pexams as $pexam)
            {
                $output.="<tr class=\"color_wrapper small_spacer\">
                        <!-- ////////////////////////////////////////modal section//////////////////////////////////////// -->
                        <td>$pexam[sm_code]</td>
                        <td>$pexam[rsm_code]</td>
                        <td>$pexam[dsm_code]</td>
                        <td>$pexam[renata_id]</td>
                        <td>$pexam[pso_id]</td>
                        <td>$pexam[pso_name]</td>
                        <td>$pexam[total_test]</td>
                        <td>$pexam[total_marks]</td>
                        <td>$pexam[per]%</td>
                        <td>

                            <button
                                onclick=\"location.href = 'view_pso_result?pso_id=$pexam[pso_id]';\"
                                type=\"button\" class=\"btn btn-info btn-lg modal_btn\"><i
                                    class=\"fa fa-chevron-circle-right fa-lg\" aria-hidden=\"true\"></i></button>
                        </td>

                    </tr>";
            }
            $output.="</tbody>
            </table>";
            echo $output;
        }
    }
    public function test_filter_assign_table()
    {
        $sm_code=$this->input->post('sm_code');
        $rsm_code=$this->input->post('rsm_code');
        $dsm_code=$this->input->post('dsm_code');
        $output = '';
        $user_type = $this->session->userdata('user_type');
        $employee_id = $this->session->userdata('employee_id');
        $pexams = $this->test_model->pso_exam_list_filtering($sm_code,$rsm_code,$dsm_code);
        if ($pexams > 0) {
            $output .= "<table id=\"example\" class=\"table result\">
                        <thead class=\"big_spacer\">
                           <tr>
                            <th>SM Code</th>
                            <th>RSM Code</th>
                            <th>DSM Code</th>
                            <th>PSO Code</th>
                            <th>Employee Id</th>
                            <th>PSO's Name</th>
                            <th>Total Test</th>
                            <th>Points</th>
                            <th>Accuracy</th>
                            <th>Action</th>
                            </tr>
                        </thead>";
            foreach ($pexams as $pexam)
            {
                $output.="<tr class=\"color_wrapper small_spacer\">
                        <!-- ////////////////////////////////////////modal section//////////////////////////////////////// -->
                        <td>$pexam[sm_code]</td>
                        <td>$pexam[rsm_code]</td>
                        <td>$pexam[dsm_code]</td>
                        <td>$pexam[renata_id]</td>
                        <td>$pexam[pso_id]</td>
                        <td>$pexam[pso_name]</td>
                        <td>$pexam[total_test]</td>
                        <td>$pexam[total_marks]</td>
                        <td>$pexam[per]%</td>
                        
                        <td>

                            <button
                                onclick=\"location.href = 'view_pso_result?pso_id=$pexam[pso_id]';\"
                                type=\"button\" class=\"btn btn-info btn-lg modal_btn\"><i
                                    class=\"fa fa-chevron-circle-right fa-lg\" aria-hidden=\"true\"></i></button>
                            <span class=\"table_insider\"> | </span>
                            <a onclick=\"return delete_pso_exams()\"
                               href=\"base_url()test/delete_pso_tests?pso_id=$pexam[pso_id]\"><i
                                    class=\"fa fa-trash fa-lg\" aria-hidden=\"true\"></i></a>
                        </td>

                    </tr>";
            }
            $output.="</tbody>
            </table>";
            echo $output;
        }
    }


}