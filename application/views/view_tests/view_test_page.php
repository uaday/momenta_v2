<?php
/**
 * Created by PhpStorm.
 * User: Sudipta Ghosh
 * Date: 11/28/2017
 * Time: 12:01 PM
 */
?>

<div class="main-content">

    <!-- User Info, Notifications and Menu Bar -->
    <?php echo $user_profile; ?>
    <div class="page-title">

        <div class="title-env">
            <h1 class="title">Manage Test</h1>
            <p class="description">Manage all test for adjust according to pso skill</p>
        </div>

        <div class="breadcrumb-env">

            <ol class="breadcrumb bc-1">
                <li>
                    <a href="<?php echo base_url() ?>home"><i class="fa-home"></i>Home</a>
                </li>
                <li>

                    <a href="#">Testing Center</a>
                </li>
                <li class="active">

                    <strong>Manage Test</strong>
                </li>
            </ol>

        </div>

    </div>

    <!-- Basic Setup -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">All Test</h3>

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
                        <th style="color: white">Business</th>
                        <th style="color: white">Test Name</th>
                        <th style="color: white">Region</th>
                        <th style="color: white">Publication Status</th>
                        <th style="color: white">Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th style="color: white">Business</th>
                        <th style="color: white">Test Name</th>
                        <th style="color: white">Region</th>
                        <th style="color: white">Publication Status</th>
                        <th style="color: white">Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php foreach ($tests as $test) { ?>
                        <tr>
                            <td><?php echo $test['business_name'] ?></td>
                            <td><?php echo $test['exam_name'] ?></td>
                            <td><?php echo $test['rsm_counter'] ?></td>
                            <?php if($test['publish_status']=='0'){?>
                                <td><label class=" text-red">Unpublished</label></td>
                            <?php } else {?>
                                <td><label class=" text-success">Published</label></td>
                            <?php }?>
                            <td>
                                <a title="Edit & View" href="<?php echo base_url() ?>test/view_edit_exam_ques/<?php echo $test['exam_id'] ?>"><i class="fa fa-edit fa-lg"></i></a>
                                <span class="table_insided_line"> | </span>
                                <a title="Assign" href="<?php echo base_url() ?>test/test_assign?test_id=<?php echo $test['exam_id'] ?>&&business_code=<?= $test['tbl_business_business_code']?>"><i class="fa fa-group fa-lg"></i></a>
                                <span class="table_insided_line"> | </span>
                                <a title="Delete" onclick="return delete_exam()"
                                   href="<?php echo base_url() ?>test/delete_test?test_id=<?php echo $test['exam_id'] ?>"
                                   class="btn_action"><i class="fa fa-trash fa-lg"></i></a>
                                <span class="table_insided_line"> | </span>
                                <?php if($test['publish_status']=='1'){?>
                                    <a title="Unpublished" onclick="return unpublish_exam()" href="<?php echo base_url() ?>test/unpublish_exam_ans?exam_id=<?php echo $test['exam_id'] ?>"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></i></a>
                                <?php } else {?>
                                    <a title="Published" onclick="return publish_exam()" href="<?php echo base_url() ?>test/publish_exam_ans?exam_id=<?php echo $test['exam_id'] ?>"><i class="fa fa-unlock-alt fa-lg" aria-hidden="true"></i></i></a>
                                <?php }?>
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

