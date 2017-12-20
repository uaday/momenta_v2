<?php
/**
 * Created by PhpStorm.
 * User: Sudipta Ghosh
 * Date: 11/15/2017
 * Time: 2:31 PM
 */
?>

<div class="main-content">

    <?php echo $user_profile; ?>
    <div class="page-title">

        <div class="title-env">
            <h1 class="title">Send New Message</h1>
            <p class="description">Send desire message to your pso</p>
        </div>

        <div class="breadcrumb-env">

            <ol class="breadcrumb bc-1">
                <li>
                    <a href="<?= base_url()?>"><i class="fa-home"></i>Home</a>
                </li>
                <li>

                    <a href="<?php echo base_url() ?>bulk_data">Communication Hub</a>
                </li>
                <li class="active">

                    <strong>Send Message</strong>
                </li>
            </ol>

        </div>

    </div>
    <div class="row">
        <div class=" col-sm-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <div class="panel-title">
                        Send New Message
                    </div>
                </div>


                <div align="center">

                    <?php if ($this->session->userdata('upload_data')) { ?>
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong><?php echo 'Upload Data Successful'; ?></strong>
                        </div>
                        <?php $this->session->unset_userdata('upload_data');
                    } ?>
                    <?php if ($this->session->userdata('error')) { ?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong><?php echo 'Wrong File Format'; ?></strong>
                        </div>
                        <?php $this->session->unset_userdata('error');
                    } ?>

                </div>

                <div class="panel-body">

                    <form onsubmit="return check_incentive()" action="<?php echo base_url() ?>tar_shop/add_incentive" method="post" enctype="multipart/form-data" class="validate">

                        <div class="form-group">
                            <label class="control-label">Message Title</label>
                            <input type="text" class="form-control" id="title" name="message_title" data-validate="required"
                                   placeholder="Message title" data-message-required="Please fill up message title"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Message Body</label>
                            <textarea name="message_body"  class="form-control description" cols="5" rows="5" id="message_body" data-validate="required" data-message-required="Please fill up message body"></textarea>

                        </div>
                        <div class="form-group">
                            <label class="control-label">Sender Name</label>
                            <input type="text" class="form-control" id="sent_by" name="sent_by" data-validate="required"
                                   placeholder="Sender Name" data-message-required="Please fill up sender name"/>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Send Message</button>
                            <button type="reset" class="btn btn-white">Reset</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
    <?php if (isset($footer)) {

        echo $footer;
    } ?>
</div>
