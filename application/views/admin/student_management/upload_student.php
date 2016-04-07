<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="breadcrumbs-wrapper" class=" grey lighten-3">
            <!-- Search for small screen -->
            <div class="header-search-wrapper grey hide-on-large-only">
                <i class="mdi-action-search active"></i>
                <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
            </div>
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Upload Students</h5>
                <ol class="breadcrumb">
                    <li><a href="<?php echo site_url() ?>/admin/dashboard">Dashboard</a></li>
                    <li><a href="<?php echo site_url() ?>/admin/Studentmanagement/uploadstudent">Upload Students</a></li>
                  <!--  <li class="active">Blank Page</li> -->
                </ol>
              </div>
            </div>
          </div>
        </div>
  
  <div class="main-content">
    <div class="main-content-inner">
      <div class="widget-main seach_part breadcrumbs">
        <form class="form-search">
          <div class="row">
        
          </div>
        </form>
      </div>
      
     <div class="col s12 m4 l12">
                
          <div class="input-field col s12 l12">
          <i style="text-align:right;" class="mdi-action-search prefix"></i>
          <input id="search_school" type="text" class="validate">
          <label for="icon_prefix">Search School</label>
        </div>
        <div id="sc_name"></div>
                </div>
<div class="col s12 m4 l12" style="text-align:center;">
                    <p style="color:green; font-size: 20px;"><?php echo $this->session->flashdata('add_details'); ?>
      
                    </p>  
                    <p style="color:red;font-size: 20px"><?php echo $this->session->flashdata('error_details'); ?>
      
                    </p>  
</div>

<?php if(isset($schools_id)){
   // echo $schools_id;
}
?>


<?php if(isset($school_name)){ ?>
<div class="col s12 m4 l12" style="text-align:center;">
   <h5><?php if(isset($schools_id)){

    echo "School Name::". $school_name;
   
    }?></h5><br /></div>
  <?php   
}
?>

<?php if(isset($schools_id)){ ?>
    
    <div class="row">
          <div class="advanced_btn" style="text-align: center;"> <a href="#credits" class="waves-effect waves-light btn toggle" >Advanced Search</a> </div>
          <div class="top_gap2 top_section well hidden" id="credits">
           
           
           <br /> <br />
           <!--<a class="waves-effect waves-light btn">
<i class="mdi-action-backup right"></i>
button
</a>-->
            
            <?php echo form_open_multipart('admin/Studentmanagement/advancesearch', array('id' =>"advancedSearch"))?>            
            
             <div class="adv_box">
              <div class="col s12 l3">
                <div class="form-group no-margin">
                  <input type="text" id="a_class" name="class" placeholder="Class" class="form-control">
                                  
                </div>
              </div>
              <input type="hidden" id="" name="school_id"  class="form-control" value="<?php if(isset($schools_id)){echo $schools_id;}?>">
              <div class="col s12 l3">
                <div class="form-group no-margin">
                  <input type="text" id="a_section" name="section" placeholder="Section" class="form-control">
                </div>
              </div>
             
              <div class="col s12 l3">
                <div class="form-group no-margin">
                  <input type="text" id="a_roll"  name="roll" value="" placeholder="Roll No." class="form-control">
                </div>
              </div>
             
              <div class="col s12 l3">
              <br />
                <div class="form-group no-margin">
                <button class="btn waves-effect waves-light right blue" type="submit" name="submit" value="submit"><i class="mdi-content-send"></i> Submit </button>
                </div>
              </div>
              <div class="clearfix"></div>
              </div>

            
             <?php echo form_close()?>
            
            
          <div class="divider"></div>  
           
 
          </div>
<br /> <br />
          <div class="row">
          <?php echo form_open_multipart("admin/Studentmanagement/excelupload", array('id' =>"uploadFrm")); ?>
          <div class="row">    
            <div class="col s12 l3">
            
                <input class="with-gap browser-default" name="uploadfile" type="radio" id="promote" value="1" />
                <label for="promote">Promote Student</label>
                 
            </div>
            <div class="col s12 l3">
            
                <input class="with-gap browser-default" name="uploadfile" type="radio" id="student" value="2" />
                <label for="student">Upload Students</label>

                 
            </div>
              <input type="hidden" id="school_id" name="school_id" value="<?php if(isset($schools_id)){echo $schools_id;}?>" />
            <div class="col s12 l3">
            <div class="file-field">
                      <input type="text" class="file-path validate" style="margin-left:122px;">
                      <div class="btn">
                        <span>Upload</span>
                        <input type="file" name="fileupload">
                      </div>
                    </div>
            </div>
            
            <div class="col s12 l3">
             <button class="btn waves-effect waves-light right blue" type="submit" name="submit" value="submit"><i class="mdi-content-send"></i> Submit </button>
              <!-- <button class="btn btn-info pull-right" type="submit"> <i class="ace-icon fa fa-check bigger-110"></i> Submit </button> -->
  
            </div>
          </div>
           <?php echo form_close(); ?>
          
          
          
          
          <!--
          
          	<?php //echo form_open_multipart('admin/Studentmanagement/promotestudent', array('id' =>"promoteFrm"))?>  
              <div class="col s12 l6">      
            <div class="file-field">
            
              <div class="btn waves-light">
               <span><i class="mdi-editor-publish"></i>  Promote Student</span>
                                       <input type="file" name="promotestudent"/>
           </div>
            
            
            
             </div>
             <input type="hidden" id="school_id" name="school_id" value="<?php if(isset($schools_id)){echo $schools_id;}?>" />
            
            <button class="btn waves-effect waves-light right blue" type="submit" name="submit" value="submit"> <i class="mdi-content-send"></i> Promote Submit</button>
              </div>
            

                 <?php //echo form_close()?>
            
            -->

            <!--
            	<?php //echo form_open_multipart('admin/Studentmanagement/uploadStudentdata', array('id' =>"addFrm"))?>            
            
            
            
            
            <div class="col s12 l5 right"  style="padding-top: 0; margin-top: 0;"> 
            
            
                <div class="file-field">
                                 
                                    <div class="btn waves-light">
                                    <span><i class="mdi-editor-publish"></i>  Upload Students</span>
                                       <input type="file" name="studentdetails"/>
                                        </div>
                                        
                                </div>
            
              <input type="hidden" id="school_id" name="school_id" value="<?php if(isset($schools_id)){echo $schools_id;}?>" />
            
            <button class="btn waves-effect waves-light right blue" type="submit" name="submit" value="submit"> <i class="mdi-content-send"></i> Submit </button>
           
               </div>
               
               
               <?php //echo form_close()?>
               -->
                              
            <div class="clearfix"></div>
          </div>
          
          
          
          
          
          <div class="col s12 l12">
            <table class="responsive-table">
              <thead>
                <tr>
                  <th>Registration No</th>
                  <th>Name</th>
                 <th>Class</th>
                 <th>Section</th>
                  <th>Roll</th>
                  <th>Guardian Name</th>
                  <th>Guardian Phno</th>
                  <th>View Details</th>
                </tr>
              </thead>
              <tbody>


<?php  
if(isset($allStudents)){
foreach($allStudents as $key=> $studentrow){
    
    ?>

    
                <tr>
                  <td><?php echo isset($studentrow['registration_no']) ? $studentrow['registration_no'] : '';?></td>
                  <td> <?php echo isset($studentrow['student_name']) ? $studentrow['student_name'] : '';?> </td>
                   <td><?php echo isset($studentrow['class']) ? $studentrow['class'] : '';?></td>
                   <td><?php echo isset($studentrow['section']) ? $studentrow['section'] : '';?></td>
                   
                  <td><?php echo isset($studentrow['roll']) ? $studentrow['roll'] : '';?></td>
               
                  
                  <td> <?php echo isset($studentrow['guardian_name']) ? $studentrow['guardian_name'] : '';?> </td>
                  <td><?php echo isset($studentrow['guardian_phno']) ? $studentrow['guardian_phno'] : '';?></td>
                  <td align="center"><a id="" data-id="<?php echo isset($studentrow['studentdetails_id']) ? $studentrow['studentdetails_id'] : '';?>" class="btn-floating waves-effect waves-light blue  modal-trigger viewstudent" href="#addrouteoneway">
<i class="mdi-action-visibility"></i>
</a></td>
                </tr>
                <?php }} ?>
              </tbody>
            </table>
            <div class=""><br />
            <div class="divider"></div>
            <br />
              <div class="modal-footer no-margin-top no-padding-left">
              
              <br />
              <div class="col s12 l6">
                <div class="pull-left">
                  <button class="btn waves-effect waves-light"><i class="mdi-editor-insert-drive-file"></i> Export</button>
                  <button class="btn waves-effect waves-light blue"><i class="mdi-action-print"></i> Print</button>
                </div>
                </div>
                <div class="col s12 l6">
                <ul class="pagination right" style="margin-top:0;">
                <li class="disabled"><a href="#!"><i class="mdi-navigation-chevron-left"></i></a></li>
                <li class="active"><a href="#!">1</a></li>
                <li class="waves-effect"><a href="#!">2</a></li>
                <li class="waves-effect"><a href="#!">3</a></li>
                <li class="waves-effect"><a href="#!">4</a></li>
                <li class="waves-effect"><a href="#!">5</a></li>
                <li class="waves-effect"><a href="#!"><i class="mdi-navigation-chevron-right"></i></a></li>
              </ul>
  				</div>
              </div>
            </div>
          </div>
        </div>
  <?php   
}
?>
    

        <!--start body part-->
        
        <!--end body part-->
        <!-- /.row -->
      </div>
      <!-- /.page-content -->
    </div>
  </div>
  <!-- /.main-content -->
  
  
<!-- /.main-container -->
   <!-- Modal Structure -->
  <div class="modal"   id="addrouteoneway" role="dialog" style="  width: 850px;"> 
    <div class="modal-content" > 
      <h4>Student Details <a class="btn-floating waves-effect waves-light right modal-close "><i class="mdi-content-clear"></i></a></h4>
      <div class="row"><div class="divider"></div></div>
      <div class="row">
      
      
      <div class="col s12 m6 l6">

                <ul class="collection with-header">
                  
                  <li class="collection-item">
                    <div>Reg no<a href="#!" class="secondary-content" id="s_regno"></a>
                    </div>
                  </li>
                   <li class="collection-item">
                    <div>Class<a href="#!" class="secondary-content" id="s_class"></a>
                    </div>
                  </li>
                    
                 
                  
                  <li class="collection-item">
                    <div>Gender<a href="#!" class="secondary-content" id="s_gender"></a>
                    </div>
                  </li>
                  
                  <li class="collection-item">
                    <div>Blood Group<a href="#!" class="secondary-content" id="s_blood_group"></a>
                    </div>
                  </li>
                  
                  <li class="collection-item">
                    <div>Dob<a href="#!" class="secondary-content" id="s_dob"></a>
                    </div>
                  </li>
                  
                  <li class="collection-item">
                    <div>Permanent Address<a href="#!" class="secondary-content" id="s_permanent_address"></a>
                    </div>
                  </li>
                  
                  
                  <li class="collection-item">
                    <div>Present Address<a href="#!" class="secondary-content" id="s_present_address"></a>
                    </div>
                  </li>
                  
                  <li class="collection-item">
                    <div>Nationality<a href="#!" class="secondary-content" id="s_nationality"></a>
                    </div>
                  </li>
                  
                   <li class="collection-item">
                    <div>Mother Tongue<a href="#!" class="secondary-content" id="s_mother_tongue"></a>
                    </div>
                  </li>
                  
                  <li class="collection-item">
                    <div>Mothers Name<a href="#!" class="secondary-content" id="s_mothers_name"></a>
                    </div>
                  </li>
                                    
                  <li class="collection-item">
                    <div>Mothers Qualification<a href="#!" class="secondary-content" id="s_mothers_qualification"></a>
                    </div>
                  </li>
                  
                  
                  <li class="collection-item">
                    <div>Mothers Profession<a href="#!" class="secondary-content" id="s_mothers_profession"></a>
                    </div>
                  </li>
                   
                  <li class="collection-item">
                    <div>Mothers Phno<a href="#!" class="secondary-content" id="s_mothers_phno"></a>
                    </div>
                  </li>
                  
                  
                   
                  <li class="collection-item">
                    <div>Mothers Email<a href="#!" class="secondary-content" id="s_mothers_email"></a>
                    </div>
                  </li>
                  
                  <li class="collection-item">
                    <div>Mothers Annual Income<a href="#!" class="secondary-content" id="s_mothers_annual_income"></a>
                    </div>
                  </li> 
                  
                </ul>

              </div>
              
              
              
              <div class="col s12 m6 l6">

                <ul class="collection with-header">
                  <li class="collection-item">
                    <div>Name<a href="#!" class="secondary-content" id="s_name"></a>
                    </div>
                  </li>
                  
                   <li class="collection-item">
                    <div>Roll<a href="#!" class="secondary-content" id="s_roll"></a>
                    </div>
                  </li>
                   <li class="collection-item">
                    <div>Section<a href="#!" class="secondary-content" id="s_section"></a>
                    </div>
                  </li>
                  <li class="collection-item">
                    <div>Religion<a href="#!" class="secondary-content" id="s_religion"></a>
                    </div>
                  </li>
                  
                  <li class="collection-item">
                    <div>Caste<a href="#!" class="secondary-content" id="s_caste"></a>
                    </div>
                  </li>
                  
                  
                  
                    <li class="collection-item">
                    <div>Fathers Name<a href="#!" class="secondary-content" id="s_fathers_name"></a>
                    </div>
                  </li>
                                    
                  <li class="collection-item">
                    <div>Fathers Qualification<a href="#!" class="secondary-content" id="s_fathers_qualification"></a>
                    </div>
                  </li>
                  
                  
                  <li class="collection-item">
                    <div>Fathers Profession<a href="#!" class="secondary-content" id="s_fathers_profession"></a>
                    </div>
                  </li>
                   
                  <li class="collection-item">
                    <div>Fathers Phno<a href="#!" class="secondary-content" id="s_fathers_phno"></a>
                    </div>
                  </li>
                  
                  
                   
                  <li class="collection-item">
                    <div>Fathers Email<a href="#!" class="secondary-content" id="s_fathers_email"></a>
                    </div>
                  </li>
                  
                  <li class="collection-item">
                    <div>Fathers Annual Income<a href="#!" class="secondary-content" id="s_fathers_annual_income"></a>
                    </div>
                  </li> 
                  
                  
                  
                  <li class="collection-item">
                    <div>Student Living With<a href="#!" class="secondary-content" id="s_student_living_with"></a>
                    </div>
                  </li> 
                  
                  <li class="collection-item">
                    <div>Guardian Name<a href="#!" class="secondary-content" id="s_guardian_name"></a>
                    </div>
                  </li> 
                  
                  <li class="collection-item">
                    <div>Guardian Phno<a href="#!" class="secondary-content" id="s_guardian_phno"></a>
                    </div>
                  </li> 
                  
                  <li class="collection-item">
                    <div>Guardian Email<a href="#!" class="secondary-content" id="s_guardian_email"></a>
                    </div>
                  </li> 
                  
                  
                </ul>

              </div>
      
      
      
      
         
      <div class="modal-body">
          <div class="form-group">
           
          </div>
                            <div class="clearfix"></div>
      
      </div>
      
       </div>    
    </div>
    <div class="modal-footer">
<div class="divider"></div>
    
    
    </div>
     <br>
  </div>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>
;(function($){
    $.fn.extend({
        donetyping: function(callback,timeout){
            timeout = timeout || 1e3; // 1 second default timeout
            var timeoutReference,
                doneTyping = function(el){
                    if (!timeoutReference) return;
                    timeoutReference = null;
                    callback.call(el);
                };
            return this.each(function(i,el){
                var $el = $(el);
                $el.is(':input') && $el.on('keyup keypress paste',function(e){
                    if (e.type=='keyup' && e.keyCode!=8) return;
                   
                    if (timeoutReference) clearTimeout(timeoutReference);
                    timeoutReference = setTimeout(function(){
                       
                        doneTyping(el);
                    }, timeout);
                }).on('blur',function(){
                    doneTyping(el);
                });
            });
        }
    });
})(jQuery);
$('#search_school').donetyping(function(){
    var keywords= $('#search_school').val();
    //console.log(keywords);return false;
    
     $.ajax({
		type: "GET",
		url: '<?php echo site_url() ?>/admin/Studentmanagement/getschoolname',
		data: {
			'keywords': keywords
		},
		success: function(resp) {
		  console.log(resp)
          
          $('#sc_name').html(resp);
		  //alert(resp);
 		}
	});
   
  
});
</script>

<script>

$("#uploadFrm").submit(function(){
    if ( !$("input[name=uploadfile]").is(":checked")) {
       alert('Select The Upload file Type!');
       return false;
    }
});

$(function () {
$( ".viewstudent" ).click(function() {
   var studentdetails_id= $(this).attr('data-id');
  //alert(studentdetails_id);
  
   $.ajax({
		type: "GET",
		//dataType: "html",
		url: '<?php echo site_url() ?>/admin/Studentmanagement/getStudenydetails',
		data: {
			'studentdetails_id': studentdetails_id
		},
		success: function(resp) {
		  
          console.log(resp)
            $('#s_regno').html(resp.registration_no);
            $('#s_name').html(resp.student_name);
            $('#s_class').html(resp.class);
            $('#s_section').html(resp.section);
            $('#s_roll').html(resp.roll);
           
            $('#s_religion').html(resp.religion);
            $('#s_caste').html(resp.caste);
            
            $('#s_gender').html(resp.gender);
            $('#s_blood_group').html(resp.blood_group);
            $('#s_dob').html(resp.dob);
            $('#s_permanent_address').html(resp.permanent_address);
            $('#s_present_address').html(resp.present_address);

            $('#s_nationality').html(resp.nationality);
            
            
            $('#s_mother_tongue').html(resp.mother_tongue);
            $('#s_mothers_name').html(resp.mothers_name);
            $('#s_mothers_qualification').html(resp.mothers_qualification);
            $('#s_mothers_profession').html(resp.mothers_profession);
            $('#s_mothers_phno').html(resp.mothers_phno);
            $('#s_mothers_email').html(resp.mothers_email);
            $('#s_mothers_annual_income').html(resp.mothers_annual_income);
            
            
                
            $('#s_fathers_tongue').html(resp.fathers_tongue);
            $('#s_fathers_name').html(resp.fathers_name);
            $('#s_fathers_qualification').html(resp.fathers_qualification);
            $('#s_fathers_profession').html(resp.fathers_profession);
            $('#s_fathers_phno').html(resp.fathers_phno);
            $('#s_fathers_email').html(resp.fathers_email);
            $('#s_fathers_annual_income').html(resp.fathers_annual_income);
            
            $('#s_student_living_with').html(resp.student_living_with);
            $('#s_guardian_name').html(resp.guardian_name);
            $('#s_guardian_phno').html(resp.guardian_phno);
            $('#s_guardian_email').html(resp.guardian_email);
            
            
            
               
          
 		}
	});
  
  
  
  
});
});
</script>

<script>
        $(function () {
            $('#credits').hide();
            $('.toggle').click(function (event) {
                event.preventDefault();
                var target = $(this).attr('href');
                // console.log(target)
                 $('#a_class').val("");
                $('#a_section').val("");
                $('#a_roll').val("");
                
                
                $(target).toggle();
        //$(target).toggleClass('hidden show');
    });

});
        </script>