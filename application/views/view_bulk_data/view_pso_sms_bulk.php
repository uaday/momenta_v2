<?php
/**
 * Created by PhpStorm.
 * User: Sudipta Ghosh
 * Date: 11/15/2017
 * Time: 2:31 PM
 */
?>

<div class="main-content">

    <?php echo $user_profile; ?>
    <div class="page-title">

        <div class="title-env">
            <h1 class="title">SMS BULK</h1>
            <p class="description">Send your sms by bulk user</p>
        </div>

        <div class="breadcrumb-env">

            <ol class="breadcrumb bc-1">
                <li>
                    <a href="dashboard-1.html"><i class="fa-home"></i>Home</a>
                </li>
                <li>

                    <a href="<?php echo base_url() ?>bulk_data">Bulk Data</a>
                </li>
                <li class="active">

                    <strong>PSO SMS Bulk</strong>
                </li>
            </ol>

        </div>

    </div>
    <div class="row">
        <div class=" col-sm-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <div class="panel-title">
                        PSO SMS BULK
                    </div>
                </div>


                <div align="center">
                    <?php if (isset($pso_add)) { ?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong><?php echo $pso_add; ?></strong>
                        </div>
                        <?php $this->session->unset_userdata('delete_pso_exams');
                    } ?>
                    <?php if ($this->session->userdata('upload_data')) { ?>
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong><?php echo 'SMS Send Successful'; ?></strong>
                        </div>
                        <?php $this->session->unset_userdata('add_gen');
                    } ?>

                    <?php if ($this->session->userdata('pass_issue')) { ?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong><?php echo $this->session->userdata('pass_issue'); ?></strong>
                        </div>
                        <?php $this->session->unset_userdata('pass_issue');
                    } ?>

                    <?php if ($this->session->userdata('delete_doc_type')) { ?>
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong><?php echo $this->session->userdata('delete_doc_type'); ?></strong>
                        </div>
                        <?php $this->session->unset_userdata('delete_doc_type');
                    } ?>

                    <?php if ($this->session->userdata('gen_error')) { ?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong><?php echo $this->session->userdata('gen_error'); ?></strong>
                        </div>
                        <?php $this->session->unset_userdata('gen_error');
                    } ?>

                </div>

                <div class="panel-body">

                    <form onsubmit="return region_check()" method="post" action="<?php echo base_url() ?>bulk_data/send_pso_sms"
                          class="validate" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="alert alert-white">
                                <strong>Instruction</strong>
                            </div>
                            <div class="well well-lg">
                                1. Select Business Code.<br>
                                2. Select Region.<br>
                                3. Press <strong>Send SMS</strong> Button
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="text-bold">Business</label>
                            <script type="text/javascript">
                                jQuery(document).ready(function ($) {
                                    $("#business_code").selectBoxIt({
                                        showFirstOption: false
                                    }).on('open', function () {
                                        // Adding Custom Scrollbar
                                        $(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
                                    });
                                });
                            </script>

                            <select name="business_code" class="form-control business" id="business_code">
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
                        <div class="form-group">
                            <label class="text-bold">Select Region</label>
                            <script type="text/javascript">
                                jQuery(document).ready(function ($) {
                                    $("#region").select2({
                                        placeholder: 'Select your Region...',
                                        allowClear: true
                                    }).on('select2-open', function () {
                                        // Adding Custom Scrollbar
                                        $(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
                                    });

                                });
                            </script>
                            <select class="form-control depot_code" id="region" name="region">
                                <option value="-1">Select Region</option>
                                <?php foreach ($regions as $region) { ?>
                                    <option value="<?= $region['rsm_code'] ?>"><?= $region['region'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Send SMS</button>
                        </div>


                            <div class="alert alert-white">
                                <strong>Result</strong>
                            </div>
                            <div class="well well-lg">
                                <?php if($this->session->userdata('sms_sent_counter')) { echo "<strong>".$this->session->userdata('sms_sent_counter')."</strong>".' SMS SENT SUCCESSFULLY'; $this->session->unset_userdata('sms_sent_counter');}?>
                            </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
    <?php if (isset($footer)) {

        echo $footer;
    } ?>
</div>
