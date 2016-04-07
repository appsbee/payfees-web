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
                <h3 class="no-margin" id="namefeeshead">Fee Head</h3>
                
              </div>
              <div class="col-sm-6">
                <button type="button" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#myModal">Add Fee</button>
              </div>
            </form>
            <div class="clearfix"></div>
            <?php echo form_open("admin/addfee/insertfees",array('id' =>"addfeesdetails")); ?>
            <p style="color:green"><?php echo $this->session->flashdata('add_success'); ?>
                    </p>            
            <input type="hidden" name="feesname" id="feesname" value="" />
            <input type="hidden" name="feesid" id="feesid" value="" />
            <p id="fees_label" style="color: blue;font-size: 20px;"></p>
            <h4>Select School</h4>
            <select class="form-control" name="schoolname" id="schoolname">
            <?php
            if(isset($schools)){
            foreach($schools as $school){
                ?>
                        <option value="<?php echo $school->id ; ?>"><?php echo $school->school_name ;?></option>
                    
                   <?php  } }?>  
                      </select>
            
           
            <div class="row top_gap">
              <table id="simple-table" class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Fee Type</th>
                    <th>Class I</th>
                    <th>Class II</th>
                    <th>Class III</th>
                    <th>Class IV</th>
                    <th>Class V</th>
                    <th>Class VI</th>
                    <th>Class VII</th>
                    <th>Class VIII</th>
                    <th>Class IX</th>
                    <th>Class X</th>
                    <th>Class XI</th>
                    <th>Class XII</th>
                  </tr>
                </thead> 
                <tbody>
                <tr>
                    <td><strong>Fee Amount</strong></td>
                    <td><input type="text" name="cls1fessamopunt" id="famount1" class="form-control feeamount "/></td>
                    <td><input type="text" name="cls2fessamopunt" id="famount2" class="form-control feeamount"></td>
                    <td><input type="text" name="cls3fessamopunt" id="famount3" class="form-control feeamount"></td>
                    <td><input type="text" name="cls4fessamopunt" id="famount4" class="form-control feeamount"></td>
                    <td><input type="text" name="cls5fessamopunt" id="famount5" class="form-control feeamount"></td>
                    <td><input type="text" name="cls6fessamopunt"  id="famount6" class="form-control feeamount"></td>
                    <td><input type="text" name="cls7fessamopunt" id="famount7" class="form-control feeamount"></td>
                    <td><input type="text" name="cls8fessamopunt" id="famount8" class="form-control feeamount"></td>
                    <td><input type="text" name="cls9fessamopunt" id="famount9" class="form-control feeamount"></td>
                    <td><input type="text" name="cls10fessamopunt" id="famount10" class="form-control feeamount"></td>
                    <td><input type="text" name="cls11fessamopunt" id="famount11" class="form-control feeamount"></td>
                    <td><input type="text" name="cls12fessamopunt"id="famount12" class="form-control feeamount"></td>
                  </tr>
                  <tr>
                    <td><strong>Frequency</strong></td>
                    <td><select class="form-control frequency" name="cls1frequency" id="cls1frequency">
                        <option value="">Select</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Half yearly">Half yearly</option>
                        <option value="Yearly">Yearly</option>
                        <option value="Onetime">Onetime</option>
                      </select></td>
                    <td><select class="form-control frequency" name="cls2frequency" id="cls2frequency">
                        <option value="">Select</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Half yearly">Half yearly</option>
                        <option value="Yearly">Yearly</option>
                        <option value="Onetime">Onetime</option>
                      </select></td>
                    <td><select class="form-control frequency" name="cls3frequency" id="cls3frequency">
                         <option value="">Select</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Half yearly">Half yearly</option>
                        <option value="Yearly">Yearly</option>
                        <option value="Onetime">Onetime</option>
                      </select></td>
                    <td><select class="form-control frequency" name="cls4frequency" id="cls4frequency">
                         <option value="">Select</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Half yearly">Half yearly</option>
                        <option value="Yearly">Yearly</option>
                        <option value="Onetime">Onetime</option>
                      </select></td>
                    <td><select class="form-control frequency" name="cls5frequency" id="cls5frequency">
                         <option value="">Select</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Half yearly">Half yearly</option>
                        <option value="Yearly">Yearly</option>
                        <option value="Onetime">Onetime</option>
                      </select></td>
                    <td><select class="form-control frequency" name="cls6frequency" id="cls6frequency">
                         <option value="">Select</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Half yearly">Half yearly</option>
                        <option value="Yearly">Yearly</option>
                        <option value="Onetime">Onetime</option>
                      </select></td>
                    <td><select class="form-control frequency" name="cls7frequency" id="cls7frequency">
                        <option value="">Select</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Half yearly">Half yearly</option>
                        <option value="Yearly">Yearly</option>
                        <option value="Onetime">Onetime</option>
                      </select></td>
                    <td><select class="form-control frequency" name="cls8frequency" id="cls8frequency">
                         <option value="">Select</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Half yearly">Half yearly</option>
                        <option value="Yearly">Yearly</option>
                        <option value="Onetime">Onetime</option>
                      </select></td>
                    <td><select class="form-control frequency" name="cls9frequency" id="cls9frequency">
                         <option value="">Select</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Half yearly">Half yearly</option>
                        <option value="Yearly">Yearly</option>
                        <option value="Onetime">Onetime</option>
                      </select></td>
                    <td><select class="form-control frequency" name="cls10frequency" id="cls10frequency">
                         <option value="">Select</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Half yearly">Half yearly</option>
                        <option value="Yearly">Yearly</option>
                        <option value="Onetime">Onetime</option>
                      </select></td>
                    <td><select class="form-control frequency" name="cls11frequency" id="cls11frequency">
                         <option value="">Select</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Half yearly">Half yearly</option>
                        <option value="Yearly">Yearly</option>
                        <option value="Onetime">Onetime</option>
                      </select></td>
                    <td><select class="form-control frequency" name="cls12frequency" id="cls12frequency">
                         <option value="">Select</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Half yearly">Half yearly</option>
                        <option value="Yearly">Yearly</option>
                        <option value="Onetime">Onetime</option>
                      </select></td>
                  </tr>
                  <tr>
                    <td><strong>Due Date</strong></td>
                    <td><div class="input-group">
                        <input class="form-control date-picker" name="cls1duedate" id="id-date-picker-1" type="text"/>
                        <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> </div></td>
                    <td><div class="input-group">
                        <input class="form-control date-picker" name="cls2duedate" id="id-date-picker-2" type="text"  />
                        <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> </div></td>
                    <td><div class="input-group">
                        <input class="form-control date-picker" name="cls3duedate" id="id-date-picker-3" type="text"  />
                        <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> </div></td>
                    <td><div class="input-group">
                        <input class="form-control date-picker" name="cls4duedate" id="id-date-picker-4" type="text"  />
                        <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> </div></td>
                    <td><div class="input-group">
                        <input class="form-control date-picker" name="cls5duedate" id="id-date-picker-1" type="text"  />
                        <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> </div></td>
                    <td><div class="input-group">
                        <input class="form-control date-picker" name="cls6duedate" id="id-date-picker-1" type="text"  />
                        <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> </div></td>
                    <td><div class="input-group">
                        <input class="form-control date-picker" name="cls7duedate" id="id-date-picker-1" type="text"  />
                        <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> </div></td>
                    <td><div class="input-group">
                        <input class="form-control date-picker" name="cls8duedate" id="id-date-picker-1" type="text"  />
                        <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> </div></td>
                    <td><div class="input-group">
                        <input class="form-control date-picker" name="cls9duedate" id="id-date-picker-1" type="text"  />
                        <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> </div></td>
                    <td><div class="input-group">
                        <input class="form-control date-picker" name="cls10duedate" id="id-date-picker-1" type="text"  />
                        <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> </div></td>
                    <td><div class="input-group">
                        <input class="form-control date-picker" name="cls11duedate" id="id-date-picker-1" type="text" />
                        <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> </div></td>
                    <td><div class="input-group">
                        <input class="form-control date-picker" name="cls12duedate" id="id-date-picker-1" type="text"  />
                        <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> </div></td>
                  </tr>
                  <tr>
                    <td><strong>Grace Period</strong></td>
                    <td><input type="text" name="cls1grace" class="form-control"></td>
                    <td><input type="text" name="cls2grace" class="form-control"></td>
                    <td><input type="text" name="cls3grace" class="form-control"></td>
                    <td><input type="text" name="cls4grace" class="form-control"></td>
                    <td><input type="text" name="cls5grace" class="form-control"></td>
                    <td><input type="text" name="cls6grace" class="form-control"></td>
                    <td><input type="text" name="cls7grace" class="form-control"></td>
                    <td><input type="text" name="cls8grace" class="form-control"></td>
                    <td><input type="text" name="cls9grace" class="form-control"></td>
                    <td><input type="text" name="cls10grace" class="form-control"></td>
                    <td><input type="text" name="cls11grace" class="form-control"></td>
                    <td><input type="text" name="cls12grace" class="form-control"></td>
                  </tr>
                  <tr>
                    <td><strong>Last Date</strong></td>
                    <td><div class="input-group">
                        <input class="form-control date-picker" name="cls1lastdate" id="id-date-picker-1" type="text"/>
                        <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> </div></td>
                    <td><div class="input-group">
                        <input class="form-control date-picker" name="cls2lastdate" id="id-date-picker-1" type="text"  />
                        <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> </div></td>
                    <td><div class="input-group">
                        <input class="form-control date-picker" name="cls3lastdate" id="id-date-picker-1" type="text" />
                        <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> </div></td>
                    <td><div class="input-group">
                        <input class="form-control date-picker" name="cls4lastdate" id="id-date-picker-1" type="text"  />
                        <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> </div></td>
                    <td><div class="input-group">
                        <input class="form-control date-picker" name="cls5lastdate" id="id-date-picker-1" type="text"  />
                        <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> </div></td>
                    <td><div class="input-group">
                        <input class="form-control date-picker" name="cls6lastdate" id="id-date-picker-1" type="text"  />
                        <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> </div></td>
                    <td><div class="input-group">
                        <input class="form-control date-picker" name="cls7lastdate" id="id-date-picker-1" type="text"  />
                        <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> </div></td>
                    <td><div class="input-group">
                        <input class="form-control date-picker" name="cls8lastdate" id="id-date-picker-1" type="text"  />
                        <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> </div></td>
                    <td><div class="input-group">
                        <input class="form-control date-picker" name="cls9lastdate" id="id-date-picker-1" type="text"  />
                        <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> </div></td>
                    <td><div class="input-group">
                        <input class="form-control date-picker" name="cls10lastdate" id="id-date-picker-1" type="text"  />
                        <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> </div></td>
                    <td><div class="input-group">
                        <input class="form-control date-picker" name="cls11lastdate" id="id-date-picker-1" type="text"  />
                        <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> </div></td>
                    <td><div class="input-group">
                        <input class="form-control date-picker" name="cls12lastdate" id="id-date-picker-1" type="text" />
                        <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> </div></td>
                  </tr>
                  <tr>
                    <td><strong>Penalty Type</strong></td>
                    <td><select class="form-control" name="cls1penaltytype" id="">
                        
                        <option value="Fixed">Fixed</option>
                      
                      </select></td>
                    <td><select class="form-control" name="cls2penaltytype" id="">
                      
                        <option value="Fixed">Fixed</option>
                       
                      </select></td>
                    <td><select class="form-control" name="cls3penaltytype" id="">
                      
                        <option value="">Fixed</option>
                       
                      </select></td>
                    <td><select class="form-control" name="cls4penaltytype" id="">
                       
                        <option value="">Fixed</option>
                       
                      </select></td>
                    <td><select class="form-control" name="cls5penaltytype" id="">
                        
                        <option value="Fixed">Fixed</option>
                      
                      </select></td>
                    <td><select class="form-control" name="cls6penaltytype" id="">
                     
                        <option value="Fixed">Fixed</option>
                     
                      </select></td>
                    <td><select class="form-control" name="cls7penaltytype" id="">
                     
                        <option value="Fixed">Fixed</option>
                      
                      </select></td>
                    <td><select class="form-control" name="cls8penaltytype" id="">
                   
                        <option value="Fixed">Fixed</option>
                      
                      </select></td>
                    <td><select class="form-control" name="cls9penaltytype" id="">
                       
                        <option value="Fixed">Fixed</option>
                      
                      </select></td>
                    <td><select class="form-control" name="cls10penaltytype" id="">
                      
                        <option value="Fixed">Fixed</option>
                       
                      </select></td>
                    <td><select class="form-control" name="cls11penaltytype" id="">
                     
                        <option value="Fixed">Fixed</option>
                        
                      </select></td>
                    <td><select class="form-control" name="cls12penaltytype" id="">
                      
                        <option value="Fixed">Fixed</option>
                      
                      </select></td>
                  </tr>
                  <tr>
                    <td><strong>Penalty Amount</strong></td>
                    <td><input type="text" name="cls1penaltyamount" class="form-control"></td>
                    <td><input type="text" name="cls2penaltyamount" class="form-control"></td>
                    <td><input type="text" name="cls3penaltyamount" class="form-control"></td>
                    <td><input type="text" name="cls4penaltyamount" class="form-control"></td>
                    <td><input type="text" name="cls5penaltyamount" class="form-control"></td>
                    <td><input type="text" name="cls6penaltyamount" class="form-control"></td>
                    <td><input type="text" name="cls7penaltyamount" class="form-control"></td>
                    <td><input type="text" name="cls8penaltyamount" class="form-control"></td>
                    <td><input type="text" name="cls9penaltyamount" class="form-control"></td>
                    <td><input type="text" name="cls10penaltyamount" class="form-control"></td>
                    <td><input type="text" name="cls11penaltyamount" class="form-control"></td>
                    <td><input type="text" name="cls12penaltyamount" class="form-control"></td>
                  </tr>
                  <tr>
                    <td><strong>Penalty Waiver</strong></td>
                    <td align="center"><input name="cls1penaltywaiver" type="checkbox"></td>
                    <td align="center"><input name="cls2penaltywaiver" type="checkbox"></td>
                    <td align="center"><input name="cls3penaltywaiver" type="checkbox"></td>
                    <td align="center"><input name="cls4penaltywaiver" type="checkbox"></td>
                    <td align="center"><input name="cls5penaltywaiver" type="checkbox"></td>
                    <td align="center"><input name="cls6penaltywaiver" type="checkbox"></td>
                    <td align="center"><input name="cls7penaltywaiver" type="checkbox"></td>
                    <td align="center"><input name="cls8penaltywaiver" type="checkbox"></td>
                    <td align="center"><input name="cls9penaltywaiver" type="checkbox"></td>
                    <td align="center"><input name="cls10penaltywaiver" type="checkbox"></td>
                    <td align="center"><input name="cls11penaltywaiver" type="checkbox"></td>
                    <td align="center"><input name="cls12penaltywaiver" type="checkbox"></td>
                  </tr>
                </tbody>
              </table>
              <div class="pull-right">
             <button class="btn btn-info pull-right" type="submit" name="submit"  value="submit">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            Submits
                        </button> 
              </div>
            </div>
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
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="width:430px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Fee</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-sm-3" for="form-field-1"> Fee Name</label>
            <div class="col-sm-9">
              <input type="text" id="addfeesname" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3" for=""> Fee Status</label>
            <div class="col-sm-9">
              <select class="form-control" id="addfeesoption">
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
              </select>
            </div>
          </div>
          <!--<div class="form-group">
            <label class="col-sm-3Class I" for="form-field-1"> Due Date</label>
            <div class="col-sm-9">
              <div class="input-group">
                <input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" />
                <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> </div>
            </div>
          </div>-->
          <button class="btn btn-info pull-right" type="button" id="addfees"> <i class="ace-icon fa fa-check bigger-110"></i> Submit </button>
          <div class="clearfix"></div>
        </form>
      </div>
      <!--<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>-->
    </div>
  </div>
</div>

<!-- Date picker script -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>


<!-- Date picker script -->
<script type="text/javascript">
            $(function () {
                $('.date-picker').datetimepicker({format: 'DD-MM-YYYY', changeMonth: true, changeYear: true, pickTime: false});
            //$('#id-date-picker-2').datetimepicker({format: 'DD-MM-YYYY', changeMonth: true, changeYear: true, pickTime: false});
             //$('#id-date-picker-3').datetimepicker({format: 'DD-MM-YYYY', changeMonth: true, changeYear: true, pickTime: false});

           //
            });
       

</script>

<script>
$("#addfees").click(function(){
    var feeshead=$("#addfeesname").val();
     
    var feesotion=$("#addfeesoption").val();
    var school_id=$("#schoolname").val();
    
    //alert(school_id);return false;
        $.ajax({
		type: "GET",
		//dataType: "html",
		url: '<?php echo site_url() ?>/admin/Addfee/addfeehead',
		data: {
			'feeshead': feeshead,'school_id': school_id
		},
		success: function(resp) {
		  //alert(resp);
          $("#feesid").val(resp);
 		}
	});
    
    
    $('#myModal').modal('hide');
   // alert(feeshead);
    //$("#namefeeshead").text(feeshead);
    $("#feesname").val(feeshead);
    $("#fees_label").html(feeshead);
    
    
    //alert(feesotion);
    
});
$("#addfeesdetails").submit(function(){
   // var text=$('#feesname').val();
   // alert(text);return false;
    
    if($('#feesname').val()!="" && $('#feesid').val()!=""){
        console.log($('#feesname').val());
    }else{
        console.log("else");
        alert("Add fees Head")
        return false;
    }
    
    
    var i;
    for (i = 1; i <= 12; i++) {
    if($('#famount'+i).val()==""){
         alert("Give Fees Amount for class "+i)
         $('#famount'+i).focus()
        return false;
    }
    
  
   
}
  var j;
    for (j = 1; j <= 12; j++) {
   
    
    if($('#cls'+j+'frequency').val()==""){
         alert("Select Frequency for class "+j)
         $('#cls'+j+'frequency').focus()
        return false;
    }
   
}
    
    
})

</script>
<!--
 <script type="text/javascript">
            $(function () {
                $('#datetimepicker4').datetimepicker({format: 'DD-MM-YYYY', changeMonth: true, changeYear: true, pickTime: false});
            });
        </script> -->