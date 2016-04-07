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

            <div class="row">
      <?php 
        
            if(isset($stduentDetails['basic']) && count($stduentDetails['basic'])>0) {
            $studentRow=$stduentDetails['basic'];
                    
                    //echo '<pre>';print_r($studentRow);
                ?>
      <div class="row">
      <div class="col s12 m6 l6">
                <ul class="collection with-header">
                  <li class="collection-item">
                    <div>Reg no<a href="#!" class="secondary-content" id="s_regno"><?php echo isset( $studentRow->registration_no) ?  $studentRow->registration_no : ''; ?></a>
                    </div>
                  </li>
                  <li class="collection-item">
                    <div>Student Name<a href="#!" class="secondary-content" id="s_gender"><?php echo isset( $studentRow->student_name) ?  $studentRow->student_name : ''; ?></a>
                    </div>
                  </li>
                   <li class="collection-item">
                    <div>Class<a href="#!" class="secondary-content" id="s_class"><?php echo isset( $studentRow->class) ?  $studentRow->class : ''; ?></a>
                    </div>
                  </li>
                  
                  
                  <li class="collection-item">
                    <div>Roll<a href="#!" class="secondary-content" id="s_blood_group"><?php echo isset( $studentRow->roll) ?  $studentRow->roll : ''; ?></a>
                    </div>
                  </li>
                  
                  <li class="collection-item">
                    <div>Section<a href="#!" class="secondary-content" id="s_dob"><?php echo isset( $studentRow->section) ?  $studentRow->section : ''; ?></a>
                    </div>
                  </li>
                  
                  <li class="collection-item">
                    <div>Guardian Name<a href="#!" class="secondary-content" id="s_permanent_address"><?php echo isset( $studentRow->guardian_name) ?  $studentRow->guardian_name : ''; ?></a>
                    </div>
                  </li>
                  
                  
                  <li class="collection-item">
                    <div>Guardian Phno<a href="#!" class="secondary-content" id="s_present_address"><?php echo isset( $studentRow->guardian_phno) ?  $studentRow->guardian_phno : ''; ?></a>
                    </div>
                  </li>
                  
                  <li class="collection-item">
                    <div>Guardian Email<a href="#!" class="secondary-content" id="s_nationality"><?php echo isset( $studentRow->guardian_email) ?  $studentRow->guardian_email : ''; ?></a>
                    </div>
                  </li>
                  
                   
                </ul>
              </div>
            
               
              
              
              <div class="col s12 m6 l6">
                <ul class="collection with-header">
                  <li class="collection-item" style="text-align: center;">
                     <img style="margin: 50px auto; width: 200px; height: 200px;" src="<?php echo base_url("assets/images/avatarbk.jpg");?>">
                  </li>
                </ul>
              </div>
</div>

      <?php } ?>
      
      
      
         
      <div class="modal-body">
          <div class="form-group">
           
          </div>
                            <div class="clearfix"></div>
      
      </div>
      
       </div>  
            
    
           
            
            
            
             <div class="divider"></div>
             </br>
             
             </br>
             </br>
             </br>
             
              <div class="divider"></div>
               <div class="divider"></div>
                <div class="divider"></div>
                 <div class="divider"></div>
                  <div class="divider"></div>
<div class="">
              
              
              <table id="" class="responsive-table">
              <thead>
              
                <tr>
                    <th width="10%">Feehead</th>
                    <th width="10%">Trans. No</th>
                    <th width="10%">Payable Amount</th>
                    <th width="10%">Due Date</th>
                    <th width="10%">Payment Date</th>
                    <th width="10%">Payment Amount</th>
                    <th width="10%">Balance Amount</th>
                    <th width="10%">Payment Mode</th>
                     <th width="10%">Payment Status</th>
                   
                 
                </tr>
                
              </thead>
              <tbody>
            
            
            
            <?php 
         
            
                if(isset($stduentDetails['month']) && $stduentDetails['month'] !="") {
                foreach($stduentDetails['month'] as $mkey=>$monthRow){
                //echo '<pre>';print_r($monthRow);
              
                ?>
            
              
                <tr>
                <td colspan="4" style="color: blue;"> 
                
                <?php
                 $date = new DateTime($monthRow[0]['feedue_date']);
                 echo $date->format('F');
                
                  ?>
                
                
                 
                 
                 </td>
                 
                </tr>
                </br>
                
                <?php 
                
                $totalmonthAmount=0;
                $totalmonthpaymentAmount=0;
                $totalmonthbalanceAmount=0;
                
                
                
                foreach($monthRow as $mo=>$montindhRow){
                    
                    $totalmonthAmount=$totalmonthAmount+$montindhRow['amount'];
                    $totalmonthpaymentAmount=$totalmonthpaymentAmount+$montindhRow['payment_amount'];
                    $totalmonthbalanceAmount=$totalmonthAmount-$totalmonthpaymentAmount;
                    
                    ?>
                
                
                
                <tr>
                 <td style="color: green;"><?php echo isset( $montindhRow['feehead']) ?  $montindhRow['feehead'] : ''; ?></td>
                 <td><?php echo isset( $montindhRow['transaction_no']) ?  $montindhRow['transaction_no'] : ''; ?></td>
                 
                 <td><?php echo isset( $montindhRow['amount']) ?  $montindhRow['amount'] : ''; ?></td>
                 
                 <td><?php echo isset( $montindhRow['feedue_date']) ?  $montindhRow['feedue_date'] : ''; ?></td>
                 <td><?php echo isset($montindhRow['payment_date']) ?  $montindhRow['payment_date'] : ''; ?></td>
                 <td><?php echo isset( $montindhRow['payment_amount']) ?  $montindhRow['payment_amount'] : ''; ?></td>
                 
               
                  <td><?php echo $montindhRow['amount']- $montindhRow['payment_amount']; ?></td>
                 
                 
                 <td><?php echo isset($montindhRow['payment_mode']) ?  $montindhRow['payment_mode'] : ''; ?></td>
                 <td><?php echo isset( $montindhRow['payment_status']) ?  $montindhRow['payment_status'] : ''; ?></td>
                  
                </tr>
               <?php }?>
                
               
               
               <?php }} 
               
               ?> 
               
               
               
               
              </tbody>
            </table>
            
              
               </br> </br> </br> </br> </br> </br> </br> </br>
              
              
            
              
            
          </div>
          
           
        </div>
        <!--end container-->
        </div>
        </div>
      </section>
      <!-- END CONTENT -->


  
  
