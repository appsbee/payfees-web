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
                <h5 class="breadcrumbs-title">Transport Fee</h5>
                <ol class="breadcrumb">
                    <li><a href="index.html">Fees Management</a></li>
                    <li><a href="#">Transport Fee</a></li>
                   <!-- <li class="active">Blank Page</li> -->
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->
        
        
        
        
        
        
        

        <!--start container-->
        <div class="container">
          <div class="section">
<div class="row">
              	<div class="col s12 m4 l4">
                <!--
          <div class="input-field col s12">
          <i class="mdi-action-search prefix"></i>
          <input id="icon_prefix" type="text" class="validate">
          <label for="icon_prefix">Type your query</label>
        </div> -->
                </div>
                
                 <?php echo form_open("admin/addfee/inserttransportfee",array('id' =>"addtransportfees")); ?>
            <p style="color:green"><?php echo $this->session->flashdata('add_success'); ?>
            <p style="color:red"><?php echo $this->session->flashdata('routename_error'); ?>
                <div class="col s12 m4 l4">
                 <div class="input-field col s12">
                <select name="schoolname" id="schoolname" class="browser-default">
                          
                           <?php
            if(isset($schools)){ ?>
                 <option value="">Select School</option>
        <?php     foreach($schools as $school){ ?>
                
            
                        <option value="<?php echo $school->id ; ?>"><?php echo $school->school_name ;?></option>
                    
                   <?php  }  }?>  
                        </select>
                        <label>&nbsp; </label>
                        </div>
                </div>
                
                
                
                
                
              </div>

           <div class="divider"></div>
            <!--Basic Form-->
            <div id="basic-form" class="section">
              <div class="row">
                <div class="col s12 m12 l6">
                  <div class="card-panel">
                  
                    <div class="row">
                    	<table>
                    <thead>
                      <tr>
                        <th data-field="id" colspan="4">Both ways fees</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td>Up to </td>
                        <td>
                        <div class="input-field col s6">
                        <select name="upto_bothway" class="browser-default">
                          <?php  for($i=1;$i<=20;$i++){ ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                 <?php } ?>  
                        </select>
                        <label> </label>
                        </div>
                        <div class="input-field col s6"><p>K.M.</p></div>
                      </td>
                        <td>Amount</td>
                        <td><div class="input-field col s12">
                            <input id="" type="text" name="amountupto_bothway">
                            <label for="first_name">Amount</label>
                          </div></td>
                      </tr>
                      
                      <tr>
                        <td>Beyond </td>
                        <td>
                        <div class="input-field col s6">
                        <select name="beyond_bothway" class="browser-default">
                         <?php  for($j=1;$j<=20;$j++){ ?>
                        <option value="<?php echo $j; ?>"><?php echo $j; ?></option>
                 <?php } ?>
                        </select>
                        <label> </label>
                        </div>
                        <div class="input-field col s6"><p>K.M.</p></div>
                      </td>
                        <td>Amount</td>
                        <td><div class="input-field col s12">
                            <input id="" type="text" name="amountbeyond_bothway"/>
                            <label for="first_name">Amount</label>
                          </div></td>
                      </tr>
                      
                      <tr>
                        <td>Route </td>
                        <td>
                        <div class="input-field col s6">
                        <select name="route_bothway" id="route_bothway" class="browser-default">
                         
                        </select>
                        <label> </label>
                        </div>
                        <div class="input-field col s6">
                        <a id="addroute" class="btn-floating waves-effect modal-trigger waves-light " href="#addroutebothway"> <i class="mdi-content-add"></i></a>
                        </div>
                      </td>
                        <td>Amount</td>
                        <td><div class="input-field col s12">
                            <input id="School" type="text" name="amountroute_bothway">
                            <label for="first_name">Amount</label>
                          </div></td>
                      </tr>
                      
                      
                    </tbody>
                  </table>
                      
                    </div>
                  </div>
                </div>
                <!-- Form with placeholder -->
                <div class="col s12 m12 l6">
                  <div class="card-panel">
                    <div class="row">
                    	<table>
                    <thead>
                      <tr>
                        <th data-field="id" colspan="4">One ways fees</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td>Up to </td>
                        <td>
                        <div class="input-field col s6">
                        <select name="upto_oneway" id="" class="browser-default">
                          <?php  for($k=1;$k<=20;$k++){ ?>
                        <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
                 <?php } ?> 
                          
                        </select>
                        <label> </label>
                        </div>
                        <div class="input-field col s6"><p>K.M.</p></div>
                      </td>
                        <td>Amount</td>
                        <td><div class="input-field col s12">
                            <input id="" type="text" name="amountupto_oneway" />
                            <label for="first_name">Amount</label>
                          </div></td>
                      </tr>
                      
                      <tr>
                        <td>Beyond </td>
                        <td>
                        <div class="input-field col s6">
                        <select name="beyond_oneway" class="browser-default"  id="">
                         <?php  for($l=1;$l<=20;$l++){ ?>
                        <option value="<?php echo $l; ?>"><?php echo $l; ?></option>
                 <?php } ?> 
                        </select>
                        <label> </label>
                        </div>
                        <div class="input-field col s6"><p>K.M.</p></div>
                      </td>
                        <td>Amount</td>
                        <td><div class="input-field col s12">
                            <input id="School" type="text" name="amountbeyond_oneway"/>
                            <label for="first_name">Amount</label>
                          </div></td>
                      </tr>
                      
                      <tr>
                        <td>Route </td>
                        <td>
                        <div class="input-field col s6">
                        <select name="route_oneway" id="route_oneway" class="browser-default">
                          
                        </select>
                        <label> </label>
                        </div>
                        <div class="input-field col s6">
                        <a id="routeaddoneway" class="btn-floating waves-effect modal-trigger waves-light " href="#addrouteoneway"> <i class="mdi-content-add"></i></a>
                        </div>
                      </td>
                        <td>Amount</td>
                        <td><div class="input-field col s12">
                            <input id="School" type="text" name="amountroute_oneway"/>
                            <label for="first_name">Amount</label>
                          </div></td>
                      </tr>
                      
                      
                    </tbody>
                  </table>
                      
                    </div>
                  </div>
                  
                  <button class="btn waves-effect waves-light right " type="submit">
Submit
<i class="mdi-content-send right"></i>
</button>
          
          <input type="hidden" name="s_name" id="s_name" />
            <?php echo form_close(); ?>
          
                </div>
              </div>
            </div>
          </div>
          
          
          
          <!-- Floating Action Button 
            <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large red">
                  <i class="large mdi-editor-mode-edit"></i>
                </a>
                <ul>
                  <li><a href="css-helpers.html" class="btn-floating red"><i class="large mdi-communication-live-help"></i></a></li>
                  <li><a href="app-widget.html" class="btn-floating yellow darken-1"><i class="large mdi-device-now-widgets"></i></a></li>
                  <li><a href="app-calendar.html" class="btn-floating green"><i class="large mdi-editor-insert-invitation"></i></a></li>
                  <li><a href="app-email.html" class="btn-floating blue"><i class="large mdi-communication-email"></i></a></li>
                </ul>
            </div>
            Floating Action Button -->
        </div>
        <!--end container-->
      </section>
      <!-- END CONTENT -->
 
 <!-- Modal Structure -->
  <div class="modal"   id="addroutebothway" role="dialog">
    <div class="modal-content">
      <h4>Add Route <a class="btn-floating waves-effect waves-light right modal-close "><i class="mdi-content-clear"></i></a></h4>
      <div class="row"><div class="divider"></div></div>
      <div class="row">
      </div>
      <?php echo form_open("admin/addfee/insertroute",array('id' =>"bothruteinsert")); ?>
      <div class="modal-body">
          <div class="form-group">
            <label class="col-sm-3" for="form-field-1"> Route Name</label>
            <div class="col-sm-9">
              <input type="text" id="" class="form-control" name="route_name" />
            </div>
          <input type="hidden" id="school_id" name="school_id" value="" />
          </div>
          
          <button class="btn btn-info pull-right" type="submit"> <i class="ace-icon fa fa-check bigger-110"></i> Submit </button>
          <div class="clearfix"></div>
      
      </div>
       <?php echo form_close(); ?>
       </div>    
    </div>
    <div class="modal-footer">
<div class="divider"></div>
    
    
    </div>
     <br>
  </div>
  
  
  
  

  
  <!-- Modal Structure -->
  <div class="modal"   id="addrouteoneway" role="dialog">
    <div class="modal-content">
      <h4>Add Fee <a class="btn-floating waves-effect waves-light right modal-close "><i class="mdi-content-clear"></i></a></h4>
      <div class="row"><div class="divider"></div></div>
      <div class="row">
          <?php echo form_open("admin/addfee/insertroute",array('id' =>"oneruteinsert")); ?>
      <div class="modal-body">
          <div class="form-group">
            <label class="col-sm-3" for="form-field-1"> Route Name</label>
            <div class="col-sm-9">
              <input type="text" id="" class="form-control" name="route_name" />
            </div>
          <input type="hidden" id="school_idoneway" name="school_id" value="" class="" />
          </div>
          
          <button class="btn btn-info pull-right" type="submit"> <i class="ace-icon fa fa-check bigger-110"></i> Submit </button>
          <div class="clearfix"></div>
      
      </div>
       <?php echo form_close(); ?>
       </div>    
    </div>
    <div class="modal-footer">
<div class="divider"></div>
    
    
    </div>
     <br>
  </div>
 
      
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>

$('#bothruteinsert').submit(function(){
    
     var schoolid= $('#schoolname').val();
   if(schoolid==""){
    alert('Select School');
    return false;
   }
    
})

$('#oneruteinsert').submit(function(){
    
     var schoolid= $('#schoolname').val();
   if(schoolid==""){
    alert('Select School');
    return false;
   }
    
})

$('#addtransportfees').submit(function(){
    
    //alert('sadsadadad');return false;
     var schoolid= $('#schoolname').val();
   if(schoolid==""){
    alert('Select School');
    return false;
   }
   var schoolid= $('#schoolname').val();
   if(schoolid==""){
    alert('Select School');
    return false;
   }
   
    
})



$("#addroute").click(function(){
    
   var schoolid= $('#schoolname').val();
   $('#school_id').val(schoolid);
   console.log(schoolid);
})
$("#routeaddoneway").click(function(){
    
   var schoolid= $('#schoolname').val();
   $('#school_idoneway').val(schoolid);
   console.log("::"+schoolid);
})

$("#schoolname").change(function(){

    //var school_id= $('#schoolname').val();
    //console.log(school_id);
    //alert(school_id);
    //return false;
    var school_name= $("#schoolname option:selected").text();
    $('#s_name').val(school_name);
    var school_id= $('#schoolname').val();
    console.log(school_id);
 
 $.ajax({
		type: "GET",
		//dataType: "html",
		url: '<?php echo site_url() ?>/admin/Addfee/routedropdown',
		data: {
			'school_id': school_id
		},
		success: function(resp) {
          $("#route_bothway").html(resp);
          $("#route_oneway").html(resp);
        //  var route_bothway= $('#route_bothway option:selected').text();
            //console.log(route_bothway);//return false;
		 // console.log(resp);
 		}
        
	});
 

 //window.location.href = '<?php //echo site_url() ?>/admin/Addfee/routedropdown/'+schoolid
 
//alert(schoolid)
});
</script>