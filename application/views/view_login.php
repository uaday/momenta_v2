<?php
/**
 * Created by PhpStorm.
 * User: Sudipta
 * Date: 9/29/2017
 * Time: 2:53 AM
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Xenon Boostrap Admin Panel" />
    <meta name="author" content="" />

    <title>Momenta - Login</title>

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/fonts/linecons/css/linecons.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/xenon-core.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/xenon-forms.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/xenon-components.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/xenon-skins.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/custom.css">

    <script src="<?php echo base_url()?>assets/js/jquery-1.11.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body class="page-body login-page login-light" style="background-image: url(<?= base_url()?>assets/images/bg.jpg); background-position: center; background-repeat: no-repeat; background-size: cover;">


<div class="login-container" >

    <div class="row">

        <div class="col-sm-6">

            <script type="text/javascript">
                jQuery(document).ready(function($)
                {
                    // Reveal Login form
                    setTimeout(function(){ $(".fade-in-effect").addClass('in'); }, 1);


                    // Validation and Ajax action
                    $("form#login").validate({
                        rules: {
                            userid: {
                                required: true
                            },

                            passwd: {
                                required: true
                            }
                        },

                        messages: {
                            userid: {
                                required: 'Please enter your user ID.'
                            },

                            passwd: {
                                required: 'Please enter your password.'
                            }
                        },

                        // Form Processing via AJAX
                        submitHandler: function(form)
                        {
                            show_loading_bar(70); // Fill progress bar to 70% (just a given value)

                            var opts = {
                                "closeButton": true,
                                "debug": false,
                                "positionClass": "toast-top-full-width",
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            };

                            $.ajax({
                                method: 'POST',
                                dataType: 'json',
                                url: "<?php echo site_url('login/login_check') ?>",
                                data: {
                                    do_login: true,
                                    userid: $(form).find('#userid').val(),
                                    passwd: $(form).find('#passwd').val(),
                                },
                                success: function(resp)
                                {

                                    show_loading_bar({
                                        delay: .5,
                                        pct: 100,
                                        finish: function(){

                                            // Redirect after successful login page (when progress bar reaches 100%)
                                            if(resp.accessGranted)
                                            {
                                                window.location.href = '<?php echo base_url()?>home';
                                            }
                                            else if(resp.changePassword)
                                            {
                                                window.location.href = '<?php echo base_url()?>change_password';
                                            }
                                            else
                                            {
                                                toastr.error(resp.errors, "", opts);
                                                $passwd.select();
                                            }
                                        }
                                    });

                                }
                            });

                        }
                    });

                    // Set Form focus
                    $("form#login .form-group:has(.form-control):first .form-control").focus();
                });
            </script>

            <!-- Errors container -->
            <div class="errors-container">


            </div>

            <!-- Add class "fade-in-effect" for login form effect -->
            <form method="post" role="form" id="login" class="login-form fade-in-effect">

                <div class="login-header">
                    <a href="dashboard-1.html" class="logo">
                        <img src="<?php echo base_url()?>assets/images/logo-white-bg.png" alt="" width="80" />
                        <span>log in</span>
                    </a>

                    <p>Dear user, log in to access the admin area!</p>
                </div>


                <div class="form-group">
                    <label class="control-label" for="userid">User ID</label>
                    <input type="text" class="form-control " name="userid" id="userid" autocomplete="off" />
                </div>

                <div class="form-group">
                    <label class="control-label" for="passwd">Password</label>
                    <input type="password" class="form-control " name="passwd" id="passwd" autocomplete="off" />
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block text-left">
                        <i class="fa-lock"></i>
                        Log In
                    </button>
                </div>

                <div class="login-footer">
                    <a href="#">Forgot your password?</a>

                    <div class="info-links">
                        <p >&copy; <?php echo date("Y")?> Renata Limited. All Rights Reserved. Designed and Developed by <a target="_blank" style="text-decoration: none; " href="http://www.appinionbd.com/"> Appinion BD Limited.</a></p>
                    </div>

                </div>

            </form>

        </div>

    </div>

</div>



<!-- Bottom Scripts -->
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/js/TweenMax.min.js"></script>
<script src="<?php echo base_url()?>assets/js/resizeable.js"></script>
<script src="<?php echo base_url()?>assets/js/joinable.js"></script>
<script src="<?php echo base_url()?>assets/js/xenon-api.js"></script>
<script src="<?php echo base_url()?>assets/js/xenon-toggles.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-validate/jquery.validate.min.js"></script>
<script src="<?php echo base_url()?>assets/js/toastr/toastr.min.js"></script>


<!-- JavaScripts initializations and stuff -->
<script src="<?php echo base_url()?>assets/js/xenon-custom.js"></script>

</body>
</html>
