<?php
/**
 * Created by PhpStorm.
 * User: Sudipta Ghosh
 * Date: 11/15/2017
 * Time: 2:31 PM
 */
?>


<link rel="stylesheet" href="<?php echo base_url() ?>assets/multi/dist/css/bootstrap-multiselect.css">
<script type="text/javascript" src="<?php echo base_url() ?>assets/multi/dist/js/bootstrap-multiselect.js"></script>
<div class="main-content">

    <?php echo $user_profile; ?>
    <div class="page-title">

        <div class="title-env">
            <h1 class="title">Send New Message</h1>
            <p class="description">Send desire message to your pso</p>
        </div>

        <div class="breadcrumb-env">

            <ol class="breadcrumb bc-1">
                <li>
                    <a href="<?= base_url()?>"><i class="fa-home"></i>Home</a>
                </li>
                <li>

                    <a href="<?php echo base_url() ?>bulk_data">Communication Hub</a>
                </li>
                <li class="active">

                    <strong>Send Message</strong>
                </li>
            </ol>

        </div>

    </div>

    <h3>Message Body</h3>
    <div class="row">
        <div class=" col-sm-12">
            <div class="panel panel-default">

                <div align="center">

                    <?php if ($this->session->userdata('upload_data')) { ?>
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong><?php echo 'Upload Data Successful'; ?></strong>
                        </div>
                        <?php $this->session->unset_userdata('upload_data');
                    } ?>
                    <?php if ($this->session->userdata('error')) { ?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong><?php echo 'Wrong File Format'; ?></strong>
                        </div>
                        <?php $this->session->unset_userdata('error');
                    } ?>

                </div>

                <div class="">

                    <form onsubmit="return check_incentive()" action="<?php echo base_url() ?>tar_shop/add_incentive" method="post" enctype="multipart/form-data" class="validate">

                        <div class="form-group">
                            <label class="control-label">Message Title</label>
                            <input type="text" class="form-control" id="title" name="message_title" data-validate="required"
                                   placeholder="Message title" data-message-required="Please fill up message title"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Message Body</label>
                            <textarea name="message_body"  class="form-control description" cols="5" rows="5" id="message_body" data-validate="required" data-message-required="Please fill up message body"></textarea>

                        </div>
                        <div class="form-group">
                            <label class="control-label">Sender Name</label>
                            <input type="text" class="form-control" id="sent_by" name="sent_by" data-validate="required"
                                   placeholder="Sender Name" data-message-required="Please fill up sender name"/>
                        </div>


                    </form>

                </div>

            </div>
        </div>
    </div>



    <h3>Sent To</h3>
    <div class="row">

        <div class="col-md-12">

            <div class="panel-group" id="accordion-test-2">

                <div class="panel panel-default">
                    <div class="">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapseOne-2">
                                Universal Assignment
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne-2" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="col-sm-10">
                                <script type="text/javascript">
                                    jQuery(document).ready(function ($) {
                                        $("#business").selectBoxIt({
                                            showFirstOption: false
                                        }).on('open', function () {
                                            // Adding Custom Scrollbar
                                            $(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
                                        });
                                    });
                                </script>

                                <select name="business" class="form-control business" id="business"
                                        onchange="gen_list(this.value, 'generic_name');">
                                    <option value="-1">Select Business</option>
                                    <?php foreach ($business as $bus) { ?>
                                        <?php if ($this->session->userdata('business_code') == '00' && $bus['business_code'] != '00') { ?>
                                            <option value="<?= $bus['business_code'] ?>"><?= $bus['business_name'] ?></option>
                                        <?php } else { ?>
                                            <?php if ($this->session->userdata('business_code') == $bus['business_code'] && $bus['business_code'] != '00') { ?>
                                                <option value="<?= $bus['business_code'] ?>"><?= $bus['business_name'] ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Send Message</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapseTwo-2" class="collapsed">
                                Regional Assignment
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo-2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="col-sm-5">
                                <script type="text/javascript">
                                    jQuery(document).ready(function ($) {
                                        $("#business1").selectBoxIt({
                                            showFirstOption: false
                                        }).on('open', function () {
                                            // Adding Custom Scrollbar
                                            $(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
                                        });
                                    });
                                </script>

                                <select name="business1" class="form-control business" id="business1"
                                        onchange="gen_list(this.value, 'generic_name');">
                                    <option value="-1">Select Business</option>
                                    <?php foreach ($business as $bus) { ?>
                                        <?php if ($this->session->userdata('business_code') == '00' && $bus['business_code'] != '00') { ?>
                                            <option value="<?= $bus['business_code'] ?>"><?= $bus['business_name'] ?></option>
                                        <?php } else { ?>
                                            <?php if ($this->session->userdata('business_code') == $bus['business_code'] && $bus['business_code'] != '00') { ?>
                                                <option value="<?= $bus['business_code'] ?>"><?= $bus['business_name'] ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-5">
                                <select style="width: 600px" name="region[]" class="example-selectAllJustVisible" id="region"
                                        multiple="multiple" onchange="region_pso_list();" >
                                    <?php foreach ($regions as $region) { ?>
                                        <option value="<?php echo $region['rsm_code'] ?>"><?php echo $region['region'] ?> (<?php echo $region['rsm_code'] ?>)</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Send Message</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapseThree-2" class="collapsed">
                                PSO Type Assignment
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree-2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="col-sm-4">
                                <select style="width: 600px" name="region[]" class="example-selectAllJustVisible" id="region"
                                        multiple="multiple" onchange="region_pso_list();" >
                                    <?php foreach ($regions as $region) { ?>
                                        <option value="<?php echo $region['rsm_code'] ?>"><?php echo $region['region'] ?> (<?php echo $region['rsm_code'] ?>)</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select style="width: 600px" name="region[]" class="example-selectAllJustVisible1" id="region"
                                        multiple="multiple" onchange="region_pso_list();" >
                                    <?php foreach ($regions as $region) { ?>
                                        <option value="<?php echo $region['rsm_code'] ?>"><?php echo $region['region'] ?> (<?php echo $region['rsm_code'] ?>)</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select style="width: 600px" name="region[]" class="example-selectAllJustVisible2" id="region"
                                        multiple="multiple" onchange="region_pso_list();" >
                                    <?php foreach ($regions as $region) { ?>
                                        <option value="<?php echo $region['rsm_code'] ?>"><?php echo $region['region'] ?> (<?php echo $region['rsm_code'] ?>)</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Send Message</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapseFour-2" class="collapsed">
                                PSO Assignment
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFour-2" class="panel-collapse collapse">
                        <div class="panel-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <?php if (isset($footer)) {

        echo $footer;
    } ?>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        $('.example-selectAllJustVisible').multiselect({
            enableFiltering: true,
            includeSelectAllOption: true,
            selectAllJustVisible: false,
            maxHeight: 200,
            buttonWidth: '330px'

        });
        $('.example-selectAllJustVisible1').multiselect({
            enableFiltering: true,
            includeSelectAllOption: true,
            selectAllJustVisible: false,
            maxHeight: 200,
            buttonWidth: '200px'

        });
        $('.example-selectAllJustVisible2').multiselect({
            enableFiltering: true,
            includeSelectAllOption: true,
            selectAllJustVisible: false,
            maxHeight: 200,
            buttonWidth: '200px'

        });
        $('.example-selectAllJustVisible3').multiselect({
            enableFiltering: true,
            includeSelectAllOption: true,
            selectAllJustVisible: false,
            maxHeight: 200,
            buttonWidth: '200px'

        });
    });
    $('#example-single').multiselect();
</script>
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">