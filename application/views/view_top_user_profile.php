<?php
/**
 * Created by PhpStorm.
 * User: Sudipta
 * Date: 9/29/2017
 * Time: 4:56 AM
 */
?>
<nav class="navbar user-info-navbar" role="navigation">

    <!-- Left links for user info navbar -->
    <ul class="user-info-menu left-links list-inline list-unstyled">

        <li class="hidden-sm hidden-xs">
            <a href="#" data-toggle="sidebar">
                <i class="fa-bars"></i>
            </a>
        </li>
    </ul>
    <ul class="user-info-menu right-links list-inline list-unstyled">

        <li class="dropdown user-profile">
            <a href="#" data-toggle="dropdown">
                <img src="<?php echo base_url()?>assets/images/user-4.png" alt="user-image" class="img-circle img-inline userpic-32"
                     width="28"/>
                <span>
								<?php echo $this->session->userdata('name')?>
								<i class="fa-angle-down"></i>
							</span>
            </a>

            <ul class="dropdown-menu user-profile-menu list-unstyled">
                <li class="last">
                    <a href="<?php echo base_url() ?>login/logout">
                        <i class="fa-lock"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
