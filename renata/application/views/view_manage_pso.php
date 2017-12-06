<div class="body_wrapper"> <!-- MAIN BODY PART -->
    <div class="col-md-12">
        <div class="request">
            <h3 class="header_wrapper center-block text-center">Manage PSO</h3>
            <div class="col-md-12" align="center">
                <?php if($this->session->userdata('update_password')=='Password Update Successful'){?>
                    <div class="alert alert-success"><strong><?php echo 'Password has been successfully updated'; ?></strong></div>
                    <?php $this->session->unset_userdata('update_password'); }?>

                <?php if($this->session->userdata('confirm_update_pso')=='PSO Account information has been successfully updated'){?>
                    <div class="alert alert-success"><strong><?php echo 'PSO Account information has been successfully updated'; ?></strong></div>
                    <?php $this->session->unset_userdata('confirm_update_pso'); }?>

                <?php if($this->session->userdata('delete_account')=='PSO Account has been successfully deleted'){?>
                    <div class="alert alert-success"><strong><?php echo 'PSO Account has been successfully deleted'; ?></strong></div>
                    <?php $this->session->unset_userdata('delete_account'); }?>
            </div>

            <table id="example" class="table manage-section">
                <thead class="big_spacer">
                <tr>
                    <th >PSO's ID</th>
                    <th >PSO Name</th>
                    <th >Area</th>
                    <th >Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($psos as $pso){?>
                    <tr class="color_wrapper small_spacer">
                        <td><?php echo $pso['renata_id']?></td>
                        <td><?php echo $pso['pso_name']?></td>
                        <td><?php echo $pso['depot_name']?></td>
                        <td>
                            <a href="<?php echo base_url()?>pso/update_password?pso_id=<?php echo $pso['pso_id']?>&&pso_number=<?php echo $pso['pso_phone']?>&&pso_renata_id=<?php echo $pso['renata_id']?>" onclick="return update_password();"><i class="fa fa-unlock-alt fa-lg" aria-hidden="true"></i></a><span class="table_insider"> | </span>
                            <a href="<?php echo base_url()?>pso/view_pso?pso_id=<?php echo $pso['pso_id']?>"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a><span class="table_insider"> | </span>
                            <a href="<?php echo base_url()?>pso/delete_account?pso_id=<?php echo $pso['pso_id']?>" onclick="return delete_account();"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <?php }?>

                </tbody>
            </table>
        </div> <!-- request -->
    </div> <!-- col-md-12 -->

    <div class="copy_right col-md-12">
        <p class="text-center">&copy; 2016 ALL Rights Reserved by <br> Renata Ltd.</p>
    </div>

</div> <!-- body_wrapper -->

</div><!-- right-col -->
</div> <!-- main container #full-width -->