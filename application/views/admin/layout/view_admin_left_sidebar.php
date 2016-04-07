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
                                <img src="<?php echo base_url("assets/images/avatar.jpg");?>" alt="" class="circle responsive-img valign profile-image">
                            </div>
                            <div class="col col s8 m8 l8">
                                <ul id="profile-dropdown" class="dropdown-content">
                                    <li><a href="<?php echo site_url("admin/profile");?>"><i class="mdi-action-face-unlock"></i> Profile</a>
                                    </li>
                                 <!--   <li><a href="#"><i class="mdi-action-settings"></i> Settings</a>
                                    </li>
                                    <li><a href="#"><i class="mdi-communication-live-help"></i> Help</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="mdi-action-lock-outline"></i> Lock</a>
                                    </li> -->
                                    <li><a href="<?php echo site_url("admin/logout");?>"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                                    </li>
                                </ul>
                                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">	<?php echo $this->session->user_name; ?><i class="mdi-navigation-arrow-drop-down right"></i></a>
                                <p class="user-roal">Welcome</p>
                            </div>
                        </div>
                    </li>
                    <li class="bold active"><a href="<?php echo site_url("admin/dashboard"); ?>" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a>
                    </li>
                    
                    
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-account-balance-wallet"></i> School Management </a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?php echo site_url("admin/school-management/create");?>">Create School  </a>
                                        </li>                                        
                                        <li><a href="<?php echo site_url("admin/school-management/view-all");?>">View All </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-editor-attach-money"></i>Fees Management </a>
                                <div class="collapsible-body">
                                    <ul>
                                         <li class=""> <a href="<?php echo site_url('admin/Addfee/addfee')?>"> <i class="menu-icon fa fa-caret-right"></i> Add Fee </a> <b class="arrow"></b> </li>
              <li class=""> <a href="<?php echo site_url('admin/Addfee/transportfee')?>"> <i class="menu-icon fa fa-caret-right"></i> Transport Fee </a> <b class="arrow"></b> </li>
              <li class=""> <a href="<?php echo site_url('admin/Addfee/editfee')?>"> <i class="menu-icon fa fa-caret-right"></i> Edit Fee </a> <b class="arrow"></b> </li>
              <li class=""> <a href="<?php echo site_url('admin/Addfee/edittransportfee')?>"> <i class="menu-icon fa fa-caret-right"></i> Edit Transport Fee </a> <b class="arrow"></b> </li>
                                    </ul>
                                </div>
                            </li>
                            
                            
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-social-school"></i>Student Management </a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?php echo site_url('admin/Studentmanagement/uploadstudent')?>">Upload Student  </a>
                                        </li>                                        
                                        <li><a href="css-icons.html">View Student </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            
 
                            <li class="bold "><a href="<?php echo site_url("admin/School_management/logs"); ?>" class="waves-effect waves-cyan"><i class="mdi-action-assignment"></i> Members Logs</a>
                    </li>
                           
                     <li class="bold "><a href="<?php echo site_url("admin/Plancost"); ?>" class="waves-effect waves-cyan"><i class="mdi-action-extension"></i>Membership Plan</a>
                    </li>
                      <li class="bold "><a href="<?php echo site_url("admin/Payment"); ?>" class="waves-effect waves-cyan"><i class="mdi-action-payment"></i>Payment Logs</a>
                    </li>      
                        </ul>
                    </li>

                    
                    
                </ul>
                <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
            </aside>
      <!-- END LEFT SIDEBAR NAV-->
