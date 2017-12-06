
<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/style(pg-12).css">
<div class="pg12_wrapper container-fluid">
    <div class="pso_information">
        <h2>Pso information</h2>
    </div>

    <a onclick="change()"><img  class="pso_information_logo pull-left"   src="<?php echo base_url()?>asset/images/edit.png" alt="form_logo"></a>

    <div class="col-md-12" align="center">
        <?php if(isset($pso_add)){?>
            <h3><?php echo $pso_add;?></h3>
        <?php }?>
    </div>
    <form onsubmit="return check_user_update()" action="<?php echo base_url() ?>pso/update_pso" method="post" enctype="multipart/form-data">
    <div class="col-xs-11 personal_information_wrapper">
        <div class="row">

            <div class="col-xs-6">

                <img class="pull-left personal_information_img" src="<?php echo base_url()?>asset/images/Profile.png" alt="profile_image">
                <h3 class="personal_information_heading"  style="margin-bottom:60px"> Personal Information</h3>

                <div class="col-xs-3 personal_information_p">

                    <p>PSR CODE</p>

                </div>
                <div class="col-xs-8 col-xs-offset-1 personal_information_1">
                    <div class="form-group">
                        <input type="hidden" class="form-control " id="name1" name='pso_code'
                               value="<?php echo $pso['0']['pso_id'] ?>" placeholder="Enter PSO Code"
                               >
                        <input type="text" class="form-control " id="name1" name='test_pso_code'
                               value="<?php echo $pso['0']['pso_id'] ?>" placeholder="Enter PSO Code"
                               disabled="disabled">
                    </div>
                </div>
                <div class="col-xs-3 personal_information_p">

                    <p>Renata Id</p>

                </div>
                <div class="col-xs-8 col-xs-offset-1 personal_information_1">
                    <div class="form-group">
                        <input type="text" class="form-control change" id="name1" name='pso_renata_id'
                               value="<?php echo $pso['0']['renata_id'] ?>" placeholder="Enter Renata Employee Id"
                               disabled="disabled">
                    </div>
                </div>
                <div class="col-xs-3 personal_information_p">

                    <p>DSM CODE</p>

                </div>
                <div class="col-xs-8 col-xs-offset-1 personal_information_1">
                    <div class="form-group">
                        <input type="text" class="form-control change" id="name1" name='dsm_code'
                               value="<?php echo $pso['0']['tbl_user_dsm_dsm_code'] ?>" placeholder="Enter DSM Code"
                               disabled="disabled">
                    </div>
                </div>

                <div class="col-xs-3 personal_information_p">

                    <p>Name</p>

                </div>
                <div class="col-xs-8 col-xs-offset-1 personal_information_1">
                    <div class="form-group">

                        <input type="text" class="form-control change" id="name1" name='pso_name'
                               value="<?php echo $pso['0']['pso_name'] ?>" placeholder="Enter Pso Name"
                               disabled="disabled">
                    </div>
                </div>

                <div class="col-xs-3 personal_information_p">

                    <p>Gender</p>

                </div>
                <div class="col-xs-8 col-xs-offset-1 personal_information_1">
                    <div class="form-group">
                        <select disabled="disabled" id="name1" name="pso_gender" class="form-control change">
                            <?php if ($pso['0']['pso_gender'] == 1) { ?>
                                <option value="1" selected="selected">Male</option>
                                <option value="2">Female</option>
                            <?php } else { ?>
                                <option value="2" selected="selected">Female</option>
                                <option value="1">Male</option>
                            <?php } ?>

                        </select>
                    </div>

                </div>
                <div class="col-xs-3 personal_information_p">

                    <p>Date Of Birth</p>

                </div>
                <div class="col-xs-8 col-xs-offset-1 personal_information_1">


                    <div class="form-group">
                        <input type="date" class="form-control change" name="pso_dob"
                               value="<?php echo $pso['0']['pso_dob'] ?>" disabled="disabled">
                    </div>

                </div>
                <div class="col-xs-3 personal_information_p">

                    <p>Email</p>

                </div>
                <div class="col-xs-8 col-xs-offset-1 personal_information_1">

                    <div class="form-group">
                        <input type="email" class="form-control change" placeholder="Enter Pso Email"
                               name="pso_email" value="<?php echo $pso['0']['pso_email'] ?>"
                               disabled="disabled">
                    </div>

                </div>

                <div class="col-xs-3 personal_information_p">

                    <p>Phone</p>

                </div>
                <div class="col-xs-8 col-xs-offset-1 personal_information_1">
                    <div class="form-group">

                        <input style="border-radius: 10px;color: #2974BB !important;font-weight: 600 !important;border: none !important;" type="number" class="form-control change" id="name4" name="pso_phone"
                               value="<?php echo $pso['0']['pso_phone'] ?>"
                               placeholder="Enter Pso Phone Number" disabled="disabled">
                    </div>

                </div>

            </div>

            <div class="col-xs-2 col-xs-offset-4 profile_pic_grey">

                <?php if ($pso['0']['pso_image'] == '') { ?>
                    <a href="#"><img class="profile_pic_grey_img change"
                                     src="<?php echo base_url() ?>asset/images/Profile%20Grey.png"
                                     alt="profile pic"></a>
                <?php } else { ?>
                    <a href="#"><img class="profile_pic_grey_img change"
                                     src="<?php echo $pso['0']['pso_image'] ?>"
                                     alt="profile pic"></a>
                <?php } ?>
                <div class="form-group">
                    <input type="hidden" name="pso_image" class=" center-block" id="image">
                </div>

            </div>

        </div>
    </div>

    <div class="work_information_wrapper col-xs-11">

        <div class="row">

            <div class="col-xs-6">

                <img class="pull-left work_information_img"
                     src="<?php echo base_url() ?>asset/images/BriefCase.png" alt="profile_image">
                <h3 class="work_information_heading" style="margin-bottom:60px"> Work Information</h3>

                <div class="col-xs-4 work_information_p">
                    <p>Designation</p>
                </div>
                <div class="col-xs-7 col-xs-offset-1 work_information_1">
                    <div class="form-group">
                        <input type="text" class="form-control change" id="name5" name="pso_designation"
                               value="<?php echo $pso['0']['pso_designation'] ?>"
                               placeholder="Enter Pso Designation" disabled="disabled">
                    </div>
                </div>

                <div class="col-xs-4 work_information_p">

                    <p>Business</p>

                </div>
                <div class="col-xs-7 col-xs-offset-1 work_information_1">

                    <div class="form-group">
                        <select class="form-control change" id="business_code" name="business_code" disabled="disabled">
                            <option selected="selected" value="<?php echo $pso['0']['business_code']?>"><?php echo $pso['0']['business_name']?></option>
                            <?php foreach ($business as $bus){ if($pso['0']['business_code']!= $bus['business_code']){?>
                                <option value="<?php echo $bus['business_code']?>"><?php echo $bus['business_name']?></option>
                            <?php } }?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-4 work_information_p">

                    <p>Depot</p>

                </div>
                <div class="col-xs-7 col-xs-offset-1 work_information_1">

                    <div class="form-group">
                        <select class="form-control change" id="depot_code" name="depot_code" disabled="disabled">
                            <option selected="selected" value="<?php echo $pso['0']['depot_code']?>"><?php echo $pso['0']['depot_name']?></option>
                            <?php foreach ($depots as $depot){ if($pso['0']['depot_code']!= $depot['depot_code']){?>
                                <option value="<?php echo $depot['depot_code']?>"><?php echo $depot['depot_name']?></option>
                            <?php } }?>
                        </select>
                    </div>
                </div>



                <div class="col-xs-4 work_information_p">

                    <p>Total Test Score</p>

                </div>
                <div class="col-xs-7 col-xs-offset-1 work_information_1">

                    <div class="form-group">

                        <input type="text" class="form-control " id="name7"
                               value="<?php echo $pso['0']['pso_point'] ?>" disabled="disabled">
                    </div>
                </div>

                <div class="col-xs-4 col-xs-offset-12  work_information_1">
                    <div class="form-group">
                        <input type="hidden" name="btn" class="form-control btn btn-success sub" value="Update"
                               id="submit">
                    </div>
                </div>

            </div>

        </div>

    </div>

    <div class="copy-right col-xs-12"><h4>©2016 All Rights Reserved by Renata Limited</h4></div>

    </form>
</div>