<?php
/**
 * Created by PhpStorm.
 * User: Sudipta
 * Date: 11/07/2017
 * Time: 12:47 PM
 */
$i=0;
?>
<link href="https://cdn.datatables.net/v/dt/dt-1.10.12/se-1.2.0/datatables.min.css" rel="stylesheet"/>
<link href="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.9/css/dataTables.checkboxes.css"/>


<!--<link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet"/>-->
<!--<link href="--><?//= base_url()?><!--assets/checkbox_table/css/select.dataTables.min.css"/>-->
<div class="main-content">

    <!-- User Info, Notifications and Menu Bar -->
    <?php echo $user_profile; ?>
    <div class="page-title">

        <div class="title-env">
            <h1 class="title">Track Incentive</h1>
            <p class="description">Manage all incentives for pso encouragements</p>
        </div>

        <div class="breadcrumb-env">

            <ol class="breadcrumb bc-1">
                <li>
                    <a href="<?php echo base_url() ?>home"><i class="fa-home"></i>Home</a>
                </li>
                <li>

                    <a href="#">Renata Shop</a>
                </li>
                <li class="active">

                    <strong>Track Incentives</strong>
                </li>
            </ol>

        </div>

    </div>
    <?php if ($this->session->userdata('approve_booking')) { ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong><?php echo $this->session->userdata('approve_booking'); ?></strong>
        </div>
        <?php $this->session->unset_userdata('approve_booking');
    } ?>


    <div class="row">

        <div class="col-md-12">

            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#gift_request" data-toggle="tab">Gift Request</a>
                </li>
                <li>
                    <a href="#gift_history" data-toggle="tab">Gift History</a>
                </li>

            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="gift_request">
<!--                    <button id="btnSelectedRows">-->
<!--                        Get Selected Rows-->
<!--                    </button>-->

                    <?php if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2'||$this->session->userdata('user_type')=='8'){?>
                        <a   class="btn btn-primary btn-icon btn-icon-standalone btn-icon-standalone-right" href="<?php echo base_url()?>tar_shop/export" ><i class="fa fa-download"></i><span>Download Gift Request</span></a>
                        <div class="table-responsive">
                            <form name="frm-example" id="frm-example" action="<?= base_url()?>tar_shop/approve_booking_chunk" method="post"  >
                                <table id="example" class="display" cellspacing="0" width="100%">
                                    <thead style="background-color: #2c2e2f;color: white">
                                    <tr>
                                        <th ></th>
                                        <th style="color: white; vertical-align: text-top;text-align: left">Image</th>
                                        <th style="color: white; vertical-align: text-top;text-align: left">Incentive Name</th>
                                        <th style="color: white; vertical-align: text-top;text-align: left">PSO Code</th>
                                        <th style="color: white; vertical-align: text-top;text-align: left">Employee ID</th>
                                        <th style="color: white; vertical-align: text-top;text-align: left">PSO Name</th>
                                        <th style="color: white; vertical-align: text-top;text-align: left">Region</th>
                                        <th style="color: white; vertical-align: text-top;text-align: left">Redemption Date</th>
                                        <th style="color: white; vertical-align: text-top;text-align: left">Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <td></td>
                                        <td>Image</td>
                                        <td>Incentive Name</td>
                                        <td>PSO Code</td>
                                        <td>Employee ID</td>
                                        <td>PSO Name</td>
                                        <td>Region</td>
                                        <td>Redemption Date</td>
                                        <td>Action</td>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php foreach ($booked as $book){ ?>
                                        <tr>
                                            <td ><?php echo $book['transection_id']?></td>
                                            <td ><img src="<?= $book['incentives_image'] ?>" class=" img-circle" alt=""
                                                      height="50px" width="50px"></td>
                                            <td ><?php echo $book['incentives_name']?></td>
                                            <td ><?php echo $book['renata_id']?></td>
                                            <td ><?php echo $book['pso_id']?></td>
                                            <td ><?php echo $book['pso_name']?></td>
                                            <td ><?php echo $book['region']?></td>
                                            <td ><?php echo $book['redeem_date']?></td>
                                            <td ><a href="<?php echo base_url()?>tar_shop/approve_booking?tar_id=<?php echo $book['transection_id']?>" onclick="return approve_transaction();"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>

                                <p class="form-group">
                                    <button type="submit" class="btn btn-primary" onclick="return approve_incentive_chunk()">Approve Selected</button>
                                </p>

                            </form>

                        </div>
                    <?php } else if($this->session->userdata('user_type')=='4'||$this->session->userdata('user_type')=='5'||$this->session->userdata('user_type')=='6') {?>
                        <div class="table-responsive">
                            <script type="text/javascript">
                                jQuery(document).ready(function ($) {
                                    $("#example-3").dataTable({
                                        aLengthMenu: [
                                            [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
                                        ]
                                    });
                                });
                            </script>
                            <table id="example-3" class="table table-striped  table-responsive" cellspacing="0"
                                   width="100%">
                                <thead style="background-color: #2c2e2f;color: white">
                                <tr>
                                    <th style="color: white; vertical-align: text-top;text-align: left">Image</th>
                                    <th style="color: white; vertical-align: text-top;text-align: left">Incentive Name</th>
                                    <th style="color: white; vertical-align: text-top;text-align: left">PSO Code</th>
                                    <th style="color: white; vertical-align: text-top;text-align: left">Employee ID</th>
                                    <th style="color: white; vertical-align: text-top;text-align: left">PSO Name</th>
                                    <th style="color: white; vertical-align: text-top;text-align: left">Region</th>
                                    <th style="color: white; vertical-align: text-top;text-align: left">Redemption Date</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th style="color: white; vertical-align: text-top;text-align: left">Image</th>
                                    <th style="color: white; vertical-align: text-top;text-align: left">Incentive Name</th>
                                    <th style="color: white; vertical-align: text-top;text-align: left">PSO Code</th>
                                    <th style="color: white; vertical-align: text-top;text-align: left">Employee ID</th>
                                    <th style="color: white; vertical-align: text-top;text-align: left">PSO Name</th>
                                    <th style="color: white; vertical-align: text-top;text-align: left">Region</th>
                                    <th style="color: white; vertical-align: text-top;text-align: left">Redemption Date</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php foreach ($booked as $book){ ?>
                                    <tr>
                                        <td ><img src="<?= $book['incentives_image'] ?>" class=" img-circle" alt=""
                                                  height="50px" width="50px"></td>
                                        <td ><?php echo $book['incentives_name']?></td>
                                        <td ><?php echo $book['renata_id']?></td>
                                        <td ><?php echo $book['pso_id']?></td>
                                        <td ><?php echo $book['pso_name']?></td>
                                        <td ><?php echo $book['region']?></td>
                                        <td ><?php echo $book['redeem_date']?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    <?php }?>

                </div>

                <div class="tab-pane" id="gift_history">

                    <a   class="btn btn-primary btn-icon btn-icon-standalone btn-icon-standalone-right" href="<?php echo base_url()?>tar_shop/export_history" ><i class="fa fa-download"></i><span>Download Gift History</span></a>
                    <div class="table-responsive">
                        <script type="text/javascript">
                            jQuery(document).ready(function ($) {
                                $("#example-2").dataTable({
                                    aLengthMenu: [
                                        [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
                                    ]
                                });
                            });
                        </script>
                        <table id="example-2" class="table table-striped  table-responsive" cellspacing="0"
                               width="100%">
                            <thead style="background-color: #2c2e2f;color: white">
                            <tr>
                                <th style="color: white; vertical-align: text-top;text-align: left">Incentive Image</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Incentive Name</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">PSO Code</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Employee ID</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">PSO Name</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Region</th>
                                <th style="color: white; vertical-align: text-top;text-align: left">Approval Date</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Incentive Image</th>
                                <th>Incentive Name</th>
                                <th>PSO Code</th>
                                <th>Employee ID</th>
                                <th>PSO Name</th>
                                <th>Region</th>
                                <th>Approval Date</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php foreach ($history as $his){?>
                                <tr>
                                    <td ><img src="<?= $his['incentives_image'] ?>" class=" img-circle" alt=""
                                              height="50px" width="50px"></td>
                                    <td ><?php echo $his['incentives_name']?></td>
                                    <td ><?php echo $his['renata_id']?></td>
                                    <td ><?php echo $his['pso_id']?></td>
                                    <td ><?php echo $his['pso_name']?></td>
                                    <td ><?php echo $his['region']?></td>
                                    <td ><?php echo $his['approval_date']?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>

        </div>

    </div>

<!--    <script src="--><?//= base_url()?><!--assets/checkbox_table/js/dataTables.select.min.js"></script>-->

    <script src="https://cdn.datatables.net/v/dt/dt-1.10.12/se-1.2.0/datatables.min.js"></script>
    <script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.9/js/dataTables.checkboxes.min.js"></script>


    <script>

        function approve_incentive_chunk() {
            var check = confirm('Are You Sure To Approve Selected Transaction');
            if (check) {
                return true;
            }
            else {
                return false;
            }
        }



        $(document).ready(function (){
            var table = $('#example').DataTable({
                'columnDefs': [
                    {
                        'targets': 0,
                        'checkboxes': {
                            'selectRow': true
                        }
                    }
                ],
                'select': {
                    'style': 'multi'
                },
                'order': [[1, 'asc']]
            });


            // Handle form submission event
            $('#frm-example').on('submit', function(e){
                var form = this;

                var rows_selected = table.column(0).checkboxes.selected();

                // Iterate over all selected checkboxes
                $.each(rows_selected, function(index, rowId){
                    // Create a hidden element
                    $(form).append(
                        $('<input>')
                            .attr('type', 'hidden')
                            .attr('name', 'id[]')
                            .val(rowId)
                    );
                });
            });
        });
    </script>



    <!-- Main Footer -->
    <!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
    <!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
    <!-- Or class "fixed" to  always fix the footer to the end of page -->
    <?php if (isset($footer)) {

        echo $footer;
    } ?>
</div>

