<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/modal1.css">
<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/modal2.css">
<div class="body_wrapper"> <!-- -MAIN BODY PART- -->

    <div class="col-md-12">
        <div class="top_with_icon">
            <h3 class="header_wrapper center-block text-center">PSO Result</h3>
            <div class="col-md-12 ">

                    <div class="col-md-6 ">
                        <h4 class="modal-title ">PSO CODE: # <?php echo $pso_exam_detail['0']['renata_id'] ?></h4>
                        <h4 class="modal-title">Employee ID: # <?php echo $pso_exam_detail['0']['pso_id'] ?></h4>
                        <h4 class="modal-title">PSO NAME: <?php echo $pso_exam_detail['0']['pso_name'] ?></h4>
                    </div>
                    <div class="col-md-offset-4 col-md-2">

                        <h3 class="modal-title ">Total Test: <?php echo $pso_exam_detail['0']['total_test'] ?></h3>
                        <h3 class="modal-title ">Points: <?php echo $pso_exam_detail['0']['total_marks'] ?></h3>
                    </div>
                    <br>
                    <br>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="request">

            <!-- <h3 class="header_wrapper center-block text-center">Result</h3> -->
            <!-- <div class="search clearfix">
                 <a href="#"><img src="<?php echo base_url() ?>asset/images//up-down.png" alt="reneta filter icon"></a>
                 <a href="#"><img src="<?php echo base_url() ?>asset/images//search-rounded.png" alt="reneta search icon"></a>
            </div> -->
            <table id="example" class="table result">

                <thead class="big_spacer">
                <tr>
                    <th>Exam ID</th>
                    <th>Exam Name</th>
                    <th>Exam Duration</th>
                    <th>Exam Point</th>
                    <th>Pso Point</th>
                    <th>Exam Date</th>
                    <th>Exam Time</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($pso_exams as $pso_exam) { ?>
                    <tr class="color_wrapper small_spacer">
                        <!-- ////////////////////////////////////////modal section//////////////////////////////////////// -->
                        <td>00<?php echo $pso_exam['exam_id'] ?></td>
                        <td><?php echo $pso_exam['exam_name'] ?></td>
                        <td><?php echo $pso_exam['time'] ?></td>
                        <td><?php echo $pso_exam['exam_marks'] ?></td>
                        <td><?php echo $pso_exam['pso_marks'] ?></td>
                        <td><?php echo $pso_exam['start_date'] ?></td>
                        <td><?php echo $pso_exam['start_time'] ?></td>
                        <td>
                            <?php if($pso_exam['status']==1){?>
                            <button onclick="location.href='<?php echo base_url()?>test/show_pso_result?pso_id=<?php echo $pso_exam['pso_id']?>&assign_id=<?php echo $pso_exam['assign_id']?>'" type="button" class="btn btn-info"><a href="<?php echo base_url()?>test/show_pso_result?pso_id=<?php echo $pso_exam['pso_id']?>&assign_id=<?php echo $pso_exam['assign_id']?>">View Result</a>
                            </button>
                            <?php } else {?>
                                <button type="disable" disabled class="btn btn-default">Not Started
                                </button>
                            <?php }?>
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
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>asset/js/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.js"
        integrity="sha256-1qeNeAAFNi/g6PFChfXQfa6CQ8eXoHXreohinZsoJOQ=" crossorigin="anonymous"></script>
<script src="<?php echo base_url() ?>asset/js/new.js"></script>
<script src="<?php echo base_url() ?>asset/js/chart.min.js"></script>