<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/target.css">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="body_wrapper"> <!-- MAIN BODY PART -->
    <div class="container_wrapper reneta_shop">
        <div class="form_content">

            <h3 class="header_wrapper center-block text-center">Edit User</h3>

            <div class="col-md-12" align="center">
                <?php if(isset($user_add)){?>
                    <h3><?php echo $user_add;?></h3>
                <?php }?>
            </div>
            <div align="center">
                <?php if ($this->session->userdata('add_user') == 'User Added') { ?>
                    <div class="alert alert-success"><strong><?php echo 'User Added'; ?></strong></div>
                    <?php $this->session->unset_userdata('add_user');
                } ?>
            </div>
            <form onsubmit="return create_user()" action="<?php echo base_url() ?>user/edit_admin_user" method="post"
                  enctype="multipart/form-data">
                <div class="form-group">
                    <input style="" name="user_name" id="offer_title" type="text" class="form-control"
                           placeholder="User Name" required="required" value="<?php echo $admins['0']['name']?>">
                </div>
                <div class="form-group">
                    <input style="" name="renata_id" id="offer_title" type="text" class="form-control"
                           placeholder="Renata Employee Id" required="required" value="<?php echo $admins['0']['renata_id']?>" disabled="disabled">
                    <input style="background: white" name="renata_id" id="offer_title" type="hidden" class="form-control"
                           placeholder="Renata Employee Id" required="required" value="<?php echo $admins['0']['renata_id']?>">
                </div>
                <div class="form-group">
                    <?php if($admins['0']['user_type']!=7){?>
                    <select onchange="user_typee()" style="color: #0C529E" class="form-control text-center" id="user_type" name="user_type" >
                        <?php if($admins['0']['user_type']==2){?>
                            <option selected="selected" value="2">Admin</option>
                            <option value="3">Marketing</option>
                        <?php }else{?>
                            <option selected="selected" value="3">Marketing</option>
                            <option value="2">Admin</option>
                        <?php }?>

                    </select>
                    <?php } else {?>
                    <input type="hidden" name="user_type" value="7">
                    <?php }?>
                </div>
                <div class="form-group">
                    <input type="text" name="designation" class="form-control" id="designation"
                           placeholder="Designation" value="<?php echo $admins['0']['designation']?>">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary btn-block" value="Submit" name="btn" type="submit">
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