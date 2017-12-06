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



    <!-- Main Footer -->
    <!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
    <!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
    <!-- Or class "fixed" to  always fix the footer to the end of page -->
    <?php if(isset($footer)){

        echo $footer;
    }?>
</div>
