<?php
/**
 * Created by PhpStorm.
 * User: Sudipta Ghosh
 * Date: 11/28/2017
 * Time: 12:01 PM
 */
$i = 0;
$exp_date=explode('-', $exam['0']['exp_date']);
$exam['0']['exp_date'] = $exp_date[1].'/'.$exp_date[2].'/'.$exp_date[0];
?>

<div class="main-content">

    <!-- User Info, Notifications and Menu Bar -->
    <?php echo $user_profile; ?>
    <div class="page-title">

        <div class="title-env">
            <h1 class="title"><?php echo $exam['0']['exam_name'] ?> Test Paper</h1>
            <p class="description">View and manage <?php echo $exam['0']['exam_name'] ?> test paper according to
                needs</p>
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

                    <strong>Test Paper</strong>
                </li>
            </ol>

        </div>

    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="col-md-offset-11 col-md-1">
                    <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#myModal5">Edit</a>
                </div>
                <div style="font-size: small;line-height: 170%">
                    <label><strong>Business:</strong> <?php echo $exam['0']['business_name'] ?></label><br>
                    <label><strong>Test Name:</strong> <?php echo $exam['0']['exam_name'] ?></label><br>
                    <label><strong>Test Suggestion:</strong> <?php echo $exam['0']['exam_suggestion'] ?></label><br>
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
                    <label><strong>No of Region Assign:</strong> <?php echo $region['0']['region_counter'] ?>
                    </label><br>
                    <?php if ($exam['0']['publish_status'] == 0) { ?>
                        <label><strong>Publication Status: </strong><label class="text-red"> Unpublished</label></label>
                        <br>
                    <?php } else { ?>
                        <label><strong>Publication Status: </strong><label class="text-success">
                                Published</label></label><br>
                    <?php } ?><br>

                    <?php if ($exam['0']['publish_status'] == 0) { ?>
                        <a style="border-radius: 3px" onclick="return publish_exam()"
                           href="<?php echo base_url() ?>test/publish_exam_ans?exam_id=<?php echo $exam['0']['exam_id'] ?>"
                           class="btn btn-success ">Publish</a>
                    <?php } else { ?>
                        <a style="border-radius: 3px" onclick="return unpublish_exam()"
                           href="<?php echo base_url() ?>test/unpublish_exam_ans?exam_id=<?php echo $exam['0']['exam_id'] ?>"
                           class="btn btn-success">Unpublished</a>
                    <?php } ?>


                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <h3 class="text-center text-bold text-gray">Question</h3>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?php foreach ($questions as $question) {
                $i++ ?>
                <div class="panel panel-default">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="col-md-12" style="font-size: small">
                                <label><strong><?php echo $i; ?>. </strong> Question:<?php echo $question['question'] ?>
                                </label>
                            </div>
                            <div style="font-size: small">
                                <div class="col-md-10">
                                    <div class="col-md-3"><label><strong>a. </strong><?php echo $question['option1'] ?>
                                        </label></div>
                                    <div class="col-md-3"><label><strong>b. </strong><?php echo $question['option2'] ?>
                                        </label></div>
                                    <div class="col-md-3"><label><strong>c. </strong><?php echo $question['option3'] ?>
                                        </label></div>
                                    <div class="col-md-3"><label><strong>d. </strong><?php echo $question['option4'] ?>
                                        </label></div>
                                </div>
                                <div class="col-md-2">
                                    <div class="col-md-12"><label><strong class="text-success">Answer. </strong><?php echo $question['answer'] ?>
                                        </label></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <br>
                            <div class="col-md-11">
                                <a title="Edit Question" href="#" data-toggle="modal" data-target="#myModal<?php echo $i ?>"><i
                                            class="fa fa-edit text-primary"></i></a>
                            </div>
                            <div class="col-md-1">
                                <a onclick="return delete_question();" href="<?php echo base_url()?>test/delete_question?exam_id=<?php echo $exam['0']['exam_id']?>&question_id=<?php echo $question['question_id']?>"><i  class="fa fa-trash text-danger"></i></a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="myModal<?php echo $i ?>" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <form class="validate"
                              action="<?php echo base_url() ?>test/update_question" method="post">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close cross_btn no_back_btn"
                                            data-dismiss="modal">&times;
                                    </button>
                                    <h3 class="modal-title text-bold">Update question and answer</h3>

                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Question</label>
                                                <input name="question" value="<?php echo $question['question'] ?>"
                                                       type="text" class="form-control" id="text_sample_question" alt=""
                                                       placeholder="Enter Test Question" data-validate="required"
                                                       data-message-required="Please fill up Test Question">
                                                <input name="exam_id"
                                                       value="<?php echo $question['tbl_exam_exam_id'] ?>"
                                                       type="hidden" class="form-control" id="text_sample_question"
                                                       alt="" placeholder="Sample question">
                                                <input name="question_id"
                                                       value="<?php echo $question['question_id'] ?>" type="hidden"
                                                       class="form-control" id="text_sample_question" alt=""
                                                       placeholder="Sample question">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Option one</label>
                                                <input name="option1"
                                                       value="<?php echo $question['option1'] ?>" type="text"
                                                       class="form-control" id="option_a" alt=""
                                                       placeholder="Option  One" data-validate="required"
                                                       data-message-required="Please fill up Test Question">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Option two</label>
                                                <input name="option2"
                                                       value="<?php echo $question['option2'] ?>" type="text"
                                                       class="form-control" id="option_a" alt=""
                                                       placeholder="Option  Two" data-validate="required"
                                                       data-message-required="Please fill up Test Question">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Option three</label>
                                                <input name="option3"
                                                       value="<?php echo $question['option3'] ?>" type="text"
                                                       class="form-control" id="option_c" alt=""
                                                       placeholder="Option  Three" data-validate="required"
                                                       data-message-required="Please fill up Test Question">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Option four</label>
                                                <input name="option4"
                                                       value="<?php echo $question['option4'] ?>" type="text"
                                                       class="form-control" id="option_d" alt=""
                                                       placeholder="Option  Four" data-validate="required"
                                                       data-message-required="Please fill up Test Question">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label text-success">Answer</label>
                                                <script type="text/javascript">
                                                    jQuery(document).ready(function ($) {
                                                        $("#answer").selectBoxIt({
                                                            showFirstOption: true
                                                        }).on('open', function () {
                                                            // Adding Custom Scrollbar
                                                            $(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
                                                        });
                                                    });
                                                </script>

                                                <select name="answer" class="form-control ans" id="answer">
                                                    <option value="-1">Select answer</option>
                                                    <option <?php if($question['answer']=='a') echo 'selected'?> value="a">Option one</option>
                                                    <option <?php if($question['answer']=='b') echo 'selected'?> value="b">Option two</option>
                                                    <option <?php if($question['answer']=='c') echo 'selected'?> value="c">Option three</option>
                                                    <option <?php if($question['answer']=='d') echo 'selected'?> value="d">Option four</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary btn-block"
                                           value="Update Question">

                                </div>
                            </div>
                        </form>

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



<div class="modal fade" id="myModal5" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <form class="validate" method="post" action="<?php echo base_url() ?>test/update_test_info" onsubmit="return up_ques2()">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close cross_btn no_back_btn"
                            data-dismiss="modal">&times;
                    </button>
                    <h3 class="modal-title text-bold">Update <?php echo $exam['0']['exam_name'] ?> </h3>

                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Business</label>
                                <script type="text/javascript">
                                    jQuery(document).ready(function ($) {
                                        $("#business").selectBoxIt({
                                            showFirstOption: false
                                        }).on('open', function () {
                                            // Adding Custom Scrollbar
                                            $(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
                                        });
                                    });
                                </script>

                                <select name="business" class="form-control business" id="business"
                                        onchange="gen_list(this.value, 'generic_name');">
                                    <option value="-1">Select Business</option>
                                    <?php foreach ($business as $bus) { ?>
                                        <?php if ($this->session->userdata('business_code') == '00' && $bus['business_code'] != '00') { ?>
                                            <option <?php if($exam['0']['tbl_business_business_code']==$bus['business_code']) echo 'selected'?> value="<?= $bus['business_code'] ?>"><?= $bus['business_name'] ?></option>
                                        <?php } else { ?>
                                            <?php if ($this->session->userdata('business_code') == $bus['business_code'] && $bus['business_code'] != '00') { ?>
                                                <option <?php if($exam['0']['tbl_business_business_code']==$bus['business_code']) echo 'selected'?> value="<?= $bus['business_code'] ?>"><?= $bus['business_name'] ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                                    <input name="exam_id" value="<?php echo $exam['0']['exam_id'] ?>" type="hidden"
                                           class="form-control" id="text_sample_question" alt="" placeholder="Test ID">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Test Name</label>

                                <input name="exam_name" value="<?php echo $exam['0']['exam_name'] ?>"
                                       type="text" class="form-control" id="text_sample_question" alt=""
                                       placeholder="Enter Test Name" data-validate="required"
                                       data-message-required="Please fill up Test Name">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Test Suggestion</label>

                                <input name="exam_suggestion" value="<?php echo $exam['0']['exam_suggestion'] ?>"
                                       type="text" class="form-control" id="text_sample_question" alt=""
                                       placeholder="Enter Test Suggestion" data-validate="required"
                                       data-message-required="Please fill up Test Suggestion">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Expire Date</label>

                                <input type="text" class="form-control datepicker exp_date" data-start-view="1" name="exp_date" value="<?php echo $exam['0']['exp_date']?>"
                                       id="exp_date" data-validate="required" data-message-required="Please select the expire date">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Test Time</label>
                                <input type="text" class="form-control test_time" name="exam_time" value="<?php echo $exam['0']['duration'] ?>" id="time" data-mask="999"
                                       placeholder="Test Time (min)" data-validate="required"
                                       data-message-required="Please fill up the test time"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Test Total Mark</label>
                                <input type="text" class="form-control test_marks" name="exam_marks" value="<?php echo $exam['0']['exam_marks'] ?>"
                                       id="marks" data-mask="999"
                                       placeholder="Test Total Mark" data-validate="required"
                                       data-message-required="Please fill up the test total mark"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Test Type</label>
                                <script type="text/javascript">
                                    jQuery(document).ready(function ($) {
                                        $("#test_type").selectBoxIt({
                                            showFirstOption: true
                                        }).on('open', function () {
                                            // Adding Custom Scrollbar
                                            $(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
                                        });
                                    });
                                </script>

                                <select name="exam_type" class="form-control test_type" id="test_type">
                                    <option <?php if ($exam['0']['exam_type'] == '1') echo 'selected'?> value="1" selected="selected">Mandatory Test</option>
                                    <option <?php if ($exam['0']['exam_type'] == '2') echo 'selected'?> value="2">Optional Test</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Pass Mark Percentage</label>
                                <script type="text/javascript">
                                    jQuery(document).ready(function ($) {
                                        $("#pass_marks").selectBoxIt({
                                            showFirstOption: true
                                        }).on('open', function () {
                                            // Adding Custom Scrollbar
                                            $(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
                                        });
                                    });
                                </script>

                                <select name="pass_marks" class="form-control pass_marks" id="pass_marks">
                                    <option <?php if ($exam['0']['pass_marks'] == 40) echo 'selected="selected"' ?> value="40">40%</option>
                                    <option <?php if ($exam['0']['pass_marks'] == 50) echo 'selected="selected"' ?> value="50">50%</option>
                                    <option <?php if ($exam['0']['pass_marks'] == 60) echo 'selected="selected"' ?> value="60">60%</option>
                                    <option <?php if ($exam['0']['pass_marks'] == 70) echo 'selected="selected"' ?> value="70">70%</option>
                                </select>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary btn-block"
                           value="Update Test">

                </div>
            </div>
        </form>

    </div>
</div>




