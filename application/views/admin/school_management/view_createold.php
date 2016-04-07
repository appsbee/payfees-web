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
            <div class="col-xs-10 ">
            <span><?php echo $this->session->success; ?></span>
            <h3 class="header smaller lighter blue">Create School</h3>
            <!-- PAGE CONTENT BEGINS -->
            
             <?php echo form_open_multipart("admin/school-management/",array("class"=>"form-horizontal","role"=>"form")); ?>
             <div class="col s12 m4 l12" style="text-align:center;">
             <?php if($this->session->flashdata('errorlogo')!=''){?>	
									<div >
						<p style="color:red;font-style: italic;margin-top:16px; font-size:10px;" align="center"><strong><?php echo $this->session->flashdata('errorlogo'); ?></strong></p>
									</div>
								<?php } ?>
             <?php if($this->session->flashdata('errorimg')!=''){?>	
									<div >
						<p style="color:red;font-style: italic;margin-top:16px; font-size:10px;" align="center"><strong><?php echo $this->session->flashdata('errorimg'); ?></strong></p>
									</div>
								<?php } ?>
             
             </div>
             
             
             
              <div class="form-group">
                <label class="" for="form-field-1"> School Name</label>
                  <?php echo form_input('school_name',set_value('school_name'),array("class"=>"form-control")) ;?>
                  <?php echo "<div class=\"error_msg\">". form_error('school_name') ."</div>"; ?>
              </div> 
              <div class="form-group">
                <label class="" for="form-field-1"> School Address</label>
               <textarea name="address" class="form-control limited;" maxlength="255;" ><?php echo set_value("address");?></textarea>
          
              <?php //echo form_textarea("address",set_value("address"),array("class"=>"form-control limited","maxlength"=>"255")); ?>
                  
                  <?php echo "<div class=\"error_msg\">". form_error('address') ."</div>"; ?>

              </div>
              <div class="form-group">
                <label class="" for="form-field-1"> School Details</label>
                <textarea name="details" class="form-control limited;" maxlength="255;" ><?php echo set_value("details");?></textarea>

                  <?php //echo form_textarea("details",set_value("details"),array("class"=>"form-control limited")); ?>
                  <?php echo "<div class=\"error_msg\">". form_error('details') ."</div>"; ?>
              </div>
              
               
              
              <div class="form-group">
              <div class="col-sm-7 no-padding-left">
                <label class="col-sm-7 no-padding-left" for="form-field-1"> School Session From</label>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    
                                        <select name="session_start" class="form-control">
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
                            <div class="col-sm-2" style="text-align: center;">
                                    <label>To</label>
                                </div>
                            <div class="col-sm-3">
                            
                                
                                    <div class="form-group">
                                        <select name="session_end" class="form-control">
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
              
             <div class="col-sm-5 no-padding-left">
               <div class="form-group">
                <label class="" for="form-field-1"> School Logo</label>
                   <span class="btn btn-warning btn-file col-lg-11">Upload Logo
              <input type="file" name="school_logo" onchange="mylogoFunction()" id="schoollogo"/>
              
              </span>
              
              </div>
              <p id="logoname" style="word-wrap: break-word;"></p>
              </div>
              
                <div class="col-sm-5 no-padding-right no-margin" style="float:right; margin-right: -15px!important;">
               <div class="form-group">
                <label class="" for="form-field-1">Upload Image</label>
                  <span class="btn btn-warning btn-file col-lg-11"> Upload Image
              <input type="file" name="school_img" onchange="myimgFunction()" id="schoolimg"/>
              </span>
             
              </div>
              <p id="imgname" style="word-wrap: break-word;"></p>
              </div>
              <div class="clearfix"></div>
              
            
           
            <!-- PAGE CONTENT ENDS -->
            </div>
          </div>
          
          <div class="col-xs-6 pull-right">
            <div class="col-xs-10">
            <h3 class="header smaller lighter blue">Primary School Admin</h3>
            
             <div class="form-group">
                <label class="" for="">Contact Person Name</label>
                <!--<input type="text" class="form-control" id="school_admin_name" name="school_admin_name"  value=""/>  -->
                <?php echo form_input('school_admin_name',set_value('school_admin_name'),array("class"=>"form-control")) ;?>
                <?php echo "<div class=\"error_msg\">". form_error('school_admin_name') ."</div>"; ?>

              </div>
              <div class="form-group">
                <label class="" for="">Contact Person Phone</label>
                 <?php echo form_input('school_admin_phone',set_value('school_admin_phone'),array("class"=>"form-control")) ;?>
                  <?php echo "<div class=\"error_msg\">". form_error('school_admin_phone') ."</div>"; ?>

              </div>
              <div class="form-group">
                <label class="" for="">Contact Person Email</label>
                 <?php echo form_input('school_admin_email',set_value('school_admin_email'),array("class"=>"form-control","id"=>"sadminemail")) ;?>
                <?php echo "<div class=\"error_msg\">". form_error('school_admin_email') ."</div>"; ?>
              </div>
              
              
              
             <!-- <div class="form-group">
                <label class="" for="">User Name</label> 
              
                  <input type="text" id="" class="form-control">
              
              </div>
              <div class="form-group">
                <label class="" for="">Email</label>
            
                  <input type="text" id="" class="form-control">
              </div>-->
              <div class="form-group">
                <label class="" for="">Password</label>
               <?php echo form_password('school_admin_password',set_value('school_admin_password'),array("class"=>"form-control")) ;?>
                <?php echo "<div class=\"error_msg\">". form_error('school_admin_password') ."</div>"; ?>

              </div>
              <!--<div class="form-group">
                <label class="" for="">Contact Number</label>
             
                  <input type="text" id="" class="form-control">
                   
              </div>  -->
              <button class="btn btn-info pull-right" type="submit" name="submit" onclick="myValidation()" value="submit">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            Submit
                        </button>              </div>
          </div>
          
          
          
          
           <?php echo $this->session->error ?>
            <?php echo form_close()?>
          
          
          
          
          <!-- /.col -->
        </div>
            <!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->
    <div class="clearfix"></div>
</div>


<script src="<?php echo base_url()?>js/jquery.js"></script>

<script>
function mylogoFunction(){
    var x = document.getElementById("schoollogo");
    var txt = "";
    if ('files' in x) {
        if (x.files.length == 0) {
            txt = "Select one or more files.";
        } else {
            for (var i = 0; i < x.files.length; i++) {
                //txt += "<br><strong>" + (i+1) + ". file</strong><br>";
                var file = x.files[i];
                if ('name' in file) {
                    txt +=file.name + "<br>";
                }
               /* if ('size' in file) {
                    txt += "size: " + file.size + " bytes <br>";
                }*/
            }
        }
    } 
    else {
        if (x.value == "") {
            txt += "Select one or more files.";
        } else {
            txt += "The files property is not supported by your browser!";
           // txt  += "<br>The path of the selected file: " + x.value; // If the browser does not support the files property, it will return the path of the selected file instead. 
        }
    }
    document.getElementById("logoname").innerHTML = txt+'<a href="javascript:void(0)" onclick="clearlogo();">X</a>';
   //s document.getElementById("logoname").innerHTML = txt;
}


function myimgFunction(){
    var x = document.getElementById("schoolimg");
    var txt = "";
    if ('files' in x) {
        if (x.files.length == 0) {
            txt = "Select one or more files.";
        } else {
            for (var i = 0; i < x.files.length; i++) {
                //txt += "<br><strong>" + (i+1) + ". file</strong><br>";
                var file = x.files[i];
                if ('name' in file) {
                    txt +=file.name + "<br>";
                }
               /* if ('size' in file) {
                    txt += "size: " + file.size + " bytes <br>";
                }*/
            }
        }
    } 
    else {
        if (x.value == "") {
            txt += "Select one or more files.";
        } else {
            txt += "The files property is not supported by your browser!";
           // txt  += "<br>The path of the selected file: " + x.value; // If the browser does not support the files property, it will return the path of the selected file instead. 
        }
    }
    console.log(window.base_url);
    document.getElementById("imgname").innerHTML = txt+'<a href="javascript:void(0)" onclick="clearimg();">X</a>';
}
function clearimg(){
    $('#imgname').html("")
     $('#schoolimg').val("")
    }
function clearlogo(){
    $('#logoname').html("")
    $('#schoollogo').val("")
        
    }

</script>
