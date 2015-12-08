<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title><?php echo $pageTitle; ?></title>

    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css");?>"/>
    <link rel="stylesheet" href="<?php echo base_url("assets/font-awesome/4.2.0/css/font-awesome.min.css");?>" />

    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel="stylesheet" href="<?php echo base_url("assets/fonts/fonts.googleapis.com.css");?>" />

    <!-- ace styles -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/ace.min.css");?>" class="ace-main-stylesheet" id="main-ace-style" />
    <link rel="stylesheet" href="<?php echo base_url("assets/css/custom.css");?>" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/ace-part2.min.css");?>" class="ace-main-stylesheet" />
    <![endif]-->

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/ace-ie.min.css");?>" />
    <![endif]-->

    <?php
    if(isset($styleSheet)){
        foreach($styleSheet as $style){
            echo "<link rel=\"stylesheet\" href=\"$style\" class=\"ace-main-stylesheet\" />";
        }
    }
    ?>


    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="<?php echo base_url("assets/js/ace-extra.min.js");?>"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="<?php echo base_url("assets/js/html5shiv.min.js");?>"></script>
    <script src="<?php echo base_url("assets/js/respond.min.js");?>"></script>
    <![endif]-->
</head>
<body class="no-skin">