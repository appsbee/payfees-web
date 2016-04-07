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
                <h5 class="breadcrumbs-title">Advance Search</h5>
                <ol class="breadcrumb">
                    <li><a href="<?php echo site_url() ?>/school/dashboard">Dashboard</a></li>
                    <li><a href="<?php echo site_url() ?>/school/Studentmanagement/uploadstudent">Upload Students</a></li>
                    <li class="active">Advance Search</li> 
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
      
    <!-- <div class="col s12 m4 l12">
                
          <div class="input-field col s12">
          <i class="mdi-action-search prefix"></i>
          <input id="search_school" type="text" class="validate">
          <label for="icon_prefix">Search School</label>
        </div>
        <div id="sc_name"></div>
                </div> -->

<p style="color:green"><?php echo $this->session->flashdata('add_details'); ?>
        
                    </p>  
                    <p style="color:red"><?php echo $this->session->flashdata('error_details'); ?>
        
                    </p>  



<?php if(isset($schoolDetails)){ ?>
   <h5 style="  margin-left: 290px;margin-bottom: 28px;"><?php if(isset($schoolDetails['school_name'])){

    echo "School Name::". $schoolDetails['school_name'];
   
    }?></h5>
  <?php   
}
?>


    
    <div class="row">
          <div class="advanced_btn" style="text-align: center;"> <a href="#credits" class="btn btn-danger toggle" >Advaced Search</a> </div>
          <div class="top_gap2 top_section well hidden" id="credits">
           
           
           <br />
            
            <?php echo form_open_multipart('school/Studentmanagement/advancesearch', array('id' =>"advancedSearch"))?>            
            
             
             
              <div class="col s12 l3">
                <div class="form-group no-margin">
                  <input type="text" id="" name="class" placeholder="Class" value="<?php if(isset($searchParam['class'])){echo $searchParam['class'];}?>" class="form-control">
                </div>
              </div>
              <input type="hidden" id="" name="school_id"  class="form-control" value="<?php if(isset($searchParam['school_id'])){echo $searchParam['school_id'];}?>">
              <div class="col s12 l3">
                <div class="form-group no-margin">
                  <input type="text" id="" name="section" placeholder="Section" value="<?php if(isset($searchParam['section'])){echo $searchParam['section'];}?>" class="form-control">
                </div>
              </div>
             
              <div class="col s12 l3">
                <div class="form-group no-margin">
                  <input type="text" id=""  name="roll" placeholder="Roll No." value="<?php if(isset($searchParam['roll'])){echo $searchParam['roll'];}?>" class="form-control">
                </div>
              </div>
             
              <div class="col s12 l3">
                <div class="form-group no-margin">
                <button class="btn waves-effect waves-light right indigo" type="submit" name="submit" value="submit">Submit </button>
                </div>
              </div>
              
              <div class="clearfix"></div>
            
            
            
             <?php echo form_close()?>
            
            
          <div class="divider"></div>  
            <br />
 
          </div>

          <div class="row">
          
                            
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
</a></td>             </tr>
                <?php }}
                else{
                    
                
                 ?>
                 
                 
                <tr>
                  <td> no Records</td>
            
                 
                </tr>
                 <?php } ?>
              </tbody>
            </table>
            
            
            <div class="col-sm-12">
              <div class="modal-footer no-margin-top no-padding-left">
                <div class="pull-left">
                  <button class="btn waves-effect waves-light"><i class="mdi-editor-insert-drive-file"></i> Export</button>
                  <button class="btn btn-success cyan darken-2"><i class="mdi-action-print"></i> Print</button>
                </div>
                <ul class="pagination pull-right no-margin">
                  <li class="prev disabled"> <a href="#"> <i class="ace-icon fa fa-angle-double-left"></i> </a> </li>
                  <li class="active"> <a href="#">1</a> </li>
                  <li> <a href="#">2</a> </li>
                  <li> <a href="#">3</a> </li>
                  <li class="next"> <a href="#"> <i class="ace-icon fa fa-angle-double-right"></i> </a> </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

    

        <!--start body part-->
        
        <!--end body part-->
        <!-- /.row -->
      </div>
      <!-- /.page-content -->
    </div>
  </div>
  <!-- /.main-content -->
  
  
<!-- /.main-container -->
 

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
$(function () {
$( ".viewstudent" ).click(function() {
   var studentdetails_id= $(this).attr('data-id');
  //alert(studentdetails_id);return false;
  
   $.ajax({
		type: "GET",
		//dataType: "html",
		url: '<?php echo site_url() ?>/school/Studentmanagement/getStudenydetails',
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




























