<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/target.css">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="body_wrapper"> <!-- MAIN BODY PART -->
    <div class="container_wrapper reneta_shop">
        <div class="form_content">

            <h3 class="header_wrapper center-block text-center">Create User</h3>

            <div class="col-md-12" align="center">
                <?php if(isset($user_add)){?>

                    <h3><?php echo $user_add;?></h3>
                <?php }?>
            </div>
            <div align="center">
                <?php if ($this->session->userdata('add_user') == 'User Added') { ?>
                    <div class="alert alert-success"><strong><?php echo 'A new user is created'; ?></strong></div>
                    <?php $this->session->unset_userdata('add_user');
                } ?>
            </div>
            <form onsubmit="return create_user()" action="<?php echo base_url() ?>user/add_user" method="post"
                  enctype="multipart/form-data">
                <div class="form-group">
                    <input style="" name="user_name" id="offer_title" type="text" class="form-control"
                           placeholder="User Name" required="required">
                </div>
                <div class="form-group">
                    <input style="" name="renata_id" id="offer_title" type="text" class="form-control"
                           placeholder="Renata Employee Id" required="required">
                </div>
                <div class="form-group">
                    <select onchange="user_typee()" style="color: #0C529E" class="form-control text-center" id="user_type" name="user_type" >
                        <option value="-1">Select User Type</option>
                        <option value="2">Admin</option>
                        <option value="3">Marketing</option>
                        <option value="4">Sales Manager</option>
                        <option value="5">Regional Sales Manager</option>
                        <option value="6">District Sales Manager</option>
                        <option value="7">General Manager</option>
                    </select>
                </div>
                <div class="form-group">
                    <input style="display: none" type="text" name="dsm_code" class="form-control" id="dsm_code"
                           placeholder="DSM CODE" >
                </div>
                <div class="form-group">
                    <input style="display: none" type="text" name="rsm_code" class="form-control" id="rsm_code"
                           placeholder="RSM CODE" >
                </div>
                <div class="form-group">
                    <input style="display: none" type="text" name="sm_code" class="form-control" id="sm_code"
                           placeholder="SM CODE" >
                </div>
                <div class="form-group">
                    <input type="text" name="designation" class="form-control" id="designation"
                           placeholder="Designation">
                </div>
                <div class="form-group">
                    <select  style="color: #0C529E;display: none" name="depot_code" id="depot_code" class="form-control">
                        <option value="-1">Select Depot</option>
                        <?php foreach ($depots as $depot){?>
                        <option value="<?php echo $depot['depot_code']?>"><?php echo $depot['depot_name']?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <select  style="color: #0C529E;display: none" name="business_code" id="business_code" class="form-control">
                        <option value="-1">Select Business</option>
                        <?php foreach ($business as $bus){?>
                        <option value="<?php echo $bus['business_code']?>"><?php echo $bus['business_name']?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <input class="btn btn-primary btn-block" value="Create" name="btn" type="submit">
                </div>
        </div>
    </div>
    </form>
</div>
</div>

<div class="copy_right col-md-12">
    <br>
    <p class="text-center">&copy; 2016 ALL Rights Reserved by <br> Renata Ltd.</p>
</div>
</div> <!-- body_wrapper -->
</div><!-- right-col -->
</div> <!-- main container #full-width -->