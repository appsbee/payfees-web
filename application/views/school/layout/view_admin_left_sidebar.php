<?php

defined('BASEPATH') OR exit('No direct script access allowed');?>

  <!-- START MAIN -->
  <div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

      <!-- START LEFT SIDEBAR NAV-->
       <aside id="left-sidebar-nav">
                <ul id="slide-out" class="side-nav fixed leftside-navigation">
                    <li class="user-details cyan darken-2">
                        <div class="row">
                            <div class="col col s4 m4 l4">



                            <?php

if ($this->session->school_logo) {
	$logourl = base_url() . 'uploads/thumble/' . $this->session->school_logo;
} else {
	$logourl = base_url() . 'images/images.jpg';

}
?>
<img id="" src="<?php echo $logourl; ?>" alt="Smiley face" class="circle responsive-img valign profile-image">
<!--
                                <img src="<?php echo base_url("assets/images/avatar.jpg"); ?>" alt="" class="circle responsive-img valign profile-image"> -->
                            </div>
                            <div class="col col s8 m8 l8">
                                <ul id="profile-dropdown" class="dropdown-content">
                                   <!-- <li><a href="#"><i class="mdi-action-face-unlock"></i> Profile</a>
                                    </li>
                                    <li><a href="#"><i class="mdi-action-settings"></i> Settings</a>
                                    </li>
                                    <li><a href="#"><i class="mdi-communication-live-help"></i> Help</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="mdi-action-lock-outline"></i> Lock</a>
                                    </li> -->
                                    <li><a href="<?php echo site_url("school/logout"); ?>"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                                    </li>
                                </ul>
                                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">	<?php echo $this->session->school_email; ?><i class="mdi-navigation-arrow-drop-down right"></i></a>
                                <p class="user-roal">Welcome</p>
                            </div>
                        </div>
                    </li>
                    <li class="bold active"><a href="<?php echo site_url("school/dashboard"); ?>" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a>
                    </li>


                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">

                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-editor-attach-money"></i>Fees Management </a>
                                <div class="collapsible-body">
                                    <ul>
                                         <li class=""> <a href="<?php echo site_url('school/Addfee/addfee') ?>"> <i class="menu-icon fa fa-caret-right"></i> Add Fee </a> <b class="arrow"></b> </li>
              <li class=""> <a href="<?php echo site_url('school/Addfee/transportfee') ?>"> <i class="menu-icon fa fa-caret-right"></i> Transport Fee </a> <b class="arrow"></b> </li>
              <li class=""> <a href="<?php echo site_url('school/Addfee/editfee') ?>"> <i class="menu-icon fa fa-caret-right"></i> Edit Fee </a> <b class="arrow"></b> </li>
              <li class=""> <a href="<?php echo site_url('school/Addfee/edittransportfee') ?>"> <i class="menu-icon fa fa-caret-right"></i> Edit Transport Fee </a> <b class="arrow"></b> </li>
                                    </ul>
                                </div>
                            </li>


                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-social-school"></i>Student Management </a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?php echo site_url('school/Studentmanagement/uploadstudent') ?>">Upload Student  </a>
                                        </li>
                                        <li><a href="css-icons.html">View Student </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                             <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-account-child"></i>User Management </a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?php echo site_url('school/Usermanagement/') ?>">Add User  </a>
                                        </li>
                                       <li><a href="<?php echo site_url('school/Usermanagement/assignteacher') ?>">Assign Teacher  </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>


                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-social-school"></i>Payment </a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?php echo site_url('school/Payment/upload_payment') ?>">Upload Payment  </a>
                                        </li>
                                        <li><a href="<?php echo site_url('school/Payment/view_payment') ?>">View Payment </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class=""><a href="<?php echo base_url("school/Composemessage"); ?>" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Compose Message</a>
                    </li>
                        </ul>
                    </li>



                </ul>
                <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
            </aside>
      <!-- END LEFT SIDEBAR NAV-->
