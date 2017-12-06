<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/target.css">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="body_wrapper"> <!-- MAIN BODY PART -->
    <div class="container_wrapper reneta_shop">
        <div class="form_content">

            <h3 class="header_wrapper center-block text-center">Regional Sales User</h3>

            <div class="col-md-12" align="center">
                <?php if (isset($user_add)) { ?>
                    <h3><?php echo $user_add; ?></h3>
                <?php } ?>
            </div>
            <div align="center">
                <?php if ($this->session->userdata('add_user') == 'User Added') { ?>
                    <h3><?php echo 'User Added'; ?></h3>
                    <?php $this->session->unset_userdata('add_user');
                } ?>
            </div>
            <form onsubmit="return create_user()" action="<?php echo base_url() ?>user/edit_rsm_user" method="post"
                  enctype="multipart/form-data">
                <div class="form-group">
                    <input style="" name="user_name" id="offer_title" type="text" class="form-control"
                           placeholder="User Name" required="required" value="<?php echo $rsm['0']['name'] ?>">
                </div>
                <div class="form-group">
                    <input style="" name="user_type" id="user_type" type="hidden" class="form-control"
                           placeholder="User Type"  value="<?php echo $rsm['0']['user_type'] ?>">
                </div>
                <div class="form-group">
                    <input style="" name="renata_id" id="offer_title" type="text" class="form-control"
                           placeholder="Renata Employee Id" required="required" disabled="disabled"
                           value="<?php echo $rsm['0']['renata_id'] ?>">
                    <input style="" name="renata_id" id="offer_title" type="hidden" class="form-control"
                           placeholder="Renata Employee Id" required="required"
                           value="<?php echo $rsm['0']['renata_id'] ?>">
                </div>
                <div class="form-group">
                    <input  type="text" disabled="disabled" class="form-control"
                            placeholder="RSM CODE" value="<?php echo $rsm['0']['rsm_code'] ?>">
                    <input  type="hidden"  name="rsm_code" class="form-control" id="rsm_code"
                            placeholder="RSM CODE" value="<?php echo $rsm['0']['rsm_code'] ?>">
                </div>
                <div class="form-group">
                    <input  type="text"  class="form-control" name="sm_code" id="sm_code"
                            placeholder="SM CODE" value="<?php echo $rsm['0']['tbl_user_sm_sm_code'] ?>">
                </div>
                <div class="form-group">
                    <input type="text" name="designation" class="form-control" id="designation"
                           placeholder="Designation" value="<?php echo $rsm['0']['designation'] ?>">
                </div>
                <div class="form-group">
                    <select style="color: #0C529E" name="depot_code" id="depot_code" class="form-control">
                        <?php foreach ($depots as $depot) {
                            if ($rsm['0']['tbl_depot_depot_code'] == $depot['depot_code']) { ?>
                                <option selected="selected"
                                        value="<?php echo $depot['depot_code'] ?>"><?php echo $depot['depot_name'] ?></option>
                            <?php } else { ?>
                                <option
                                    value="<?php echo $depot['depot_code'] ?>"><?php echo $depot['depot_name'] ?></option>
                            <?php }
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <select style="color: #0C529E;" name="business_code" id="business_code"
                            class="form-control">
                        <?php foreach ($business as $bus) { if ($rsm['0']['tbl_business_business_code'] == $bus['business_code']) {?>
                            <option selected="selected"
                                    value="<?php echo $bus['business_code'] ?>"><?php echo $bus['business_name'] ?></option>
                        <?php } else {?>
                            <option
                                value="<?php echo $bus['business_code'] ?>"><?php echo $bus['business_name'] ?></option>
                        <?php }}?>
                    </select>
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