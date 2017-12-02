<?php
/**
 * Created by PhpStorm.
 * User: Sudipta Ghosh
 * Date: 11/28/2017
 * Time: 12:01 PM
 */
$i=0;
$myans=array();
if(isset($pso_exam_questions['0']['pso_answers'])){
    $ans=$pso_exam_questions['0']['pso_answers'];
    $myans=explode(',', $ans);
}
?>

<div class="main-content">

    <!-- User Info, Notifications and Menu Bar -->
    <?php echo $user_profile; ?>
    <div class="page-title">

        <div class="title-env">
            <h1 class="title">PSO answer script</h1>
            <p class="description">View and analyze PSO answer script for his improvement</p>
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

                    <a href="<?= base_url()?>test/result">Result</a>
                </li>
                <li class="active">

                    <strong>PSO Result</strong>
                </li>
            </ol>

        </div>

    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div style="font-size: small;line-height: 170%">
                    <h4 class="text-center text-bold text-info">PSO Information</h4><br>
                    <label><strong>PSO ID:</strong> <?php echo $pso_exam_details['0']['pso_id'] ?></label><br>
                    <label><strong>PSO Name:</strong> <?php echo $pso_exam_details['0']['pso_name']?></label><br>
                    <label><strong>Duration:</strong> <?php echo  $pso_exam_details['0']['time'] ?></label><br>
                    <label><strong>Points:</strong> <?php echo $pso_exam_details['0']['marks'] ?></label><br>

                </div>

            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div style="font-size: small;line-height: 170%">
                    <h4 class="text-center text-bold text-red">Test Information</h4><br>
                    <label><strong>Test ID:</strong> <?php echo $pso_exam_details['0']['exam_id'] ?></label><br>
                    <label><strong>Test Name:</strong> <?php echo $pso_exam_details['0']['exam_name']?></label><br>
                    <label><strong>Duration:</strong> <?php echo  $pso_exam_details['0']['time'] ?></label><br>
                    <label><strong>Points:</strong> <?php echo $pso_exam_details['0']['exam_marks'] ?></label><br>

                </div>

            </div>
        </div>

    </div>

    <div class="row">
        <h3 class="text-center text-bold text-gray">Answer Script</h3><br>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?php foreach ($pso_exam_questions as $pso_exam_question){ $i++;?>
                <div class="panel panel-default">
                    <div class="row">
                        <div class="col-md-10">
                                <div class="col-md-12">
                                    <label><strong><?php echo $i; ?>. </strong> Question:<?php echo $pso_exam_question['question'] ?>
                                    </label>
                                </div>
                            <div style="font-size: small">
                                <div class="col-md-12">
                                    <div class="col-md-3"><label><strong>a. </strong><?php echo $pso_exam_question['option1'] ?>
                                        </label></div>
                                    <div class="col-md-3"><label><strong>b. </strong><?php echo $pso_exam_question['option2'] ?>
                                        </label></div>
                                    <div class="col-md-3"><label><strong>c. </strong><?php echo $pso_exam_question['option3'] ?>
                                        </label></div>
                                    <div class="col-md-3"><label><strong>d. </strong><?php echo $pso_exam_question['option4'] ?>
                                        </label></div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-2">
                            <?php if($myans[$i-1]==$pso_exam_question['answer']){?>
                            <div class="col-md-12"><label><strong >PSO's Answer. </strong><span class="text-success"><?php echo  $myans[$i-1] ?></span>
                                </label></div>
                            <?php } else {?>
                                <div class="col-md-12"><label><strong >PSO's Answer. </strong><span class="text-danger"><?php echo $myans[$i-1] ?></span>
                                    </label></div>
                            <?php }?>
                            <div class="col-md-12"><label><strong >Right Answer. </strong><span class="text-success"><?php echo $pso_exam_question['answer'] ?></span>
                                </label></div>
                        </div>
                    </div>
                </div>



            <?php } ?>
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





