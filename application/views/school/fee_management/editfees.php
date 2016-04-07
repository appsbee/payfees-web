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
                <h5 class="breadcrumbs-title">Edit Fee</h5>
                <ol class="breadcrumb">
                    <li><a href="<?php echo site_url() ?>/school/dashboard">Dashboard</a></li>
                    <li><a href="<?php echo site_url() ?>/school/Addfee/editfee">Edit Fee</a></li>
                  <!--  <li class="active">Blank Page</li> -->
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
              	
                <div class="col s12 m4 l12" style="text-align:center;">
                <p style="color:green"><?php echo $this->session->flashdata('update_fees'); ?>
                </div>
                
                
                
                <?php
if(isset($schools_id)){
    //echo "schoolid=". $schools_id;
    ?>
<h5 style="  margin-left: 290px;margin-bottom: 28px;"><?php if(isset($schools_id)){

    echo "School Name::". $school_name;
   
    }}?></h5>
    
     
    <div class="divider"></div>
    
              <div id="editcontent">
    
<div class="col-xs-12" id="fessheadtable">

<table>
                    <thead>
                      <tr>
                        <td align="center">Feeshead Name</td>
    <td align="center">Feeshead Id</td>
    <td align="center">Fees Setting </td>
                      </tr>
                    </thead>

                    <tbody>
                       <?php
            if(isset($fees)){
            foreach($fees as $fees){
                ?>
  
  <tr id="row_<?php echo $fees['feeshead_id'] ; ?>">
   <!--
     <td align="center"><a href="<?php echo site_url() ?>/admin/Addfee/editfeepage/<?php echo $fees['feeshead_id'] ; ?>"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;&nbsp; <a href="#"><span class="glyphicon glyphicon-trash"></span></a></td>
    -->
    
    
    <td align="center"><?php echo $fees['feeshead_name'] ;?></td>
    <td align="center"><?php echo $fees['feeshead_id'] ;?></td>
    <td align="center"><a href="javascript:void(0)" data-name="<?php echo $fees['feeshead_name'] ;?>" class="btn-floating waves-effect waves-light edit" id="<?php echo $fees['feeshead_id'] ; ?>"><i class="mdi-editor-border-color"></i></a></td>
    
    
    
  </tr>
  
    <?php  } }?> 
                    </tbody>
                  </table>

</div>

<div id="tableajax">
<div class="">
<div class="col s12 m12 l12">
        <div class="">
         
          <div class="" style="padding-bottom: 100px;">
            <?php echo form_open("school/addfee/updatefees",array('id' =>"editfeesdetails")); ?>
     <div class="row top_gap" >
     <input type="hidden" id="update_id" name="update_id" value=""/>
     <input type="hidden" id="update_feehead" name="fesshead_name" value=""/> 
     <input type="hidden" id="school_id" name="school_id" value="<?php if(isset($schools_id)){echo $schools_id;}?>" />
             
              <div id="fixedtable" style="background: #fff;z-index:999999; position: absolute; margin-bottom: 20px;">
             
              </div>
            
              <!-- <div class="pull-right" id="submit_hide">
              <div class="divider"></div>
              <br />
             
                <a class="btn waves-effect waves-light right" href="<?php //echo site_url() ?>/admin/Addfee/editfee/<?php //if(isset($schools_id)){echo $schools_id;} ; ?>" style="">Cancel</a>            
             <button class="btn waves-effect waves-light right" type="submit" name="submit"  value="submit">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            Submit
                        </button> 
              </div> -->
            </div>
            
            
            
            
            
            
            <?php echo form_close(); ?>
            
          </div>
          
          
          
          <!--end body part-->
          <!-- /.row -->
        </div>

            
        </div>

</div>
</div>
</div>


           <div class="divider"></div>
            <!--Basic Form-->
            <div id="basic-form" class="section">
            <br /> <br /> <br /> <br /> <br /> <br />
             
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
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

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
    
     $.ajax({
		type: "GET",
		url: '<?php echo site_url() ?>/school/Addfee/getschoolname',
		data: {
			'keywords': keywords
		},
		success: function(resp) {
		  console.log(resp)
          
          $('#sc_name').html(resp);
		  //alert(resp);
 		}
	});
   
  
});
$('.edit').click(function(){
   
    var feeshead_name= $(this).attr("data-name");
   // console.log(feeshead_name);//return false;
    $('#update_feehead').val(feeshead_name);
   // $( "#tableajax" ).toggle( "slide" );
    var row_edit= $(this).attr('id');
    $('#update_id').val(row_edit);
    //console.log(row_edit);return false;
    $.ajax({
		type: "GET",
		//dataType: "html",
		url: '<?php echo site_url() ?>/school/Addfee/editfeepage',
		data: {
			'row_edit': row_edit
		},
        beforeSend: function() {
       $("#fixedtable").html("");
       $('#submit_hide').hide();
    },
		success: function(resp) {
		  //alert(resp);
          $("#fixedtable").html(resp);
          $("#fessheadtable").hide();
          $('#submit_hide').show();
          $("#fixedtable").animate({
        
         marginTop: "-224px"
    },800);
 		}
        
       // $("#fixedtable").animate({left: '250px'});
	});  
})
$("#editfeesdetails").submit(function(){

    if($('.famount').val()==""){
         alert("Give Fees Amount")
        return false;
    }
    
    var i;
    for (i = 1; i <= 12; i++) {
    if($('#famount'+i).val()==""){
         alert("Give Fees Amount for class "+i)
         $('#famount'+i).focus()
        return false;
    }

    if($('#frequency'+i).val()==""){
         alert("Select Frequency for class "+i)
         $('#frequency'+i).focus()
        return false;
    }
   
}
     return confirm("You want to update??")
    
    
})
$(document).ready(function(){
    
   // $("#fixedtable").css("margin-top", "0px");
    $('#submit_hide').show();
   // $('.edit').click(function(){
    
   // });
});


</script>