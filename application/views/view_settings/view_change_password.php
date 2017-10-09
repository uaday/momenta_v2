<?php
/**
 * Created by PhpStorm.
 * User: Sudipta
 * Date: 10/1/2017
 * Time: 2:15 AM
 */
?>

<div class="main-content">

    <!-- User Info, Notifications and Menu Bar -->
    <?php echo $user_profile;?>
    <div class="page-title">

        <div class="title-env">
            <h1 class="title">Password Change</h1>
            <p class="description">Update your default password for security purpose</p>
        </div>

        <div class="breadcrumb-env">

            <ol class="breadcrumb bc-1">
                <li>
                    <a href="<?php echo base_url()?>home"><i class="fa-home"></i>Home</a>
                </li>
                <li class="active">

                    <strong>Password Change</strong>
                </li>
            </ol>

        </div>

    </div>

    <div>

    </div>

    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Change Password</h3>
                    <div class="panel-options">
                        <a href="#" data-toggle="panel">
                            <span class="collapse-icon">&ndash;</span>
                            <span class="expand-icon">+</span>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php if($this->session->userdata('change_password')){?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>

                                <strong><?php echo $this->session->userdata('change_password');?></strong>
                            </div>
                            <?php $this->session->unset_userdata('change_password'); } else if($this->session->userdata('error')){?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>

                                <strong><?php echo $this->session->userdata('error');?></strong>
                            </div>
                            <?php $this->session->unset_userdata('error'); }?>
                    </div>
                </div>

                <div class="panel-body">

                    <form method="post" action="<?php echo base_url()?>settings/password_change" class="validate" onsubmit="return change_password()">

                        <div class="form-group">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Current Password</label>

                                        <div class="form-group  " id="clas">
                                            <input type="hidden" id="login_id2" name="login_id2" value="<?php echo $this->session->userdata('login_id');?>">
                                            <input onkeyup="check_password()" type="password" class="form-control current_p" name="current_pp" id="current_p" data-validate="required" placeholder="Enter current password" />

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Choose Password</label>

                                        <div class="form-group">
                                            <input type="password" class="form-control" name="new_p" id="new_p" data-validate="required" placeholder="Enter new password" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Repeat Password</label>

                                        <div class="form-group">
                                            <input type="password" class="form-control" name="repeat_p" id="repeat_p" data-validate="required,equalTo[#new_p]" data-message-equal-to="Passwords doesn't match." placeholder="Confirm password" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Save</button>
                            <button type="reset" class="btn btn-white">Reset</button>
                        </div>


                    </form>

                </div>
            </div>

        </div>
    </div>

    <!-- Main Footer -->
    <!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
    <!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
    <!-- Or class "fixed" to  always fix the footer to the end of page -->
    <?php if(isset($footer)){

        echo $footer;
    }?>
</div>