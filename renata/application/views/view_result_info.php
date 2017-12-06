<?php $i=0;
$myans=array();
if(isset($pso_exam_questions['0']['pso_answers'])){
    $ans=$pso_exam_questions['0']['pso_answers'];
    $myans=explode(',', $ans);
}


?>
<div class="body_wrapper col-md-12"> <!-- MAIN BODY PART -->
    <h3 class="header_wrapper center-block text-center">Result</h3>

    <div class="result_info_wrapper">
        <div class="first_info same_info col-md-6">
            <h4 class="same_info_header">PSO Information</h4>
            <div class="same_info_body col-md-12">
                <p>PSO ID:#<?php echo $pso_exam_details['0']['pso_id']?> </p>
                <p>PSO Name: <?php echo $pso_exam_details['0']['pso_name']?></p>
                <p>Duration: <?php echo $pso_exam_details['0']['time']?> min</p>
                <p>Points: <?php echo $pso_exam_details['0']['marks']?></p>
            </div>
        </div>

        <div class="last_info same_info col-md-6">
            <h4 class="same_info_header">Test Information</h4>
            <div class="same_info_body col-md-12">
                <p>Test ID: <?php echo $pso_exam_details['0']['exam_id']?></p>
                <p>Test Name: <?php echo $pso_exam_details['0']['exam_name']?></p>
                <p>Duration: <?php echo $pso_exam_details['0']['time']?> min</p>
                <p>Points: <?php echo $pso_exam_details['0']['exam_marks']?></p>
            </div>
        </div>

        <div class="bottom_info same_info col-md-12">
            <h4 class="same_info_header">Answer Script</h4>
            <div class="same_info_body with-scroll">
                <?php foreach ($pso_exam_questions as $pso_exam_question){ $i++;?>
                <div class="same_info_boxes col-md-12">
                    <p><?php echo $i?>. Question: <?php echo $pso_exam_question['question']?></p><br>
                    <div class="same_info_insider"><p>a. <?php echo $pso_exam_question['option1']?> </p></div>
                    <div class="same_info_insider"><p>b. <?php echo $pso_exam_question['option2']?></p></div>
                    <div class="same_info_insider"><p>c. <?php echo $pso_exam_question['option3']?></p></div>
                    <div class="same_info_insider"><p>d. <?php echo $pso_exam_question['option4']?></p></div>
                    <div class="same_info_insider">
                        <?php if($myans[$i-1]==$pso_exam_question['answer']){?>
                            <p>PSO's Answer: <?php echo $myans[$i-1]?> </p>
                        <?php } else {?>
                            <p>PSO's Answer:<span style="color: red"><?php echo $myans[$i-1]?></span></p>
                        <?php }?>
                        <p>Right Answer: <?php echo $pso_exam_question['answer']?> </p>
                    </div>
                </div> <!-- same_info_boxes -->
                <?php }?>
            </div> <!-- same_info_body -->
        </div> <!-- bottom_info same_info -->
    </div>
    <div class="copy_right col-md-12">
        <br>
        <p class="text-center">&copy; 2016 ALL Rights Reserved by <br> Renata Ltd.</p>
    </div>

</div> <!-- body_wrapper -->
</div><!-- right-col -->
</div> <!-- main container #full-width -->