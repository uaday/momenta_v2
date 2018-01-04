<?php
/**
 * Created by PhpStorm.
 * User: Sudipta
 * Date: 11/07/2017
 * Time: 12:47 PM
 */
?>

<div class="main-content">

    <!-- User Info, Notifications and Menu Bar -->
    <?php echo $user_profile; ?>
    <div class="page-title">

        <div class="title-env">
            <h1 class="title">Manage USER</h1>
            <p class="description">Manage all user for maintain your pso's</p>
        </div>

        <div class="breadcrumb-env">

            <ol class="breadcrumb bc-1">
                <li>
                    <a href="<?php echo base_url() ?>home"><i class="fa-home"></i>Home</a>
                </li>
                <li>

                    <a href="#">User</a>
                </li>
                <li class="active">

                    <strong>Manage User</strong>
                </li>
            </ol>

        </div>

    </div>

    <div class="row">
        <div align="center">
            <?php if($this->session->userdata('block_user')) { ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong><?php echo $this->session->userdata('block_user') ?></strong>
                </div>
                <?php $this->session->unset_userdata('block_user'); }?>

            <?php if($this->session->userdata('active_user')) { ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong><?php echo $this->session->userdata('active_user') ?></strong>
                </div>
                <?php $this->session->unset_userdata('active_user'); }?>

            <?php if($this->session->userdata('delete_user')) { ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong><?php echo $this->session->userdata('delete_user') ?></strong>
                </div>
                <?php $this->session->unset_userdata('delete_user'); }?>

            <?php if($this->session->userdata('update_user')) { ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong><?php echo $this->session->userdata('update_user') ?></strong>
                </div>
                <?php $this->session->unset_userdata('update_user'); }?>

        </div>
    </div>

    <div class="row">

        <div class="col-md-12">

            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#admin_user" data-toggle="tab">Admin </a>
                </li>
                <li>
                    <a href="#gm_user" data-toggle="tab">GM</a>
                </li>
                <li >
                    <a href="#marketing_user" data-toggle="tab">Marketing</a>
                </li>
                <li>
                    <a href="#msd_user" data-toggle="tab">MSD</a>
                </li>
                <li>
                    <a href="#sm_user" data-toggle="tab">Sales</a>
                </li>
                <li>
                    <a href="#rsm_user" data-toggle="tab">RSM</a>
                </li>
                <li>
                    <a href="#dsm_user" data-toggle="tab">DSM</a>
                </li>

            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="admin_user">
                    <a   class="btn btn-primary btn-icon btn-icon-standalone btn-icon-standalone-right" href="<?php echo base_url()?>user/export_admin_status_report" ><i class="fa fa-download"></i><span>Download Admin Status Report</span></a>
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
                                <th style="color: white; vertical-align: text-top;text-align: left">Bcode</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Renata ID</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">User Name</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Last Login Date</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Last Login Time</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Status</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($admins as $admin) {?>
                                <tr>
                                    <td ><?php echo $admin['business_code'] ?></td>
                                    <td ><?php echo $admin['renata_id'] ?></td>
                                    <td><?php echo $admin['name'] ?></td>
                                    <td><?php echo $admin['last_login_date'] ?></td>
                                    <td><?php echo $admin['last_login_time'] ?></td>
                                    <?php if ($admin['status'] == '1') { ?>
                                        <td>Active</td>
                                    <?php } else { ?>
                                        <td>Block</td>
                                    <?php } ?>
                                    <td>
                                        <?php if ($admin['status'] == '1') { ?>
                                            <a title="Block User" href="<?php echo base_url()?>user/block_user?renata_id=<?php echo $admin['renata_id']?>&user_type=2"><span class="fa fa-2x fa-thumbs-o-down"></span></a>|
                                        <?php } else { ?>
                                            <a title="Active User" href="<?php echo base_url()?>user/active_user?renata_id=<?php echo $admin['renata_id']?>&user_type=2"><span class="fa fa-2x fa-thumbs-o-up"></span></a>|
                                        <?php } ?>
                                        <a title="Change Password" href="<?php echo base_url()?>user/reset_password?renata_id=<?php echo $admin['renata_id']?>&user_type=2" onclick="return change_user_password();"><span class="fa fa-2x fa-unlock-alt"></span></a>|
                                        <a title="Edit User" href="<?php echo base_url()?>user/edit_user?renata_id=<?php echo $admin['renata_id']?>&user_type=2"><span class="fa fa-2x fa-edit"></span></a>|
                                        <a title="Delete User" href="<?php echo base_url()?>user/delete_user?renata_id=<?php echo $admin['renata_id']?>&user_type=2" onclick="return delete_user();"><span class="fa fa-2x fa-trash"></span></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane " id="gm_user">
                    <a   class="btn btn-primary btn-icon btn-icon-standalone btn-icon-standalone-right" href="<?php echo base_url()?>user/export_gm_status_report" ><i class="fa fa-download"></i><span>Download GM Status Report</span></a>
                    <div class="table-responsive">
                        <script type="text/javascript">
                            jQuery(document).ready(function ($) {
                                $("#example-2").dataTable({
                                    aLengthMenu: [
                                        [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
                                    ]
                                });
                            });
                        </script>
                        <table id="example-2" class="table table-striped  table-responsive" cellspacing="0"
                               width="100%">
                            <thead style="background-color: #2c2e2f;color: white">
                            <tr>
                                <th style="color: white; vertical-align: text-top;text-align: left">Bcode</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Renata ID</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">User Name</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Last Login Date</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Last Login Time</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Status</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($gms as $gm) {?>
                                <tr>
                                    <td ><?php echo $gm['business_code'] ?></td>
                                    <td ><?php echo $gm['renata_id'] ?></td>
                                    <td><?php echo $gm['name'] ?></td>
                                    <td><?php echo $gm['last_login_date'] ?></td>
                                    <td><?php echo $gm['last_login_time'] ?></td>
                                    <?php if ($gm['status'] == '1') { ?>
                                        <td>Active</td>
                                    <?php } else { ?>
                                        <td>Block</td>
                                    <?php } ?>
                                    <td>
                                        <?php if ($gm['status'] == '1') { ?>
                                            <a title="Block User" href="<?php echo base_url()?>user/block_user?renata_id=<?php echo $gm['renata_id']?>&user_type=7"><span class="fa fa-2x fa-thumbs-o-down"></span></a>|
                                        <?php } else { ?>
                                            <a title="Active User" href="<?php echo base_url()?>user/active_user?renata_id=<?php echo $gm['renata_id']?>&user_type=7"><span class="fa fa-2x fa-thumbs-o-up"></span></a>|
                                        <?php } ?>
                                        <a title="Change Password" href="<?php echo base_url()?>user/reset_password?renata_id=<?php echo $gm['renata_id']?>&user_type=7" onclick="return change_user_password();"><span class="fa fa-2x fa-unlock-alt"></span></a>|
                                        <a title="Edit User" href="<?php echo base_url()?>user/edit_user?renata_id=<?php echo $gm['renata_id']?>&user_type=7"><span class="fa fa-2x fa-edit"></span></a>|
                                        <a title="Delete User" href="<?php echo base_url()?>user/delete_user?renata_id=<?php echo $gm['renata_id']?>&user_type=7" onclick="return delete_user();"><span class="fa fa-2x fa-trash"></span></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane " id="marketing_user">
                    <a   class="btn btn-primary btn-icon btn-icon-standalone btn-icon-standalone-right" href="<?php echo base_url()?>user/export_marketing_status_report" ><i class="fa fa-download"></i><span>Download Marketing Status Report</span></a>
                    <div class="table-responsive">
                        <script type="text/javascript">
                            jQuery(document).ready(function ($) {
                                $("#example-3").dataTable({
                                    aLengthMenu: [
                                        [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
                                    ]
                                });
                            });
                        </script>
                        <table id="example-3" class="table table-striped  table-responsive" cellspacing="0"
                               width="100%">
                            <thead style="background-color: #2c2e2f;color: white">
                            <tr>
                                <th style="color: white; vertical-align: text-top;text-align: left">Bcode</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Renata ID</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">User Name</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Last Login Date</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Last Login Time</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Status</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($its as $it) {?>
                                <tr>
                                    <td ><?php echo $it['business_code'] ?></td>
                                    <td ><?php echo $it['renata_id'] ?></td>
                                    <td><?php echo $it['name'] ?></td>
                                    <td><?php echo $it['last_login_date'] ?></td>
                                    <td><?php echo $it['last_login_time'] ?></td>
                                    <?php if ($it['status'] == '1') { ?>
                                        <td>Active</td>
                                    <?php } else { ?>
                                        <td>Block</td>
                                    <?php } ?>
                                    <td>
                                        <?php if ($it['status'] == '1') { ?>
                                            <a title="Block User" href="<?php echo base_url()?>user/block_user?renata_id=<?php echo $it['renata_id']?>&user_type=3"><span class="fa fa-2x fa-thumbs-o-down"></span></a>|
                                        <?php } else { ?>
                                            <a title="Active User" href="<?php echo base_url()?>user/active_user?renata_id=<?php echo $it['renata_id']?>&user_type=3"><span class="fa fa-2x fa-thumbs-o-up"></span></a>|
                                        <?php } ?>
                                        <a title="Change Password" href="<?php echo base_url()?>user/reset_password?renata_id=<?php echo $it['renata_id']?>&user_type=3" onclick="return change_user_password();"><span class="fa fa-2x fa-unlock-alt"></span></a>|
                                        <a title="Edit User" href="<?php echo base_url()?>user/edit_user?renata_id=<?php echo $it['renata_id']?>&user_type=3"><span class="fa fa-2x fa-edit"></span></a>|
                                        <a title="Delete User" href="<?php echo base_url()?>user/delete_user?renata_id=<?php echo $it['renata_id']?>&user_type=3" onclick="return delete_user();"><span class="fa fa-2x fa-trash"></span></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane " id="msd_user">
                    <a   class="btn btn-primary btn-icon btn-icon-standalone btn-icon-standalone-right" href="<?php echo base_url()?>user/export_msd_status_report" ><i class="fa fa-download"></i><span>Download MSD Status Report</span></a>
                    <div class="table-responsive">
                        <script type="text/javascript">
                            jQuery(document).ready(function ($) {
                                $("#example-7").dataTable({
                                    aLengthMenu: [
                                        [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
                                    ]
                                });
                            });
                        </script>
                        <table id="example-7" class="table table-striped  table-responsive" cellspacing="0"
                               width="100%">
                            <thead style="background-color: #2c2e2f;color: white">
                            <tr>
                                <th style="color: white; vertical-align: text-top;text-align: left">Bcode</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Renata ID</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">User Name</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Last Login Date</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Last Login Time</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Status</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($msds as $msd) {?>
                                <tr>
                                    <td ><?php echo $msd['business_code'] ?></td>
                                    <td ><?php echo $msd['renata_id'] ?></td>
                                    <td><?php echo $msd['name'] ?></td>
                                    <td><?php echo $msd['last_login_date'] ?></td>
                                    <td><?php echo $msd['last_login_time'] ?></td>
                                    <?php if ($msd['status'] == '1') { ?>
                                        <td>Active</td>
                                    <?php } else { ?>
                                        <td>Block</td>
                                    <?php } ?>
                                    <td>
                                        <?php if ($msd['status'] == '1') { ?>
                                            <a title="Block User" href="<?php echo base_url()?>user/block_user?renata_id=<?php echo $msd['renata_id']?>&user_type=8"><span class="fa fa-2x fa-thumbs-o-down"></span></a>|
                                        <?php } else { ?>
                                            <a title="Active User" href="<?php echo base_url()?>user/active_user?renata_id=<?php echo $msd['renata_id']?>&user_type=8"><span class="fa fa-2x fa-thumbs-o-up"></span></a>|
                                        <?php } ?>
                                        <a title="Change Password" href="<?php echo base_url()?>user/reset_password?renata_id=<?php echo $msd['renata_id']?>&user_type=8" onclick="return change_user_password();"><span class="fa fa-2x fa-unlock-alt"></span></a>|
                                        <a title="Edit User" href="<?php echo base_url()?>user/edit_user?renata_id=<?php echo $msd['renata_id']?>&user_type=8"><span class="fa fa-2x fa-edit"></span></a>|
                                        <a title="Delete User" href="<?php echo base_url()?>user/delete_user?renata_id=<?php echo $msd['renata_id']?>&user_type=8" onclick="return delete_user();"><span class="fa fa-2x fa-trash"></span></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane " id="sm_user">
                    <a   class="btn btn-primary btn-icon btn-icon-standalone btn-icon-standalone-right" href="<?php echo base_url()?>user/export_sm_status_report" ><i class="fa fa-download"></i><span>Download SM Status Report</span></a>
                    <div class="table-responsive">
                        <script type="text/javascript">
                            jQuery(document).ready(function ($) {
                                $("#example-4").dataTable({
                                    aLengthMenu: [
                                        [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
                                    ]
                                });
                            });
                        </script>
                        <table id="example-4" class="table table-striped  table-responsive" cellspacing="0"
                               width="100%">
                            <thead style="background-color: #2c2e2f;color: white">
                            <tr>
                                <th style="color: white; vertical-align: text-top;text-align: left">Bcode</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">SM Code</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Renata ID</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">User Name</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Last Login Date</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Last Login Time</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Status</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($sales as $sale) {?>
                                <tr>
                                    <td ><?php echo $sale['business_code'] ?></td>
                                    <td ><?php echo $sale['sm_code'] ?></td>
                                    <td ><?php echo $sale['renata_id'] ?></td>
                                    <td><?php echo $sale['name'] ?></td>
                                    <td><?php echo $sale['last_login_date'] ?></td>
                                    <td><?php echo $sale['last_login_time'] ?></td>
                                    <?php if ($sale['status'] == '1') { ?>
                                        <td>Active</td>
                                    <?php } else { ?>
                                        <td>Block</td>
                                    <?php } ?>
                                    <td>
                                        <?php if ($sale['status'] == '1') { ?>
                                            <a title="Block User" href="<?php echo base_url()?>user/block_user?renata_id=<?php echo $sale['renata_id']?>&user_type=4"><span class="fa fa-2x fa-thumbs-o-down"></span></a>|
                                        <?php } else { ?>
                                            <a title="Active User" href="<?php echo base_url()?>user/active_user?renata_id=<?php echo $sale['renata_id']?>&user_type=4"><span class="fa fa-2x fa-thumbs-o-up"></span></a>|
                                        <?php } ?>
                                        <a title="Change Password" href="<?php echo base_url()?>user/reset_password?renata_id=<?php echo $sale['renata_id']?>&user_type=4" onclick="return change_user_password();"><span class="fa fa-2x fa-unlock-alt"></span></a>|
                                        <a title="Edit User" href="<?php echo base_url()?>user/edit_user?renata_id=<?php echo $sale['renata_id']?>&user_type=4"><span class="fa fa-2x fa-edit"></span></a>|
                                        <a title="Delete User" href="<?php echo base_url()?>user/delete_user?renata_id=<?php echo $sale['renata_id']?>&user_type=4" onclick="return delete_user();"><span class="fa fa-2x fa-trash"></span></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane " id="rsm_user">
                    <a   class="btn btn-primary btn-icon btn-icon-standalone btn-icon-standalone-right" href="<?php echo base_url()?>user/export_rsm_status_report" ><i class="fa fa-download"></i><span>Download RSM Status Report</span></a>
                    <div class="table-responsive">
                        <script type="text/javascript">
                            jQuery(document).ready(function ($) {
                                $("#example-5").dataTable({
                                    aLengthMenu: [
                                        [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
                                    ]
                                });
                            });
                        </script>
                        <table id="example-5" class="table table-striped  table-responsive" cellspacing="0"
                               width="100%">
                            <thead style="background-color: #2c2e2f;color: white">
                            <tr>
                                <th style="color: white; vertical-align: text-top;text-align: left">Bcode</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">SM Code</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">RSM Code</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Renata ID</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">User Name</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Last Login Date</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Last Login Time</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Status</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($rsms as $rsm) {?>
                                <tr>
                                    <td ><?php echo $rsm['business_code'] ?></td>
                                    <td ><?php echo $rsm['tbl_user_sm_sm_code'] ?></td>
                                    <td ><?php echo $rsm['rsm_code'] ?></td>
                                    <td ><?php echo $rsm['renata_id'] ?></td>
                                    <td><?php echo $rsm['name'] ?></td>
                                    <td><?php echo $rsm['last_login_date'] ?></td>
                                    <td><?php echo $rsm['last_login_time'] ?></td>
                                    <?php if ($rsm['status'] == '1') { ?>
                                        <td>Active</td>
                                    <?php } else { ?>
                                        <td>Block</td>
                                    <?php } ?>
                                    <td>
                                        <?php if ($rsm['status'] == '1') { ?>
                                            <a title="Block User" href="<?php echo base_url()?>user/block_user?renata_id=<?php echo $rsm['renata_id']?>&user_type=5"><span class="fa fa-2x fa-thumbs-o-down"></span></a>|
                                        <?php } else { ?>
                                            <a title="Active User" href="<?php echo base_url()?>user/active_user?renata_id=<?php echo $rsm['renata_id']?>&user_type=5"><span class="fa fa-2x fa-thumbs-o-up"></span></a>|
                                        <?php } ?>
                                        <a title="Change Password" href="<?php echo base_url()?>user/reset_password?renata_id=<?php echo $rsm['renata_id']?>&user_type=5" onclick="return change_user_password();"><span class="fa fa-2x fa-unlock-alt"></span></a>|
                                        <a title="Edit User" href="<?php echo base_url()?>user/edit_user?renata_id=<?php echo $rsm['renata_id']?>&user_type=5"><span class="fa fa-2x fa-edit"></span></a>|
                                        <a title="Delete User" href="<?php echo base_url()?>user/delete_user?renata_id=<?php echo $rsm['renata_id']?>&user_type=5" onclick="return delete_user();"><span class="fa fa-2x fa-trash"></span></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane " id="dsm_user">
                    <a   class="btn btn-primary btn-icon btn-icon-standalone btn-icon-standalone-right" href="<?php echo base_url()?>user/export_dsm_status_report" ><i class="fa fa-download"></i><span>Download DSM Status Report</span></a>
                    <div class="table-responsive">
                        <script type="text/javascript">
                            jQuery(document).ready(function ($) {
                                $("#example-6").dataTable({
                                    aLengthMenu: [
                                        [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
                                    ]
                                });
                            });
                        </script>
                        <table id="example-6" class="table table-striped  table-responsive" cellspacing="0"
                               width="100%">
                            <thead style="background-color: #2c2e2f;color: white">
                            <tr>
                                <th style="color: white; vertical-align: text-top;text-align: left">Bcode</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">RM Code</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">DSM Code</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Renata ID</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">User Name</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Last Login Date</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Last Login Time</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Status</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($dsms as $dsm) {?>
                                <tr>
                                    <td ><?php echo $dsm['business_code'] ?></td>
                                    <td ><?php echo $dsm['tbl_user_rsm_rsm_code'] ?></td>
                                    <td ><?php echo $dsm['dsm_code'] ?></td>
                                    <td ><?php echo $dsm['renata_id'] ?></td>
                                    <td><?php echo $dsm['name'] ?></td>
                                    <td><?php echo $dsm['last_login_date'] ?></td>
                                    <td><?php echo $dsm['last_login_time'] ?></td>
                                    <?php if ($dsm['status'] == '1') { ?>
                                        <td>Active</td>
                                    <?php } else { ?>
                                        <td>Block</td>
                                    <?php } ?>
                                    <td>
                                        <?php if ($dsm['status'] == '1') { ?>
                                            <a title="Block User" href="<?php echo base_url()?>user/block_user?renata_id=<?php echo $dsm['renata_id']?>&user_type=6"><span class="fa fa-2x fa-thumbs-o-down"></span></a>|
                                        <?php } else { ?>
                                            <a title="Active User" href="<?php echo base_url()?>user/active_user?renata_id=<?php echo $dsm['renata_id']?>&user_type=6"><span class="fa fa-2x fa-thumbs-o-up"></span></a>|
                                        <?php } ?>
                                        <a title="Change Password" href="<?php echo base_url()?>user/reset_password?renata_id=<?php echo $dsm['renata_id']?>&user_type=6" onclick="return change_user_password();"><span class="fa fa-2x fa-unlock-alt"></span></a>|
                                        <a title="Edit User" href="<?php echo base_url()?>user/edit_user?renata_id=<?php echo $dsm['renata_id']?>&user_type=6"><span class="fa fa-2x fa-edit"></span></a>|
                                        <a title="Delete User" href="<?php echo base_url()?>user/delete_user?renata_id=<?php echo $dsm['renata_id']?>&user_type=6" onclick="return delete_user();"><span class="fa fa-2x fa-trash"></span></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

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

