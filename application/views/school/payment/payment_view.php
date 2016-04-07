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
                <h5 class="breadcrumbs-title">Payment Details</h5>
                <ol class="breadcrumb">
                    <li><a href="<?php echo site_url() ?>/school/dashboard">Dashboard</a></li>
                     <li><a href="#">Payment</a></li>
                   
                  <li class="active">Payment Details</li> 
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->
        
        <div class="col s12 l12">
      
        
        
        

        <!--start container-->
        <div class="container">
        
          <div class="section">
<div class="">
              
            
              <table id="" class="responsive-table">
              <thead>
              
                <tr>
                    <th width="10%">Registration No</th>
                    <th width="10%">Transaction No</th>
                    <th width="10%">Roll</th>
                    <th width="10%">Class</th>
                    <th width="10%">Section</th>
                    
                    <th width="10%">Amount</th>
                    <th width="10%">Payment Status</th>
                 
                </tr>
                
              </thead>
              <tbody>
              <?php if(isset($paymentDetails)&& $paymentDetails!=""){
                foreach($paymentDetails as $key=>$paymentrow){
                    
                ?>
                <tr>
                 <td><a href="<?php echo site_url() ?>/school/Payment/paymentdetails/<?php echo $paymentrow->registration_no; ?>"><?php echo $paymentrow->registration_no ;?></a></td>
                   <td><?php echo isset( $paymentrow->transaction_no) ?  $paymentrow->transaction_no : ''; ?></td>
                   <td><?php echo isset( $paymentrow->roll) ?  $paymentrow->roll : ''; ?></td>
                   <td><?php echo isset( $paymentrow->class) ?  $paymentrow->class : ''; ?></td>
                   <td><?php echo isset( $paymentrow->section) ?  $paymentrow->section : ''; ?></td>
                  
                   <td><?php echo isset( $paymentrow->amount) ?  $paymentrow->amount : ''; ?></td>
                   <td><?php echo isset( $paymentrow->payment_status) ?  $paymentrow->payment_status : ''; ?></td>
                   
                </tr>
                <?php }}?>
               
              </tbody>
            </table>
            
          </div>
          
           
        </div>
        <!--end container-->
        </div>
        </div>
      </section>
      <!-- END CONTENT -->


  
  
