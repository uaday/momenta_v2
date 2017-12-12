<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Data_table extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
//        $this->load->view('extra_view');
    }

    public function test_assign_table()
    {
        $output = '';
        $user_type = $this->session->userdata('user_type');
        $employee_id = $this->session->userdata('employee_id');
        $pexams = $this->test_model->pso_exam_list($user_type, $employee_id);
        if ($pexams > 0) {
                $output.="<div class=\"table-responsive\">
                <script type=\"text/javascript\">
                        $(\"#example-1\").dataTable({
                            aLengthMenu: [
                                [10, 25, 50, 100, -1], [10, 25, 50, 100, \"All\"]
                            ]
                        });
                </script>";
                $output .= "<table id=\"example-1\" class=\"table table-striped  table-responsive\" cellspacing=\"0\"
                       width=\"100%\">
                    <thead style=\"background-color: #2c2e2f;color: white\">
                           <tr>
                            <th style=\"color: white; vertical-align: text-top;text-align: left\">Bcode</th>
                            <th style=\"color: white; vertical-align: text-top;text-align: left\">SM Code</th>
                            <th style=\"color: white; vertical-align: text-top;text-align: left\">RSM Code</th>
                            <th style=\"color: white; vertical-align: text-top;text-align: left\">DSM Code</th>
                            <th style=\"color: white; vertical-align: text-top;text-align: left\">PSO Code</th>
                            <th style=\"color: white; vertical-align: text-top;text-align: left\">Employee Id</th>
                            <th style=\"color: white; vertical-align: text-top;text-align: left\">PSO's Name</th>
                            <th style=\"color: white; vertical-align: text-top;text-align: left\">Appeared/Assigned Test</th>
                            <th style=\"color: white; vertical-align: text-top;text-align: left\">Achieved Points</th>
                            <th style=\"color: white; vertical-align: text-top;text-align: left\">Percentage</th>
                            <th style=\"color: white; vertical-align: text-top;text-align: left\">Action</th>
                            </tr>
                        </thead>";
                foreach ($pexams as $pexam)
                {
                    $output.="<tr class=\"color_wrapper small_spacer\">
                        <!-- ////////////////////////////////////////modal section//////////////////////////////////////// -->
                        <td>$pexam[business_code]</td>
                        <td>$pexam[sm_code]</td>
                        <td>$pexam[rsm_code]</td>
                        <td>$pexam[dsm_code]</td>
                        <td>$pexam[renata_id]</td>
                        <td>$pexam[pso_id]</td>
                        <td>$pexam[pso_name]</td>
                        <td>$pexam[attend]/$pexam[total_test]</td>
                        <td>$pexam[pso_total_marks]/$pexam[total_marks]</td>";
                        if($pexam['total_marks']<='0')
                        {
                            $percentage=0;
                        }
                        else
                        {
                            $percentage=round($pexam['pso_total_marks']/$pexam['total_marks']*100);
                        }
                        if($percentage>=50)
                        {
                             $output.="<td><label class='text-success'>$percentage%</label></td>";
                        }else
                        {
                            $output.=" <td><label class='text-danger'>$percentage%</label></td>";
                        }
                        $output.="<td>

                            <a href=\"view_pso_result?pso_id=$pexam[pso_id]\"><i
                                    class=\"fa fa-2x fa-chevron-circle-right fa-lg\" aria-hidden=\"true\"></i></a>
                           
                        </td>

                    </tr>";
                }
                $output.="</tbody>
                </table>
            </div>";
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
            $output.="<div class=\"table-responsive\">
                <script type=\"text/javascript\">
                        $(\"#example-2\").dataTable({
                            aLengthMenu: [
                                [10, 25, 50, 100, -1], [10, 25, 50, 100, \"All\"]
                            ]
                        });
                </script>";
            $output .= "<table id=\"example-2\" class=\"table table-striped  table-responsive\" cellspacing=\"0\"
                       width=\"100%\">
                    <thead style=\"background-color: #2c2e2f;color: white\">
                           <tr>
                            <th style=\"color: white; vertical-align: text-top;text-align: left\">Bcode</th>
                            <th style=\"color: white; vertical-align: text-top;text-align: left\">SM Code</th>
                            <th style=\"color: white; vertical-align: text-top;text-align: left\">RSM Code</th>
                            <th style=\"color: white; vertical-align: text-top;text-align: left\">DSM Code</th>
                            <th style=\"color: white; vertical-align: text-top;text-align: left\">PSO Code</th>
                            <th style=\"color: white; vertical-align: text-top;text-align: left\">Employee Id</th>
                            <th style=\"color: white; vertical-align: text-top;text-align: left\">PSO's Name</th>
                            <th style=\"color: white; vertical-align: text-top;text-align: left\">Appeared/Assigned Test</th>
                            <th style=\"color: white; vertical-align: text-top;text-align: left\">Achieved Points</th>
                            <th style=\"color: white; vertical-align: text-top;text-align: left\">Percentage</th>
                            <th style=\"color: white; vertical-align: text-top;text-align: left\">Action</th>
                            </tr>
                        </thead>";
            foreach ($pexams as $pexam)
            {
                $output.="<tr class=\"color_wrapper small_spacer\">
                        <!-- ////////////////////////////////////////modal section//////////////////////////////////////// -->
                        <td>$pexam[business_code]</td>
                        <td>$pexam[sm_code]</td>
                        <td>$pexam[rsm_code]</td>
                        <td>$pexam[dsm_code]</td>
                        <td>$pexam[renata_id]</td>
                        <td>$pexam[pso_id]</td>
                        <td>$pexam[pso_name]</td>
                        <td>$pexam[attend]/$pexam[total_test]</td>
                        <td>$pexam[pso_total_marks]/$pexam[total_marks]</td>";
                if($pexam['total_marks']<='0')
                {
                    $percentage=0;
                }
                else
                {
                    $percentage=round($pexam['pso_total_marks']/$pexam['total_marks']*100);
                }
                if($percentage>=50)
                {
                    $output.="<td><label class='text-success'>$percentage%</label></td>";
                }else
                {
                    $output.=" <td><label class='text-danger'>$percentage%</label></td>";
                }
                $output.="<td>

                            <a href=\"view_pso_result?pso_id=$pexam[pso_id]\"><i
                                    class=\"fa fa-2x fa-chevron-circle-right fa-lg\" aria-hidden=\"true\"></i></a>
                        </td>
                    </tr>";
            }
            $output.="</tbody>
                </table>
            </div>";
            echo $output;
        }
    }

}