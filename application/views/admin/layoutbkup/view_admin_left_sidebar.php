<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="main-container" id="main-container">
    <script type="text/javascript">
        try{ace.settings.check('main-container' , 'fixed')}catch(e){}
    </script>

    <div id="sidebar" class="sidebar responsive">
        <script type="text/javascript">
            try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
        </script>

        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
            <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                <button class="btn btn-success">
                    <i class="ace-icon fa fa-signal"></i>
                </button>

                <button class="btn btn-info">
                    <i class="ace-icon fa fa-pencil"></i>
                </button>

                <button class="btn btn-warning">
                    <i class="ace-icon fa fa-users"></i>
                </button>

                <button class="btn btn-danger">
                    <i class="ace-icon fa fa-cogs"></i>
                </button>
            </div>

            <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                <span class="btn btn-success"></span>

                <span class="btn btn-info"></span>

                <span class="btn btn-warning"></span>

                <span class="btn btn-danger"></span>
            </div>
        </div><!-- /.sidebar-shortcuts -->

        <ul class="nav nav-list">
            <!--<li class="">
                <a href="index.html">
                    <i class="menu-icon fa fa-tachometer"></i>
                    <span class="menu-text"> Dashboard </span>
                </a>

                <b class="arrow"></b>
            </li>-->

            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								School Management
							</span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    <li class="">
                        <a href="<?php echo site_url("admin/school-management/create");?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Create School
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="<?php echo site_url("admin/school-management/view-all");?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            View All
                        </a>

                        <b class="arrow"></b>
                    </li>

            
                </ul>
                <ul class="nav nav-list">
      <li class="active"> <a href="index.html"> <i class="menu-icon fa fa-tachometer"></i> <span class="menu-text">Fees Management</span> </a> <b class="arrow"></b> </li>
      <li class=""> <a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-desktop"></i> <span class="menu-text"> Fees Management </span> <b class="arrow fa fa-angle-down"></b> </a> <b class="arrow"></b>
        <ul class="submenu">
          <li class=""> <a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-caret-right"></i> Payment <b class="arrow fa fa-angle-down"></b> </a> <b class="arrow"></b>
            <ul class="submenu">
              <li class=""> <a href="by_app.html"> <i class="menu-icon fa fa-caret-right"></i> By App </a> <b class="arrow"></b> </li>
              <li class=""> <a href="by_cash.html"> <i class="menu-icon fa fa-caret-right"></i> By Cash </a> <b class="arrow"></b> </li>
            </ul>
          </li>
          <li class=""> <a href="#"  class="dropdown-toggle"> <i class="menu-icon fa fa-caret-right"></i> Fee Setting <b class="arrow fa fa-angle-down"></b> </a> <b class="arrow"></b>
            <ul class="submenu">
              <li class=""> <a href="<?php echo site_url('admin/Addfee/addfee')?>"> <i class="menu-icon fa fa-caret-right"></i> Add Fee </a> <b class="arrow"></b> </li>
              <li class=""> <a href="<?php echo site_url('admin/Addfee/transportfee')?>"> <i class="menu-icon fa fa-caret-right"></i> Transport Fee </a> <b class="arrow"></b> </li>
              <li class=""> <a href="<?php echo site_url('admin/Addfee/editfee')?>"> <i class="menu-icon fa fa-caret-right"></i> Edit Fee </a> <b class="arrow"></b> </li>
              <li class=""> <a href="<?php echo site_url('admin/Addfee/edittransportfee')?>"> <i class="menu-icon fa fa-caret-right"></i> Edit Transport Fee </a> <b class="arrow"></b> </li>
            </ul>
          </li>
        </ul>
      </li>
      <li class=""> <a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-pencil-square-o"></i> <span class="menu-text"> Student Management </span> <b class="arrow fa fa-angle-down"></b> </a> <b class="arrow"></b>
        <ul class="submenu">
          <li class=""> <a href="upload_student.html"> <i class="menu-icon fa fa-caret-right"></i>Upload Student <b class="arrow fa fa-angle-down"></b> </a> <b class="arrow"></b>
            <!--<ul class="submenu">
              <li class=""> <a href="#"> <i class="menu-icon fa fa-caret-right"></i> By App </a> <b class="arrow"></b> </li>
              <li class=""> <a href="#"> <i class="menu-icon fa fa-caret-right"></i> By Bank </a> <b class="arrow"></b> </li>
              <li class=""> <a href="#"> <i class="menu-icon fa fa-caret-right"></i> By Cash </a> <b class="arrow"></b> </li>
            </ul>-->
          </li>
          <li class=""> <a href="student_details.html"> <i class="menu-icon fa fa-caret-right"></i> View Student <b class="arrow fa fa-angle-down"></b> </a> <b class="arrow"></b>
            <!--<ul class="submenu">
              <li class=""> <a href="#"> <i class="menu-icon fa fa-caret-right"></i> 2000 </a> <b class="arrow"></b> </li>
              <li class=""> <a href="#"> <i class="menu-icon fa fa-caret-right"></i> 50000 </a> <b class="arrow"></b> </li>
            </ul>-->
          </li>
        </ul>
            </li>


        </ul><!-- /.nav-list -->

        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>

        <script type="text/javascript">
            try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
        </script>
    </div>
