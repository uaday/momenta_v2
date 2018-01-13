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
            <h1 class="title">Edit Or view PSO Info</h1>
            <p class="description">Manage your PSO info</p>
        </div>

        <div class="breadcrumb-env">

            <ol class="breadcrumb bc-1">
                <li>
                    <a href="dashboard-1.html"><i class="fa-home"></i>Home</a>
                </li>
                <li>

                    <a href="<?php echo base_url()?>renata_shop/create_incentive">PSO</a>
                </li>
                <li class="active">

                    <strong>PSO Info</strong>
                </li>
            </ol>

        </div>

    </div>
    <div class="panel panel-default">

        <div class="panel-heading">
            <div class="panel-title">
                PSO info form
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


        </div>

        <div class="panel-body">

            <form action="<?php echo base_url() ?>pso/update_pso" method="post" onsubmit="return check_user()" class="validate" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label">PSO Name</label>
                    <input type="text" class="form-control" id="name1" name="pso_name" data-validate="required"
                           value="<?php echo $pso['0']['pso_name'] ?>" placeholder="Enter PSO Name" data-message-required="Please fill up PSO Name"/>
                </div>
                <div class="form-group">
                    <label class="control-label">Renata Employee ID</label>
                    <input type="hidden" class="form-control " id="name1" name='pso_renata_id'
                           value="<?php echo $pso['0']['pso_id'] ?>" placeholder="Enter PSO Code">

                    <input type="text" class="form-control" id="name1" name="pso_renata_id_test" value="<?php echo $pso['0']['pso_id'] ?>" data-validate="required" disabled="disabled"
                           placeholder="Enter Renata Employee ID" data-message-required="Please fill up  Renata Employee ID"/>
                </div>
                <div class="form-group">
                    <label class="control-label">PSO Code</label>
                    <input type="text" class="form-control" name="pso_code"  value="<?php echo $pso['0']['renata_id'] ?>"   id="name1"  placeholder="Enter PSO Code" data-validate="required" data-message-required="Please fill up  PSO Code"/>
                </div>
                <div class="form-group">
                    <label class="control-label">DSM Code</label>
                    <input type="text" class="form-control" name="dsm_code"   id="name1" value="<?php echo $pso['0']['tbl_user_dsm_dsm_code'] ?>" placeholder="Enter DSM Code" data-validate="required" data-message-required="Please fill up  DSM Code"/>
                </div>
                <div class="form-group">
                    <label class="control-label">PSO Phone Number</label>
                    <input max="9999999999" type="number" class="form-control" id="pm_phone_update" name="pso_phone"  value="<?= substr($pso['0']['pso_phone'], 1, 10) ?>"   placeholder="Enter PSO Phone Number" data-validate="required" data-message-required="Please fill up  PSO Phone Number"/>
                </div>
                <div class="form-group">
                    <label class="control-label">PSO Designation</label>
                    <input type="text" class="form-control" id="name1" name="pso_designation" value="<?php echo $pso['0']['pso_designation'] ?>" data-validate="required"
                           placeholder="Enter PSO Designation" data-message-required="Please fill up  PSO Designation"/>
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
                                <option <?php if($pso['0']['business_code']== $bus['business_code']) echo 'selected'?> value="<?= $bus['business_code'] ?>"><?= $bus['business_name'] ?></option>
                            <?php } else { ?>
                                <?php if ($this->session->userdata('business_code') == $bus['business_code'] && $bus['business_code'] != '00') { ?>
                                    <option <?php if($pso['0']['business_code']== $bus['business_code']) echo 'selected'?> value="<?= $bus['business_code'] ?>"><?= $bus['business_name'] ?></option>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="text-bold">Depot Name</label>
                    <script type="text/javascript">
                        jQuery(document).ready(function($)
                        {
                            $("#depot_code").select2({
                                placeholder: 'Select your Depot...',
                                allowClear: true
                            }).on('select2-open', function()
                            {
                                // Adding Custom Scrollbar
                                $(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
                            });

                        });
                    </script>
                    <select class="form-control depot_code" id="depot_code" name="depot_code">
                        <option value="-1">Select Depot</option>
                        <?php foreach ($depots as $depot) { ?>
                            <option <?php if($pso['0']['depot_code']== $depot['depot_code']) echo 'selected'?> value="<?= $depot['depot_code'] ?>"><?= $depot['depot_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label class="text-bold">PSO Type</label>
                    <script type="text/javascript">
                        jQuery(document).ready(function ($) {
                            $("#pso_type").selectBoxIt({
                                showFirstOption: true
                            }).on('open', function () {
                                // Adding Custom Scrollbar
                                $(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
                            });
                        });
                    </script>

                    <select name="pso_type" class="form-control pso_type" id="pso_type">
                        <option value="-1">Select PSO Type</option>
                        <?php foreach ($pso_types as $pso_type) { ?>
                            <option <?php if($pso['0']['tbl_pso_user_type_pso_user_type_id']== $pso_type['pso_user_type_id']) echo 'selected'?> value="<?= $pso_type['pso_user_type_id'] ?>"><?= $pso_type['pso_user_type_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="text-bold">PSO Total Test Point</label>
                    <input type="text" class="form-control" id="name1"  value="<?php echo $pso['0']['pso_point'] ?>" disabled="disabled"/>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Save PSO Information</button>
                    <button type="reset" class="btn btn-white">Reset</button>
                </div>

            </form>

        </div>

    </div>
    <?php if (isset($footer)) {

        echo $footer;
    } ?>
</div>
