<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="main-content">
    <div class="main-content-inner">
        <div class="widget-main seach_part breadcrumbs">
            <form class="form-search">

            </form>
        </div>

        <div class="page-content">


            <div class="row">
                <div class="col s12 m12 l12">
                 <div class="col s12 m12 l12">

                 </div>










                    <!-- PAGE CONTENT BEGINS -->
                    <center><h4 style="color:#FF5F61"><?php echo $school->school_name; ?></h4>
                    <p style="color: #039BE5">Manage the school details.</p></center>

                  <div class="card-panel">
                  <div class="">
                  <p style="color: red;"><?php echo $this->session->error ?></p>
                  </div>
                  <div id="home3" class="tab-pane active">

                                <?php echo form_open("admin/school-management/update/" . $school->id, array("class" => "form-horizontal", "role" => "form")); ?>
                                <form class="form-horizontal f_top" role="form">

                                <div class="col s12 m12 l6">
                                    <div class="input-field col s12">

       <div class="input-field col s12">
                          <?php echo form_input('school_name', set_value('school_name', NULL) == NULL ? $school->school_name : set_value('school_name'), array("class" => "form-control")); ?>
                  <?php echo "<div class=\"error_msg\">" . form_error('school_name') . "</div>"; ?>
                            <label for="first_name">School Name</label>
                          </div>

                                       <div class="input-field col s12">
                          <?php echo form_input('address', set_value('address', NULL) == NULL ? $school->address : set_value('address'), array("class" => "form-control")); ?>

                            <?php echo "<div class=\"error_msg\">" . form_error('address') . "</div>"; ?>
                            <label for="first_name">School Address</label>
                          </div>

                          <div class="input-field col s12">
                          <?php echo form_input('city', set_value('city', NULL) == NULL ? $school->city : set_value('city'), array("class" => "form-control")); ?>
                  <?php echo "<div class=\"error_msg\">" . form_error('city') . "</div>"; ?>
                            <label for="first_name">City</label>
                          </div>
                            <div class="input-field col s12">
                          <?php echo form_input('state', set_value('state', NULL) == NULL ? $school->state : set_value('state'), array("class" => "form-control")); ?>
                  <?php echo "<div class=\"error_msg\">" . form_error('state') . "</div>"; ?>
                            <label for="first_name">State</label>
                          </div>
                            <div class="input-field col s12">
                          <?php echo form_input('zip', set_value('zip', NULL) == NULL ? $school->zip : set_value('zip'), array("class" => "form-control")); ?>
                  <?php echo "<div class=\"error_msg\">" . form_error('zip') . "</div>"; ?>
                            <label for="first_name">Pincode</label>
                          </div>

                                    </div>


                                      <!--
          <div class="input-field col s12">
                            <textarea id="Address" name="address" class="materialize-textarea" maxlength="255;"><?php //echo set_value("address",NULL)==NULL? $school->address :set_value("address");?></textarea>
                             <?php //echo "<div class=\"error_msg\">". form_error('address') ."</div>"; ?>
                            <label for="message">School Address</label>


                                    </div>


                                <div class="input-field col s12">


<textarea id="Details" name="details" class="materialize-textarea" maxlength="255;"><?php //echo set_value("details",NULL)==NULL? $school->school_details :set_value("details");?></textarea>
                             <?php //echo "<div class=\"error_msg\">". form_error('details') ."</div>"; ?>
                            <label for="message">School Details</label>

                                    </div>
                                    -->
                                    <div class="input-field col s12 l6">
                             <select class="chosen-select form-control" id="" name="session_start" >
                                                    <option value="0" <?php if ($school->session_start == 0) {
	echo " selected=\"selected\"";
}
?> >Jan</option>
                                                    <option value="1" <?php if ($school->session_start == 1) {
	echo " selected=\"selected\"";
}
?>>Feb</option>
                                                    <option value="2" <?php if ($school->session_start == 2) {
	echo " selected=\"selected\"";
}
?>>March</option>
                                                    <option value="3" <?php if ($school->session_start == 3) {
	echo " selected=\"selected\"";
}
?>>April</option>
                                                    <option value="4" <?php if ($school->session_start == 4) {
	echo " selected=\"selected\"";
}
?>>May</option>
                                                    <option value="5" <?php if ($school->session_start == 5) {
	echo " selected=\"selected\"";
}
?>>June</option>
                                                    <option value="6" <?php if ($school->session_start == 6) {
	echo " selected=\"selected\"";
}
?>>July</option>
                                                    <option value="7" <?php if ($school->session_start == 7) {
	echo " selected=\"selected\"";
}
?>>Aug</option>
                                                    <option value="8" <?php if ($school->session_start == 8) {
	echo " selected=\"selected\"";
}
?>>Sept</option>
                                                    <option value="9" <?php if ($school->session_start == 9) {
	echo " selected=\"selected\"";
}
?>>Oct</option>
                                                    <option value="10" <?php if ($school->session_start == 10) {
	echo " selected=\"selected\"";
}
?>>Nov</option>
                                                    <option value="11" <?php if ($school->session_start == 11) {
	echo " selected=\"selected\"";
}
?>>Dec</option>
                                                </select>
                            <label>From </label>
                          </div>
                          <div class="input-field col s12 l6">
                            <select class="chosen-select form-control" id="" name="session_end">
                                                    <option value="0" <?php if ($school->session_end == 0) {
	echo " selected=\"selected\"";
}
?>>Jan</option>
                                                    <option value="1" <?php if ($school->session_end == 1) {
	echo " selected=\"selected\"";
}
?>>Feb</option>
                                                    <option value="2" <?php if ($school->session_end == 2) {
	echo " selected=\"selected\"";
}
?>>March</option>
                                                    <option value="3" <?php if ($school->session_end == 3) {
	echo " selected=\"selected\"";
}
?>>April</option>
                                                    <option value="4" <?php if ($school->session_end == 4) {
	echo " selected=\"selected\"";
}
?>>May</option>
                                                    <option value="5" <?php if ($school->session_end == 5) {
	echo " selected=\"selected\"";
}
?>>June</option>
                                                    <option value="6" <?php if ($school->session_end == 6) {
	echo " selected=\"selected\"";
}
?>>July</option>
                                                    <option value="7" <?php if ($school->session_end == 7) {
	echo " selected=\"selected\"";
}
?>>Aug</option>
                                                    <option value="8" <?php if ($school->session_end == 8) {
	echo " selected=\"selected\"";
}
?>>Sept</option>
                                                    <option value="9" <?php if ($school->session_end == 9) {
	echo " selected=\"selected\"";
}
?>>Oct</option>
                                                    <option value="10" <?php if ($school->session_end == 10) {
	echo " selected=\"selected\"";
}
?>>Nov</option>
                                                    <option value="11" <?php if ($school->session_end == 11) {
	echo " selected=\"selected\"";
}
?>>Dec</option>
                                                </select>
                            <label>To </label>
                          </div>

                          <div class="input-field col s12">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"></label>
                                        <div class="col-sm-9">
                                            <button class="btn btn-info" type="submit" name="submit" value="submit">
                                                <i class="ace-icon fa fa-check bigger-110"></i>
                                                Update
                                            </button>
                                        </div>
                                    </div>






                                    <?php // echo $this->session->error ?>

                                </form>


                            </div>

<div class="col s6 m6 l6">
          <div class="input-field col s12">

                              <label for="first_name" class="active">School Logo</label>
                               <br/>
                           <?php if ($school->school_logo) {
	?>
                            <img src="<?php echo base_url() ?>uploads/thumble/<?php echo $school->school_logo ?>"alt="Smiley face" height="200px" width="200px">
                       <?php
} else {

	?>
           <img src="<?php echo base_url() ?>images/images.jpg"alt="Smiley face" height="100px" width="100px">
          <?php }?>


        </div>
        <div style="clear:both"></div>
          <br/>
          <label for="first_name" class="active">School Image</label>
          <br/>

              <?php if ($school->school_img) {
	?>

          <img src="<?php echo base_url() ?>uploads/thumble/<?php echo $school->school_img ?>"alt="Smiley face" height="" width="500px">
          <?php
} else {

	?>
           <img src="<?php echo base_url() ?>images/school-default.jpg"alt="Smiley face" height="" width="500px">
          <?php }?>

</div>











                  <div style="clear:both"></div>
                  </div>

                   <h4><center>User Management</center></h4>
                   <div class="card-panel">
                   <strong>Manage User </strong>

                   <table width="100%" class="table table-striped table-bordered table-hover table_text" id="">
                                    <thead>
                                    <tr>
                                        <th width="">User Name</th>
                                        <th width="">Email</th>
                                        <th width="">Phone</th>
                                        <th width="">Primary Admin</th>
                                        <th width="10%">Status</th>
                                        <th width="">Reset Password</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
foreach ($schoolAdmins as $schoolAdmin) {
	?>
                                        <input type="hidden" id="school_id" value="<?php echo $schoolAdmin->school_id; ?>" />

                                            <tr>
                                            <td><?php echo $schoolAdmin->name; ?></td>
                                            <td><?php echo $schoolAdmin->email; ?></td>
                                            <td><?php echo $schoolAdmin->phone_number; ?></td>
                                            <td><?php
if ($schoolAdmin->is_main_account == "1") {
		echo 'Yes';
	}
	if ($schoolAdmin->is_main_account == "0") {
		echo 'No';
	}

	//echo $schoolAdmin->is_main_account;

	?></td>
                                             <td id="status"
                                             style=" <?php if ($schoolAdmin->activated == "1") {?>
                                                color:green;
                                                    <?php } else {?>
                                             color:red;
                                           <?php }?>
                                          cursor:pointer "



                                           >


                                           <?php

	if ($schoolAdmin->activated == "1") {
		echo 'Active';
	}
	if ($schoolAdmin->activated == "0") {
		echo 'Deactive';
	}

	?>

                                             </td>
                                             <td><a  href="#modal5" class=" modal-trigger" data-toggle="modal" data-target="#myModal">Reset Password</a></td>
                                            </tr>


                                            <?php
}
?>
                                    </tbody>
                                </table>
                   <div style="clear:both"></div>
                  </div>

<div id="modal5" class="modal bottom-sheet" style="opacity: 0.8px;">
                  <div class="modal-content">
                    <h4>Reset Password</h4>
                    <p style="color:green" id="updatetext"></p>
                    <p style="color:red" id="errortext"></p>
                        <div class="card-panel">
                        <input type="hidden" id="schoolid" value="<?php echo $school->id; ?>" />
                            <div class="input-field col s12 m13 l3">
                             <input type="password" name="newpassword" class="" id="newpassword">
                          <label for="newpassword" class="">New Password</label>
                            </div>

                            <div class="input-field col s12 m13 l3">
                            <input type="password" class="" name="confirmpassword" id="confirmpassword">
                          <label for="confirmpassword" class="">Confirm Password</label>
                            </div>

                            <div class="input-field col s12 m13 l3">
                            <input type="password" class="" name="adminpassword" id="adminpassword">
                          <label for="adminpassword" class="">Admin Password</label>
                            </div>

                            <div class="input-field col s12 m13 l3">



                             <button class="btn btn-info pull-right" type="submit" name="submit" id="resetpassschool"  value="submit">

                           <i class="mdi-action-settings-backup-restore right"></i> Submit
                        </button>

                            </div>

                            <div style="clear:both"></div>
                        </div>



                  </div>
                </div>













                    <div class="tabbable tabs-left ">

                        <div class="tab-content">


<!-- ===================================================MoDAL================== -->
<style>
#dialog{
    width:500px !important;
}
</style>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
$(function() {
    $( "#dialog" ).dialog({
      autoOpen: false,
      show: {
        duration: 200
      },
      hide: {
        duration: 200
      }
    });

    $( "#opener" ).click(function() {
      $( "#dialog" ).dialog( "open" );
    });
    $(".smtp").click(function(em){
        em.preventDefault();
        $("#dialog" ).dialog( "close" );
    });
    $(document).on('click','.add_row',function(k){
        k.preventDefault();
        $('.gtg').before('<tr ><td>Tution Fees</td><td>9300</td><td>10200</td><td>10500</td> <td>1000</td> <td>12000</td> <td>9300</td> <td>10200</td> <td>10500</td> <td>1000</td> <td>12000</td> <td>9300</td> <td>10200</td> </tr>');
    });
    $(document).on('click','.del_row',function(dls){
        dls.preventDefault();
        $(this).parent().hide();
    });

  });

</script>
<script>
$("#resetpassschool").click(function(){
   var schoolid= $('#schoolid').val();
   // alert(schoolid);
      $('#updatetext').html("");
     $('#errortext').html("");


    if($('#newpassword').val()!=""){
        var newpassword= $('#newpassword').val();
        console.log($('#newpassword').val());

    }else{

        alert("Enter New password");
        $('#newpassword').focus();
        return false;
    }


    if($('#confirmpassword').val()!=""){
        var confirmpassword= $('#confirmpassword').val();
        console.log($('#confirmpassword').val());

    }else{

        alert(" Enter Confirm password")
         $('#confirmpassword').focus();
        return false;
    }

    if($('#adminpassword').val()!=""){
        var adminpassword= $('#adminpassword').val();
        console.log($('#adminpassword').val());

    }else{

        alert("Enter Admin password")
         $('#adminpassword').focus();
        return false;
    }

     $.ajax({
		type: "GET",
		//dataType: "html",
		url: '<?php echo site_url() ?>/admin/School_management/resetpasswordforschool',
		data: {
			'newpassword': newpassword,'confirmpassword': confirmpassword,'adminpassword': adminpassword ,'schoolid': schoolid
		},
		success: function(resp) {
		 //console.log(resp);return false;
          $('#updatetext').html(resp.update);
          $('#errortext').html(resp.error);



         }

    });




});
$("#status").click(function(){

    var status =$("#status").text();
    var status =status.trim();

    console.log("status"+status);

    var isactive="";
    if(status=="Active"){
         isactive ="0";
    }else{
        isactive = "1";
    }

  // console.log("isactive-"+isactive);return false;
    var school_id =$("#school_id").val();
    //console.log("school::"+school_id);

    $.ajax({
		type: "GET",
		//dataType: "html",
		url: '<?php echo site_url() ?>/admin/School_management/changestatus',
		data: {
			'school_id': school_id,'status': status,'isactive': isactive
		},
		success: function(resp) {
		 //console.log(resp);return false;
         if(resp.stateactive=="1"){
             $("#status").text('Active');
            $("#status").css({color:'green'})
         }
         if(resp.stateactive=="0"){
            $("#status").text('Deactive');
            $("#status").css({color:'red'})

         }


         }

    });



    //alert(status);

})

</script>

    <!--
 <div id="dialog" title="Enter Fees">
    <div class="col-xs-12">
     <form class="form-horizontal" role="form">
      <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Fees Type</label>
                 <div class="col-sm-9">
                     <input type="text" id="form-field-1" placeholder="Fees type" class="col-xs-10 col-sm-5">
                     </div>
                 </div>
           <input type="submit" value="Submit" name="sbmt" class="btn btn-info smtp"/>
     </form>
    </div>
 </div>
-->





<!-- ===============================================End Modal================== -->




                        </div>
                    </div>
                    <!-- PAGE CONTENT ENDS -->
                </div>
                <!-- /.col -->

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



