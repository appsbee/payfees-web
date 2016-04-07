           
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
                <h5 class="breadcrumbs-title">Profile</h5>
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Profile</li>
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
              <table>
        <thead>
            <th>Email</th>
            <th>Name</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php if(isset($adminDetails ) && $adminDetails != ""){ ?>
            <tr>
                <td>
                    <?php echo $adminDetails['email'];?> 
                </td>
                 <td>
                    <?php echo $adminDetails['full_name'];?> 
                </td>
                 <td>
                    <a class="waves-effect waves-light btn" href="#myModal" id="resetpass"> <i class="left"></i> Reset Password</a>
                        
                </td>
     
            </tr>
        <?php } ?>
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
      
 <div class="modal"   id="myModal" role="dialog">
    <div class="modal-content">
    
      <h4>Reset Password<a class="btn-floating waves-effect waves-light right modal-close "><i class="mdi-content-clear"></i></a></h4>
      <div class="row"><div class="divider"></div></div>
      <p id="sucess" style="color: green;"></p>
      <p id="error" style="color: red;"></p>
      
      <div class="row">
          <div class="input-field col s6">
                 <input type="password" id="newpassword" class="" />
                 <label for="newpassword">New Password</label>
          </div>
          <div class="input-field col s6">
                 <input type="password" id="confirmpassword" class="" />
                 <label for="confirmpassword">Confirm Password</label>
          </div>
          <div class="input-field col s6">
                 <input type="password" id="adminpassword" class="" />
                 <label for="adminpassword">Admin Password</label>
          </div>
          
          
       </div>    
    </div>
    <div class="modal-footer">
<div class="divider"></div>
     <div class="input-field col s12">
     
     <button class="btn btn-info pull-right " type="button" id="rpassword"> <i class="ace-icon fa fa-check bigger-110"></i> Submit </button>
     
   
      
      
      </div>
    
    </div>
     <br>
  </div>



<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
$('#resetpass').click(function(){
    $('#myModal').openModal();
    $('#sucess').html("");
    $('#error').html("");
    $('#newpassword').val("");
    $('#confirmpassword').val("");
    $('#adminpassword').val("");
})

$('#rpassword').click(function(){
  var newpassword=$('#newpassword').val();
   if(newpassword==""){
    alert(' Enter New Password');
    return false;
   }
  var confirmpassword=$('#confirmpassword').val();
   if(confirmpassword==""){
    alert(' Enter Confirm Password');
    return false;
   }
  var adminpassword=$('#adminpassword').val();
   if(newpassword==""){
    alert(' Enter Admin Password');
    return false;
   }
   $.ajax({
		type: "GET",
		//dataType: "html",
		url: '<?php echo site_url() ?>/admin/Profile/resetpassword',
		data: {
			'newpassword': newpassword,'confirmpassword': confirmpassword,'adminpassword': adminpassword
		},
		success: function(resp) {
          console.log(resp);//return false;
          if(resp.error !=null){
		      $('#error').html(resp.error);
		  }
         else if(resp.update !=null){
            $('#sucess').html(resp.update);
              setTimeout(function(){
                $('#myModal').closeModal();
              }, 2000);
		  }
          
 		}
        
        
	});
 })

</script>