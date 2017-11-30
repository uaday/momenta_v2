<?php
/**
 * Created by PhpStorm.
 * User: Sudipta
 * Date: 9/29/2017
 * Time: 4:28 AM
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Appinion BD Limited" />
    <meta name="author" content="Sudipta Ghosh" />

    <link rel="icon" href="<?php echo base_url() ?>/assets/images/icon/momenta_logo.png" type="image/x-icon">

    <title>Momenta</title>

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/fonts/linecons/css/linecons.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/xenon-core.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/xenon-forms.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/xenon-components.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/xenon-skins.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/custom.css">

    <script src="<?php echo base_url()?>assets/js/jquery-1.11.1.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body class="page-body">

<div class="settings-pane">

    <a href="#" data-toggle="settings-pane" data-animate="true">
        &times;
    </a>

    <div class="settings-pane-inner">

        <div class="row">

            <div class="col-md-4">

                <div class="user-info">

                    <div class="user-image">
                        <a href="#">
                            <img src="<?php echo base_url()?>assets/images/user-4.png" class="img-responsive img-circle" />
                        </a>
                    </div>

                    <div class="user-details">

                        <h3>
                            <a href="#"><?php echo $this->session->userdata('name')?></a>

                            <!-- Available statuses: is-online, is-idle, is-busy and is-offline -->
                            <span class="user-status is-online"></span>
                        </h3>

                        <p class="user-title">Web Developer</p>

                        <div class="user-links">
<!--                            <a href="extra-profile.html" class="btn btn-primary">Edit Profile</a>-->
                            <a href="<?php echo base_url()?>change_password" class="btn btn-success">Change Password</a>
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-8 link-blocks-env">


                <div class="links-block left-sep">
                    <h4>
                        <a href="#">
                            <span>Help Desk</span>
                        </a>
                    </h4>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#">
                                <i class="fa-angle-right"></i>
                                System User Guide
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa-angle-right"></i>
                                Admin Contact
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa-angle-right"></i>
                                Problem Request
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa-angle-right"></i>
                                Terms of Service
                            </a>
                        </li>
                    </ul>
                </div>

            </div>

        </div>

    </div>

</div>

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

    <!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
    <!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
    <!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
    <div class="sidebar-menu toggle-others fixed">

        <div class="sidebar-menu-inner">

            <header class="logo-env">

                <!-- logo -->
                <div class="logo">
                    <a href="<?php echo base_url()?>home" class="logo-expanded">
                        <img src="<?php echo base_url()?>assets/images/icon/1.png" style="margin-top: -10px;margin-bottom: -15px" width="122px" height="35px" alt="" />
                    </a>

                    <a href="<?php echo base_url()?>home" class="logo-collapsed">
                        <img src="<?php echo base_url()?>assets/images/icon/2.png" width="40px" alt="" />
                    </a>
                </div>

                <!-- This will toggle the mobile menu and will be visible only on mobile devices -->
                <div class="mobile-menu-toggle visible-xs">
                    <a href="<?php echo base_url() ?>login/logout" >
                        <i class="fa-lock"></i>
                    </a>

                    <a href="#" data-toggle="mobile-menu">
                        <i class="fa-bars"></i>
                    </a>
                </div>

                <!-- This will open the popup with user profile settings, you can use for any purpose, just be creative -->
                <div class="settings-icon">
                    <a href="#" data-toggle="settings-pane" data-animate="true">
                        <i class="linecons-cog"></i>
                    </a>
                </div>


            </header>



            <ul id="main-menu" class="main-menu">
                <!-- add class "multiple-expanded" to allow multiple submenus to open -->
                <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
                <li class="<?php if($this->session->userdata('main_menu')=='home'&& $this->session->userdata('sub_menu')=='home') echo "active opened active"?>">
                    <a href="<?php echo base_url()?>home">
                        <i class="fa fa-home fa-2x"></i>
                        <span class="title">Home</span>
                    </a>
                </li>
                <li class="<?php if($this->session->userdata('main_menu')=='medicine_literature') echo "active opened "?>">
                    <a href="#">
                        <i class="fa fa-book fa-2x"></i>
                        <span class="title">Medicine Literature</span>
                    </a>
                    <ul>
                        <li  class="<?php if($this->session->userdata('sub_menu')=='medicine_literature_update') echo "active "?>">
                            <a href="<?php echo base_url()?>medicine_literature/update_medicine_literature">
                                <span class="title">Update Medicine Literature</span>
                            </a>
                        </li>
                        <li class="<?php if($this->session->userdata('sub_menu')=='view_all_medicine_literature') echo "active "?>">
                            <a href="<?php echo base_url()?>medicine_literature/view_all_medicine_literature">
                                <span class="title">View Medicine Literature</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php if($this->session->userdata('main_menu')=='test') echo "active opened "?>">
                    <a href="#">
                        <i class="fa fa-graduation-cap"></i>
                        <span class="title">Testing Center</span>
                    </a>
                    <ul>
                        <li class="<?php if($this->session->userdata('sub_menu')=='create_test') echo "active "?>">
                            <a href="<?php echo base_url()?>test/create_test">
                                <span class="title">Create Test</span>
                            </a>
                        </li>
                        <li class="<?php if($this->session->userdata('sub_menu')=='manage_test') echo "active "?>">
                            <a href="<?php echo base_url()?>test/manage_test">
                                <span class="title">Manage Test</span>
                            </a>
                        </li>
                        <li class="<?php if($this->session->userdata('sub_menu')=='result') echo "active "?>">
                            <a href="<?php echo base_url()?>test/result">
                                <span class="title">Result</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li  class="<?php if($this->session->userdata('main_menu')=='renata_shop') echo "active opened "?>">
                    <a href="#">
                        <i class="fa fa-gift fa-2x"></i>
                        <span class="title">Renata Shop</span>
                    </a>
                    <ul>
                        <li class="<?php if($this->session->userdata('sub_menu')=='create_incentive') echo "active "?>">
                            <a href="<?= base_url()?>renata_shop/create_incentive">
                                <span class="title">Create Incentive</span>
                            </a>
                        </li>
                        <li class="<?php if($this->session->userdata('sub_menu')=='manage_incentive') echo "active "?>">
                            <a href="<?php echo base_url()?>renata_shop/manage_incentive">
                                <span class="title">Manage Incentive</span>
                            </a>
                        </li>
                        <li class="<?php if($this->session->userdata('sub_menu')=='track_incentive') echo "active "?>">
                            <a href="<?= base_url()?>renata_shop/track_incentive">
                                <span class="title">Track Incentive</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php if($this->session->userdata('main_menu')=='pso') echo "active opened "?>">
                    <a href="#">
                        <i class="fa fa-group fa-2x"></i>
                        <span class="title">PSO</span>
                    </a>
                    <ul>
                        <li class="<?php if($this->session->userdata('sub_menu')=='add_pso') echo "active"?>">
                            <a href="<?= base_url()?>pso/add_pso">
                                <span class="title">Add PSO</span>
                            </a>
                        </li>
                        <li class="<?php if($this->session->userdata('sub_menu')=='manage_pso') echo "active"?>">
                            <a href="<?= base_url()?>pso/manage_pso">
                                <span class="title">Manage PSO</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php if($this->session->userdata('main_menu')=='user') echo "active opened "?>">
                    <a href="#">
                        <i class="fa fa-user fa-2x"></i>
                        <span class="title">USER</span>
                    </a>
                    <ul>
                        <li class="<?php if($this->session->userdata('sub_menu')=='create_user') echo "active"?>">
                            <a href="<?= base_url()?>user/add_user">
                                <span class="title">Add USER</span>
                            </a>
                        </li>
                        <li class="<?php if($this->session->userdata('sub_menu')=='manage_user') echo "active"?>">
                            <a href="<?= base_url()?>user/manage_user">
                                <span class="title">Manage USER</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php if($this->session->userdata('main_menu')=='medicine_info') echo "active opened "?>">
                    <a href="#">
                        <i class="fa fa-flask fa-2x"></i>
                        <span class="title">Medicine Info</span>
                    </a>
                    <ul>
                        <li  class="<?php if($this->session->userdata('sub_menu')=='generic_name') echo "active "?>">
                            <a href="<?= base_url()?>med_info/generic_name">
                                <span class="title">Generic Name</span>
                            </a>
                        </li>
                        <li  class="<?php if($this->session->userdata('sub_menu')=='drug_name') echo "active "?>">
                            <a href="<?= base_url()?>med_info/drug_name">
                                <span class="title">Drug Name</span>
                            </a>
                        </li>
                        <li  class="<?php if($this->session->userdata('sub_menu')=='doctor_type') echo "active "?>">
                            <a href="<?= base_url()?>med_info/doc_type">
                                <span class="title">Doctor Type</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="<?php if($this->session->userdata('main_menu')=='bulk_data') echo "active opened "?>">
                    <a href="#">
                        <i class="fa fa-database fa-2x"></i>
                        <span class="title">Bulk Data</span>
                    </a>
                    <ul>
                        <li class="<?php if($this->session->userdata('sub_menu')=='pso_bulk') echo "active "?>">
                            <a href="<?php echo base_url() ?>bulk_data/pso_bulk">
                                <span class="title">PSO Bulk</span>
                            </a>
                        </li>
                        <li class="<?php if($this->session->userdata('sub_menu')=='user_bulk') echo "active "?>">
                            <a href="<?= base_url()?>bulk_data/user_bulk">
                                <span class="title">USER Bulk</span>
                            </a>
                        </li>
                        <li class="<?php if($this->session->userdata('sub_menu')=='sms_bulk') echo "active "?>">
                            <a href="<?= base_url()?>bulk_data/pso_sms_bulk">
                                <span class="title">SMS Bulk</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>

    </div>
    
    <?php if(isset($main_content)){
        
        echo $main_content;
    }?>



</div>



<div class="page-loading-overlay">
    <div class="loader-2"></div>
</div>




<!-- Bottom Scripts -->
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/js/TweenMax.min.js"></script>
<script src="<?php echo base_url()?>assets/js/resizeable.js"></script>
<script src="<?php echo base_url()?>assets/js/joinable.js"></script>
<script src="<?php echo base_url()?>assets/js/xenon-api.js"></script>
<script src="<?php echo base_url()?>assets/js/xenon-toggles.js"></script>
<script src="<?php echo base_url()?>assets/js/datatables/js/jquery.dataTables.min.js"></script>


<!-- Imported scripts on this page -->
<script src="<?php echo base_url()?>assets/js/xenon-widgets.js"></script>
<script src="<?php echo base_url()?>assets/js/devexpress-web-14.1/js/globalize.min.js"></script>
<script src="<?php echo base_url()?>assets/js/devexpress-web-14.1/js/dx.chartjs.js"></script>
<script src="<?php echo base_url()?>assets/js/toastr/toastr.min.js"></script>


<!-- JavaScripts initializations and stuff -->
<script src="<?php echo base_url()?>assets/js/xenon-custom.js"></script>



<!-- Imported styles on this page -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/js/daterangepicker/daterangepicker-bs3.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/js/select2/select2.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/js/select2/select2-bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/js/multiselect/css/multi-select.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/js/datatables/dataTables.bootstrap.css">
<!--<link href="--><?php //echo base_url()?><!--assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">-->

<!-- Bottom Scripts -->
<script src="<?php echo base_url()?>assets/js/moment.min.js"></script>


<!-- Imported scripts on this page -->
<script src="<?php echo base_url()?>assets/js/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url()?>assets/js/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url()?>assets/js/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url()?>assets/js/colorpicker/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo base_url()?>assets/js/select2/select2.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url()?>assets/js/selectboxit/jquery.selectBoxIt.min.js"></script>
<script src="<?php echo base_url()?>assets/js/tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="<?php echo base_url()?>assets/js/typeahead.bundle.js"></script>
<script src="<?php echo base_url()?>assets/js/handlebars.min.js"></script>
<script src="<?php echo base_url()?>assets/js/multiselect/js/jquery.multi-select.js"></script>


<script src="<?php echo base_url()?>assets/js/jquery-validate/jquery.validate.min.js"></script>
<script src="<?php echo base_url()?>assets/js/inputmask/jquery.inputmask.bundle.js"></script>
<script src="<?php echo base_url()?>assets/js/formwizard/jquery.bootstrap.wizard.min.js"></script>

<script src="<?php echo base_url()?>assets/js/datatables/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url()?>assets/js/datatables/yadcf/jquery.dataTables.yadcf.js"></script>
<script src="<?php echo base_url()?>assets/js/datatables/tabletools/dataTables.tableTools.min.js"></script>
<script src="<?php echo base_url()?>assets/js/rwd-table/js/rwd-table.min.js"></script>


<!-- JavaScripts plugins -->
<script src="<?php echo base_url()?>assets/js/tables/jquery-datatable.js"></script>


<script src="<?php echo base_url()?>assets/js/exam_result_data/data.js"></script>







<!-- JavaScripts initializations and stuff -->
<script src="<?php echo base_url()?>assets/js/xenon-custom.js"></script>
<!--<script src="--><?php //echo base_url()?><!--assets/js/myCustom.js"></script>-->

</body>
</html>


<script !src="">
    var i = 0;
    var test_id;
    var o_p=0,r_p=0;


    //    setInterval("refresh_home();",5000);
    //
    //    function refresh_home() {
    //        $(".clit").load("<?php //echo base_url()?>//home/total_drug");
    //        $(".cpsos").load("<?php //echo base_url()?>//home/total_pso");
    //        $(".ctest").load("<?php //echo base_url()?>//home/total_exam");
    //        $(".coffer").load("<?php //echo base_url()?>//home/total_incentives");
    //    }
    //
    //    function delete_pso_exams() {
    //        var check = confirm('Are You Sure To Delete Pso all Exam ??');
    //        if (check) {
    //            return true;
    //        }
    //        else {
    //            return false;
    //        }
    //    }

    function delete_gen() {
        var check = confirm('Are You Sure To Delete This Generic Name?\nIf you Delete then all information regarding this generic name will Delete');
        if (check) {
            return true;
        }
        else {
            return false;
        }
    }
    function delete_exam() {
        var check = confirm('Are You Sure To Delete This Exam\nIf you delete this PSO exam will delete ??');
        if (check) {
            return true;
        }
        else {
            return false;
        }
    }

    function publish_exam() {
        var check = confirm('Are You Sure To Publish The Exam ??');
        if (check) {
            return true;
        }
        else {
            return false;
        }
    }
    function unpublish_exam() {
        var check = confirm('Are You Sure To Unpublish The Exam ??');
        if (check) {
            return true;
        }
        else {
            return false;
        }
    }


    function delete_incentive() {
        var check = confirm('Are You Sure To Delete This Incentives?\nIf you delete this then this incentives transaction will delete');
        if (check) {
            return true;
        }
        else {
            return false;
        }
    }

    function district(division_id) {
        $.ajax(
            {
                type: 'POST',
                data: {division_id: division_id},
                url: "<?php echo site_url('find/find_district')?>",
                success: function (result) {
                    $('.district').html(result);
                },
                error: function (result) {
                    alert('POST failed.');
                }
            }
        )
    }
    function region(district_id) {
        $.ajax(
            {
                type: 'POST',
                data: {district_id: district_id},
                url: "<?php echo site_url('find/find_region')?>",
                success: function (result) {
                    $('.region').html(result);
                },
                error: function (result) {
                    alert('POST failed.');
                }
            }
        )
    }
    function update_password() {
        var check = confirm('Are you sure to update the password?');
        if (check) {
            return true;
        }
        else {
            return false;
        }
    }
    function delete_account() {
        var check = confirm('Are You Sure To Delete Pso Account!!!');
        if (check) {
            return true;
        }
        else {
            return false;
        }
    }
    function delete_med() {
        var check = confirm('Are You Sure To Delete This!!!');
        if (check) {
            return true;
        }
        else {
            return false;
        }
    }
    function delete_version() {
        var check = confirm('Are You Sure To Delete This Version!!!');
        if (check) {
            return true;
        }
        else {
            return false;
        }
    }
    function delete_question() {
        var check = confirm('Are You Sure To Delete This Question!!!');
        if (check) {
            return true;
        }
        else {
            return false;
        }
    }
    function approve_transaction() {
        var check = confirm('Are You Sure To Purchase this Incentive!!!');
        if (check) {
            return true;
        }
        else {
            return false;
        }
    }

    function change() {

        var elems = document.getElementsByClassName("change");
        for (var i = 0; i < elems.length; i++) {
            elems[i].disabled = false;
        }
        document.getElementById('image').type = 'file';
        document.getElementById('submit').type = 'submit';
    }

    function hidee() {

        if (document.getElementById('hh1').style.visibility == 'hidden') {
            document.getElementById('hh1').style.visibility = 'visible';
            document.getElementById('hh2').style.visibility = 'visible';
            document.getElementById('hh3').style.visibility = 'visible';
            document.getElementById('hh4').style.visibility = 'visible';
        }
        else {
            document.getElementById('hh1').style.visibility = 'hidden';
            document.getElementById('hh2').style.visibility = 'hidden';
            document.getElementById('hh3').style.visibility = 'hidden';
            document.getElementById('hh4').style.visibility = 'hidden';
        }

    }

    var drug_idd;
    var drug_idd2;
    var upload_type;
    var doc_typee;
    var business_code_new;
    function gen_list(business_code, result) {
        $.ajax(
            {
                type: 'POST',
                data: {business_code: business_code},
                url: "<?php echo site_url('find/find_gen')?>",
                success: function (result) {
                    $('.generic_name').html(result);
                },
                error: function (result) {
                    alert(result);
                }
            }
        )
    }
    function gen_list_for_drug_add(business_code, result) {

        $.ajax(
            {
                type: 'POST',
                data: {business_code: business_code},
                url: "<?php echo site_url('find/find_gen_for_add_drug')?>",
                success: function (result) {
                    $('.generic_name').html(result);
                },
                error: function (result) {
                    alert(result);
                }
            }
        )
    }
    function gen_list_for_drug_update(business_code, result,gen_id) {

        $.ajax(
            {
                type: 'POST',
                data: {business_code: business_code,gen_id: gen_id},
                url: "<?php echo site_url('find/find_gen_for_update_drug')?>",
                success: function (result) {
                    $('.generic_name_update').html(result);
                },
                error: function (result) {
                    alert(result);
                }
            }
        )
    }
    function gen_list1(business_code, result) {
        business_code_new=business_code;
        $.ajax(
            {
                type: 'POST',
                data: {business_code: business_code},
                url: "<?php echo site_url('find/find_genn')?>",
                success: function (result) {
                    $('.doc_type,.version1,drug11').val('-1');
                    $('.point1,.point2,.point3,.audio1,.audio2,.audio3,.drug_des_image').val('');
                    document.getElementById('files1').innerHTML='';
                    document.getElementById('version_delete').style.visibility='hidden';
                    document.getElementById('new_version_alert').style.display='none';
                    $('.generic_namee').html(result);
                },
                error: function (result) {
                    alert('POST failed.');
                }
            }
        )
    }
    function drug_list(gen_id, result) {
        $.ajax(
            {
                type: 'POST',
                data: {gen_id: gen_id},
                url: "<?php echo site_url('find/find_drugs')?>",
                success: function (result) {
                    $('.drug').html(result);
                },
                error: function (result) {
                    alert('POST failed.');
                }
            }
        )
    }
    function drug_list1(gen_id, result) {
        $.ajax(
            {
                type: 'POST',
                data: {gen_id: gen_id},
                url: "<?php echo site_url('find/find_drugss')?>",
                success: function (result) {
                    $('.doc_type,.version1').val('-1');
                    $('.point1,.point2,.point3,.audio1,.audio2,.audio3,.drug_des_image').val('');
                    document.getElementById('files1').innerHTML='';
                    document.getElementById('version_delete').style.visibility='hidden';
                    document.getElementById('new_version_alert').style.display='none';
                    $('.drugg').html(result);
                },
                error: function (result) {
                    alert('POST failed.');
                }
            }
        )
    }
    function drug_list2(gen_id, result) {
        $.ajax(
            {
                type: 'POST',
                data: {gen_id: gen_id},
                url: "<?php echo site_url('find/find_drugs')?>",
                success: function (result) {
                    $('.doc_type,.version1').val('-1');
                    $('.point1,.point2,.point3,.audio1,.audio2,.audio3,.drug_des_image').val('');
                    document.getElementById('files1').innerHTML='';
                    document.getElementById('version_delete').style.visibility='hidden';
                    document.getElementById('new_version_alert').style.display='none';
                    $('.drug2').html(result);
                },
                error: function (result) {
                    alert('POST failed.');
                }
            }
        )
    }
    function drug_no(drug_id) {
        drug_idd = drug_id;
        $.ajax(
            {
                url: "<?php echo site_url('find/file_type')?>",
                success: function (result) {
                    document.getElementById('typee').innerHTML='';
                    $('.file_type').html(result);
                },
                error: function (result) {
                    alert(result);
                }
            }
        )
    }
    function drug_no1(drug_id) {
        $('.doc_type,.version1').val('-1');
        $('.point1,.point2,.point3,.audio1,.audio2,.audio3,.drug_des_image').val('');
        document.getElementById('files1').innerHTML='';
        document.getElementById('version_delete').style.visibility='hidden';
        document.getElementById('new_version_alert').style.display='none';
        drug_idd = drug_id;
        $.ajax(
            {
                type: 'POST',
                data: {business_code: business_code_new},
                url: "<?php echo site_url('find/find_doctor')?>",
                success: function (result) {
                    $('.doc_type,.version1,drug11').val('-1');
                    $('.point1,.point2,.point3,.audio1,.audio2,.audio3,.drug_des_image').val('');
                    document.getElementById('files1').innerHTML='';
                    document.getElementById('version_delete').style.visibility='hidden';
                    document.getElementById('new_version_alert').style.display='none';
                    $('.doc_typee').html(result);
                },
                error: function (result) {
                    alert(result);
                }
            }
        )

    }

    function version_find(doc_type, result) {
        doc_typee = doc_type;
        $.ajax(
            {
                type: 'POST',
                data: {doc_type: doc_type, drug_id: drug_idd},
                url: "<?php echo site_url('find/find_version')?>",
                success: function (result) {
                    $('.version1').val('-1');
                    $('.point1,.point2,.point3,.audio1,.audio2,.audio3,.drug_des_image').val('');
                    document.getElementById('files1').innerHTML='';
                    document.getElementById('version_delete').style.visibility='hidden';
                    document.getElementById('new_version_alert').style.display='none';
                    $('.version').html(result);
                },
                error: function (result) {
                    alert('POST failed.');
                }
            }
        )
    }
    function region_find(business_code, result) {
        $.ajax(
            {
                type: 'POST',
                data: {business_code: business_code},
                url: "<?php echo site_url('find/find_region')?>",
                success: function (result) {
                    $('.region_sms').html(result);
                },
                error: function (result) {
                    alert('POST failed.');
                }
            }
        )
    }

    function fill_data(version_id) {
        version_id = version_id;
        if (version_id != '0' && version_id != '-1') {
            $.ajax({
                url: "<?php echo site_url('find/find_version_data')?>",
                type: "POST",
                dataType: 'json',
                data: {version_id: version_id},
                success: function (data) {
                    var id = data[0]['detail_version_id'];
                    var version = data[0]['version_id'];

                    $("#version_delete").attr("href", "<?php echo base_url()?>medicine_literature/delete_version?version_id="+id);
                    document.getElementById('version_delete').style.visibility='visible';
                    document.getElementById('new_version_alert').style.display='none';
                    $('#point1').val('');
                    $('#point2').val('');
                    $('#point3').val('');
                    $('#image_test').val('');
                    $('#files1').html('');

                    var point1 = data[0]['point1'].replace('<?php echo base_url()?>'+'upload/drug_des_files/','');
                    var point2 = data[0]['point2'].replace('<?php echo base_url()?>'+'upload/drug_des_files/','');
                    var point3 = data[0]['point3'].replace('<?php echo base_url()?>'+'upload/drug_des_files/','');

                    var drug_image = data[0]['drug_detail_image'].replace('<?php echo base_url()?>'+'upload/drug_des_files/','');

                    var all =  "<a target='_blank' class='btn btn-primary center-block popover-primary' data-toggle='popover' data-trigger='hover' data-placement='top' data-content='For Preview This Press This' data-original-title='Press it'  href="+data[0]['drug_detail_image']+">"+drug_image+"</a>";
                    $('#ver_id').val(id);
                    $('#point1').val(point1);
                    $('#point2').val(point2);
                    $('#point3').val(point3);
                    $('#files1').html(all);
                    $('#image_test').val(data[0]['drug_detail_image']);
                },
                error: function (result) {
                    alert('POST failed.');
                }
            })
        }
        if (version_id == '0') {
            if($('#doc_type').val()=='-1'||$('#drug11').val()=='-1')
            {
                document.getElementById('version_delete').style.visibility='hidden';
                document.getElementById('new_version_alert').style.display='none';
                alert("Please Select Drug Name And Doc Type");
            }
            else
            {
                if (confirm('Are you sure you want a new version?')) {
                    document.getElementById('version_delete').style.visibility='hidden';
                    document.getElementById('new_version_alert').style.display='block';
                    $('#point1').val('');
                    $('#point2').val('');
                    $('#point3').val('');
                    $('#audio1_test').val('');
                    $('#audio2_test').val('');
                    $('#audio3_test').val('');
                    $('#drug_audio_test').val('');
                    $('#image_test').val('');
                    $('#files1').html('');
                    $.ajax(
                        {
                            type: 'POST',
                            dataType: 'json',
                            data: {doc_type: doc_typee, drug_id: drug_idd},
                            url: "<?php echo site_url('find/add_new_version')?>",
                            success: function (data) {
                                $('#ver_id').val(data[0]['detail_version_id']);
                            },
                            error: function (result) {
                                alert(result);
                            }
                        }
                    )
                }
            }
        }
        if (version_id == '-1') {
            $('#point1').val('');
            $('#point2').val('');
            $('#point3').val('');
            $('#audio1_test').val('');
            $('#audio2_test').val('');
            $('#audio3_test').val('');
            $('#drug_audio_test').val('');
            $('#image_test').val('');
            $('#files1').html('');
        }
    }

    function drug_no2(drug_id) {
        drug_idd2 = drug_id;
        var d_id = drug_id;
        $.ajax(
            {
                type: 'POST',
                data: {drug_id: d_id},
                url: "<?php echo site_url('find_drug/find_drug_des')?>",
                success: function (result) {
                    $('.views').html(result);
                },
                error: function (result) {
                    alert('POST failed.');
                }
            }
        )

    }
    function drug_des(upload_file_type, result) {
        upload_type = upload_file_type;
        $.ajax(
            {

                type: 'POST',
                data: {type: upload_file_type, drug_id: drug_idd},
                url: "<?php echo site_url('find/find_file')?>",
                success: function (result) {
                    $('#typee').html(result);
                },
                error: function (result) {
                    alert('POST failed.');
                }
            }
        )
    }

    function check_upload_drug_des() {

        if ($('.business').val() == null) {
            alert("Please Select Business");
            return false;
        }
        else if ($('#generic_name1').val() == '-1') {
            alert("Please Select Generic Name");
            return false;
        }
        else if ($('#drug1').val() == '-1') {
            alert("Please Select Drug");
            return false;
        }
        else if ($('.type').val() == '-1') {
            alert("Please Select Type");
            return false;
        }
        else if ($('#pdf').val() == '') {
            alert("Please Select a File");
            return false;
        }
        else {
            return true;
        }
    }
    function check_upload_version() {

        if ($('.business11').val() == null) {
            alert("Please Select Business");
            return false;
        }
        else if ($('#generic_name11').val() == '-1') {
            alert("Please Select Generic Name");
            return false;
        }
        else if ($('#drug11').val() == '-1') {
            alert("Please Select Drug");
            return false;
        }
        else if ($('#doc_type').val() == '-1') {
            alert("Please Select Doctor Type");
            return false;
        }
        else if ($('#version1').val() == '-1') {
            alert("Please Select Version");
            return false;
        }
        else {
            return true;
        }
    }
    function add_generic_name() {

        if ($('.business').val() ==null) {
            alert("Please Select Business");
            return false;
        }
        else {
            return true;
        }
    }

    function send_sms() {

        if ($('#business_code').val() == null) {
            alert("Please Select Business");
            return false;
        }
        else if ($('#region').val() == '-1') {
            alert("Please Select Region");
            return false;
        }
        else
        {
            return true;
        }
    }


    function add_ques() {
        var business_code = $('.business').val();
        var test_name = $('.test_name').val();
        var test_suggestion = $('.test_suggestion').val();
        var exp_date = $('.exp_date').val();
        var test_type = $('.test_type').val();
        var test_marks = $('.test_marks').val();
        var pass_marks = $('.pass_marks').val();
        var test_time = $('.test_time').val();
        var ques = $('.ques').val();
        var op1 = $('.option1').val();
        var op2 = $('.option2').val();
        var op3 = $('.option3').val();
        var op4 = $('.option4').val();
        var ans = $('.ans').val();

        if(pass_marks=='-1')
        {
            pass_marks=50;
        }

        if (test_name == '') {
            alert('Please fill up the test name')
        }
        else if (test_suggestion == '') {
            alert('Please fill up the test suggestion')
        }
        else if (exp_date == '') {
            alert('Please fill up the Expire Date')
        }
        else if (test_type == '') {
            alert('Please fill up the test type')
        }
        else if (test_time == '') {
            alert('Please fill up the test time')
        }
        else if (test_marks == '') {
            alert('Please fill up the test marks')
        }
        else if (ques == '') {
            alert("Please Fill up the question");
        }
        else if (op1 == '') {
            alert("Please Fill up option 1");
        }
        else if (op2 == '') {
            alert("Please Fill up option 2");
        }
        else if (op3 == '') {
            alert("Please Fill up option 3");
        }
        else if (op4 == '') {
            alert("Please Fill up option 4");
        }
        else if (ans == '-1') {
            alert("Please select answer");
        }
        else {
            i++;
            document.getElementById('qus_no').innerHTML = i;
            $('.ques').val('');
            $('.option1').val('');
            $('.option2').val('');
            $('.option3').val('');
            $('.option4').val('');
            $('.ans').val('-1');

            if (i == 1) {
                $.ajax(
                    {
                        type: 'POST',
                        data: {business_code:business_code,test_name: test_name,test_suggestion:test_suggestion,exp_date:exp_date,test_time:test_time,test_marks:test_marks,pass_marks:pass_marks,test_type: test_type,ques: ques, op1: op1, op2: op2, op3: op3, op4: op4, ans: ans},
                        url: "<?php echo site_url('test/make_test')?>",
                        success: function (result) {
//                            alert(result);
//                            test_id=result.substr(0,result.indexOf('<'));
                            $('#test_id').val(result);
                        },
                        error: function (result) {
                            alert(result);
                        }
                    }
                )
            }
            else
            {
                $.ajax({
                    type: 'POST',
                    data: {test_name:test_name,ques: ques, op1: op1, op2: op2, op3: op3, op4: op4, ans: ans, test_id: test_id},
                    url: "<?php echo site_url('test/upload_ques')?>",
                    success: function (data) {
                        var bb = data;
                    },
                    error: function (result) {
                        alert('POST failed.');
                    }
                });
            }
        }
    }
    function up_ques() {

        if ($('.business').val() ==null) {
            alert("Please Select Business");
            return false;
        }
        else if($('.test_time').val()<=0)
        {
            alert('Test Time Should Be Grater Then 59 sec');
            return false;
        }
        else if($('.test_marks').val()<=0)
        {
            alert('Test Marks Should Be Grater Then 0');
            return false;
        }
        else if(i<1)
        {
            alert('Please Insert Question');
            return false;
        }
        else
        {
            return true;
        }
    }
    function up_ques2() {
        if($('.test_time').val()<=0)
        {
            alert('Test Time Should Be Grater Then 59 sec');
            return false;
        }
        else if($('.test_marks').val()<=0)
        {
            alert('Test Marks Should Be Grater Then 0');
            return false;
        }
        else
        {
            return true;
        }
    }

    function check_password() {
        var pass=$('#current_p').val();
        var login_id2=$('#login_id2').val();
        var check;
        $.ajax({
            type:'POST',
            data:{pass:pass,id:login_id2},
            url:"<?php echo site_url('settings/check_pass')?>",
            success:function (result) {
                if(result==login_id2)
                {
                    document.getElementById("clas").className = "form-group has-success";
                    o_p=1
                }
                else
                {
                    document.getElementById("clas").className = "form-group has-error";
                    o_p=-1
                }
            },
            error:function (result) {
                alert(result);
            }
        })
    }

    function pass_match() {
        var npass=$('#new_p').val();
        var rpass=$('#repeat_p').val();
        if(npass==rpass)
        {
            document.getElementById("r_wrong_p").style.display = "none";
            document.getElementById("r_correct_p").style.display = "block";
            r_p=1;
        }
        else
        {
            document.getElementById("r_wrong_p").style.display = "block";
            document.getElementById("r_correct_p").style.display = "none";
            r_p=0;
        }
    }
    function change_password() {
        if(o_p==-1)
        {
            alert("Current password won't match");
            return false;
        }
        else
        {
            return true;
        }
    }

    function user_typee() {
        var type=$('#user_type').val();
        if(type==4)
        {
            document.getElementById('sm_code').style.display="block";
            document.getElementById('rsm_code').style.display="none";
            document.getElementById('dsm_code').style.display="none";
            document.getElementById('region').style.display="none";
            document.getElementById('depot_code').style.display="block";
        }
        else if(type==5)
        {
            document.getElementById('sm_code').style.display="block";
            document.getElementById('rsm_code').style.display="block";
            document.getElementById('dsm_code').style.display="none";
            document.getElementById('region').style.display="block";
            document.getElementById('depot_code').style.display="block";
        }
        else if(type==6)
        {
            document.getElementById('sm_code').style.display="none";
            document.getElementById('region').style.display="none";
            document.getElementById('rsm_code').style.display="block";
            document.getElementById('dsm_code').style.display="block";
            document.getElementById('depot_code').style.display="block";
        }
        else
        {
            document.getElementById('sm_code').style.display="none";
            document.getElementById('rsm_code').style.display="none";
            document.getElementById('dsm_code').style.display="none";
            document.getElementById('region').style.display="none";
            document.getElementById('depot_code').style.display="none";
        }

    }

    function check_user() {
        var depot_code=$('#depot_code').val();
        var business_code=$('#business_code').val();
        var pso_type=$('#pso_type').val();
        if(business_code==null)
        {
            alert('Please Select Business');
            return false;
        }
        else if(depot_code==-1)
        {
            alert('Please Select Depot');
            return false;
        }
        else if(pso_type==-1)
        {
            alert('Please Select PSO Type');
            return false;
        }
        else
        {
            return true;
        }
    }
    function check_user_update() {

        var phone_number=$('.phone_number').val();

        if(phone_number.length<11)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
    function check_incentive() {
        var point_needed=$('#point_needed').val();
        var business=$('#business').val();
        var quantity=$('#quantity').val();
        if(business==null)
        {
            alert("Please select business");
            return false;
        }
        else if(point_needed<0)
        {
            alert("Please Insert Positive Point");
            return false;
        }
        else if(quantity<0)
        {
            alert("Please Insert Positive Quantity");
            return false;
        }
        else
        {
            return true;
        }
    }

    function create_user() {
        var user_type=$('#user_type').val();
        var depot_code=$('#depot_code').val();
        var business_code=$('#business_code').val();
        if(user_type==null)
        {
            alert('Please Select User Type');
            return false;
        }
        else if(user_type!=null)
        {
            if(user_type==4||user_type==5||user_type==6)
            {
                if(business_code==null)
                {
                    alert('Please Select Business');
                    return false;
                }
                else if(depot_code==null)
                {
                    alert('Please Select Depot');
                    return false;
                }
            }
            else
            {
                if(business_code==null)
                {
                    alert('Please Select Business');
                    return false;
                }
                else
                {
                    return true;
                }
            }
        }
    }

    function delete_user() {
        var check = confirm('Are you sure to delete this user');
        if (check) {
            return true;
        }
        else {
            return false;
        }
    }
    function change_user_password() {
        var check = confirm('Are you sure to change user password');
        if (check) {
            return true;
        }
        else {
            return false;
        }
    }

    $(function () {
        $('#datetimepicker').datetimepicker({
            minDate:new Date()
        });
    });


    function find_exam_stat(exam_id) {


        $.ajax(
            {
                type: 'POST',
                url: "<?php echo site_url('find/find_exam_data')?>",
                dataType: 'json',
                data: {exam_id: exam_id},
                success: function (data) {

                    $('#pass').val(data['0']['tpass']);
                    $('#fail').val(data['0']['tfail']);
                    $('#attend').val(data['0']['tattend']);
                    $('#nattend').val(data['0']['tnattend']);
                    myChart.destroy();
                    myChart2.destroy();
                    Mychart(data['0']['tpass'],data['0']['tfail'],data['0']['tattend'],data['0']['tnattend']);
                },
                error: function (result) {
                    alert('No Result Available Right Now');
                }
            }
        )
    }


    function Mychart(a,b,c,d) {
        const CHART = document.getElementById("myChart");
        var myChart = new Chart(CHART,{
            type: 'pie',
            options:
                {
                    tooltips:
                        {
                            enabled: false
                        }
                },
            data: data = {
                labels: [ "PASS: "+a+"%", "FAIL: "+b+"%"],
                datasets:
                    [{
                        data: [a,b],
                        backgroundColor: [
                            "#5B5B95",
                            "#E94699"
                        ],

                        hoverBackgroundColor: [
                            "#5B5B95",
                            "#E94699"
                        ]
                    }]
            }
        });
        const CHART2 = document.getElementById("myChart2");
        var myChart2 = new Chart(CHART2,{
            type: 'pie',
            options:
                {
                    tooltips:
                        {
                            enabled: false
                        }
                },
            data: data = {
                labels: ["EXAM ATTEND: "+c+"%", "NOT ATTEND: "+d+"%"],
                datasets:
                    [{
                        data: [c, d],
                        backgroundColor: [
                            "#3580BE",
                            "#00BADA"
                        ],

                        hoverBackgroundColor: [
                            "#3580BE",
                            "#00BADA"
                        ]
                    }]
            }
        });
        myChart.update();
        myChart2.update();
    }


    function  check_drug_insert() {

        if($('#business').val()==null)
        {
            alert('Please Select Business Name');
            return false;
        }
        if($('#generic_name1').val()=='-1')
        {
            alert('Please Select Generic Name');
            return false;
        }
        else if($('#drug_name').val()=='')
        {
            alert('Please Insert Drug Name');
            return false;
        }
        else if($('#pm_name').val()=='')
        {
            alert('Please Insert Product Manager Name');
            return false;
        }
        else if($('#pm_phone').val()=='')
        {
            alert('Please Insert Product Manager Phone Number');
            return false;
        }
        else
        {
            return true;
        }
    }
    function  check_drug_update() {


        if($('#business_update').val()==null)
        {
            alert('Please Select Business Name');
            return false;
        }
        else if($('#generic_name_update').val()=='-1')
        {
            alert('Please Select Generic Name');
            return false;
        }
        else if($('#drug_name_update').val()=='')
        {
            alert('Please Insert Drug Name');
            return false;
        }
        else if($('#pm_name_update').val()=='')
        {
            alert('Please Insert Product Manager Name');
            return false;
        }
        else if($('#pm_phone_update').val()=='')
        {
            alert('Please Insert Product Manager Phone Number');
            return false;
        }
        else
        {
            return true;
        }
    }

    //region ways assign

    function region_pso_list() {

        $("#pso_type").multiselect();
        var region=$('#region').val();
        if(region!='')
        {
            $.ajax(
                {
                    type: 'POST',
                    data: {region: region},
                    url: "<?php echo site_url('find/open_pso_type')?>",
                    success: function (result) {
                        $("#pso_type").empty();
                        $("#pso_type").multiselect("clearSelection");
                        $("#psos").empty();
                        $("#pso_type").append(result);
                        $("#pso_type").multiselect('rebuild');


                    },
                    error: function (result) {
                        alert('POST failed.');
                    }
                }
            )
        }
        else
        {
            $("#psos").val("<option value='-1'>No Result</option>");
            $("#psos").multiselect('rebuild');
        }
    }
    function type_pso_list() {
        $("#psos").multiselect();
        var pso_type=$('#pso_type').val();
        var region=$('#region').val();
        if(pso_type!='')
        {
            $.ajax(
                {
                    type: 'POST',
                    data: {pso_type: pso_type,region:region},
                    url: "<?php echo site_url('find/find_pso_by_types')?>",
                    success: function (result) {
                        $("#psos").empty();
                        $("#psos").append(result);
                        $("#psos").multiselect('rebuild');

                    },
                    error: function (result) {
                        alert('POST failed.');
                    }
                }
            )
        }
        else
        {
            $("#psos").val("<option value='-1'>No Result</option>");
            $("#psos").multiselect('rebuild');
        }
    }

    function gen_echo(vale) {
        alert(vale);

    }




</script>