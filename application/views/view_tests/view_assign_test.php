<?php
/**
 * Created by PhpStorm.
 * User: Sudipta Ghosh
 * Date: 11/28/2017
 * Time: 12:01 PM
 */
?>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/multi/dist/css/bootstrap-multiselect.css">
<script type="text/javascript" src="<?php echo base_url() ?>assets/multi/dist/js/bootstrap-multiselect.js"></script>
<div class="main-content">

    <!-- User Info, Notifications and Menu Bar -->
    <?php echo $user_profile; ?>
    <div class="page-title">

        <div class="title-env">
            <h1 class="title">Assign Test</h1>
            <p class="description">Assign test to PSO for judge their skills</p>
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

                    <a href="<?= base_url() ?>test/manage_test">Manage Test</a>
                </li>
                <li class="active">

                    <strong>Assign Test</strong>
                </li>
            </ol>

        </div>

    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div style="font-size: small;line-height: 170%">
                    <h4 class="text-center text-bold text-info">PSO Information</h4><br>
                    <label><strong>Business:</strong> <?php echo $exam['0']['business_name'] ?></label><br>
                    <label><strong>Test ID:</strong> <?php echo $exam['0']['exam_id'] ?></label><br>
                    <label><strong>Test Name:</strong> <?php echo $exam['0']['exam_name'] ?></label><br>
                    <label><strong>Expire Date:</strong> <?php echo $exam['0']['exp_date'] ?></label><br>
                    <label><strong>Duration:</strong> <?php echo $exam['0']['duration'] ?> min</label><br>
                    <label><strong>Points:</strong> <?php echo $exam['0']['exam_marks'] ?></label><br>
                    <label><strong>Percentage of Pass Marks:</strong> <?php echo $exam['0']['pass_marks'] ?>
                        %</label><br>
                    <?php if ($exam['0']['exam_type'] == 1) { ?>
                        <label><strong>Exam Type:</strong> Mandatory</label><br>
                    <?php } else { ?>
                        <label><strong>Exam Type:</strong> Optional</label><br>
                    <?php } ?>
                    <?php if ($exam['0']['publish_status'] == 0) { ?>
                        <label><strong>Publish Status:</strong> Not Published</label><br>
                    <?php } else { ?>
                        <label><strong>Publish Status:</strong> Published</label><br>
                    <?php } ?>
                    <label><strong>No of Region Assign:</strong> <?php echo $assign_region['0']['region_counter'] ?>
                    </label><br>

                </div>

            </div>
        </div>

    </div>

    <div class="row">
        <h3 class="text-center text-bold text-gray">Exam Assign</h3><br>
    </div>

    <form action="<?php echo base_url() ?>test/assign_test" accept-charset="utf-8" method="post">
        <input type="hidden" name="test_id" value="<?php echo $exam['0']['exam_id'] ?>">
        <input type="hidden" name="business_code" value="<?php echo $exam['0']['business_code'] ?>">
        <input type="hidden" name="form_type" value="2">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="text-center">
                        <input class="icheck-15 form-control" tabindex="5" type="checkbox" name="global" value="global"
                               id="minimal-checkbox-1-15" onchange="hidee()">
                        <label for="minimal-checkbox-1-15">Universal</label>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div  class="col-md-offset-1 col-md-10">
                <div class=" col-md-4" id="hh1">
                    <div class="form-group">
                        <label ><strong style="text-align: center">Region</strong></label><br>
                        <select style="width: 400px" name="region[]" class="example-selectAllJustVisible" id="region"
                                multiple="multiple" onchange="region_pso_list();">
                            <?php foreach ($regions as $region) { ?>
                                <option value="<?php echo $region['rsm_code'] ?>"><?php echo $region['region'] ?> (<?php echo $region['rsm_code'] ?>)</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4" id="hh3">
                    <div class="form-group">
                        <label><strong>PSO Types</strong></label><br>
                        <select name="pso_type[]" class="example-selectAllJustVisible1" id="pso_type"
                                multiple="multiple" onchange="type_pso_list();">

                        </select>
                    </div>
                </div>
                <div class="col-md-4" id="hh4">
                    <div class="form-group">
                        <label><strong>PSO List</strong></label><br>
                        <select name="psos[]" id="psos" class="example-selectAllJustVisible2" multiple="multiple">

                        </select>
                    </div>
                </div>

<!--                <div class="  col-md-6" id="hh2">-->
<!--                    <div class="form-group">-->
<!--                        <label><strong>User Type</strong></label><br>-->
<!--                        <select name="user_type" id="example-single">-->
<!--                            <option value="1">PSO</option>-->
<!--                            <!--                                    <option value="2">DSM </option>-->
<!--                        </select>-->
<!--                    </div>-->
<!---->
<!--                </div>-->
            </div>

        </div> <!-- row -->
        <br>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="text-center col-md-offset-4 col-md-4">
                <input id="singlebutton" type="submit" class="btn btn-block btn-blue"
                       value="Submit">
            </div>
        </div>
    </form>


    <!-- Basic Setup -->


    <!-- Main Footer -->
    <!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
    <!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
    <!-- Or class "fixed" to  always fix the footer to the end of page -->
    <?php if (isset($footer)) {

        echo $footer;
    } ?>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        $('.example-selectAllJustVisible').multiselect({
            enableFiltering: true,
            includeSelectAllOption: true,
            selectAllJustVisible: false,
            maxHeight: 200,
            buttonWidth: '240px'

        });
        $('.example-selectAllJustVisible1').multiselect({
            enableFiltering: true,
            includeSelectAllOption: true,
            selectAllJustVisible: false,
            maxHeight: 200,
            buttonWidth: '240px'

        });
        $('.example-selectAllJustVisible2').multiselect({
            enableFiltering: true,
            includeSelectAllOption: true,
            selectAllJustVisible: false,
            maxHeight: 200,
            buttonWidth: '240px'

        });
    });
    $('#example-single').multiselect();
</script>

<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">