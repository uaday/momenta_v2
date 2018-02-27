<?php
/**
 * Created by PhpStorm.
 * User: Sudipta
 * Date: 9/29/2017
 * Time: 4:31 AM
 */
//print_r($exam_assigns);
//exit();
?>
<script src="<?= base_url()?>assets/js/dx_js/dx.all.js"></script>
<div class="main-content">

    <?php if(isset($user_profile)) {echo $user_profile;}?>


    <div class="row">
        <div class="col-sm-3">
            <a href="<?= base_url()?>medicine_literature/view_all_medicine_literature">
            <div class="xe-widget xe-counter" data-count=".num" data-from="0" data-to="<?= $tdrug['0']['total_d']?>" data-suffix="" data-duration="2">
                <div class="xe-icon">
                    <i class="fa fa-flask"></i>
                </div>
                <div class="xe-label">
                    <strong class="num"><?= $tdrug['0']['total_d']?></strong>
                    <span>Literature</span>
                </div>
            </div>
            </a>

        </div>
        <div class="col-sm-3">
            <a href="<?= base_url()?>pso/manage_pso">
            <div class="xe-widget xe-counter xe-counter-blue" data-count=".num" data-from="0" data-to="<?= $tpso['0']['total_p']?>" data-suffix="" data-duration="3" data-easing="false">
                <div class="xe-icon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="xe-label">
                    <strong class="num"><?= $tpso['0']['total_p']?></strong>
                    <span>PSO</span>
                </div>
            </div>
            </a>

        </div>
        <div class="col-sm-3">
            <a href="<?= base_url()?>test/manage_test">
            <div class="xe-widget xe-counter xe-counter-info" data-count=".num" data-from="0" data-to="<?= $texam['0']['total_e']?>" data-duration="4" data-easing="true">
                <div class="xe-icon">
                    <i class="fa-file-text-o"></i>
                </div>
                <div class="xe-label">
                    <strong class="num"><?= $texam['0']['total_e']?></strong>
                    <span>Tests</span>
                </div>
            </div>
            </a>
        </div>
        <div class="col-sm-3">
            <a href="<?= base_url()?>renata_shop/manage_incentive">
            <div class="xe-widget xe-counter xe-counter-red" data-count=".num" data-from="0" data-to="<?= $tincentives['0']['total_i']?>" data-prefix="" data-suffix="" data-duration="5" data-easing="true" data-delay="1">
                <div class="xe-icon">
                    <i class="fa fa-gift"></i>
                </div>
                <div class="xe-label">
                    <strong class="num"><?= $tincentives['0']['total_i']?></strong>
                    <span>Offers</span>
                </div>
            </div>
            </a>

        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
<!--                <div class="panel-heading">-->
<!--                    <h3 class="panel-title">Test Statistic</h3>-->
<!---->
<!--                </div>-->
                <div class="panel-body">
                    <script type="text/javascript">
                        jQuery(document).ready(function($)
                        {
                            if( ! $.isFunction($.fn.dxChart))
                                return;

                            var dataSource = [
                                <?php foreach ($exam_assigns as $exam_assign){ ?>
                                { state: new Date(<?php echo date('y')?>,<?= $exam_assign['month']-1?>,1), pass: <?php if(isset($exam_assign['total_pass'])) {if($exam_assign['plus']=='0'){echo '0';}else {echo round($exam_assign['total_pass']*100/$exam_assign['plus']);}}?>, fail: <?php if(isset($exam_assign['total_pass'])){if($exam_assign['plus']=='0'){echo '0';}else { echo round($exam_assign['total_fail']*100/$exam_assign['plus']);}}?>},
                                <?php }?>

                            ];

                            $("#bar-2").dxChart({

                                dataSource: dataSource,
                                commonSeriesSettings: {
                                    argumentField: "state"
                                },
                                series: [
                                    { valueField: "pass",
                                        name: "Pass Status",label: {
                                        visible: true,
                                        customizeText: function (){
                                            return this.valueText  + " %";
                                        }
                                    }, color: "#68b828" },
                                    { valueField: "fail",
                                        name: "Fail Status",label: {
                                        visible: true,
                                        customizeText: function (){
                                            return this.valueText  + " %";
                                        }
                                    }, color: "#d5080f" }
                                ],
                                argumentAxis: {
                                    label: {
                                        format: "month"
                                    }
                                },valueAxis: {
                                    label: {
                                        customizeText: function () {
                                            return this.value + '%';
                                        }
                                    },
                                    title: 'Pass/Fail Statistic in percentage(%)'
                                },
                                legend: {
                                    verticalAlignment: "bottom",
                                    horizontalAlignment: "center"
                                },"export": {
                                    enabled: true
                                },
                                redrawOnResize:true,
                                resolveLabelOverlapping:"none",
                                title: "Exam Statistic of <?= date('Y')?> Year"
                            });
                        });
                    </script>
                    <div id="bar-2" style="height: 400px; width: 100%;"></div>
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

<?php
function month_convert($month)
{
    if($month=='1'||$month=='01')
    {
        return 'January';
    }else if($month=='2'||$month=='02')
    {
        return 'February';
    }else if($month=='3'||$month=='03')
    {
        return 'March';
    }else if($month=='4'||$month=='04')
    {
        return 'April';
    }else if($month=='5'||$month=='05')
    {
        return 'May';
    }else if($month=='6'||$month=='06')
    {
        return 'June';
    }else if($month=='7'||$month=='07')
    {
        return 'July';
    }else if($month=='8'||$month=='08')
    {
        return 'August';
    }else if($month=='9'||$month=='09')
    {
        return 'September';
    }else if($month=='10')
    {
        return 'October';
    }else if($month=='11')
    {
        return 'November';
    }else if($month=='12')
    {
        return 'December';
    }
}
?>
