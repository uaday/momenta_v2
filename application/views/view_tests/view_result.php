<?php
/**
 * Created by PhpStorm.
 * User: Sudipta Ghosh
 * Date: 11/30/2017
 * Time: 2:19 PM
 */
?>

<style>
    #pie1 {
        height: 300px;
    }
    #pie2 {
        height: 300px;
    }

    #pie * {
        margin: 0 auto;
    }
</style>
<script src="https://cdn3.devexpress.com/jslib/17.2.3/js/dx.all.js"></script>

<div class="main-content">

    <!-- User Info, Notifications and Menu Bar -->
    <?php echo $user_profile; ?>
    <div class="page-title">

        <div class="title-env">
            <h1 class="title">Test Result</h1>
            <p class="description">View your pso result and analyze their performance</p>
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

                    <strong>Result</strong>
                </li>
            </ol>

        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <script type="text/javascript">
                jQuery(document).ready(function($)
                {
                    $("#sexam").select2({
                        placeholder: 'Select your Depot...',
                        allowClear: true
                    }).on('select2-open', function()
                    {
                        // Adding Custom Scrollbar
                        $(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
                    });

                });
            </script>

            <select  name="sexam" id="sexam" onchange="find_exam_stat(this.value)" class="form-control ">
                <?php foreach ($sexams as $sexam) { ?>
                    <option  value="<?php echo $sexam['exam_id'] ?>"><?php echo $sexam['exam_name'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="demo-container">
                        <div id="pie1"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="demo-container">
                        <div id="pie2"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>





    <!-- Basic Setup -->


    <!-- Main Footer -->
    <!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
    <!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
    <!-- Or class "fixed" to  always fix the footer to the end of page -->
    <?php if (isset($footer)) {

        echo $footer;
    } ?>
</div>



<script>
    $(function(){
        $("#pie1").dxPieChart({
            palette: "bright",
            dataSource: dataSource,
            title: "Top internet languages",
            legend: {
                horizontalAlignment: "center",
                verticalAlignment: "bottom"
            },
            "export": {
                enabled: true
            },
            series: [{
                argumentField: "language",
                valueField: "percent",
                label: {
                    visible: true,
                    connector: {
                        visible: true,
                        width: 0.5
                    },
                    format: "fixedPoint",
                    customizeText: function (point) {
                        return point.argumentText + ": " + point.valueText + "%";
                    }
                }
            }]
        });
    });
    $(function(){
        $("#pie2").dxPieChart({
            palette: "bright",
            dataSource: dataSource,
            title: "Top internet languages",
            legend: {
                horizontalAlignment: "center",
                verticalAlignment: "bottom"
            },
            "export": {
                enabled: true
            },
            series: [{
                argumentField: "language",
                valueField: "percent",
                label: {
                    visible: true,
                    connector: {
                        visible: true,
                        width: 0.5
                    },
                    format: "fixedPoint",
                    customizeText: function (point) {
                        return point.argumentText + ": " + point.valueText + "%";
                    }
                }
            }]
        });
    });
</script>





