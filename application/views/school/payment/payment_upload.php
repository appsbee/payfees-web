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
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Manage Fee</h5>
                <ol class="breadcrumb">
                    <li><a href="index.html">Dashboard</a></li>
                    <li><a href="#">Pages</a></li>
                    <li class="active">Blank Page</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->
        

        <!--start container-->
        <div class="container">
          <div class="section">
            <div id="borderless-table">
              
              <div class="row">
              	<div class="col s12 m4 l4">
                
          
        
        
 
        
                </div>
                
               
          <strong><div class="col s12 m4 l12" style="text-align:center;">
<p style="color:green"><?php echo $this->session->flashdata('add_details'); ?>
      
                    </p>  
                    <p style="color:red"><?php echo $this->session->flashdata('error_details'); ?>
      
                    </p>  
</div></strong>        
     
                <div class="col s12 m4 l4">
                
                     
                     
                </div>
                
              </div>
              <div class="divider"></div>
              <br><br>
              <div class="row">
                            
                
                <div class="col s12 m12 l12">
                  <?php echo form_open_multipart("school/Payment/insertpayment",array('id' =>"addfeesdetails")); ?>
                  
                   <div class="col s12 l3">
            <div class="file-field">
                      <input type="text" class="file-path validate" style="margin-left:122px;">
                      <div class="btn">
                        <span>Upload</span>
                        <input type="file" name="paymentupload">
                      </div>
                    </div>
            </div>
                
                
                 <div class="col s12 l3">
            <div class="">
            
     <button class="btn waves-effect waves-light right blue" type="submit" name="submit" value="submit"><i class="mdi-content-send"></i> Submit </button>
            
            
                    </div>
            </div>
                  
                 
                  
                  
                  
                  
                </div>
              </div>
            </div>
          </div>
          <?php echo form_close(); ?>
         
        </div>
        <!--end container-->
      </section>
      <!-- END CONTENT -->
      
      <!-- Modal Structure -->

