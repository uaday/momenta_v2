<?php $i = 0; ?>
<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/modal3.css">
<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/target.css">
<div class="body_wrapper"> <!-- MAIN BODY PART -->
    <div class="last_one_wrapper">
        <div class="col-md-6 form_type last_one_test">

            <h3 class="header_wrapper center-block text-center">Test Page</h3>
            <div align="center">
                <?php if ($this->session->userdata('assign') == 'Test Assign Successful') { ?>
                    <div class="alert alert-success"><strong><?php echo  'Test Assign Successful'; ?></strong></div>
                    <?php $this->session->unset_userdata('assign');
                } ?>
            </div>
            <div align="center">
                <?php if ($this->session->userdata('delete_exams') == 'Test Delete Successful') { ?>
                    <div class="alert alert-success"><strong><?php echo  'Test has been successfully deleted'; ?></strong></div>
                    <?php $this->session->unset_userdata('delete_exams');
                } ?>
            </div>

            <div class="form-group">
                <!-- ////////////////////////////////////////////popover section//////////////////////////////////////////// -->
                <table id="example3" class="table table_test">
                    <thead>
                    <tr>
                        <th class="text-center" style="border-radius: 10px 0 0 10px;">Test ID</th>
                        <th class="text-center">Test Name</th>
                        <th class="text-center" style="border-radius: 0 10px 10px 0; border-right: 0px;">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <!-- </table> -->
                    <!-- <table class="table table_data"> -->
                    <tbody>
                    <?php foreach ($tests as $test) {
                        $i++; ?>
                        <tr class="text-center">
                            <td>00<?php echo $test['exam_id'] ?></td>
                            <td><?php echo $test['exam_name'] ?></td>
                            <td>
                                <a href="<?php echo base_url() ?>test/view_edit_exam_ques?test_id=<?php echo $test['exam_id'] ?>"><img
                                        class="table_insider_img"
                                        src="<?php echo base_url() ?>asset/images/edit.png" alt="logo"></a>
                                <span class="table_insided_line"> | </span>
                                <button class="people_modal_btn" type="button" class="btn btn-info btn-lg"
                                        data-toggle="modal" data-target="#myPeopleModal<?php echo $i ?>">
                                    <img class="table_insider_img"
                                         src="<?php echo base_url() ?>asset/images/people_blue.png" alt="logo">
                                </button>
                                <span class="table_insided_line"> | </span>
                                <button class="people_modal_btn" type="button" class="btn btn-info btn-lg"
                                        data-toggle="modal" data-target="#myPeoplesModal<?php echo $i ?>">
                                    <img class="table_insider_img"
                                         src="<?php echo base_url() ?>asset/images/peoples_blue.png"
                                         alt="reneta people icon">
                                </button>
                                <span class="table_insided_line"> | </span>
                                <a onclick="return delete_exam()"
                                   href="<?php echo base_url() ?>test/delete_test?test_id=<?php echo $test['exam_id'] ?>"
                                    class="btn_action"><img
                                        style="background-color: transparent;border: none;"
                                        class="table_insider_img"
                                        src="<?php echo base_url() ?>asset/images/Trash-Blue.png"
                                        alt="reneta people icon"></a>
                            </td>
                        </tr>


                        <!-- People Modal -->
                        <div class="modal fade" id="myPeopleModal<?php echo $i ?>" role="dialog">
                            <form method="post" action="<?php echo base_url() ?>test/assign_test_to_pso">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close"
                                                    data-dismiss="modal">&times;</button>
                                            <h3 class="modal-title  pull-left">Test Id:
                                                00<?php echo $test['exam_id'] ?></h3>
                                            <input type="hidden" name="exam_id" value="<?php echo $test['exam_id'] ?>">
                                        </div>
                                        <div class="modal-body">
                                            <div class="test_id col-md-4">
                                                <p>Test Id: 00<?php echo $test['exam_id'] ?></p>
                                                <p>Test name: <?php echo $test['exam_name'] ?></p>
                                                <p>Duration: <?php echo $test['duration'] ?> min</p>
                                                <p>Points: <?php echo $test['exam_marks'] ?></p>
                                            </div>
                                            <div class="assign_to col-md-offset-2 col-md-5">
                                                <div class="form-group">
                                                    <label class="assign_to_label" for="sel1">Assign
                                                        To:</label>
                                                    <div
                                                        style="background-color: #0C529E; overflow: scroll; width: 250px; height: 100px;"
                                                    >
                                                        <?php foreach ($psos as $pso){ ?>
                                                        <label>
                                                            <input type="checkbox" name="pso[]"
                                                                   value="<?php echo $pso['pso_id'] ?>"/><?php echo $pso['renata_id'] . '--' . $pso['pso_name'] ?>
                                                        </label>
                                                        <label>
                                                            <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-default" value="Assign">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- End of Modal -->

                               <!-- Peoples Modal -->
                        <div class="modal fade" id="myPeoplesModal<?php echo $i ?>" role="dialog">
                            <form method="post" action="<?php echo base_url() ?>test/assign_test_to_depot">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close"
                                                    data-dismiss="modal">&times;</button>
                                            <h3 class="modal-title  pull-left">Test Id:
                                                00<?php echo $test['exam_id'] ?></h3>
                                            <input type="hidden" name="exam_id" value="<?php echo $test['exam_id'] ?>">
                                        </div>
                                        <div class="modal-body">
                                            <div class="test_id col-md-4">
                                                <p>Test Id: 00<?php echo $test['exam_id'] ?></p>
                                                <p>Test name: <?php echo $test['exam_name'] ?></p>
                                                <p>Duration: <?php echo $test['duration'] ?> min</p>
                                                <p>Points: <?php echo $test['exam_marks'] ?></p>
                                            </div>
                                            <div class="assign_to col-md-offset-2 col-md-5">
                                                <div class="form-group">
                                                    <label class="assign_to_label" for="sel1">Assign
                                                        To:</label>
                                                    <div
                                                        style="background-color: #0C529E; overflow: scroll; width: 250px; height: 100px;"
                                                    >
                                                        <?php foreach ($depots as $depot){ ?>
                                                        <label>
                                                            <input type="checkbox" name="depots[]"
                                                                   value="<?php echo $depot['depot_code'] ?>"/><?php echo $depot['depot_name'] ?>
                                                        </label>
                                                        <label>
                                                            <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-default go" type="submit">
                                                Assign
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- End of Modal -->


                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div> <!-- last_one -->


</div>
<div class="copy_right col-md-12">
    <br>
    <p class="text-center">&copy; 2016 ALL Rights Reserved by <br> Renata Ltd.</p>
</div>
</div> <!-- body_wrapper -->
</div><!-- right-col -->
</div> <!-- main container #full-width -->