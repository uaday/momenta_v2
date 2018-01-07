<?php
/**
 * Created by PhpStorm.
 * User: Sudipta
 * Date: 11/07/2017
 * Time: 12:47 PM
 */
$i = 0;
?>
<div class="main-content">

    <!-- User Info, Notifications and Menu Bar -->
    <?php echo $user_profile; ?>
    <div class="page-title">

        <div class="title-env">
            <h1 class="title">View Message</h1>
            <p class="description">Show all your message that you sent</p>
        </div>

        <div class="breadcrumb-env">

            <ol class="breadcrumb bc-1">
                <li>
                    <a href="<?php echo base_url() ?>home"><i class="fa-home"></i>Home</a>
                </li>
                <li>

                    <a href="#">Communication Hub</a>
                </li>
                <li class="active">

                    <strong>View Message</strong>
                </li>
            </ol>

        </div>

    </div>

    <!-- Basic Setup -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">All Message</h3>
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
                        <th style="color: white; vertical-align: text-top;text-align: left">Message Title</th>
                        <th style="color: white; vertical-align: text-top;text-align: left">Sent BY</th>
                        <th style="color: white; vertical-align: text-top;text-align: left">Date</th>
                        <th style="color: white; vertical-align: text-top;text-align: left">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($messages as $message) {
                        $i++; ?>
                        <tr>

                            <td><?= $message['message_title'] ?></td>
                            <td><?= $message['sent_by'] ?></td>
                            <td><?= $message['date'] ?></td>
                            <td>
                                <a href="javascript:;"
                                   onclick="jQuery('#view_message-<?= $i ?>').modal('show');"
                                   class="btn btn-primary  btn-sm"><i class="fa fa-eye"></i> </a>
                                <a   class="btn btn-primary  btn-sm" href="<?php echo base_url()?>Communication_hub/export_assign_message/<?= $message['notification_id']?>" ><i class="fa fa-download"></i></a>

                            </td>
                        </tr>

                        <div class="modal fade" id="view_message-<?= $i ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                            &times;
                                        </button>
                                        <h4 class="modal-title text-bold text-primary">
                                            View Details Message</h4>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="col-md-12"><label style="color: #272966"><strong><?= $message['sent_by'] ?></strong></label></div>
                                                <div class="col-md-12"  style="color: black"><h4><?= $message['message_title'] ?></h4></div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="col-md-12"><label><?= $message['date'] ?></label></div>
                                            </div>

                                            <div class="col-md-12">
                                                <hr>
                                                <p><?= $message['message_body'] ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
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
