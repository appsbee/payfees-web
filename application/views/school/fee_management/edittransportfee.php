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
                <h5 class="breadcrumbs-title">Edit Transport Fee</h5>
                <ol class="breadcrumb">
                    <li><a href="index.html">Fees Management</a></li>
                    <li><a href="#">Edit Transport Fee</a></li>
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
              	<div class="col s12 m4 l12">
                <p style="color:green"><?php echo $this->session->flashdata('update_fees'); ?></p>  
            <p style="color:red"><?php echo $this->session->flashdata('routename_error'); ?>
            
         
                </div> 
              </div>
              
                <?php if(isset($school_id)){
            //echo $school_id;//die();
       }  
       ?>
       
       
       
             
             <?php if(isset($routefeedetails)){
            foreach($routefeedetails as $key=> $routedetails){ ?>
              <?php echo form_open("school/addfee/updatetransportfee/".$routedetails['routefees_id'] ); ?>   
             
             <input type="hidden" name="school_id" value="<?php echo $routedetails['school_id'];?>"/>
           
            <!-- START CONTENT -->
      <section id="content">
         <!--start container-->
        <div class="container">
          <div class="section">
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
                        <select class="" name="upto_bothway">
                            <?php  for($i=1;$i<=20;$i++){ ?>
    
 
           <option value="<?php echo $i; ?>"<?php if ($routedetails['upto_bothway'] == $i) echo ' selected="selected"'?>><?php echo $i; ?></option>
              
              
                 <?php } ?>       
    </select>
                        <label> </label>
                        </div>
                        <div class="input-field col s6"><p>K.M.</p></div>
                      </td>
                        <td>Amount</td>
                        <td><div class="input-field col s12">
                            <input type="text" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" name="amountupto_bothway" class="" value="<?php echo $routedetails['amountupto_bothway'];?>"/>
                            <label for="first_name">Amount</label>
                          </div></td>
                      </tr>
                      
                      <tr>
                        <td>Beyond </td>
                        <td>
                        <div class="input-field col s6">
                        <select class="" name="beyond_bothway" id="">
                        <?php  for($j=1;$j<=20;$j++){ ?>
                        <option value="<?php echo $j; ?>"<?php if ($routedetails['beyond_bothway'] == $j) echo ' selected="selected"'?>><?php echo $j; ?></option>
                 <?php } ?> 
         </select>
                        <label> </label>
                        </div>
                        <div class="input-field col s6"><p>K.M.</p></div>
                      </td>
                        <td>Amount</td>
                        <td><div class="input-field col s12">
                           <input type="text" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"  name="amountbeyond_bothway" class="" value="<?php echo $routedetails['amountbeyond_bothway'];?>">
                            <label for="first_name">Amount</label>
                          </div></td>
                      </tr>
                      
                      <tr>
                        <td>Route </td>
                        <td>
                        <div class="input-field col s6">
                        <select class="" name="route_bothway" id="route_bothway" disabled="true">
    <?php
            if(isset($route)){
            foreach($route as $routename){
                ?>
    <option value="<?php echo $routename->routename_id ; ?>"<?php if ($routedetails['route_bothway'] == $routename->routename_id) echo ' selected="selected"'?>><?php echo $routename->route_name ;?></option>
             <?php  } }?>  
 
    </select>
                        <label> </label>
                        </div>
                     
                      </td>
                        <td>Amount</td>
                        <td><div class="input-field col s12">
                           <input type="text" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"  name="amountroute_bothway" class="" value="<?php echo $routedetails['amountroute_bothway'];?>">
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
                         <select class="" name="upto_oneway" id="">
                         <?php  for($k=1;$k<=20;$k++){ ?>
                        <option value="<?php echo $k; ?>"<?php if ($routedetails['upto_oneway'] == $k) echo ' selected="selected"'?>><?php echo $k; ?></option>
                 <?php } ?> 
         </select>
                        <label> </label>
                        </div>
                        <div class="input-field col s6"><p>K.M.</p></div>
                      </td>
                        <td>Amount</td>
                        <td><div class="input-field col s12">
                            <input type="text" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" name="amountupto_oneway" class="" value="<?php echo $routedetails['amountupto_oneway'];?>">
                            <label for="first_name">Amount</label>
                          </div></td>
                      </tr>
                      
                      <tr>
                        <td>Beyond </td>
                        <td>
                        <div class="input-field col s6">
                        <select class="" name="beyond_oneway"  id="">
                         <?php  for($l=1;$l<=20;$l++){ ?>
                        <option value="<?php echo $l; ?>"<?php if ($routedetails['beyond_oneway'] == $l) echo ' selected="selected"'?>><?php echo $l; ?></option>
                 <?php } ?> 
         </select>
                        <label> </label>
                        </div>
                        <div class="input-field col s6"><p>K.M.</p></div>
                      </td>
                        <td>Amount</td>
                        <td><div class="input-field col s12">
                            <input type="text" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" name="amountbeyond_oneway" class="" value="<?php echo $routedetails['amountbeyond_oneway'];?>">
                            <label for="first_name">Amount</label>
                          </div></td>
                      </tr>
                      
                      <tr>
                        <td>Route </td>
                        <td>
                        <div class="input-field col s6">
                        <select class="" name="route_oneway" id="route_oneway" disabled="true">
    <?php
            if(isset($route)){
            foreach($route as $routename){
                ?>
                        <option value="<?php echo $routename->routename_id ; ?>"<?php if ($routedetails['route_oneway'] == $routename->routename_id) echo ' selected="selected"'?>><?php echo $routename->route_name ;?></option>
             <?php  } }?>  
    </select>
                        <label> </label>
                        </div>
                      
                      </td>
                        <td>Amount</td>
                        <td><div class="input-field col s12">
                           <input type="text" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" name="amountroute_oneway" class="form-control" value="<?php echo $routedetails['amountroute_oneway'];?>">
                            <label for="first_name">Amount</label>
                          </div></td>
                      </tr>
                      
                      
                    </tbody>
                  </table>
                      
                    </div>
                  </div>
                   
                  <button class="btn waves-effect waves-light right " type="submit">
Update
<i class="mdi-content-send right"></i>
</button>
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
           
           
            <input type="hidden" name="s_name" id="s_name" />
             
             
             
              <?php echo form_close(); ?>
        <?php } }?>
                
       
       
       
       
       
       
       
       
       
       
       
       
       
       
              
              
           <div class="divider"></div>
            <!--Basic Form-->
            <div id="basic-form" class="section">
              <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
      
      
      

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>

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
     
    if( keywords.length>0){
        $.ajax({
		type: "GET",
		url: '<?php echo site_url() ?>/admin/Addfee/getschoolnamefortransport',
		data: {
			'keywords': keywords
		},
		success: function(resp) {
		  console.log(resp)
          
          $('#sc_name').html(resp);
		  //alert(resp);
 		}
	}); 
        
    }
     
     
   
  
});

</script>