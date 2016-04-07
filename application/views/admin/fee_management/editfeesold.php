<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="main-content">
    <div class="main-content-inner">
     
      <div class="page-content">
        <div class="well show date_form">
<form class="form-horizontal">  
<div class="col-xs-12 no-padding-left">  
    
<div class="form-group no-margin">
<label class="" for="">Search School</label>
<input type="text" id="search_school" placeholder="Search School...." value="" class="form-control" />
</div>
<div id="sc_name"></div>
<!--<div class="col-xs-2">        
<div class="form-group no-margin">
  <button type="button" class="btn btn-sm btn-success">Submit</button>
  
</div>
</div>-->

</div>
<div class="clearfix"></div>
</form>
</div>
<p style="color:green"><?php echo $this->session->flashdata('update_fees'); ?>
                    </p>  
<?php
if(isset($schools_id)){
    //echo "schoolid=". $schools_id;
    ?>
<h2 style="  margin-left: 290px;margin-bottom: 28px;color: green;"><?php if(isset($schools_id)){

    echo "School Name::". $school_name;
   
    }?></h2>
    
    
    
    <div id="editcontent">
    
<div class="col-xs-12" id="fessheadtable">
<table width="100%" border="1" cellspacing="0" cellpadding="0" class="table table-striped table-bordered table-hover">
  <tr>
   <!-- <th width="10%">Fees Setting</th> -->
     
    <td width="60%" align="center">Feeshead Name</td>
    <td width="10%" align="center">Feeshead Id</td>
    <td width="30%" align="center">Fees Setting </td>
  </tr>
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
    <td align="center"><a href="javascript:void(0)" data-name="<?php echo $fees['feeshead_name'] ;?>" class="edit" id="<?php echo $fees['feeshead_id'] ; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
  </tr>
  
    <?php  } }?> 
    
</table>

</div>

<div id="tableajax">
<div class="col-xs-12">
<div class="page-content">
        <div class="row">
          <div class="col-xs-12 top_gap">
            <?php echo form_open("admin/addfee/updatefees",array('id' =>"editfeesdetails")); ?>
     <div class="row top_gap" >
     <input type="hidden" id="update_id" name="update_id" value=""/>
     <input type="hidden" id="update_feehead" name="fesshead_name" value=""/> 
     <input type="hidden" id="school_id" name="school_id" value="<?php if(isset($schools_id)){echo $schools_id;}?>" />
              <div id="fixedtable" style="background: #fff;">
              
              </div>
              <div class="pull-right" id="submit_hide">
              
              <a href="<?php echo site_url() ?>/admin/Addfee/editfee/<?php echo $schools_id ; ?>" class="btn btn-warning" style="  margin-right: 10px;">Cancel</a>
                            
             <button class="btn btn-info pull-right" type="submit" name="submit"  value="submit">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            Submit
                        </button> 
              </div>
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

   <?php }
    
else{
    echo "";
}
?>
        <!-- /.page-header -->
        <!--start body part-->
        <div class="row">
          <div class="col-xs-12 top_gap">
            <div class="row">
              <div class="col-xs-12">
                <table id="grid-table">
                </table>
                <div id="grid-pager"></div>
                <script type="text/javascript">
									var $path_base = ".";
								</script>
              </div>
            </div>
          </div>
          <!--end body part-->
          <!-- /.row -->
        </div>
        <!-- /.page-content -->
      </div>
    </div>
    <!-- /.main-content -->
  </div>
  
  
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
		url: '<?php echo site_url() ?>/admin/Addfee/getschoolname',
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
   // console.log(row_edit);
    $.ajax({
		type: "GET",
		//dataType: "html",
		url: '<?php echo site_url() ?>/admin/Addfee/editfeepage',
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
    $('#submit_hide').hide();
   // $('.edit').click(function(){
    
   // });
});


</script>