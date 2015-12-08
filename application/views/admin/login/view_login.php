<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="utf-8"/>
    <title>Pay Fees - Login Admin</title>

    <meta name="description" content="User login page"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url("assets/font-awesome/4.2.0/css/font-awesome.min.css"); ?>"/>

    <!-- text fonts -->
    <link rel="stylesheet" href="<?php echo base_url("assets/fonts/fonts.googleapis.com.css"); ?>"/>

    <!-- ace styles -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/ace.min.css"); ?>"/>

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="<?php echo base_url(" assets/css/ace-part2.min.css");?> "  />
    <![endif]-->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/ace-rtl.min.css"); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/custom.css"); ?>"/>

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="<?php echo base_url(" assets/css/ace-ie.min.css");?>"/>
    <![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
    <script src="<?php echo base_url("assets/js/html5shiv.min.js");?> "></script>
    <script src = "<?php echo base_url("assets / js / respond.min.js");?>" ></script>
    <![endif]-->
</head>

<body class="login-layout">
<div class="main-container">
    <div class="main-content">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="login-container">
                    <div class="center">
                        <h1>
                            <i class="ace-icon fa fa-leaf green"></i>
                            <span class="red">Student</span>
                            <span class="white" id="id-text2">Management</span>
                        </h1>
                        <!--<h4 class="blue" id="id-company-text">&copy; Company Name</h4>-->
                    </div>

                    <div class="space-6"></div>

                    <div class="position-relative">
                        <div id="login-box" class="login-box visible widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header blue lighter bigger">
                                        <i class="ace-icon fa fa-coffee green"></i>
                                        Please Enter Your Information
                                    </h4>

                                    <div class="space-6"></div>

                                    <?php echo form_open("admin/login/"); ?>
                                    <fieldset>
                                        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
                                                            <?php echo form_input("email", set_value("email"), array("class" => "form-control", "placeholder" => "Email")); ?>
                                                            <i class="ace-icon fa fa-user"></i>
														</span>
                                        </label>

                                        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
                                                            <?php echo form_password("password", "", array("class" => "form-control", "placeholder" => "Password")); ?>
                                                            <i class="ace-icon fa fa-lock"></i>
														</span>
                                        </label>

                                        <div class="space"></div>

                                        <div class="clearfix">
                                            <button type="submit" name="submit" value="login"
                                                    class="width-35 pull-right btn btn-sm btn-primary">
                                                <i class="ace-icon fa fa-key"></i>
                                                <span class="bigger-110">Login</span>
                                            </button>
                                        </div>

                                        <div class="space-4"></div>
                                    </fieldset>
                                    <?php echo $this->session->error ?>
                                    <?php echo validation_errors(); ?>
                                    <?php echo form_close(); ?>

                                    <!--<div class="social-or-login center">
                                        <span class="bigger-110">Or Login Using</span>
                                    </div>

                                    <div class="space-6"></div>

                                    <div class="social-login center">
                                        <a class="btn btn-primary">
                                            <i class="ace-icon fa fa-facebook"></i>
                                        </a>

                                        <a class="btn btn-info">
                                            <i class="ace-icon fa fa-twitter"></i>
                                        </a>

                                        <a class="btn btn-danger">
                                            <i class="ace-icon fa fa-google-plus"></i>
                                        </a>
                                    </div>-->
                                </div><!-- /.widget-main -->

                            </div><!-- /.widget-body -->
                        </div><!-- /.login-box -->


                    </div><!-- /.position-relative -->

                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.main-content -->
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="<?php echo base_url("assets/js/jquery.2.1.1.min.js"); ?>"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="<?php echo base_url(" assets/js/jquery.1.11.1.min.js"); ?> "></script>
<![endif]-->

<!--[if !IE]> -->
<script type="text/javascript">
    window.jQuery || document.write("<script src='<?php echo base_url("assets/js/jquery.min.js");?>'>" + "<" + "/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='<?php echo base_url("
    assets / js / jquery1x.min.js
    ");?>'>" + "<" + "/script>"
    )
    ;
</script>
<![endif]-->
<script type="text/javascript">
    if ('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url("assets/js/jquery.mobile.custom.min.js");?>'>" + "<" + "/script>");
</script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function ($) {
        $(document).on('click', '.toolbar a[data-target]', function (e) {
            e.preventDefault();
            var target = $(this).data('target');
            $('.widget-box.visible').removeClass('visible');//hide others
            $(target).addClass('visible');//show target
        });
    });


    //you don't need this, just used for changing background
    jQuery(function ($) {
        $('#btn-login-dark').on('click', function (e) {
            $('body').attr('class', 'login-layout');
            $('#id-text2').attr('class', 'white');
            $('#id-company-text').attr('class', 'blue');

            e.preventDefault();
        });
        $('#btn-login-light').on('click', function (e) {
            $('body').attr('class', 'login-layout light-login');
            $('#id-text2').attr('class', 'grey');
            $('#id-company-text').attr('class', 'blue');

            e.preventDefault();
        });
        $('#btn-login-blur').on('click', function (e) {
            $('body').attr('class', 'login-layout blur-login');
            $('#id-text2').attr('class', 'white');
            $('#id-company-text').attr('class', 'light-blue');

            e.preventDefault();
        });

    });
</script>
</body>
</html>
