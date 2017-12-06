<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asset/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asset/css/style.css">
    <link rel="icon" href="<?php echo base_url() ?>/asset/images/Logo.png" type="image/x-icon">
    <title>Momenta</title>
    <style>
    </style>
</head>
<body>
<div id="full_width">

    <div class="left-col"> <!-- Left Side Bar -->
        <div class="profile container-fluid">
            <a href="<?php echo base_url() ?>home"><img src="<?php echo base_url() ?>asset/images/reneta.png"
                                                        class="main-logo center-block" alt="reneta logo"><img
                    src="<?php echo base_url() ?>asset/images/small-logo.png" class="small-logo center-block"
                    alt="reneta logo"></a>
            <hr class="big_one">
            <hr class="small_one">
        </div>

        <div class="app_dashboard"> <!-- Nav Bar or Nav Links -->
            <nav class="navbar">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <?php if($this->session->userdata('i')=='1'){?>
                            <li class="active appp ungroup">
                                <a href="<?php echo base_url() ?>home">
                                    <p class="app-text"><img class="app_icons"
                                                             src="<?php echo base_url() ?>asset/images/Home.png"
                                                             alt="reneta_icons">
                                        Home</p>
                                </a>
                            </li>
                        <?php }else {?>
                            <li class=" appp ungroup">
                                <a href="<?php echo base_url() ?>home">
                                    <p class="app-text"><img class="app_icons"
                                                             src="<?php echo base_url() ?>asset/images/Home.png"
                                                             alt="reneta_icons">
                                        Home</p>
                                </a>
                            </li>
                        <?php } if($this->session->userdata('i')=='2'){?>
                            <?php if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2'||$this->session->userdata('user_type')=='3'){?>
                                <li class="active appp ungroup">
                                    <a href="<?php echo base_url() ?>medicine_literature">
                                        <p class="app-text"><img class="app_icons"
                                                                 src="<?php echo base_url() ?>asset/images/Literature.png"
                                                                 alt="reneta_icons">
                                            Medicine Literature</p>
                                    </a>
                                </li>
                            <?php }} else {?>
                            <?php if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2'||$this->session->userdata('user_type')=='3'){?>
                                <li class="appp ungroup">
                                    <a href="<?php echo base_url() ?>medicine_literature">
                                        <p class="app-text"><img class="app_icons"
                                                                 src="<?php echo base_url() ?>asset/images/Literature.png"
                                                                 alt="reneta_icons">
                                            Medicine Literature</p>
                                    </a>
                                </li>
                            <?php }} if($this->session->userdata('i')=='3'){?>
                            <li class="active appp">
                                <a href="javascript:;" data-toggle="collapse" data-target="#test">
                                    <p class="app-text"><img class="app_icons"
                                                             src="<?php echo base_url() ?>asset/images/Tests.png"
                                                             alt="reneta_icons">
                                        Tests<span class="pull-right glyphicon glyphicon-triangle-bottom"
                                                   aria-hidden="true"></span></p>
                                </a>
                                <ul id="test" class="collapse">
                                    <?php if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2'||$this->session->userdata('user_type')=='3'){?>
                                    <li class="inner-appp"><a href="<?php echo base_url() ?>test/create_test"><p
                                                class="app_small_text"><span
                                                    class="glyphicon glyphicon-certificate" aria-hidden="true"></span>
                                                Create Test</p></a></li>
                                    <?php }?>
                                    <li class="inner-appp"><a href="<?php echo base_url() ?>test/result"><p
                                                class="app_small_text"><span
                                                    class="glyphicon glyphicon-certificate" aria-hidden="true"></span>
                                                Results</p></a></li>
                                    <?php if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2'||$this->session->userdata('user_type')=='3'){?>
                                    <li class="inner-appp"><a href="<?php echo base_url() ?>test/test_page"><p
                                                class="app_small_text"><span class="glyphicon glyphicon-certificate"
                                                                             aria-hidden="true"></span> Test Page</p></a>
                                    </li>
                                    <?php }?>
                                </ul>
                            </li>
                        <?php } else {?>
                            <li class="appp">
                                <a href="javascript:;" data-toggle="collapse" data-target="#test">
                                    <p class="app-text"><img class="app_icons"
                                                             src="<?php echo base_url() ?>asset/images/Tests.png"
                                                             alt="reneta_icons">
                                        Tests<span class="pull-right glyphicon glyphicon-triangle-bottom"
                                                   aria-hidden="true"></span></p>
                                </a>
                                <ul id="test" class="collapse">
                                    <?php if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2'||$this->session->userdata('user_type')=='3'){?>
                                    <li class="inner-appp"><a href="<?php echo base_url() ?>test/create_test"><p
                                                class="app_small_text"><span
                                                    class="glyphicon glyphicon-certificate" aria-hidden="true"></span>
                                                Create Test</p></a></li>
                                    <?php }?>
                                    <li class="inner-appp"><a href="<?php echo base_url() ?>test/result"><p
                                                class="app_small_text"><span
                                                    class="glyphicon glyphicon-certificate" aria-hidden="true"></span>
                                                Results</p></a></li>
                                    <?php if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2'||$this->session->userdata('user_type')=='3'){?>
                                    <li class="inner-appp"><a href="<?php echo base_url() ?>test/test_page"><p
                                                class="app_small_text"><span class="glyphicon glyphicon-certificate"
                                                                             aria-hidden="true"></span> Test Page</p></a>
                                    </li>
                                    <?php }?>
                                </ul>
                            </li>
                        <?php } if($this->session->userdata('i')=='4'){?>
                            <?php if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2'||$this->session->userdata('user_type')=='3'){?>
                                <li class="active appp">
                                    <a href="javascript:;" data-toggle="collapse" data-target="#target">
                                        <p class="app-text"><img class="app_icons"
                                                                 src="<?php echo base_url() ?>asset/images/Target.png"
                                                                 alt="reneta_icons">
                                            Reneta Shop<span
                                                class="pull-right glyphicon glyphicon-triangle-bottom"
                                                aria-hidden="true"></span></p>
                                    </a>
                                    <ul id="target" class="collapse">
                                        <li class="inner-appp"><a href="<?php echo base_url() ?>tar_shop/create_target"><p
                                                    class="app_small_text"><span
                                                        class="glyphicon glyphicon-certificate" aria-hidden="true"></span>
                                                    Create Incentive</p></a></li>
                                        <li class="inner-appp"><a href="<?php echo base_url() ?>tar_shop/manage_incentives"><p
                                                    class="app_small_text"><span
                                                        class="glyphicon glyphicon-certificate" aria-hidden="true"></span>
                                                    Manage Incentive</p></a></li>
                                        <li class="inner-appp"><a href="<?php echo base_url() ?>tar_shop/track_incentive"><p
                                                    class="app_small_text"><span
                                                        class="glyphicon glyphicon-certificate" aria-hidden="true"></span> Track
                                                    Incentive</p></a></li>
                                    </ul>
                                </li>
                            <?php }} else {?>
                            <?php if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2'||$this->session->userdata('user_type')=='3'){?>
                                <li class="appp">
                                    <a href="javascript:;" data-toggle="collapse" data-target="#target">
                                        <p class="app-text"><img class="app_icons"
                                                                 src="<?php echo base_url() ?>asset/images/Target.png"
                                                                 alt="reneta_icons">
                                            Renata Shop<span
                                                class="pull-right glyphicon glyphicon-triangle-bottom"
                                                aria-hidden="true"></span></p>
                                    </a>
                                    <ul id="target" class="collapse">
                                        <li class="inner-appp"><a href="<?php echo base_url() ?>tar_shop/create_target"><p
                                                    class="app_small_text"><span
                                                        class="glyphicon glyphicon-certificate" aria-hidden="true"></span>
                                                    Create Incentive</p></a></li>
                                        <li class="inner-appp"><a href="<?php echo base_url() ?>tar_shop/manage_incentives"><p
                                                    class="app_small_text"><span
                                                        class="glyphicon glyphicon-certificate" aria-hidden="true"></span>
                                                    Manage Incentive</p></a></li>
                                        <li class="inner-appp"><a href="<?php echo base_url() ?>tar_shop/track_incentive"><p
                                                    class="app_small_text"><span
                                                        class="glyphicon glyphicon-certificate" aria-hidden="true"></span> Track
                                                    Incentive</p></a></li>
                                    </ul>
                                </li>
                            <?php }} if($this->session->userdata('i')=='5'){?>
                            <?php if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2'){?>
                                <li class="active appp">
                                    <a href="javascript:;" data-toggle="collapse" data-target="#pso">
                                        <p class="app-text"><img class="app_icons"
                                                                 src="<?php echo base_url() ?>asset/images/PSO.png"
                                                                 alt="reneta_icons">
                                            PSO<span class="pull-right glyphicon glyphicon-triangle-bottom"
                                                     aria-hidden="true"></span></p>
                                    </a>
                                    <ul id="pso" class="collapse">
                                        <li class="inner-appp"><a href="<?php echo base_url() ?>pso/add_pso"><p
                                                    class="app_small_text"><span
                                                        class="glyphicon glyphicon-certificate" aria-hidden="true"></span> Add
                                                    PSO</p></a></li>
                                        <li class="inner-appp"><a href="<?php echo base_url() ?>pso/manage_pso"><p
                                                    class="app_small_text"><span
                                                        class="glyphicon glyphicon-certificate" aria-hidden="true"></span>
                                                    Manage PSO</p></a></li>
                                    </ul>
                                </li>
                            <?php }} else {?>
                            <?php if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2'){?>
                                <li class="appp">
                                    <a href="javascript:;" data-toggle="collapse" data-target="#pso">
                                        <p class="app-text"><img class="app_icons"
                                                                 src="<?php echo base_url() ?>asset/images/PSO.png"
                                                                 alt="reneta_icons">
                                            PSO<span class="pull-right glyphicon glyphicon-triangle-bottom"
                                                     aria-hidden="true"></span></p>
                                    </a>
                                    <ul id="pso" class="collapse">
                                        <li class="inner-appp"><a href="<?php echo base_url() ?>pso/add_pso"><p
                                                    class="app_small_text"><span
                                                        class="glyphicon glyphicon-certificate" aria-hidden="true"></span> Add
                                                    PSO</p></a></li>
                                        <li class="inner-appp"><a href="<?php echo base_url() ?>pso/manage_pso"><p
                                                    class="app_small_text"><span
                                                        class="glyphicon glyphicon-certificate" aria-hidden="true"></span>
                                                    Manage PSO</p></a></li>
                                    </ul>
                                </li>
                            <?php }}  if($this->session->userdata('i')=='6'){?>

                            <?php if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2'){?>
                                <li class="active appp">
                                    <a href="javascript:;" data-toggle="collapse" data-target="#user">
                                        <p class="app-text"><img class="app_icons"
                                                                 src="<?php echo base_url() ?>asset/images/PSO.png"
                                                                 alt="reneta_icons">
                                            User<span class="pull-right glyphicon glyphicon-triangle-bottom"
                                                      aria-hidden="true"></span></p>
                                    </a>
                                    <ul id="user" class="collapse">
                                        <li class="inner-appp"><a href="<?php echo base_url() ?>user/create_user"><p
                                                    class="app_small_text"><span
                                                        class="glyphicon glyphicon-certificate" aria-hidden="true"></span> Add
                                                    User</p></a></li>
                                        <li class="inner-appp"><a href="<?php echo base_url() ?>user/manage_user"><p
                                                    class="app_small_text"><span
                                                        class="glyphicon glyphicon-certificate" aria-hidden="true"></span>
                                                    Manage User</p></a></li>
                                    </ul>
                                </li>
                            <?php }} else {?>
                            <?php if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2'){?>
                                <li class="appp">
                                    <a href="javascript:;" data-toggle="collapse" data-target="#user">
                                        <p class="app-text"><img class="app_icons"
                                                                 src="<?php echo base_url() ?>asset/images/PSO.png"
                                                                 alt="reneta_icons">
                                            User<span class="pull-right glyphicon glyphicon-triangle-bottom"
                                                      aria-hidden="true"></span></p>
                                    </a>
                                    <ul id="user" class="collapse">
                                        <li class="inner-appp"><a href="<?php echo base_url() ?>user/create_user"><p
                                                    class="app_small_text"><span
                                                        class="glyphicon glyphicon-certificate" aria-hidden="true"></span> Add
                                                    User</p></a></li>
                                        <li class="inner-appp"><a href="<?php echo base_url() ?>user/manage_user"><p
                                                    class="app_small_text"><span
                                                        class="glyphicon glyphicon-certificate" aria-hidden="true"></span>
                                                    Manage User</p></a></li>
                                    </ul>
                                </li>
                            <?php }}  if($this->session->userdata('i')=='7'){?>
                            <?php if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2'){?>
                                <li class="active appp">
                                    <a href="javascript:;" data-toggle="collapse" data-target="#bulk">
                                        <p class="app-text"><img class="app_icons" height="30px"
                                                                 src="<?php echo base_url() ?>asset/images/bulk.png"
                                                                 alt="reneta_icons">
                                            Bulk Data<span class="pull-right glyphicon glyphicon-triangle-bottom"
                                                      aria-hidden="true"></span></p>
                                    </a>
                                    <ul id="bulk" class="collapse">
                                        <li class="inner-appp"><a href="<?php echo base_url() ?>bulk_data/pso_bulk"><p
                                                    class="app_small_text"><span
                                                        class="glyphicon glyphicon-certificate" aria-hidden="true"></span> PSO
                                                    Bulk</p></a></li>
                                        <li class="inner-appp"><a href="<?php echo base_url() ?>bulk_data/user_bulk"><p
                                                    class="app_small_text"><span
                                                        class="glyphicon glyphicon-certificate" aria-hidden="true"></span>
                                                    User Bulk</p></a></li>
                                    </ul>
                                </li>
                            <?php }} else {?>
                            <?php if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2'){?>
                                <li class="appp">
                                    <a href="javascript:;" data-toggle="collapse" data-target="#bulk">
                                        <p class="app-text"><img class="app_icons" height="30px"
                                                                 src="<?php echo base_url() ?>asset/images/bulk.png"
                                                                 alt="reneta_icons">
                                            Bulk Data<span class="pull-right glyphicon glyphicon-triangle-bottom"
                                                      aria-hidden="true"></span></p>
                                    </a>
                                    <ul id="bulk" class="collapse">
                                        <li class="inner-appp"><a href="<?php echo base_url() ?>bulk_data/pso_bulk"><p
                                                    class="app_small_text"><span
                                                        class="glyphicon glyphicon-certificate" aria-hidden="true"></span> PSO
                                                    Bulk</p></a></li>
                                        <li class="inner-appp"><a href="<?php echo base_url() ?>bulk_data/user_bulk"><p
                                                    class="app_small_text"><span
                                                        class="glyphicon glyphicon-certificate" aria-hidden="true"></span>
                                                    User Bulk</p></a></li>
                                    </ul>
                                </li>
                            <?php }}?>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
        </div><!-- app_dashboard -->
    </div><!-- left-col -->

    <div class="right-col"> <!-- Right Part of the BODY -->
        <div class="signup-bar"> <!-- Top SignUp Section, Desktop Size -->
            <div class="signup pull-right">
                <a href="#"><img class="signup_img pull-left" src="<?php echo base_url() ?>asset/images/user-male-icon.png"
                                 alt="profile-picture"></a>
                <div class="dropdown pull-left">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <?php echo $this->session->userdata('name'); ?>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="<?php echo base_url()?>settings/change_password">Change Password</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo base_url() ?>login/logout">Logout</a></li>
                    </ul>
                </div> <!-- dropdown -->
            </div> <!-- signup -->
        </div> <!-- signup-bar -->

        <div class="banner-wrapper"> <!-- Top Banner -->

            <nav class="navbar small_nav"> <!-- Toggle Nav Bar, Mobile/Phone View -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#small_ver_toggle" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse small-ver" id="small_ver_toggle">
                    <ul class="nav navbar-nav">
                        <li class="appp">
                            <div class="signup">
                                <a href="#"><img class="signup_img pull-left"
                                                 src="<?php echo base_url() ?>asset/images/user-male-icon.png"
                                                 src="<?php echo base_url() ?>asset/images/user-male-icon.pngad"
                                                 alt="profile-picture"></a>
                                <div class="dropdown pull-left">

                                    <button class="btn btn-primary dropdown-toggle">
                                        <a href="javascript:;" data-toggle="collapse" data-target="#dropped">
                                            <?php echo $this->session->userdata('name'); ?>
                                            <span class="caret"></span>
                                        </a>
                                    </button>

                                    <ul id="dropped" class="collapse">
                                        <li><a href="<?php echo base_url()?>settings/change_password"><p
                                                    class="app_small_text">Change Password</p></a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="<?php echo base_url() ?>login/logout"><p
                                                    class="app_small_text">Logout</p></a></li>
                                    </ul>
                                </div><!-- dropdown -->
                            </div><!-- signup -->
                        </li>
                        <?php if($this->session->userdata('i')=='1'){?>
                        <li class="active appp">
                            <a href="<?php echo base_url() ?>home">
                                <p class="app-text"><img class="app_icons"
                                                         src="<?php echo base_url() ?>asset/images/Home.png"
                                                         alt="reneta_icons">
                                    Home</p>
                            </a>
                        </li>
                        <?php } else {?>
                            <li class=" appp">
                                <a href="<?php echo base_url() ?>home">
                                    <p class="app-text"><img class="app_icons"
                                                             src="<?php echo base_url() ?>asset/images/Home.png"
                                                             alt="reneta_icons">
                                        Home</p>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if($this->session->userdata('i')=='2'){?>
                        <?php if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2'||$this->session->userdata('user_type')=='3'){?>
                            <li class="active appp">
                                <a href="<?php echo base_url() ?>medicine_literature">
                                    <p class="app-text"><img class="app_icons"
                                                             src="<?php echo base_url() ?>asset/images/Literature.png"
                                                             alt="reneta_icons">
                                        Medicine Literature</p>
                                </a>
                            </li>
                        <?php }} else {?>
                        <?php if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2'||$this->session->userdata('user_type')=='3'){?>
                            <li class="appp">
                                <a href="<?php echo base_url() ?>medicine_literature">
                                    <p class="app-text"><img class="app_icons"
                                                             src="<?php echo base_url() ?>asset/images/Literature.png"
                                                             alt="reneta_icons">
                                        Medicine Literature</p>
                                </a>
                            </li>
                        <?php }}?>
                        <?php if($this->session->userdata('i')=='3'){?>
                        <li class="active appp">
                            <a href="javascript:;" data-toggle="collapse" data-target="#test0">
                                <p class="app-text"><img class="app_icons"
                                                         src="<?php echo base_url() ?>asset/images/Tests.png"
                                                         alt="reneta_icons">
                                    Tests<span class="pull-right glyphicon glyphicon-triangle-bottom"
                                               aria-hidden="true"></span></p>
                            </a>
                            <ul id="test0" class="collapse">
                                <?php if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2'||$this->session->userdata('user_type')=='3'){?>
                                <li><a href="<?php echo base_url() ?>test/create_test"><p class="app_small_text"><span
                                                class="glyphicon glyphicon-certificate"
                                                aria-hidden="true"></span> Create Test
                                        </p></a></li>
                                <?php }?>
                                <li><a href="<?php echo base_url() ?>test/result"><p class="app_small_text"><span
                                                class="glyphicon glyphicon-certificate"
                                                aria-hidden="true"></span> Results</p>
                                    </a></li>
                                <?php if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2'||$this->session->userdata('user_type')=='3'){?>
                                <li><a href="<?php echo base_url() ?>test/test_page"><p class="app_small_text"><span
                                                class="glyphicon glyphicon-certificate"
                                                aria-hidden="true"></span> Test page</p>
                                    </a></li>
                                <?php }?>
                            </ul>
                        </li>
                        <?php } else {?>
                            <li class=" appp">
                                <a href="javascript:;" data-toggle="collapse" data-target="#test0">
                                    <p class="app-text"><img class="app_icons"
                                                             src="<?php echo base_url() ?>asset/images/Tests.png"
                                                             alt="reneta_icons">
                                        Tests<span class="pull-right glyphicon glyphicon-triangle-bottom"
                                                   aria-hidden="true"></span></p>
                                </a>
                                <ul id="test0" class="collapse">
                                    <?php if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2'||$this->session->userdata('user_type')=='3'){?>
                                    <li><a href="<?php echo base_url() ?>test/create_test"><p class="app_small_text"><span
                                                    class="glyphicon glyphicon-certificate"
                                                    aria-hidden="true"></span> Create Test
                                            </p></a></li>
                                    <?php }?>
                                    <li><a href="<?php echo base_url() ?>test/result"><p class="app_small_text"><span
                                                    class="glyphicon glyphicon-certificate"
                                                    aria-hidden="true"></span> Results</p>
                                        </a></li>
                                    <?php if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2'||$this->session->userdata('user_type')=='3'){?>
                                    <li><a href="<?php echo base_url() ?>test/test_page"><p class="app_small_text"><span
                                                    class="glyphicon glyphicon-certificate"
                                                    aria-hidden="true"></span> Test page</p>
                                        </a></li>
                                    <?php }?>
                                </ul>
                            </li>
                        <?php }?>
                        <?php if($this->session->userdata('i')=='4'){?>
                        <?php if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2'||$this->session->userdata('user_type')=='3'){?>
                            <li class="active appp">
                                <a href="javascript:;" data-toggle="collapse" data-target="#target0">
                                    <p class="app-text"><img class="app_icons"
                                                             src="<?php echo base_url() ?>asset/images/Target.png"
                                                             alt="reneta_icons">
                                        Reneta Shop<span
                                            class="pull-right glyphicon glyphicon-triangle-bottom"
                                            aria-hidden="true"></span></p>
                                </a>
                                <ul id="target0" class="collapse">
                                    <li><a href="<?php echo base_url() ?>tar_shop/create_target"><p
                                                class="app_small_text"><span class="glyphicon glyphicon-certificate"
                                                                             aria-hidden="true"></span> Create Incentive</p>
                                        </a></li>
                                    <li><a href="<?php echo base_url() ?>tar_shop/manage_incentives"><p
                                                class="app_small_text"><span
                                                    class="glyphicon glyphicon-certificate" aria-hidden="true"></span>
                                                Manage Incentive</p></a></li>
                                    <li><a href="<?php echo base_url() ?>tar_shop/track_incentive"><p
                                                class="app_small_text"><span class="glyphicon glyphicon-certificate"
                                                                             aria-hidden="true"></span> Track
                                                Incentive</p></a></li>
                                </ul>
                            </li>
                        <?php }} else {?>
                        <?php if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2'||$this->session->userdata('user_type')=='3'){?>
                            <li class="appp">
                                <a href="javascript:;" data-toggle="collapse" data-target="#target0">
                                    <p class="app-text"><img class="app_icons"
                                                             src="<?php echo base_url() ?>asset/images/Target.png"
                                                             alt="reneta_icons">
                                        Reneta Shop<span
                                            class="pull-right glyphicon glyphicon-triangle-bottom"
                                            aria-hidden="true"></span></p>
                                </a>
                                <ul id="target0" class="collapse">
                                    <li><a href="<?php echo base_url() ?>tar_shop/create_target"><p
                                                class="app_small_text"><span class="glyphicon glyphicon-certificate"
                                                                             aria-hidden="true"></span> Create Incentive</p>
                                        </a></li>
                                    <li><a href="<?php echo base_url() ?>tar_shop/manage_incentives"><p
                                                class="app_small_text"><span
                                                    class="glyphicon glyphicon-certificate" aria-hidden="true"></span>
                                                Manage Incentive</p></a></li>
                                    <li><a href="<?php echo base_url() ?>tar_shop/track_incentive"><p
                                                class="app_small_text"><span class="glyphicon glyphicon-certificate"
                                                                             aria-hidden="true"></span> Track
                                                Incentive</p></a></li>
                                </ul>
                            </li>
                        <?php }}?>
                        <?php if($this->session->userdata('i')=='5'){?>
                        <?php if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2'){?>
                            <li class="active appp">
                                <a href="javascript:;" data-toggle="collapse" data-target="#pso0">
                                    <p class="app-text"><img class="app_icons"
                                                             src="<?php echo base_url() ?>asset/images/PSO.png"
                                                             alt="reneta_icons">
                                        PSO<span class="pull-right glyphicon glyphicon-triangle-bottom"
                                                 aria-hidden="true"></span></p>
                                </a>
                                <ul id="pso0" class="collapse">
                                    <li><a href="<?php echo base_url() ?>pso/add_pso"><p class="app_small_text"><span
                                                    class="glyphicon glyphicon-certificate"
                                                    aria-hidden="true"></span> Add PSO</p>
                                        </a></li>
                                    <li><a href="<?php echo base_url() ?>pso/manage_pso"><p class="app_small_text"><span
                                                    class="glyphicon glyphicon-certificate"
                                                    aria-hidden="true"></span> Manage PSO
                                            </p></a></li>
                                </ul>
                            </li>
                        <?php }} else {?>
                            <?php if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2'){?>
                                <li class="appp">
                                    <a href="javascript:;" data-toggle="collapse" data-target="#pso0">
                                        <p class="app-text"><img class="app_icons"
                                                                 src="<?php echo base_url() ?>asset/images/PSO.png"
                                                                 alt="reneta_icons">
                                            PSO<span class="pull-right glyphicon glyphicon-triangle-bottom"
                                                     aria-hidden="true"></span></p>
                                    </a>
                                    <ul id="pso0" class="collapse">
                                        <li><a href="<?php echo base_url() ?>pso/add_pso"><p class="app_small_text"><span
                                                        class="glyphicon glyphicon-certificate"
                                                        aria-hidden="true"></span> Add PSO</p>
                                            </a></li>
                                        <li><a href="<?php echo base_url() ?>pso/manage_pso"><p class="app_small_text"><span
                                                        class="glyphicon glyphicon-certificate"
                                                        aria-hidden="true"></span> Manage PSO
                                                </p></a></li>
                                    </ul>
                                </li>
                        <?php }}?>
                        <?php if($this->session->userdata('i')=='6'){?>
                        <?php if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2'){?>
                            <li class="active appp">
                                <a href="javascript:;" data-toggle="collapse" data-target="#user0">
                                    <p class="app-text"><img class="app_icons"
                                                             src="<?php echo base_url() ?>asset/images/PSO.png"
                                                             alt="reneta_icons">
                                        USER<span class="pull-right glyphicon glyphicon-triangle-bottom"
                                                 aria-hidden="true"></span></p>
                                </a>
                                <ul id="user0" class="collapse">
                                    <li><a href="<?php echo base_url() ?>user/create_user"><p class="app_small_text"><span
                                                    class="glyphicon glyphicon-certificate"
                                                    aria-hidden="true"></span> Add USER</p>
                                        </a></li>
                                    <li><a href="<?php echo base_url() ?>user/manage_user"><p class="app_small_text"><span
                                                    class="glyphicon glyphicon-certificate"
                                                    aria-hidden="true"></span> Manage USER
                                            </p></a></li>
                                </ul>
                            </li>
                        <?php }} else {?>
                            <?php if($this->session->userdata('user_type')=='1'||$this->session->userdata('user_type')=='2'){?>
                                <li class="appp">
                                    <a href="javascript:;" data-toggle="collapse" data-target="#user0">
                                        <p class="app-text"><img class="app_icons"
                                                                 src="<?php echo base_url() ?>asset/images/PSO.png"
                                                                 alt="reneta_icons">
                                            USER<span class="pull-right glyphicon glyphicon-triangle-bottom"
                                                      aria-hidden="true"></span></p>
                                    </a>
                                    <ul id="user0" class="collapse">
                                        <li><a href="<?php echo base_url() ?>user/create_user"><p class="app_small_text"><span
                                                        class="glyphicon glyphicon-certificate"
                                                        aria-hidden="true"></span> Add USER</p>
                                            </a></li>
                                        <li><a href="<?php echo base_url() ?>user/manage_user"><p class="app_small_text"><span
                                                        class="glyphicon glyphicon-certificate"
                                                        aria-hidden="true"></span> Manage USER
                                                </p></a></li>
                                    </ul>
                                </li>
                        <?php }}?>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>

            <div class="profile-insider container-fluid">
                <a href="#"><img src="<?php echo base_url() ?>asset/images/small-logo.png"
                                 class="small-logo center-block" alt="reneta logo"></a>
                <hr class="big_one">
                <hr class="small_one">
            </div>

            <div class="banner col-md-3 col-sm-3 col-xm-3">
                <div class="banner-icon">
                    <img class="center-block banner-icon-img" src="<?php echo base_url() ?>asset/images/Literature.png"
                         alt="">
                    <p class="text-center banner-text">Literature</p>
                    <h3 id="clit" class="clit text-center banner-text"><?php echo $tdrug['0']['total_d']?></h3>
                </div>
            </div>

            <div class="banner col-md-3 col-sm-3 col-xm-3">
                <div class="banner-icon">
                    <img class="center-block banner-icon-img" src="<?php echo base_url() ?>asset/images/PSO.png" alt="">
                    <p class="text-center banner-text"><strong>PSO</strong></p>
                    <h3 id="cpsos" class="cpsos text-center banner-text"><?php echo $tpso['0']['total_p']?></h3>
                </div>
            </div>

            <div class="banner col-md-3 col-sm-3 col-xm-3">
                <div class="banner-icon">
                    <img class="center-block banner-icon-img" src="<?php echo base_url() ?>asset/images/Test.png"
                         alt="">
                    <p class="text-center banner-text">Tests</p>
                    <h3 id="ctest" class="ctest text-center banner-text"><?php echo $texam['0']['total_e']?></h3>
                </div>
            </div>

            <div class="banner col-md-3 col-sm-3 col-xm-3">
                <div class="banner-icon">
                    <img class="center-block banner-icon-img" src="<?php echo base_url() ?>asset/images/Offers.png"
                         alt="">
                    <p class="text-center banner-text">Offers</p>
                    <h3 id="coffer" class="coffer text-center banner-text"><?php echo $tincentives['0']['total_i']?></h3>
                </div>
            </div>
        </div><!-- banner-wrapper -->


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>asset/js/app.js"></script>
        <script src="<?php echo base_url() ?>asset/js/date.js"></script>
        <script src="<?php echo base_url() ?>asset/js/chart.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.js"
                integrity="sha256-1qeNeAAFNi/g6PFChfXQfa6CQ8eXoHXreohinZsoJOQ=" crossorigin="anonymous"></script>

</body>
</html>


<script>

    var i = 0;
    var test_id;
    var o_p=0,r_p=0;


    //    setInterval("refresh_home();",5000);
    //
    //    function refresh_home() {
    //        $(".clit").load("<?php //echo base_url()?>//home/total_drug");
    //        $(".cpsos").load("<?php //echo base_url()?>//home/total_pso");
    //        $(".ctest").load("<?php //echo base_url()?>//home/total_exam");
    //        $(".coffer").load("<?php //echo base_url()?>//home/total_incentives");
    //    }
    //
    //    function delete_pso_exams() {
    //        var check = confirm('Are You Sure To Delete Pso all Exam ??');
    //        if (check) {
    //            return true;
    //        }
    //        else {
    //            return false;
    //        }
    //    }

    function delete_exam() {
        var check = confirm('Are You Sure To Delete This Exam\nIf you delete this PSO exam will delete ??');
        if (check) {
            return true;
        }
        else {
            return false;
        }
    }
    function delete_incentive() {
        var check = confirm('Are You Sure To Delete This Incentives?\nIf you delete this then this incentives transaction will delete');
        if (check) {
            return true;
        }
        else {
            return false;
        }
    }

    function district(division_id) {
        $.ajax(
            {
                type: 'POST',
                data: {division_id: division_id},
                url: '<?php echo site_url('find/find_district')?>',
                success: function (result) {
                    $('.district').html(result);
                },
                error: function (result) {
                    alert('POST failed.');
                }
            }
        )
    }
    function region(district_id) {
        $.ajax(
            {
                type: 'POST',
                data: {district_id: district_id},
                url: '<?php echo site_url('find/find_region')?>',
                success: function (result) {
                    $('.region').html(result);
                },
                error: function (result) {
                    alert('POST failed.');
                }
            }
        )
    }
    function update_password() {
        var check = confirm('Are you sure to update the password?');
        if (check) {
            return true;
        }
        else {
            return false;
        }
    }
    function delete_account() {
        var check = confirm('Are You Sure To Delete Pso Account!!!');
        if (check) {
            return true;
        }
        else {
            return false;
        }
    }
    function delete_med() {
        var check = confirm('Are You Sure To Delete This!!!');
        if (check) {
            return true;
        }
        else {
            return false;
        }
    }
    function delete_version() {
        var check = confirm('Are You Sure To Delete This Version!!!');
        if (check) {
            return true;
        }
        else {
            return false;
        }
    }
    function delete_question() {
        var check = confirm('Are You Sure To Delete This Question!!!');
        if (check) {
            return true;
        }
        else {
            return false;
        }
    }
    function approve_transaction() {
        var check = confirm('Are You Sure To Purchase this Incentive!!!');
        if (check) {
            return true;
        }
        else {
            return false;
        }
    }

    function change() {

        var elems = document.getElementsByClassName("change");
        for (var i = 0; i < elems.length; i++) {
            elems[i].disabled = false;
        }
        document.getElementById('image').type = 'file';
        document.getElementById('submit').type = 'submit';
    }

    function hidee() {

        if (document.getElementById('hh1').style.visibility == 'hidden') {
            document.getElementById('hh1').style.visibility = 'visible';
            document.getElementById('hh2').style.visibility = 'visible';
        }
        else {
            document.getElementById('hh1').style.visibility = 'hidden';
            document.getElementById('hh2').style.visibility = 'hidden';
        }

    }

    var drug_idd;
    var drug_idd2;
    var upload_type;
    var doc_typee;
    function drug_list(gen_id, result) {
        $.ajax(
            {
                type: 'POST',
                data: {gen_id: gen_id},
                url: '<?php echo site_url('find/find_drugs')?>',
                success: function (result) {
                    $('.drug').html(result);
                },
                error: function (result) {
                    alert('POST failed.');
                }
            }
        )
    }
    function drug_list2(gen_id, result) {
        $.ajax(
            {
                type: 'POST',
                data: {gen_id: gen_id},
                url: '<?php echo site_url('find/find_drugs')?>',
                success: function (result) {
                    $('.doc_type,.version').val('-1');
                    $('.drug_audio,.point1,.point2,.point3,.audio1,.audio2,.audio3,.drug_des_image').val('');
                    document.getElementById('files1').innerHTML='';
                    document.getElementById('version_delete').style.visibility='hidden';
                    $('.drug2').html(result);
                },
                error: function (result) {
                    alert('POST failed.');
                }
            }
        )
    }
    function drug_no(drug_id) {
        drug_idd = drug_id;
    }
    function drug_no1(drug_id) {
        $('.doc_type,.version').val('-1');
        $('.drug_audio,.point1,.point2,.point3,.audio1,.audio2,.audio3,.drug_des_image').val('');
        document.getElementById('files1').innerHTML='';
        document.getElementById('version_delete').style.visibility='hidden';
        drug_idd = drug_id;
    }

    function version_find(doc_type, result) {
        doc_typee = doc_type;
        $.ajax(
            {
                type: 'POST',
                data: {doc_type: doc_type, drug_id: drug_idd},
                url: '<?php echo site_url('find/find_version')?>',
                success: function (result) {
                    $('.version').val('-1');
                    $('.drug_audio,.point1,.point2,.point3,.audio1,.audio2,.audio3,.drug_des_image').val('');
                    document.getElementById('files1').innerHTML='';
                    document.getElementById('version_delete').style.visibility='hidden';
                    $('#version').html(result);
                },
                error: function (result) {
                    alert('POST failed.');
                }
            }
        )
    }

    function fill_data(version_id) {
        version_id = version_id;
        if (version_id != '0' && version_id != '-1') {
            $.ajax({
                url: '<?php echo site_url('find/find_version_data')?>',
                type: "POST",
                dataType: 'json',
                data: {version_id: version_id},
                success: function (data) {
                    var id = data[0]['detail_version_id'];
                    var version = data[0]['version_id'];
                    if(version!='1')
                    {
                        document.getElementById('drug_audio_logo').style.visibility='hidden';

                    }
                    else
                    {
                        document.getElementById('drug_audio_logo').style.visibility='visible';
                    }
                    var point1 = data[0]['point1'].replace('<?php echo base_url()?>'+'upload/drug_des_files/','');
                    var point2 = data[0]['point2'].replace('<?php echo base_url()?>'+'upload/drug_des_files/','');
                    var point3 = data[0]['point3'].replace('<?php echo base_url()?>'+'upload/drug_des_files/','');
                    var audio1 = data[0]['audio1'].replace('<?php echo base_url()?>'+'upload/drug_des_files/','');
                    var audio2 = data[0]['audio2'].replace('<?php echo base_url()?>'+'upload/drug_des_files/','');
                    var audio3 = data[0]['audio3'].replace('<?php echo base_url()?>'+'upload/drug_des_files/','');
                    var drug_audio = data[0]['drug_name_audio'].replace('<?php echo base_url()?>'+'upload/drug_des_files/','');
                    var drug_image = data[0]['drug_detail_image'].replace('<?php echo base_url()?>'+'upload/drug_des_files/','');
                    var all = '1. Drug Audio: ' + drug_audio + '<br>' + '2.Point 1 audio: ' + audio1 + '<br>' + '3.Point 2 audio: ' + audio2 + '<br>' + '4.Point 3 audio: ' + audio3 + '<br>' + '5. Drug Image: ' + drug_image;
                    $('#ver_id').val(id);
                    $('#point1').val(point1);
                    $('#point2').val(point2);
                    $('#point3').val(point3);
                    $('#files1').html(all);
                    $('#audio1_test').val(data[0]['audio1']);
                    $('#audio2_test').val(data[0]['audio2']);
                    $('#audio3_test').val(data[0]['audio3']);
                    $('#drug_audio_test').val(data[0]['drug_name_audio']);
                    $('#image_test').val(data[0]['drug_detail_image']);
                    $("#version_delete").attr("href", "<?php echo base_url()?>medicine_literature/delete_version?version_id="+id);
                    document.getElementById('version_delete').style.visibility='visible';
                },
                error: function (result) {
                    alert('POST failed.');
                }
            })
        }
        if (version_id == '0') {
            if($('.doc_type').val()=='-1'||$('.drug2').val()=='-1')
            {
                alert("Please Select Drug Name And Doc Type");
            }
            else
            {
                if (confirm('Are you sure you want a new version?')) {
                    $('#point1').val('');
                    $('#point2').val('');
                    $('#point3').val('');
                    $('#audio1_test').val('');
                    $('#audio2_test').val('');
                    $('#audio3_test').val('');
                    $('#drug_audio_test').val('');
                    $('#image_test').val('');
                    $('#files1').html('');
                    $.ajax(
                        {
                            type: 'POST',
                            dataType: 'json',
                            data: {doc_type: doc_typee, drug_id: drug_idd},
                            url: '<?php echo site_url('find/add_new_version')?>',
                            success: function (data) {
                                $('#ver_id').val(data[0]['detail_version_id']);
                                $('#drug_audio_test').val(data[0]['drug_name_audio']);
                            },
                            error: function (result) {
                                alert('POST failed.');
                            }
                        }
                    )
                }
            }
        }
        if (version_id == '-1') {
            $('#point1').val('');
            $('#point2').val('');
            $('#point3').val('');
            $('#audio1_test').val('');
            $('#audio2_test').val('');
            $('#audio3_test').val('');
            $('#drug_audio_test').val('');
            $('#image_test').val('');
            $('#files1').html('');
        }
    }

    function drug_no2(drug_id) {
        drug_idd2 = drug_id;
        var d_id = drug_id;
        $.ajax(
            {
                type: 'POST',
                data: {drug_id: d_id},
                url: '<?php echo site_url('find_drug/find_drug_des')?>',
                success: function (result) {
                    $('.views').html(result);
                },
                error: function (result) {
                    alert('POST failed.');
                }
            }
        )

    }
    function drug_des(upload_file_type, result) {
        upload_type = upload_file_type;
        $.ajax(
            {

                type: 'POST',
                data: {type: upload_file_type, drug_id: drug_idd},
                url: '<?php echo site_url('find/find_file')?>',
                success: function (result) {
                    $('#typee').html(result);
                },
                error: function (result) {
                    alert('POST failed.');
                }
            }
        )
    }

    function check_upload_drug_des() {

        if ($('#drug').val() == '-1') {
            alert("Please Select Drug");
            return false;
        }
        else if ($('#type').val() == '-1') {
            alert("Please Select Type");
            return false;
        }
        else if ($('#pdf').val() == '') {
            alert("Please Select a File");
            return false;
        }
        else {
            return true;
        }
    }


    function add_ques() {
        var test_name = $('.test_name').val();
        var test_suggestion = $('.test_suggestion').val();
        var test_type = $('.test_type').val();
        var test_marks = $('.test_marks').val();
        var pass_marks = $('.pass_marks').val();
        var test_time = $('.test_time').val();
        var ques = $('.ques').val();
        var op1 = $('.option1').val();
        var op2 = $('.option2').val();
        var op3 = $('.option3').val();
        var op4 = $('.option4').val();
        var ans = $('.ans').val();

        if(pass_marks=='-1')
        {
            pass_marks=50;
        }

        if (test_name == '') {
            alert('Please fill up the test name')
        }
        else if (test_suggestion == '') {
            alert('Please fill up the test suggestion')
        }
        else if (test_type == '') {
            alert('Please fill up the test type')
        }
        else if (test_time == '') {
            alert('Please fill up the test time')
        }
        else if (test_marks == '') {
            alert('Please fill up the test marks')
        }
        else if (ques == '') {
            alert("Please Fill up the question");
        }
        else if (op1 == '') {
            alert("Please Fill up option 1");
        }
        else if (op2 == '') {
            alert("Please Fill up option 2");
        }
        else if (op3 == '') {
            alert("Please Fill up option 3");
        }
        else if (op4 == '') {
            alert("Please Fill up option 4");
        }
        else if (ans == '-1') {
            alert("Please select answer");
        }
        else {
            i++;
            document.getElementById('qus_no').innerHTML = i;
            $('.ques').val('');
            $('.option1').val('');
            $('.option2').val('');
            $('.option3').val('');
            $('.option4').val('');
            $('.ans').val('-1');

            if (i == 1) {
                $.ajax(
                    {
                        type: 'POST',
                        data: {test_name: test_name,test_suggestion:test_suggestion,test_time:test_time,test_marks:test_marks,pass_marks:pass_marks,test_type: test_type,ques: ques, op1: op1, op2: op2, op3: op3, op4: op4, ans: ans},
                        url: '<?php echo site_url('test/make_test')?>',
                        success: function (result) {
                            test_id=result.substr(0,result.indexOf('<'));
                            $('#test_id').val(test_id);
                        },
                        error: function (result) {
                            alert(result);
                        }
                    }
                )
            }
            else
            {
                $.ajax({
                    type: 'POST',
                    data: {test_name:test_name,ques: ques, op1: op1, op2: op2, op3: op3, op4: op4, ans: ans, test_id: test_id},
                    url: '<?php echo site_url('test/upload_ques')?>',
                    success: function (data) {
                        var bb = data;
                    },
                    error: function (result) {
                        alert('POST failed.');
                    }
                });
            }
        }
    }
    function up_ques() {
        if($('.test_time').val()<=0)
        {
            alert('Test Time Should Be Grater Then 59 sec');
            return false;
        }
        else if($('.test_marks').val()<=0)
        {
            alert('Test Marks Should Be Grater Then 0');
            return false;
        }
        else if(i<1)
        {
            alert('Please Insert Question');
            return false;
        }
        else
        {
            return true;
        }
    }
    function up_ques2() {
        if($('.test_time').val()<=0)
        {
            alert('Test Time Should Be Grater Then 59 sec');
            return false;
        }
        else if($('.test_marks').val()<=0)
        {
            alert('Test Marks Should Be Grater Then 0');
            return false;
        }
        else
        {
            return true;
        }
    }

    function check_password() {
        var pass=$('#current_p').val();
        var login_id2=$('#login_id2').val();
        var check;
        $.ajax({
            type:'POST',
            data:{pass:pass,id:login_id2},
            url:'<?php echo site_url('settings/check_pass')?>',
            success:function (result) {
                check=result.substr(0,result.indexOf('<'));
                if(check==login_id2)
                {
                    document.getElementById("wrong_p").style.display = "none";
                    document.getElementById("correct_p").style.display = "block";
                    o_p=1;
                }
                else
                {
                    document.getElementById("wrong_p").style.display = "block";
                    document.getElementById("correct_p").style.display = "none";
                    o_p=0;
                }
            },
            error:function (result) {
                alert(result);
            }
        })
    }

    function pass_match() {
        var npass=$('#new_p').val();
        var rpass=$('#repeat_p').val();
        if(npass==rpass)
        {
            document.getElementById("r_wrong_p").style.display = "none";
            document.getElementById("r_correct_p").style.display = "block";
            r_p=1;
        }
        else
        {
            document.getElementById("r_wrong_p").style.display = "block";
            document.getElementById("r_correct_p").style.display = "none";
            r_p=0;
        }
    }
    function change_password() {
        if(o_p==0)
        {
            alert('Provide Current Password');
            return false;
        }
        else if(r_p==0)
        {
            alert("Repeat Password won't match");
            return false;
        }
        else
        {
            return true;
        }
    }

    function user_typee() {
        var type=$('#user_type').val();
        if(type==4)
        {
            document.getElementById('sm_code').style.display="block";
            document.getElementById('rsm_code').style.display="none";
            document.getElementById('dsm_code').style.display="none";
            document.getElementById('depot_code').style.display="block";
            document.getElementById('business_code').style.display="block";
        }
        else if(type==5)
        {
            document.getElementById('sm_code').style.display="block";
            document.getElementById('rsm_code').style.display="block";
            document.getElementById('dsm_code').style.display="none";
            document.getElementById('depot_code').style.display="block";
            document.getElementById('business_code').style.display="block";
        }
        else if(type==6)
        {
            document.getElementById('sm_code').style.display="none";
            document.getElementById('rsm_code').style.display="block";
            document.getElementById('dsm_code').style.display="block";
            document.getElementById('depot_code').style.display="block";
            document.getElementById('business_code').style.display="block";
        }
        else
        {
            document.getElementById('sm_code').style.display="none";
            document.getElementById('rsm_code').style.display="none";
            document.getElementById('dsm_code').style.display="none";
            document.getElementById('depot_code').style.display="none";
            document.getElementById('business_code').style.display="none";
        }

    }

    function check_user() {
        var depot_code=$('#depot_code').val();
        var business_code=$('#business_code').val();
        var phone_number=$('.phone_number').val();

        if(phone_number<0&&phone_number.length()<11)
        {
            return false;
        }
        else if(depot_code==-1)
        {
            alert('Please Select Depot');
            return false;
        }
        else if(business_code==-1)
        {
            alert('Please Select Business');
            return false;
        }
        else
        {
            return true;
        }
    }
    function check_user_update() {

        var phone_number=$('.phone_number').val();

        if(phone_number.length<11)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
    function check_incentive() {
        var image=$('#shop_image').val();
        var point_needed=$('#point_needed').val();
        var quantity=$('#quantity').val();
        var offer_validity=$('#offer_validity').val();
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1;
        var yyyy = today.getFullYear();


        if(point_needed<0)
        {
            alert("Please Insert Positive Point");
            return false;
        }
        else if(quantity<0)
        {
            alert("Please Insert Positive Quantity");
            return false;
        }
        else if(image=='')
        {
            alert("Select Incentive Image");
            return false;
        }
        else
        {
            return true;
        }
    }

    function create_user() {
        var user_type=$('#user_type').val();
        var sm_code=$('#sm_code').val();
        var dsm_code=$('#dsm_code').val();
        var rsm_code=$('#rsm_code').val();
        var depot_code1=$('#depot_code').val();
        var business_code1=$('#business_code').val();
        if(user_type=='-1')
        {
            alert('Please Select User Type');
            return false;
        }
        else if(user_type!='-1')
        {
            if(user_type==4)
            {
                if(sm_code=='')
                {
                    alert('Please Insert Sales Manager Code');
                    return false;
                }
                else if(depot_code1==-1)
                {
                    alert('Please Select Depot');
                    return false;
                }
                else if(business_code1=='-1')
                {
                    alert('Please Select Business');
                    return false;
                }
            }
            else if(user_type==5)
            {
                if(rsm_code=='')
                {
                    alert('Please Insert Regional Sales Manager Code');
                    return false;
                }
                else if(sm_code=='')
                {
                    alert('Please Insert Sales Manager Code');
                    return false;
                }
                else if(depot_code1==-1)
                {
                    alert('Please Select Depot');
                    return false;
                }
                else if(business_code1=='-1')
                {
                    alert('Please Select Business');
                    return false;
                }
            }
            else if(user_type==6)
            {
                if(dsm_code=='')
                {
                    alert('Please Insert District Sales Manager Code');
                    return false;
                }
                else  if(rsm_code=='')
                {
                    alert('Please Insert Regional Sales Manager Code');
                    return false;
                }
                else if(depot_code1=='-1')
                {
                    alert('Please Select Depot');
                    return false;
                }
                else if(business_code1=='-1')
                {
                    alert('Please Select Business');
                    return false;
                }
            }
            else
            {
                return true;
            }
        }
    }

    function delete_user() {
        var check = confirm('Are you sure to delete this user');
        if (check) {
            return true;
        }
        else {
            return false;
        }
    }

    $(function () {
        $('#datetimepicker').datetimepicker({
            minDate:new Date()
        });
    });


    function find_exam_stat(exam_id) {

        
        $.ajax(
            {
                type: 'POST',
                url: '<?php echo site_url('find/find_exam_data')?>',
                dataType: 'json',
                data: {exam_id: exam_id},
                success: function (data) {

                    $('#pass').val(data['0']['tpass']);
                    $('#fail').val(data['0']['tfail']);
                    $('#attend').val(data['0']['tattend']);
                    $('#nattend').val(data['0']['tnattend']);
                    myChart.destroy();
                    myChart2.destroy();
                    Mychart(data['0']['tpass'],data['0']['tfail'],data['0']['tattend'],data['0']['tnattend']);
                },
                error: function (result) {
                    alert(result);
                }
            }
        )
    }


    function Mychart(a,b,c,d) {
        const CHART = document.getElementById("myChart");
        var myChart = new Chart(CHART,{
            type: 'pie',
            options:
            {
                tooltips:
                {
                    enabled: false
                }
            },
            data: data = {
                labels: [ "PASS: "+a, "FAIL: "+b],
                datasets:
                    [{
                        data: [a,b],
                        backgroundColor: [
                            "#5B5B95",
                            "#E94699"
                        ],

                        hoverBackgroundColor: [
                            "#5B5B95",
                            "#E94699"
                        ]
                    }]
            }
        });
        const CHART2 = document.getElementById("myChart2");
        var myChart2 = new Chart(CHART2,{
            type: 'pie',
            options:
            {
                tooltips:
                {
                    enabled: false
                }
            },
            data: data = {
                labels: ["EXAM ATTEND: "+c, "NOT ATTEND: "+d],
                datasets:
                    [{
                        data: [c, d],
                        backgroundColor: [
                            "#3580BE",
                            "#00BADA"
                        ],

                        hoverBackgroundColor: [
                            "#3580BE",
                            "#00BADA"
                        ]
                    }]
            }
        });
        myChart.update();
        myChart2.update();
    }
    

</script>