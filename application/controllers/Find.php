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

//    public function find_region()
//    {
//        $dis_id=$this->input->POST('district_id');
//        $result=$this->pso_model->get_region($dis_id);
//        $output="<option value='-1' >Select Region</option>";
//        foreach ($result as $row)
//        {
//            $output.="<option value='$row[region_id]' >$row[region_name]</option>";
//        }
//        echo $output;
//    }
    public function find_region_psos()
    {
        $region=implode(',',$this->input->POST('region'));
        $result=$this->pso_model->get_region_psos($region);
        $output='';
        foreach ($result as $row)
        {
            $output.="<option value='$row[pso_id]'>$row[pso_name]</option>";
        }
        echo $output;
    }
    public function open_pso_type()
    {
        $result=$this->pso_model->get_pso_type();
        $output='';
        foreach ($result as $row)
        {
            $output.="<option value='$row[pso_user_type_id]'>$row[pso_user_type_name]</option>";
        }
        echo $output;
    }
    public function open_region_for_business()
    {
        $result=$this->test_model->get_region_by_business($this->input->post('business_code'));
        $output='';
        foreach ($result as $row)
        {
            $output.="<option value='$row[rsm_code]'>$row[region]($row[rsm_code])</option>";
        }
        echo $output;
    }
    public function find_pso_by_types()
    {
        $region=implode(',',$this->input->POST('region'));
        $pso_type=implode(',',$this->input->POST('pso_type'));
        $result=$this->pso_model->get_pso_by_types_region($region,$pso_type);
        $output='';
        foreach ($result as $row)
        {
            $output.="<option value='$row[pso_id]'>$row[pso_name] ($row[renata_id])</option>";
        }
        echo $output;
    }

    public function find_gen()
    {
        $business_code=$this->input->POST('business_code');
        $result=$this->medicine_literature_model->get_gen_by_business_code($business_code);
        echo "<script type=\"text/javascript\">
											$(\"#generic_name1\").select2({
												placeholder: 'Select Generic Name...',
												allowClear: true
											}).on('select2-open', function()
											{
												// Adding Custom Scrollbar
												$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
											});
										
									</script>";
        echo "<select class='form-control generic_name1' name=\"gen_id\" id='generic_name1' onchange=\"drug_list(this.value, 'drug');\">";
        echo "<option value='-1'>Select Generic Name</option>";
        if($result)
        {

            foreach ($result as $row)
            {
                echo "<option value='$row[gen_id]'>$row[gen_name]</option>";
            }
        }
        echo "</select>";
    }
    public function find_region()
    {
        $business_code=$this->input->POST('business_code');
        $result=$this->user_model->find_region_by_business_code($business_code);
        echo "<script type=\"text/javascript\">
                                
                                    $(\"#region\").select2({
                                        placeholder: 'Select your Region...',
                                        allowClear: true
                                    }).on('select2-open', function () {
                                        // Adding Custom Scrollbar
                                        $(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
                                    });
                            </script>";
        echo "<select class=\"form-control region\" id=\"region\" name=\"region\">";
        echo "<option value='-1'>Select Region Name</option>";
        if($result)
        {

            foreach ($result as $row)
            {
                echo "<option value='$row[rsm_code]'>$row[region]</option>";
            }
        }
        echo "</select>";
    }
    public function find_gen_for_add_drug()
    {
        $business_code=$this->input->POST('business_code');
        $result=$this->medicine_literature_model->get_gen_by_business_code($business_code);
        echo "<script type=\"text/javascript\">
											$(\"#generic_name1\").select2({
												placeholder: 'Select Generic Name...',
												allowClear: true
											}).on('select2-open', function()
											{
												// Adding Custom Scrollbar
												$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
											});
										
									</script>";
        echo "<select class='form-control generic_name1' name=\"gen_id\" id='generic_name1' >";
//        echo "<option value='-1'>Select Generic Name</option>";
        if($result)
        {

            foreach ($result as $row)
            {
                echo "<option  value='$row[gen_id]'>$row[gen_name]</option>";
            }
        }
        echo "</select>";
    }
    public function find_gen_for_update_drug()
    {
        $business_code=$this->input->POST('business_code');
        $gen_id=$this->input->POST('gen_id');
        $result=$this->medicine_literature_model->get_gen_by_business_code($business_code);
        if($result)
        {
            foreach ($result as $row)
            {
                if ($gen_id==$row['gen_id'])
                    echo "<option selected='selected' value='$row[gen_id]'>$row[gen_name]</option>";
                else
                    echo "<option  value='$row[gen_id]'>$row[gen_name]</option>";
            }
        }
    }
    public function find_genn()
    {
        $business_code=$this->input->POST('business_code');
        $result=$this->medicine_literature_model->get_gen_by_business_code($business_code);
        echo "<script type=\"text/javascript\">
											$(\"#generic_name11\").select2({
												placeholder: 'Select Generic Name...',
												allowClear: true
											}).on('select2-open', function()
											{
												// Adding Custom Scrollbar
												$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
											});
										
									</script>";
        echo "<select class='form-control generic_name11' name=\"gen_id\" id='generic_name11' onchange=\"drug_list1(this.value, 'drug');\">";
        echo "<option value='-1'>Select Generic Name</option>";
        if($result)
        {

            foreach ($result as $row)
            {
                echo "<option value='$row[gen_id]'>$row[gen_name]</option>";
            }
        }
        echo "</select>";
    }
    public function find_doctor()
    {
        $business_code=$this->input->POST('business_code');
        $result=$this->medicine_literature_model->get_doctor_type_by_business_code($business_code);
        echo "<script type=\"text/javascript\">
											$(\"#doc_type\").select2({
												placeholder: 'Select Doctor Type...',
												allowClear: true
											}).on('select2-open', function()
											{
												// Adding Custom Scrollbar
												$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
											});
										
									</script>";
        echo "<select class='form-control doc_type' name=\"doc_type\" id='doc_type' onchange=\"version_find(this.value,'version');\">";
        echo "<option value='-1'>Select Doctor Type</option>";
        if($result)
        {

            foreach ($result as $row)
            {
                echo "<option value='$row[doc_type_id]'>$row[type_name]</option>";
            }
        }
        echo "</select>";
    }
    public function find_drugs()
    {
        $gen_id=$this->input->POST('gen_id');
        $result=$this->medicine_literature_model->get_drug_by_gen_id($gen_id);
        echo "<script type=\"text/javascript\">
											$(\"#drug1\").select2({
												placeholder: 'Select Drug Name...',
												allowClear: true
											}).on('select2-open', function()
											{
												// Adding Custom Scrollbar
												$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
											});
										
									</script>";
        echo "<select class=\"form-control drug1\" id=\"drug1\" name=\"drug_id\" onchange=\"drug_no(this.value);\">";
        echo "<option value='-1'>Select Drug Name</option>";
        foreach ($result as $row)
        {
            echo "<option value='$row[drug_id]'>$row[drug_name]</option>";
        }
    }
    public function file_type()
    {
        echo "<script type=\"text/javascript\">
                                jQuery(document).ready(function($)
                                {
                                    $(\"#type\").selectBoxIt().on('open', function()
                                    {
                                        // Adding Custom Scrollbar
                                        $(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
                                    });
                                });
                            </script>

                            <select class=\"form-control type\" name=\"upload_file_type\" id=\"type\" onchange=\"drug_des(this.value, 'typee');\">
                                <option value=\"-1\">Select Upload Type</option>
                                <option value=\"1\">Full Book</option>
                                <option value=\"2\">Feature & Benefit</option>
                                <option value=\"3\">Drug Image</option>

                            </select>";
    }
    public function find_drugss()
    {
        $gen_id=$this->input->POST('gen_id');
        $result=$this->medicine_literature_model->get_drug_by_gen_id($gen_id);
        echo "<script type=\"text/javascript\">
											$(\"#drug11\").select2({
												placeholder: 'Select Drug Name...',
												allowClear: true
											}).on('select2-open', function()
											{
												// Adding Custom Scrollbar
												$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
											});
										
									</script>";
        echo "<select class=\"form-control drug11\" id=\"drug11\" name=\"drug_id\" onchange=\"drug_no1(this.value);\">";
        echo "<option value='-1'>Select Drug Name</option>";
        foreach ($result as $row)
        {
            echo "<option value='$row[drug_id]'>$row[drug_name]</option>";
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

                    $name=str_replace(base_url()."upload/pdf_files/","" ,$row['benefits_feature'] );
                    echo "<a target='_blank' class='btn btn-primary center-block popover-primary' data-toggle='popover' data-trigger='hover' data-placement='top' data-content='For Preview This Press This!' data-original-title='Press it'  href='https://docs.google.com/viewerng/viewer?url=$row[benefits_feature]'>$name</a>";
                }
                else if(isset($row['drug_full_book']))
                {
                    $name=str_replace(base_url()."upload/pdf_files/","" ,$row['drug_full_book'] );
                    echo "<a target='_blank' class='btn btn-primary center-block popover-primary' data-toggle='popover' data-trigger='hover' data-placement='top' data-content='For Preview This Press This' data-original-title='Press it'  href='https://docs.google.com/viewerng/viewer?url=$row[drug_full_book]'>$name</a>";
                }
                else if(isset($row['drug_image']))
                {
                    $name=str_replace(base_url()."upload/drug_image/","" ,$row['drug_image'] );
                    echo "<a target='_blank' class='btn btn-primary center-block popover-primary' data-toggle='popover' data-trigger='hover' data-placement='top' data-content='For Preview This Press This' data-original-title='Press it'  href='$row[drug_image]'>$name</a>";
                }
            }
        }
    }

    public function find_version()
    {
        $doc_type=$this->input->post('doc_type');
        $drug_id=$this->input->post('drug_id');
        $result=$this->medicine_literature_model->get_version_by_doc_type($doc_type,$drug_id);

        echo "<script type=\"text/javascript\">
											$(\"#version1\").select2({
												placeholder: 'Select Drug Name...',
												allowClear: true
											}).on('select2-open', function()
											{
												// Adding Custom Scrollbar
												$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
											});
										
									</script>";
        echo "<select class=\"form-control version1\" id=\"version1\" name='version_id' onchange=\"fill_data(this.value)\">";
        echo "<option value='-1'>Select Version</option>";
        echo "<option value='0'><span class='fa fa-plus'> New Version</span></option>";
        foreach ($result as $row)
        {
            echo "<option value='$row[detail_version_id]'>Version $row[version_id] [ $row[create_date] ]</option>";
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
        $a=$this->test_model->pso_exam_attend_by_exam_id($exam_id,$user_type,$employee_id);
        $b=$this->test_model->pso_exam_not_attend_by_exam_id($exam_id,$user_type,$employee_id);
        $c=$this->test_model->pso_total_pass_by_exam_id($exam_id,$user_type,$employee_id);
        $d=$this->test_model->pso_total_fail_by_exam_id($exam_id,$user_type,$employee_id);

        $ab=$a+$b;
        $cd=$c+$d;
        if($ab<1)
        {
            $result_attend=0;
            $result_nattend=0;
        }
        else
        {
            $result_attend=round(($a['0']['tattend']/($a['0']['tattend']+$b['0']['tnattend']))*100);
            $result_nattend=round(($b['0']['tnattend']/($a['0']['tattend']+$b['0']['tnattend']))*100);
        }
        if($cd<1)
        {
            $result_pass=0;
            $result_fail=0;
        }
        else
        {
            $result_pass=round(($c['0']['tpass']/($c['0']['tpass']+$d['0']['tfail']))*100);
            $result_fail=round(($d['0']['tfail']/($c['0']['tpass']+$d['0']['tfail']))*100);
        }

        $arr=array(array("tattend"=>$result_attend,"tnattend"=>$result_nattend,"tpass"=>$result_pass,"tfail"=>$result_fail));
        echo json_encode($arr);
    }



}