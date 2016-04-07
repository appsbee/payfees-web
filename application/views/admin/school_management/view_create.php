<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

 <!-- START CONTENT -->
      <section id="content">
        
        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper" class=" grey lighten-3">
            <!-- Search for small screen -->
            <div class="header-search-wrapper grey hide-on-large-only">
                <i class="mdi-action-search active"></i>
                <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
            </div>
            <span><?php //echo $this->session->success; ?></span>
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Create School</h5>
                <ol class="breadcrumb">
                    <li><a href="index.html">School Management</a></li>
                    <li><a href="#">Create School</a></li>
                   <!-- <li class="active">Blank Page</li> -->
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->
        
        
        
        
         <div >
			<p style="color:green;margin-top:16px; font-size:15px;" align="center"><strong><?php echo $this->session->success; ?></strong></p>
		</div>
        
        

        <!--start container-->
        <div class="container">
          <div class="section">
<div class="row">
           <!--   	<div class="col s12 m4 l4">
                
          <div class="input-field col s12">
          <i class="mdi-action-search prefix"></i>
          <input id="icon_prefix" type="text" class="validate">
          <label for="icon_prefix">Type your query</label>
        </div>
                </div> -->
                
                
                
                
                
              </div>

           <div class="divider"></div>
            <!--Basic Form-->
            <div id="basic-form" class="section">
              <div class="row">
              <?php echo form_open_multipart("admin/school-management/",array("class"=>"form-horizontal","role"=>"form")); ?>
              <div>
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
                <div class="col s12 m12 l6">
                  <div class="card-panel">
                    <h4 class="header2">Create School</h4>
                    <div class="row">
                      
                        <div class="row">
                          <div class="input-field col s12">
                          <?php echo form_input('school_name',set_value('school_name'),array("class"=>"form-control")) ;?>
                  <?php echo "<div class=\"error_msg\">". form_error('school_name') ."</div>"; ?>
                            <label for="first_name">School Name</label>
                          </div>
                        </div>
                        <div class="row">
                        
                        
                        <div class="row">
                          <div class="input-field col s12">
                          <?php echo form_input('address',set_value('address'),array("class"=>"form-control")) ;?>
                            
                            <?php echo "<div class=\"error_msg\">". form_error('address') ."</div>"; ?>
                            <label for="first_name">School Address</label>
                          </div>
                          
                          
                           <div class="input-field col s12">
                          <?php echo form_input('city',set_value('city'),array("class"=>"form-control")) ;?>
                            
                            <?php echo "<div class=\"error_msg\">". form_error('city') ."</div>"; ?>
                            <label for="first_name">City</label>
                          </div>
                          
                          <div class="input-field col s12">
                          <?php echo form_input('state',set_value('state'),array("class"=>"form-control")) ;?>
                            
                            <?php echo "<div class=\"error_msg\">". form_error('state') ."</div>"; ?>
                            <label for="first_name">State</label>
                          </div>
                          <div class="input-field col s12">
                          <?php echo form_input('zip',set_value('zip'),array("class"=>"form-control")) ;?>
                            
                            <?php echo "<div class=\"error_msg\">". form_error('zip') ."</div>"; ?>
                            <label for="first_name">Pincode</label>
                          </div>
                        </div>
                        <!--
                          <div class="input-field col s12">
                            <textarea id="Address" name="address" class="materialize-textarea" maxlength="255;"><?php //echo set_value("address");?></textarea>
                             <?php// echo "<div class=\"error_msg\">". form_error('address') ."</div>"; ?>
                            <label for="message">School Address</label>
                          </div
                          <div class="input-field col s12">
                          
                            <textarea id="Details" name="details" class="materialize-textarea" maxlength="255;"><?php //echo set_value("details");?></textarea>
                            <?php //echo "<div class=\"error_msg\">". form_error('details') ."</div>"; ?>
                            <label for="message">School Details</label>
                          </div>
                          >-->
                          
                      <div class="input-field col s12 l6">
                        <select name="session_start" >
                        <option value="" disabled selected>School Session From</option>
                                            <option value="1">Jan</option>
                                            <option value="2">Feb</option>
                                            <option value="3">March</option>
                                            <option  value="4">April</option>
                                            <option value="5">May</option>
                                            <option  value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">Aug</option>
                                            <option value="9">Sept</option>
                                            <option value="10">Oct</option>
                                            <option value="11">Nov</option>
                                            <option value="12">Dec</option>
                                        </select>
                          
                        <label>Select </label>
                      </div>  
                      <div class="input-field col s12 l6">
                        <select name="session_end" >
                         <option value="" disabled selected>To</option>
                                            <option value="1">Jan</option>
                                            <option value="2">Feb</option>
                                            <option value="3">March</option>
                                            <option  value="4">April</option>
                                            <option value="5">May</option>
                                            <option  value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">Aug</option>
                                            <option value="9">Sept</option>
                                            <option value="10">Oct</option>
                                            <option value="11">Nov</option>
                                            <option value="12">Dec</option>
                                        </select>
                        <label>Select </label>
                      </div> 
                      
                      <div class="col s12 m12 l12">
                          <div class="file-field input-field col s12 l6">
                                  <input class="file-path validate" type="text"/>
                                    <div class="btn waves-light">
                                    <span> <i class="mdi-editor-publish"></i>   School Logo</span>
                                        <input type="file" name="school_logo" onchange="mylogoFunction()" id="schoollogo" />
                                        </div>
                                         <p id="logoname" style="word-wrap: break-word;"></p>
                                </div>
                          <div class="file-field input-field col s12 l6">
                                  <input class="file-path validate" type="text"/>
                                    <div class="btn waves-light">
                                    <span><i class="mdi-editor-publish"></i>  School Image</span>
                                        <input type="file" name="school_img" onchange="myimgFunction()" id="schoolimg"/>
                                        </div>
                                         <p id="imgname" style="word-wrap: break-word;"></p>
                                </div>
                      </div>          
                         
                        
                            <div style="clear:both"></div> 
                       
                        </div>
                     
                    </div>
                  </div>
                </div>
                <!-- Form with placeholder -->
                <div class="col s12 m12 l6">
                  <div class="card-panel">
                    <h4 class="header2">Primary School Admin</h4>
                    <div class="row">
                   
                        <div class="row">
                          <div class="input-field col s12">
                        <?php echo form_input('school_admin_name',set_value('school_admin_name'),array("id"=>"PersonName")) ;?>
                <?php echo "<div class=\"error_msg\">". form_error('school_admin_name') ."</div>"; ?>
                            
                            <label for="first_name">Contact Person Name</label>
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="input-field col s12">
                            
                             <?php echo form_input('school_admin_phone',set_value('school_admin_phone'),array("id"=>"Phone")) ;?>
                  <?php echo "<div class=\"error_msg\">". form_error('school_admin_phone') ."</div>"; ?>

                            <label for="first_name">Contact Person Phone</label>
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="input-field col s12">
                            
                           <?php echo form_input('school_admin_email',set_value('school_admin_email'),array("id"=>"sadminemail")) ;?>
                <?php echo "<div class=\"error_msg\">". form_error('school_admin_email') ."</div>"; ?>

                            <label for="first_name">Contact Person Email</label>
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="input-field col s12">
                           
                            
                          <?php echo form_password('school_admin_password',set_value('school_admin_password'),array()) ;?>
                <?php echo "<div class=\"error_msg\">". form_error('school_admin_password') ."</div>"; ?>

                            
                            
                            <label for="first_name">Password</label>
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="row">
                            <div class="input-field col s12">
                             <button class="btn cyan waves-effect waves-light right" type="submit" name="submit" onclick="myValidation()" value="submit">Submit
                            
             <i class="mdi-content-send right"></i>
                               
                              
                              
                              </button>
                            </div>
                          </div>
                        </div>
                      
                    </div>
                  </div>
                </div>
              </div>
              
              
              <?php echo $this->session->error ?>
            <?php echo form_close()?>
            </div>
          </div>
          <!-- Floating Action Button -->
            <!-- <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large red">
                  <i class="large mdi-editor-mode-edit"></i>
                </a>
                <ul>
                  <li><a href="css-helpers.html" class="btn-floating red"><i class="large mdi-communication-live-help"></i></a></li>
                  <li><a href="app-widget.html" class="btn-floating yellow darken-1"><i class="large mdi-device-now-widgets"></i></a></li>
                  <li><a href="app-calendar.html" class="btn-floating green"><i class="large mdi-editor-insert-invitation"></i></a></li>
                  <li><a href="app-email.html" class="btn-floating blue"><i class="large mdi-communication-email"></i></a></li>
                </ul>
            </div> -->
            <!-- Floating Action Button -->
        </div>
        <!--end container-->
      </section>
      <!-- END CONTENT -->
      
      
      
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