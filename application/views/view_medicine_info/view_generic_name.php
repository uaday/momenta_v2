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
            <h1 class="title">Generic Name</h1>
            <p class="description">Maintain the generic name of the drugs</p>
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
                    <strong>Generic Name</strong>
                </li>
            </ol>

        </div>

    </div>

    <!-- Basic Setup -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Basic Setup</h3>

            <div class="panel-options">
                <a href="#" data-toggle="panel">
                    <span class="collapse-icon">&ndash;</span>
                    <span class="expand-icon">+</span>
                </a>
                <a href="#" data-toggle="remove">
                    &times;
                </a>
            </div>
        </div>
        <div align="center">
            <?php if ($this->session->userdata('delete_pso_exams') == 'Pso Test Delete Successful') { ?>
                <div class="alert alert-success"><strong><?php echo 'Pso Test Delete Successful'; ?></strong></div>
                <?php $this->session->unset_userdata('delete_pso_exams');
            } ?>
            <?php if ($this->session->userdata('add_gen')) { ?>
                <div class="alert alert-success"><strong><?php echo $this->session->userdata('add_gen'); ?></strong>
                </div>
                <?php $this->session->unset_userdata('add_gen');
            } ?>

            <?php if ($this->session->userdata('pass_issue')) { ?>
                <div class="alert alert-danger">
                    <strong><?php echo $this->session->userdata('pass_issue'); ?></strong>
                </div>
                <?php $this->session->unset_userdata('pass_issue');
            } ?>

            <?php if ($this->session->userdata('delete_gen')) { ?>
                <div class="alert alert-success">
                    <strong><?php echo $this->session->userdata('delete_gen'); ?></strong>
                </div>
                <?php $this->session->unset_userdata('delete_gen');
            } ?>

            <?php if ($this->session->userdata('gen_error')) { ?>
                <div class="alert alert-danger">
                    <strong><?php echo $this->session->userdata('gen_error'); ?></strong>
                </div>
                <?php $this->session->unset_userdata('gen_error');
            } ?>

        </div>
        <div class="modal fade" id="add_gen" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <form action="<?php echo base_url() ?>med_info/add_gen_name" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close cross_btn no_back_btn"
                                    data-dismiss="modal">&times;
                            </button>
                            <h3 class="modal-title text-bold">Add Generic Name</h3>

                        </div>
                        <div class="modal-body" >

                            <div class="form-group">
                                <label class="text-bold">Business</label>
                                <select name="bcode" id="business" class="form-control">
                                    <?php foreach ($business as $business) { if($business['business_code']!='00'){?>
                                        <option value="<?= $business['business_code'] ?>"><?= $business['business_name'] ?></option>
                                    <?php } }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="text-bold">Generic Name</label>
                                <input name="gen_name" type="text" placeholder="Generic name" class="form-control">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary btn-block" value="Add Generic Name">

                        </div>
                    </div>
                </form>

            </div>
        </div>
        <div class="panel-body">
            <div class="col-md-offset-11 col-md-1" style="margin-bottom: 10px;">
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
                <table id="example-1" class="table table-striped table-bordered table-responsive" cellspacing="0"
                       width="100%">
                    <thead>
                    <tr>
                        <!--                        <th>Generic Name ID</th>-->
                        <th>Business Name</th>
                        <th>Generic Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <!--                        <th>Generic Name ID</th>-->
                        <th>Business Name</th>
                        <th>Generic Name</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php foreach ($gens as $gen) {
                        $i++ ?>
                        <tr>
                            <!--                            <td>--><? //= $gen['gen_id'] ?><!--</td>-->
                            <td><?= $gen['business_name'] ?></td>
                            <td><?= $gen['gen_name'] ?></td>
                            <td>
                                <a href="javascript:;"
                                   onclick="jQuery('#edit_gen-<?= $i ?>').modal('show');"
                                   class="btn btn-primary btn-single btn-sm">Edit</a>
                                <span class="table_insider"> | </span>
                                <a href="javascript:;"
                                   onclick="jQuery('#delete_gen-<?= $i ?>').modal('show', {backdrop: 'fade'});"
                                   class="btn btn-danger btn-single btn-sm">Delete</a>
                            </td>
                        </tr>

                        <div class="modal fade" id="edit_gen-<?= $i ?>">
                            <div class="modal-dialog">
                                <form action="<?php echo base_url() ?>med_info/edit_gen_name" method="post">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                &times;
                                            </button>
                                            <h3 class="modal-title text-bold text-primary"><i class="fa fa-edit"></i>
                                                Edit Generic Name</h3>
                                        </div>

                                        <div class="modal-body">
                                            <div>
                                                <div class="form-group">
                                                    <label class="text-bold text-primary">Business</label>
                                                    <select name="bcode" id="business" class="form-control">
                                                        <?php foreach ($business as $business) { if($business['business_code']!='00'){?>
                                                            <option <?php if ($business['business_code'] == $gen['tbl_business_business_code']) echo 'selected' ?>
                                                                    value="<?= $business['business_code'] ?>"><?= $business['business_name'] ?></option>
                                                        <?php } }?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-bold text-primary">Generic Name</label>
                                                    <input type="hidden" name="gen_id"
                                                           value="<?php echo $gen['gen_id'] ?>">
                                                    <input name="gen_name" type="text" placeholder="Generic name"
                                                           value="<?php echo $gen['gen_name'] ?>" class="form-control">
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
                        <div class="modal fade" id="delete_gen-<?= $i ?>">
                            <div class="modal-dialog">
                                <form action="<?php echo base_url() ?>med_info/delete_generic_name" method="post">
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
                                                <input type="hidden" name="gen_id" value="<?php echo $gen['gen_id'] ?>">
                                                <input style="background: #E0E0E0" type="password" name="password"
                                                       id="password" class="form-control"
                                                       placeholder="Please Enter Password For Delete Generic Name">
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
