<?php
/**
 * Created by PhpStorm.
 * User: Sudipta Ghosh
 * Date: 10/24/2017
 * Time: 4:40 PM
 */
?>
<?php
/**
 * Created by PhpStorm.
 * User: Sudipta
 * Date: 10/1/2017
 * Time: 12:47 PM
 */
$i = 0;
?>

<div class="main-content">

    <!-- User Info, Notifications and Menu Bar -->
    <?php echo $user_profile; ?>
    <div class="page-title">

        <div class="title-env">
            <h1 class="title">Drug Name</h1>
            <p class="description">Maintain the Drug name.</p>
        </div>

        <div class="breadcrumb-env">

            <ol class="breadcrumb bc-1">
                <li>
                    <a href="<?php echo base_url() ?>"><i class="fa-home"></i>Home</a>
                </li>
                <li>
                    <a href="#"><i class="fa-medkit"></i>Medicine Info</a>
                </li>
                <li class="active">
                    <strong>Drug Name</strong>
                </li>
            </ol>

        </div>

    </div>

    <!-- Basic Setup -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">All Drug Name</h3>
        </div>
        <div align="center">
            <?php if ($this->session->userdata('add_drug')) { ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong><?php echo $this->session->userdata('add_drug'); ?></strong>
                </div>
                <?php $this->session->unset_userdata('add_drug');
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

            <?php if ($this->session->userdata('delete_drug')) { ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong><?php echo $this->session->userdata('delete_drug'); ?></strong>
                </div>
                <?php $this->session->unset_userdata('delete_drug');
            } ?>

            <?php if ($this->session->userdata('drug_error')) { ?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong><?php echo $this->session->userdata('drug_error'); ?></strong>
                </div>
                <?php $this->session->unset_userdata('drug_error');
            } ?>

        </div>
        <div class="modal fade" id="add_drug" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <form onsubmit="return check_drug_insert()" action="<?php echo base_url() ?>med_info/add_drug_name"
                      method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close cross_btn no_back_btn"
                                    data-dismiss="modal">&times;
                            </button>
                            <h3 class="modal-title text-bold">Add Drug Name</h3>

                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="text-bold">Business</label>
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
                            <div class="form-group">
                                <label class="text-bold">Generic Name</label>
                                <div class="generic_name">
                                    <script type="text/javascript">
                                        jQuery(document).ready(function ($) {
                                            $("#generic_name1").selectBoxIt({
                                                showFirstOption: false
                                            }).on('open', function () {
                                                // Adding Custom Scrollbar
                                                $(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
                                            });
                                        });
                                    </script>
                                    <select class="form-control generic_name1" name="gen_id" id="generic_name1">
                                        <option value="-1">Select Generic Name</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-bold">Drug Name</label>
                                <div class="input-group input-group-sm input-group-minimal">
										<span class="input-group-addon">
											<i class="fa fa-flask"></i>
										</span>
                                    <input name="drug_name" id="drug_name" type="text" placeholder="Drug name"
                                           class="form-control">
                                </div>
                                <p style="float: right" class="help-block">Ex: Estracon</p>
                            </div>
                            <div class="form-group">
                                <label class="text-bold">Product Manager Name</label>
                                <div class="input-group input-group-sm input-group-minimal">
										<span class="input-group-addon">
											<i class="linecons-user"></i>
										</span>
                                    <input id="pm_name" name="pm_name" type="text" placeholder="Product Manager Name"
                                           class="form-control">
                                </div>
                                <p style="float: right" class="help-block">Ex: Mr.Khayrul Islam</p>
                            </div>
                            <div class="form-group">
                                <label class="text-bold">Product Manager Phone Number</label>
                                <div class="input-group input-group-sm input-group-minimal">
										<span class="input-group-addon">
											<i class="linecons-mobile"></i>
										</span>
                                    <input type="text" class="form-control" id="pm_phone" name="pm_phone"
                                           placeholder="Phone Number"
                                           data-mask="phone"/>
                                </div>
                                <p style="float: right" class="help-block">Ex: 183 587 9587</p>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary btn-block" value="Add Drug Name">

                        </div>
                    </div>
                </form>

            </div>
        </div>
        <div class="panel-body">
            <div style="float: inherit; margin-bottom: 10px;">
                <a href="javascript:;"
                   onclick="jQuery('#add_drug').modal('show', {backdrop: 'fade'});"
                   class="btn btn-primary btn-single "><i class="fa fa-plus-circle"> </i> Add New</a>
            </div>
            <div class="table-responsive">
                <script type="text/javascript">
                    jQuery(document).ready(function ($) {
                        $("#example-1").dataTable({
                            aLengthMenu: [
                                [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
                            ]
                        });
                    });
                </script>
                <table id="example-1" class="table table-striped table-bordered table-responsive" cellspacing="0"
                       width="100%">
                    <thead>
                    <tr>
                        <!--                        <th>Drug Name ID</th>-->
                        <th>Business Name</th>
                        <th>Generic Name</th>
                        <th>Drug Name</th>
                        <th>Product Manager Name</th>
                        <th>Product Manager Phone Number</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <!--                        <th>Drug Name ID</th>-->
                        <th>Business Name</th>
                        <th>Generic Name</th>
                        <th>Drug Name</th>
                        <th>Product Manager Name</th>
                        <th>Product Manager Phone Number</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php foreach ($drugs as $drug) {
                        $i++ ?>
                        <tr>
                            <!--                            <td>--><? //= $drug['drug_id'] ?><!--</td>-->
                            <td><?= $drug['business_name'] ?></td>
                            <td><?= $drug['gen_name'] ?></td>
                            <td><?= $drug['drug_name'] ?></td>
                            <td><?= $drug['pm_name'] ?></td>
                            <td><?= $drug['pm_phone'] ?></td>
                            <td>
                                <a href="javascript:;"
                                   onclick="jQuery('#edit_drug-<?= $i ?>').modal('show');"
                                   class="btn btn-primary btn-single btn-sm">Edit</a>
                                <span class="table_insider"> | </span>
                                <a href="javascript:;"
                                   onclick="jQuery('#delete_drug-<?= $i ?>').modal('show', {backdrop: 'fade'});"
                                   class="btn btn-danger btn-single btn-sm">Delete</a>
                            </td>
                        </tr>

                        <div class="modal fade" id="edit_drug-<?= $i ?>" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <form onsubmit="return check_drug_update()"
                                      action="<?php echo base_url() ?>med_info/edit_drug_name" method="post">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close cross_btn no_back_btn"
                                                    data-dismiss="modal">&times;
                                            </button>
                                            <h3 class="modal-title text-bold">Edit Drug Name</h3>

                                        </div>
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label class="text-bold">Business</label>
                                                <script type="text/javascript">
                                                    $("#business_update").selectBoxIt({
                                                        showFirstOption: false
                                                    }).on('open', function () {
                                                        // Adding Custom Scrollbar
                                                        $(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
                                                    });
                                                </script>

                                                <select name="business" class="form-control business_update"
                                                        id="business_update"
                                                        onchange="gen_list_for_drug_update(this.value, 'generic_name_update',<?= $drug['tbl_drug_generic_name_gen_id'] ?>)">
                                                    <?php foreach ($business as $bus) { ?>
                                                        <?php if ($this->session->userdata('business_code') == '00' && $bus['business_code'] != '00') { ?>
                                                            <option <?php if ($drug['business_code'] == $bus['business_code']) echo "selected='selected'" ?>
                                                                    value="<?= $bus['business_code'] ?>"><?= $bus['business_name'] ?></option>
                                                        <?php } else { ?>
                                                            <?php if ($this->session->userdata('business_code') == $bus['business_code'] && $bus['business_code'] != '00') { ?>
                                                                <option <?php if ($drug['business_code'] == $bus['business_code']) echo "selected='selected'" ?>
                                                                        value="<?= $bus['business_code'] ?>"><?= $bus['business_name'] ?></option>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="text-bold">Generic Name</label>
                                                <select class="form-control generic_name_update" name="gen_id"
                                                        id="generic_name_update">
                                                    <option value='-1'>Select Generic Name</option>
                                                    <?php foreach ($gens as $gen) {
                                                        if ($gen['tbl_business_business_code'] == $drug['tbl_business_business_code']) { ?>
                                                            <option <?php if ($gen['gen_id'] == $drug['tbl_drug_generic_name_gen_id']) echo "selected='selected'" ?>
                                                                    value="<?= $gen['gen_id'] ?>"><?= $gen['gen_name'] ?></option>
                                                        <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="text-bold">Drug Name</label>
                                                <div class="input-group input-group-sm input-group-minimal">
										<span class="input-group-addon">
											<i class="fa fa-flask"></i>
										</span>
                                                    <input name="drug_id" id="drug_name" type="hidden"
                                                           placeholder="Drug name" class="form-control"
                                                           value="<?= $drug['drug_id'] ?>">
                                                    <input name="drug_name" id="drug_name_update" type="text"
                                                           placeholder="Drug name" class="form-control"
                                                           value="<?= $drug['drug_name'] ?>">
                                                </div>
                                                <p style="float: right" class="help-block">Ex: Estracon</p>
                                            </div>
                                            <div class="form-group">
                                                <label class="text-bold">Product Manager Name</label>
                                                <div class="input-group input-group-sm input-group-minimal">
										<span class="input-group-addon">
											<i class="linecons-user"></i>
										</span>
                                                    <input id="pm_name_update" name="pm_name" type="text"
                                                           placeholder="Product Manager Name"
                                                           class="form-control" value="<?= $drug['pm_name'] ?>">
                                                </div>
                                                <p style="float: right" class="help-block">Ex: Mr.Khayrul Islam</p>
                                            </div>
                                            <div class="form-group">
                                                <label class="text-bold">Product Manager Phone Number</label>
                                                <div class="input-group input-group-sm input-group-minimal">
										<span class="input-group-addon">
											<i class="linecons-mobile"></i>
										</span>
                                                    <input type="text" class="form-control" id="pm_phone_update"
                                                           name="pm_phone"
                                                           placeholder="Phone Number"
                                                           data-mask="phone"
                                                           value="<?= substr($drug['pm_phone'], 1, 10) ?>"/>
                                                </div>
                                                <p style="float: right" class="help-block">Ex: 183 587 9587</p>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-primary btn-block"
                                                   value="Save Drug Name">

                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="modal fade" id="delete_drug-<?= $i ?>">
                            <div class="modal-dialog">
                                <form action="<?php echo base_url() ?>med_info/delete_drug_name" method="post">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                &times;
                                            </button>
                                            <h3 align="center" class=" modal-title text-bold text-primary"><i
                                                        class="fa fa-warning"></i> Warning</h3>
                                        </div>

                                        <div class="modal-body">
                                            <div>
                                                <div class="form-group">
                                                    <p class="text-primary"><strong>* Are you sure to
                                                            delete this Drug Name?</strong></p>
                                                    <p class="text-primary"><strong>** If you delete this then all
                                                            regarding
                                                            information will be deleted.</strong></p>
                                                    <p class="text-primary"><strong>*** Please Enter Your Password &
                                                            Press Delete
                                                            Button.</strong></p>
                                                </div>
                                                <hr>
                                                <label class="text-primary text-bold">Drug Name</label>
                                                <input type="hidden" name="drug_id"
                                                       value="<?php echo $drug['drug_id'] ?>">
                                                <input style="background: #E0E0E0" type="password" name="password"
                                                       id="password" class="form-control"
                                                       placeholder="Please Enter Password For Delete Drug Name">
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <!--                                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>-->
                                            <button type="submit" class="btn btn-danger btn-block">Delete Drug Name
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Main Footer -->
    <!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
    <!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
    <!-- Or class "fixed" to  always fix the footer to the end of page -->
    <?php if (isset($footer)) {

        echo $footer;
    } ?>
</div>

