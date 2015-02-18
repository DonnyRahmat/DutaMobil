<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- <link rel="icon" href="<?php echo base_url() ?>assets/images/BP Donny.png" /> -->
    <link href="<?php echo base_url() ?>assets/css/metro-bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/metro-bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/style_login.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/chosen.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/font-awesome.css" rel="stylesheet">


    <!-- Load JavaScript Libraries -->
    <script src="<?php echo base_url() ?>assets/js/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.widget.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.mousewheel.js "></script>
    <script src="<?php echo base_url() ?>assets/js/metro.min.js "></script>
    
    <!-- metro plugin -->
    <script src="<?php echo base_url() ?>assets/js/metro/metro-datepicker.js "></script>
    <script src="<?php echo base_url() ?>assets/js/metro/metro-dropdown.js "></script>


    <title>Login & Register Page</title>

</head>
<body class="metro">
<div class="container">

                <div class="mainbox">
                    <center>Now : </center>
                    <div class="times" data-blink="false" data-style-background="bg-darkGreen" data-role="times"></div>                
                    <div class="panel" data-role="panel">
                        <div class="panel-header bg-darkGreen fg-white">
                            <i class="fa fa-car fa-fw"></i> Login To <strong>MobilProject</strong>
                        </div>
                        <div class="panel-content">
                            <form action="<?php echo base_url('login/cek_login'); ?>" method="post">
                                <fieldset>

                                    <label><i class="fa fa-child fa-fw"></i> Username </label>
                                    <div class="input-control text">
                                        <input type="text" name="username" required autofocus>
                                        <button class="btn-clear"></button>
                                    </div>

                                    <label><i class="fa fa-key fa-fw"></i> Password</label>
                                    <div class="input-control password" data-role="input-control">
                                        <input type="password" name="password" autofocus="" required>
                                        <button class="btn-reveal" tabindex="-1" type="button"></button>
                                    </div>

                                    <input value="Login" type="submit" name="submit" id="login">

                                </fieldset>
                            </form>
                        </div>
                    </div>                    
                </div>
</div>
</body>
</html>