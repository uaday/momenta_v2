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

                    <?php if ($this->session->userdata('send_message')) { ?>
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong><?php echo $this->session->userdata('send_message') ?></strong>
                        </div>
                        <?php $this->session->unset_userdata('send_message');
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
                            <input type="text" class="form-control" id="message_title" name="message_title" data-validate="required"
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
                                        $("#universal_business").selectBoxIt({
                                            showFirstOption: false
                                        }).on('open', function () {
                                            // Adding Custom Scrollbar
                                            $(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
                                        });
                                    });
                                </script>

                                <select name="universal_business" class="form-control universal_business" id="universal_business"
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
                                    <button type="button" id="universal_button" class="btn btn-success" onclick="universal_message()">Send Message</button>
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
                                        $("#regional_business").selectBoxIt({
                                            showFirstOption: false
                                        }).on('open', function () {
                                            // Adding Custom Scrollbar
                                            $(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
                                        });
                                    });
                                </script>

                                <select name="regional_business" class="form-control regional_business" id="regional_business"
                                        onchange="find_regional_region();">
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
                                <select style="width: 330px" name="regional_region[]"  class="example-selectAllJustVisible" id="regional_region"
                                        multiple="multiple" >
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <button type="button" id="regional_button" class="btn btn-success" onclick="regional_message()">Send Message</button>
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
                            <div class="col-sm-3">
                                <select style="width: 600px" name="type_region[]" class="example-selectAllJustVisible1" id="region"
                                        multiple="multiple" onchange="region_pso_list();" >
                                    <?php foreach ($regions as $region) { ?>
                                        <option value="<?php echo $region['rsm_code'] ?>"><?php echo $region['region'] ?> (<?php echo $region['rsm_code'] ?>)</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select style="width: 600px" name="pso_type[]" class="example-selectAllJustVisible2" id="pso_type"
                                        multiple="multiple" onchange="type_pso_list();" >
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select name="psos[]" id="psos" class="example-selectAllJustVisible3" multiple="multiple">

                                </select>
                            </div>
                            <div class="col-sm-offset-1 col-sm-2">
                                <div class="form-group">
                                    <button type="button" id="type_button" class="btn btn-success" onclick="pso_type_message()">Send Message</button>
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
                            <div class="col-sm-5">
                                <script type="text/javascript">
                                    jQuery(document).ready(function ($) {
                                        $("#pso_business").selectBoxIt({
                                            showFirstOption: false
                                        }).on('open', function () {
                                            // Adding Custom Scrollbar
                                            $(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
                                        });
                                    });
                                </script>

                                <select name="pso_business" class="form-control pso_business" id="pso_business"
                                        onchange="get_pso_for_communication();">
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
                                <select style="width: 600px" name="pso[]" class="example-selectAllJustVisible4" id="pso"
                                        multiple="multiple"  >

                                </select>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <button type="button" id="pso_button" class="btn btn-success" onclick="pso_message()">Send Message</button>
                                </div>
                            </div>
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
            maxHeight: 250,
            buttonWidth: '200px'

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
        $('.example-selectAllJustVisible4').multiselect({
            enableFiltering: true,
            includeSelectAllOption: true,
            selectAllJustVisible: false,
            maxHeight: 150,
            buttonWidth: '200px'

        });
    });
    $('#example-single').multiselect();
</script>
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">