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
            <h1 class="title">Track Incentive</h1>
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

                    <strong>Track Incentives</strong>
                </li>
            </ol>

        </div>

    </div>

    <!-- Basic Setup -->
    <div class="panel panel-default"><!-- Add class "collapsed" to minimize the panel -->
        <div class="panel-heading">
            <h3 class="panel-title">Track Incentive</h3>

            <div class="panel-options">

                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab-1" data-toggle="tab">Gift Request</a>
                    </li>
                    <li>
                        <a href="#tab-2" data-toggle="tab">Gift History</a>
                    </li>

                </ul>

            </div>
        </div>

        <div class="panel-body">

            <div class="tab-content">

                <div class="tab-pane active" id="tab-1">
                    <a   class="btn btn-primary btn-icon btn-icon-standalone btn-icon-standalone-right" href="<?php echo base_url()?>tar_shop/export" ><i class="fa fa-download"></i><span>Download Gift Request</span></a>
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
                                <th></th>
                                <th>Incentive Image</th>
                                <th>Incentive Name</th>
                                <th>PSO Code</th>
                                <th>Employee ID</th>
                                <th>PSO Name</th>
                                <th>Region</th>
                                <th>Redemption Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th></th>
                                <th>Incentive Image</th>
                                <th>Incentive Name</th>
                                <th>PSO Code</th>
                                <th>Employee ID</th>
                                <th>PSO Name</th>
                                <th>Region</th>
                                <th>Redemption Date</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php foreach ($booked as $book){?>
                                <tr>
                                    <td><input type="checkbox" class="cbr"></td>
                                    <td ><img src="<?= $book['incentives_image'] ?>" class=" img-circle" alt=""
                                              height="50px" width="50px"></td>
                                    <td ><?php echo $book['incentives_name']?></td>
                                    <td ><?php echo $book['renata_id']?></td>
                                    <td ><?php echo $book['pso_id']?></td>
                                    <td ><?php echo $book['pso_name']?></td>
                                    <td ><?php echo $book['region']?></td>
                                    <td ><?php echo $book['redeem_date']?></td>
                                    <td ><a href="<?php echo base_url()?>tar_shop/approve_booking?tar_id=<?php echo $book['transection_id']?>" onclick="return approve_transaction();"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane" id="tab-2">
                    <a   class="btn btn-primary btn-icon btn-icon-standalone btn-icon-standalone-right" href="<?php echo base_url()?>tar_shop/export_history" ><i class="fa fa-download"></i><span>Download Gift History</span></a>
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
                        <table id="example-2" class="table table-striped table-bordered table-responsive" cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>Incentive Image</th>
                                <th>Incentive Name</th>
                                <th>PSO Code</th>
                                <th>Employee ID</th>
                                <th>PSO Name</th>
                                <th>Region</th>
                                <th>Approval Date</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Incentive Image</th>
                                <th>Incentive Name</th>
                                <th>PSO Code</th>
                                <th>Employee ID</th>
                                <th>PSO Name</th>
                                <th>Region</th>
                                <th>Approval Date</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php foreach ($history as $his){?>
                                <tr>
                                    <td ><img src="<?= $his['incentives_image'] ?>" class=" img-circle" alt=""
                                              height="50px" width="50px"></td>
                                    <td ><?php echo $his['incentives_name']?></td>
                                    <td ><?php echo $his['renata_id']?></td>
                                    <td ><?php echo $his['pso_id']?></td>
                                    <td ><?php echo $his['pso_name']?></td>
                                    <td ><?php echo $his['region']?></td>
                                    <td ><?php echo $his['approval_date']?></td>
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
