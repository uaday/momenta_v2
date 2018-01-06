<div class="main-content">

    <?php echo $user_profile;?>
    <div class="page-title">

        <div class="title-env">
            <h1 class="title">Medicine Literature</h1>
            <p class="description">Upload & manage medicine info for pso knowledge enhancement</p>
        </div>

        <div class="breadcrumb-env">

            <ol class="breadcrumb bc-1">
                <li>
                    <a href="<?php echo base_url()?>home"><i class="fa-home"></i>Home</a>
                </li>
                <li class="active">

                    <strong>Medicine Literature</strong>
                </li>
            </ol>

        </div>

    </div>

    <div>

    </div>

    <div class="row">
        <div class="col-sm-6">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Literature Upload</h3>
                    <div class="panel-options">
                        <a href="#" data-toggle="panel">
                            <span class="collapse-icon">&ndash;</span>
                            <span class="expand-icon">+</span>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php if($this->session->userdata('message')){?>
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>

                            <strong><?php echo $this->session->userdata('message');?></strong>
                        </div>
                        <?php $this->session->unset_userdata('message'); } else if($this->session->userdata('error')){?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>

                                <strong><?php echo $this->session->userdata('error');?></strong>
                            </div>
                        <?php $this->session->unset_userdata('error'); }?>
                    </div>
                </div>
               
                <div class="panel-body">

                    <form method="post" action="<?php echo base_url()?>medicine_literature/drug_dse_upload" id="upload_form" onsubmit="return check_upload_drug_des()" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="control-label">Select Business</label>

                            <script type="text/javascript">
                                jQuery(document).ready(function($)
                                {
                                    $("#business").selectBoxIt({
                                        showFirstOption: false
                                    }).on('open', function()
                                    {
                                        // Adding Custom Scrollbar
                                        $(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
                                    });
                                });
                            </script>

                            <select class="form-control business" name="business" id="business" onchange="gen_list(this.value, 'generic_name');">
                                <option value="-1">Select Business</option>
                                <?php foreach ($business as $bus){?>
                                    <?php if($this->session->userdata('business_code')=='00'&& $bus['business_code']!='00'){?>
                                        <option value="<?= $bus['business_code']?>"><?= $bus['business_name'] ?></option>
                                    <?php } else {?>
                                        <?php if($this->session->userdata('business_code')==$bus['business_code'] && $bus['business_code']!='00'){?>
                                            <option value="<?= $bus['business_code']?>"><?= $bus['business_name'] ?></option>
                                            <?php }?>
                                    <?php }?>
                                <?php }?>
                            </select>

                        </div>

                        <div class="form-group">
                            <label class="control-label">Select Generic Name</label>

                            <div class="generic_name">
                                <script type="text/javascript">
                                    jQuery(document).ready(function($)
                                    {
                                        $("#generic_name1").selectBoxIt({
                                            showFirstOption: false
                                        }).on('open', function()
                                        {
                                            // Adding Custom Scrollbar
                                            $(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
                                        });
                                    });
                                </script>

                                <select class="form-control generic_name1" name="gen_id" id="generic_name1" onchange="drug_list(this.value, 'drug');">
                                    <option value="-1">Select Generic Name</option>
                                </select>
                            </div>


                        </div>
                        <div class="form-group">
                            <label class="control-label">Select Drug Name</label>

                            <div class="drug">
                                <script type="text/javascript">
                                    jQuery(document).ready(function($)
                                    {
                                        $("#drug1").selectBoxIt({
                                            showFirstOption: false
                                        }).on('open', function()
                                        {
                                            // Adding Custom Scrollbar
                                            $(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
                                        });
                                    });
                                </script>

                                <select class="form-control drug1" name="drug_id" id="drug1" onchange="drug_no(this.value);">
                                    <option value="-1">Select Drug Name</option>
                                </select>
                            </div>


                        </div>

                        <div class="form-group">
                            <label class="control-label">Simple Upload Type</label>
                            <div class="file_type">
                            <script type="text/javascript">
                                jQuery(document).ready(function($)
                                {
                                    $("#type").selectBoxIt().on('open', function()
                                    {
                                        // Adding Custom Scrollbar
                                        $(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
                                    });
                                });
                            </script>

                            <select class="form-control type" name="upload_file_type" id="type" onchange="drug_des(this.value, 'typee');">
                                <option value="-1">Select Upload Type</option>
                            </select>
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="control-label">Uploaded Section</label>

                            <blockquote class="blockquote blockquote-black">
                                <p>
                                    <strong>UPLOAD</strong>
                                </p>
                                <p id="typee">
                                    <small></small>
                                </p>
                            </blockquote>

                        </div>
                        <div class="form-group">
                            <label class="control-label">File Upload</label>
                            <input data-validate="required" type="file" class="form-control" name="pdf" id="pdf">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Save</button>
<!--                            <button type="reset" class="btn btn-white">Reset</button>-->
                        </div>


                    </form>

                </div>
            </div>

        </div>
        <div class="col-sm-6">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Detailing Pointer</h3>
                    <div class="panel-options">
                        <a href="#" data-toggle="panel">
                            <span class="collapse-icon">&ndash;</span>
                            <span class="expand-icon">+</span>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-black new_version_alert" id="new_version_alert" style="display: none">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>

                            <strong>New Version Adding...</strong>
                        </div>

                        <?php if($this->session->userdata('message1')){?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>

                                <strong><?php echo $this->session->userdata('message1');?></strong>
                            </div>
                            <?php $this->session->unset_userdata('message1'); } else if($this->session->userdata('error1')){?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>

                                <strong><?php echo $this->session->userdata('error1');?></strong>
                            </div>
                            <?php $this->session->unset_userdata('error1'); }?>
                    </div>
                </div>

                <div class="panel-body">

                    <form method="post" action="<?php echo base_url()?>medicine_literature/drug_dse_version_upload" onsubmit="return check_upload_version()" id="upload_form"  enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="control-label">Select Business</label>

                            <script type="text/javascript">
                                jQuery(document).ready(function($)
                                {
                                    $("#business11").selectBoxIt({
                                        showFirstOption: false
                                    }).on('open', function()
                                    {
                                        // Adding Custom Scrollbar
                                        $(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
                                    });
                                });
                            </script>

                            <select class="form-control business11" id="business11" name="business11" onchange="gen_list1(this.value, 'generic_name11');">
                                <option value="-1">Select Business</option>
                                <?php foreach ($business as $buss){?>
                                    <?php if($this->session->userdata('business_code')=='00'&& $buss['business_code']!='00'){?>
                                        <option value="<?= $buss['business_code']?>"><?= $buss['business_name'] ?></option>
                                    <?php } else {?>
                                        <?php if($this->session->userdata('business_code')==$buss['business_code'] && $buss['business_code']!='00'){?>
                                            <option value="<?= $buss['business_code']?>"><?= $buss['business_name'] ?></option>
                                        <?php }?>
                                    <?php }?>
                                <?php }?>
                            </select>

                        </div>

                        <div class="form-group">
                            <label class="control-label">Select Generic Name</label>

                            <div class="generic_namee">
                                <script type="text/javascript">
                                    jQuery(document).ready(function($)
                                    {
                                        $("#generic_name11").selectBoxIt({
                                            showFirstOption: false
                                        }).on('open', function()
                                        {
                                            // Adding Custom Scrollbar
                                            $(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
                                        });
                                    });
                                </script>

                                <select class="form-control generic_name11" name="gen_id" id="generic_name11" onchange="drug_list1(this.value, 'drugg');">
                                    <option value="-1">Select Generic Name</option>
                                </select>
                            </div>


                        </div>
                        <div class="form-group">
                            <label class="control-label">Select Drug Name</label>

                            <div class="drugg">
                                <script type="text/javascript">
                                    jQuery(document).ready(function($)
                                    {
                                        $("#drug11").selectBoxIt({
                                            showFirstOption: false
                                        }).on('open', function()
                                        {
                                            // Adding Custom Scrollbar
                                            $(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
                                        });
                                    });
                                </script>

                                <select class="form-control drug11" name="drug_id" id="drug11" onchange="drug_no1(this.value);">
                                    <option value="-1">Select Drug Name</option>
                                </select>
                            </div>


                        </div>

                        <div class="form-group">
                            <label class="control-label">Select Doctor Type</label>

                            <div class="doc_typee">
                                <script type="text/javascript">
                                    jQuery(document).ready(function($)
                                    {
                                        $("#doc_type11").selectBoxIt({
                                            showFirstOption: false
                                        }).on('open', function()
                                        {
                                            // Adding Custom Scrollbar
                                            $(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
                                        });
                                    });
                                </script>

                                <select class="form-control doc_type11" name="doc_type11" id="doc_type11" onchange="version_find(this.value,'version')">
                                    <option value="-1">Select Doctor Type</option>
                                </select>
                            </div>


                        </div>
                        <div class="form-group">
                            <label class="control-label">Version Selection</label>

                            <div class="version">
                                <script type="text/javascript">
                                    jQuery(document).ready(function($)
                                    {
                                        $("#version1").selectBoxIt({
                                            showFirstOption: false
                                        }).on('open', function()
                                        {
                                            // Adding Custom Scrollbar
                                            $(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
                                        });
                                    });
                                </script>

                                <select class="form-control version1" name="version_idd" id="version1" onchange="fill_data(this.value)">
                                    <option value="-1">Select Version</option>
                                </select>
                            </div>


                        </div>
                        <div class="form-group">
                            <label class="control-label">Point One</label>
                            <textarea name="point1"  class="form-control point1" cols="5" rows="5" id="point1" data-validate="required" data-message-required="This is required field."></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Point Two</label>
                            <textarea name="point2" class="form-control point2" cols="5" rows="5" id="point2" data-validate="required" data-message-required="This is required field."></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Point Three</label>
                            <textarea name="point3" class="form-control point3" cols="5" rows="5" id="point3" data-validate="required" data-message-required="This is required field."></textarea>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Uploaded Section</label>

                            <blockquote class="blockquote blockquote-black">
                                <p>
                                    <strong>UPLOAD</strong>
                                </p>
                                <p id="files1">
                                    <small></small>
                                </p>
                            </blockquote>

                        </div>
                        <div class="form-group">
                            <label class="control-label">File Upload</label>
                            <input data-validate="required" type="file" class="form-control" name="drug_des_image" id="drug_des_image">
                        </div>

<!--                        hidden section-->
                        <div>
                            <input id="ver_id" name="version_id" type="hidden">
                            <input id="image_test" name="image_test" type="hidden">
                        </div>

                        <div class="form-group ">
                            <button type="submit" class="btn btn-success ">Save</button>
<!--                            <button type="reset" class="btn btn-white">Reset</button>-->
                            <a onclick="return delete_version();" id="version_delete" style="visibility: hidden" class="btn btn-danger btn-icon btn-icon-standalone btn-sm">
                                <i class="fa-trash"></i>
                                <span>Delete Version</span>
                            </a>
                        </div>


                    </form>

                </div>
            </div>

        </div>
    </div>

    <!-- Main Footer -->
    <!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
    <!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
    <!-- Or class "fixed" to  always fix the footer to the end of page -->
    <?php if(isset($footer)){

        echo $footer;
    }?>
</div>