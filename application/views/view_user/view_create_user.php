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
            <h1 class="title">Add & Save USER</h1>
            <p class="description">Add your user for control PSO</p>
        </div>

        <div class="breadcrumb-env">

            <ol class="breadcrumb bc-1">
                <li>
                    <a href="<?= base_url()?>"><i class="fa-home"></i>Home</a>
                </li>
                <li>

                    <a href="<?php echo base_url()?>user">USER</a>
                </li>
                <li class="active">

                    <strong>Create USER</strong>
                </li>
            </ol>

        </div>

    </div>
    <div class="panel panel-default">

        <div class="panel-heading">
            <div class="panel-title">
                Add new user form
            </div>
        </div>


        <div align="center">
            <?php if ($this->session->userdata('user_add')) { ?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong><?php echo $this->session->userdata('user_add'); ?></strong>
                </div>
                <?php $this->session->unset_userdata('user_add');
            } ?>

        </div>

        <div class="panel-body">

            <form action="<?php echo base_url() ?>user/add_new_user" method="post" onsubmit="return create_user()" class="validate" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label">User Name</label>
                    <input type="text" class="form-control" id="user_name" name="user_name" data-validate="required"
                           placeholder="Enter User Name" data-message-required="Please fill up User Name"/>
                </div>
                <div class="form-group">
                    <label class="control-label">Renata Employee ID</label>
                    <input type="text" class="form-control" id="renata_id" name="renata_id" data-validate="required"
                           placeholder="Enter Renata Employee ID" data-message-required="Please fill up  Renata Employee ID"/>
                </div>
                <div class="form-group">
                    <label class="control-label">USER Type</label>
                    <script type="text/javascript">
                        jQuery(document).ready(function ($) {
                            $("#user_type").selectBoxIt({
                                showFirstOption: false
                            }).on('open', function () {
                                // Adding Custom Scrollbar
                                $(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
                            });
                        });
                    </script>

                    <select onchange="user_typee()" name="user_type" class="form-control user_type" id="user_type">
                        <option value="-1">Select User Type</option>
                        <option value="2">Admin</option>
                        <option value="3">Marketing</option>
                        <option value="4">Sales Manager</option>
                        <option value="5">Regional Sales Manager</option>
                        <option value="6">District Sales Manager</option>
                        <option value="7">General Manager</option>
                        <option value="8">MSD</option>
                    </select>
                </div>

                <div id="dsm_code" style="display: none" class="form-group">
                    <label class="control-label">DSM Code</label>
                    <input type="text" class="form-control" name="dsm_code"   id="dsm_code1"
                           placeholder="Enter DSM Code" data-validate="required" data-message-required="Please fill up  DSM Code"/>
                </div>
                <div id="rsm_code" style="display: none" class="form-group">
                    <label class="control-label">RSM Code</label>
                    <input  type="text" class="form-control" name="rsm_code"   id="rsm_code1"
                           placeholder="Enter RSM Code" data-validate="required" data-message-required="Please fill up  RSM Code"/>
                </div>
                <div id="sm_code" style="display: none" class="form-group">
                    <label class="control-label">SM Code</label>
                    <input  type="text" class="form-control" name="sm_code"   id="sm_code1"
                           placeholder="Enter SM Code" data-validate="required" data-message-required="Please fill up  SM Code"/>
                </div>
                <div  class="form-group">
                    <label class="control-label">Designation</label>
                    <input type="text" class="form-control" id="designation" name="designation" data-validate="required"
                           placeholder="Enter USER Designation" data-message-required="Please fill up  USER Designation"/>
                </div>
                <div id="region" style="display: none" class="form-group">
                    <label class="control-label">Region</label>
                    <input type="text" class="form-control" id="region1" name="region" data-validate="required"
                           placeholder="Enter Region" data-message-required="Please fill up  Region"/>
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
                            <option value="<?= $bus['business_code'] ?>"><?= $bus['business_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div id="depot_code" style="display: none" class="form-group">
                    <label class="text-bold">Depot Name</label>
                    <script type="text/javascript">
                        jQuery(document).ready(function($)
                        {
                            $("#depot_code1").select2({
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
                    <button type="submit" class="btn btn-success">Save USER</button>
                </div>

            </form>

        </div>

    </div>
    <?php if (isset($footer)) {

        echo $footer;
    } ?>
</div>
