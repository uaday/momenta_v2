<?php $i=0;?>
<div class="body_wrapper">
    <!-- ////////////// -->
    <!-- MAIN BODY PART -->
    <div class="col-md-offset-10 col-md-2">
        <?php
        if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2'||$this->session->userdata('user_type')=='3')
        {?>
            <a  href="<?php echo base_url()?>tar_shop/export"><i class="glyphicon glyphicon-cloud-download"></i>  Download Gift Request</a>
        <?php }?>

    </div>
    <div class="col-md-12 track_section">
        <div class="request">
            <br>
            <div class="search clearfix">
                <!-- <a href="#"><img src="images/search-rounded.png" alt="reneta search"></a> -->
                <h3 class="header_wrapper center-block text-center">Gift Request</h3>
            </div>

            <table id="example" class="table result">
                <thead class="big_spacer">
                <tr>
                    <th >PSO's ID</th>
                    <th >PSO Name</th>
                    <th >Incentive ID</th>
                    <th >Incentive Name</th>
                    <th >Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($booked as $book){  $i++; if($i%2==0){?>
                    <tr class="color_wrapper_two small_spacer">
                        <?php } else {?>
                    <tr class="color_wrapper small_spacer">
                    <?php }?>
                        <td ><?php echo $book['renata_id']?></td>
                        <td ><?php echo $book['pso_name']?></td>
                        <td ><?php echo $book['incentives_id']?></td>
                        <td ><?php echo $book['incentives_name']?></td>
                        <td ><a href="<?php echo base_url()?>tar_shop/approve_booking?tar_id=<?php echo $book['transection_id']?>" onclick="return approve_transaction();"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a></td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
            <div class="color_wrapper_two clearfix">
                <button type="button" class="btn pull-right up-n-down">
                    <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
                </button>
            </div>
        </div>
    </div>

    <div class="col-md-12 track_section">
        <div class="request">
            <br>
            <div class="search clearfix">
                <!-- <a href="#"><img src="images/search-rounded.png" alt=""></a> -->
                <button type="button" class="btn pull-right up-n-down">
                    <span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
                </button>
                <h3 class="header_wrapper center-block text-center">Gift History</h3>
            </div>
            <table id="example2" class="table result">
                <thead class="big_spacer">
                <tr>
                    <th >PSO's ID</th>
                    <th >PSO Name</th>
                    <th >Incentive ID</th>
                    <th >Incentive Name</th>
                    <th >Approval Date</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($history as $his){  $i++; if($i%2==0){?>
                    <tr class="color_wrapper_two small_spacer">
                <?php } else {?>
                    <tr class="color_wrapper small_spacer">
                <?php }?>
                    <td ><?php echo $his['renata_id']?></td>
                    <td ><?php echo $his['pso_name']?></td>
                    <td ><?php echo $his['incentives_id']?></td>
                    <td ><?php echo $his['incentives_name']?></td>
                    <td ><?php echo $his['approval_date']?></td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="copy_right col-md-12">
        <p class="text-center">&copy; 2016 ALL Rights Reserved by <br> Renata Ltd.</p>
    </div>
</div> <!-- body_wrapper -->
</div><!-- right-col -->
</div> <!-- main container #full-width -->