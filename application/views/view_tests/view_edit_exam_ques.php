<?php
/**
 * Created by PhpStorm.
 * User: Sudipta Ghosh
 * Date: 11/28/2017
 * Time: 12:01 PM
 */
$i = 0;
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
                    <label><strong>Test ID:</strong> <?php echo $exam['0']['exam_id'] ?></label><br>
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
                                <div class="col-md-3"><label><strong>a. </strong><?php echo $question['option1'] ?>
                                    </label></div>
                                <div class="col-md-3"><label><strong>b. </strong><?php echo $question['option2'] ?>
                                    </label></div>
                                <div class="col-md-3"><label><strong>c. </strong><?php echo $question['option3'] ?>
                                    </label></div>
                                <div class="col-md-3"><label><strong>d. </strong><?php echo $question['option4'] ?>
                                    </label></div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="col-md-11">
                                <a href="#" data-toggle="modal" data-target="#myModal<?php echo $i ?>"><i
                                            class="fa fa-edit text-primary"></i></a>
                            </div>
                            <div class="col-md-1">
                                <a onclick="return delete_question();"
                                   href="<?php echo base_url() ?>test/delete_question?exam_id=<?php echo $exam['0']['exam_id'] ?>&question_id=<?php echo $question['question_id'] ?>"
                                   data-toggle="modal" data-target="#myModal<?php echo $i ?>"><i
                                            class="fa fa-trash text-danger"></i></a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="myModal<?php echo $i ?>" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <form class="validate"
                              ction="<?php echo base_url() ?>test/update_question" method="post">
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
                                                <input name="option1"
                                                       value="<?php echo $question['option1'] ?>" type="text"
                                                       class="form-control" id="option_a" alt=""
                                                       placeholder="Option  One" data-validate="required"
                                                       data-message-required="Please fill up Test Question">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary btn-block"
                                           value="Save Drug Name">

                                </div>
                            </div>
                        </form>

                    </div>
                </div>


                <div class="modal fade" id="myModal<?php echo $i ?>" role="dialog">
                    <form action="<?php echo base_url() ?>test/update_question" method="post"
                          class="form-horizontal">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h3 class="modal-title text-center">Update Question and Answer </h3>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input required="required" name="question"
                                                   value="<?php echo $question['question'] ?>" type="text"
                                                   class="form-control" id="text_sample_question" alt=""
                                                   placeholder="Sample question">
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
                                    <div class="col-sm-6 a">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input required="required" name="option1"
                                                       value="<?php echo $question['option1'] ?>" type="text"
                                                       class="form-control" id="option_a" alt=""
                                                       placeholder="Option a">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 b">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input required="required" name="option2"
                                                       value="<?php echo $question['option2'] ?>" type="text"
                                                       class="form-control" id="option_b" alt=""
                                                       placeholder="Option b">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 a">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input required="required" name="option3"
                                                       value="<?php echo $question['option3'] ?>" type="text"
                                                       class="form-control" id="option_c" alt=""
                                                       placeholder="Option c">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 b">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input required="required" name="option4"
                                                       value="<?php echo $question['option4'] ?>" type="text"
                                                       class="form-control" id="option_d" alt=""
                                                       placeholder="Option d">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 answer">
                                        <div class="form-group">
                                            <select required="required" name="answer" class="form-control"
                                                    id="sel1">
                                                <option selected="selected"
                                                        value="<?php echo $question['answer'] ?>">
                                                    Option <?php echo $question['answer'] ?></option>
                                                <option value="a">Option a</option>
                                                <option value="b">Option b</option>
                                                <option value="c">Option c</option>
                                                <option value="d">Option d</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-default go">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
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

