<div class="body_wrapper col-md-12"> <!-- MAIN BODY PART -->
    <h3 class="header_wrapper center-block text-center">Change Password</h3>

    <div class="result_info_wrapper">
        <div class="bottom_info same_info col-md-offset-3 col-md-6">
            <br>
                <div align="center">
                    <?php if ($this->session->userdata('change_pass_status') == '0') { ?>
                        <div class="alert alert-info"><strong><?php echo 'Please Change The Password'; ?></strong></div>
                        <?php $this->session->unset_userdata('change_pass_status');
                    } ?>
                    <?php if ($this->session->userdata('change_password') == 'Password Changed') { ?>
                        <div class="alert alert-success"><strong><?php echo 'Password Changed'; ?></strong></div>
                        <?php $this->session->unset_userdata('change_password');
                    } ?>
                </div>
                <form method="post" action="<?php echo base_url()?>settings/password_change" onsubmit="return change_password()">
                    <div class="same_info_boxes col-md-12">
                        <div class="col-md-12">
                            <div class="col-md-5">
                                <label class="form-group">Current Password :</label>
                            </div>
                            <div class="form-group col-md-6">
                                <input onkeyup="check_password()" id="current_p" name="current_pp" type="password" class="current_p form-control"/>
                                <input type="hidden" id="login_id2" name="login_id2" value="<?php echo $this->session->userdata('login_id');?>">
                            </div>
                            <div class="col-md-1">
                                <span id="wrong_p" style="color: #E55131; display: none"><i class="fa fa-times-rectangle-o fa-2x"></i></span>
                                <span id="correct_p" style="color: #46A2C4;display: none"><i class="fa fa-check-square fa-2x"></i></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-5">
                                <label class="form-group">New Password :</label>
                            </div>
                            <div class="form-group col-md-6">
                                <input id="new_p" name="new_p" type="password" class="form-control"/>
                            </div>
                            <div class="col-md-1">
                                <!--                                <span style="color: #E55131"><i class="fa fa-times-rectangle-o fa-2x"></i></span>-->
                                <!--                                <span style="color: #46A2C4"><i class="fa fa-check-square fa-2x"></i></span>-->
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-5">
                                <label class="form-group">Repeat Password :</label>
                            </div>
                            <div class="form-group col-md-6">
                                <input onkeyup="pass_match()" id="repeat_p" name="repeat_p" type="password" class="form-control"/>
                            </div>
                            <div class="col-md-1">
                                                                <span id="r_wrong_p" style="color: #E55131;display: none"" ><i class="fa fa-times-rectangle-o fa-2x"></i></span>
                                                                <span id="r_correct_p" style="color: #42BF81;display: none""><i class="fa fa-check-square fa-2x"></i></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-offset-5 col-md-3">
                                <input class="form-control btn btn-primary" type="submit">
                            </div>
                            <br>
                            <br>
                            <br>
                        </div>
                    </div> <!-- same_info_boxes -->
                </form>
        </div> <!-- bottom_info same_info -->
    </div>
    <br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br>
    <div class="copy_right col-md-12">
        <br>
        <p class="text-center">&copy; 2016 ALL Rights Reserved by <br> Renata Ltd.</p>
    </div>

</div> <!-- body_wrapper -->
</div><!-- right-col -->
</div> <!-- main container #full-width -->