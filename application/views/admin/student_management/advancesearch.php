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
                    <li><a href="<?php echo site_url() ?>/admin/dashboard">Dashboard</a></li>
                    <li><a href="<?php echo site_url() ?>/admin/Studentmanagement/uploadstudent/<?php if($searchParam['school_id']){
                        echo $searchParam['school_id'] ; 
                    }?>">Upload Students</a></li>
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
            
            <?php echo form_open_multipart('admin/Studentmanagement/advancesearch', array('id' =>"advancedSearch"))?>            
            
             
             
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
                    <td align="center"><a class="btn-floating waves-effect waves-light blue ">
<i class="mdi-action-visibility"></i>
</a></td>                </tr>
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
                  <button class="btn btn-primary cyan darken-2"><i class="mdi-file-file-download"></i> Export</button>
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
 
























































