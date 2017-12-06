<?php $i = 0; ?>
<div class="body_wrapper">
    <!-- ////////////// -->
    <!-- MAIN BODY PART -->
    <?php if($this->session->userdata('user_type')==1){?>
    <div class="col-md-12 track_section">
        <div class="request">
            <br>
            <div class="search clearfix">
                <!-- <a href="#"><img src="images/search-rounded.png" alt="reneta search"></a> -->
                <h3 class="header_wrapper center-block text-center">Admin User</h3>
                <div align="center">
                    <?php if ($this->session->userdata('edit_user') == 'User Edited') { ?>
                        <div class="alert alert-success"><strong><?php echo 'User information has been updated'; ?></strong></div>
                        <?php $this->session->unset_userdata('edit_user');
                    } else if($this->session->userdata('reset_password')=='User Password reset Successful'){?>
                        <div class="alert alert-success"><strong><?php echo 'User Password reset Successful'; ?></strong></div>
                    <?php $this->session->unset_userdata('reset_password');}?>
                </div>
            </div>

            <table id="example" class="table result">
                <thead class="big_spacer">
                <tr>
                    <th>Renata Id</th>
                    <th>User Name</th>
                    <?php if ($this->session->userdata('user_type') == '1' || $this->session->userdata('user_type') == '2' ) { ?>
                        <th>Last Login Date</th>
                        <th>Last Login Time</th>
                    <?php } ?>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($admins as $admin) {
                    $i++;
                    if ($i % 2 == 0) { ?>
                        <tr class="color_wrapper_two small_spacer">
                    <?php } else { ?>
                        <tr class="color_wrapper small_spacer">
                    <?php } ?>
                    <td><?php echo $admin['renata_id'] ?></td>
                    <td><?php echo $admin['name'] ?></td>
                    <?php if ($this->session->userdata('user_type') == '1'||$this->session->userdata('user_type') == '2') { ?>
                        <td><?php echo $admin['last_login_date'] ?></td>
                        <td><?php echo $admin['last_login_time'] ?></td>
                    <?php } ?>
                    <?php if ($admin['status'] == '1') { ?>
                        <td>Active</td>
                    <?php } else { ?>
                        <td>Block</td>
                    <?php } ?>
                    <td>
                        <?php if ($admin['status'] == '1') { ?>
                            <a href="<?php echo base_url()?>user/block_user?renata_id=<?php echo $admin['renata_id']?>&user_type=2"><span class="fa fa-2x fa-thumbs-o-down"></span></a>|
                        <?php } else { ?>
                            <a href="<?php echo base_url()?>user/active_user?renata_id=<?php echo $admin['renata_id']?>&user_type=2"><span class="fa fa-2x fa-thumbs-o-up"></span></a>|
                        <?php } ?>
                        <a href="<?php echo base_url()?>user/reset_password?renata_id=<?php echo $admin['renata_id']?>&user_type=2"><span class="fa fa-2x fa-unlock-alt"></span></a>|
                        <a href="<?php echo base_url()?>user/edit_user?renata_id=<?php echo $admin['renata_id']?>&user_type=2"><span class="fa fa-2x fa-edit"></span></a>|
                        <a href="<?php echo base_url()?>user/delete_user?renata_id=<?php echo $admin['renata_id']?>&user_type=2" onclick="return delete_user();"><span class="fa fa-2x fa-trash"></span></a>
                    </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php }if($this->session->userdata('user_type')==1||$this->session->userdata('user_type')==2){?>
    <div class="col-md-12 track_section">
        <div class="request">
            <br>
            <div class="search clearfix">
                <!-- <a href="#"><img src="images/search-rounded.png" alt="reneta search"></a> -->
                <h3 class="header_wrapper center-block text-center">Marketing User</h3>
            </div>

            <table id="example2" class="table result">
                <thead class="big_spacer">
                <tr>
                    <th>Renata Id</th>
                    <th>User Name</th>
                    <?php if ($this->session->userdata('user_type') == '1'||$this->session->userdata('user_type') == '2') { ?>
                        <th>Last Login Date</th>
                        <th>Last Login Time</th>
                    <?php } ?>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($its as $it) {
                    $i++;
                    if ($i % 2 == 0) { ?>
                        <tr class="color_wrapper_two small_spacer">
                    <?php } else { ?>
                        <tr class="color_wrapper small_spacer">
                    <?php } ?>
                    <td><?php echo $it['renata_id'] ?></td>
                    <td><?php echo $it['name'] ?></td>
                    <?php if ($this->session->userdata('user_type') == '1'||$this->session->userdata('user_type') == '2') { ?>
                        <td><?php echo $it['last_login_date'] ?></td>
                        <td><?php echo $it['last_login_time'] ?></td>
                    <?php } ?>
                    <?php if ($it['status'] == '1') { ?>
                        <td>Active</td>
                    <?php } else { ?>
                        <td>Block</td>
                    <?php } ?>
                    <td>
                        <?php if ($it['status'] == '1') { ?>
                            <a href="<?php echo base_url()?>user/block_user?renata_id=<?php echo $it['renata_id']?>&user_type=3"><span class="fa fa-2x fa-thumbs-o-down"></span></a>|
                        <?php } else { ?>
                            <a href="<?php echo base_url()?>user/active_user?renata_id=<?php echo $it['renata_id']?>&user_type=3"><span class="fa fa-2x fa-thumbs-o-up"></span></a>|
                        <?php } ?>
                        <a href="<?php echo base_url()?>user/reset_password?renata_id=<?php echo $it['renata_id']?>&user_type=3"><span class="fa fa-2x fa-unlock-alt"></span></a>|
                        <a href="<?php echo base_url()?>user/edit_user?renata_id=<?php echo $it['renata_id']?>&user_type=3"><span class="fa fa-2x fa-edit"></span></a>|
                        <a href="<?php echo base_url()?>user/delete_user?renata_id=<?php echo $it['renata_id']?>&user_type=3" onclick="return delete_user();"><span class="fa fa-2x fa-trash"></span></a>
                    </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php } if($this->session->userdata('user_type')==1||$this->session->userdata('user_type')==2){?>
        <div class="col-md-12 track_section">
            <div class="request">
                <br>
                <div class="search clearfix">
                    <!-- <a href="#"><img src="images/search-rounded.png" alt="reneta search"></a> -->
                    <h3 class="header_wrapper center-block text-center">General Manager Sales User</h3>
                </div>

                <table id="example2" class="table result">
                    <thead class="big_spacer">
                    <tr>
                        <th>Renata Id</th>
                        <th>User Name</th>
                        <?php if ($this->session->userdata('user_type') == '1' || $this->session->userdata('user_type') == '2' ) { ?>
                            <th>Last Login Date</th>
                            <th>Last Login Time</th>
                        <?php } ?>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($gms as $gm) {
                        $i++;
                        if ($i % 2 == 0) { ?>
                            <tr class="color_wrapper_two small_spacer">
                        <?php } else { ?>
                            <tr class="color_wrapper small_spacer">
                        <?php } ?>
                        <td><?php echo $gm['renata_id'] ?></td>
                        <td><?php echo $gm['name'] ?></td>
                        <?php if ($this->session->userdata('user_type') == '1'||$this->session->userdata('user_type') == '2') { ?>
                            <td><?php echo $gm['last_login_date'] ?></td>
                            <td><?php echo $gm['last_login_time'] ?></td>
                        <?php } ?>
                        <?php if ($gm['status'] == '1') { ?>
                            <td>Active</td>
                        <?php } else { ?>
                            <td>Block</td>
                        <?php } ?>
                        <td>
                            <?php if ($gm['status'] == '1') { ?>
                                <a href="<?php echo base_url()?>user/block_user?renata_id=<?php echo $gm['renata_id']?>&user_type=7"><span class="fa fa-2x fa-thumbs-o-down"></span></a>|
                            <?php } else { ?>
                                <a href="<?php echo base_url()?>user/active_user?renata_id=<?php echo $gm['renata_id']?>&user_type=7"><span class="fa fa-2x fa-thumbs-o-up"></span></a>|
                            <?php } ?>
                            <a href="<?php echo base_url()?>user/reset_password?renata_id=<?php echo $gm['renata_id']?>&user_type=7"><span class="fa fa-2x fa-unlock-alt"></span></a>|
                            <a href="<?php echo base_url()?>user/edit_user?renata_id=<?php echo $gm['renata_id']?>&user_type=7"><span class="fa fa-2x fa-edit"></span></a>|
                            <a href="<?php echo base_url()?>user/delete_user?renata_id=<?php echo $gm['renata_id']?>&user_type=7" onclick="return delete_user();"><span class="fa fa-2x fa-trash"></span></a>
                        </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } if($this->session->userdata('user_type')==1||$this->session->userdata('user_type')==2){?>
    <div class="col-md-12 track_section">
        <div class="request">
            <br>
            <div class="search clearfix">
                <!-- <a href="#"><img src="images/search-rounded.png" alt="reneta search"></a> -->
                <h3 class="header_wrapper center-block text-center">Sales User</h3>
            </div>

            <table id="example3" class="table result">
                <thead class="big_spacer">
                <tr>
                    <th>Renata Id</th>
                    <th>User Name</th>
                    <?php if ($this->session->userdata('user_type') == '1'||$this->session->userdata('user_type') == '2') { ?>
                        <th>Last Login Date</th>
                        <th>Last Login Time</th>
                    <?php } ?>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($sales as $sale) {
                    $i++;
                    if ($i % 2 == 0) { ?>
                        <tr class="color_wrapper_two small_spacer">
                    <?php } else { ?>
                        <tr class="color_wrapper small_spacer">
                    <?php } ?>
                    <td><?php echo $sale['renata_id'] ?></td>
                    <td><?php echo $sale['name'] ?></td>
                    <?php if ($this->session->userdata('user_type') == '1'||$this->session->userdata('user_type') == '2') { ?>
                        <td><?php echo $sale['last_login_date'] ?></td>
                        <td><?php echo $sale['last_login_time'] ?></td>
                    <?php } ?>
                    <?php if ($sale['status'] == '1') { ?>
                        <td>Active</td>
                    <?php } else { ?>
                        <td>Block</td>
                    <?php } ?>
                    <td>
                        <?php if ($sale['status'] == '1') { ?>
                            <a href="<?php echo base_url()?>user/block_user?renata_id=<?php echo $sale['renata_id']?>&user_type=4"><span class="fa fa-2x fa-thumbs-o-down"></span></a>|
                        <?php } else { ?>
                            <a href="<?php echo base_url()?>user/active_user?renata_id=<?php echo $sale['renata_id']?>&user_type=4"><span class="fa fa-2x fa-thumbs-o-up"></span></a>|
                        <?php } ?>
                        <a href="<?php echo base_url()?>user/reset_password?renata_id=<?php echo $sale['renata_id']?>&user_type=4"><span class="fa fa-2x fa-unlock-alt"></span></a>|
                        <a href="<?php echo base_url()?>user/edit_user?renata_id=<?php echo $sale['renata_id']?>&user_type=4"><span class="fa fa-2x fa-edit"></span></a>|
                        <a href="<?php echo base_url()?>user/delete_user?renata_id=<?php echo $sale['renata_id']?>&user_type=4" onclick="return delete_user();"><span class="fa fa-2x fa-trash"></span></a>
                    </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php }if($this->session->userdata('user_type')==1||$this->session->userdata('user_type')==2){?>
    <div class="col-md-12 track_section">
        <div class="request">
            <br>
            <div class="search clearfix">
                <!-- <a href="#"><img src="images/search-rounded.png" alt="reneta search"></a> -->
                <h3 class="header_wrapper center-block text-center">Regional Sales User</h3>
            </div>

            <table id="example4" class="table result">
                <thead class="big_spacer">
                <tr>
                    <th>Renata Id</th>
                    <th>User Name</th>
                    <?php if ($this->session->userdata('user_type') == '1' || $this->session->userdata('user_type') == '2' ) { ?>
                        <th>Last Login Date</th>
                        <th>Last Login Time</th>
                    <?php } ?>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($rsms as $rsm) {
                    $i++;
                    if ($i % 2 == 0) { ?>
                        <tr class="color_wrapper_two small_spacer">
                    <?php } else { ?>
                        <tr class="color_wrapper small_spacer">
                    <?php } ?>
                    <td><?php echo $rsm['renata_id'] ?></td>
                    <td><?php echo $rsm['name'] ?></td>
                    <?php if ($this->session->userdata('user_type') == '1'||$this->session->userdata('user_type') == '2') { ?>
                        <td><?php echo $rsm['last_login_date'] ?></td>
                        <td><?php echo $rsm['last_login_time'] ?></td>
                    <?php } ?>
                    <?php if ($rsm['status'] == '1') { ?>
                        <td>Active</td>
                    <?php } else { ?>
                        <td>Block</td>
                    <?php } ?>
                    <td>
                        <?php if ($rsm['status'] == '1') { ?>
                            <a href="<?php echo base_url()?>user/block_user?renata_id=<?php echo $rsm['renata_id']?>&user_type=5"><span class="fa fa-2x fa-thumbs-o-down"></span></a> |
                        <?php } else { ?>
                            <a href="<?php echo base_url()?>user/active_user?renata_id=<?php echo $rsm['renata_id']?>&user_type=5"><span class="fa fa-2x fa-thumbs-o-up"></span></a> |
                        <?php } ?>
                        <a href="<?php echo base_url()?>user/reset_password?renata_id=<?php echo $rsm['renata_id']?>&user_type=5"><span class="fa fa-2x fa-unlock-alt"></span></a>|
                        <a href="<?php echo base_url()?>user/edit_user?renata_id=<?php echo $rsm['renata_id']?>&user_type=5"><span class="fa fa-2x fa-edit"></span></a>|
                        <a href="<?php echo base_url()?>user/delete_user?renata_id=<?php echo $rsm['renata_id']?>&user_type=5" onclick="return delete_user();"><span class="fa fa-2x fa-trash"></span></a>
                    </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php }if($this->session->userdata('user_type')==1||$this->session->userdata('user_type')==2){?>
    <div class="col-md-12 track_section">
        <div class="request">
            <br>
            <div class="search clearfix">
                <!-- <a href="#"><img src="images/search-rounded.png" alt="reneta search"></a> -->
                <h3 class="header_wrapper center-block text-center">District Sales User</h3>
            </div>

            <table id="example5" class="table result">
                <thead class="big_spacer">
                <tr>
                    <th>Renata Id</th>
                    <th>User Name</th>
                    <?php if ($this->session->userdata('user_type') == '1' || $this->session->userdata('user_type') == '2' ) { ?>
                        <th>Last Login Date</th>
                        <th>Last Login Time</th>
                    <?php } ?>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($dsms as $dsm) {
                    $i++;
                    if ($i % 2 == 0) { ?>
                        <tr class="color_wrapper_two small_spacer">
                    <?php } else { ?>
                        <tr class="color_wrapper small_spacer">
                    <?php } ?>
                    <td><?php echo $dsm['renata_id'] ?></td>
                    <td><?php echo $dsm['name'] ?></td>
                    <?php if ($this->session->userdata('user_type') == '1'||$this->session->userdata('user_type') == '2') { ?>
                        <td><?php echo $dsm['last_login_date'] ?></td>
                        <td><?php echo $dsm['last_login_time'] ?></td>
                    <?php } ?>
                    <?php if ($dsm['status'] == '1') { ?>
                        <td>Active</td>
                    <?php } else { ?>
                        <td>Block</td>
                    <?php } ?>
                    <td>
                        <?php if ($dsm['status'] == '1') { ?>
                            <a href="<?php echo base_url()?>user/block_user?renata_id=<?php echo $dsm['renata_id']?>&user_type=6"><span class="fa fa-2x fa-thumbs-o-down"></span></a>|
                        <?php } else { ?>
                            <a href="<?php echo base_url()?>user/block_user?renata_id=<?php echo $dsm['renata_id']?>&user_type=6"><span class="fa fa-2x fa-thumbs-o-up"></span></a>|
                        <?php } ?>
                        <a href="<?php echo base_url()?>user/reset_password?renata_id=<?php echo $dsm['renata_id']?>&user_type=6"><span class="fa fa-2x fa-unlock-alt"></span></a>|
                        <a href="<?php echo base_url()?>user/edit_user?renata_id=<?php echo $dsm['renata_id']?>&user_type=6"><span class="fa fa-2x fa-edit"></span></a>|
                        <a href="<?php echo base_url()?>user/delete_user?renata_id=<?php echo $dsm['renata_id']?>&user_type=6" onclick="return delete_user();"><span class="fa fa-2x fa-trash"></span></a>
                    </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php }?>


    <div class="copy_right col-md-12">
        <p class="text-center">&copy; 2016 ALL Rights Reserved by <br> Renata Ltd.</p>
    </div>
</div> <!-- body_wrapper -->
</div><!-- right-col -->
</div> <!-- main container #full-width -->