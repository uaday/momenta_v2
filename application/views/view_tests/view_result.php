<?php
/**
 * Created by PhpStorm.
 * User: Sudipta Ghosh
 * Date: 11/30/2017
 * Time: 2:19 PM
 */
?>

<style>
    #pie1 {
        height: 250px;
    }
    #pie2 {
        height: 250px;
    }

    #pie1  {
        margin: 0 auto;
    }
    #pie2  {
        margin: 0 auto;
    }
</style>

<input type="hidden" id="pass" value="<?php echo $tpass; ?>">
<input type="hidden" id="fail" value="<?php echo $tfail; ?>">
<input type="hidden" id="attend" value="<?php echo $tattend; ?>">
<input type="hidden" id="nattend" value="<?php echo $tnotattend; ?>">

<script type="text/javascript">
    var a = document.getElementById('pass').value;
    var b = document.getElementById('fail').value;
    var c = document.getElementById('attend').value;
    var d = document.getElementById('nattend').value;



</script>


<!--<script src="https://cdn3.devexpress.com/jslib/17.2.3/js/dx.all.js"></script>-->
<script src="<?= base_url()?>assets/js/dx_js/dx.all.js"></script>

<div class="main-content">

    <!-- User Info, Notifications and Menu Bar -->
    <?php echo $user_profile; ?>
    <div class="page-title">

        <div class="title-env">
            <h1 class="title">Test Result</h1>
            <p class="description">View your pso result and analyze their performance</p>
        </div>

        <div class="breadcrumb-env">

            <ol class="breadcrumb bc-1">
                <li>
                    <a href="<?php echo base_url() ?>home"><i class="fa-home"></i>Home</a>
                </li>
                <li>

                    <a href="#">Testing Center</a>
                </li>
                <li class="active">

                    <strong>Result</strong>
                </li>
            </ol>

        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <script type="text/javascript">
                jQuery(document).ready(function($)
                {
                    $("#sexam").select2({
                        placeholder: 'Select your Depot...',
                        allowClear: true
                    }).on('select2-open', function()
                    {
                        // Adding Custom Scrollbar
                        $(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
                    });

                });
            </script>

            <select  name="sexam" id="sexam" onchange="find_exam_stat(this.value)" class="form-control ">
                <?php foreach ($sexams as $sexam) { ?>
                    <option  value="<?php echo $sexam['exam_id'] ?>"><?php echo $sexam['exam_name'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="demo-container">
                        <div id="pie1"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-gray">
                <div class="panel-body">
                    <div class="demo-container">
                        <div id="pie2"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="demo-container">
                        <div class="col-md-offset-10 col-md-2">
                            <?php if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2'||$this->session->userdata('user_type')=='4'||$this->session->userdata('user_type')=='5'){?>
                                <div class="search clearfix">
                                    <button data-toggle="modal" data-target="#myModal1" class="btn btn-blue btn-icon btn-icon-standalone btn-icon-standalone-right">
                                        <i class="fa-recycle"></i>
                                        <span>Filter Result</span>
                                    </button>
                                </div>
                            <?php }?>
                        </div>
                        <div id="table">
                            <img style="display: block; margin: 0 auto;" src="<?php echo base_url()?>assets/images/gif/result.gif" class=" img-responsive" >
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- Basic Setup -->


    <!-- Main Footer -->
    <!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
    <!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
    <!-- Or class "fixed" to  always fix the footer to the end of page -->
    <?php if (isset($footer)) {

        echo $footer;
    } ?>
</div>

<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <form action="">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close cross_btn no_back_btn"
                            data-dismiss="modal">&times;
                    </button>
                    <h3 class="modal-title text-bold">Filter Result</h3>

                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2'||$this->session->userdata('user_type')=='4'){?>
                                    <label class="control-label">Sales Manager</label>
                                    <script type="text/javascript">
                                        jQuery(document).ready(function($)
                                        {
                                            $("#sm_code").select2({
                                                placeholder: 'Select SM...',
                                                allowClear: true
                                            }).on('select2-open', function()
                                            {
                                                // Adding Custom Scrollbar
                                                $(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
                                            });

                                        });
                                    </script>
                                        <select class="form-control" name="sm_code" id="sm_code">
                                            <option value="">Select SM</option>
                                            <?php foreach ($sms as $sm){?>
                                                <option value="<?php echo $sm['sm_code']?>"><?php echo $sm['sm_name']?></option>
                                            <?php }?>
                                        </select>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2'||$this->session->userdata('user_type')=='4'||$this->session->userdata('user_type')=='7'){?>
                                    <label>Regional Sales Manager</label>
                                    <script type="text/javascript">
                                        jQuery(document).ready(function($)
                                        {
                                            $("#rsm_code").select2({
                                                placeholder: 'Select RSM...',
                                                allowClear: true
                                            }).on('select2-open', function()
                                            {
                                                // Adding Custom Scrollbar
                                                $(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
                                            });

                                        });
                                    </script>
                                        <select class="form-control" name="rsm_code" id="rsm_code">
                                            <option value="">Select RSM</option>
                                            <?php foreach ($rms as $rm){?>
                                                <option value="<?php echo $rm['rsm_code']?>"><?php echo $rm['rsm_code']?>--<?php echo $rm['rsm_name']?></option>
                                            <?php }?>
                                        </select>
                                <?php }?>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-group center-block" >
                                    <label>Test Suggestion</label>
                                    <script type="text/javascript">
                                        jQuery(document).ready(function($)
                                        {
                                            $("#dsm_code").select2({
                                                placeholder: 'Select DSM...',
                                                allowClear: true
                                            }).on('select2-open', function()
                                            {
                                                // Adding Custom Scrollbar
                                                $(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
                                            });

                                        });
                                    </script>
                                    <select class="form-control" name="dsm_code" id="dsm_code">
                                        <option value="">Select DSM</option>
                                        <?php foreach ($dms as $dm){?>
                                            <option value="<?php echo $dm['dsm_code']?>"><?php echo $dm['dsm_code']?>--<?php echo $dm['dsm_name']?></option>
                                        <?php }?>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <input onclick="getData()" type="submit" class="btn btn-primary btn-block" data-dismiss="modal"
                           value="Filter Result">

                </div>
            </div>
        </form>

    </div>
</div>



<script>
    $(document).ready(function() {
        fetch_data();
    });

    function fetch_data() {
        $.ajax({
            url:'<?php echo site_url('data_table/test_assign_table')?>',
            method:"POST",
            success:function (data) {
//                alert(data);
                $('#table').html(data);
            },
            error:function (data) {
//                alert(data);
               // $('#table').html(data);
            }
        });

    }
    function getData() {
        document.getElementById("table").innerHTML="<img style='display: block; margin: 0 auto;' src='<?php echo base_url()?>assets/images/gif/result.gif' class='img-responsive' >";
        var sm_code=$('#sm_code').val();
        var rsm_code=$('#rsm_code').val();
        var dsm_code=$('#dsm_code').val();
        $.ajax({
            data:{sm_code:sm_code,rsm_code:rsm_code,dsm_code:dsm_code},
            url:'<?php echo site_url('data_table/test_filter_assign_table')?>',
            method:"POST",
            success:function (data) {
                $('#table').html(data);
            }
        });
    }
</script>

<script>
    $(function(){
        $("#pie1").dxPieChart({
            palette: "bright",
            dataSource: dataSource1,
            palette: [ '#576173', '#da8943'],
            title: "Result Status",
            legend: {
                horizontalAlignment: "center",
                verticalAlignment: "bottom"
            },
            "export": {
                enabled: true
            },
            redrawOnResize:true,
            resolveLabelOverlapping:"none",
            series: [{
                argumentField: "language",
                valueField: "percent",
                label: {
                    visible: true,
                    connector: {
                        visible: true,
                        width: 0.5
                    },
                    format: "fixedPoint",
                    customizeText: function (point) {
                        return point.argumentText + ": " + point.valueText + "%";
                    }
                }
            }]
        });
    });
    $(function(){
        $("#pie2").dxPieChart({
            palette: "bright",
            dataSource: dataSource2,
            palette: [ '#576173', '#da8943'],
            title: "Attendance Status",
            legend: {
                horizontalAlignment: "center",
                verticalAlignment: "bottom"
            },
            "export": {
                enabled: true
            },
            redrawOnResize:true,
            resolveLabelOverlapping:"none",
            series: [{
                argumentField: "language",
                valueField: "percent",
                label: {
                    visible: true,
                    connector: {
                        visible: true,
                        width: 0.5
                    },
                    format: "fixedPoint",
                    customizeText: function (point) {
                        return point.argumentText + ": " + point.valueText + "%";
                    }
                }
            }]
        });
    });
</script>





