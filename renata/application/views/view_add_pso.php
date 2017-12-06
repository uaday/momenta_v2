<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/add.css">
<div class="body_wrapper"> <!-- MAIN BODY PART -->
    <div class="pg10_wrapper container-fluid">
        <div class="add_pso">
            <h2>ADD PSO</h2>
        </div>

        <div class="col-md-12" align="center">
            <?php if (isset($pso_add)) { ?>
                <h3><?php echo $pso_add; ?></h3>
            <?php } ?>
        </div>
        <div class="col-md-12" align="center">
            <?php if ($this->session->userdata('confirm_add_pso') == 'Pso Insert Successful') { ?>
                <div class="alert alert-info"><strong><?php echo 'Pso Insert Successful'; ?></strong></div>
                <?php $this->session->unset_userdata('confirm_add_pso');
            } ?>
        </div>
        <form action="<?php echo base_url() ?>pso/insert_pso" method="post" onsubmit="return check_user()"
              enctype="multipart/form-data">
            <div class=" scroll add_pso_form_wrapper col-xs-11 ">
                <!-- <div class="row"> -->

                <div class="col-md-6 ">
                    <div class="col-xs-2 add_pso_p">
                        <img class="add_pso_p_img" src="<?php echo base_url() ?>asset/images/Profile.png"
                             alt="profile_pic">
                    </div>
                    <div class="col-xs-10 add_pso_1">
                        <div class="form-group name">
                            <input type="text" class="form-control" id="name1" name="pso_name" placeholder="Name"
                                   required="required">
                        </div>
                    </div>

                    <div class="col-xs-2 add_pso_p">
                        <img class="add_pso_p_img" src="<?php echo base_url() ?>asset/images/Id.png" alt="profile_pic">
                    </div>
                    <div class="col-xs-10  add_pso_1">
                        <div class="form-group name">
                            <input type="text" class="form-control" name="pso_code" id="name1" placeholder="PSO CODE"
                                   required="required">
                        </div>
                    </div>

                    <div class="col-xs-2 add_pso_p">
                        <img class="add_pso_p_img" src="<?php echo base_url() ?>asset/images/Id.png" alt="profile_pic">
                    </div>
                    <div class="col-xs-10  add_pso_1">
                        <div class="form-group name">
                            <input type="text" class="form-control" name="pso_renata_id" id="name1"
                                   placeholder="Renata Employee ID" required="required">
                        </div>
                    </div>
                    <div class="col-xs-2 add_pso_p">
                        <img class="add_pso_p_img" src="<?php echo base_url() ?>asset/images/Id.png" alt="profile_pic">
                    </div>
                    <div class="col-xs-10  add_pso_1">
                        <div class="form-group name">
                            <input type="text" class="form-control" name="dsm_code" id="name1" placeholder="DSM CODE"
                                   required="required">
                        </div>
                    </div>
                    <div class="col-xs-2 add_pso_p">
                        <img class="add_pso_p_img" src="<?php echo base_url() ?>asset/images/Sex.png" alt="profile_pic">
                    </div>
                    <div class="col-xs-10  add_pso_1">
                        <div class="form-group name">
                            <select class="form-control" name="pso_gender" id="name2">
                                <option selected="selected" value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-2 add_pso_p">
                        <img class="add_pso_p_img" src="<?php echo base_url() ?>asset/images/Age.png" alt="profile_pic">
                    </div>
                    <div class="col-xs-10  add_pso_1">
                        <div class="form-group name">
                            <input style="border-radius: 8px" type="date" class="form-control" name="pso_dob" id="name1" placeholder="Age">
                        </div>
                    </div>
                    <div class="col-xs-2 add_pso_p">
                        <img class="add_pso_p_img" src="<?php echo base_url() ?>asset/images/Mail.png"
                             alt="profile_pic">
                    </div>
                    <div class="col-xs-10  add_pso_1">
                        <div class="form-group name">
                            <input type="email" class="form-control" name="pso_email" id="name1" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-xs-2 add_pso_p">
                        <img class="add_pso_p_img" src="<?php echo base_url() ?>asset/images/Mobile.png"
                             alt="profile_pic">
                    </div>
                    <div class="col-xs-10  add_pso_1">
                        <div class="form-group name">
                            <input
                                style="border-radius: 10px;color: #2974BB !important;font-weight: 600 !important;border: none !important;"
                                type="number" class="form-control phone_number" name="pso_phone" id="name1"
                                placeholder="Phone Number" required="required">
                        </div>
                    </div>

                    <div class="col-xs-2 add_pso_p">
                        <img class="add_pso_p_img" src="<?php echo base_url() ?>asset/images/Briefcase.png"
                             alt="profile_pic">
                    </div>
                    <div class="col-xs-10  add_pso_1">
                        <div class="form-group name">
                            <input type="text" class="form-control" name="pso_designation" id="name1"
                                   placeholder="Designation">
                        </div>
                    </div>
                    <div class="col-xs-2 add_pso_p">
                        <img class="add_pso_p_img" src="<?php echo base_url() ?>asset/images/Briefcase.png"
                             alt="profile_pic">
                    </div>
                    <div class="col-xs-10  add_pso_1">
                        <div class="form-group name">
                            <select class="form-control" name="business_code" id="business_code">
                                <option value="-1">SELECT BUSINESS</option>
                                <?php foreach ($business as $bus) { ?>
                                    <option
                                        value="<?php echo $bus['business_code'] ?>"><?php echo $bus['business_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-2 add_pso_p">
                        <img class="add_pso_p_img" src="<?php echo base_url() ?>asset/images/Location.png"
                             alt="profile_pic">
                    </div>

                    <div class="col-xs-10" id="name1" style=" padding-right: 0; padding-left: 0;">
                        <div class="col-xs-12 add_pso_1" style="margin-bottom: 0;">
                            <div class="form-group name">
                                <div class="form-group">
                                    <select class="form-control" name="depot_code" id="depot_code">
                                        <option style="color: #0C529E" value="-1">Select Depot</option>
                                        <?php foreach ($depots as $depot) { ?>
                                            <option
                                                value="<?php echo $depot['depot_code'] ?>"><?php echo $depot['depot_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 profile_pic">
                    <div class="upload_pic">
                        <div class="form-group name">
                            <label class="myLabel">
                                <input type="file" name="pso_image"/>
                                <div class="upload_pic_background_pic">
                                    <img class="upload_pic" src="<?php echo base_url() ?>asset/images/grouped.svg"
                                         alt="upload profile pic">
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-md-offset-4 col-md-4">
                    <br>

                    <!--      <button style="margin-top: 160px" type="submit" name="buttonSubmit" class="btn btn-primary btn-lg done">Done</button>-->
                    <input type="submit" name="buttonSubmit" class="btn btn-block btn-primary " value="Create">
                </div>

            </div>

        </form>
    </div> <!-- body_wrapper -->
    <div class="copy-right col-xs-12"><h4>©2016 All Rights Reserved by Renata Limited</h4></div>
</div><!-- right-col -->
</div> <!-- main container #full-width -->
