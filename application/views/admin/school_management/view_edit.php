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
                    <h1 class="header smaller lighter blue">Edit School</h1>
                    <?php echo form_open("admin/school-management/",array("class"=>"form-horizontal","role"=>"form")); ?>
                        <div class="form-group">
                            <label class="col-sm-3" for="form-field-1"> School Name</label>
                            <div class="col-sm-9">
                                <?php echo form_input('school_name',set_value('school_name'),array("class"=>"form-control")) ;?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3" for="form-field-1"> School Address</label>
                            <div class="col-sm-9">
                                <?php echo form_textarea("address",set_value("address"),array("class"=>"form-control limited","maxlength"=>"100"));?>
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
                                        <?php echo form_input('session_start',set_value('session_start'),array("class"=>"form-control date-picker","id"=>"id-date-picker-1","data-date-format"=>"dd-mm-yyyy"));?>
<span class="input-group-addon">
<i class="fa fa-calendar bigger-110"></i>
</span>
                                    </div>
                                </div>
                                <div class="to">
                                    <label>To</label>
                                </div>
                                <div class="session2">
                                    <div class="input-group">
                                        <?php echo form_input('session_end',set_value('session_end'),array("class"=>"form-control date-picker","id"=>"id-date-picker-2","data-date-format"=>"dd-mm-yyyy"));?>
<span class="input-group-addon">
<i class="fa fa-calendar bigger-110"></i>
</span>
                                    </div>
                                </div>

                            </div>
                        </div>


                    <?php echo form_close()?>



                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->
    <div class="clearfix"></div>
</div>


