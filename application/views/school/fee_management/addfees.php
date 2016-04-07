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
                <h5 class="breadcrumbs-title">Manage Fee</h5>
                <ol class="breadcrumb">
                    <li><a href="index.html">Dashboard</a></li>
                    <li><a href="#">Pages</a></li>
                    <li class="active">Blank Page</li>
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

              <div class="row">
              	<div class="col s12 m4 l4">






                </div>

                <?php echo form_open("school/addfee/insertfees", array('id' => "addfeesdetails")); ?>
          <div class="col s12 m4 l12" style="text-align:center;">
            <p style="color:green"><?php echo $this->session->flashdata('add_success'); ?>
                    </p>
           </div>

            <input type="hidden" name="feesname" id="feesname" value="" />
            <input type="hidden" name="feesid" id="feesid" value="" />
            <p id="fees_label" style="color: blue;font-size: 20px;"></p>



                <div class="col s12 m4 l4">



                	 <div class="input-field col s12">
                     <a class="waves-effect waves-light btn modal-trigger right" href="#myModal"> <i class="mdi-image-control-point left"></i> Add Fee</a>

                     </div>


                </div>

              </div>
              <div class="divider"></div>
              <br><br>
              <div class="row">

                <div class="col s12 m12 l12">
                  <table class="responsive-table">
                    <thead>
                      <tr>
                        <th data-field="">Fee Type</th>
                        <th data-field="">Class I</th>
                        <th data-field="">Class II</th>
                        <th data-field="">Class III</th>
                        <th data-field="">Class IV</th>
                        <th data-field="">Class V</th>
                        <th data-field="">Class VI</th>
                        <th data-field="">Class VII</th>
                        <th data-field="">Class VIII</th>
                        <th data-field="">Class IX</th>
                        <th data-field="">Class X</th>
                        <th data-field="">Class XI</th>
                        <th data-field="">Class XII</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td><strong>Fee Amount</strong></td>
                       <?php for ($i = 1; $i <= 12; $i++) {?>
                        <td><div class="input-field col s12">
                            <input type="text" name="cls<?php echo $i; ?>fessamopunt" id="famount<?php echo $i; ?>" class="feeamount "/>
                            <label for="first_name">Amount</label>
                          </div>
                        </td>
                       <?php }?>


                      </tr>

                      <tr>
                        <td><strong>Frequency</strong></td>





                       <td>
                       <select class="form-control frequency browser-default" name="cls1frequency" id="cls1frequency">
                        <option value="">Select</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Half yearly">Half yearly</option>
                        <option value="Yearly">Yearly</option>
                        <option value="Onetime">Onetime</option>
                      </select>
                      </td>
                    <td><select class="form-control frequency browser-default" name="cls2frequency" id="cls2frequency">
                        <option value="">Select</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Half yearly">Half yearly</option>
                        <option value="Yearly">Yearly</option>
                        <option value="Onetime">Onetime</option>
                      </select></td>
                    <td><select class="form-control frequency browser-default" name="cls3frequency" id="cls3frequency">
                         <option value="">Select</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Half yearly">Half yearly</option>
                        <option value="Yearly">Yearly</option>
                        <option value="Onetime">Onetime</option>
                      </select></td>
                    <td><select class="form-control frequency browser-default" name="cls4frequency" id="cls4frequency">
                         <option value="">Select</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Half yearly">Half yearly</option>
                        <option value="Yearly">Yearly</option>
                        <option value="Onetime">Onetime</option>
                      </select></td>
                    <td><select class="form-control frequency browser-default" name="cls5frequency" id="cls5frequency">
                         <option value="">Select</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Half yearly">Half yearly</option>
                        <option value="Yearly">Yearly</option>
                        <option value="Onetime">Onetime</option>
                      </select></td>
                    <td><select class="form-control frequency browser-default" name="cls6frequency" id="cls6frequency">
                         <option value="">Select</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Half yearly">Half yearly</option>
                        <option value="Yearly">Yearly</option>
                        <option value="Onetime">Onetime</option>
                      </select></td>
                    <td><select class="form-control frequency browser-default" name="cls7frequency" id="cls7frequency">
                        <option value="">Select</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Half yearly">Half yearly</option>
                        <option value="Yearly">Yearly</option>
                        <option value="Onetime">Onetime</option>
                      </select></td>
                    <td><select class="form-control frequency browser-default" name="cls8frequency" id="cls8frequency">
                         <option value="">Select</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Half yearly">Half yearly</option>
                        <option value="Yearly">Yearly</option>
                        <option value="Onetime">Onetime</option>
                      </select></td>
                    <td><select class="form-control frequency browser-default" name="cls9frequency" id="cls9frequency">
                         <option value="">Select</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Half yearly">Half yearly</option>
                        <option value="Yearly">Yearly</option>
                        <option value="Onetime">Onetime</option>
                      </select></td>
                    <td><select class="form-control frequency browser-default" name="cls10frequency" id="cls10frequency">
                         <option value="">Select</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Half yearly">Half yearly</option>
                        <option value="Yearly">Yearly</option>
                        <option value="Onetime">Onetime</option>
                      </select></td>
                    <td><select class="form-control frequency browser-default" name="cls11frequency" id="cls11frequency">
                         <option value="">Select</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Half yearly">Half yearly</option>
                        <option value="Yearly">Yearly</option>
                        <option value="Onetime">Onetime</option>
                      </select></td>
                    <td><select class="form-control frequency browser-default" name="cls12frequency" id="cls12frequency">
                         <option value="">Select</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Half yearly">Half yearly</option>
                        <option value="Yearly">Yearly</option>
                        <option value="Onetime">Onetime</option>
                      </select></td>


                      </tr>

                      <tr>
                      	<td> <strong>Due Date</strong></td>
                        <?php for ($k = 1; $k <= 12; $k++) {?>
                        <td> <input type="date" class="datepicker" name="cls<?php echo $k; ?>duedate"></td>
                    <?php }?>

                      </tr>




                      <tr>
                        <td><strong>Grace Period</strong></td>
                         <?php for ($l = 1; $l <= 12; $l++) {?>
                        <td><div class="input-field col s12">
                            <input id="fee1" type="text"  name="cls<?php echo $l; ?>grace">
                            <label for="first_name">Amount</label>
                          </div>
                        </td>
                          <?php }?>



                      </tr>

                      <tr>
                      	<td> <strong>Last Date</strong></td>
                         <?php for ($m = 1; $m <= 12; $m++) {?>
                        <td> <input type="date" class="datepicker" name="cls<?php echo $m; ?>lastdate"></td>
                    <?php }?>

                      </tr>

                      <tr>
                        <td><strong>Penalty Type</strong></td>
                       <?php for ($n = 1; $n <= 12; $n++) {?>
                        <td><select class="browser-default" name="cls<?php echo $n; ?>penaltytype">
                          <option value="" disabled selected>Select</option>
                           <option value="Fixed">Fixed</option>
                        </select>
                        <!-- <label>Select </label> -->
                        </td>
                        <?php }?>

                      </tr>

                      <tr>
                        <td><strong>Penalty Amount</strong></td>
                         <?php for ($o = 1; $o <= 12; $o++) {?>
                        <td><div class="input-field col s12">
                            <input id="fee1" type="text"  name="cls<?php echo $o; ?>penaltyamount">
                            <label for="first_name">Amount</label>
                          </div>
                        </td>
                        <?php }?>



                      </tr>



                      <tr>
                        <td><strong>Penalty Waiver</strong></td>
                        <?php for ($p = 1; $p <= 12; $p++) {?>
                        <td style="text-align:center;">
                          <input type="checkbox" name="cls<?php echo $p; ?>penaltywaiver" id="Penalty<?php echo $p; ?>" />
                          <label for="Penalty<?php echo $p; ?>"></label>
          				</td>

                         <?php }?>


                      </tr>





                    </tbody>
                  </table>
                  <div class="divider"></div>

                  <button class="btn btn-info pull-right" type="submit" name="submit"  value="submit">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            Submit
                        </button>




                </div>
              </div>
            </div>
          </div>
          <?php echo form_close(); ?>
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
  <div class="modal"   id="myModal" role="dialog">
    <div class="modal-content">
      <h4>Add Fee <a class="btn-floating waves-effect waves-light right modal-close "><i class="mdi-content-clear"></i></a></h4>
      <div class="row"><div class="divider"></div></div>
      <div class="row">
          <div class="input-field col s6">
                 <input type="text" id="addfeesname" class="" />
                 <label for="first_name">Fee Name</label>
          </div>

          <div class="input-field col s6">

                 <select class="" id="addfeesoption">
                 <option value="" disabled selected>Fee Status</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
              </select>

                <label>&nbsp; </label>
           </div>
       </div>
    </div>
    <div class="modal-footer">
<div class="divider"></div>
     <div class="input-field col s12">

     <button class="btn btn-info pull-right modal-close" type="button" id="addfees"> <i class="ace-icon fa fa-check bigger-110"></i> Submit </button>




      </div>

    </div>
     <br>
  </div>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script>
$("#addfees").click(function(){
    var feeshead=$("#addfeesname").val();

    var feesotion=$("#addfeesoption").val();
    //var school_id=$("#schoolname").val();

    //alert(feeshead);return false;

    if(feeshead !=""){

        $.ajax({
		type: "GET",
		//dataType: "html",
		url: '<?php echo site_url() ?>/school/Addfee/addfeehead',
		data: {
			'feeshead': feeshead //,'school_id': school_id
		},
		success: function(resp) {
		  //alert(resp);
          $("#feesid").val(resp);
 		}
	});
        $("#feesname").val(feeshead);
        //alert(feeshead);
        $("#fees_label").html(feeshead);

    }
        else{
            alert("Type The Fee Name");
        }


   // $('#myModal').modal('hide');
   // alert(feeshead);
    //$("#namefeeshead").text(feeshead);

    //alert(feeshead);


    //alert(feesotion);

});
$("#addfeesdetails").submit(function(){


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