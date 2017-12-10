<?php
/**
 * Created by PhpStorm.
 * User: Sudipta
 * Date: 9/29/2017
 * Time: 4:31 AM
 */

?>
<div class="main-content">

    <?php if(isset($user_profile)) {echo $user_profile;}?>


    <div class="row">
        <div class="col-sm-3">

            <div class="xe-widget xe-counter" data-count=".num" data-from="0" data-to="<?= $tdrug['0']['total_d']?>" data-suffix="" data-duration="2">
                <div class="xe-icon">
                    <i class="fa fa-flask"></i>
                </div>
                <div class="xe-label">
                    <strong class="num"><?= $tdrug['0']['total_d']?></strong>
                    <span>Literature</span>
                </div>
            </div>

        </div>
        <div class="col-sm-3">

            <div class="xe-widget xe-counter xe-counter-blue" data-count=".num" data-from="0" data-to="<?= $tpso['0']['total_p']?>" data-suffix="" data-duration="3" data-easing="false">
                <div class="xe-icon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="xe-label">
                    <strong class="num"><?= $tpso['0']['total_p']?></strong>
                    <span>PSO</span>
                </div>
            </div>

        </div>
        <div class="col-sm-3">

            <div class="xe-widget xe-counter xe-counter-info" data-count=".num" data-from="0" data-to="<?= $texam['0']['total_e']?>" data-duration="4" data-easing="true">
                <div class="xe-icon">
                    <i class="fa-file-text-o"></i>
                </div>
                <div class="xe-label">
                    <strong class="num"><?= $texam['0']['total_e']?></strong>
                    <span>Tests</span>
                </div>
            </div>

        </div>
        <div class="col-sm-3">

            <div class="xe-widget xe-counter xe-counter-red" data-count=".num" data-from="0" data-to="<?= $tincentives['0']['total_i']?>" data-prefix="" data-suffix="" data-duration="5" data-easing="true" data-delay="1">
                <div class="xe-icon">
                    <i class="fa fa-gift"></i>
                </div>
                <div class="xe-label">
                    <strong class="num"><?= $tincentives['0']['total_i']?></strong>
                    <span>Offers</span>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Test Statistic</h3>

                </div>
                <div class="panel-body">
                    <script type="text/javascript">
                        jQuery(document).ready(function($)
                        {
                            if( ! $.isFunction($.fn.dxChart))
                                return;

                            var dataSource = [
                                <?php if(isset($exam_assign['0']['month'])) {if($exam_assign['0']['month']==1){?>
                                { state: "January", pass: <?php if(isset($exam_assign['0']['total_pass'])) echo $exam_assign['0']['total_pass']*100/$exam_assign['0']['plus']?>, fail: <?php if(isset($exam_assign['0']['total_pass'])) echo $exam_assign['0']['total_fail']*100/$exam_assign['0']['plus']?>},
                                <?php }}else {?>
                                { state: "January", Pass: 0, fail: 0},
                                <?php }?>
                                <?php if(isset($exam_assign['1']['month'])){ if($exam_assign['1']['month']==2){?>
                                { state: "February", pass: <?php if(isset($exam_assign['1']['total_pass'])) echo $exam_assign['1']['total_pass']*100/$exam_assign['1']['plus']?>, fail: <?php if(isset($exam_assign['1']['total_pass'])) echo $exam_assign['1']['total_fail']*100/$exam_assign['1']['plus']?>},
                                <?php }} else {?>
                                { state: "February", Pass: 0, fail: 0},
                                <?php }?>
                                <?php if(isset($exam_assign['2']['month'])){ if($exam_assign['2']['month']==3){?>
                                { state: "March", pass: <?php if(isset($exam_assign['2']['total_pass'])) echo $exam_assign['2']['total_pass']*100/$exam_assign['2']['plus']?>, fail: <?php if(isset($exam_assign['2']['total_pass'])) echo $exam_assign['2']['total_fail']*100/$exam_assign['2']['plus']?>},
                                <?php }} else {?>
                                { state: "March", Pass: 0, fail: 0},
                                <?php }?>
                                <?php if(isset($exam_assign['3']['month'])){ if($exam_assign['3']['month']==4){?>
                                { state: "April", pass: <?php if(isset($exam_assign['3']['total_pass'])) echo $exam_assign['3']['total_pass']*100/$exam_assign['3']['plus']?>, fail: <?php if(isset($exam_assign['3']['total_pass'])) echo $exam_assign['3']['total_fail']*100/$exam_assign['3']['plus']?>},
                                <?php }} else {?>
                                { state: "April", Pass: 0, fail: 0},
                                <?php }?>
                                <?php if(isset($exam_assign['4']['month'])){ if($exam_assign['4']['month']==5){?>
                                { state: "May", pass: <?php if(isset($exam_assign['4']['total_pass'])) echo $exam_assign['4']['total_pass']*100/$exam_assign['4']['plus']?>, fail: <?php if(isset($exam_assign['4']['total_pass'])) echo $exam_assign['4']['total_fail']*100/$exam_assign['4']['plus']?>},
                                <?php }} else {?>
                                { state: "May", Pass: 0, fail: 0},
                                <?php }?>
                                <?php if(isset($exam_assign['5']['month'])){ if($exam_assign['5']['month']==6){?>
                                { state: "June", pass: <?php if(isset($exam_assign['5']['total_pass'])) echo $exam_assign['5']['total_pass']*100/$exam_assign['5']['plus']?>, fail: <?php if(isset($exam_assign['5']['total_pass'])) echo $exam_assign['5']['total_fail']*100/$exam_assign['5']['plus']?>},
                                <?php }} else {?>
                                { state: "June", Pass: 0, fail: 0},
                                <?php }?>
                                <?php if(isset($exam_assign['6']['month'])){ if($exam_assign['6']['month']==7){?>
                                { state: "July", pass: <?php if(isset($exam_assign['6']['total_pass'])) echo $exam_assign['6']['total_pass']*100/$exam_assign['6']['plus']?>, fail: <?php if(isset($exam_assign['6']['total_pass'])) echo $exam_assign['6']['total_fail']*100/$exam_assign['6']['plus']?>},
                                <?php }} else {?>
                                { state: "July", Pass: 0, fail: 0},
                                <?php }?>
                                <?php if(isset($exam_assign['7']['month'])){ if($exam_assign['7']['month']==8){?>
                                { state: "August", pass: <?php if(isset($exam_assign['7']['total_pass'])) echo $exam_assign['7']['total_pass']*100/$exam_assign['7']['plus']?>, fail: <?php if(isset($exam_assign['7']['total_pass'])) echo $exam_assign['7']['total_fail']*100/$exam_assign['7']['plus']?>},
                                <?php }} else {?>
                                { state: "August", Pass: 0, fail: 0},
                                <?php }?>
                                <?php if(isset($exam_assign['8']['month'])){ if($exam_assign['8']['month']==9){?>
                                { state: "September", pass: <?php if(isset($exam_assign['8']['total_pass'])) echo $exam_assign['8']['total_pass']*100/$exam_assign['8']['plus']?>, fail: <?php if(isset($exam_assign['8']['total_pass'])) echo $exam_assign['8']['total_fail']*100/$exam_assign['8']['plus']?>},
                                <?php }} else {?>
                                { state: "September", Pass: 0, fail: 0},
                                <?php }?>
                                <?php if(isset($exam_assign['9']['month'])){ if($exam_assign['9']['month']==10){?>
                                { state: "October", pass: <?php if(isset($exam_assign['9']['total_pass'])) echo $exam_assign['9']['total_pass']*100/$exam_assign['9']['plus']?>, fail: <?php if(isset($exam_assign['9']['total_pass'])) echo $exam_assign['9']['total_fail']*100/$exam_assign['9']['plus']?>},
                                <?php }} else {?>
                                { state: "October", Pass: 0, fail: 0},
                                <?php }?>
                                <?php if(isset($exam_assign['10']['month'])){ if($exam_assign['10']['month']==11){?>
                                { state: "November", pass: <?php if(isset($exam_assign['10']['total_pass'])) echo $exam_assign['10']['total_pass']*100/$exam_assign['10']['plus']?>, fail: <?php if(isset($exam_assign['10']['total_pass'])) echo $exam_assign['10']['total_fail']*100/$exam_assign['10']['plus']?>},
                                <?php }} else {?>
                                { state: "November", Pass: 0, fail: 0},
                                <?php }?>
                                <?php if(isset($exam_assign['11']['month'])){ if($exam_assign['11']['month']==12){?>
                                { state: "December", pass: <?php if(isset($exam_assign['11']['total_pass'])) echo $exam_assign['11']['total_pass']*100/$exam_assign['11']['plus']?>, fail: <?php if(isset($exam_assign['11']['total_pass'])) echo $exam_assign['11']['total_fail']*100/$exam_assign['11']['plus']?>}
                                <?php }} else {?>
                                { state: "December", Pass: 0, fail: 0}
                                <?php }?>
                            ];

                            $("#bar-2").dxChart({
                                equalBarWidth: false,
                                dataSource: dataSource,
                                commonSeriesSettings: {
                                    argumentField: "state",
                                    type: "bar"
                                },
                                series: [
                                    { valueField: "pass", name: "Pass Status", color: "#0e62c7" },
                                    { valueField: "fail", name: "Fail Status", color: "#2c2e2f" }
                                ],
                                legend: {
                                    verticalAlignment: "bottom",
                                    horizontalAlignment: "center"
                                },
                                title: "Exam Statistic of month view"
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
