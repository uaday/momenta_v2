<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asset/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asset/css/login1.css">
    <link rel="icon" href="<?php echo base_url() ?>/asset/images/Logo.png" type="image/x-icon">
    <title>Renata login</title>
    <style>
    </style>
</head>

<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <img class="reneta_logo center-block" src="<?php echo base_url() ?>asset/images/Logo.png" alt="RENETA-LOGO">
            <div class="header_content">
                <div class="bar1 pull-left"></div>
                <h1 class="pull-left"> Login</h1>
                <div class="bar1 pull-left"></div>
            </div>
            <div class="form_content center-block">
                <form action="login/login_check" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="renata_id" name="renata_id" placeholder="Renata Employee Id" required="required">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="pwd" name="password" placeholder=" Password" required="required">
                    </div>
                    <button type="submit" class="btn btn-primary login_btn" name="btn">Login</button>
                </form>

                <a href="<?php echo base_url() ?>login/forgot_password" class="forgot_password center-block">forgot your
                    password?</a>

            </div>
        </div>
        <div class="right_reserved center-block">
            <p>©2016 All Rights Reserved by Renata Limited</p>
        </div>
    </div>
</div>

<?php if($this->session->userdata('message')=='Invalid User Name/Password!!!'){?>
    <script>
        alert("Invalid User Name/Password!!!");
    </script>
<?php }else if($this->session->userdata('message')=='Your account is Deactivated!!!'){?>
    <script>
        alert("Your account is Deactivated!!!");
    </script>
<?php } else if($this->session->userdata('message')=='Please Fill out the form'){?>
    <script>
        alert("Please Fill out the form");
    </script>
<?php }
$this->session->unset_userdata("message");
//$this->session->sess_destroy();
?>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>       -->
</body>

</html>