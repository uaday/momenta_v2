<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/modal1.css">
<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/modal2.css">
<input type="hidden" id="pass" value="<?php echo $tpass['0']['tpass']; ?>">
<input type="hidden" id="fail" value="<?php echo $tfail['0']['tfail']; ?>">
<input type="hidden" id="attend" value="<?php echo $tattend['0']['tattend']; ?>">
<input type="hidden" id="nattend" value="<?php echo $tnotattend['0']['tnattend']; ?>">
<script type="text/javascript">
    var a = document.getElementById('pass').value;
    var b = document.getElementById('fail').value;
    var c = document.getElementById('attend').value;
    var d = document.getElementById('nattend').value;

</script>
<div class="body_wrapper"> <!-- -MAIN BODY PART- -->

    <div class="col-md-12">
        <div class="top_with_icon">
            <h3 class="header_wrapper center-block text-center">Result</h3>
            <!--            <button type="button" class="btn btn-info btn-lg modal1_btn" data-toggle="modal" data-target="#myModal1"><img src="-->
            <?php //echo base_url()?><!--asset/images//view-more.png" alt="filter-icon"></button>-->
            <div align="center">
                <?php if ($this->session->userdata('delete_pso_exams') == 'Pso Test Delete Successful') { ?>
                    <div class="alert alert-success"><strong><?php echo  'Pso Test Delete Successful'; ?></strong></div>
                    <?php $this->session->unset_userdata('delete_pso_exams');
                } ?>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="myModal1" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close cross_btn no_back_btn"
                                    data-dismiss="modal">&times;</button>
                            <h3 class="modal-title underline pull-left">Filtering</h3>


                        </div>
                        <div class="modal-body">

                            <form action="">

                                <div class="input1 center-block">
                                    <div class="checkbox checkbox_filter">
                                        <label><input type="checkbox" value="">
                                            <div class="radio-inline" style="padding-left: 45px">
                                                <label><input type="radio" name="optradio">Pass</label>
                                            </div>
                                            <div class="radio-inline" style="padding-left: 45px">
                                                <label><input type="radio" name="optradio">Fail</label>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="input1 center-block" style=" padding-left: 17px;">
                                    <input type="checkbox" value="">
                                    <label>
                                        <select class="form-control" id="area">
                                            <option>Area</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </label>
                                </div>


                                <div class="input1 center-block">

                                    <!-- <div class="checkbox checkbox_filter"> -->
                                    <!-- <label> -->
                                    <input class="checkbox checkbox_filter" type="checkbox" style="top: 19px;">
                                    <input type="text" placeholder="PSO ID" style="padding: 4px 0 0 50px; width: 100%">
                                    <!-- </label> -->
                                    <!-- </div> -->

                                </div>

                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default go">GO</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="chart_wrapper clearfix">
            <div class="col-md-12">
                <select style="background: #ddd" class="form-control" name="sexam" id="sexam"
                        onchange="find_exam_stat(this.value)">
                    <?php foreach ($sexams as $sexam) { ?>
                        <option style="font-style: normal"
                                value="<?php echo $sexam['exam_id'] ?>"><?php echo $sexam['exam_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <br>
            <br>
            <div>
                <div class="pie_chart_wapper col-md-6 center-block">
                    <div class=" pie_chart clearfix">
                        <canvas style=" height: 400px" id="myChart"></canvas>
                    </div>
                </div>
                <!-- <div style="width: 20%"></div> -->
                <div class="pie_chart_wapper2 col-md-6 center-block">
                    <div class="pie_chart clearfix">
                        <canvas style="height: 400px" id="myChart2"></canvas>
                    </div>
                </div>
            </div>

        </div>

        <div class="request">
            <!-- <h3 class="header_wrapper center-block text-center">Result</h3> -->
            <!-- <div class="search clearfix">
                 <a href="#"><img src="<?php echo base_url() ?>asset/images//up-down.png" alt="reneta filter icon"></a>
                 <a href="#"><img src="<?php echo base_url() ?>asset/images//search-rounded.png" alt="reneta search icon"></a>
            </div> -->
            <table id="example" class="table result">

                <thead class="big_spacer">
                <tr>
                    <th>PSO Code</th>
                    <th>Employee Id</th>
                    <th>PSO's Name</th>
                    <th>Total Test</th>
                    <th>Points</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($pexams as $pexam) { ?>
                    <tr class="color_wrapper small_spacer">
                        <!-- ////////////////////////////////////////modal section//////////////////////////////////////// -->
                        <td><?php echo $pexam['renata_id'] ?></td>
                        <td><?php echo $pexam['pso_id'] ?></td>
                        <td><?php echo $pexam['pso_name'] ?></td>
                        <td><?php echo $pexam['total_test'] ?></td>
                        <td><?php echo $pexam['total_marks'] ?></td>
                        <td>

                            <button
                                onclick="location.href = '<?php echo base_url() ?>test/view_pso_result?pso_id=<?php echo $pexam['pso_id'] ?>';"
                                type="button" class="btn btn-info btn-lg modal_btn"><i
                                    class="fa fa-chevron-circle-right fa-lg" aria-hidden="true"></i></button>
                            <span class="table_insider"> | </span>
                            <a onclick="return delete_pso_exams()"
                               href="<?php echo base_url() ?>test/delete_pso_tests?pso_id=<?php echo $pexam['pso_id'] ?>"><i
                                    class="fa fa-trash fa-lg" aria-hidden="true"></i></a>
                        </td>

                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
    <div class="copy_right col-md-12">
        <p class="text-center">&copy; 2016 ALL Rights Reserved by <br> Renata Ltd.</p>
    </div>

    <!-- ////////////// -->
</div> <!-- body_wrapper -->
</div><!-- right-col -->
</div>
</div> <!-- main container #full-width -->
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
<script src="<?php echo base_url() ?>asset/js/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.js"
        integrity="sha256-1qeNeAAFNi/g6PFChfXQfa6CQ8eXoHXreohinZsoJOQ=" crossorigin="anonymous"></script>
<script src="<?php echo base_url() ?>asset/js/new.js"></script>
<script src="<?php echo base_url() ?>asset/js/chart.min.js"></script>