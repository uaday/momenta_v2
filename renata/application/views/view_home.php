<?php $i = 0; ?>
<div class="body_wrapper"> <!-- MAIN BODY PART -->

    <div class="container_wrapper">
        <div class="col-md-6 back-border first_one">
            <h3 class="center-block back-similar text-center">Recent Literature</h3><br>
            <table class="full_width home-table1">
                <?php foreach ($drugs as $drug) {
                    if ($drug['drug_full_book']) { ?>
                        <tr>
                            <td><?php echo $drug['drug_name'] ?></td>
                            <td></td>
                            <td>
                                <a target="_blank" class="btn btn-primary center-block"
                                   href="https://docs.google.com/viewerng/viewer?url=<?php echo $drug['drug_full_book'] ?>">Full
                                    Book</a>
                            </td>
                        </tr>
                    <?php }
                } ?>
            </table>
            <a class="pull-right back-link" href="<?php echo base_url() ?>home/seemore_drug">See More</a>
        </div> <!-- first_one -->

        <div class="col-md-6 back-border last_one">
            <h3 class="center-block back-similar text-center">Recent Tests</h3><br>

            <table class="full_width home-table1">
                <?php foreach ($tests as $test) { ?>
                    <tr>
                        <td><?php echo $test['exam_name'] ?></td>
                        <td><?php echo $test['duration'] ?> min</td>
                        <td><?php echo $test['exam_marks'] ?> pts</td>
                    </tr>
                <?php } ?>
            </table>
            <a class="pull-right back-link" href="<?php echo base_url() ?>home/seemore_test">See More</a>
        </div> <!-- last_one -->
    </div> <!-- container_wrapper -->
    <div class="container_wrapper">
        <div class="col-md-12 back-border ">
            <h3 class="center-block back-similar text-center">Recent Incentives</h3><br>
            <table class="full_width home-table1">
                <?php foreach ($incentives as $incentive){?>
                    <tr>
                        <td><img src="<?php echo $incentive['incentives_image'] ?>" alt="image" style="height: 40px; width: 40px;border-radius: 10px;"></td>
                        <td><?php echo $incentive['incentives_name']?></td>
                        <td><?php echo $incentive['exp_date']?></td>
                        <td><?php echo $incentive['incentives_point']?></td>
                    </tr>
                <?php }?>
            </table>
            <a class="pull-right back-link" href="<?php echo base_url() ?>tar_shop/manage_incentives">See More</a>
        </div> <!-- first_one -->
    </div>
<!--    <div class="col-md-12 back-carousel full_width">-->
<!--        <div id="carousel-id" class="carousel slide" data-ride="carousel">-->
<!--            <ol class="carousel-indicators">-->
<!--                <li data-target="#carousel-id" data-slide-to="0" class=""></li>-->
<!--                <li data-target="#carousel-id" data-slide-to="1" class=""></li>-->
<!--                <li data-target="#carousel-id" data-slide-to="2" class="active"></li>-->
<!--            </ol>-->
<!---->
<!--            <div class="carousel-inner">-->
<!---->
<!--                --><?php //foreach ($sliders as $slider) {
//                    $i++;
//                    if ($i == 2) { ?>
<!--                        <div class="item active">-->
<!--                            <img style="width: 1280px;height: 520px" class="full_width"-->
<!--                                 data-src="holder.js/900x500/auto/#555:#5a5a5a/text:Third slide"-->
<!--                                 alt="Third slide" src="--><?php //echo $slider['incentives_image'] ?><!--">-->
<!--                        </div>-->
<!--                    --><?php //} else { ?>
<!--                        <div class="item ">-->
<!--                            <img style="width: 1280px;height: 520px" class="full_width"-->
<!--                                 data-src="holder.js/900x500/auto/#555:#5a5a5a/text:Third slide"-->
<!--                                 alt="Third slide" src="--><?php //echo $slider['incentives_image'] ?><!--">-->
<!--                        </div>-->
<!--                    --><?php //}
//                } ?>
<!--               -->
<!--            </div>-->
<!--            <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span-->
<!--                    class="glyphicon glyphicon-chevron-left"></span></a>-->
<!--            <a class="right carousel-control" href="#carousel-id" data-slide="next"><span-->
<!--                    class="glyphicon glyphicon-chevron-right"></span></a>-->
<!--        </div> <!-- carousel -->
<!--    </div>-->
    <div class="copy_right col-md-12">
        <br>
        <p class="text-center">&copy; 2016 ALL Rights Reserved by <br> Renata Ltd.</p>
    </div>
</div> <!-- body_wrapper -->
</div>
</div> <!-- main container #full-width -->