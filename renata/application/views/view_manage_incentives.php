<?php $i = 0; ?>
<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/modal3.css">
<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/target.css">
<div class="body_wrapper"> <!-- MAIN BODY PART -->
    <div class="last_one_wrapper">
        <div class="col-md-6 form_type last_one_test">

            <h3 class="header_wrapper center-block text-center">Incentives Page</h3>
            <div align="center">
                <?php if ($this->session->userdata('delete_incentives') == 'Incentive Deleted') { ?>
                    <div class="alert alert-success"><strong><?php echo 'Incentive Deleted'; ?></strong></div>
                    <?php $this->session->unset_userdata('delete_incentives');
                } ?>
            </div>
            <div align="center">
                <?php if ($this->session->userdata('update_incentives') == 'Incentive Updated') { ?>
                    <div class="alert alert-success"><strong><?php echo 'Incentive Updated'; ?></strong></div>
                    <?php $this->session->unset_userdata('update_incentives');
                } ?>
            </div>

            <div class="form-group">
                <!-- ////////////////////////////////////////////popover section//////////////////////////////////////////// -->
                <table id="example3" class="table result">
                    <thead class="big_spacer">
                    <tr>
                        <th class="text-center" style="border-radius: 10px 0 0 10px;">Incentive ID</th>
                        <th class="text-center">Incentives Name</th>
                        <th class="text-center">Incentives Points</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Expire Date</th>
                        <th class="text-center">Status</th>
                        <th class="text-center" style="border-radius: 0 10px 10px 0; border-right: 0px;">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <!-- </table> -->
                    <!-- <table class="table table_data"> -->
                    <tbody>
                    <?php foreach ($incentives as $incentive) {
                        $i++; ?>
                        <tr class="color_wrapper big_spacer">
                            <td>00<?php echo $incentive['incentives_id'] ?></td>
                            <td><?php echo $incentive['incentives_name'] ?></td>
                            <td><?php echo $incentive['incentives_point'] ?></td>
                            <td><?php echo $incentive['quantity'] ?></td>
                            <td><?php echo $incentive['exp_date'] ?></td>
                            <?php if($incentive['status']==1){?>
                                <td>Active</td>
                            <?php } else {?>
                                <td>De-active</td>
                            <?php }?>
                            <td>
                                <?php if($incentive['status']==1){?>
                                    <a href="<?php echo base_url() ?>tar_shop/change_status?incentives_id=<?php echo  $incentive['incentives_id']?>&status=0"><span class="fa fa fa-thumbs-down"></span></a>
                                <?php } else {?>
                                    <a href="<?php echo base_url() ?>tar_shop/change_status?incentives_id=<?php echo  $incentive['incentives_id']?>&status=1"><span class="fa fa fa-thumbs-up"></span></a>
                                <?php }?>
                                <span class="table_insided_line"> | </span>
                                <a href="<?php echo base_url() ?>tar_shop/edit_incentive?incentives_id=<?php echo  $incentive['incentives_id'] ?>"><img
                                        class="table_insider_img"
                                        src="<?php echo base_url() ?>asset/images/edit.png" alt="logo"></a>
                                <span class="table_insided_line"> | </span>
                                <a onclick="return delete_incentive()"
                                   href="<?php echo base_url() ?>tar_shop/delete_incentives?incentives_id=<?php echo  $incentive['incentives_id'] ?>"
                                    class="btn_action"><img
                                        style="background-color: transparent;border: none;"
                                        class="table_insider_img"
                                        src="<?php echo base_url() ?>asset/images/Trash-Blue.png"
                                        alt="reneta people icon"></a>
                            </td>
                        </tr>
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