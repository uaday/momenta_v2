<?php
/**
 * Created by PhpStorm.
 * User: Sudipta Ghosh
 * Date: 11/28/2017
 * Time: 12:01 PM
 */
$i=0;
//$a_sum=0;
//$na_sum=0;
//$p_sum=0;
//$f_sum=0;
//$a_sum=$a_sum+round(($report['attend']/($report['attend']+$report['nattend']))*100);$na_sum=$na_sum+round(($report['nattend']/($report['attend']+$report['nattend']))*100);
//$p_sum=$p_sum+$report['tpass'];$f_sum=$f_sum+$report['tfail'];
?>

<link href="<?= base_url()?>assets/csss/style.css" rel="stylesheet">


<div class="main-content">

    <!-- User Info, Notifications and Menu Bar -->
    <?php echo $user_profile; ?>
    <div class="page-title">

        <div class="title-env">
            <h1 class="title">All Test</h1>
            <p class="description">All Test For Regional Report</p>
        </div>


        <div class="breadcrumb-env">

            <ol class="breadcrumb bc-1">
                <li>
                    <a href="<?php echo base_url() ?>home"><i class="fa-home"></i>Home</a>
                </li>
                <li>

                    <a href="#">Report</a>
                </li>
                <li class="active">

                    <strong>Regional Report</strong>
                </li>
            </ol>

        </div>

    </div>

    <!-- Basic Setup -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">All Test</h3>
        </div>
        <?php if ($this->session->userdata('create_test')) { ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong><?php echo $this->session->userdata('create_test'); ?></strong>
            </div>
            <?php $this->session->unset_userdata('create_test');
        } ?>
        <?php if ($this->session->userdata('publish_exam')) { ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong><?php echo $this->session->userdata('publish_exam'); ?></strong>
            </div>
            <?php $this->session->unset_userdata('publish_exam');
        } ?>
        <?php if ($this->session->userdata('unpublish_exam')) { ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong><?php echo $this->session->userdata('unpublish_exam'); ?></strong>
            </div>
            <?php $this->session->unset_userdata('unpublish_exam');
        } ?>
        <?php if ($this->session->userdata('assign_test')) { ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong><?php echo $this->session->userdata('assign_test'); ?></strong>
            </div>
            <?php $this->session->unset_userdata('assign_test');
        } ?>
        <?php if ($this->session->userdata('delete_exams')) { ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong><?php echo $this->session->userdata('delete_exams'); ?></strong>
            </div>
            <?php $this->session->unset_userdata('delete_exams');
        } ?>
        <?php if ($this->session->userdata('update_exam')) { ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong><?php echo $this->session->userdata('update_exam'); ?></strong>
            </div>
            <?php $this->session->unset_userdata('update_exam');
        } ?>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                    <thead>
                    <tr>
                        <th colspan="13">Momenta exam Result</th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>SM Code</th>
                        <th>RSM Code</th>
                        <th>Region</th>
                        <th>DSM Code</th>
                        <th>PSO Code</th>
                        <th>Renata ID</th>
                        <th>PSO Name</th>
                        <th>Total Test Assign</th>
                        <th>Total Appeared Test</th>
                        <th>Total Obtained Point</th>
                        <th>Total Point</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($reports as $report){
                        ?>
                        <tr>
                            <td><?= ++$i;?></td>
                            <td><?= $report['sm_code']?></td>
                            <td><?= $report['rsm_code']?></td>
                            <td><?= $report['region']?></td>
                            <td><?= $report['dsm_code']?></td>
                            <td><?= $report['renata_id']?></td>
                            <td><?= $report['pso_id']?></td>
                            <td><?= $report['pso_name']?></td>
                            <td><?= $report['total_assign']?></td>
                            <td><?= $report['total_appeared_test']?></td>
                            <td><?= $report['total_obtained_point']?></td>
                            <td><?= $report['total_exam_point']?></td>

                        </tr>
                    <?php }?>
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

<script src="<?= base_url()?>assets/jquery-datatable/jquery.dataTables.js"></script>

<script src="<?= base_url()?>assets/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="<?= base_url()?>assets/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="<?= base_url()?>assets/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="<?= base_url()?>assets/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="<?= base_url()?>assets/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="<?= base_url()?>assets/jquery-datatable/extensions/export/buttons.print.min.js"></script>

<script src="<?= base_url()?>assets/tables/jquery-datatable.js"></script>