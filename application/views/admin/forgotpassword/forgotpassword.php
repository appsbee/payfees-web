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
  <title>Pay Fees - Login Admin</title>

  <!-- Favicons-->
  <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  
  <link href="<?php echo base_url("assets/css/materialize.css");?>" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url("assets/css/style.css");?>" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="<?php echo base_url("assets/css/custom-style.css");?>" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url("assets/css/page-center.css");?>" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="<?php echo base_url("assets/css/prism.css");?>" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url("assets/js/plugins/perfect-scrollbar/perfect-scrollbar.css");?>" type="text/css" rel="stylesheet" media="screen,projection">
  
</head>

<body class="cyan">
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->


<div class="col s12"><center><img src="<?php echo base_url("assets/images/materialize-logo.png");?>" class="responsive-img"></center></div>

 <?php echo form_open("admin/Forgotpassword/sendpassword"); ?>
  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form class="login-form">
        <div class="row">
        <div class="" style="text-align:center; height:50px; overflow: hidden;">
               
                <p style="color:red;text-align:center;"><?php echo $this->session->flashdata('invalid'); ?>
               
                 <p style="color:green;text-align:center;"><?php echo $this->session->flashdata('sucess'); ?>
      </div>
                
                
                
          <div class="input-field col s12 center" style="padding-top: 0;">
            <h4 style="margin-top: 0;">Forgot Password</h4>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <?php echo form_input("email", set_value("email"), array("id" => "username")); ?>
            
            <label for="username" class="center-align">Username</label>
          </div>
        </div>
       
        <div class="row">          
          
        </div>
        <div class="row">
          <div class="input-field col s12">
          
          <button type="submit" name="submit" value=""
               class="btn waves-effect waves-light col s12">
                <span class="bigger-110">Send Password</span>
             </button>
          
           <!-- <a href="page-blank.html" class="btn waves-effect waves-light col s12">Login</a> -->
          </div>
          <div class="input-field col s7 m7 l7">
              <p class="margin right-align medium-small"><a href="<?php echo site_url("admin/login");?>">Login</a></p>
          </div> 
        </div>
        <?php echo $this->session->error ?>
         <?php echo validation_errors(); ?>
         <?php echo form_close(); ?>
        <div class="row">
          <div class="input-field col s5 m5 l5">
         <!--   <p class="margin medium-small"><a href="page-blank.html">Register Now!</a></p> -->
          </div> 
                   
        </div>

      </form>
    </div>
  </div>
 


  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.11.2.min.js");?>"></script>
  <!--materialize js-->
  <script type="text/javascript" src="<?php echo base_url("assets/js/materialize.js");?>"></script>
  <!--prism-->
  <script type="text/javascript" src="<?php echo base_url("assets/js/prism.js");?>"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="<?php echo base_url("assets/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js");?>"></script>

  <!--plugins.js - Some Specific JS codes for Plugin Settings-->
  <script type="text/javascript" src="<?php echo base_url("assets/js/plugins.js");?>"></script>

</body>


</html>
