<?php
/**
 * Created by PhpStorm.
 * User: Sudipta Ghosh
 * Date: 11/28/2017
 * Time: 12:01 PM
 */
?>
<title> Report</title>
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
                        <th style="color: white; vertical-align: text-top;text-align: left">Test Name</th>
                        <th style="color: white; vertical-align: text-top;text-align: left">Publication Status</th>
                        <th style="color: white; vertical-align: text-top;text-align: left">Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($tests as $test) { ?>
                        <tr>
                            <td><?php echo $test['tbl_business_business_code'] ?></td>
                            <td><?php echo $test['exam_name'] ?></td>
                            <?php if($test['publish_status']=='0'){?>
                                <td><label class=" text-red">Unpublished</label></td>
                            <?php } else {?>
                                <td><label class=" text-success">Published</label></td>
                            <?php }?>
                            <td>
                                <a title="Report" href="<?php echo base_url() ?>report/pso_test_report/<?php echo $test['exam_id'] ?>"><i class="fa fa-file-excel-o"></i></a>
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

