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
                <h5 class="breadcrumbs-title">Assign Teacher</h5>
                <ol class="breadcrumb">
                    <li><a href="<?php echo site_url() ?>/school/dashboard">Dashboard</a></li>
                    <li><a href="#">User Management</a></li>
                  <li class="active">Assign Teacher</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->

        <div class="col s12 l12">






        <!--start container-->

        <div class="container min_con">
        <div class="col s12 m4 l12" style="text-align:center;">
                <p style="color:green"><?php echo $this->session->flashdata('add_teacher'); ?>
                 <p style="color:red"><?php echo $this->session->flashdata('error'); ?>
                </div>


         <?php echo form_open("school/Usermanagement/saveteacher", array('id' => "addteacher")); ?>


         <div class="row">

         <div class="input-field col s6 l3">
                <select class="" id="class" name="class">
                <option value="" selected>Select Class</option>
                <?php for ($c = 1; $c <= 12; $c++) {?>
                     <option value="<?php echo $c; ?>"><?php echo $c; ?></option>
               <?php }?>
              </select>
          </div>


          <div class="input-field col s6 l3">
                <select class="" id="section" name="section">
                <option value="" selected>Select Section</option>
                <option value="a">A</option>
                <option value="b">B</option>
                 <option value="c">C</option>
                  <option value="d">D</option>
              </select>
          </div>


          <div class="input-field col s6 l3">
                <select class="" id="teacher" name="teacher">
                <option value="" selected> Select Teacher</option>
                <?php if (isset($teacherdropdown) && $teacherdropdown != "") {

	foreach ($teacherdropdown as $teacher) {?>
                     <option value="<?php echo isset($teacher->usermanagement_id) ? $teacher->usermanagement_id : ''; ?>"><?php echo isset($teacher->name) ? $teacher->name : ''; ?></option>
                <?php }}?>
              </select>
          </div>

         <div class="input-field col s6 l3">
          <!-- <button class="btn waves-effect waves-light right" type="submit" name="submit"  value="submit">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            Save
                        </button>  -->


          <button class="btn waves-effect waves-light right blue" type="submit" name="submit" value="submit"><i class="mdi-content-send"></i> Save </button>

          </div>
      <div class="clr20"></div> <div class="clr20"></div>
         </div>


          <?php echo form_close(); ?>

         <div class="input-field col s12 l9">
                <select class="form-control browser-default" id="classteacher" name="classteachesr">
                <option value="" selected>Select Class</option>
                <?php for ($t = 1; $t <= 12; $t++) {?>
                     <option value="<?php echo $t; ?>"><?php echo $t; ?></option>
               <?php }?>


              </select>

          </div>

           <div class="clr20"></div> <div class="clr20"></div>
          <div class="divider"></div>

          <div id="tableres">

          </div>




        <!--end container-->
        </div>






        </div>



      </section>
      <!-- END CONTENT -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>
  $("#addteacher").submit(function(){

    if($('#class').val()==""){
         alert("Select Class")

        return false;
    }
    if($('#section').val()==""){
         alert("Select Section")

        return false;
    }
    if($('#teacher').val()==""){
         alert("Select Teacher")

        return false;
    }
  });



$("#classteacher").change(function() {

    var classte=$(this).val()
    //alert(classte);


   $.ajax({
		type: "GET",
		//dataType: "html",
		url: '<?php echo site_url() ?>/school/Usermanagement/teacherdetails',
		data: {
			'classte': classte
		},

		success: function(resp) {
		  console.log(resp);
          $('#tableres').html(resp);

 		}


	});



});
</script>

