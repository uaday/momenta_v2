<?php
/**
 * Created by PhpStorm.
 * User: Sudipta
 * Date: 11/2/2017
 * Time: 12:17 AM
 */
?>

<div class="main-content">

    <?php echo $user_profile; ?>
    <div class="page-title">

        <div class="title-env">
            <h1 class="title">Create Test</h1>
            <p class="description">To analyze your pso performance create test</p>
        </div>

        <div class="breadcrumb-env">

            <ol class="breadcrumb bc-1">
                <li>
                    <a href="<?= base_url() ?>"><i class="fa-home"></i>Home</a>
                </li>
                <li>

                    <a href="<?php echo base_url() ?>test/create_test">Testing Center</a>
                </li>
                <li class="active">

                    <strong>Create Test</strong>
                </li>
            </ol>

        </div>

    </div>

    <div class="panel panel-default">

        <div class="panel-heading">
            <div class="panel-title">
                Add new test form
            </div>

        </div>

        <?php if ($this->session->userdata('create_incentive')) { ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong><?php echo $this->session->userdata('create_incentive'); ?></strong>
            </div>
            <?php $this->session->unset_userdata('create_incentive');
        } ?>

        <div class="panel-body">
            <form method="post" action="<?php echo base_url() ?>test/save_test" accept-charset="utf-8"
                  onsubmit="return up_ques()" enctype="multipart/form-data">

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
                                <option value="<?= $bus['business_code'] ?>"><?= $bus['business_name'] ?></option>
                            <?php } else { ?>
                                <?php if ($this->session->userdata('business_code') == $bus['business_code'] && $bus['business_code'] != '00') { ?>
                                    <option value="<?= $bus['business_code'] ?>"><?= $bus['business_name'] ?></option>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label">Test Name</label>
                    <input type="text" class="form-control test_name" id="testName" name="testName"
                           data-validate="required"
                           placeholder="Test Name" data-message-required="Please fill up test name"/>
                    <input id="test_id" class="test_id" name="test_id" type="hidden">
                    <input  name="form_type" type="hidden" value="1">
                </div>
                <div class="form-group">
                    <label class="control-label">Test Suggestion</label>
                    <input type="text" class="form-control test_suggestion" id="testSuggestion" name="testSuggestion"
                           data-validate="required"
                           placeholder="Test Suggestion" data-message-required="Please fill up test suggestion"/>

                </div>
                <div class="form-group">
                    <label class="control-label">Expire Date</label>
                    <input type="text" class="form-control datepicker exp_date" data-start-view="1" name="exp_date"
                           id="exp_date" data-validate="required" data-message-required="Please select the expire date">
                </div>
                <div class="form-group">
                    <label class="control-label">Pass Mark Percentage</label>
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
                        <option value="40">40%</option>
                        <option value="50" selected="selected">50%</option>
                        <option value="60">60%</option>
                        <option value="70">70%</option>
                    </select>

                </div>
                <div class="form-group">
                    <label class="control-label">Test Type</label>
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

                    <select name="test_type" class="form-control test_type" id="test_type">
                        <option value="1" selected="selected">Mandatory Test</option>
                        <option value="2">Optional Test</option>
                    </select>

                </div>
                <div class="form-group">
                    <label class="control-label">Test Time</label>
                    <input type="text" class="form-control test_time" name="time" id="time" data-mask="999"
                           placeholder="Test Time (min)" data-validate="required"
                           data-message-required="Please fill up the test time"/>
                </div>
                <div class="form-group">
                    <label class="control-label">Test Total Mark</label>
                    <input type="text" class="form-control test_marks" name="marks" id="marks" data-mask="999"
                           placeholder="Test Total Mark" data-validate="required"
                           data-message-required="Please fill up the test total mark"/>
                </div>
                <div class="form-group">
                    <label class="control-label text-danger">Question</label>
                    <input type="text" class="form-control ques" id="ques" name="ques"
                           data-validate="required"
                           placeholder="Enter Question" data-message-required="Please fill up the question"/>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Option One</label>
                            <input type="text" class="form-control option1" id="option1" name="option1"
                                   data-validate="required"
                                   placeholder="Option one" data-message-required="Please fill up option one"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Option Two</label>
                            <input type="text" class="form-control option2" id="option2" name="option2"
                                   data-validate="required"
                                   placeholder="Option two" data-message-required="Please fill up option two"/>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Option Three</label>
                            <input type="text" class="form-control option3" id="option3" name="option3"
                                   data-validate="required"
                                   placeholder="Option three" data-message-required="Please fill up option three"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Option Four</label>
                            <input type="text" class="form-control option4" id="option4" name="option4"
                                   data-validate="required"
                                   placeholder="Option four" data-message-required="Please fill up option four"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label text-success">Answer</label>
                    <script type="text/javascript">

                            $("#answer").selectBoxIt({
                                showFirstOption: true
                            }).on('open', function () {
                                // Adding Custom Scrollbar
                                $(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
                            });
                    </script>

                    <select name="answer" class="form-control ans" id="answer">
                        <option selected="selected" value="-1">Select answer</option>
                        <option value="a">Option one</option>
                        <option value="b">Option two</option>
                        <option value="c">Option three</option>
                        <option value="d">Option four</option>
                    </select>

                </div>

                <div class="row">
                    <div class="col-md-6">

                        <label  class="control-label text-bold" style="color: black;margin-top: 5%">Number of question(s) added: <span id="qus_no">0</span></label>

                    </div>
                    <div class="col-md-offset-4 col-md-1" >
                        <div class="form-group">
                            <a style="border-radius: 3px;margin-left: 20px" onclick="add_ques()" class="btn btn-blue">Add Question</a>
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <button  style="border-radius: 3px" type="submit" class="btn btn-success">Save Test</button>
                </div>

            </form>
        </div>

    </div>

    <?php if (isset($footer)) {

        echo $footer;
    } ?>
</div>