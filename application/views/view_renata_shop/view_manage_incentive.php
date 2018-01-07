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
            <h1 class="title">Renata Shop</h1>
            <p class="description">Manage all incentives for pso encouragements</p>
        </div>

        <div class="breadcrumb-env">

            <ol class="breadcrumb bc-1">
                <li>
                    <a href="<?php echo base_url() ?>home"><i class="fa-home"></i>Home</a>
                </li>
                <li>

                    <a href="#">Renata Shop</a>
                </li>
                <li class="active">

                    <strong>All Incentives</strong>
                </li>
            </ol>

        </div>

    </div>

    <!-- Basic Setup -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">All Incentives</h3>

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
        <?php if ($this->session->userdata('active_incentives')) { ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong><?php echo $this->session->userdata('active_incentives'); ?></strong>
            </div>
            <?php $this->session->unset_userdata('active_incentives');
        } ?>
        <?php if ($this->session->userdata('inactive_incentives')) { ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong><?php echo $this->session->userdata('inactive_incentives'); ?></strong>
            </div>
            <?php $this->session->unset_userdata('inactive_incentives');
        } ?>
        <?php if ($this->session->userdata('delete_incentives')) { ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong><?php echo $this->session->userdata('delete_incentives'); ?></strong>
            </div>
            <?php $this->session->unset_userdata('delete_incentives');
        } ?>
        <?php if ($this->session->userdata('update_incentives')) { ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong><?php echo $this->session->userdata('update_incentives'); ?></strong>
            </div>
            <?php $this->session->unset_userdata('update_incentives');
        } ?>

        <div class="panel-body">
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
                        <th style="color: white; vertical-align: text-top;text-align: left">Image</th>
                        <th style="color: white; vertical-align: text-top;text-align: left">Bcode</th>
                        <th style="color: white; vertical-align: text-top;text-align: left">Name</th>
                        <th style="color: white; vertical-align: text-top;text-align: left">Points</th>
                        <th style="color: white; vertical-align: text-top;text-align: left">Stock</th>
                        <th style="color: white; vertical-align: text-top;text-align: left">Exp Date</th>
                        <th style="color: white; vertical-align: text-top;text-align: left">Status</th>
                        <th style="color: white; vertical-align: text-top;text-align: left">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($incentives as $incentive) { ?>
                        <tr>
                            <td><img src="<?= $incentive['incentives_image'] ?>" class=" img-circle" alt=""
                                     height="50px" width="50px">
                            </td>
                            <td><?= $incentive['business_code'] ?></td>
                            <td><?= $incentive['incentives_name'] ?></td>
                            <td><?= $incentive['incentives_point'] ?></td>
                            <td><?= $incentive['quantity'] ?></td>
                            <td><?= $incentive['exp_date'] ?></td>
                            <?php if ($incentive['status'] == '1') { ?>
                                <td>Active</td>
                            <?php } else { ?>
                                <td>Inactive</td>
                            <?php } ?>
                            <td>
                                <?php if ($incentive['status'] == '1') { ?>
                                    <a href="<?php echo base_url() ?>tar_shop/change_status?incentives_id=<?php echo  $incentive['incentives_id']?>&incentives_name=<?= $incentive['incentives_name']?>&status=0"
                                       title="Inactive" >
                                        <i class="fa-thumbs-o-down fa-2x"></i>
                                    </a>
                                <?php } else { ?>
                                    <a href="<?php echo base_url() ?>tar_shop/change_status?incentives_id=<?php echo  $incentive['incentives_id']?>&incentive_name=<?= $incentive['incentives_name']?>&status=1"
                                       title="active" >
                                        <i class="fa-thumbs-o-up fa-2x"></i>
                                    </a>
                                <?php } ?>
                                <span class="table_insider"> | </span>
                                <a href="<?php echo base_url() ?>tar_shop/edit_incentive?incentives_id=<?php echo  $incentive['incentives_id'] ?>"
                                   title="active" >
                                    <i class="fa fa-edit fa-2x"></i>
                                </a>
                                <span class="table_insider"> | </span>
                                <a  onclick="return delete_incentive()"
                                    href="<?php echo base_url() ?>tar_shop/delete_incentives?incentives_id=<?php echo  $incentive['incentives_id'] ?>"
                                   title="Delete Incentive" >
                                    <i class="fa fa-trash fa-2x"></i>
                                </a>
                            </td>
                        </tr>
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
