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
            <h1 class="title">PSO Result</h1>
            <p class="description">View PSO Details Result</p>
        </div>

        <div class="breadcrumb-env">

            <ol class="breadcrumb bc-1">
                <li>
                    <a href="<?php echo base_url() ?>home"><i class="fa-home"></i>Home</a>
                </li>
                <li>

                    <a href="#">Testing Center</a>
                </li>
                <li>

                    <a href="<?= base_url()?>test/result">Result</a>
                </li>
                <li class="active">

                    <strong>PSO Result</strong>
                </li>
            </ol>

        </div>

    </div>

    <!-- Basic Setup -->
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-6 ">
                    <h4 class="modal-title ">PSO CODE: # <?php echo $pso_exam_detail['0']['renata_id'] ?></h4>
                    <h4 class="modal-title">Employee ID: # <?php echo $pso_exam_detail['0']['pso_id'] ?></h4>
                    <h4 class="modal-title">PSO NAME: <?php echo $pso_exam_detail['0']['pso_name'] ?></h4>
                </div>
                <div class="col-md-offset-4 col-md-2">

                    <h4 class="modal-title ">Total Test: <?php echo $pso_exam_detail['0']['total_test'] ?></h4>
                    <h4 class="modal-title ">Points: <?php echo $pso_exam_detail['0']['total_marks'] ?></h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-default">
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
                            <th style="color: white">Exam ID</th>
                            <th style="color: white">Exam Name</th>
                            <th style="color: white">Exam Duration</th>
                            <th style="color: white">Exam Point</th>
                            <th style="color: white">Pso Point</th>
                            <th style="color: white">Exam Date</th>
                            <th style="color: white">Exam Time</th>
                            <th style="color: white">Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Exam ID</th>
                            <th>Exam Name</th>
                            <th>Exam Duration</th>
                            <th>Exam Point</th>
                            <th>Pso Point</th>
                            <th>Exam Date</th>
                            <th>Exam Time</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php foreach ($pso_exams as $pso_exam) { ?>
                            <tr class="color_wrapper small_spacer">
                                <!-- ////////////////////////////////////////modal section//////////////////////////////////////// -->
                                <td><?php echo $pso_exam['exam_id'] ?></td>
                                <td><?php echo $pso_exam['exam_name'] ?></td>
                                <td><?php echo $pso_exam['time'] ?> min</td>
                                <td><?php echo $pso_exam['exam_marks'] ?></td>
                                <td><?php echo $pso_exam['pso_marks'] ?></td>
                                <td><?php echo $pso_exam['start_date'] ?></td>
                                <td><?php echo $pso_exam['start_time'] ?></td>
                                <td>
                                    <?php if($pso_exam['status']==1){?>
                                        <button onclick="location.href='<?php echo base_url()?>test/show_pso_result?pso_id=<?php echo $pso_exam['pso_id']?>&assign_id=<?php echo $pso_exam['assign_id']?>'" type="button" class="btn btn-success"><a href="<?php echo base_url()?>test/show_pso_result?pso_id=<?php echo $pso_exam['pso_id']?>&assign_id=<?php echo $pso_exam['assign_id']?>">View Result</a>
                                        </button>
                                    <?php } else {?>
                                        <button type="disable" disabled class="btn btn-default">Not Started
                                        </button>
                                    <?php }?>
                                </td>

                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
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
