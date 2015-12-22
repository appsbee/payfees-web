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
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="tabbable tabs-left ">
                        <ul class="nav nav-tabs tab_width" id="myTab3">
                            <li class="active"> <a data-toggle="tab" href="#home3" aria-expanded="true"> School Information </a> </li>
                            <li class=""> <a data-toggle="tab" href="#profile3" aria-expanded="false"> User Settings </a> </li>
                            <li class=""> <a data-toggle="tab" href="#dropdown13" aria-expanded="false"> Fees Management </a> </li>
                        </ul>
                        <div class="tab-content">
                            <div id="home3" class="tab-pane active">
                                <div class="border_b">
                                    <h4>School Information</h4>
                                    <p>Manage the school details.</p>
                                </div>
                                <?php echo form_open("admin/school-management/update/".$school->id,array("class"=>"form-horizontal","role"=>"form")); ?>
                                <form class="form-horizontal f_top" role="form">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> School Name</label>
                                        <div class="col-sm-9">
                                            <?php echo form_input('school_name',set_value('school_name',NULL)==NULL ?$school->school_name :set_value('school_name') ,array("class"=>"form-control","placeholder"=>"School Name","class"=>"col-xs-10 col-sm-8")) ;?>
                                            <?php echo "<div class=\"error_msg\">". form_error('school_name') ."</div>"; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> School Address</label>
                                        <div class="col-sm-9">
                                            <?php echo form_textarea("address",set_value("address",NULL)==NULL? $school->address :set_value("address") ,array("class"=>"col-xs-10 col-sm-8", "id"=>"form-field-9", "placeholder"=>"School Address","maxlength"=>"255"));?>
                                            <?php echo "<div class=\"error_msg\">". form_error('address') ."</div>"; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> School Details</label>
                                        <div class="col-sm-9">
                                            <?php echo form_textarea("details",set_value("details",NULL)==NULL? $school->school_details :set_value("details") ,array("class"=>"col-xs-10 col-sm-8", "id"=>"form-field-9", "placeholder"=>"School Details"));?>
                                            <?php echo "<div class=\"error_msg\">". form_error('address') ."</div>"; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Session</label>
                                        <div class="col-sm-6">
                                        <div class="col-sm-5 session_part">

                                                <select class="chosen-select form-control" id="" name="session_start" >
                                                    <option value="0" <?php if($school->session_start==0) echo " selected=\"selected\""; ?> >Jan</option>
                                                    <option value="1" <?php if($school->session_start==1) echo " selected=\"selected\""; ?>>Feb</option>
                                                    <option value="2" <?php if($school->session_start==2) echo " selected=\"selected\""; ?>>March</option>
                                                    <option value="3" <?php if($school->session_start==3) echo " selected=\"selected\""; ?>>April</option>
                                                    <option value="4" <?php if($school->session_start==4) echo " selected=\"selected\""; ?>>May</option>
                                                    <option value="5" <?php if($school->session_start==5) echo " selected=\"selected\""; ?>>June</option>
                                                    <option value="6" <?php if($school->session_start==6) echo " selected=\"selected\""; ?>>July</option>
                                                    <option value="7" <?php if($school->session_start==7) echo " selected=\"selected\""; ?>>Aug</option>
                                                    <option value="8" <?php if($school->session_start==8) echo " selected=\"selected\""; ?>>Sept</option>
                                                    <option value="9" <?php if($school->session_start==9) echo " selected=\"selected\""; ?>>Oct</option>
                                                    <option value="10" <?php if($school->session_start==10) echo " selected=\"selected\""; ?>>Nov</option>
                                                    <option value="11" <?php if($school->session_start==11) echo " selected=\"selected\""; ?>>Dec</option>
                                                </select>

                                        </div>
                                        <div class="col-sm-2" style="text-align: center; padding-top: 3px;">
                                            <label>To</label>
                                        </div>
                                        <div class="col-sm-5 session_part">

                                                <select class="chosen-select form-control" id="" name="session_end">
                                                    <option value="0" <?php if($school->session_end==0) echo " selected=\"selected\""; ?>>Jan</option>
                                                    <option value="1" <?php if($school->session_end==1) echo " selected=\"selected\""; ?>>Feb</option>
                                                    <option value="2" <?php if($school->session_end==2) echo " selected=\"selected\""; ?>>March</option>
                                                    <option value="3" <?php if($school->session_end==3) echo " selected=\"selected\""; ?>>April</option>
                                                    <option value="4" <?php if($school->session_end==4) echo " selected=\"selected\""; ?>>May</option>
                                                    <option value="5" <?php if($school->session_end==5) echo " selected=\"selected\""; ?>>June</option>
                                                    <option value="6" <?php if($school->session_end==6) echo " selected=\"selected\""; ?>>July</option>
                                                    <option value="7" <?php if($school->session_end==7) echo " selected=\"selected\""; ?>>Aug</option>
                                                    <option value="8" <?php if($school->session_end==8) echo " selected=\"selected\""; ?>>Sept</option>
                                                    <option value="9" <?php if($school->session_end==9) echo " selected=\"selected\""; ?>>Oct</option>
                                                    <option value="10" <?php if($school->session_end==10) echo " selected=\"selected\""; ?>>Nov</option>
                                                    <option value="11" <?php if($school->session_end==11) echo " selected=\"selected\""; ?>>Dec</option>
                                                </select>

                                        </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Contact Person Name</label>
                                        <div class="col-sm-9">
                                            <?php echo form_input('contact_person_name',set_value('contact_person_name',NULL)==NULL?$school->contact_person:set_value("contact_person_name"),array("class"=>"col-xs-10 col-sm-8")) ;?>
                                            <?php echo "<div class=\"error_msg\">". form_error('contact_person_name') ."</div>"; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Email</label>
                                        <div class="col-sm-9">
                                            <?php echo form_input('contact_person_email',set_value('contact_person_email',NULL)==NULL?$school->contact_email:set_value("contact_person_email"),array("class"=>"col-xs-10 col-sm-8")) ;?>
                                            <?php echo "<div class=\"error_msg\">". form_error('contact_person_email') ."</div>"; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Phone</label>
                                        <div class="col-sm-9">
                                            <?php echo form_input('contact_person_phone',set_value('contact_person_phone',NULL)==NULL?$school->contact_no:set_value("contact_person_phone"),array("class"=>"col-xs-10 col-sm-8")) ;?>
                                            <?php echo "<div class=\"error_msg\">". form_error('contact_person_phone') ."</div>"; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"></label>
                                        <div class="col-sm-9">
                                            <button class="btn btn-info" type="submit" name="submit" value="submit">
                                                <i class="ace-icon fa fa-check bigger-110"></i>
                                                Update
                                            </button>
                                        </div>
                                    </div>

                                    <?php echo $this->session->error ?>
                                </form>


                            </div>
                            <div id="profile3" class="tab-pane ">
                                <div class="border_b">
                                    <h4>User Management</h4>
                                    <p>Manage all the user associated with DPS</p>
                                </div>
                                <table width="100%" class="table table-striped table-bordered table-hover table_text" id="" style="padding-left:12px;">
                                    <thead>
                                    <tr>
                                        <th width="30%">User Name</th>
                                        <th width="20%">Email</th>
                                        <th width="20%">Phone</th>
                                        <th width="10%">Primary Admin</th>
                                        <th width="10%">Status</th>
                                        <th width="10%">&nbsp;</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        foreach($schoolAdmins as $schoolAdmin){
                                            echo "<tr>\n";
                                            echo "<td>$schoolAdmin->name</td>\n";
                                            echo "<td>$schoolAdmin->email</td>\n";
                                            echo "<td>$schoolAdmin->phone_number</td>\n";
                                            $isAdmin = ($schoolAdmin->is_main_account==0) ? "No" : "Yes" ;
                                            $isActivated ;
                                            switch((int)$schoolAdmin->activated){
                                                case STATE_ACTIVE:
                                                    $isActivated = "Active";
                                                    break;
                                                case STATE_NOT_ACTIVE:
                                                    $isActivated = "Not Active";
                                                    break;
                                                case STATE_DISABLED:
                                                    $isActivated = "Disabled";
                                                    break;


                                            }
                                            ($schoolAdmin->is_main_account==0) ? "No" : "Yes" ;
                                            echo "<td>".$isAdmin."</td>\n";
                                            echo "<td>".$isActivated."</td>\n";
                                            echo "<td> <a href=\"#\" data-toggle=\"modal\" data-target=\"#myModal\">Reset Password</a></td>\n";
                                            echo "</tr>\n";
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <div id="dropdown13" class="tab-pane">
                                <div class="border_b">
                                    <h4>Fees Management</h4>
                                    <p>Manage your personal details, contact information, language, country and timezone settings.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- PAGE CONTENT ENDS -->
                </div>
                <!-- /.col -->
            </div>
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->
    <div class="clearfix"></div>
</div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Reset password</h4>
            </div>
            <div class="modal-body">
                <div>
                    <label for="form-field-9">Please enter the new password</label>
                    <?php echo form_password("password", "", array("class" => "form-control", "placeholder" => "New Password")); ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Reset</button>
            </div>
        </div>
    </div>
</div>

