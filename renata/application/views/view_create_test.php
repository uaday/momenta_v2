
<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/target.css">
<div class="body_wrapper"> <!-- -MAIN BODY PART- -->
    <div class="container_wrapper form_type_wrapper">
        <div class="form_type first_one_test">
            <h3 class="header_wrapper center-block text-center">Create test</h3>

            <div align="center">
                <?php if ($this->session->userdata('create_test') == 'Create Test Successful!') { ?>
                    <div class="alert alert-success"><strong><?php echo 'A new test has been created successfully'; ?></strong></div>
                    <?php $this->session->unset_userdata('create_test');
                } ?>
            </div>

            <form method="post" action="<?php echo base_url()?>test/assign_test" accept-charset="utf-8"  onsubmit="return up_ques()" enctype="multipart/form-data">
                <fieldset>

                    <!-- Text ineut-->
                    <div class="form-group">
                        <div class="col-md-12">
                            <input required="required" id="textinput" name="testName" type="text" placeholder="Test Name" class="form-control test_name input-md">
                            <input id="test_id" class="test_id"  name="test_id" type="hidden" >
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input required="required" id="textinput" name="testSuggestion" type="text" placeholder="Test Suggestion" class="form-control test_suggestion input-md">
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <div class="col-md-12">
                            <select style="color: #3374BA;font-weight: bold;text-align: center" id="textinput" name="pass_marks" class="form-control input-md pass_marks">
                                <option value="-1">Pass Mark Percentage</option>
                                <option value="40">40%</option>
                                <option value="50">50%</option>
                                <option value="60">60%</option>
                                <option value="70">70%</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <div class="col-md-12">
                            <select style="color: #3374BA;font-weight: bold;text-align: center" id="textinput" name="test_type" class="form-control input-md test_type">
                                <option value="-1">Select Test Type</option>
                                <option value="1">Mandatory Test</option>
                                <option value="2">Optional Test</option>
                            </select>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <!-- Text input-->
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input style="border-radius:10px " id="textinput" name="time" type="number" placeholder="Time in minutes" class="form-control test_time input-md text-center">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- Text input-->
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input style="border-radius:10px " id="textinput" name="marks" type="number" placeholder="Marks" class="form-control test_marks input-md text-center">
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="custom_hr">

                    <div id="ques_form">
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="textinput">Question:</label>
                            <div class="col-md-10">
                                <input id="ques" name="ques" type="text" placeholder="Enter Question" class="form-control input-md ques">
                            </div>
                        </div>
                        <br>
                        <br>
                        <!-- Prepended checkbox -->
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="prependedcheckbox">Options:</label>

                            <div class="col-md-5">
                                <div class="input-group">
                                    <input id="prependedcheckbox" name="option1" class="form-control option1" type="text" placeholder="Option one">
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="input-group">
                                    <input id="prependedcheckbox" name="option2" class="form-control option2" type="text" placeholder="Option two">
                                </div>
                            </div>

                            <label class="col-md-2 control-label" for="prependedcheckbox"></label>

                            <div class="col-md-5" style="margin: 15px 0 0 0;">
                                <div class="input-group">
                                    <input id="prependedcheckbox" name="option3" class="form-control option3" type="text" placeholder="Option three">
                                </div>
                            </div>

                            <div class="col-md-5" style="margin: 15px 0 0 0;">
                                <div class="input-group">
                                    <input id="prependedcheckbox" name="option4" class="form-control option4" type="text" placeholder="Option four">
                                </div>
                            </div>
                        </div> <!-- form-group -->
                        <br>
                        <br>
                        <br>
                        <br>

                        <!-- Prepended checkbox -->
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="prependedcheckbox">Answer:</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <select name="answer" style="width: 163px; border-radius: 10px;color: #3374BA;font-weight: bold" id="prependedcheckbox" class="form-control ans">
                                        <option value="-1">Select answer</option>
                                        <option value="a">Option one</option>
                                        <option value="b">Option two</option>
                                        <option value="c">Option three</option>
                                        <option value="d">Option four</option>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-2">
                                    <div class="test_no   text-center"><h1 id="qus_no">0</h1></div>
                                </div>
                                <!-- Button -->
                                <div class="form-group">
                                    <div class="col-md-4 pull-right">
                                        <a onclick="add_ques()" class="btn btn-primary">Add More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-4">
                                <div class="checkbox universal" id="universal1">
                                    <label>
                                        <img class="universal_img" id="universal1_img"
                                             src="<?php echo base_url() ?>asset/images/Snowfall.png" alt="logo"> <span
                                            class="universal_p1">Universal</span>
                                    </label>
                                    <input type="checkbox" name="global" value="global" id="checkbox1" onchange="hidee()">
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group pso_group col-md-6" id="hh1">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1"
                                        onclick="showCheckboxes()">
                                <span class="pso_group"><img class="pso_group_img"
                                                             src="<?php echo base_url() ?>asset/images/PSO.png"
                                                             alt="PSO Group">PSO Group</span>
                                    <span class="caret"></span>
                                </button>
                                <div id="checkboxes" class="blue_ones" style="overflow: scroll; height: 150px;width: auto">
                                    <?php foreach ($depots as $depot){ ?>
                                    <label>
                                        <input type="checkbox" name="depots[]" id="one"
                                               value="<?php echo $depot['depot_code'] ?>"/><?php echo $depot['depot_name'] ?>
                                    </label>
                                    <label>
                                        <?php } ?>
                                </div>
                            </div>

                            <div class="form-group pso_group col-md-6" id="hh2">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1"
                                        onclick="showCheckboxes2()">
                                <span class="pso_group"><img class="pso_group_img " id="pso_dropdown"
                                                             src="<?php echo base_url() ?>asset/images/PSO.png"
                                                             alt="PSO Group">PSO </span>
                                    <span class="caret" id="pso_dropdown_p"></span>
                                </button>
                                <div id="checkboxes2" class="blue_ones" style="overflow: scroll; height: 150px;width: auto">
                                    <?php foreach ($psos as $pso){?>
                                    <label>
                                        <input type="checkbox" name="pso[]" id="one"
                                               value="<?php echo $pso['pso_id']?>"/><?php echo $pso['renata_id'].' -- '.$pso['pso_name']?>
                                    </label>
                                    <label>
                                        <?php } ?>
                                </div>
                            </div>
                        </div>

                    </div> <!-- row -->

                    <!-- Button -->
                    <div class="form-group">
                        <div class="col-md-4 pull-right">
                            <input style="margin-left: 55px" id="singlebutton" type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </div>

                </fieldset>
            </form>
        </div> <!-- /////first_one///// -->
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="copy_right col-md-12">
            <br>
            <p class="text-center">&copy; 2016 ALL Rights Reserved by <br> Renata Ltd.</p>
        </div>

    </div><!-- container_wrapper -->
    <!-- ////////////// -->
</div> <!-- body_wrapper -->
</div><!-- right-col -->
</div> <!-- main container #full-width -->