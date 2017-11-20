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
            <h1 class="title">SMS BULK</h1>
            <p class="description">Send your sms by bulk user</p>
        </div>

        <div class="breadcrumb-env">

            <ol class="breadcrumb bc-1">
                <li>
                    <a href="dashboard-1.html"><i class="fa-home"></i>Home</a>
                </li>
                <li>

                    <a href="<?php echo base_url() ?>bulk_data">Bulk Data</a>
                </li>
                <li class="active">

                    <strong>PSO Bulk</strong>
                </li>
            </ol>

        </div>

    </div>
    <div class="row">
        <div class=" col-sm-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <div class="panel-title">
                        PSO BULK
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

                    <form method="post" action="<?php echo base_url() ?>bulk_data/pso_bulk_upload_file" accept-charset="utf-8"
                          class="validate" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="alert alert-white">
                                <strong>Instruction</strong>
                            </div>
                            <div class="well well-lg">
                                1. Please Upload CSV File Only.<br>
                                2. Please Follow The <strong>Pso data <a href="<?php echo base_url() ?>download_file/pso_format"
                                                                         target="_blank">Format</a></strong>.
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="text-bold">Select CSV File</label>
                            <input type="file" name="pso_bulk" id="pso_bulk"  class="form-control" data-validate="required" data-message-required="Please Upload the csv file">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Save PSO Information</button>
                        </div>


                        <div class="alert alert-white">
                            <div class="label label-danger"><strong>Error</strong></div>
                        </div>
                        <div class="well well-lg">
                            <?php $i=1; if($this->session->userdata('duplicate'))foreach ($this->session->userdata('duplicate') as $dd){echo $i++;?>: Duplicate <strong><?php echo $dd;?></strong> Renata Employee Id Please Check Manually<br><?php } $this->session->unset_userdata('duplicate')?>
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
