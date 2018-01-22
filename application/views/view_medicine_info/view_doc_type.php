<?php
/**
 * Created by PhpStorm.
 * User: Sudipta Ghosh
 * Date: 10/29/2017
 * Time: 2:47 PM
 */
$i = 0;
?>


<div class="main-content">

    <!-- User Info, Notifications and Menu Bar -->
    <?php echo $user_profile; ?>
    <div class="page-title">

        <div class="title-env">
            <h1 class="title">Doctor Type</h1>
            <p class="description">Maintain the doctors for drugs</p>
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
                    <strong>Doctor Type</strong>
                </li>
            </ol>

        </div>

    </div>

    <!-- Basic Setup -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">All Doctor Type</h3>
        </div>
        <div align="center">
            <?php if ($this->session->userdata('delete_pso_exams') == 'Pso Test Delete Successful') { ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong><?php echo 'Pso Test Delete Successful'; ?></strong>
                </div>
                <?php $this->session->unset_userdata('delete_pso_exams');
            } ?>
            <?php if ($this->session->userdata('add_gen')) { ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong><?php echo $this->session->userdata('add_gen'); ?></strong>
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
        <div class="modal fade" id="add_gen" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <form  onsubmit="return add_generic_name()" action="<?php echo base_url() ?>med_info/add_doc_type" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close cross_btn no_back_btn"
                                    data-dismiss="modal">&times;
                            </button>
                            <h3 class="modal-title text-bold">Add Doctor Type</h3>

                        </div>
                        <div class="modal-body" >

                            <div class="form-group">
                                <label class="text-bold">Business</label>

                                <script type="text/javascript">
                                    jQuery(document).ready(function($)
                                    {
                                        $("#business").selectBoxIt({
                                            showFirstOption: false
                                        }).on('open', function()
                                        {
                                            // Adding Custom Scrollbar
                                            $(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
                                        });
                                    });
                                </script>

                                <select  required="required" name="bcode" class="form-control business" id="business" >
                                    <option value="-1">Select Business</option>
                                    <?php foreach ($business as $bus) { if($bus['business_code']!='00'){?>
                                        <option value="<?= $bus['business_code'] ?>"><?= $bus['business_name'] ?></option>
                                    <?php } }?>
                                </select>

                            </div>
                            <div class="form-group">
                                <label class="text-bold">Doctor Type</label>
                                <input required="required" name="doc_type" type="text" placeholder="Doctor Type" class="form-control">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary btn-block" value="Add Doctor Type">

                        </div>
                    </div>
                </form>

            </div>
        </div>
        <div class="panel-body">
            <div class="" style="margin-bottom: 10px;">
                <a  href="javascript:;"
                    onclick="jQuery('#add_gen').modal('show', {backdrop: 'fade'});"
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
                <table id="example-1" class="table table-striped  table-responsive" cellspacing="0"
                       width="100%">
                    <thead style="background-color: #2c2e2f;color: white">
                    <tr>
                        <!--                        <th>Generic Name ID</th>-->
                        <th style="color: white; vertical-align: text-top;text-align: left">Bcode</th>
                        <th style="color: white; vertical-align: text-top;text-align: left">Doctor Type</th>
                        <th style="color: white; vertical-align: text-top;text-align: left">Action</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php foreach ($docs as $doc) {
                        $i++ ?>
                        <tr>
                            <!--                            <td>--><? //= $doc['gen_id'] ?><!--</td>-->
                            <td><?= $doc['business_code'] ?></td>
                            <td><?= $doc['type_name'] ?></td>
                            <td>
                                <a href="javascript:;"
                                   onclick="jQuery('#edit_doc-<?= $i ?>').modal('show');"
                                   class="btn btn-primary btn-icon btn-icon-standalone btn-icon-standalone-left btn-sm"><i class="fa fa-edit "></i> <span class="hidden-xs text-uppercase"> Edit</span></a>
                                <span class="table_insider"> | </span>
                                <a href="javascript:;"
                                   onclick="jQuery('#delete_doc-<?= $i ?>').modal('show', {backdrop: 'fade'});"
                                   class="btn btn-danger btn-icon btn-icon-standalone btn-icon-standalone-left btn-sm"><i class="fa fa-trash "></i> <span class="hidden-xs text-uppercase"> Delete</span></a>
                            </td>
                        </tr>

                        <div class="modal fade" id="edit_doc-<?= $i ?>">
                            <div class="modal-dialog">
                                <form action="<?php echo base_url() ?>med_info/edit_doc_type" method="post">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                &times;
                                            </button>
                                            <h3 class="modal-title text-bold text-primary"><i class="fa fa-edit"></i>
                                                Edit Doctor Type</h3>
                                        </div>

                                        <div class="modal-body">
                                            <div>
                                                <div class="form-group">
                                                    <label class="text-bold text-primary">Business</label>
                                                    <select name="bcode" id="business" class="form-control">
                                                        <?php foreach ($business as $bus1) { if($bus1['business_code']!='00'){?>
                                                            <option <?php if($bus1['business_code']==$doc['tbl_business_business_code']) echo 'selected'?> value="<?= $bus1['business_code'] ?>"><?= $bus1['business_name'] ?></option>
                                                        <?php } }?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-bold text-primary">Doctor Type</label>
                                                    <input type="hidden" name="doc_type_id" value="<?php echo $doc['doc_type_id']?>">
                                                    <input name="doc_type" type="text" placeholder="Doctor Type"
                                                           value="<?php echo $doc['type_name'] ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <!--                                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>-->
                                            <button type="submit" class="btn btn-primary btn-block">Save changes
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal fade" id="delete_doc-<?= $i ?>">
                            <div class="modal-dialog">
                                <form action="<?php echo base_url() ?>med_info/delete_doc_type" method="post">
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
                                                            delete this generic Name?</strong></p>
                                                    <p class="text-primary"><strong>** If you delete this then all
                                                            regarding
                                                            information will be deleted.</strong></p>
                                                    <p class="text-primary"><strong>*** Please Enter Your Password &
                                                            Press Delete
                                                            Button.</strong></p>
                                                </div>
                                                <hr>
                                                <label class="text-primary text-bold">Generic Name</label>
                                                <input type="hidden" name="doc_type_id" value="<?php echo $doc['doc_type_id'] ?>">
                                                <input style="background: #E0E0E0" type="password" name="password"
                                                       id="password" class="form-control"
                                                       placeholder="Please Enter Password For Delete Doctor Type">
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <!--                                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>-->
                                            <button type="submit" class="btn btn-danger btn-block">Delete Generic Name
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

