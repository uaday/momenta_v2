<?php
/**
 * Created by PhpStorm.
 * User: Sudipta
 * Date: 11/12/2017
 * Time: 2:22 AM
 */

$exp_date=explode('-', $incentive['0']['exp_date']);
$incentive['0']['exp_date'] = $exp_date[1].'/'.$exp_date[2].'/'.$exp_date[0];
?>


<div class="main-content">

    <?php echo $user_profile; ?>
    <div class="page-title">

        <div class="title-env">
            <h1 class="title">Edit Incentive</h1>
            <p class="description">It is the incentive section for inspiring the pso for learning.</p>
        </div>

        <div class="breadcrumb-env">

            <ol class="breadcrumb bc-1">
                <li>
                    <a href="dashboard-1.html"><i class="fa-home"></i>Home</a>
                </li>
                <li>

                    <a href="<?php echo base_url()?>renata_shop/create_incentive">Renata Shop</a>
                </li>
                <li class="active">

                    <strong>Edit Incentive</strong>
                </li>
            </ol>

        </div>

    </div>
    <div class="panel panel-default">

        <div class="panel-heading">
            <div class="panel-title">
                Update incentive form
            </div>

        </div>

        <?php if ($this->session->userdata('create_incentive')) { ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong><?php echo $this->session->userdata('create_incentive'); ?></strong>
            </div>
            <?php $this->session->unset_userdata('create_incentive');
        } ?>

        <div class="panel-body">

            <form onsubmit="return check_incentive()" action="<?php echo base_url() ?>tar_shop/add_incentive" method="post" enctype="multipart/form-data" class="validate">

                <div class="form-group">
                    <label class="text-bold">Business</label>
                    <script type="text/javascript">
                        jQuery(document).ready(function ($) {
                            $("#business").selectBoxIt({
                                showFirstOption: false
                            }).on('open', function () {
                                // Adding Custom Scrollbar
                                $(this).data('selectBoxSelectBoxIt').list.perfectScrollbar();
                            });
                        });
                    </script>

                    <select name="business" class="form-control business" id="business"
                            onchange="gen_list(this.value, 'generic_name');">
                        <option value="-1">Select Business</option>
                        <?php foreach ($business as $bus) { ?>
                            <?php if ($this->session->userdata('business_code') == '00' && $bus['business_code'] != '00') { ?>
                                <option <?php if($incentive['0']['tbl_business_business_code']==$bus['business_code']) echo 'selected';?> value="<?= $bus['business_code'] ?>"><?= $bus['business_name'] ?></option>
                            <?php } else { ?>
                                <?php if ($this->session->userdata('business_code') == $bus['business_code'] && $bus['business_code'] != '00') { ?>
                                    <option <?php if($incentive['0']['tbl_business_business_code']==$bus['business_code']) echo 'selected';?> value="<?= $bus['business_code'] ?>"><?= $bus['business_name'] ?></option>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label">Offer Title</label>
                    <input value="<?php echo $incentive['0']['incentives_name']?>" type="text" class="form-control" id="title" name="title" data-validate="required"
                           placeholder="Offer title" data-message-required="Please fill up incentive title"/>
                    <input value="<?php echo $incentive['0']['incentives_id']?>" style="" name="incentives_id" id="offer_title" type="hidden" class="form-control"  >
                </div>
                <div class="form-group">
                    <label class="control-label">Description</label>
                    <textarea name="description"  class="form-control description" cols="5" rows="5" id="description" data-validate="required" data-message-required="Please fill up description field"><?php echo $incentive['0']['incentives_description']?></textarea>

                </div>
                <div class="form-group">
                    <label class="control-label">Validation</label>
                    <input value="<?php echo $incentive['0']['exp_date']?>" type="text" class="form-control datepicker" data-start-view="1" name="validation" id="offer_validity" data-validate="required" data-message-required="Please select the validation date">
                </div>
                <div class="form-group">
                    <label class="control-label">Point needed</label>
                    <input value="<?php echo $incentive['0']['incentives_point']?>" type="text" class="form-control" name="point"   id="point_needed" data-mask="999" placeholder="Point needed" data-validate="required" data-message-required="Please fill up the point needed section"/>
                </div>
                <div class="form-group">
                    <label class="control-label">Quantity</label>
                    <input value="<?php echo $incentive['0']['quantity']?>" type="text" class="form-control" name="quantity"   id="quantity" data-mask="999" placeholder="Quantity" data-validate="required" data-message-required="Please fill up the point needed section"/>
                </div>
                <div class="form-group">
                    <label class="control-label">Incentive Image</label>
                    <input type="file" name="image" id="shop_image" class="form-control" data-validate="required" data-message-required="Please fill up the point needed section">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Save Incentive</button>
                    <button type="reset" class="btn btn-white">Reset</button>
                </div>

            </form>

        </div>

    </div>
    <?php if (isset($footer)) {

        echo $footer;
    } ?>
</div>
