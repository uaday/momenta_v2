<?php
/**
 * Created by PhpStorm.
 * User: Sudipta
 * Date: 5/8/2017
 * Time: 5:56 PM
 */
?>

<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/target.css">
<div class="body_wrapper"> <!-- -MAIN BODY PART- -->
    <div class="container_wrapper form_type_wrapper">
        <div class="form_type first_one_test">
            <h3 class="header_wrapper center-block text-center">User Bulk Data</h3>

            <div align="center">
                <?php if ($this->session->userdata('upload_data') == 'Upload Data Successful') { ?>
                    <div class="alert alert-success"><strong><?php echo 'Upload Data Successful'; ?></strong></div>
                    <?php $this->session->unset_userdata('upload_data');
                }else if($this->session->userdata('error')=='Wrong File Format'){
                    ?>
                    <div class="alert alert-danger"><strong><?php echo 'Wrong File Format'; ?></strong></div>
                    <?php $this->session->unset_userdata('error'); }?>
            </div>



            <form method="post" action="<?php echo base_url()?>bulk_data/user_bulk_upload_file" accept-charset="utf-8"  enctype="multipart/form-data">
                <fieldset>
                    <pre><span class="alert alert-info">Instruction:</span>
                <br>
1. Please Upload CSV File Only.
2. Please Follow The <strong>User data <a href="<?php echo base_url()?>download_file/user_format" target="_blank">Format</a></strong>.
            </pre>



                    <div class="row form-group">
                        <input type="file" class="form-control btn btn-primary" name="user_bulk">
                    </div>
                    <!-- Button -->
                    <div class="form-group">
                        <div class="col-md-4 pull-right">
                            <input style="margin-left: 55px" id="singlebutton" type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </div>

                </fieldset>
            </form>
        </div> <!-- /////first_one///// -->
        <div class="copy_right col-md-12">
            <br>
            <p class="text-center">&copy; 2016 ALL Rights Reserved by <br> Renata Ltd.</p>
        </div>

    </div><!-- container_wrapper -->
    <!-- ////////////// -->
</div> <!-- body_wrapper -->
</div><!-- right-col -->
</div> <!-- main container #full-width -->
