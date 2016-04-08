<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
  <title><?php echo $pageTitle; ?></title>

  <!-- Favicons-->
  <link rel="icon" href="<?php echo base_url("assets/images/favicon/favicon-32x32.png"); ?>" sizes="32x32">
  <!-- Favicons-->
<!--   <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
 <!--  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  For Windows Phone -->


  <!-- CORE CSS-->

  <link href="<?php echo base_url("assets/css/materialize.css"); ?>" type="text/css" rel="stylesheet" media="screen,projection">



  <link href="<?php echo base_url("assets/css/style.css"); ?>" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->
    <link href="<?php echo base_url("assets/css/custom-style.css"); ?>" type="text/css" rel="stylesheet" media="screen,projection">


  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="<?php echo base_url("assets/css/prism.css"); ?>" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url("assets/js/plugins/perfect-scrollbar/perfect-scrollbar.css"); ?>" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url("assets/js/plugins/chartist-js/chartist.min.css"); ?>" type="text/css" rel="stylesheet" media="screen,projection">
      <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.11.2.min.js"); ?>"></script>
</head>

<body>
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START HEADER -->
  <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="cyan">
                <div class="nav-wrapper">

                    <ul class="left">
                      <li><h1 class="logo-wrapper"><a href="#" class="brand-logo darken-1"><img src="<?php echo base_url("assets/images/materialize-logo.png"); ?>" alt="materialize logo"></a> <span class="logo-text">Materialize</span></h1></li>
                    </ul>
                    <div class="header-search-wrapper hide-on-med-and-down">
                        <i class="mdi-action-search"></i>
                        <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Pay Fees"/>
                    </div>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a>
                        </li>
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light"><i class="mdi-navigation-apps"></i></a>
                        </li>
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light"><i class="mdi-social-notifications"></i></a>
                        </li>
                        <li><a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse"><i class="mdi-communication-chat"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- end header nav-->
  </header>
  <!-- END HEADER -->
