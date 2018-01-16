<?php
/**
 * Created by PhpStorm.
 * User: Sudipta Ghosh
 * Date: 11/16/2017
 * Time: 2:10 PM
 */
$i=0;
?>

<div class="main-content">

    <!-- User Info, Notifications and Menu Bar -->
    <?php echo $user_profile; ?>
    <div class="page-title">

        <div class="title-env">
            <h1 class="title">Manage PSO</h1>
            <p class="description">Manage your PSO information</p>
        </div>

        <div class="breadcrumb-env">

            <ol class="breadcrumb bc-1">
                <li>
                    <a href="<?php echo base_url() ?>home"><i class="fa-home"></i>Home</a>
                </li>
                <li>

                    <a href="#">PSO</a>
                </li>
                <li class="active">

                    <strong>Manage PSO</strong>
                </li>
            </ol>

        </div>

    </div>

    <!-- Basic Setup -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">All PSO List</h3>

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
            <?php if($this->session->userdata('update_password')=='Password Update Successful') { ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong><?php echo 'Password has been successfully updated'; ?></strong>
                </div>
                <?php $this->session->unset_userdata('update_password'); }?>
            <?php if($this->session->userdata('confirm_update_pso')=='PSO Account information has been successfully updated') { ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong><?php echo 'PSO Account information has been successfully updated'; ?></strong>
                </div>
                <?php $this->session->unset_userdata('confirm_update_pso');
            } ?>

            <?php if ($this->session->userdata('delete_account')) { ?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong><?php echo 'PSO Account has been successfully deleted'; ?></strong>
                </div>
                <?php $this->session->unset_userdata('delete_account');
            } ?>

            <?php if ($this->session->userdata('delete_gen')) { ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong><?php echo $this->session->userdata('delete_gen'); ?></strong>
                </div>
                <?php $this->session->unset_userdata('delete_gen');
            } ?>

            <?php  if ($this->session->userdata('confirm_add_pso') == 'Pso Insert Successful') { ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong><?php echo 'PSO Insert Successful'; ?></strong>
                </div>
                <?php $this->session->unset_userdata('confirm_add_pso');}?>

            <?php if (isset($miss_dsms)) {
                foreach ($miss_dsms as $miss_dsm){
                ?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong><?php echo $miss_dsm['pso_id'].' PSO DSM code is invalid please check manually' ?> </strong>
                </div>
                <?php } }?>

            <?php if (isset($pso_code_duplicates)) {
                foreach ($pso_code_duplicates as $code_duplicate){
                ?>
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong><?php echo $code_duplicate['renata_id'].' PSO code has been assigned to '.$code_duplicate['dup_id'].' number of PSO(s)'?> </strong>
                </div>
                <?php } }?>

        </div>

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
                        <th style="color: white; vertical-align: text-top;text-align: left ">Bcode</th>
                        <th style="color: white; vertical-align: text-top;text-align: left">PSO Code</th>
                        <th style="color: white; vertical-align: text-top;text-align: left">Renata ID</th>
                        <th style="color: white; vertical-align: text-top;text-align: left">PSO Name</th>
                        <th style="color: white; vertical-align: text-top;text-align: left">Depot</th>
                        <th style="color: white; vertical-align: text-top;text-align: left">Region</th>
                        <th style="color: white; vertical-align: text-top;text-align: left">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($psos as $pso){ $i++;?>
                        <tr>
                            <td><?php echo $pso['business_code']?></td>
                            <td><?php echo $pso['renata_id']?></td>
                            <td><?php echo $pso['pso_id']?></td>
                            <td><?php echo $pso['pso_name']?></td>
                            <td><?php echo $pso['depot_name']?></td>
                            <td><?php echo $pso['region']?></td>
                            <td>
                                <a href="<?php echo base_url()?>pso/update_password?pso_id=<?php echo $pso['pso_id']?>&&pso_number=<?php echo $pso['pso_phone']?>&&pso_renata_id=<?php echo $pso['renata_id']?>" onclick="return update_password();"><i class="fa fa-unlock-alt fa-lg" aria-hidden="true"></i></a>
                                <span class="table_insider"> | </span>
                                <a href="<?php echo base_url()?>pso/view_pso?pso_id=<?php echo $pso['pso_id']?>"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
                                <span class="table_insider"> | </span>
                                <a href="<?php echo base_url()?>pso/delete_account?pso_id=<?php echo $pso['pso_id']?>" onclick="return delete_account();"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>
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

