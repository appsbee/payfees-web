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
                <h5 class="breadcrumbs-title">Membership Plan</h5>
                <ol class="breadcrumb">
                    <li><a href="<?php echo site_url() ?>/school/dashboard">Dashboard</a></li>
                   
                  <li class="active">Membership Plan</li> 
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->
        
        <div class="col s12 l12">
        
        <div class="input-field col s12">
                     <a class="waves-effect waves-light btn modal-trigger right" href="#myModal"> <i class="mdi-image-control-point left"></i> Add Plan</a>
                		
                     </div>
        
        
        

        <!--start container-->
        <div class="container">
        
          <div class="section">
<div class="">
              
            
              <table id="" class="responsive-table">
              <thead>
              
                <tr>
                    <th>Plan Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Currency</th>
                   
                    <th width="10%">Status</th>
                    <th>Validity (Months)</th>
                    <th>Action</th>
                 
                </tr>
                
              </thead>
              <tbody>
              <?php if(isset($plandeatils)){
                foreach($plandeatils as $key=>$palnrow){
                    
                ?>
                <tr>
                  <td><?php echo isset( $palnrow->planname) ?  $palnrow->planname : ''; ?></td>
                  <td><?php echo isset( $palnrow->description) ?  $palnrow->description : ''; ?></td>
                  <td><?php echo isset( $palnrow->plancost) ?  $palnrow->plancost : ''; ?></td>
                  
                  <td><?php echo isset( $palnrow->currencycode) ?  $palnrow->currencycode : ''; ?></td>
                  
                
                   
                  </td>
                  <td align="center" class="status" id="<?php echo isset( $palnrow->plans_id) ?   $palnrow->plans_id: ''; ?>"style=" <?php if($palnrow->status=="1"){?>
                                                color:green;
                                                    <?php  }  else{?>
                                                color:red;
                                                <?php } ?>
                                            cursor:pointer ">
                  
                   <?php if($palnrow->status=="1"){
                                               echo 'Active';
                                             }
                                             if($palnrow->status=="0"){
                                               echo 'Deactive';
                                             } ?>
                  
                  
                  </td>
                   <td><?php echo isset( $palnrow->vaildtill) ?  $palnrow->vaildtill : ''; ?></td>
                    <td>
                    
                    <a class="editplan" id="<?php echo isset(  $palnrow->plans_id) ?   $palnrow->plans_id: ''; ?>" href="javascript:void(0)" data-name="new" class="btn-floating waves-effect waves-light edit" id="1"><i class="mdi-editor-border-color"></i></a>
                    
                    </td>
                   
                   
                   
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
  

<div class="modal"   id="myModal" role="dialog" style="width:850px;">
    <div class="modal-content">
      <h4>Add Payment Plan <a class="btn-floating waves-effect waves-light right modal-close "><i class="mdi-content-clear"></i></a></h4>
      <div class="row"><div class="divider"></div></div>
     
     <p id="sucess" style="color: green;"></p>
      <p id="error" style="color: red;"></p>
      
      <div class="row">
       
       <div class="input-field col s6">
           <input type="text" id="planname" class="" />
                 <label for="planname">Plan Name</label>
                
           </div>
      
          <div class="input-field col s6">
                 <input type="text" id="description" class="" />
                 <label for="description">Description</label>
          </div>
          <div class="col s6">
           <div class="input-field col s6">
           <input type="text" id="plancost" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" class="" />
                 <label for="plancost">Plan Cost</label>
                
                
                 
           </div>
      
          <div class="input-field col s6 ">
          
          <select name="currency_code"class="browser-default" id="currency_code">
        		 <option value="" selected>Select Currency</option>
                  <option value="INR">Indian Rupee</option>
        		  <option value="AUD">Australian Dollar</option>
        		  <option value="BRL">Brazilian Real </option>
        		  <option value="EUR">Euro</option>
        		  <option value="SEK">Swedish Krona</option>
        		  <option value="CHF">Swiss Franc</option>
                  <option value="GBP">Pound Sterling</option>
        		  <option value="TWD">Taiwan New Dollar</option>
        		  <option value="THB">Thai Baht</option>
        		  <option value="TRY">Turkish Lira</option>
        		  <option value="USD" >U.S. Dollar</option>
        		</select>
              
          </div>
          </div>
           <div class="input-field col s6">
           <input type="text" id="vaild_till" class="" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" />
                 <label for="vaild_till">Vaild Till(Month)</label>
          </div>
          
         
           
       </div>    
    </div>
    <div class="modal-footer">
<div class="divider"></div>
     <div class="input-field col s12">
     
     <button class="btn btn-info pull-right " type="button" id="addplan"> <i class="ace-icon fa fa-check bigger-110"></i> Submit </button>
     
   
      
      
      </div>
    
    </div>
     <br>
  </div>
  
  <div class="modal"   id="myeditModal" role="dialog" style="width:850px;">
    <div class="modal-content">
      <h4>Edit Payment Plan <a class="btn-floating waves-effect waves-light right modal-close "><i class="mdi-content-clear"></i></a></h4>
      <div class="row"><div class="divider"></div></div>
     
     <p id="sucess" style="color: green;"></p>
      <p id="error" style="color: red;"></p>
      
      <div class="row">
       <input type="hidden" id="edit_id" />
       <div class="input-field col s6">
           <input type="text" id="editplanname" class="" />
                 <label for="editplanname"></label>
                
           </div>
      
          <div class="input-field col s6">
                 <input type="text" id="editdescription" class="" />
                 <label for="editdescription"></label>
          </div>
          
           <div class="input-field col s6">
           <input type="text" id="editplancost" class="" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" />
                 <label for="editplancost"></label>
                 
                 
               
              
            
           </div>
      
          <div class="input-field col s6">
               <select name="currency_code" class="browser-default" id="editcurrency_code">
        		  <option value="" selected>Select Currency</option>
                  <option value="INR">Indian Rupee</option>
        		  <option value="AUD">Australian Dollar</option>
        		  <option value="BRL">Brazilian Real </option>
        		  <option value="EUR">Euro</option>
        		  <option value="SEK">Swedish Krona</option>
        		  <option value="CHF">Swiss Franc</option>
                  <option value="GBP">Pound Sterling</option>
        		  <option value="TWD">Taiwan New Dollar</option>
        		  <option value="THB">Thai Baht</option>
        		  <option value="TRY">Turkish Lira</option>
        		  <option value="USD" >U.S. Dollar</option>
        		</select>
              
              
              
               
                
              
          </div>
           <div class="input-field col s6">
           <input type="text" id="editvaild_till" class="" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" />
                 <label for="editvaild_till"></label>
          </div>
          
         
           
       </div>    
    </div>
    <div class="modal-footer">
<div class="divider"></div>
     <div class="input-field col s12">
     
     <button class="btn btn-info pull-right " type="button" id="updateplan"> <i class="ace-icon fa fa-check bigger-110"></i> Update </button>
     
   
      
      
      </div>
    
    </div>
     <br>
  </div>
  
  
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


<script>
$('#addplan').click(function(){
    
    
        $('#sucess').html("");
        $('#error').html("");
    //alert('adadadad');return false;
    var planname=$('#planname').val();
    if(planname ==""){
         alert("Enter The Plan Name")
         $('#planname').focus()
        return false;
    }
    console.log(planname);
    
    var description=$('#description').val();
    if(description ==""){
         alert("Enter The description")
         $('#description').focus()
        return false;
    }
    console.log(description);
    
     var plancost=$('#plancost').val();
        console.log(plancost);
    
    if(plancost ==""){
         alert("Enter The plancost")
         $('#plancost').focus()
        return false;
    }
   
    
    var currencycode=$('#currency_code').val();
    console.log(currencycode);
     if(currencycode ==""){
         alert("Select The Currency")
        
        return false;
    }
    
    var vaildtill=$('#vaild_till').val();
    console.log(vaildtill);
     if(vaildtill ==""){
         alert("Select The vaildtill")
        
        return false;
    }
    
    
    
    //return false;
$.ajax({
		type: "GET",
		//dataType: "html",
		url: '<?php echo site_url() ?>/admin/Plancost/addplan',
		data: {
			'planname': planname,'description': description,'plancost': plancost,'currencycode': currencycode,'vaildtill': vaildtill
		},
		success: function(resp) {
		 console.log(resp);//return false;
         $('#error').html(resp.error);
         if(resp.sucess=="Sucess"){
            $('#sucess').html("Plan Added Successfully");
            location.reload()

         }
 		
         }
	
    });
 });
 
$('.editplan').click(function(){
    var edit_id=$(this).attr('id');
    console.log(edit_id);
//return false;
    $.ajax({
		type: "GET",
		//dataType: "html",
		url: '<?php echo site_url() ?>/admin/Plancost/getupdatedata',
		data: {
			'edit_id': edit_id
		},
		success: function(resp) { 
          console.log(resp);//return false;
          
          $('#edit_id').val(resp.plans_id);
          $('#editplanname').val(resp.planname);
          $('#editdescription').val(resp.description);
          $('#editplancost').val(resp.plancost);
          $('#editcurrency_code').val(resp.currencycode);
          
          
          $('#editvaild_till').val(resp.vaildtill);
          $('#myeditModal').openModal();
		}
	
    });
       
 });

$('#updateplan').click(function(){
    
    
        $('#sucess').html("");
        $('#error').html("");
         var edit_id=$('#edit_id').val();
        
        
    //alert('adadadad');return false;
    var planname=$('#editplanname').val();
    if(planname ==""){
         alert("Enter The Plan Name")
         $('#editplanname').focus()
        return false;
    }
    console.log(planname);
    
    var description=$('#editdescription').val();
    if(description ==""){
         alert("Enter The description")
         $('#editdescription').focus()
        return false;
    }
    console.log(description);
    
     var plancost=$('#editplancost').val();
        console.log(plancost);
    
    if(plancost ==""){
         alert("Enter The plancost")
         $('#editplancost').focus()
        return false;
    }
  
    
    var currencycode=$('#editcurrency_code').val();
    console.log(currencycode);
     if(currencycode ==""){
         alert("Select The Currency")
        
        return false;
    }
    
    var vaildtill=$('#editvaild_till').val();
    console.log(vaildtill);
     if(vaildtill ==""){
         alert("Select The vaildtill")
        
        return false;
    }
    
    
    
    //return false;
$.ajax({
		type: "GET",
		//dataType: "html",
		url: '<?php echo site_url() ?>/admin/Plancost/editplan',
		data: {
		'edit_id': edit_id,'planname': planname,'description': description,'plancost': plancost,'currencycode': currencycode,'vaildtill': vaildtill
		},
		success: function(resp) {
		 console.log(resp);//return false;
         $('#error').html(resp.error);
         if(resp.sucess=="Sucess"){
            $('#sucess').html("Update Successfully");
            location.reload()

         }
 		
         }
	
    });
 });



$(".status").click(function(){
    var self= $(this);
    var edit_id=$(this).attr('id');
    console.log(edit_id);//return false;
    
    
    var status =$(this).text();
    var status =status.trim();
    
    console.log("status"+status);//return false;
   
    var isactive="";
    if(status=="Active"){
         isactive ="0";
    }else{
        isactive = "1";
    }
     //console.log("isactive"+isactive);return false;
    
    $.ajax({
		type: "GET",
		//dataType: "html",
		url: '<?php echo site_url() ?>/admin/Plancost/changestatus',
		data: {
			'edit_id': edit_id,'status': status,'isactive': isactive
		},
		success: function(resp) {
		 //console.log(resp);return false;
         if(resp.stateactive=="1"){
         //alert('green');return false;
            self.text('Active');
            self.css({color:'green'})
         }
         if(resp.stateactive=="0"){
            //alert('red');return false;
            
            self.text('Deactive');
            self.css({color:'red'})
           
         }
         
 		
         }
	
    });
    
    
    
   
    
})

 </script>