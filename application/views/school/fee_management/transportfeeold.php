<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="widget-main seach_part breadcrumbs">
            <form class="form-search">
                <div class="row">
                    <div class="col-xs-12 col-sm-10 no_mar">
                        <div class="input-group">
                            <input type="text" class="form-control search-query" placeholder="Type your query"/>
                                                                <span class="input-group-btn">
                                                                    <button type="button" class="btn btn-purple btn-sm">
                                                                        <span
                                                                            class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                                                        Search
                                                                    </button>
                                                                </span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="page-content">
        <div class="row">
          <div class="col-xs-12 top_gap">
            <form>
              <div class="col-sm-6 no-padding-left">
                <h3 class="no-margin">Transport Fees</h3>
              </div>
             <!-- <div class="col-sm-6">
                <button type="button" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#myModal">Add Fee</button>
              </div>-->
          
            </form>
           
            <div class="clearfix"></div>
             <?php echo form_open("admin/addfee/inserttransportfee"); ?>
            <p style="color:green"><?php echo $this->session->flashdata('add_success'); ?>
            <p style="color:red"><?php echo $this->session->flashdata('routename_error'); ?>
            
            <div class="row top_gap">
            
            <h4>Select School</h4>
            <select class="form-control" name="schoolname" id="schoolname">
            <?php
            if(isset($schools)){
            foreach($schools as $school){
                ?>
                        <option value="<?php echo $school->id ; ?>"><?php echo $school->school_name ;?></option>
                    
                   <?php  }  }?>  
                      </select>
             <div class="col-sm-6">
              <table id="" class="table table-striped table-bordered">
              <tr>
                
    <th colspan="4">Both ways fees</th>
  </tr>
  <tr>
    <td width="20%">Up to </td>
    <td width="30%">
    <span class="route_box">
    <select class="form-control" name="upto_bothway">
    <?php  for($i=1;$i<=20;$i++){ ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                 <?php } ?>       
    </select></span>
         <span class="route_plus">K.M.</span>
         <div class="clearfix"></div>
    </td>
    <td width="20%">Amount</td>
    <td width="30%"><input type="text" name="amountupto_bothway" class="form-control"></td>
  </tr>
 <tr>
    <td>Beyond</td>
    <td>
     <span class="route_box">
    <select class="form-control" name="beyond_bothway" id="">
                        <?php  for($j=1;$j<=20;$j++){ ?>
                        <option value="<?php echo $j; ?>"><?php echo $j; ?></option>
                 <?php } ?> 
         </select>
         </span>
         <span class="route_plus">K.M.</span>
         <div class="clearfix"></div>
    </td>
    <td>Amount</td>
    <td><input type="text"  name="amountbeyond_bothway" class="form-control"></td>
  </tr>
 <tr>
    <td>Route</td>
    <td >
    <span class="route_box" id="">
    <select class="form-control" name="route_bothway" id="route_bothway">
    
    </select>
    </span>
         <span class="route_plus" id="addroute"><a href="#" data-toggle="modal" data-target="#pluspopup"><span class="glyphicon glyphicon-plus"></span></a></span>
    </td>
    <td>Amount</td>
    <td><input type="text"  name="amountroute_bothway" class="form-control"></td>
  </tr>
</table>

</div>

<div class="col-sm-6">
              <table id="" class="table table-striped table-bordered">
              <tr>
    <th colspan="4">One ways fees</th>
  </tr>
  <tr>
    <td width="20%">Up to </td>
    <td width="30%">
    <span class="route_box">
    <select class="form-control" name="upto_oneway" id="">
                         <?php  for($k=1;$k<=20;$k++){ ?>
                        <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
                 <?php } ?> 
         </select>
         </span>
         <span class="route_plus">K.M.</span>
         <div class="clearfix"></div>
    </td>
    <td width="20%">Amount</td>
    <td width="30%"><input type="text" name="amountupto_oneway" class="form-control"></td>
  </tr>
 <tr>
    <td>Beyond</td>
    <td>
     <span class="route_box">
    <select class="form-control" name="beyond_oneway"  id="">
                         <?php  for($l=1;$l<=20;$l++){ ?>
                        <option value="<?php echo $l; ?>"><?php echo $l; ?></option>
                 <?php } ?> 
         </select>
          </span>
         <span class="route_plus">K.M.</span>
         <div class="clearfix"></div>
    </td>
    <td>Amount</td>
    <td><input type="text" name="amountbeyond_oneway" class="form-control"></td>
  </tr>
 <tr>
    <td>Route</td>
    <td>
    <span class="route_box" id="">
    <select class="form-control" name="route_oneway" id="route_oneway">
    
    </select>
    </span>
         <span class="route_plus" id="routeaddoneway"><a href="#" data-toggle="modal" data-target="#pluspopup2"><span class="glyphicon glyphicon-plus"></span></a></span>
    </td>
    <td>Amount</td>
    <td><input type="text" name="amountroute_oneway" class="form-control"></td>
  </tr>
</table>
<div class="pull-right">
                <button class="btn btn-info pull-right" type="submit"> <i class="ace-icon fa fa-check bigger-110"></i> Submit </button>
              </div>
</div>

              
            </div>
            <input type="hidden" name="s_name" id="s_name" />
            <?php echo form_close(); ?>
            <!--<div class="row">
							<div class="col-xs-12">
								

								<table id="grid-table"></table>

								<div id="grid-pager"></div>

								<script type="text/javascript">
									var $path_base = ".";
								</script>

								
							</div>
						</div>-->
          </div>
          <!--end body part-->
          <!-- /.row -->
        </div>

            
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
<div class="clearfix"></div>
</div>
<!-- Modal -->
<div class="modal fade" id="pluspopup" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="width:430px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Route</h4>
      </div>
      <?php echo form_open("admin/addfee/insertroute"); ?>
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
      <!--<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>-->
    </div>
  </div>
</div>


<div class="modal fade" id="pluspopup2" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
   <div class="modal-content" style="width:430px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Route</h4>
      </div>
      <?php echo form_open("admin/addfee/insertroute"); ?>
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
      <!--<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>-->
    </div>
  </div>
</div>
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
