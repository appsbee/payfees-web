<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<div class="main-content">
    <div class="main-content-inner">
        <div class="widget-main seach_part breadcrumbs">
            <form class="form-search">
                <div class="row">
                    <div class="col-xs-12 col-sm-10 no_mar">
                        <div class="input-group">

                            <input type="text" class="form-control search-query" placeholder="Type your query"/>
                                                                <span class="input-group-btn">
                                                                    <button type="button" class="btn btn-purple btn-sm">
                                                                        <span
                                                                            class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                                                        Search
                                                                    </button>
                                                                </span>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="page-content">


            <div class="row">
                <div class="col-xs-6">
                    <!-- PAGE CONTENT BEGINS -->
                    <span><?php echo $this->session->success; ?></span>
                    <h1 class="header smaller lighter blue">Create School</h1>
                    <?php echo form_open("admin/school-management/",array("class"=>"form-horizontal","role"=>"form")); ?>
                        <div class="form-group">
                            <label class="col-sm-3" for="form-field-1"> School Name</label>
                            <div class="col-sm-9">
                                <?php echo form_input('school_name',set_value('school_name'),array("class"=>"form-control")) ;?>
                                <p class="error_msg">The School name field is required.</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3" for="form-field-1"> School Address</label>
                            <div class="col-sm-9">
                                <?php echo form_textarea("address",set_value("address"),array("class"=>"form-control limited","maxlength"=>"100"));?>
                                <p class="error_msg">The School name field is required.</p>
                                
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3" for="form-field-1"> School Details</label>
                            <div class="col-sm-9">
                                <?php echo form_textarea("details",set_value("details"),array("class"=>"form-control limited","maxlength"=>"100"));?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3" for="form-field-1"> School Session</label>
                            <div class="col-sm-9">
                                <div class="session1">
                                    <div class="input-group">
                                        <select name="session_start">
                                            <option value="0">Jan</option>
                                            <option value="1">Feb</option>
                                            <option value="2">March</option>
                                            <option  value="3">April</option>
                                            <option value="4">May</option>
                                            <option  value="5">June</option>
                                            <option value="6">July</option>
                                            <option value="7">Aug</option>
                                            <option value="8">Sept</option>
                                            <option value="9">Oct</option>
                                            <option value="10">Nov</option>
                                            <option value="11">Dec</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="to">
                                    <label>To</label>
                                </div>
                                <div class="session2">
                                    <div class="input-group">
                                        <select name="session_end">
                                            <option value="0">Jan</option>
                                            <option value="1">Feb</option>
                                            <option value="2">March</option>
                                            <option  value="3">April</option>
                                            <option value="4">May</option>
                                            <option  value="5">June</option>
                                            <option value="6">July</option>
                                            <option value="7">Aug</option>
                                            <option value="8">Sept</option>
                                            <option value="9">Oct</option>
                                            <option value="10">Nov</option>
                                            <option value="11">Dec</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3" for="form-field-1"> Contact Person Name</label>
                            <div class="col-sm-9">
                                <?php echo form_input('contact_person_name',set_value('contact_person_name'),array("class"=>"form-control")) ;?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3" for="form-field-1"> Contact Person Email</label>
                            <div class="col-sm-9">
                                <?php echo form_input('contact_person_email',set_value('contact_person_email'),array("class"=>"form-control")) ;?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3" for="form-field-1"> Contact Person Phone</label>
                            <div class="col-sm-9">
                                <?php echo form_input('contact_person_phone',set_value('contact_person_phone'),array("class"=>"form-control")) ;?>
                            </div>
                        </div>

                        <h3 class="header smaller lighter blue">Primary School Admin</h3>

                        <div class="form-group">
                            <label class="col-sm-3" for="">User Name</label>
                            <div class="col-sm-9">
                                <?php echo form_input('school_admin_name',set_value('school_admin_name'),array("class"=>"form-control")) ;?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3" for="">Email</label>
                            <div class="col-sm-9">
                                <?php echo form_input('school_admin_email',set_value('school_admin_email'),array("class"=>"form-control")) ;?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3" for="">Password</label>
                            <div class="col-sm-9">
                                <?php echo form_password('school_admin_password',set_value('school_admin_password'),array("class"=>"form-control")) ;?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3" for="">Contact Number</label>
                            <div class="col-sm-9">
                                <?php echo form_input('school_admin_phone',set_value('school_admin_phone'),array("class"=>"form-control")) ;?>
                            </div>
                        </div>

                        <button class="btn btn-info pull-right" type="submit" name="submit" value="submit">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            Submit
                        </button>
                    <?php echo $this->session->error ?>
                    <?php echo validation_errors(); ?>

                    <?php echo form_close()?>



                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->
    <div class="clearfix"></div>
</div>

