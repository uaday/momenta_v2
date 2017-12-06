<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/modal4.css">
<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/modal5.css">
<?php $i = 0; ?>
<div class="body_wrapper col-md-12"> <!-- MAIN BODY PART -->
    <h3 class="header_wrapper center-block text-center"><?php echo $exam['0']['exam_name'] ?></h3>
    <div align="center">
        <?php if ($this->session->userdata('update_exam') == 'Exam info update successful') { ?>
            <div class="alert alert-success"><strong><?php echo 'Exam’s Information has been successfully updated'; ?></strong></div>
            <?php $this->session->unset_userdata('update_exam');
        } ?>
    </div>
    <div align="center">
        <?php if ($this->session->userdata('publish_exam') == 'Exam Publish successful') { ?>
            <div class="alert alert-success"><strong><?php echo 'Exam Publish successful'; ?></strong></div>
            <?php $this->session->unset_userdata('publish_exam');
        } ?>
    </div>
    <div align="center">
        <?php if ($this->session->userdata('unpublish_exam') == 'Exam Unpublished successful') { ?>
            <div class="alert alert-success"><strong><?php echo 'Exam Unpublished successful'; ?></strong></div>
            <?php $this->session->unset_userdata('unpublish_exam');
        } ?>
    </div>
    <div align="center">
        <?php if ($this->session->userdata('update_question') == 'Exam Question Update Successful') { ?>
            <div class="alert alert-success"><strong><?php echo 'Exam’s Question has been successfully updated'; ?></strong></div>
            <?php $this->session->unset_userdata('update_question');
        } ?>
    </div>
    <div align="center">
        <?php if ($this->session->userdata('delete_question') == 'Question has been deleted Successful') { ?>
            <div class="alert alert-success"><strong><?php echo 'Question has been Successfully deleted'; ?></strong></div>
            <?php $this->session->unset_userdata('delete_question');
        } ?>
    </div>
    <div class="col-md-12 back_max">
        <div class="result_info_wrapper" style="padding-top: 40px;">
            <div class="first_info max_same_info col-md-6">
                <button type="button" class="pull-right no_back_btn" data-toggle="modal" data-target="#myModal5"
                        style="    margin-top: 15px;"><img class="edit_size pull-right"
                                                           src="<?php echo base_url() ?>asset/images/edit.png"
                                                           alt="edit-button"></button>
                <div class="same_info_body col-md-12">
                    <p>Test ID: 000<?php echo $exam['0']['exam_id'] ?></p>
                    <p>Test Name: <?php echo $exam['0']['exam_name'] ?></p>
                    <p>Duration: <?php echo $exam['0']['duration'] ?> min</p>
                    <p>Points: <?php echo $exam['0']['exam_marks'] ?></p>
                    <p>Percentage of Pass Marks: <?php echo $exam['0']['pass_marks'] ?>%</p>
                    <?php if ($exam['0']['exam_type'] == 1) { ?>
                        <p>Exam Type: Mandatory</p>
                    <?php } else { ?>
                        <p>Exam Type: Optional</p>
                    <?php } ?>
                    <?php if ($exam['0']['publish_status'] == 0) { ?>
                        <p>Publish Status: Not Published</p>
                    <?php } else { ?>
                        <p>Publish Status: Published</p>
                    <?php } ?>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="col-md-6 right_btn_wrap">
                <?php if ($exam['0']['publish_status'] == 0) { ?>
                    <a href="<?php echo base_url() ?>test/publish_exam_ans?exam_id=<?php echo $exam['0']['exam_id'] ?>"
                       class="btn btn-default right_btn">Publish</a>
                <?php } else { ?>
                    <a href="<?php echo base_url() ?>test/unpublish_exam_ans?exam_id=<?php echo $exam['0']['exam_id'] ?>"
                       class="btn btn-default right_btn">Not Publish</a>
                <?php } ?>

            </div>

            <div class="bottom_info same_info col-md-12">
                <h4 class="same_info_header">Questions</h4>
                <div class="same_info_body with-scroll">
                    <?php foreach ($questions as $question) {
                        $i++; ?>
                        <div class="same_info_boxes col-md-12">
                            <p class="col-md-6"><?php echo $i; ?>. Question: <?php echo $question['question'] ?></p>
                            <div class="col-md-6">
                                <button style="height: 30px;width: 30px;margin-bottom: 10px;" class="no_back_btn pull-right" type="button" class="btn btn-info btn-lg"
                                        data-toggle="modal" data-target="#myModal<?php echo $i ?>"><img
                                        class="edit_size pull-right" src="<?php echo base_url() ?>asset/images/edit.png"
                                        alt="edit-button"></button>
                            </div>
                            <br>
                            <div class="col-md-11 max_under">
                                <div class="same_info_insider"><p>a. <?php echo $question['option1'] ?></p></div>
                                <div class="same_info_insider"><p>b. <?php echo $question['option2'] ?></p></div>
                                <div class="same_info_insider"><p>c. <?php echo $question['option3'] ?></p></div>
                                <div class="same_info_insider"><p>d. <?php echo $question['option4'] ?></p></div>
                                <div class="same_info_insider">
                                    <p>Right Answer: <?php echo $question['answer'] ?> </p>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <a onclick="return delete_question();" href="<?php echo base_url()?>test/delete_question?exam_id=<?php echo $exam['0']['exam_id']?>&question_id=<?php echo $question['question_id']?>"><img id="drug_audio_logo" style="height: 30px;width: 30px; margin-left: 15px"  src="<?php echo base_url()?>asset/images/trash-blue.png" alt="cloud"></a>
                            </div>
                        </div> <!-- same_info_boxes -->


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
                </div> <!-- same_info_body -->
            </div> <!-- bottom_info same_info -->
        </div>
    </div>
    <div class="copy_right col-md-12">
        <br>
        <p class="text-center">&copy; 2016 ALL Rights Reserved by <br> Renata Ltd.</p>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal5" role="dialog">
        <form method="post" action="<?php echo base_url() ?>test/update_test_info" onsubmit="return up_ques2()">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title text-center">Update <?php echo $exam['0']['exam_name'] ?> </h3>
                    </div>

                    <div class="modal-body" align="center">

                        <div class="col-sm-offset-1 col-sm-2">
                            <label>Test Id: </label>
                        </div>
                        <div class="col-sm-7 test_id">
                            <div class="form-group">
                                <input disabled value="<?php echo $exam['0']['exam_id'] ?>" type="text"
                                       class="form-control" id="text_sample_question" alt="" placeholder="Test ID">
                                <input name="exam_id" value="<?php echo $exam['0']['exam_id'] ?>" type="hidden"
                                       class="form-control" id="text_sample_question" alt="" placeholder="Test ID">
                            </div>
                        </div>
                        <div class="col-sm-offset-1 col-sm-2">
                            <label>Name: </label>
                        </div>
                        <div class="col-sm-7 test_id">
                            <div class="form-group">
                                <input required="required" name="exam_name"
                                       value="<?php echo $exam['0']['exam_name'] ?>" type="text" class="form-control"
                                       id="text_sample_question" alt="" placeholder="Test Name">
                            </div>
                        </div>
                        <div class="col-sm-offset-1 col-sm-2">
                            <label>Time: </label>
                        </div>
                        <div class="col-sm-3 test_id">
                            <div class="form-group">
                                <input required="required" style="color: #0C529E;border-radius: 10px;height: 40px"
                                       name="exam_time" value="<?php echo $exam['0']['duration'] ?>" type="number"
                                       class="form-control test_time" id="text_sample_question" alt="" placeholder="Duration">
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <label>Marks: </label>
                        </div>
                        <div class="col-sm-3 test_id">
                            <div class="form-group">
                                <input required="required" style="color: #0C529E;border-radius: 10px;height: 40px"
                                       name="exam_marks" value="<?php echo $exam['0']['exam_marks'] ?>" type="number"
                                       class="form-control test_marks" id="text_sample_question" alt="" placeholder="Points">
                            </div>
                        </div>

                        <div class="col-sm-offset-1 col-sm-2">
                            <label>Type: </label>
                        </div>
                        <div class="col-sm-7 test_id">
                            <div class="form-group">
                                <select name="exam_type" class="form-control">
                                    <?php if ($exam['0']['exam_type'] == '1') { ?>
                                        <option value="1" selected="selected">Mandatory</option>
                                        <option value="2">Optional</option>
                                    <?php } else { ?>
                                        <option value="2" selected="selected">Optional</option>
                                        <option value="1">Mandatory</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-offset-1 col-sm-2">
                            <label>Pass Mark: </label>
                        </div>
                        <div class="col-sm-7 test_id">
                            <div class="form-group">
                                <select name="pass_marks" class="form-control">
                                    <option
                                        value="40" <?php if ($exam['0']['pass_marks'] == 40) echo 'selected="selected"' ?>>
                                        40%
                                    </option>
                                    <option
                                        value="50" <?php if ($exam['0']['pass_marks'] == 50) echo 'selected="selected"' ?>>
                                        50%
                                    </option>
                                    <option
                                        value="60" <?php if ($exam['0']['pass_marks'] == 60) echo 'selected="selected"' ?>>
                                        60%
                                    </option>
                                    <option
                                        value="70" <?php if ($exam['0']['pass_marks'] == 70) echo 'selected="selected"' ?>>
                                        70%
                                    </option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-default " value="Update">
                    </div>

                </div>
            </div>
        </form>
    </div>

    <!-- Modal -->

</div> <!-- body_wrapper -->
</div><!-- right-col -->
</div> <!-- main container #full-width -->