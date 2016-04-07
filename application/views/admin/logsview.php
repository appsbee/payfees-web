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
                <h5 class="breadcrumbs-title">Members Logs</h5>
                <ol class="breadcrumb">
                    <li><a href="index.html">Dashboard</a></li>
                    <li class="active">Members Logs</li>
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
              
              <table id="simple-table" class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>Email</th>
                  <th>Ip</th>
                  <th>Login Datetime</th>
                  <th>Logout Datetime</th>
                 
                </tr>
              </thead>
              <tbody>
              <?php if(isset($logdetails) && $logdetails!="" ){
              foreach($logdetails as $key=>$logrow)  {
              ?>
                <tr>
                  <td><?php echo isset( $logrow->email) ?  $logrow->email : ''; ?></td>
                  <td><?php echo isset( $logrow->ip) ?  $logrow->ip : ''; ?></td>
                  <td><?php echo isset( $logrow->logindatetime) ?  $logrow->logindatetime : ''; ?></td>
                  <td><?php echo isset( $logrow->logoutdatetime) ?  $logrow->logoutdatetime : ''; ?></td>
                </tr>
                <?php } }?>
               
              </tbody>
            </table>
              
              
              
          
              <div class="divider"></div>
              <br><br>
              <div class="row">
                
              
              </div>
            </div>
          </div>
         
          
        </div>
        <!--end container-->
      </section>
      <!-- END CONTENT -->
        
      
      
      
      
      
      
      