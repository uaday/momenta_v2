<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/target.css">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="body_wrapper"> <!-- MAIN BODY PART -->
    <div class="container_wrapper reneta_shop">
        <div class="form_content">
            <div align="center">
                <?php if ($this->session->userdata('create_shop') == 'Create Incentive Successful!') { ?>
                    <div class="alert alert-success"><strong><?php echo 'Create Incentive Successful!'; ?></strong></div>
                    <?php $this->session->unset_userdata('create_shop');
                } ?>
            </div>
            <h3 class="header_wrapper center-block text-center">Reneta Shop</h3>

            <form action="<?php echo base_url() ?>tar_shop/update_incentive" method="post"
                  enctype="multipart/form-data">
                <div class="form-group">
                    <input value="<?php echo $incentive['0']['incentives_name']?>" style="" name="title" id="offer_title" type="text" class="form-control" placeholder="Offer title" required="required">
                    <input value="<?php echo $incentive['0']['incentives_id']?>" style="" name="incentives_id" id="offer_title" type="hidden" class="form-control"  >
                </div>
                <div class="form-group">

                                <textarea class="form-control" name="description" rows="5" id="description"
                                          placeholder="Description"><?php echo $incentive['0']['incentives_description']?></textarea>

                </div>
                <br>
                <div class="form-group">
                    <input value="<?php echo $incentive['0']['exp_date']?>" type="date" name="validation" class="form-control" id="offer_validity"
                           placeholder="Offer Validity">
                </div>
                <br>
                <div class="form-group">
                    <input value="<?php echo $incentive['0']['incentives_point']?>" type="number" name="point" class="form-control" id="point_needed"
                           placeholder="Point needed" required="required">
                </div>
                <br>

                <div class="form-group">
                    <input value="<?php echo $incentive['0']['quantity']?>" type="number" name="quantity" class="form-control" id="quantity"
                           placeholder="Quantity">
                </div>
                <div class="col-md-12">

                    <div class="col-sm-12 reneta_shop_right">
                        <button  type="submit" class="btn btn-primary col-md-offset-3 col-md-6">Update
                        </button>
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