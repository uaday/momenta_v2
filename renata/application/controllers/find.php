<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Find extends CI_Controller
{

    public function find_district()
    {
        $div_id=$this->input->POST('division_id');
        $result=$this->pso_model->get_district($div_id);
        $output="";
        $output.="<option value='-1' >Select District</option>";
        foreach ($result as $row)
        {
            $output.="<option value='$row[district_id]' >$row[district_name]</option>";
        }
        echo $output;
    }
    public function find_region()
    {
        $dis_id=$this->input->POST('district_id');
        $result=$this->pso_model->get_region($dis_id);
        $output="<option value='-1' >Select Region</option>";
        foreach ($result as $row)
        {
            $output.="<option value='$row[region_id]' >$row[region_name]</option>";
        }
        echo $output;
    }
    public function find_drugs()
    {
        $gen_id=$this->input->POST('gen_id');
        $result=$this->medicine_literature_model->get_drug_by_gen_id($gen_id);
        echo "<option value='-1'>Select Drug</option>";
        foreach ($result as $row)
        {
            echo "<option value='$row[drug_id]' >$row[drug_name]</option>";
        }
    }
    public function find_file()
    {
        $type=$this->input->POST('type');
        $drug_id=$this->input->post('drug_id');
        $result=$this->medicine_literature_model->get_file_by_type($type,$drug_id);
        if($result)
        {
            foreach ($result as $row)
            {
                if(isset($row['benefits_feature']))
                {
                    echo str_replace(base_url()."upload/pdf_files/","" ,$row['benefits_feature'] );
                }
                else if(isset($row['drug_full_book']))
                {
                    echo str_replace(base_url()."upload/pdf_files/","" ,$row['drug_full_book'] );
                }
                else if(isset($row['drug_image']))
                {
                    echo str_replace(base_url()."upload/drug_image/","" ,$row['drug_image'] );
                }
            }
        }
    }

    public function find_version()
    {
        $doc_type=$this->input->post('doc_type');
        $drug_id=$this->input->post('drug_id');
        $result=$this->medicine_literature_model->get_version_by_doc_type($doc_type,$drug_id);
        echo "<option value='-1'>Select Version</option>";
        echo "<option value='0'>New Version</option>";
        if($result)
        {
            foreach ($result as $row)
            {
                echo "<option value='$row[detail_version_id]'>Version $row[version_id] [ $row[create_date] ]</option>";
            }
        }
    }
    public function find_version_data()
    {
        $version_id=$this->input->post('version_id');
        $result=$this->medicine_literature_model->get_version_data($version_id);
        if($result)
        {
            echo json_encode($result);
        }
    }


    public function add_new_version()
    {
        $doc_type=$this->input->post('doc_type');
        $drug_id=$this->input->post('drug_id');
        $result=$this->medicine_literature_model->get_new_version_id($doc_type,$drug_id);
        if($result)
        {
            echo json_encode($result);
//            echo $result['0']['detail_version_id'];
        }
    }

    public function find_exam_data()
    {
        $user_type=$this->session->userdata('user_type');
        $employee_id=$this->session->userdata('employee_id');
        $exam_id=$this->input->post('exam_id');
        $result_attend=$this->test_model->pso_exam_attend_by_exam_id($exam_id,$user_type,$employee_id);
        $result_nattend=$this->test_model->pso_exam_not_attend_by_exam_id($exam_id,$user_type,$employee_id);
        $result_pass=$this->test_model->pso_total_pass_by_exam_id($exam_id,$user_type,$employee_id);
        $result_fail=$this->test_model->pso_total_fail_by_exam_id($exam_id,$user_type,$employee_id);

        $arr=array(array("tattend"=>$result_attend['0']['tattend'],"tnattend"=>$result_nattend['0']['tnattend'],"tpass"=>$result_pass['0']['tpass'],"tfail"=>$result_fail['0']['tfail']));
        echo json_encode($arr);
    }
}