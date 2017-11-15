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
            <h1 class="title">Add & Save PSO</h1>
            <p class="description">Add your PSO for fly your sells</p>
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

                    <strong>Add PSO</strong>
                </li>
            </ol>

        </div>

    </div>
    <div class="panel panel-default">

        <div class="panel-heading">
            <div class="panel-title">
                Add new PSO form
            </div>

        </div>

        <?php if ($this->session->userdata('create_incentive')) { ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong><?php echo $this->session->userdata('create_incentive'); ?></strong>
            </div>
            <?php $this->session->unset_userdata('create_incentive');
        } ?>

        <div class="panel-body">

            <form action="<?php echo base_url() ?>pso/insert_pso" method="post" onsubmit="return check_user()" class="validate" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label">PSO Name</label>
                    <input type="text" class="form-control" id="name1" name="pso_name" data-validate="required"
                           placeholder="Enter PSO Name" data-message-required="Please fill up PSO Name"/>
                </div>
                <div class="form-group">
                    <label class="control-label">Renata Employee ID</label>
                    <input type="text" class="form-control" id="name1" name="pso_renata_id" data-validate="required"
                           placeholder="Enter Renata Employee ID" data-message-required="Please fill up  Renata Employee ID"/>
                </div>
                <div class="form-group">
                    <label class="control-label">PSO Code</label>
                    <input type="text" class="form-control" name="pso_code"   id="name1" data-mask="9999" placeholder="Enter PSO Code" data-validate="required" data-message-required="Please fill up  PSO Code"/>
                </div>
                <div class="form-group">
                    <label class="control-label">DSM Code</label>
                    <input type="text" class="form-control" name="dsm_code"   id="name1" data-mask="99" placeholder="Enter DSM Code" data-validate="required" data-message-required="Please fill up  DSM Code"/>
                </div>
                <div class="form-group">
                    <label class="control-label">PSO Phone Number</label>
                    <input type="text" class="form-control" id="pm_phone_update" name="pso_phone"  data-mask="phone" placeholder="Enter PSO Phone Number" data-validate="required" data-message-required="Please fill up  PSO Phone Number"/>
                </div>
                <div class="form-group">
                    <label class="control-label">PSO Designation</label>
                    <input type="text" class="form-control" id="name1" name="pso_designation" data-validate="required"
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
                            <option value="<?= $depot['depot_code'] ?>"><?= $depot['depot_name'] ?></option>
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
                            <option value="<?= $pso_type['pso_user_type_id'] ?>"><?= $pso_type['pso_user_type_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Save Incentive</button>
                    <button type="reset" class="btn btn-white">Reset</button>
                </div>

            </form>

        </div>

    </div>
    <?php if (isset($footer)) {

        echo $footer;
    } ?>
</div>
